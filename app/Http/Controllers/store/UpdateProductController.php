<?php

namespace App\Http\Controllers\store;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sub_categories_sizes;
use Illuminate\Support\Facades\Auth;
use App\Models\Sub_categories_images;
use Illuminate\Support\Facades\Validator;

class UpdateProductController extends Controller
{
    public function updateProduct(String $id)
    {
        $products = Product::all();
        $sizes = Sub_categories_sizes::all();
        $sub_category = SubCategory::with(['products', 'category', 'sizes'])->find($id);
        $categories = Category::where('product_id', $sub_category->products->id)->get();
        return view('store.updateProduct', compact('sub_category', 'products', 'sizes', 'categories'));
        //    return $sub_category;
    }
    public function updatingProduct(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'product' => 'required',
            'category' => 'required',
            'title' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    $wordCount = str_word_count($value);
                    if ($wordCount > 5) {
                        $fail('The Title may not be greater than 5 words.');
                    }
                },
            ],
            'description' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $wordCount = str_word_count($value);
                    if ($wordCount > 15) {
                        $fail('The ' . $attribute . ' may not be greater than 15 words.');
                    }
                },
            ],
            'price' => 'required|numeric',
            'color' => 'required|string',
            'size' => 'required',
            'images' => 'array|min:4|max:4',
            'images.*' => 'mimes:jpeg,png,jpg|max:2048',
        ], [
            'product.required' => 'Please select a product.',
            'category.required' => 'Please select a sub-product.',
            'title.required' => 'Please enter the product title.',
            'description.required' => 'Please provide a detailed product description.',
            'price.required' => 'Please specify the product price.',
            'color.required' => 'Please specify the product color.',
            'size.required' => 'Please select the sub-product size.',
            'images.*.mimes' => 'Each image must be in one of the following formats: :values.',
            'images.min' => [
                'array' => 'You must upload at least :min images.'
            ],
            'images.*.max' => [
                'array' => 'You cannot upload more than :max images.',
                'file' => 'Image size should less than:max KB.'
            ]
        ]);
        // Return validation errors
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'errors' => $validator->errors()
            ]);
        }

        $sub_categories = SubCategory::where('id', $request->sub_category_id)
            ->where('shop_id', Auth::user()->shop_id)->first();
        if (!$sub_categories) {
            return response()->json(['status' => 'failed', 'message' => 'SubCategory not found.']);
        }

        // Handle images if uploaded
        if ($request->hasFile('images')) {
            $sub_categories_images = Sub_categories_images::where('sub_categories_id', $request->sub_category_id)
                ->where('shop_id', Auth::user()->shop_id)->first();

            // Delete old images if they exist
            if ($sub_categories_images) {
                if (file_exists(public_path($sub_categories_images->image1))) unlink(public_path($sub_categories_images->image1));
                if (file_exists(public_path($sub_categories_images->image2))) unlink(public_path($sub_categories_images->image2));
                if (file_exists(public_path($sub_categories_images->image3))) unlink(public_path($sub_categories_images->image3));
                if (file_exists(public_path($sub_categories_images->image4))) unlink(public_path($sub_categories_images->image4));
            }

            // Process new images
            $imagePaths = [];
            foreach ($request->file('images') as $index => $image) {
                $imageName = 'Image' . ($index + 1) . time() . "." . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/sub_categories'), $imageName);
                $imagePaths[] = 'uploads/sub_categories/' . $imageName;
            }

            // Save new images
            $sub_categories_images->sub_categories_id = $request->sub_category_id;
            $sub_categories_images->image1 = $imagePaths[0] ?? null;
            $sub_categories_images->image2 = $imagePaths[1] ?? null;
            $sub_categories_images->image3 = $imagePaths[2] ?? null;
            $sub_categories_images->image4 = $imagePaths[3] ?? null;
            $sub_categories_images->save();
        }

        // Update SubCategory details
        $sub_categories->product_id = $request->product;
        $sub_categories->categories_id = $request->category;
        $sub_categories->product_title = $request->title;
        $sub_categories->product_description = $request->description;
        $sub_categories->price = $request->price;
        $sub_categories->sizes_id = $request->size;
        $sub_categories->color = $request->color;
        $sub_categories->save();

        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully',
        ]);
    }
}
