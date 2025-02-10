<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shops</title>
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
                        <!-- Bordered Table -->
                        <div class="card">
                            <h5 class="card-header">Shops</h5>
                            <div class="card-body">
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Shop ID</th>
                                                <th>Owner Name</th>
                                                <th>Shop Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Shop Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($shops as $shop)
                                                <tr>
                                                    <td>{{ $shop->reg_num }}</td>
                                                    <td>{{ $shop->owner_fname . ' ' . $shop->owner_lname }}</td>
                                                    <td>{{ $shop->shop_name }}</td>
                                                    <td>{{ $shop->phone }}</td>
                                                    <td>{{ $shop->email }}</td>
                                                    <td>{{ $shop->shop_address }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/ Bordered Table -->
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
