<?php

namespace App\Http\Controllers\store;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Sub_categories_images;

class DeleteProductController extends Controller
{
    public function deleteProduct(String $id)
    {
        // Find the related images in the database
        $images = Sub_categories_images::where('sub_categories_id', $id)
        ->where('shop_id' , Auth::user()->shop_id)->first();  
    
        if ($images) {
            // Define the image paths
            $imageFields = ['image1', 'image2', 'image3', 'image4'];
            
            // Loop through the image fields and delete each file if it exists
            foreach ($imageFields as $field) {
                $imagePath = public_path($images->$field);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);  // Delete the file from the folder
                }
            }
        }
    
        // Find the subcategory and delete it
        $sub_category = SubCategory::where('shop_id' , Auth::user()->shop_id)->find($id); 
        if ($sub_category) {
            $sub_category->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'The product have been deleted successfully'
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Product not found'
            ]);
        }
}
}