<!DOCTYPE html>
<html lang="en">
@include('layout.head')
<body class="animsition">

@include('layout.nav-other')
@include('layout.cart')
@include('cart.cart-details')
@include('layout.footer')
@include('layout.modal')
@include('layout.script')
<script>

    function updateCart() {

        $.ajax({
            url: '/rmvCartProduct',
            // data: {"ProductId": $(this).attr('data-ProductId')},
            type: "delete",
        }).done(function (response) {                 //remove items from cart
            if (!$.trim(response.cartItems))                   //in case of empty response return "no items in your cart"
            {
                $('.m-l-25').remove();
                $('.col-lg-10').append(
                    '<div class="m-l-25 m-r--38 m-lr-0-xl">' +
                    '<div class="wrap-table-shopping-cart txt-center">' +
                    '<div>No items in the cart</div>' +
                    '</div>' +
                    '</div>');
                $('.icon-header-item').attr('data-notify',response.cartQuantity);

            }
            else                                    //in case of response with data return and append data to "table-shopping-cart" class
            {
                $('.table_row').remove();
                $('.table-shopping-cart').append(response.cartItems);
                $('.icon-header-item').attr('data-notify',response.cartQuantity);
            }


        });


    }

    $(document).ready(function () {
        $(this).on('click', '.how-itemcart1', function () {

            $.ajax({
                url: '/rmvCartProduct',
                data: {"ProductId": $(this).attr('data-ProductId')},
                type: "delete",
            }).done(function (response) {                 //remove items from cart
                if (!$.trim(response.cartItems))                   //in case of empty response return "no items in your cart"
                    {
                    $('.m-l-25').remove();
                    $('.col-lg-10').append(
                        '<div class="m-l-25 m-r--38 m-lr-0-xl">' +
                            '<div class="wrap-table-shopping-cart txt-center">' +
                                '<div>No items in the cart</div>' +
                                '</div>' +
                            '</div>');
                        $('.icon-header-item').attr('data-notify',response.cartQuantity);
                }
                else                                    //in case of response with data, return and append data to "table-shopping-cart" class
                {
                    $('.table_row').remove();
                    $('.table-shopping-cart').append(response.cartItems);
                    $('.icon-header-item').attr("data-notify",response.cartQuantity);
                }
            });
        });
    });

</script>

</body>
</html>