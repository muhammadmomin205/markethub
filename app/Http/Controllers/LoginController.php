<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(){
        $products = Product::with('category.SubCategory.sub_categories_images')->get();
        return view('login' , compact('products'));
    }
    public function loginData(Request $req){

        $validator = Validator::make(
            $req->all(),
            [
                'email' => 'required|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
                'password' => 'required|min:8|regex:/[0-9]/'
            ],
            [
                'email.required' => 'Please provide the email address.',
                'email.regex' => 'Please provide a valid email address format.',
                'password.required' => 'Please provide a password.',
                'password.min' => 'The password must be at least 8 characters long.',
                'password.regex'=>"Password should contain at least one number",
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 'errors',
                'errors' => $validator->errors()
            ]);
        }
        else{
            if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
                if(Auth::user()->user_type == 'customer'){
                    return response()->json([
                        'status' => 'success',
                        'message' => "You have logged in successfully",
                        'user'=>'customer'
                    ]);
                }
                else if(Auth::user()->user_type == 'seller'){
                    return response()->json([
                        'status' => 'success',
                        'message' => "You have logged in successfully",
                        'user'=>'seller'
                    ]);
                }
                else if(Auth::user()->user_type == 'admin'){
                    return response()->json([
                        'status' => 'success',
                        'message' => "You have logged in successfully",
                        'user'=>'admin'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => "Email or password is incorrect",
                ]);
            }
        }
    }
    public function logout()
    {
        $user = Auth::id();
        Auth::logout($user);
        return response()->json([
            'status' => 'success',
            'message' => "You have logged out successfully",

        ]);
    }
}
