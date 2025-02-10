<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping cart</title>
    @include('Links.headerLinks')
</head>

<body>
    @include('layout.sideMenu')
    @include('layout.header')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Shop Cart Section Begin -->
    <section class="shoping-cart-section">
        <div class="container">
            @if ($cart_items->isNotEmpty())
                @foreach ($cart_items as $cart_item)
                    <div class="cart-item row align-items-center">
                        <div class="col-3 col-sm-2">
                            <img src="{{ asset($cart_item->sub_category->sub_categories_images->image1) }}"
                                alt="Product Image" class="img-fluid">
                        </div>
                        <div class="col-7 col-sm-7">
                            <div class="item-title">{{ $cart_item->sub_category->product_title }}</div>
                            <div class="item-subtitle">{{ $cart_item->sub_category->product_description }}</div>
                            <div class="item-brand">{{ $cart_item->sub_category->shop_name }}</div>
                            <div class="item-price">{{ $cart_item->sub_category->price }}</div>
                        </div>
                        <div class="col-12 col-sm-3 d-flex justify-content-between align-items-center mt-3 mt-sm-0">
                            <div class="quantity-controls">
                                <button class="btn-minus">-</button>
                                <input type="text" class="quantity-input" value="1">
                                <input type="hidden" class="cart-item-id" value="{{ $cart_item->sub_categories_id }}">
                                <button class="btn-plus">+</button>
                            </div>
                            <span class="delete-btn" data-value="{{ $cart_item->id }}">&times;</span>
                        </div>
                    </div>
                @endforeach
                <div class="row total-checkout">
                    <div class="col-lg-6 col-md-6 col-sm-6 continue-shopping">
                        <div class="cart__btn">
                            <a href="{{ route('home') }}">Continue Shopping</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 offset-lg-3 proceed-shopping">
                        <div class="cart__total__procced">
                            @if (Gate::allows('ValidUser'))
                                <a class="btn" id="checkout-btn">Proceed to checkout</a>
                            @else
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <h3 style="margin-left:40%">Your cart is empty :-(</h3>
                    <img class="col-8 offset-2 img-fluid" src="{{ asset('img/shop-cart/cart (2).png') }}"  height="400px">
                </div>
                <div class="row total-checkout">
                    <div class="col-lg-6 col-md-6 col-sm-6 continue-shopping">
                        <div class="cart__btn">
                            <a href="{{ route('home') }}">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </section>
    <!-- Shop Cart Section End -->
    @include('layout.footer')
    @include('Links.jsLinks')
    <script>
        $(document).ready(function() {
            // Quantity controls (same as before)
            $('.btn-plus').on('click', function() {
                var $input = $(this).siblings('.quantity-input');
                var currentVal = parseInt($input.val());
                if (!isNaN(currentVal)) {
                    $input.val(currentVal + 1);
                } else {
                    $input.val(1);
                }
            });

            $('.btn-minus').on('click', function() {
                var $input = $(this).siblings('.quantity-input');
                var currentVal = parseInt($input.val());
                if (!isNaN(currentVal) && currentVal > 1) {
                    $input.val(currentVal - 1);
                }
            });
            $('.delete-btn').on('click', function() {
                var cartId = $(this).attr('data-value');
                $.ajax({
                    url: 'deleting-product-cart' + cartId,
                    type: 'GET',
                    success: function(response) {
                        toastr.success(
                            response.message,
                            'Success', {
                                "progressBar": true,
                                "closeButton": true,
                                "extendedTimeOut": "0"
                            });
                        window.location.href = '/shoping-cart';
                    },
                });
            });

            // Handle checkout button click
            $('#checkout-btn').on('click', function() {
                var cartItems = [];

                // Collect cart item data
                $('.cart-item').each(function() {
                    var itemId = $(this).find('.cart-item-id').val();
                    var quantity = $(this).find('.quantity-input').val();

                    cartItems.push({
                        id: itemId,
                        quantity: quantity
                    });
                });

                // Send data via Ajax to the server
                $.ajax({
                    url: '{{ route('proceed-checkout') }}', // Adjust route as necessary
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // CSRF token for security
                        cartItems: cartItems
                    },
                    success: function(response) {
                        // Optionally, redirect to a thank you page
                        window.location.href = '{{ route('checkout') }}';
                    }
                });
            });
        });
    </script>
</body>

</html>
