<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: {{$color}};
            color: white;
            text-align: center;
            padding: 20px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .header h1 {
            margin: 0;
        }
        .content {
            padding: 20px;
            font-size: 16px;
        }
        .content h2 {
            color: {{$color}};
            font-size: 20px;
        }
        .order-details {
            background-color: #f9f9f9;
            padding: 15px;
            margin: 15px 0;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
        .order-details p {
            margin: 0;
            font-size: 14px;
        }
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #f4f4f4;
            font-size: 12px;
            color: #777;
        }
        .footer p {
            margin: 0;
        }
        .btn {
            display: inline-block;
            background-color: {{$color}};
            color: white;
            padding: 10px 20px;
            margin-top: 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        @media only screen and (max-width: 600px) {
            .container {
                width: 100%;
                padding: 0;
            }
            .content {
                padding: 10px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>{{$title1}}</h1>
        </div>
        <div class="content">
            <h2>{{$title2}}</h2>
            <p>Hi {{$order->first_name . ' '. $order->last_name}},</p>
            <p>{{$message1}}</p>
            
            <div class="order-details">
                <p><strong>Product Name</strong> {{$order->product_title}}</p>
                <p><strong>Product Quantity</strong> {{$order->product_quantity}}</p>
                <p><strong>Shipping Address:</strong> {{$order->street_address}}</p>
                <p><strong>Total Amount:</strong> {{$order->total_price . ' PKR'}}</p>
            </div>
            
            <p>{{$message2}}</p>
            <a href="http://localhost:8000" class="btn">Browse Website</a>
        </div>
        <div class="footer">
            <p>&copy; 2024 {{$order->shop->shop_name}}. All rights reserved.</p>
            <p>If you have any questions, feel free to <a href="mailto:{{$order->shop->email}}">contact us</a>.</p>
        </div>
    </div>

</body>
</html>
