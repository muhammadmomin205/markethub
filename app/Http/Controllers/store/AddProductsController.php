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

class AddProductsController extends Controller
{
    public function show_product_categories_size()
    {
        $products = Product::all();
        $sizes = Sub_categories_sizes::all();
        return view('store.addProduct', compact('products', 'sizes'));
    }
    public function saveProducts(Request $request)
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
            'images' => 'required|array|min:4|max:4',
            'images.*' => 'mimes:jpeg,jpg,png,JPEG,JPG,PNG|max:2048',
        ], [
            'product.required' => 'Please select a product.',
            'category.required' => 'Please select a sub-product.',
            'title.required' => 'Please enter the product title.',
            'description.required' => 'Please provide a detailed product description.',
            'price.required' => 'Please specify the product price.',
            'color.required' => 'Please specify the product color.',
            'size.required' => 'Please select the sub-product size.',
            'images.required' => 'Please upload an image.',
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
        } else {

            $sub_categories = new SubCategory();
            $sub_categories->product_id = $request->product;
            $sub_categories->categories_id = $request->category;
            $sub_categories->product_title = $request->title;
            $sub_categories->product_description = $request->description;
            $sub_categories->shop_id = Auth::user()->shop_id;        
            $sub_categories->price = $request->price;
            $sub_categories->sizes_id = $request->size;
            $sub_categories->color = $request->color;
            $sub_categories->sizes_id = $request->size;
            $sub_categories->save();
            // Retrieve the ID of the newly created sub_category
            $sub_category_id = $sub_categories->id;

            if ($request->hasFile('images')) {
                // Process the images
                $imagePaths = [];
                $imageIncreament = 0;
                foreach ($request->file('images') as $image) {
                    $imageIncreament++;
                    $imageName = 'Image' . $imageIncreament . time() . "." . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/sub_categories'), $imageName);
                    $imagePaths[] = 'uploads/sub_categories/' . $imageName;
                }
                $sub_categories_images = new Sub_categories_images();
                $sub_categories_images->sub_categories_id = $sub_category_id;
                $sub_categories_images->shop_id = Auth::user()->shop_id;
                $sub_categories_images->image1 = $imagePaths[0] ?? null;
                $sub_categories_images->image2 = $imagePaths[1] ?? null;
                $sub_categories_images->image3 = $imagePaths[2] ?? null;
                $sub_categories_images->image4 = $imagePaths[3] ?? null;
                $sub_categories_images->save();
            }
            return response()->json([
                'success' => true,
                'message' => 'Product uploaded successfully',
            ]);
        }
    }
    public function selectProducts(String $id)
    {
        $category = Category::where('product_id', $id)->get();
        return response()->json(['category_data' => $category]);
    }
}
