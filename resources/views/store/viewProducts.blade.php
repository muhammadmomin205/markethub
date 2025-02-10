<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
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
                        <!-- Product Table -->
                        <div class="card">
                          <h5 class="card-header">Products</h5>
                          <div class="card-body">
                            <div class="table-responsive text-nowrap">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Product title</th>
                                    <th>Product description</th>
                                    <th>Price</th>
                                    <th>Color</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach ($sub_categories as $sub_category )
                                <tr>
                                    <td>{{$sub_category->products->product_name}}</td>
                                    <td>{{$sub_category->category->categories_name}}</td>
                                    <td>{{$sub_category->product_title}}</td>
                                    <td>{{$sub_category->product_description}}</td>
                                    <td>{{$sub_category->price}}</td>
                                    <td style="background-color:{{ $sub_category->color }};"></td>
                                    <td>
                                      <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                          <i class="ri-more-2-line"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                          <a class="dropdown-item" href="{{route('update-product', $sub_category->id)}}"><i class="ri-pencil-line me-1"></i> Edit</a>
                                          <a class="dropdown-item deleteProduct" data-hidden-value={{$sub_category->id}}><i class="ri-delete-bin-6-line me-1"></i> Delete</a>
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
                        <!--/ Product Table -->
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
<script>
    $(document).ready(function() {
    $('.deleteProduct').on('click', function() {
        var id= $(this).attr("data-hidden-value");
        $.ajax({
            url: 'deleting-product' + id,
            type: 'GET',
            success: function(response) {
                if (response.status == "success") {
                    toastr.success(response.message, 'Success', {
                        "progressBar": true,
                        "closeButton": true,
                        "extendedTimeOut": "0"
                    });
                    window.location.href='/view-products'
                } else if (response.status == "failed") {
                    toastr.error(response.message, 'Error', {
                        "progressBar": true,
                        "closeButton": true,
                        "extendedTimeOut": "0"
                    });
                }
            }
        });
    });
});
</script>
</body>
</html>
