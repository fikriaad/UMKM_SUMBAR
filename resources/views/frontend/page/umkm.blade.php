@extends ('frontend/layouts/app')

@section ('title', 'List UMKM')
@section ('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- section title -->
        <div class="col-md-12">
            <div class="section-title">
                <h3 class="title">UMKM</h3>
                <div class="section-nav">
                    <ul class="section-tab-nav tab-nav">
                        <li class="active"><a data-toggle="tab" href="#semuaumkm">Semua</a></li>
                        @foreach($kategori as $no => $kt)
                        <li><a data-toggle="tab" href="#{{$kt->kategori_nama}}">{{$kt->kategori_nama}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- /section title -->
        <div class="row">
            <div class="col-md-12">
                <div class="products-tabs">
                    <div id="semuaumkm" class="tab-pane active">
                        <!-- umkm widget -->
                        @foreach($umkm as $no => $u)
                        <div class="product-widget-umkm col-md-4">
                            <div class="product-img">
                                <!-- <img src="{{asset('frontend/img/product01.png')}}" alt=""> -->
                                <img src="{{asset('img/frontend/logo_umkm/'.$u->umkm_foto)}}" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{$u->kategori_nama}}</p>
                                <h3 class="product-name"><a href="{{ route('detailUmkm', $u->umkm_id) }}">{{$u->umkm_nama}}</a></h3>
                                <h4 class="product-price">{{$u->umkm_alamat}}
                                    <span class="product-old-price">{{$u->umkm_nohp}}</span>
                                </h4>
                            </div>
                        </div>
                        @endforeach
                        <!-- umkm widget -->
                    </div>
                    @foreach($kategori as $no => $ktg)
                    <div id="{{ $ktg->kategori_nama }}" class="tab-pane">
                        <!-- umkm widget -->
                        @php
                        $umkm_kategori = DB::table('tb_data_umkm')
                        ->where('kategori_id','=', $ktg->kategori_id)
                        ->get();
                        @endphp
                        @forelse($umkm_kategori as $no => $u)
                        <div class="product-widget-umkm col-md-4">
                            <div class="product-img">
                                <!-- <img src="{{asset('frontend/img/product01.png')}}" alt=""> -->
                                <img src="{{asset('img/frontend/logo_umkm/'.$u->umkm_foto)}}" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category"></p>
                                <h3 class="product-name"><a href="{{ route('detailUmkm', $u->umkm_id) }}">{{$u->umkm_nama}}</a></h3>
                                <h4 class="product-price">Ini rating
                                    <span class="product-old-price">{{$u->umkm_nohp}}</span>
                                </h4>
                            </div>
                        </div>

                        @empty

                        <div class="section text-center">
                            <div class="col-md-12">
                                <img src="{{asset('img/frontend/umum/undraw_empty_xct9.svg')}}" alt="" style="width: 25em;">
                                <h3>Opps.. UMKM Belum Tersedia...</h3>
                            </div>
                        </div>
                        @endforelse
                        <!-- umkm widget -->
                    </div>
                    @endforeach

                </div>
            </div>
        </div>


        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection