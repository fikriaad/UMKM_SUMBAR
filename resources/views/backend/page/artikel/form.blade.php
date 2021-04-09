@extends ('backend/layout.app')

@section ('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Artikel</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Kelola Data Artikel</li>
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
                Kelola Artikel
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route($url, $artikel->artikel_id ?? null) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($artikel))
                    @method('put')
                    @endif
                    <div class="form-group">
                        <label>Judul Artikel</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('artikel_judul') {{ 'is-invalid' }} @enderror" name="artikel_judul" value="{{ old('artikel_judul') ?? $artikel->artikel_judul ?? '' }}">

                            @error('artikel_judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group">
                            <input type="date" class="form-control @error('artikel_tanggal') {{ 'is-invalid' }} @enderror" name="artikel_tanggal" value="{{ old('artikel_tanggal') ?? $artikel->artikel_tanggal ?? '' }}">

                            @error('artikel_tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Penulis</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('artikel_penulis') {{ 'is-invalid' }} @enderror" name="artikel_penulis" value="{{ old('artikel_penulis') ?? $artikel->artikel_penulis ?? '' }}">

                            @error('artikel_penulis')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Isi</label>
                        <div class="input-group">
                            <textarea type="text" class="form-control @error('artikel_isi') {{ 'is-invalid' }} @enderror" name="artikel_isi" id="editor1" value="{{ old('artikel_isi') ?? $iklan->artikel_isi ?? '' }}" style="width: 100%">{{ old('artikel_isi') ?? $artikel->artikel_isi ?? '' }}</textarea>

                            @error('artikel_isi')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <script>
                                CKEDITOR.replace('editor1', {
                                    width: '100%'
                                });
                            </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Gambar artikel</label>
                        <div class="input-group">
                            <input type="file" class="form-control @error('artikel_gambar') {{ 'is-invalid' }} @enderror" name="artikel_gambar" value="{{ old('artikel_gambar') ?? '' }}">
                            @error('artikel_foto')
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