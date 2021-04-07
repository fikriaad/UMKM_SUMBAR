@extends ('frontend/layouts/app2')

@section ('title', 'Home Page')
@section ('content')


<div class="section profle_jumbotron">
    <div class="jumbotron">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <h3>Tutorial Bootstrap Indonesia</h3>
            <p>Panduan belajar bootstrap berbahasa indonesia</p>
        </div>
    </div>
</div>

<!-- HEADER PROFILE -->
<div class="section"  style="padding-top: unset">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-3">
                <img src="{{asset('frontend/img/pp.jpg')}}" alt=""  style="border: 1px solid #D10024; width: 200px; margin-top: -75px; ">
            </div>
            <div class="col-md-8" style="margin-top: 15px">
                <div class="d-flex">
                    <h2>{{$umkm->umkm_nama}}</h2>
                </div>
                <p>
                    <span class="text-icon" title="XP">
                        <i class="fa fa-star"></i> 400 XP
                    </span>
                </p>
                                                                <p>
                    <span class="text-icon">
                        <i class="fa fa-clock-o"></i> Bergabung sejak 11 Nov 2020
                    </span>
                </p>
                <p>
                    <span class="text-icon">
                        <i class="fas fa-map-marker-alt"></i> Kota Padang, Sumatera Barat
                    </span>
                </p>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /HEADER PROFILE -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{asset('frontend/img/shop01.png')}}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Laptop<br>Collection</h3>
                        <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{asset('frontend/img/shop03.png')}}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Accessories<br>Collection</h3>
                        <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{asset('frontend/img/shop02.png')}}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Cameras<br>Collection</h3>
                        <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection
