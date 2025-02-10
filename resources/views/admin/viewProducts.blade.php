<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Products</title>
    @include('admin.Links.headerLinks')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('admin.layout.sideMenu')
            <!-- Layout container -->
            <div class="layout-page">
                @include('admin.layout.navbar')
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Product Table -->
                        <div class="card">
                            <h5 class="card-header">Products</h5>
                            <div class="card-body">
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Shop Name</th>
                                                <th>Category</th>
                                                <th>Sub Category</th>
                                                <th>Product title</th>
                                                <th>Product description</th>
                                                <th>Price</th>
                                                <th>Color</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sub_categories as $sub_category)
                                                <tr>
                                                    <td>{{ $sub_category->shop->shop_name }}</td>
                                                    <td>{{ $sub_category->products->product_name }}</td>
                                                    <td>{{ $sub_category->category->categories_name }}</td>
                                                    <td>{{ $sub_category->product_title }}</td>
                                                    <td>{{ $sub_category->product_description }}</td>
                                                    <td>{{ $sub_category->price }}</td>
                                                    <td style="background-color:{{ $sub_category->color }};"></td>
                                                    <td><button class="btn btn-danger"><a style="color: white;" href="{{route('admin-deleting-product' , $sub_category->id)}}">Delete</a></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/ Product Table -->
                    </div>
                    <!-- / Content -->

                    @include('admin.layout.footer')

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    @include('admin.Links.jsLinks')
</body>

</html>
