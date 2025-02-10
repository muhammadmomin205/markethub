<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @include('Links.headerLinks')
    <style>
        .banner{
            margin-top: 0px;
        }
    </style>
</head>

<body>
    @include('layout.sideMenu')
    @include('layout.header', ['home' => 'active'])

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="categories__item categories__large__item set-bg"
                        data-setbg="img/categories/category-1.jpg">
                        <div class="categories__text">
                            <h1>Women’s fashion</h1>
                            <p>Women's fashion is an ever-evolving landscape that showcases elegance, individuality, and
                                creativity.</p>
                            {{-- <p>{{ \App\Models\SubCategory::where('product_id', 1)->count() . ' items' }}</p> --}}
                            <a href="{{ route('women') }}">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg" data-setbg="img/categories/category-2.jpg">
                                <div class="categories__text">
                                    <h4>Men’s fashion</h4>
                                    {{-- <p>{{ \App\Models\SubCategory::where('product_id', 2)->count() . ' items' }}</p> --}}
                                    <a href="{{ route('men') }}">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg" data-setbg="img/categories/category-3.jpg">
                                <div class="categories__text">
                                    <h4>Kid’s fashion</h4>
                                    {{-- <p>{{ \App\Models\SubCategory::where('product_id', 3)->count() . ' items' }}</p> --}}
                                    <a href="{{ route('childern') }}">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg" data-setbg="img/categories/shoes.png">
                                <div class="categories__text">
                                    <h4>Shoes</h4>
                                    {{-- <p>{{ \App\Models\SubCategory::where('product_id', 5)->count() . ' items' }}</p> --}}
                                    <a href="{{ route('shoes') }}">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg" data-setbg="img/categories/category-5.jpg">
                                <div class="categories__text">
                                    <h4>Accessories</h4>
                                    {{-- <p>{{ \App\Models\SubCategory::where('product_id', 4)->count() . ' items' }}</p> --}}
                                    <a href="{{ route('accessories') }}">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!--  latest Product Section Begin -->
    <section class="product spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4>New Products</h4>
                    </div>
                </div>
            </div>
            <div class="row property__gallery">
                @foreach ($products as $product)
                    @foreach ($product->category as $category)
                        @foreach ($category->SubCategory as $sub_categories)
                            <div class="col-lg-3 col-md-3 col-sm-4 products">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg "
                                        data-setbg="{{ asset($sub_categories->sub_categories_images->image1) }}">
                                        <div class="label new">{{ $category->categories_name }}</div>
                                        <div class="product-details-div" data-product-id="{{ $sub_categories->id }}">
                                        </div>
                                        <ul class="product__hover">
                                            <li><a href="{{ asset($sub_categories->sub_categories_images->image1) }}"
                                                    class="image-popup"><span class="arrow_expand"></span></a></li>
                                            <li class="wishlist" data-hidden-value="{{ $sub_categories->id }}"><a><span
                                                        class="icon_heart_alt"></span></a></li>
                                            <li class="shoping-cart" data-hidden-value="{{ $sub_categories->id }}">
                                                <a><span class="icon_bag_alt"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="#">{{ $sub_categories->product_title }}</a></h6>
                                        <div class="product__price">{{ $sub_categories->price . ' PKR' }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
    <!-- latest Product Section End -->

    @include('layout.slider')

    <!--  Most selling Product Section Begin -->
    <section class="product spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4>Most Selling</h4>
                    </div>
                </div>
            </div>
            <div class="row property__gallery">
                @foreach ($products as $product)
                    @foreach ($product->category as $category)
                        @foreach ($category->SubCategory as $sub_categories)
                            <div class="col-lg-3 col-md-3 col-sm-4 products">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg "
                                        data-setbg="{{ asset($sub_categories->sub_categories_images->image1) }}">
                                        <div class="label new">{{ $category->categories_name }}</div>
                                        <div class="product-details-div" data-product-id="{{ $sub_categories->id }}">
                                        </div>
                                        <ul class="product__hover">
                                            <li><a href="{{ asset($sub_categories->sub_categories_images->image1) }}"
                                                    class="image-popup"><span class="arrow_expand"></span></a></li>
                                            <li class="wishlist" data-hidden-value="{{ $sub_categories->id }}"><a><span
                                                        class="icon_heart_alt"></span></a></li>
                                            <li class="shoping-cart" data-hidden-value="{{ $sub_categories->id }}">
                                                <a><span class="icon_bag_alt"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="#">{{ $sub_categories->product_title }}</a></h6>
                                        <div class="product__price">{{ $sub_categories->price . ' PKR' }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
    <!-- Most selling Product Section End -->

    @include('layout.footer')
    @include('Links.jsLinks')
</body>

</html>
