@extends ('backend/layout.app')

@section ('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Iklan</h1>
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
                Kelola Iklan
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route($url, $iklan->iklan_id ?? null) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($iklan))
                    @method('put')
                    @endif
                    <div class="form-group">
                        <label>Judul Iklan</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('iklan_judul') {{ 'is-invalid' }} @enderror" name="iklan_judul" value="{{ old('iklan_judul') ?? $iklan->iklan_judul ?? '' }}">

                            @error('iklan_judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Gambar Iklan</label>
                        <div class="input-group">
                            <input type="file" class="form-control @error('iklan_gambar') {{ 'is-invalid' }} @enderror" name="iklan_gambar" value="{{ old('iklan_gambar') ?? '' }}">
                            @error('iklan_foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <div class="input-group">
                            <textarea type="text" class="form-control @error('iklan_keterangan') {{ 'is-invalid' }} @enderror" name="iklan_keterangan" id="editor1" value="{{ old('iklan_keterangan') ?? $iklan->iklan_keterangan ?? '' }}" style="width: 100%">{{ old('iklan_keterangan') ?? $iklan->iklan_keterangan ?? '' }}</textarea>

                            @error('iklan_keterangan')
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
@endsection