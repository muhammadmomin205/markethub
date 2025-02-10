<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <h3 class="philosopher-regular">MARKET HUB</h3>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="menu-toggle-icon d-xl-block align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons ri-home-smile-line"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>


        <!-- Forms & Tables -->
        <li class="menu-header fw-medium mt-4"><span class="menu-header-text">Manage Products</span></li>
        <!-- Forms -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ri-radio-button-line"></i>
                <div data-i18n="Form Elements">Products</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('add-products') }}" class="menu-link">
                        <div data-i18n="Basic Inputs">Add Products</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('view-products') }}" class="menu-link">
                        <div data-i18n="Input groups">View Products</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ri-box-3-line"></i>
                <div data-i18n="Form Layouts">Orders</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('view-orders') }}" class="menu-link">
                        <div data-i18n="Vertical Form">View Orders</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
