<!DOCTYPE html>
<html lang="en">
@include('layout.head')
<body class="animsition">

@include('layout.nav-other')
@include('layout.cart')

@include('product-details.product-details')

<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">

            </h3>
        </div>


        <!-- Related Products -->
        <section class="sec-relate-product bg0 p-t-45 p-b-105">
            <div class="container">
                <div class="p-b-45">
                    <h3 class="ltext-106 cl5 txt-center">
                        Related Products
                    </h3>
                </div>

                <!-- Slide2 -->
                <div class="wrap-slick2">
                    <div class="slick2">
                        <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row isotope-grid">

                @include('product.ProductsContent')

            </div>
        </section>

        <!-- Load more -->
        {{--<div class="flex-c-m flex-w w-full p-t-45">--}}
            {{--<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">--}}
                {{--Load More--}}
            {{--</a>--}}
        {{--</div>--}}
    </div>
</section>

@include('layout.modal')
@include('layout.footer')
@include('layout.script')


<script>
    /*AJAX add to cart functionality*/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('document').ready(function(){
        $('.js-addcart-detail').on('click',function(e){
            e.preventDefault();
        $.ajax({
            url: "/cart",
            data: $("#ProductDetails").serialize(),
            type: 'post',
        }).done(function(data)
        {
            $('.js-addcart-detail').each(function()
            {

                var nameProduct = $(".sec-product-detail").find('.mtext-105').html();       //Get product name
                if(data==="false")
                {
                   swal(nameProduct, "is in your cart !", "info");
                }

                else
                {
                    swal(nameProduct, "is added to cart !", "success");
                    $('.icon-header-item').attr('data-notify',data);                    //update data-notify number of the cart
                }

            });
        });

        });



    });
</script>

</body>
</html>