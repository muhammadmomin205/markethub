<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{
    public function orderProduct(Request $req)
    {
        $validator = Validator::make(
            $req->all(),
            [
                'first_name' => 'required|max:30',
                'last_name' => 'required|max:30',
                'phone' => ['required', 'numeric', 'regex:/^03\d{9}$/'],
                'email' => 'required|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
                'street_address' => 'required|max:80',  // Removed the extra space
                'app_sui_unit' => 'max:80',
                'zip_code' => 'required|numeric|digits:5'  // Corrected the rule
            ],
            [
                'first_name.required' => 'Please provide your first name.',
                'first_name.max' => 'The first name must not exceed 30 characters.',
                'last_name.required' => 'Please provide your last name.',
                'last_name.max' => 'The last name must not exceed 30 characters.',
                'phone.required' => 'A phone number is required.',
                'phone.numeric' => 'The phone number must contain only numeric values.',
                'phone.regex' => 'Invalid phone number format.',
                'email.required' => 'An email address is required.',
                'email.regex' => 'Please provide a valid email address.',
                'street_address.required' => 'Please provide your street address.',
                'street_address.max' => 'The street address must not exceed 80 characters.',
                'app_sui_unit.max' => 'The apartment, suite, or unit must not exceed 80 characters.',
                'zip_code.required' => 'A ZIP code is required.',
                'zip_code.numeric' => 'The ZIP code must contain only numeric values.',
                'zip_code.digits' => 'The ZIP code must be exactly 5 digits.' // Updated error message
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'errors' => $validator->errors()
            ]);
        } else {
            foreach ($req->products as $product) {
                   order::create([
                    'first_name' => $req->first_name,
                    'last_name' => $req->last_name,
                    'phone' => $req->phone,
                    'email' => $req->email,
                    'street_address' => $req->street_address,
                    'app_sui_unit' => $req->app_sui_unit,
                    'zip_code' => $req->zip_code,
                    'user_id' => $req->user_id,  // Assuming user_id is provided
                    'shop_id' => $product['shop_id'], // Get shop ID from product data
                    'product_title' => $product['product_title'],
                    'product_quantity' => $product['product_quantity'],
                    'product_price' => $product['product_price'],
                    'total_price' => $product['total_price'],
                ]);
            }
            return response()->json([
                'status'=>'success',
                'message'=>'Order(s) created successfully.'
            ]);
        }
    }
}
