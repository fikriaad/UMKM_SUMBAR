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
                    <form>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" name="barang_nama" id="nama_barang" placeholder="Nama Barang">
                        </div>
                        <div class="form-group">
                            <label for="harga_barang">Harga</label>
                            <input type="text" class="form-control" name="barang_harga" id="harga_barang" placeholder="Nama Barang">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan Barang</label>
                            <textarea class="form-control" rows="3" name="barang_keterangan" id="keterangan"></textarea>
                        </div>
                        <div class="row text-right" style="margin-right: 2px">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Submit</button>
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
