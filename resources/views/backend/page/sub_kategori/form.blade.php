@extends ('backend/layout.app')

@section ('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Sub Kategori</h1>
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
                Sub Kategori
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route($url, $sub->sub_id ?? null) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($sub))
                    @method('put')
                    @endif
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
                    <div class="form-group">
                        <label>Sub Kategori</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('sub_nama') {{ 'is-invalid' }} @enderror" name="sub_nama" value="{{ old('sub_nama') ?? $sub->sub_nama ?? '' }}">

                            @error('sub_nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Gambar Sub Kategori</label>
                        <div class="input-group">
                            <input type="file" class="form-control @error('sub_gambar') {{ 'is-invalid' }} @enderror" name="sub_gambar" value="{{ old('sub_gambar') ?? '' }}">
                            @error('sub_gambar')
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