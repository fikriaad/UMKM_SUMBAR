@extends ('frontend/layouts/app')

@section ('title', 'Home Page')
@section ('content')

    <!-- SLIDER -->
    <div class="section" style="padding-top: 0px !important">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="owl-carousel owl-slider owl-theme">
                    @foreach ($slider as $no => $slider)
                    <div class="item" ><img src="{{asset('img/backend/slider/'.$slider->slider_gambar)}}" alt=""></div>
                    @endforeach
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SLIDER -->

    <!-- KATEGORI -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">        
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Kategori</h3>
                    </div>
                </div>
                <!-- /section title -->

                <div class="col-md-12">
                    <div class="owl-carousel owl-kategory owl-theme">
                    @foreach ($kategori as $no => $kategori)
                        <div class="item"><img src="{{asset('img/backend/kategori/'.$kategori->kategori_gambar)}}" alt=""></div>
                    @endforeach
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /KATEGORI -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Best Products</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                                <li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
                                <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                                <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    @foreach($product as $no => $products)
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{asset('img/frontend/product/'.$products->barang_gambar)}}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Category</p>
                                                <h3 class="product-name"><a href="#">{{$products->barang_nama}}</a></h3>
                                                <h4 class="product-price">Rp {{$products->barang_harga}}
                                                    <!-- <del class="product-old-price">$990.00</del> -->
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-6 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Best UMKM</h4>
                        <div class="section-nav">
                            <div id="slick-nav-3" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                        <div>
                            @foreach($umkm as $no => $umkms)
                            <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{asset('img/frontend/logo_umkm/'.$umkms->umkm_foto)}}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                    </div>
                                <!-- /product widget -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">New UMKM</h4>
                        <div class="section-nav">
                            <div id="slick-nav-4" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-4">
                        <div>
                            @foreach($umkm as $no => $umkm)
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{asset('img/frontend/logo_umkm/'.$umkm->umkm_foto)}}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                    </div>
                                <!-- /product widget -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- <div class="clearfix visible-sm visible-xs"></div> -->

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <!-- <div class="row"> -->
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>10</h3>
                                    <span>Kemaren</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>34</h3>
                                    <span>Sekarang</span>
                                </div>
                            </li>
                        </ul>
                        <h2 class="text-uppercase">ini iklan</h2>
                        <p>New Collection Up to 50% OFF</p>
                        <a class="primary-btn cta-btn" href="#">Shop now</a>
                    </div>
                </div>
            <!-- </div> -->
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->



@endsection