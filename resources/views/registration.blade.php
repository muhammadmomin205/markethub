<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    @include('Links.headerLinks')
    <link rel="stylesheet" href="{{ asset('css/registration.css') }}">
</head>

<body>
    @include('layout.sideMenu')
    @include('layout.header')
    <div class="signup-container col-lg-6 col-md-10 col-sm-11">
        <div id="successMsg" style="display:none;" class="alert alert-success"></div>
        <div id="errorMsg" style="display:none;" class="alert alert-danger"></div>
        <div class="signup-options">
            <div id="artistTab" class="signup-tab active" onclick="showArtistForm()">
                <div class="tab-icon"></div>
                <h3>Seller signup</h3>
                <p>Set up shop and start selling your products</p>
            </div>
            <div id="customerTab" class="signup-tab" onclick="showCustomerForm()">
                <div class="tab-icon"></div>
                <h3>Customer signup</h3>
                <p>Browse the marketplace and find your thing</p>
            </div>
        </div>

        <form id="artistForm" class="signup-form search-shop" method="POST">
            @csrf
            <select class="form-select market" name="market">
                <option value="">Select market</option>
                @foreach ($markets as $market)
                    <option value="{{ $market->id }}">{{ $market->market_name }}</option>
                @endforeach
            </select>
            <input type="text" placeholder="REG ID" name="reg_num" class="reg_num">
            <button type="submit">Show Results</button>
        </form>
        <form class="signup-form search-signup-form" method="POST">
            @csrf
            <input type="hidden" name="user_type" value="seller">
            <input type="hidden" name="shop_id">
            <input type="text" name="owner_first_name" class="owner_first_name" readonly placeholder="First Name">
            <input type="text" name="owner_last_name" class="owner_last_name" readonly placeholder="Last Name">
            <input type="text" name="owner_phone" class="owner_phone" readonly placeholder="Phone no:">
            <input type="email" name="owner_email" class="owner_email" readonly placeholder="Email">
            <input type="password" name="owner_password" class="owner_password" placeholder="Password">
            <button type="submit">Create Shop</button>
            <p style="margin-top: 10px;">Already have an account ? <a href="{{route('login')}}">Login</a></p>
        </form>

        <form id="customerForm" class="signup-form hidden" method="POST">
            @csrf
            <input type="hidden" name="user_type" value="customer">
            <input type="text" placeholder="First Name" class="fname" name="fname">
            <input type="text" placeholder="Last Name" class="lname" name="lname">
            <input type="text" placeholder="Phone no:" class="phone" name="phone">
            <input type="text" placeholder="Email" class="email" name="email">
            <input type="password" placeholder="Password" class="password" name="password">
            <button type="submit">Signup</button>
            <p style="margin-top: 10px;">Already have an account ? <a href="{{route('login')}}">Login</a></p>
        </form>
    </div>
    @include('layout.footer')
    @include('Links.jsLinks')
    <script>
        $(document).ready(function() {
            $(".search-signup-form").addClass('hidden');

            function showArtistForm() {
                $("#artistForm").removeClass("hidden");
                $("#customerForm").addClass("hidden");
                $("#artistTab").addClass("active");
                $("#customerTab").removeClass("active");
                let firstName = $('input[name="owner_first_name"]').val();
                let lastName = $('input[name="owner_last_name"]').val();
                let phone = $('input[name="owner_phone"]').val();
                let email = $('input[name="owner_email"]').val();
                if(firstName && lastName && phone && email){
                    $(".search-signup-form").removeClass('hidden');

                }
            }

            function showCustomerForm() {
                $("#artistForm").addClass("hidden");
                $("#customerForm").removeClass("hidden");
                $("#artistTab").removeClass("active");
                $("#customerTab").addClass("active");
                $(".search-signup-form").addClass('hidden');
            }

            // Bind click events to the tabs
            $("#artistTab").click(function() {
                showArtistForm();
            });

            $("#customerTab").click(function() {
                showCustomerForm();
            });
            $('#customerForm').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: '/register-data',
                    type: 'POST',
                    data: $(this).serialize(),
                    beforeSend: function() {
                        $('#successMsg').css('display', 'none');
                        $('#errorMsg').css('display', 'none');
                        $('input').css('border', '');
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
                                scrollTop: $('#errorMsg').offset().top - 130
                            }, 500);
                        } else if (response.status == 'success') {
                            $('#customerForm')[0].reset();
                            Swal.fire({
                                title: "Signup Successful",
                                text: response.message,
                                icon: "success"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Redirect to the specified URL when the user clicks "OK"
                                    window.location.href = '/';
                                }
                            });
                        }
                    }

                });
            });
            $('.search-shop').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: '/search-shop',
                    type: 'POST',
                    data: $(this).serialize(),
                    beforeSend: function() {
                        $('#successMsg').css('display', 'none');
                        $('#errorMsg').css('display', 'none');
                        $('input').css('border', '');
                        $('select').css('border', '');
                    },
                    success: function(response) {
                        if (response.status == 'errors') {
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
                                scrollTop: $('#errorMsg').offset().top - 130
                            }, 500);
                        } else if (response.status == 'failed') {
                            $('#errorMsg').css('display', 'block');
                            $('#errorMsg').html(response.message);
                            // Scroll to success message
                            $('html, body').animate({
                                scrollTop: $('#errorMsg').offset().top - 130
                            }, 500);
                        } else if (response.status == 'success') {
                            $('.search-shop').css('display', 'none');
                            $('#successMsg').css('display', 'block');
                            $('#successMsg').html(response.message);
                            // Scroll to success message
                            $('html, body').animate({
                                scrollTop: $('#successMsg').offset().top - 130
                            }, 500);
                            // Display the form
                            $(".search-signup-form").removeClass('hidden');
                            // Pre-fill the form fields with shop details from the response
                            let shop = response.shop_details[0];
                            $('input[name="shop_id"]').val(shop.id);
                            $('input[name="owner_first_name"]').val(shop.owner_fname);
                            $('input[name="owner_last_name"]').val(shop.owner_lname);
                            $('input[name="owner_phone"]').val(shop.phone);
                            $('input[name="owner_email"]').val(shop.email);
                        }
                    }

                });
            });
            $('.search-signup-form').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: '/register-shopkeeperData',
                    type: 'POST',
                    data: $(this).serialize(),
                    beforeSend: function() {
                        $('#successMsg').css('display', 'none');
                        $('#errorMsg').css('display', 'none');
                        $('input').css('border', '');
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
                                scrollTop: $('#errorMsg').offset().top - 130
                            }, 500);
                        } else if (response.status == 'success') {
                            $('.search-signup-form')[0].reset();
                            Swal.fire({
                                title: "Shop created successfully",
                                text: response.message,
                                icon: "success"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Redirect to the specified URL when the user clicks "OK"
                                    window.location.href = '/dashboard';
                                }
                            });
                        }
                    }

                });
            });
        });
    </script>
</body>

</html>
