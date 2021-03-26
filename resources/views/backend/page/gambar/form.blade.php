@extends ('backend/layout.app')

@section ('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Gambar Barang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Kelola Gambar Barang</li>
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
                Gambar Barang
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route($url, $gambar->gambar_id ?? null) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($gambar))
                    @method('put')
                    @endif
                    <div class="row">
                        <div class="form-group  col-md-12">
                            <label>Barang</label>
                            <select name="barang_id" id="barang_id" class="form-control @error('barang_id') {{ 'is-invalid' }} @enderror">
                                <option value="">-Pilih-</option>
                                @foreach($barang as $no => $barang)
                                <option value="{{ $barang->barang_id }}">
                                    {{ $barang->barang_nama}}</option>
                                @endforeach
                            </select>
                            @if(isset($barang))
                            <script>
                                document.getElementById('barang_id').value =
                                    '<?php echo $barang->barang_id ?>'
                            </script>
                            @endif
                            @error('barang_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <div class="input-group">
                            <input type="file" class="form-control @error('gambar_foto') {{ 'is-invalid' }} @enderror" name="gambar_foto" value="{{ old('gambar_foto') ?? '' }}">
                            @error('gambar_foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
@endsection