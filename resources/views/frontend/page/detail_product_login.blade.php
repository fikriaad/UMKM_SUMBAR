@extends ('frontend/layouts/app2')

@section ('title', 'Produk')
@section ('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        @csrf
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <!-- <div class="product-preview"> -->
                        <img src="{{asset('img/frontend/product/' . $barang->barang_gambar)}}" alt="">
                    <!-- </div> -->
                    @foreach($gambar as $no => $row)
                        <!-- <div class="product-preview"> -->
                            <img src="{{asset('img/frontend/gambar/' . $row->gambar_foto)}}" alt="">
                        <!-- </div> -->
                    @endforeach
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    <div class="product-preview">
                        <img src="{{asset('img/frontend/product/' . $barang->barang_gambar)}}" alt="">
                    </div>
                    @foreach($gambar as $no => $row)
                        <div class="product-preview">
                            <img src="{{asset('img/frontend/gambar/' . $row->gambar_foto)}}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name">{{$barang->barang_nama}}</h2>
                    <div>
                        <h3 class="product-price">Rp {{ number_format($barang->barang_harga) }} <del class="product-old-price">-</del></h3>
                        <span class="product-available">In Stock</span>
                    </div>
                    <p>{!!$barang->barang_keterangan!!}</p>

                    <!-- <div class="product-options">
                        <label>
                            Size
                            <select class="input-select">
                                <option value="0">X</option>
                            </select>
                        </label>
                        <label>
                            Color
                            <select class="input-select">
                                <option value="0">Red</option>
                            </select>
                        </label>
                    </div>

                    <div class="add-to-cart">
                        <div class="qty-label">
                            Qty
                            <div class="input-number">
                                <input type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>

                    <ul class="product-btns">
                        <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                    </ul> -->

                    <ul class="product-links">
                        <li>Kategori:</li>
                        <li><a href="#">{{$barang->kategori_nama}}</a></li>
                        <li><a href="#">{{$barang->sub_nama}}</a></li>
                    </ul>
<!-- 
                    <div class="add-to-cart"  style="margin-top: 50px">
                        <a href="">
                            <button class="add-to-cart-btn">
                                <i class="fa fa-info" style="background-color: #29499C; color: #fff; border-radius: 50px 0px 0px 50px; margin-top: -2px; margin-left: -1px;">
                                </i> detail
                            </button>
                        </a>
                    </div> -->
                    <!-- <ul class="product-links">
                        <li>Share:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul> -->

                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                        <!-- <li><a data-toggle="tab" href="#tab2">Reviews (3)</a></li> -->
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>{!!$barang->barang_keterangan!!}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection