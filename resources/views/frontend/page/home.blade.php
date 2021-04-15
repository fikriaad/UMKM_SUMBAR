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
                            <div class="item">
                                <a href="product#{{ $kategori->kategori_nama }}">
                                    <img src="{{asset('img/backend/kategori/'.$kategori->kategori_gambar)}}" alt="">
                                </a>
                            </div>
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
                    <div id="{{ $kategori->kategori_nama }}" class="section-title">
                        <h3 class="title">Best Product</h3>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div class="tab-pane active">
                                
                                    <!-- product -->
                                    @foreach($product as $no => $products)
                                        <div class="col-md-3">
                                            <div class="product">
                                                <a href="{{route('detailProduct',$products->barang_id)}}">
                                                    <div class="product-img">
                                                        <img src="{{asset('img/frontend/product/'.$products->barang_gambar)}}" alt="">
                                                    </div>
                                                    <div class="product-body">
                                                        <p class="product-category">{{$products->kategori_nama}}</p>
                                                        <h3 class="product-name">{{$products->barang_nama}}</h3>
                                                        <h4 class="product-price">Rp {{ number_format($products->barang_harga) }}
                                                            <!-- <del class="product-old-price">$990.00</del> -->
                                                        </h4>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <a href="{{$wa.$products->umkm_nohp}}"><button class="add-to-cart-btn"><i class="fa fa-whatsapp" style="background-color: #29499C; color: #fff; border-radius: 50px 0px 0px 50px; margin-top: -2px; margin-left: -1px"></i> whatsapp</button></a>
                                                    </div>
                                            </a>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- /product -->
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
                                    <a href="{{ route('detailUmkm', $umkms->umkm_id) }}">
                                        <div class="product-img">
                                            <img src="{{asset('img/frontend/logo_umkm/'.$umkms->umkm_foto)}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$umkms->kategori_nama}}</p>
                                            <h3 class="product-name">{{$umkms->umkm_nama}}</h3>
                                            <h4 class="product-price">{{$umkms->umkm_alamat}} 
                                                <span class="product-old-price">{{$umkms->umkm_nohp}}</span>
                                            </h4>
                                        </div>
                                    </a>
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
                            @foreach($umkm as $no => $umkmn)
                                <!-- product widget -->
                                <div class="product-widget">
                                    <a href="{{ route('detailUmkm', $umkms->umkm_id) }}">
                                        <div class="product-img">
                                            <img src="{{asset('img/frontend/logo_umkm/'.$umkmn->umkm_foto)}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$umkmn->kategori_nama}}</p>
                                            <h3 class="product-name">{{$umkmn->umkm_nama}}</h3>
                                            <h4 class="product-price">{{$umkmn->umkm_alamat}}
                                                <span class="product-old-price">{{$umkmn->umkm_nohp}}</span>
                                            </h4>
                                        </div>
                                    </a>
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