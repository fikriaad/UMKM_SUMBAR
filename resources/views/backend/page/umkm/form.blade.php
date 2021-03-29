@extends ('backend/layout.app')

@section ('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data UMKM</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Kelola Data UMKM</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card">
            <div class="card-header">
                Data UMKM
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route($url, $umkm->umkm_id ?? null) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($umkm))
                    @method('put')
                    @endif
                    <div class="form-group">
                        <label>Nama UMKM</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('umkm_nama') {{ 'is-invalid' }} @enderror" name="umkm_nama" value="{{ old('umkm_nama') ?? $umkm->umkm_nama ?? '' }}">

                            @error('umkm_nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group  col-md-12">
                            <label>Jenis UMKM</label>
                            <select name="jenis_id" id="jenis_id" class="form-control @error('jenis_id') {{ 'is-invalid' }} @enderror">
                                <option value="">-Pilih-</option>
                                @foreach($jenis as $no => $jenis)
                                <option value="{{ $jenis->jenis_id }}">
                                    {{ $jenis->jenis_nama}}</option>
                                @endforeach
                            </select>
                            @if(isset($jenis))
                            <script>
                                document.getElementById('jenis_id').value =
                                    '<?php echo $jenis->jenis_id ?>'
                            </script>
                            @endif
                            @error('jenis_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Lama Usaha</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('umkm_lama_usaha') {{ 'is-invalid' }} @enderror" name="umkm_lama_usaha" value="{{ old('umkm_lama_usaha') ?? $umkm->umkm_lama_usaha ?? '' }}">

                            @error('umkm_lama_usaha')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>No Telfon</label>
                        <div class="input-group">
                            <input type="number" class="form-control @error('umkm_nohp') {{ 'is-invalid' }} @enderror" name="umkm_nohp" value="{{ old('umkm_nohp') ?? $umkm->umkm_nohp ?? '' }}">

                            @error('umkm_nohp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group  col-md-12">
                            <label>Provinsi</label>
                            <select name="prov_id" id="prov_id" class="form-control @error('prov_id') {{ 'is-invalid' }} @enderror">
                                <option value="">-Pilih Provinsi-</option>
                                @foreach($prov as $no => $prov)
                                <option value="{{ $prov->prov_id }}">
                                    {{ $prov->prov_nama}}</option>
                                @endforeach
                            </select>
                            @if(isset($umkm))
                            <script>
                                document.getElementById('prov_id').value =
                                    '<?php echo $umkm->prov_id ?>'
                            </script>
                            @endif
                            @error('prov_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group  col-md-12">
                            <label>Kota</label>
                            <select name="kota_id" id="kota_id" class="form-control @error('kota_id') {{ 'is-invalid' }} @enderror">
                                <option value="">-Pilih Kota-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <div class="input-group">
                            <textarea type="text" class="form-control @error('umkm_alamat') {{ 'is-invalid' }} @enderror" name="umkm_alamat" style="width: 100%" id="editor1">{{ old('umkm_alamat') ?? $umkm->umkm_alamat ?? '' }}</textarea>

                            @error('umkm_alamat')
                            <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror
                            <script>
                                CKEDITOR.replace('editor1', {
                                    width: '100%'
                                });
                            </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control @error('umkm_email') {{ 'is-invalid' }} @enderror" name="umkm_email" value="{{ old('umkm_email') ?? $umkm->umkm_email ?? '' }}">

                            @error('umkm_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control @error('umkm_password') {{ 'is-invalid' }} @enderror" name="umkm_password" value="{{ old('umkm_password') ?? '' }}">
                            @error('umkm_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Instagram</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('umkm_instagram') {{ 'is-invalid' }} @enderror" name="umkm_instagram" value="{{ old('umkm_instagram') ?? $umkm->umkm_instagram ?? '' }}">

                            @error('umkm_instagram')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Facebook</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('umkm_facebook') {{ 'is-invalid' }} @enderror" name="umkm_facebook" value="{{ old('umkm_facebook') ?? $umkm->umkm_facebook ?? '' }}">

                            @error('umkm_facebook')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <div class="input-group">
                            <input type="file" class="form-control @error('umkm_foto') {{ 'is-invalid' }} @enderror" name="umkm_foto" value="{{ old('umkm_foto') ?? '' }}">
                            @error('umkm_foto')
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
<script>
    // Cara Mengambil Kota Berdasarkan Provinsi
    $('#prov_id').change(function(e) {
        e.preventDefault();
        var kota_id = '';
        var prov_id = $('#prov_id').val();
        axios.post("{{url('backend/umkm/carikota')}}", {
            'prov_id': prov_id,
        }).then(function(res) {
            // console.log(res.data.kota)
            var kota = res.data.kota
            for (var i = 0; i < kota.length; i++) {
                kota_id += "<option value='" + kota[i].kota_id + "'>" + kota[i].kota_nama + "</option>"
            }
            $('#kota_id').html(kota_id)
        }).catch(function(err) {
            console.log(err);
        })
    });
</script>

@if(!empty($umkm))
<script>
    $(document).ready(function() {
        var kota_id = '';
        var prov_id = '<?= $umkm->prov_id ?>';
        axios.post("{{url('backend/umkm/carikota')}}", {
            'prov_id': prov_id,
        }).then(function(res) {
            // console.log(res.data.kota)
            var kota = res.data.kota
            for (var i = 0; i < kota.length; i++) {
                kota_id += "<option value='" + kota[i].kota_id + "'>" + kota[i].kota_nama + "</option>"
            }
            $('#kota_id').html(kota_id)
            $('#kota_id').val('<?= $umkm->kota_id ?>').change()
        }).catch(function(err) {
            console.log(err);
        })
    });
</script>
@endif

@endsection