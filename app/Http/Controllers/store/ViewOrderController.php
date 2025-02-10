<?php

namespace App\Http\Controllers\store;

use Carbon\Carbon;
use App\Models\User;
use App\Models\order;
use App\Mail\OrderStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ViewOrderController extends Controller
{
    public function showOrders()
    {
        $orders = order::where('shop_id', Auth::user()->shop_id)
            ->get();
        return view('store.viewOrders', compact('orders'));
    }
    public function updateStatus(String $status, String $id, String $user_id)
    {
        $user_data = User::find($user_id);
        if ($status == 'Out Of Stock') {
            $order = Order::with('shop')->where('user_id', $user_id)->where('id', $id)->first();
            $order->status = $status;
            $color = '#ff4c4c';
            $title1 = 'Out of Stock';
            $title2 = 'Product Unavailable';
            $subject = 'Product Unavailability Notification';
            $message1 = 'We regret to inform you that the product you tried to order is currently out of stock:';
            $message2 = 'We apologize for the inconvenience. You can check our website for alternative products or contact us for more information.';
            Mail::to($user_data->email)->send(new OrderStatus($order, $title1, $title2, $subject, $message1, $message2, $color));
            $order->save();
            return redirect()->route('view-orders')->with('success', 'Order status updated successfully.');
        } else if ($status == 'Scheduled') {
            $order = Order::with('shop')->where('user_id', $user_id)->where('id', $id)->first();
            $order->status = $status;
            $shippingDate = Carbon::now()->addDays(2)->format('F j, Y'); // Format the date as desired
            $color = '#17a2b8';
            $title1 = 'Order Scheduled';
            $title2 = 'Your Order is Scheduled for Shipping!';
            $subject = 'Order Scheduled Notification';
            $message1 = "Thank you for your order! We want to let you know that your order is scheduled for shipping on $shippingDate.";
            $message2 = 'If you have any questions or need to make changes to your order, please donot hesitate to reach out.';
            Mail::to($user_data->email)->send(new OrderStatus($order, $title1, $title2, $subject, $message1, $message2, $color));
            $order->save();
            return redirect()->route('view-orders')->with('success', 'Order status updated successfully.');
        } else if ($status == 'Completed') {
            $order = Order::with('shop')->where('user_id', $user_id)->where('id', $id)->first();
            $order->status = $status;
            $color = '#4CAF50';
            $title1 = 'Order Successfully Shipped!';
            $title2 = 'Order has been successfully delivered';
            $subject = 'Order Delivery Confirmation Notification';
            $message1 = 'We are pleased to inform you that your order has been successfully delivered';
            $message2 = 'Thank you for choosing us for your purchase. We hope you are satisfied with your order. If you have any questions or need assistance, please do not hesitate to reach out to our customer service team.';
            Mail::to($user_data->email)->send(new OrderStatus($order, $title1, $title2, $subject, $message1, $message2, $color));
            $order->save();
            return redirect()->route('view-orders')->with('success', 'Order status updated successfully.');
        }
    }
}
