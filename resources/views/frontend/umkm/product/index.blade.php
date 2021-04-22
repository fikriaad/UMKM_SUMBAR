@extends ('frontend/layouts/app2')

@section ('title', 'Product')
@section ('content')

    <!-- PRODUCT -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <button type="button" class="btn btn-primary btn-lg" onclick="modal_product('{{ route("product-store") }}', 'tambah')"><i class="fa fa-plus"></i></button> 
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#semuaproduct">Semua</a></li>
                            @foreach($sub as $no => $subnav)
                                <li><a data-toggle="tab" href="#{{ $subnav->sub_nama }}">{{ $subnav->sub_nama }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="products-tabs">
                        @if( count($barang) > 0 )
                            <div id="semuaproduct" class="tab-pane active">
                                <!-- product widget -->
                                @foreach($barang as $no => $semuapdk)
                                <div class="product-widget-umkm col-md-4">
                                    <div class="product-img">
                                        <!-- <img src="{{asset('frontend/img/product01.png')}}" alt=""> -->
                                        <img src="{{asset('img/frontend/product/'.$semuapdk->barang_gambar)}}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{$semuapdk->kategori_nama}}</p>
                                        <h3 class="product-name"><a href="{{ route('detailProductLogin', $semuapdk->barang_id) }}">{{$semuapdk->barang_nama}}</a></h3>
                                        <h4 class="product-price">Rp {{$semuapdk->barang_harga}} 
                                            <!-- <del class="product-old-price">$990.00</del> -->
                                        </h4>
                                        <div class="row text-right">
                                            <button class="btn btn-sm btn-primary" onclick="tambahGambar('{{ route('product.gambar') }}', '{{ $semuapdk->barang_id }}')"><i class="fa fa-image"></i></button>
                                            <button class="btn btn-sm btn-warning" onclick="modal_product('{{ route("product-store") }}', '{{ $semuapdk->barang_id  }}')"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-sm btn-danger" onclick="mHapus('{{ route('product.delete', $semuapdk->barang_id) }}')" ><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                @endforeach
                                <!-- /product widget -->
                            </div>
                        @else
                            <!-- TIDAK ADA BARANG -->
                            <div class="section text-center">
                                <div class="col-md-12">
                                    <img src="{{asset('img/frontend/umum/undraw_empty_xct9.svg')}}" alt="" style="width: 25em;">
                                    <h3>Opps.. Product Belum Tersedia...</h3>
                                </div>
                            </div>
                        @endif
                        @foreach ($sub as $no => $subk)
                            <div id="{{ $subk->sub_nama }}" class="tab-pane">
                                @php
                                    $sub_barang = DB::table('tb_barang')
                                                    ->leftjoin('tb_kategori', 'tb_kategori.kategori_id', '=', 'tb_barang.kategori_id')
                                                    ->select('tb_barang.*','tb_kategori.kategori_nama')
                                                    ->where('sub_id','=', $subk->sub_id)
                                                    ->get();
                                @endphp
                                <!-- product widget -->
                                @forelse($sub_barang as $no => $subproduk)
                                    <div class="product-widget-umkm col-md-4">
                                        <div class="product-img">
                                            <!-- <img src="{{asset('frontend/img/product01.png')}}" alt=""> -->
                                            <img src="{{asset('img/frontend/product/'.$subproduk->barang_gambar)}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$subproduk->kategori_nama}}</p>
                                            <h3 class="product-name"><a href="{{ route('detailProductLogin', $subproduk->barang_id) }}">{{$semuapdk->barang_nama}}</a></h3>
                                            <h4 class="product-price">Rp {{$subproduk->barang_harga}} 
                                                <!-- <del class="product-old-price">$990.00</del> -->
                                            </h4>
                                            <div class="row text-right">
                                                <button class="btn btn-sm btn-primary" onclick="tambahGambar('{{ route('product.gambar') }}', '{{ $semuapdk->barang_id }}')"><i class="fa fa-image"></i></button>
                                                <button class="btn btn-sm btn-warning" onclick="modal_product('{{ route("product-store") }}', '{{ $subproduk->barang_id  }}')"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-sm btn-danger" onclick="mHapus('{{ route('product.delete', $subproduk->barang_id) }}')" ><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                @empty
                                    <!-- TIDAK ADA BARANG -->
                                    <div class="section text-center">
                                        <div class="col-md-12">
                                            <img src="{{asset('img/frontend/umum/undraw_empty_xct9.svg')}}" alt="" style="width: 25em;">
                                            <h3>Opps.. Product Belum Tersedia...</h3>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                            <!-- /product widget -->
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /PRODUCT -->
    
    <div class="modal fade" id="MyModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Input Product Baru</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" id="formProduk">
                        @csrf
                        <input type="hidden" name="barang_id" id="barang_id">
                        <div class="form-group">
                            <label for="sub_id">Sub Kategori</label>
                            <select name="sub_id" id="sub_id" class="form-control @error('sub_id') {{ 'is-invalid' }} @enderror">
                                <option value="">-Pilih-</option>
                                @foreach($sub as $no => $sub)
                                <option value="{{ $sub->sub_id }}">
                                    {{ $sub->sub_nama}}</option>
                                @endforeach
                            </select>
                            @if(isset($sub))
                            <script>
                                document.getElementById('sub_id').value =
                                    '<?php echo $sub->sub_id ?>'
                            </script>
                            @endif
                            @error('sub_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="barang_nama">Nama Barang</label>
                            <input type="text" class="form-control" name="barang_nama" id="barang_nama" placeholder="Nama Barang" value="{{ old('barang_nama') ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="barang_harga">Harga</label>
                            <input type="number" class="form-control" name="barang_harga" id="barang_harga" placeholder="Harga Barang" value="{{ old('barang_harga') ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="barang_keterangan">Keterangan Barang</label>
                            <textarea class="form-control" rows="3" name="barang_keterangan" id="barang_keterangan" value="{{ old('barang_keterangan') ?? '' }}" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="barang_gambar">Foto Barang</label>
                            <input type="file" class="form-control" name="barang_gambar" id="barang_gambar">
                        </div>
                        <div class="row text-right" style="margin-right: 2px">
                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    
    <div class="modal fade" id="ModalGambar" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Input Gambar Baru</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" id="formGambar">
                        @csrf
                        <input type="hidden" id="brg_id" name="barang_id">
                        <div class="form-group">
                            <label for="gambar_foto">Foto Barang</label>
                            <input type="file" class="form-control" name="gambar_foto" id="gambar_foto" required>
                        </div>
                        <div class="row text-right" style="margin-right: 2px">
                            <a id="detail_gambar"  class="btn btn-primary"> Detail </a>
                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="formDelete">
                    <div class="modal-body">
                        @csrf
                        @method('delete')
                        Yakin Hapus Data ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function modal_product(url, aksi){
            if(aksi != 'tambah'){
                // ambil data dari axios
                axios.post("{{ route('cari_data_produk') }}", {
                    'barang_id': aksi,
                }).then(function(res) {
                    var barang = res.data;
                    $('#barang_id').val(barang.barang_id);
                    $('#barang_nama').val(barang.barang_nama);
                    $('#barang_harga').val(barang.barang_harga);
                    $('#barang_keterangan').val(barang.barang_keterangan);
                    $('#barang_gambar').attr('required', false);
                    // $('#kategori_id').val(barang.kategori_id).change();
                }).catch(function(err) {
                    console.log(err)
                })
            }else{
                $('#barang_nama').val('');
                $('#barang_harga').val('');
                $('#barang_keterangan').val('');
                $('#barang_gambar').val('');
                $('#barang_gambar').attr('required', true);
            }
            $('#formProduk').attr('action', url);
            $('#MyModal').modal('show');
        }

        function tambahGambar(url, barang_id)
        {
            $('#gambar_id').val('');
            $('#brg_id').val(barang_id);
            $('#detail_gambar').attr('href', '{{ url("umkm/gambar-galery") }}/' + barang_id);
            $('#gambar_foto').attr('required', true);
            $('#formGambar').attr('action', url);
            $('#ModalGambar').modal('show')
        }

        // untuk hapus data
        function mHapus(url) {
            $('#ModalHapus').modal()
            $('#formDelete').attr('action', url);
        }



    </script>

@endsection
