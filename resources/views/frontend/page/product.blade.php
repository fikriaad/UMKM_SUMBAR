    @extends ('frontend/layouts/app')

    @section ('title', 'Produk')
    @section ('content')

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Best Product</h3>
                    @foreach($btpdk as $no => $bestpdk)
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="{{asset('img/frontend/product/'.$bestpdk->barang_gambar)}}" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $bestpdk->kategori_nama }}</p>
                                <h3 class="product-name"><a href="{{route('detailProduct',$bestpdk->barang_id)}}">{{$bestpdk->barang_nama}}</a></h3>
                                <h4 class="product-price">Rp {{ number_format($bestpdk->barang_harga) }} 
                                    <!-- <del class="product-old-price">$990.00</del> -->
                                </h4>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store products -->
                <div class="row">
                    

                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">Store</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    <li class="active"><a data-toggle="tab" href="#semuaproduct">All</a></li>
                                    @foreach($kategori as $no => $ktgfilter)
                                        <li><a data-toggle="tab" href="#{{ $ktgfilter->kategori_nama }}">{{ $ktgfilter->kategori_nama }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">

                            <div class="products-tabs">

                                <div id="semuaproduct" class="tab-pane active">
                                    <!-- product -->
                                    @if(count($product) > 0)
                                        @foreach($product as $no => $pdc)
                                            <div class="col-md-4">
                                                <div class="product"><a href="">
                                                    <div class="product-img">
                                                        <img src="{{asset('img/frontend/product/'.$pdc->barang_gambar)}}" alt="">
                                                    </div>
                                                    <div class="product-body">
                                                        <p class="product-category">{{$pdc->kategori_nama}}</p>
                                                        <h3 class="product-name"><a href="{{route('detailProduct',$pdc->barang_id)}}">{{$pdc->barang_nama}}</a></h3>
                                                        <h4 class="product-price">Rp {{ number_format($pdc->barang_harga) }} 
                                                            <!-- <del class="product-old-price">$990.00</del> -->
                                                        </h4>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <a href="{{$wa.$pdc->umkm_nohp}}"><button class="add-to-cart-btn"><i class="fa fa-whatsapp" style="background-color: #D10024; color: #fff; border-radius: 50px 0px 0px 50px; margin-top: -2px; margin-left: -1px"></i> whatsapp</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <!-- TIDAK ADA BARANG -->
                                            <div class="section text-center">
                                                <div class="col-md-12">
                                                    <img src="{{asset('img/frontend/umum/undraw_empty_xct9.svg')}}" alt="" style="width: 25em;">
                                                    <h3>Opps.. Product Belum Tersedia...</h3>
                                                </div>
                                            </div>
                                    @endif
                                    <!-- /product -->
                                </div>

                                @foreach ($kategori as $no => $perktg)
                                    <div id="{{ $perktg->kategori_nama }}" class="tab-pane">
                                        @php
                                            $pdctpl = DB::table('tb_barang')
                                                            ->join('tb_kategori', 'tb_kategori.kategori_id', '=', 'tb_barang.kategori_id')
                                                            ->leftjoin('tb_data_umkm', 'tb_data_umkm.umkm_id', '=', 'tb_barang.umkm_id')
                                                            ->select('tb_barang.*', 'tb_kategori.kategori_nama', 'tb_data_umkm.umkm_nohp')
                                                            ->where('kategori_gambar','=', $perktg->kategori_gambar)
                                                            ->get();
                                        @endphp
                                        <!-- product -->
                                        @if(count($pdctpl) > 0)
                                            @foreach($pdctpl as $no => $pdcktg)
                                                <div class="col-md-4">
                                                    <div class="product">
                                                        <div class="product-img">
                                                            <img src="{{asset('img/frontend/product/'.$pdcktg->barang_gambar)}}" alt="">
                                                        </div>
                                                        <div class="product-body">
                                                            <p class="product-category">{{$pdcktg->kategori_nama}}</p>
                                                            <h3 class="product-name"><a href="{{route('detailProduct',$pdcktg->barang_id)}}">{{$pdcktg->barang_nama}}</a></h3>
                                                            <h4 class="product-price">Rp {{ number_format($pdcktg->barang_harga) }} 
                                                                <!-- <del class="product-old-price">$990.00</del> -->
                                                            </h4>
                                                        </div>
                                                        <div class="add-to-cart">
                                                            <a href="{{$wa.$pdcktg->umkm_nohp}}"><button class="add-to-cart-btn"><i class="fa fa-whatsapp" style="background-color: #D10024; color: #fff; border-radius: 50px 0px 0px 50px; margin-top: -2px; margin-left: -1px"></i> whatsapp</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <!-- TIDAK ADA BARANG -->
                                                <div class="section text-center">
                                                    <div class="col-md-12">
                                                        <img src="{{asset('img/frontend/umum/undraw_empty_xct9.svg')}}" alt="" style="width: 25em;">
                                                        <h3>Opps.. Product Belum Tersedia...</h3>
                                                    </div>
                                                </div>
                                        @endif
                                        <!-- /product -->
                                    </div>
                                @endforeach
                        
                            </div>
                        </div>
                    </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <!-- <div class="store-filter clearfix">
                    <span class="store-qty">Showing 20-100 products</span>
                    <ul class="store-pagination">
                        <li class="active">1</li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div> -->
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<script>

</script>

@endsection