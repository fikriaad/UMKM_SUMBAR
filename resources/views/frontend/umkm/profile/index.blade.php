@extends ('frontend/layouts/profile')

@section ('title', 'Home Page')
@section ('content')

<!-- HEADER PROFILE -->
<div class="section">
    <!-- container -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Profile</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#umkm">Profil UMKM</a></li>
                                <li><a data-toggle="tab" href="#pemilik">Data Pemilik</a></li>
                                <li><a data-toggle="tab" href="#akun">Akun</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->
                @if(Session::has('pesan'))
                    <p class="alert alert-info">{{ Session::get('pesan') }}</p>
                @endif
                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">

                        <div class="products-tabs">

                            <div id="umkm" class="tab-pane active">
                                <div class="section">
                                    <!-- container -->
                                    <div class="container">
                                        <!-- row -->
                                        <div class="row">

                                            <div class="col-md-12 order-details">
                                                <!-- Billing Details -->
                                                <div class="billing-details">
                                                    <div class="section-title" style="text-align: center;">
                                                        <h3 class="title">Profil UMKM</h3>
                                                    </div>
                                                    @if(session()->has('message'))
                                                    <div class="alert alert-success">
                                                        <strong>{{ session()->get('message') }}</strong>
                                                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                                    </div>
                                                    @endif
                                                    <form class="form-horizontal" action="{{route('profile-umkm.profile', $umkm->umkm_id)}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <div class="form-group">
                                                            <h4>Nama UMKM <span class="text-danger">*</span></h4>
                                                            <input class="input" name="umkm_nama" value="{{$umkm->umkm_nama}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <h4>Kategori UMKM <span class="text-danger">*</span></h4>
                                                            <select name="kategori_id" id="kategori_id" class="input">
                                                                @foreach($kategori as $no => $kategori)
                                                                <option value="{{$kategori->kategori_id }}">
                                                                    {{$kategori->kategori_nama}}</option>
                                                                @endforeach
                                                            </select>
                                                            @if(isset($kategori))
                                                            <script>
                                                                document.getElementById('kategori_id').value =
                                                                    "{{$kategori->kategori_id}}"
                                                            </script>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <h4>Lama Usaha UMKM <span class="text-danger">*</span></h4>
                                                            <input class="input" type="text" name="umkm_lama_usaha" value="{{$umkm->umkm_lama_usaha}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <h4>No Telfon UMKM <span class="text-danger">*</span></h4>
                                                            <input class="input" type="text" name="umkm_nohp" value="{{$umkm->umkm_nohp}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <h4>Provinsi <span class="text-danger">*</span></h4>
                                                            <select name="prov_id" id="prov_id" class="input">
                                                                <option value="">-Pilih Provinsi-</option>
                                                                @foreach($prov as $no => $prov)
                                                                <option value="{{$prov->prov_id }}">
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
                                                        <div class="form-group">
                                                            <h4>Kota <span class="text-danger">*</span></h4>
                                                            <select name="kota_id" id="kota_id" class="input">
                                                                <option value="">-Pilih Kota-</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <H4>Alamat <span class="text-danger">*</span></H4>
                                                            <textarea class="input" type="text" name="umkm_alamat">{!!$umkm->umkm_alamat!!}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <h4>Foto</h4>
                                                            <img src="{{ asset('img/frontend/logo_umkm/' . $umkm->umkm_foto )}}" alt="" width="100" style="margin-bottom:20px;">
                                                            <input class="input" type="file" name="umkm_foto">
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary btn-lg" name="profile">UPDATE</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /Billing Details -->
                                            </div>

                                        </div>
                                        <!-- /row -->
                                    </div>
                                    <!-- /container -->
                                </div>
                            </div>

                            <div id="pemilik" class="tab-pane ">
                                <div class="section">
                                    <!-- container -->
                                    <div class="container">
                                        <!-- row -->
                                        <div class="row">

                                            <div class="col-md-12 order-details">
                                                <!-- Billing Details -->
                                                <div class="billing-details">
                                                    <div class="section-title" style="text-align: center;">
                                                        <h3 class="title">Pemilik</h3>
                                                    </div>
                                                    @if(session()->has('message'))
                                                    <div class="alert alert-success">
                                                        <strong>{{ session()->get('message') }}</strong>
                                                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                                    </div>
                                                    @endif
                                                    <form class="form-horizontal" action="{{route('profile-umkm.pemilik', $umkm->umkm_id)}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <div class="form-group">
                                                            <h4>Nama Lengkap <span class="text-danger">*</span></h4>
                                                            <input class="input" name="pemilik" value="{{$umkm->pemilik}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <h4>Tanggal Lahir <span class="text-danger">*</span></h4>
                                                            <input class="input" type="date" name="pemilik_tgl_lahir" value="{{$umkm->pemilik_tgl_lahir}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <h4>No Telfon <span class="text-danger">*</span></h4>
                                                            <input class="input" type="number" name="pemilik_nohp" value="{{$umkm->pemilik_nohp}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <H4>Alamat <span class="text-danger">*</span></H4>
                                                            <textarea class="input" type="text" name="pemilik_alamat">{!!$umkm->pemilik_alamat!!}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <h4>Foto KTP</h4>
                                                            <img src="{{ asset('img/frontend/logo_umkm/' . $umkm->pemilik_ktp )}}" alt="" width="100" style="margin-bottom:20px;">
                                                            <input class="input" type="file" name="pemilik_ktp">
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary btn-lg">UPDATE</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /Billing Details -->
                                            </div>

                                        </div>
                                        <!-- /row -->
                                    </div>
                                    <!-- /container -->
                                </div>
                            </div>

                            <div id="akun" class="tab-pane ">
                                <div class="section">
                                    <!-- container -->
                                    <div class="container">
                                        <!-- row -->
                                        <div class="row">

                                            <div class="col-md-12 order-details">
                                                <!-- Billing Details -->
                                                <div class="billing-details">
                                                    <div class="section-title" style="text-align: center;">
                                                        <h3 class="title">Akun</h3>
                                                    </div>
                                                    @if(session()->has('message'))
                                                    <div class="alert alert-success">
                                                        <strong>{{ session()->get('message') }}</strong>
                                                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                                    </div>
                                                    @endif
                                                    <form class="form-horizontal" action="{{route('profile-umkm.akun', $umkm->umkm_id)}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <div class="form-group">
                                                            <h4>Email<span class="text-danger">*</span></h4>
                                                            <input type="email" class="input" name="umkm_email" value="{{$umkm->umkm_email}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <h4>Password<span class="text-danger">*</span></h4>
                                                            <input type="password" class="input" type="date" name="umkm_pasword" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary btn-lg" name="akun">UPDATE</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /Billing Details -->
                                            </div>

                                        </div>
                                        <!-- /row -->
                                    </div>
                                    <!-- /container -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /container -->
</div>
<!-- /HEADER PROFILE -->
@if(!empty($umkm))
<script>
    $(document).ready(function() {
        var kota_id = '';
        var prov_id = '<?= $umkm->prov_id ?>';
        axios.post("{{url('umkm/profile-umkm/carikota')}}", {
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