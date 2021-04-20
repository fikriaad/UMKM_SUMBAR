@extends ('backend/layout.app')

@section ('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data UMKM</h1>
            </div><!-- /.col -->            
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" action="{{ route($url, $umkm->umkm_id ?? null) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($umkm))
                    @method('put')
                    @endif

                    <div class="card">
                        <div class="card-header text-white bg-primary mb-3">
                            <h4>Data Pemilik</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Pemilik</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('pemilik') {{ 'is-invalid' }} @enderror" name="pemilik" value="{{ old('pemilik') ?? $umkm->pemilik ?? '' }}">

                                    @error('pemilik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <div class="input-group">
                                    <input type="date" class="form-control @error('pemilik_tgl_lahir') {{ 'is-invalid' }} @enderror" name="pemilik_tgl_lahir" value="{{ old('pemilik_tgl_lahir') ?? $umkm->pemilik_tgl_lahir ?? '' }}">

                                    @error('pemilik_tgl_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>No Hp Pemilik</label>
                                <div class="input-group">
                                    <input type="number" class="form-control @error('pemilik_nohp') {{ 'is-invalid' }} @enderror" name="pemilik_nohp" value="{{ old('pemilik_nohp') ?? $umkm->pemilik_nohp ?? '' }}">

                                    @error('pemilik_nohp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat Pemilik</label>
                                <div class="input-group">
                                    <textarea type="text" class="form-control @error('pemilik_alamat') {{ 'is-invalid' }} @enderror" name="pemilik_alamat" value="">{{ old('pemilik_alamat') ?? $umkm->pemilik_alamat ?? '' }}</textarea>

                                    @error('pemilik_alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>KTP Pemilik</label>
                                <div class="input-group">
                                    <input type="file" class="form-control @error('pemilik_ktp') {{ 'is-invalid' }} @enderror" name="pemilik_ktp" value="{{ old('pemilik_ktp') ?? $umkm->pemilik_ktp ?? '' }}">

                                    @error('pemilik_ktp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-white bg-primary mb-3">
                            <h4>Data UMKM</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Umkm</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('umkm_nama') {{ 'is-invalid' }} @enderror" name="umkm_nama" value="{{ old('umkm_nama') ?? $umkm->umkm_nama ?? '' }}">

                                    @error('umkm_nama')
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
                                    <textarea type="text" class="form-control @error('umkm_alamat') {{ 'is-invalid' }} @enderror" name="umkm_alamat" style="width: 100%">{{ old('umkm_alamat') ?? $umkm->umkm_alamat ?? '' }}</textarea>

                                    @error('umkm_alamat')
                                    <div class=" invalid-feedback">{{ $message }}</div>
                                    @enderror
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
atch(function(err) {
            console.log(err);
        })
    });
</script><script>
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
        }).c

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