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
                            <li class="active"><a data-toggle="tab" href="#tab1">Jenis</a></li>
                            <li><a data-toggle="tab" href="#tab1">Jenis</a></li>
                            <li><a data-toggle="tab" href="#tab1">Jenis</a></li>
                            <li><a data-toggle="tab" href="#tab1">Jenis</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->
        <div class="row">
            <!-- umkm widget -->
            @foreach($umkm as $no => $umkm) 
                <div class="product-widget-umkm col-md-4">
                    <div class="product-img">
                        <!-- <img src="{{asset('frontend/img/product01.png')}}" alt=""> -->
                        <img src="{{asset('img/frontend/logo_umkm/'.$umkm->umkm_foto)}}" alt="">
                    </div>
                    <div class="product-body">
                        <p class="product-category">{{$umkm->kota_nama}}</p>
                        <h3 class="product-name"><a href="#">{{$umkm->umkm_nama}}</a></h3>
                        <h4 class="product-price">Ini Rating 
                            <span class="product-old-price">{{$umkm->umkm_nohp}}</span>
                        </h4>
                        <hr>
                    </div>
                </div>
            @endforeach            
            <!-- umkm widget -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection