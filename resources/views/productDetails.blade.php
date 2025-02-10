<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products details</title>
    @include('Links.headerLinks')
</head>
<body>
    @include('layout.sideMenu')
    @include('layout.header')

      <!-- Product Details Section Begin -->
        <section class="product-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product__details__pic">
                            <div class="product__details__pic__left product__thumb nice-scroll">
                                <a class="pt active" href="#product-1">
                                    <img src="{{ asset($productDetails->sub_categories_images->image1)}}" alt="">
                                </a>
                                <a class="pt" href="#product-2">
                                    <img src="{{ asset($productDetails->sub_categories_images->image2)}}" alt="">
                                </a>
                                <a class="pt" href="#product-3">
                                    <img src="{{ asset($productDetails->sub_categories_images->image3)}}" alt="">
                                </a>
                                <a class="pt" href="#product-4">
                                    <img src="{{ asset($productDetails->sub_categories_images->image4)}}" alt="">
                                </a>
                            </div>
                            <div class="product__details__slider__content">
                                <div class="product__details__pic__slider owl-carousel">
                                    <img data-hash="product-1" class="product__big__img" src="{{ asset($productDetails->sub_categories_images->image1)}}" alt="">
                                    <img data-hash="product-2" class="product__big__img" src="{{ asset($productDetails->sub_categories_images->image2)}}" alt="">
                                    <img data-hash="product-3" class="product__big__img" src="{{ asset($productDetails->sub_categories_images->image3)}}" alt="">
                                    <img data-hash="product-4" class="product__big__img" src="{{ asset($productDetails->sub_categories_images->image4)}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product__details__text">
                            <h3>{{$productDetails->product_title}} <span>Shope: {{$productDetails->shop->shop_name}}</span></h3>
                            <div class="product__details__price">{{$productDetails->price . ' RS'}} </div>
                            <p>{{$productDetails->product_description}} </p>
                                <div class="product__details__button">
                                    <div class="btn btn-danger cart-btn shoping-cart" data-hidden-value="{{$productDetails->id }}"><span class="icon_bag_alt"></span> Add to cart</div>
                                    <ul>
                                        <li class="wishlist" data-hidden-value="{{$productDetails->id }}"><a ><span class="icon_heart_alt"></span></a></li>
                                    </ul>
                                </div>
                            <div class="product__details__widget">
                                <ul>
                                    <li>
                                        <span>Availability:</span>
                                        <div class="stock__checkbox">
                                            <label for="stockin">
                                                In Stock
                                                <input type="checkbox" id="stockin">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <span>Available color:</span>
                                        <div class="color__checkbox">
                                            <label for="red">
                                                <input type="radio" name="color__radio" id="red" checked>
                                                <span class="checkmark" style="background-color:{{$productDetails->color}}"></span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <span>Available size:</span>
                                        <div class="size__btn">
                                            <label for="xs-btn" class="active">
                                                <input type="radio" id="xs-btn">
                                                {{$productDetails->sizes->sizes}}
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>                  
            </div>
        </section>
        <!-- Product Details Section End -->
    
    @include('layout.footer')
    @include('Links.jsLinks')
</body>
</html>