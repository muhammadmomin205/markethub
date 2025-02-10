<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>
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
                          <h5 class="card-header">Orders</h5>
                          <div class="card-body">
                            <div class="table-responsive text-nowrap">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Reciever Name</th>
                                    <th>Reciever Phone</th>
                                    <th>Sender Name</th>
                                    <th>Sender Phone</th>
                                    <th>Shop Name</th>
                                    <th>To Shipped</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Net price</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($orders as $order )
                                  <tr>
                                      <td>{{ $order->first_name . " " . $order->last_name }}</td>
                                      <td>{{ $order->phone }}</td>
                                      <td>{{ $order->shop->owner_fname . " " . $order->shop->owner_lname }}</td>
                                      <td>{{ $order->shop->phone }}</td>
                                      <td>{{$order->shop->shop_name}}</td>
                                      <td>{{ $order->street_address }}</td>
                                      <td>{{ $order->product_title }}</td>
                                      <td>{{ $order->product_quantity }}</td>
                                      <td>{{ $order->product_price }}</td>
                                      <td>{{ $order->total_price }}</td>
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
