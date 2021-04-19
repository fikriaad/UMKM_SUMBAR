<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin-UMKM-Regristrasi</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Poppins -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    
    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }
        .register-page{
            background-color: #ACE3F2;
        }
        .card{
            background-color: #D4E5EA;
        }
    </style>
</head>

<body class="hold-transition register-page">
    <!-- jQuery Plugins -->
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('lte/build/js/axios.min.js')}}"></script>

    <div class="register-box">
        <div class="register-logo">
            <img src="{{asset('frontend/img/logo.png')}}" alt="">
            <div>
                <b>REGISTER</b>
            </div>
            <p style="color: #29499C; font-size: 15px">Silahkan daftar untuk membuat akun kamu</p>
        </div>

        <div class="card" style="border-radius: 10px;">
            <div class="card-body register-card-body" style="border-radius: 10px;">

                <form action="{{route('aksiregister-umkm')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama Pemilik" name="pemilik" value="{{ old('pemilik') ?? $umkm->pemilik ?? '' }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama Toko" name="umkm_nama" value="{{ old('umkm_nama') ?? $umkm->umkm_nama ?? '' }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" placeholder="WhatAspp UMKM" name="umkm_nohp" value="{{ old('umkm_nohp') ?? $umkm->umkm_nohp ?? '' }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            </div>
                        </div>
                        @error('umkm_nohp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group  mb-3">
                        <select name="kategori_id" id="kategori_id" class="form-control @error('kategori_id') {{ 'is-invalid' }} @enderror">
                            <option value="">-Kategori UMKM-</option>
                            @foreach($kategori as $no => $kategori)
                            <option value="{{ $kategori->kategori_id }}">
                                {{ $kategori->kategori_nama}}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            </div>
                        </div>  
                        @error('kategori_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group  mb-3">
                        <select name="prov_id" id="prov_id" class="form-control @error('prov_id') {{ 'is-invalid' }} @enderror">
                            <option value="">-Pilih Provinsi-</option>
                            @foreach($prov as $no => $prov)
                            <option value="{{ $prov->prov_id }}">
                                {{ $prov->prov_nama}}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            </div>
                        </div>  
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
                    <div class="input-group  mb-3">
                        <select name="kota_id" id="kota_id" class="form-control @error('kota_id') {{ 'is-invalid' }} @enderror">
                            <option value="">-Kota-</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            </div>
                        </div>  
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Alamat" name="umkm_alamat" value="{{ old('umkm_alamat') ?? $umkm->umkm_alamat ?? '' }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="umkm_email" value="{{ old('umkm_email') ?? $umkm->umkm_email ?? '' }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            </div>
                        </div>
                        @error('umkm_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password min 8 digit" name="umkm_password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            </div>
                        </div>
                        @error('umkm_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <p style="font-size: 12px">Sudah punya akun ? <a href="{{route('login')}}" style="color: #29499C"><b>Login</b></a></p>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block" style="background-color: #29499C; color: #fff">Daftar</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('lte/dist/js/adminlte.min.js')}}"></script>

    <script>
        // Cara Mengambil Kota Berdasarkan Provinsi
        $('#prov_id').change(function(e) {
            e.preventDefault();
            var kota_id = '';
            var prov_id = $('#prov_id').val();
            axios.post("{{url('umkm/carikota')}}", {
                'prov_id': prov_id,
            }).then(function(res) {
                console.log(res)
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
</body>

</html>