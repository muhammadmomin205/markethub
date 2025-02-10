<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>checkout</title>
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
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Add to cart  Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <form class="checkout__form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div id="successMsg" style="display:none;" class="alert alert-success"></div>
                        <div id="errorMsg" style="display:none;" class="alert alert-danger"></div>
                        <h5>Billing detail</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>First Name <span>*</span></p>
                                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                    <input type="text" name="first_name" readonly class="first_name"
                                        value="{{ Auth::user()->first_name }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Last Name <span>*</span></p>
                                    <input type="text" name="last_name" readonly class="last_name"
                                        value="{{ Auth::user()->last_name }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input type="text" name="phone" readonly class="phone"
                                        value="{{ Auth::user()->phone }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="text" name="email" readonly class="email"
                                        value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Address <span>*</span></p>
                                    <input type="text" placeholder="Street Address" name="street_address"
                                        class="street_address">
                                    <input type="text" placeholder="Apartment. suite, unite ect ( optinal )"
                                        name="app_sui_unit" class="app_sui_unit">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Postcode/Zip <span>*</span></p>
                                    <input type="text" name="zip_code" class="zip_code">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <button type="submit" class="site-btn">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout__order">
                            <h5>Your order</h5>
                            <div class="checkout__order__product">
                                @php
                                    $total_price = 0; // Initialize total price
                                @endphp
                                <ul id="productList">
                                    <li>
                                        <span class="top__text">Product</span>
                                        <span class="top__text__right">Total</span>
                                    </li>
                                    @foreach ($checkoutItems as $checkoutItem)
                                        <li class="product_item">
                                            <input type="hidden" class="shop_id"
                                                value="{{ $checkoutItem['shop_id'] }}" >
                                            <input type="hidden" class="product_title"
                                                value="{{ $checkoutItem['product_title'] }}">
                                            <input type="hidden" class="product_quantity"
                                                value="{{ $checkoutItem['product_quantity'] }}">
                                            <input type="hidden" class="product_price"
                                                value="{{ $checkoutItem['product_price'] }}">
                                            <input type="hidden" class="total_price"
                                                value="{{ $checkoutItem['total_price'] }}">
                                            {{ $checkoutItem['product_title'] }}
                                            <span>
                                                @php
                                                    $total_price += $checkoutItem['total_price']; // Add to the total price
                                                @endphp
                                                {{ $checkoutItem['total_price'] . ' PKR' }}
                                            </span>
                                            <ul class="quantity-price">
                                                <li><b>Quantity: </b>{{ $checkoutItem['product_quantity'] }}</li>
                                                <li><b>Price: </b>{{ $checkoutItem['product_price'] }}</li>
                                            </ul>
                                            <hr>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="checkout__order__total">
                                <ul>
                                    <li>Total <span>{{ $total_price . ' PKR' }}</span></li>
                                    <li>Payment <span>Cash on Delivery</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Add to cart Section End -->

    @include('layout.footer')
    @include('Links.jsLinks')
    <script>
        $(document).ready(function() {
            $('.checkout__form').on('submit', function(event) {
                event.preventDefault();
                // Collect product data
                let products = [];
                $('#productList .product_item').each(function() {
                    let product = {
                        shop_id: $(this).find('.shop_id').val(),
                        product_title: $(this).find('.product_title').val(),
                        product_quantity: $(this).find('.product_quantity').val(),
                        product_price: $(this).find('.product_price').val(),
                        total_price: $(this).find('.total_price').val(),
                    };
                    products.push(product); // Add product to array
                });

                let formData = new FormData(this);
                // Append products to formData
                products.forEach((product, index) => {
                    for (let key in product) {
                        formData.append(`products[${index}][${key}]`, product[key]);
                    }
                });

                $.ajax({
                    url: '/order', // Replace with your route
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('#successMsg').css('display', 'none');
                        $('#errorMsg').css('display', 'none');
                        $('input').css('border', '');
                    },
                    success: function(response) {
                        if (response.status == 'failed') {
                            var errors = response.errors;
                            $.each(errors, function(field, messages) {
                                // Add red border to the invalid field based on the class name
                                $('.' + field).css('border',
                                    '2px solid red');
                            });
                            // Display error messages
                            $('#errorMsg').css('display', 'block');
                            let errorMsg = '<ul>';
                            $.each(errors, function(key, value) {
                                errorMsg += '<li>' + value[0] + '</li>';
                            });
                            errorMsg += '</ul>';
                            $('#errorMsg').html(errorMsg);

                            // Scroll to success message
                            $('html, body').animate({
                                scrollTop: $('#errorMsg').offset().top - 130
                            }, 500);
                        } else if (response.status =='success') {
                            Swal.fire({
                                title: "Order Created Successful",
                                text: response.message,
                                icon: "success"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/';
                                }
                            });
                        } 
                    }
                });
            });
        });
    </script>
</body>

</html>
