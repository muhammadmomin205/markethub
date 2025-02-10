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
                        <!-- Basic Layout & Basic with Icons -->
                        <div class="row">
                            <!-- Basic Layout -->
                            <div class="col-xxl">
                                <div class="card mb-6">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Add Shops</h5>
                                    </div>
                                    <div class="card-body">
                                     <form method="POST" action="{{route('admin-add-shops-data')}}">
                                        @csrf
                                        <div class="form-floating form-floating-outline mb-6">
                                            <select class="form-select" required id="exampleFormControlSelect1"
                                                aria-label="Default select example" name="market_id">
                                                <option value="">Select Market</option>
                                                @foreach ($markets as $market )
                                                <option value="{{$market->id}}">{{$market->market_name}}</option>                                                  
                                                @endforeach
                                            </select>
                                            <label for="exampleFormControlSelect1">Select Market</label>
                                        </div>
                                        <div class="form-floating form-floating-outline mb-6">
                                            <input type="text" class="form-control" id="basic-default-fullname"
                                              name="shop"  placeholder="Shop Name" required />
                                            <label for="basic-default-fullname">Shop Name</label>
                                        </div>
                                        <div class="form-floating form-floating-outline mb-6">
                                            <input type="text" class="form-control" id="basic-default-fullname"
                                              name="first_name"  placeholder="First Name" required />
                                            <label for="basic-default-fullname">First Name</label>
                                        </div>
                                        <div class="form-floating form-floating-outline mb-6">
                                            <input type="text" class="form-control" id="basic-default-fullname"
                                              name="last_name"  placeholder="Last Name" required />
                                            <label for="basic-default-fullname">Last Name</label>
                                        </div>
                                        <div class="form-floating form-floating-outline mb-6">
                                            <input type="email" class="form-control" id="basic-default-fullname"
                                              name="email"  placeholder="Email" required />
                                            <label for="basic-default-fullname">Email</label>
                                        </div>
                                        <div class="form-floating form-floating-outline mb-6">
                                            <input type="text" class="form-control" id="basic-default-fullname"
                                              name="phone"  placeholder="Phone" required />
                                            <label for="basic-default-fullname">Phone</label>
                                        </div>
                                        <div class="form-floating form-floating-outline mb-6">
                                            <input type="text" class="form-control" id="basic-default-fullname"
                                              name="address"  placeholder="Adresss" required />
                                            <label for="basic-default-fullname">Address</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add Shop</button>
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
