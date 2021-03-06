<!DOCTYPE html>
<html lang="en">

@include('layout.head')
<body class="animsition">
@include('layout.nav-other')
@include('layout.cart')

<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">

            </h3>
        </div>

        @include('product.filter')

        <div class="row isotope-grid">

            @include('product.ProductsContent')

        </div>
        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45">
            <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Load More
            </a>
        </div>
    </div>
</section>
@include('layout.modal')
@include('layout.footer')
@include('layout.script')
</body>