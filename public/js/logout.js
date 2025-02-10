$(document).ready(function() {
    $('.logout-btn').on('click', function() {
        $.ajax({
            url: '/logout', 
            type: 'GET', 
            success: function(response) {
                Swal.fire({
                            title: "Logout Successful",
                            text: response.message,
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect to the specified URL when the user clicks "OK"
                                window.location.href = '/';
                            }
                        });
            }
        });
    });
});