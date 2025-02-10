<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\store\market;
use App\Models\store\shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function register()
    {
        $products = Product::with('category.SubCategory.sub_categories_images')->get();
        $markets = market::all();
        return view('registration', compact('products', 'markets'));
    }
    public function registerData(Request $req)
    {
        // Step 1: Validate the request data
        $validator = Validator::make(
            $req->all(),
            [
                'fname' => 'required|max:30',
                'lname' => 'required|max:30',
                'phone' => ['required', 'numeric', 'regex:/^03\d{9}$/' ,'unique:users,phone'],
                'email' => 'required|unique:users,email|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
                'password' => 'required|min:8|regex:/[0-9]/'
            ],
            [
                'fname.required' => 'Please provide your first name.',
                'fname.max' => 'The first name must not exceed 30 characters.',
                'lname.required' => 'Please provide your last name.',
                'lname.max' => 'The last name must not exceed 30 characters.',
                'phone.required' => 'A phone number is required.',
                'phone.numeric' => 'The phone number must contain only numeric values.',
                'phone.regex' => 'Invalid phone number format.',
                'phone.unique'=>"This phone is already in use",
                'email.required' => 'An email address is required.',
                'email.unique' => 'This email address is already in use.',
                'email.regex' => 'Please provide a valid email address.',
                'password.required' => 'A password is required.',
                'password.min' => 'The password must be at least 8 characters long.',
                'password.regex'=>"Password should contain at least one number"
            ]
        );

        // Step 2: Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'errors' => $validator->errors()
            ]);
        } else {
            // Step 3: If validation passes, create a new user record
            $user = User::create([
                'user_type' => $req->user_type,
                'first_name' => $req->fname,
                'last_name' => $req->lname,
                'phone' => $req->phone,
                'email' => $req->email,
                'password' => $req->password,
            ]);

            if ($user) {
                Auth::login($user);
                return response()->json([
                    'status' => 'success',
                    'message' => "You’ve successfully signed up.",
                ]);
            }
        }
    }
    public function searchShop(Request $req)
    {
        $validator = Validator::make(
            $req->all(),
            [
                'market' => 'required',
                'reg_num' => 'required|numeric|digits:5',
            ],
            [
                'market.required' => 'Please select your market name.',
                'reg_num.required' => 'Please enter your shop registration ID.',
                'reg_num.numeric' => 'The registration ID must contain only numbers.',
                'reg_num.digits' => 'The registration ID must be exactly 5 digits.'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'errors',
                'errors' => $validator->errors(),
            ]);
        } else {
            $shop_details = shop::where('reg_num', $req->reg_num)
                ->where('market_id', $req->market)
                ->get();

            if (!$shop_details->isEmpty()) {
                return response()->json([
                    'status' => 'success',
                    'message' => "We have successfully located your shop. Please complete the remaining fields in the form to proceed with creating your shop profile.",
                    'shop_details' => $shop_details
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => "Sorry! We could not find your shop.",
                ]);
            }
        }
    }
    public function registerShopkeeprData(Request $req){
         // Step 1: Validate the request data
         $validator = Validator::make(
            $req->all(),
            [
                'shop_id'=>'required',
                'owner_first_name' => 'required|max:30',
                'owner_last_name' => 'required|max:30',
                'owner_phone' => ['required', 'numeric', 'regex:/^03\d{9}$/' ,'unique:users,phone'],
                'owner_email' => 'required|unique:users,email|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
                'owner_password' => 'required|min:8|regex:/[0-9]/'
            ],
            [
                'owner_first_name.required' => 'Please provide your first name.',
                'owner_first_name.max' => 'The first name must not exceed 30 characters.',
                'owner_last_name.required' => 'Please provide your last name.',
                'owner_last_name.max' => 'The last name must not exceed 30 characters.',
                'owner_phone.required' => 'A phone number is required.',
                'owner_phone.numeric' => 'The phone number must contain only numeric values.',
                'owner_phone.unique'=>"This phone is already in use",
                'owner_phone.regex' => 'Invalid phone number format.',
                'owner_email.required' => 'An email address is required.',
                'owner_email.unique' => 'This email address is already in use.',
                'owner_email.regex' => 'Please provide a valid email address.',
                'owner_password.required' => 'A password is required.',
                'owner_password.min' => 'The password must be at least 8 characters long.',
                'owner_password.regex'=>"Password should contain at least one number"
            ]
        );

        // Step 2: Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'errors' => $validator->errors()
            ]);
        }
        else{
            // Step 3: If validation passes, create a new user record
            $user = User::create([
                'shop_id'=>$req->shop_id,
                'user_type' => $req->user_type,
                'first_name' => $req->owner_first_name,
                'last_name' => $req->owner_last_name,
                'phone' => $req->owner_phone,
                'email' => $req->owner_email,
                'password' => $req->owner_password,
            ]);

            if ($user) {
                Auth::login($user);
                return response()->json([
                    'status' => 'success',
                    'message' => " Congratulations! Your Shop Has Been Successfully Created",
                ]);
            }
        }
    }
}
