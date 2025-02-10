    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><a href="{{ route('shopping-wishlist') }}"><span class="icon_heart_alt"></span>
                <div class="tip wishlist_count">{{ \App\Models\ShoppingWishlist::count() }}</div>
            </a></li>
        <li><a href="{{ route('shopping-cart') }}"><span class="icon_bag_alt"></span>
                <div class="tip cart_count">{{ \App\Models\ShopingCart::count() }}</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <h3 class="philosopher-regular">MARKET HUB</h3>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            @if (Gate::allows('ValidUser'))
            <button class="logout-btn btn btn-dark" type="button">logout</button>
            @else
            <a href="{{route('login')}}">Login</a>
            <a href="{{route('register')}}">Register</a>                               
            @endif
        </div>
    </div>
    <!-- Offcanvas Menu End -->