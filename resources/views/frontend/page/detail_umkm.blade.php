@extends ('frontend/layouts/app')

@section ('title', 'Home Page')
@section ('content')


<div class="section profle_jumbotron">
    <div class="jumbotron" style="background-image: url({{url('frontend/img/bg_jumbotron.png')}}); background-size: 100%;">
    </div>
</div>

<div class="section" style="padding-top: unset">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="{{asset('img/frontend/logo_umkm/'.$dataUmkm->umkm_foto)}}" alt="" style="border: 1px solid #29499C; width: 200px; margin-top: -75px; ">
            </div>
            <div class="col-md-8" style="margin-top: 15px">
                <div class="d-flex">
                    <h2>{{$dataUmkm->umkm_nama}}</h2>
                </div>
                <p>
                    <span class="text-icon">
                        <i class="fas fa-map-marker-alt"></i> {{$dataUmkm->kota_nama}}, {{$dataUmkm->prov_nama}}
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>


<!-- <div class="section">

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sub Kategori</h3>
                </div>
            </div>
            <div class="col-md-12">
                @foreach($sub as $no => $sub)
                <div class="col-md-3 col-xs-6">
                    <div class="shop">
                        <div class="shop-img" style="text-align: center;">
                            <img src="{{asset('img/backend/sub/' . $sub->sub_gambar)}}" style="max-height:250px;" alt="">
                        </div>
                        <div class=" shop-body">
                            <a href="#">
                                <h3>
                                    {{$sub->sub_nama}}
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div> -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Product</h3>
                </div>
            </div>
            <div class="col-md-12">
                @foreach($product as $no => $products)
                <div class="col-md-3 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            <img src="{{asset('img/frontend/product/'.$products->barang_gambar)}}" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{$products->kategori_nama}}</p>
                            <h3 class="product-name"><a href="{{ route('detailProduct', $products->barang_id) }}">{{$products->barang_nama}}</a></h3>
                            <h4 class="product-price">Rp {{ number_format($products->barang_harga) }}
                            </h4>
                        </div>
                        <div class="add-to-cart">
                            <a href="{{$wa.$products->umkm_nohp}}"><button class="add-to-cart-btn"><i class="fa fa-whatsapp" style="background-color: #29499C; color: #fff; border-radius: 50px 0px 0px 50px; margin-top: -2px; margin-left: -1px"></i> whatsapp</button></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection