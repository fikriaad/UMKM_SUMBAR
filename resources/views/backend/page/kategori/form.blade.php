@extends ('backend/layout.app')

@section ('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Kategori Barang</h1>
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
                Kelola Kategori Barang
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route($url, $kategori->kategori_id ?? null) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($kategori))
                    @method('put')
                    @endif
                    <div class="form-group">
                        <label>Nama kategori</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('kategori_nama') {{ 'is-invalid' }} @enderror" name="kategori_nama" value="{{ old('kategori_nama') ?? $kategori->kategori_nama ?? '' }}">

                            @error('kategori_nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Gambar kategori</label>
                        <div class="input-group">
                            <input type="file" class="form-control @error('kategori_gambar') {{ 'is-invalid' }} @enderror" name="kategori_gambar" value="{{ old('kategori_gambar') ?? '' }}">
                            @error('kategori_foto')
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