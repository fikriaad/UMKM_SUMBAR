@extends ('frontend/layouts/app')

@section ('title', 'List UMKM')
@section ('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div>
                <h1 style="text-align: center">UMKM</h1>
            </div>
            <div class="col-md-6">
                <!-- product widget -->
                <div class="product-widget" style="border: 2px solid">
                    <div class="product-img">
                        <img src="{{asset('frontend/img/product09.png')}}" alt="">
                    </div>
                    <div class="product-body">
                        <p class="product-category">Ini Alamat</p>
                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                        <h4 class="product-price">Ini Rating <span class="product-old-price">+62123123</span></h4>
                    </div>
                </div>
                <!-- product widget -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection