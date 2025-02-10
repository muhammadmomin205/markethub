<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Results</title>
    @include('Links.headerLinks')
</head>

<body>
    @include('layout.sideMenu')
    @include('layout.header')
    <!--  Search Product Section Begin -->
    <section class="product spad search-product">
        <div class="container-fluid">
            @if (!$search_results->isEmpty())
            <div class="row">
                <div class="searching-heading">
                    <h3>Searching results for : <b>{{$searchValue}}</b></h3>
                </div>
            </div>
            <div class="row property__gallery">
                @foreach ($search_results as $item)
                <!-- Handle Type 1 -->
                @if (isset($item->product_name))
                    @foreach ($item->category as $category)
                        @foreach ($category->SubCategory as $sub_categories)
                            <div class="col-lg-3 col-md-3 col-sm-4 products">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg " data-product-id="{{ $sub_categories->id }}"
                                        data-setbg="{{asset($sub_categories->sub_categories_images->image1)}}">
                                        <div class="label new">{{ $category->categories_name }}</div>
                                        <div class="product-details-div"  data-product-id="{{ $sub_categories->id }}"></div>
                                        <ul class="product__hover">
                                            <li><a href="{{asset($sub_categories->sub_categories_images->image1)}}" class="image-popup"><span
                                                        class="arrow_expand"></span></a></li>
                                            <li class="wishlist" data-hidden-value="{{ $sub_categories->id }}">
                                                <a><span class="icon_heart_alt"></span></a></li>
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
                @endif
        
                <!-- Handle Type 2 -->
                @if (isset($item->categories_name))
                    @foreach ($item->SubCategory as $sub_categories)
                        <div class="col-lg-3 col-md-3 col-sm-4 products">
                            <div class="product__item">
                                <div class="product__item__pic set-bg " data-product-id="{{ $sub_categories->id }}"
                                    data-setbg="{{asset($sub_categories->sub_categories_images->image1)}}">
                                    <div class="label new">{{ $item->categories_name }}</div>
                                    <div class="product-details-div"  data-product-id="{{ $sub_categories->id }}"></div>
                                    <ul class="product__hover">
                                        <li><a href="{{asset($sub_categories->sub_categories_images->image1)}}" class="image-popup"><span
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
                                    <div class="product__price">{{ $sub_categories->price . ' PKR' }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
        
                <!-- Handle Type 3 -->
                @if (isset($item->product_title))
                    <div class="col-lg-3 col-md-3 col-sm-4 products">
                        <div class="product__item">
                            <div class="product__item__pic set-bg " data-product-id="{{ $item->id }}"
                                data-setbg="{{asset($item->sub_categories_images->image1)}}">
                                <div class="product-details-div"  data-product-id="{{ $item->id }}"></div>
                                <ul class="product__hover">
                                    <li><a href="{{asset($item->sub_categories_images->image1)}}" class="image-popup"><span
                                                class="arrow_expand"></span></a></li>
                                    <li class="wishlist" data-hidden-value="{{ $item->id }}">
                                        <a><span class="icon_heart_alt"></span></a></li>
                                    <li class="shoping-cart" data-hidden-value="{{ $item->id }}">
                                        <a><span class="icon_bag_alt"></span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">{{ $item->product_title }}</a></h6>

                                <div class="product__price">{{ $item->price . ' PKR' }}</div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach                   
                @else
                <div class="searching-heading">
                    <h3>No results for : <b>{{$searchValue}}</b></h3>
                </div>
                @endif
            </div>
            
        </div>
    </section>
    <!-- Search Product Section End -->
    @include('layout.footer')
    @include('Links.jsLinks')
</body>

</html>
