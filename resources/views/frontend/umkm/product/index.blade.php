@extends ('frontend/layouts/app2')

@section ('title', 'Product')
@section ('content')

    <!-- SLIDER -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <button type="button" class="btn btn-primary btn-lg" onclick="modal_product('{{ route("product-store") }}', 'tambah')"><i class="fa fa-plus"></i></button> 
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
            <!-- row -->
            <div class="row">
                @foreach ($barang as $no => $barang)
                <!-- product widget -->
                <div class="product-widget-umkm col-md-4">
                    <div class="product-img">
                        <!-- <img src="{{asset('frontend/img/product01.png')}}" alt=""> -->
                        <img src="{{asset('img/frontend/product/'.$barang->barang_gambar)}}" alt="">
                    </div>
                    <div class="product-body">
                        <p class="product-category">{{$barang->kategori_nama}}</p>
                        <h3 class="product-name"><a href="#">{{$barang->barang_nama}}</a></h3>
                        <h4 class="product-price">Rp {{$barang->barang_harga}} 
                            <!-- <del class="product-old-price">$990.00</del> -->
                        </h4>
                        <div class="row text-right">
                            <button class="btn btn-sm btn-primary"><i class="fa fa-image"></i></button>
                            <button class="btn btn-sm btn-success"><i class="fa fa-info-circle"></i></button>
                            <button class="btn btn-sm btn-warning" onclick="modal_product('{{ route("product-update", $barang->barang_id ) }}', '{{ $barang->barang_id  }}')"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                    <hr>
                </div>
                <!-- /product widget -->
                @endforeach
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SLIDER -->

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
                        <div class="form-group">
                            <label for="kategori_id">Kategori</label>
                            <select name="kategori_id" id="kategori_id" class="form-control @error('kategori_id') {{ 'is-invalid' }} @enderror">
                                <option value="">-Pilih-</option>
                                @foreach($kategori as $no => $kategori)
                                <option value="{{ $kategori->kategori_id }}">
                                    {{ $kategori->kategori_nama}}</option>
                                @endforeach
                            </select>
                            @if(isset($kategori))
                            <script>
                                document.getElementById('kategori_id').value =
                                    '<?php echo $kategori->kategori_id ?>'
                            </script>
                            @endif
                            @error('kategori_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="barang_nama">Nama Barang</label>
                            <input type="text" class="form-control" name="barang_nama" id="barang_nama" placeholder="Nama Barang" value="{{ old('barang_nama') ?? $barang->barang_nama ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="barang_harga">Harga</label>
                            <input type="number" class="form-control" name="barang_harga" id="barang_harga" placeholder="Harga Barang" value="{{ old('barang_harga') ?? $barang->barang_harga ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="barang_keterangan">Keterangan Barang</label>
                            <textarea class="form-control" rows="3" name="barang_keterangan" id="barang_keterangan" value="{{ old('barang_keterangan') ?? $barang->barang_keterangan ?? '' }}" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="barang_gambar">Foto Barang</label>
                            <input type="file" class="form-control" name="barang_gambar" id="barang_gambar" required>
                        </div>
                        <div class="row text-right" style="margin-right: 2px">
                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    <script>
        function modal_product(url, aksi){
            if(aksi != 'tambah'){
                // ambil data dari axios
                axios.post("{{ route('cari_data_produk') }}", {
                    'barang_id': aksi,
                }).then(function(res) {
                    var barang = res.data;
                    console.log(barang);
                    $('#barang_nama').val(barang.barang_nama);
                    $('#barang_harga').val(barang.barang_harga);
                    $('#barang_keterangan').val(barang.barang_keterangan);
                    $('#kategori_id').val(barang.kategori_id).change();
                }).catch(function(err) {
                    console.log(err)
                })
            }else{
                $('#barang_nama').val('');
                $('#barang_harga').val('');
                $('#barang_keterangan').val('');
                $('#barang_gambar').val('');
            }
            $('#formProduk').attr('action', url);
            $('#MyModal').modal('show');
        }

    </script>

@endsection
