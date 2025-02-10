<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Product</title>
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
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Basic Layout & Basic with Icons -->
                        <div class="row">
                            <!-- Basic Layout -->
                            <div class="col-xxl">
                                <div class="card mb-6">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Update Products</h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="successMsg" style="display:none;" class="alert alert-success"></div>
                                        <div id="errorMsg" style="display:none;" class="alert alert-danger"></div>
                                        <form id="updateProducts" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="sub_category_id" value="{{$sub_category->id}}">
                                            <div class="row mb-4">
                                                <label class="col-sm-2 col-form-label">Product</label>
                                                <div class="col-sm-10">
                                                    <select id="smallSelect"
                                                        class="form-select form-select-sm select-products product"
                                                        name="product">
                                                        <option value="">Select products</option>
                                                        @foreach ($products as $product)
                                                            <option @if ($sub_category->products->product_name == $product->product_name ) selected @endif value="{{ $product->id }}">{{$product->product_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label class="col-sm-2 col-form-label">Sub Product </label>
                                                <div class="col-sm-10">
                                                    <select id="smallSelect"
                                                        class="form-select form-select-sm select-sub-products category"
                                                        name="category">
                                                        <option value="">Select sub products</option>
                                                        @foreach ($categories as $categories)
                                                        <option @if ($sub_category->category->categories_name == $categories->categories_name ) selected @endif value="{{ $categories->id}}">{{$categories->categories_name}}</option>
                                                    @endforeach   
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label class="col-sm-2 col-form-label">Product Title</label>
                                                <div class="col-sm-10 form-floating form-floating-outline">
                                                    <input id="smallInput" class="form-control form-control-sm title"
                                                        type="text" placeholder="" name="title" value="{{$sub_category->product_title}}" />
                                                    <label for="html5-text-input">Title</label>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label class="col-sm-2 col-form-label">Product Details</label>
                                                <div class="col-sm-10 form-floating form-floating-outline">
                                                    <textarea class="form-control h-px-100 description" id="exampleFormControlTextarea1" placeholder="" name="description" >{{$sub_category->product_description}}</textarea>
                                                    <label for="exampleFormControlTextarea1">Product details</label>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label class="col-sm-2 col-form-label">Product Price</label>
                                                <div class="col-sm-10 form-floating form-floating-outline">
                                                    <input id="smallInput" class="form-control form-control-sm price"
                                                        type="text" placeholder="" name="price" value="{{$sub_category->price}}" />
                                                    <label for="html5-text-input">Price</label>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label class="col-sm-2 col-form-label">Product Color</label>
                                                <div class="col-sm-10 form-floating form-floating-outline">
                                                    <input class="form-control color" type="color"
                                                        id="html5-color-input" name="color" value="{{$sub_category->color}}"/>
                                                    <label for="html5-color-input">Color</label>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label class="col-sm-2 col-form-label"> Product size</label>
                                                <div class="col-sm-10">
                                                    <select id="smallSelect" class="form-select form-select-sm size"
                                                        name="size">
                                                        <option value="">Select product size</option>
                                                        @foreach ($sizes as $size)
                                                            <option @if ($sub_category->sizes->sizes == $size->sizes) selected @endif value="{{ $size->id }}">{{ $size->sizes }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label class="col-sm-2 col-form-label">Choose Images</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control images" type="file" id="formFile"
                                                        multiple name="images[]" />
                                                </div>
                                            </div>

                                            <div class="row justify-content-end">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<script>
    $(document).ready(function() {
        $('#updateProducts').on('submit', function(event) {
            event.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url: "{{ route('updating-productData') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#successMsg').css('display', 'none');
                    $('#errorMsg').css('display', 'none');
                    $('input').css('border', '');
                    $('textarea').css('border', '');
                    $('select').css('border', '');
                },
                success: function(response) {
                    if (response.status == 'failed') {
                        var errors = response.errors;
                        $.each(errors, function(field, messages) {
                            // Add red border to the invalid field based on the class name
                            $('.' + field).css('border', '2px solid red');
                        });
                        // Display error messages
                        $('#errorMsg').css('display', 'block');
                        let errorMsg = '<ul>';
                        $.each(errors, function(key, value) {
                            errorMsg += '<li>' + value[0] + '</li>';
                        });
                        errorMsg += '</ul>';
                        $('#errorMsg').html(errorMsg);

                        // Scroll to error message
                        $('html, body').animate({
                            scrollTop: $('#errorMsg').offset().top
                        }, 500);
                    } else if (response.success) {
                        toastr.success(response.message, 'Success', {
                        "progressBar": true,
                        "closeButton": true,
                        "extendedTimeOut": "0"
                    });
                    window.location.href='/view-products';
                    }
                }
            });
        });
        $('.select-products').change(function() {
            var selectedProductID = $(this).val();
            if (!selectedProductID == "") {
                $.ajax({
                    url: '/select-products' + selectedProductID,
                    type: "GET",
                    success: function(response) {
                        if (response.category_data) {
                            $('.select-sub-products').empty();
                            $('.select-sub-products').append(
                                '<option value="">Select sub products</option>');
                            $.each(response.category_data, function(index, category) {
                                $('.select-sub-products').append('<option value="' +
                                    category.id + '">' + category
                                    .categories_name + '</option>');
                            });
                        }

                    }

                });
            }
        });
    });
</script>
</html>
