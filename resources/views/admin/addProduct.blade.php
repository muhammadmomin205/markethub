<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add products</title>
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
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Basic Layout -->
                        <div class="row">
                            <div class="col-xl">
                                <div class="card mb-6">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Add Product</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{route('admin-add-products-data')}}">
                                            @csrf
                                            <div class="form-floating form-floating-outline mb-6">
                                                <input type="text" class="form-control" id="basic-default-fullname"
                                                  name="product"  placeholder="Product Name" required />
                                                <label for="basic-default-fullname">Product Name</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl">
                                <div class="card mb-6">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Add Categories</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{route('admin-add-category-data')}}">
                                            @csrf
                                            <div class="form-floating form-floating-outline mb-6">
                                                <select class="form-select" required id="exampleFormControlSelect1"
                                                    aria-label="Default select example" name="product_id">
                                                    <option value="">Select Product</option>
                                                     @foreach ($products as $product )
                                                      <option value="{{$product->id}}">{{$product->product_name}}</option>   
                                                     @endforeach
                                                </select>
                                                <label for="exampleFormControlSelect1">Select Product</label>
                                            </div>
                                            <div class="form-floating form-floating-outline mb-6">
                                                <input required type="text" class="form-control" id="basic-default-fullname"
                                                    placeholder="Category Name"  name="category"/>
                                                <label for="basic-default-fullname">Category Name</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
