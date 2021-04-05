@extends ('frontend/layouts/app2')

@section ('title', 'Product')
@section ('content')

    <!-- SLIDER -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <button type="button" class="btn btn-primary btn-lg" onclick="tambah_product()"><i class="fa fa-plus"></i></button>
            <!-- row -->
            <div class="row">

                <!-- product widget -->
                <div class="product-widget-umkm col-md-4">
                    <div class="product-img">
                        <img src="{{asset('frontend/img/product09.png')}}" alt="">
                    </div>
                    <div class="product-body">
                        <p class="product-category">Category</p>
                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                        <div class="row text-right">
                            <button class="btn btn-sm btn-primary"><i class="fa fa-image"></i></button>
                            <button class="btn btn-sm btn-success"><i class="fa fa-info-circle"></i></button>
                            <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                    <hr>
                </div>
                <!-- /product widget -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SLIDER -->

    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Input Product Baru</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('product-store') }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" class="form-control @error('barang_nama') {{ 'is-invalid' }} @enderror" name="barang_nama" id="barang_nama" placeholder="Nama Barang" required>
                        </div>
                        <div class="form-group">
                            <label for="barang_harga">Harga</label>
                            <input type="number" class="form-control" name="barang_harga" id="barang_harga" placeholder="Harga Barang">
                        </div>
                        <div class="form-group">
                            <label for="barang_keterangan">Keterangan Barang</label>
                            <textarea class="form-control" rows="3" name="barang_keterangan" id="barang_keterangan" required></textarea>
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
        function tambah_product(){
            $('#tambahModal').modal('show');
        }

    </script>

@endsection
