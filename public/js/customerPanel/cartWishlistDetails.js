$(document).ready(function() {
    $('.shoping-cart').on('click', function() {
        var shopingCartID = $(this).attr("data-hidden-value");
        $.ajax({
            url: 'adding-product-cart' + shopingCartID,
            type: 'GET',
            success: function(response) {
                if (response.status == "success") {
                    toastr.success(response.message, 'Success', {
                        "progressBar": true,
                        "closeButton": true,
                        "extendedTimeOut": "0"
                    });
                    $('.cart_count').text(response.cart_count); 
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
    $('.wishlist').on('click', function() {
        var wishlistCartID = $(this).attr("data-hidden-value");
        $.ajax({
            url: 'adding-product-wishlist' + wishlistCartID,
            type: 'GET',
            success: function(response) {
                if (response.status=="success") {
                    toastr.success(response.message, 'Success', {
                        "progressBar": true,
                        "closeButton": true,
                        "extendedTimeOut": "0"
                    });
                    $('.wishlist_count').text(response.wishlist_count);
                }
                else if(response.status=="failed"){
                    toastr.error(response.message, 'Error', {
                        "progressBar": true,
                        "closeButton": true,
                        "extendedTimeOut": "0"
                    });
                }
            }
        });
    });
    $('.product-details-div').on('click', function() {
        var productId = $(this).attr('data-product-id');
        window.location.href = 'products-details' + productId;
    });
});