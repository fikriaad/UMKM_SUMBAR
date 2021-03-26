@extends ('backend/layout.app')

@section ('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Jenis UMKM</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Kelola Data Jenis UMKM</li>
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
                Kelola Jenis UMKM
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route($url, $jenis->jenis_id ?? null) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($jenis))
                    @method('put')
                    @endif
                    <div class="form-group">
                        <label>Nama Jenis</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('jenis_nama') {{ 'is-invalid' }} @enderror" name="jenis_nama" value="{{ old('jenis_nama') ?? $jenis->jenis_nama ?? '' }}">

                            @error('jenis_nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Gambar Jenis</label>
                        <div class="input-group">
                            <input type="file" class="form-control @error('jenis_gambar') {{ 'is-invalid' }} @enderror" name="jenis_gambar" value="{{ old('jenis_gambar') ?? '' }}">
                            @error('jenis_foto')
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