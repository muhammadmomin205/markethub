    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="header__logo">
                        <h3 class="philosopher-regular" style="margin-left: 10px;">MARKET HUB</h3>
                    </div>
                </div>
                <div class="search-bar col-xl-6 col-lg-6">
                    <form class="form-inline my-2 my-lg-0 row" action="{{ route('searching-product') }}" method="POST">
                        @csrf
                        <div class="input-area col-xl-10 col-lg-9 col-md-10 col-sm-10">
                            <input class="form-control @error('search-product-item') is-invalid @enderror" id="search-product-input" name="search-product-item" type="search" placeholder="What are you looking for?" aria-label="Search" value="{{ old('search-product-item') }}">
                            @error('search-product-item')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="button-area col-xl-2 col-lg-3 col-md-2 col-sm-2">
                            <button id="logout-btn" class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                        </div>
                    </form>
                    
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4">
                    <div class="header__right">
                        <div class="header__right__auth">
                            @if (Gate::allows('ValidUser'))
                            <button class="logout-btn btn btn-dark" type="button">logout</button>
                            @else
                            <a href="{{route('login')}}">Login</a>
                            <a href="{{route('register')}}">Register</a>                               
                            @endif
                        </div>
                        <ul class="header__right__widget">
                            <li>
                                <a href="{{ route('shopping-wishlist') }}">
                                    <span class="icon_heart_alt"></span>
                                    <div class="tip wishlist_count">
                                        @if (Auth::check())
                                            {{ \App\Models\ShoppingWishlist::where('user_id', Auth::user()->id)->count() }}
                                        @else
                                            0
                                        @endif
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('shopping-cart') }}">
                                    <span class="icon_bag_alt"></span>
                                    <div class="tip cart_count">
                                        @if (Auth::check())
                                            {{ \App\Models\ShopingCart::where('user_id', Auth::user()->id)->count() }}
                                        @else
                                            0
                                        @endif
                                    </div>
                                </a>
                            </li>                            
                        </ul>
                    </div>
                </div>
                <div class="canvas__open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <nav class="header__menu">
                        <ul>
                            <li class="@if (isset($home)) {{ $home }} @endif"><a
                                    href="{{ route('home') }}">Home</a></li>
                            <li class="@if (isset($women)) {{ $women }} @endif"><a
                                    href="{{ route('women') }}">Women</a>
                                <ul class="dropdown">
                                    @if (isset($products))
                                        @foreach ($products as $product)
                                            @if ($product->product_name == 'women')
                                                @foreach ($product->category as $category)
                                                    <li><a
                                                            href="{{ route('sub-categories', $category->id) }}">{{ $category->categories_name }}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li class="@if (isset($men)) {{ $men }} @endif"><a
                                    href="{{ route('men') }}">Men</a>
                                <ul class="dropdown">
                                    @if (isset($products))
                                        @foreach ($products as $product)
                                            @if ($product->product_name == 'men')
                                                @foreach ($product->category as $category)
                                                    <li><a
                                                            href="{{ route('sub-categories', $category->id) }}">{{ $category->categories_name }}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li class="@if (isset($childern)) {{ $childern }} @endif"><a
                                    href="{{ route('childern') }}">Childern</a>
                                <ul class="dropdown">
                                    @if (isset($products))
                                        @foreach ($products as $product)
                                            @if ($product->product_name == 'childern')
                                                @foreach ($product->category as $category)
                                                    <li><a
                                                            href="{{ route('sub-categories', $category->id) }}">{{ $category->categories_name }}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li class="@if (isset($shoes)) {{ $shoes }} @endif"><a
                                    href="{{ route('shoes') }}">Shoes</a>
                                <ul class="dropdown">
                                    @if (isset($products))
                                        @foreach ($products as $product)
                                            @if ($product->product_name == 'shoes')
                                                @foreach ($product->category as $category)
                                                    <li><a
                                                            href="{{ route('sub-categories', $category->id) }}">{{ $category->categories_name }}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li class="@if (isset($accessories)) {{ $accessories }} @endif"><a
                                href="{{ route('accessories') }}">accessories</a>
                            <ul class="dropdown">
                                @if (isset($products))
                                    @foreach ($products as $product)
                                        @if ($product->product_name == 'accessories')
                                            @foreach ($product->category as $category)
                                                <li><a
                                                        href="{{ route('sub-categories', $category->id) }}">{{ $category->categories_name }}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
