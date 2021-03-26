@extends ('backend/layout.app')

@section ('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Slider</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Kelola Data Slider</li>
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
                Kelola Slider
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route($url, $slider->slider_id ?? null) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($slider))
                    @method('put')
                    @endif
                    <div class="form-group">
                        <label>Gambar slider</label>
                        <div class="input-group">
                            <input type="file" class="form-control @error('slider_gambar') {{ 'is-invalid' }} @enderror" name="slider_gambar" value="{{ old('slider_gambar') ?? '' }}">
                            @error('slider_foto')
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