<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wishlist</title>
    @include('Links.headerLinks')
</head>

<body>
    @include('layout.sideMenu')
    @include('layout.header')

    <!-- Whishlist Section Begin -->
    <section class="wishlist-section">
        <div class="container">
            @if ($wishlist_items->isNotEmpty())
                @foreach ($wishlist_items as $wishlist_item)
                    <div class="cart-item row align-items-center">
                        <div class="col-3 col-sm-2">
                            <img src="{{ asset($wishlist_item->sub_category->sub_categories_images->image1) }}"
                                alt="Product Image" class="img-fluid">
                        </div>
                        <div class="col-7 col-sm-7">
                            <div class="item-title">{{ $wishlist_item->sub_category->product_title }}</div>
                            <div class="item-subtitle">{{ $wishlist_item->sub_category->product_description }}</div>
                            <div class="item-brand">{{ $wishlist_item->sub_category->shop_name }}</div>
                            <div class="item-price">{{ $wishlist_item->sub_category->price }}</div>
                        </div>
                        <div class="col-12 col-sm-3 d-flex justify-content-between align-items-center mt-3 mt-sm-0">
                            <div class="quantity-controls">
                                <button class="btn-minus">-</button>
                                <input type="text" class="quantity-input" value="1">
                                <input type="hidden" class="cart-item-id" value="{{ $wishlist_item->sub_categories_id }}">
                                <button class="btn-plus">+</button>
                            </div>
                            <span class="delete-btn" data-value="{{ $wishlist_item->id }}">&times;</span>
                        </div>
                    </div>
                @endforeach
                <div class="row total-checkout">
                    <div class="col-lg-6 col-md-6 col-sm-6 continue-shopping">
                        <div class="cart__btn">
                            <a href="{{ route('home') }}">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="row" >
                    <h3 class="col-12 offset-4">Your wishlist is empty :-(</h3>
                    <img class="col-4 offset-4 img-fluid" src="{{ asset('img/wishlist/wishlist.png') }}">
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
    <!-- Wishlist Section End -->

    @include('layout.footer')
    @include('Links.jsLinks')
    <script>
        $(document).ready(function() {
            var wishlistId = $('.delete-btn').attr('data-value');
            $('.delete-btn').on('click', function() {
                $.ajax({
                    url: 'deleting-product-wishlist' + wishlistId,
                    type: 'GET',
                    success: function(response) {
                        toastr.success("The product has been successfully removed from your wishlist", 'Success', {
                                "progressBar": true,
                                "closeButton": true,
                                "extendedTimeOut": "0"
                            });
                        window.location.href = 'shopping-wishlist';
                    },
                });
            });
        });
    </script>

</body>

</html>
