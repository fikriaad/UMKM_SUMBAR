@extends ('backend/layout.app')

@section ('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Barang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Kelola Data Barang</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card">
            <div class="card-header">
                Barang
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route($url, $barang->barang_id ?? null) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($barang))
                    @method('put')
                    @endif
                    <div class="row">
                        <div class="form-group  col-md-12">
                            <label>UMKM</label>
                            <select name="umkm_id" id="umkm_id" class="form-control @error('umkm_id') {{ 'is-invalid' }} @enderror">
                                <option value="">-Pilih-</option>
                                @foreach($umkm as $no => $umkm)
                                <option value="{{ $umkm->umkm_id }}">
                                    {{ $umkm->umkm_nama}}</option>
                                @endforeach
                            </select>
                            @if(isset($umkm))
                            <script>
                                document.getElementById('umkm_id').value =
                                    '<?php echo $umkm->umkm_id ?>'
                            </script>
                            @endif
                            @error('umkm_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group  col-md-12">
                            <label>Kategori</label>
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
                    </div>
                    <div class="row">
                        <div class="form-group  col-md-12">
                            <label>Sub Kategori</label>
                            <select name="sub_id" id="sub_id" class="form-control @error('sub_id') {{ 'is-invalid' }} @enderror">
                                <option value="">-Pilih Sub Kategori-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('barang_nama') {{ 'is-invalid' }} @enderror" name="barang_nama" value="{{ old('barang_nama') ?? $barang->barang_nama ?? '' }}">

                            @error('barang_nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <div class="input-group">
                            <input type="number" class="form-control @error('barang_harga') {{ 'is-invalid' }} @enderror" name="barang_harga" value="{{ old('barang_harga') ?? $barang->barang_harga ?? '' }}">

                            @error('barang_harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <div class="input-group">
                            <textarea type="text" class="form-control @error('informasi_isi') {{ 'is-invalid' }} @enderror" name="barang_keterangan" id="editor1" value="{{ old('barang_keterangan') ?? $barang->barang_keterangan ?? '' }}" style="width: 100%"></textarea>

                            @error('barang_keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <script>
                                CKEDITOR.replace('editor1', {
                                    width: '100%'
                                });
                            </script>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    <button class="btn btn-warning" type="button" onclick="window.history.back()">Back</button>
                </form>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<script>
    // Cara Mengambil Kota Berdasarkan Provinsi
    $('#kategori_id').change(function(e) {
        e.preventDefault();
        var sub_id = '';
        var kategori_id = $('#kategori_id').val();
        axios.post("{{url('backend/barang/carisub')}}", {
            'kategori_id': kategori_id,
        }).then(function(res) {
            // console.log(res.data.sub)
            var sub = res.data.sub
            for (var i = 0; i < sub.length; i++) {
                sub_id += "<option value='" + sub[i].sub_id + "'>" + sub[i].sub_nama + "</option>"
            }
            $('#sub_id').html(sub_id)
        }).catch(function(err) {
            console.log(err);
        })
    });
</script>
@endsection