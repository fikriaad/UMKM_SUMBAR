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
                <button class="btn btn-primary btn-lg" onclick="tambahGambar('{{ route('product.gambar') }}', '{{ $barang }}')"><i class="fa fa-image"></i></button>
                </div>
            </div>
            <!-- /section title -->

            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="col-md-10">
                                <img class="gambar_detail" src="{{ asset('img/frontend/product/' . $product->barang_gambar) }}" alt="" style="width: 570px;">
                            </div>
                        </div>
                        @foreach($gambar as $no => $imgs)
                            <div class="col-md-4 text-center">
                                <div class="col-md-10">
                                    <img class="gambar_detail" src="{{ asset('img/frontend/gambar/' . $imgs->gambar_foto) }}" alt="" style="max-width: 255px;">
                                    <div id="hapus_gambar" class="hapus_gambar">
                                        <div class="aksi-gambar ">
                                            <a href="">
                                                <button class="btn-hapus">
                                                    <i class="fa fa-trash" style="background-color: #29499C; color: #fff; border-radius: 50px 0px 0px 50px; margin-top: -2px; margin-left: -1px">
                                                    </i> hapus
                                                </button>
                                            </a>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /PRODUCT -->
    
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

        function tambahGambar(url, barang_id)
        {
            $('#gambar_id').val('');
            $('#brg_id').val(barang_id);
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
