<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>
    @include('store.Links.headerLinks')
</head>

<body>
   <!-- Layout wrapper -->
   <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('store.layout.sideMenu')
        <!-- Layout container -->
        <div class="layout-page">
            @include('store.layout.navbar')
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
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Zip code</th>
                                    <th>Appartment/Unit/Suit</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Net price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($orders as $order )
                                  <tr>
                                      <td>{{ $order->first_name . " " . $order->last_name }}</td>
                                      <td>{{ $order->phone }}</td>
                                      <td>{{ $order->email }}</td>
                                      <td>{{ $order->street_address }}</td>
                                      <td>{{ $order->zip_code }}</td>
                                      @if (isset($order->app_sui_unit))
                                          <td>{{ $order->app_sui_unit }}</td>
                                      @else
                                          <td>No optional address</td>
                                      @endif
                                      <td>{{ $order->product_title }}</td>
                                      <td>{{ $order->product_quantity }}</td>
                                      <td>{{ $order->product_price }}</td>
                                      <td>{{ $order->total_price }}</td>
                                      @if ($order->status == 'Pending')
                                      <td><span class="badge rounded-pill bg-label-warning me-1">{{$order->status}}</span></td>  
                                      @elseif ($order->status == 'Out Of Stock')  
                                      <td><span class="badge rounded-pill bg-label-primary me-1">{{$order->status}}</span></td>
                                      @elseif ($order->status == 'Scheduled')
                                      <td><span class="badge rounded-pill bg-label-info me-1">{{$order->status}}</span></td> 
                                      @elseif ($order->status == 'Completed')
                                      <td><span class="badge rounded-pill bg-label-success me-1">{{$order->status}}</span></td>                                   
                                      @endif
                                      <td>
                                        <div class="dropdown">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="ri-more-2-line"></i>
                                          </button>
                                          <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('order-status' , ['status' => 'Out Of Stock', 'order_id' => $order->id  , 'user_id' => $order->user_id])}}"><i class="fa fa-shopping-basket me-3" aria-hidden="true"></i>Out of Stock</a>
                                            <a class="dropdown-item" href="{{route('order-status' , ['status' => 'Scheduled', 'order_id' => $order->id  , 'user_id' => $order->user_id])}}"><i class="fa fa-calendar me-3" aria-hidden="true"></i>Scheduled</a>
                                            <a class="dropdown-item" href="{{route('order-status' , ['status' => 'Completed', 'order_id' => $order->id  , 'user_id' => $order->user_id])}}"><i class="ri-delete-bin-6-line me-1"></i> Completed</a>
                                          </div>
                                        </div>
                                      </td>
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

       @include('store.layout.footer')

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
@include('store.Links.jsLinks')
</body>
</html>
