<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @include('Links.headerLinks')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    @include('layout.sideMenu')
    @include('layout.header')
    <div class="login-container col-lg-6 col-md-10 col-sm-11">
        <div id="successMsg" style="display:none;" class="alert alert-success"></div>
        <div id="errorMsg" style="display:none;" class="alert alert-danger"></div>
        <p class="h1">Login here</p>
        <form class="login-form" method="POST">
            @csrf
            <input type="text" name="email" class="email" placeholder="Email">
            <input type="password" name="password" class="password" placeholder="Password">
            <button type="submit">Login</button>
            <p style="margin-top: 10px;">Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
        </form>
    </div>
    @include('layout.footer')
    @include('Links.jsLinks')
    <script>
        $(document).ready(function() {
            $('.login-form').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: '/login-data',
                    type: 'POST',
                    data: $(this).serialize(),
                    beforeSend: function() {
                        $('#successMsg').css('display', 'none');
                        $('#errorMsg').css('display', 'none');
                        $('input').css('border', '');
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
                        } else if (response.status == 'success') {
                            $('.login-form')[0].reset();
                            Swal.fire({
                                title: "Login Successful",
                                text: response.message,
                                icon: "success"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    if(response.user == 'seller'){
                                        window.location.href = '/dashboard';

                                    }
                                    else if(response.user == 'customer'){
                                        window.location.href = '/';
                                    }
                                    else if(response.user == 'admin'){
                                        window.location.href = '/admin-dashboard';
                                    }
                                }
                            });
                        } else if (response.status == 'failed') {
                            $('#errorMsg').css('display', 'block');
                            $('#errorMsg').html(response.message);
                            // Scroll to success message
                            $('html, body').animate({
                                scrollTop: $('#errorMsg').offset().top - 130
                            }, 500);
                        }
                    }

                });
            });
        });
    </script>
</body>

</html>
