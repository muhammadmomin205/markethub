<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sub Categories</title>
    @include('Links.headerLinks')
</head>

<body>
    @include('layout.sideMenu')
    @include('layout.header')
    @include('layout.slider')
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            @foreach ($categories as $category)
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="section-title">
                            <h4>{{ $category->categories_name }}</h4>
                        </div>
                    </div>
                </div>
                <div class="row property__gallery">
                    @foreach ($category->SubCategory as $sub_categories)
                        <div class="col-lg-3 col-md-3 col-sm-4 products">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{$sub_categories->sub_categories_images->image1 }}">
                                    <div class="product-details-div"  data-product-id="{{ $sub_categories->id }}"></div>
                                    <ul class="product__hover">
                                        <li><a href="{{ $sub_categories->sub_categories_images->image1 }}" class="image-popup"><span
                                                    class="arrow_expand"></span></a></li>
                                        <li class="wishlist" data-hidden-value="{{ $sub_categories->id }}"><a><span
                                                    class="icon_heart_alt"></span></a></li>
                                        <li class="shoping-cart" data-hidden-value="{{ $sub_categories->id }}">
                                            <a><span class="icon_bag_alt"></span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">{{ $sub_categories->product_title }}</a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">{{ $sub_categories->price . ' PKR' }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            @endforeach
        </div>
        </div>
        </div>
        </div>
    </section>
    <!-- Product Section End -->
    @include('layout.footer')
    @include('Links.jsLinks')
</body>

</html>
