<!DOCTYPE html>
<html lang="en">
    @include('layout.head')
<body class="animsition">

	@include('layout.nav')
    @include('layout.cart')
    @include('layout.slider')
    @include('layout.icons')
    @include('layout.product')         {{--contains include('layout.filter') and include('ProductsContent')--}}
    @include('layout.footer')
    @include('layout.modal')
    @include('layout.script')


</body>
</html>