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
    <button class="btn btn-success my-4" onclick="location.reload(true);" style="margin-left: 20px;"><i class="fas fa-redo-alt"></i></button>
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="verifikasi-tab" data-toggle="pill" href="#verifikasi" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Sudah Verifikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="belum-verifikasi-tab" data-toggle="pill" href="#belum-verifikasi" role="tab" aria-controls="belum-verifikasi" aria-selected="false">Belum Verifikasi</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                    <div class="tab-pane fade show active" id="verifikasi" role="tabpanel" aria-labelledby="verifikasi-tab">
                        <div class="card">
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                <strong>{{ session()->get('message') }}</strong>
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                            @endif
                            <div class="card-body">
                                <a href="{{route('umkm.create')}}" class="btn btn-primary my-4">
                                    Tambah Data
                                </a>
                                <table class="table exampledt">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama UMKM</th>
                                            <th scope="col">Kategori</th>
                                            <th scope="col">Lama Usaha</th>
                                            <!-- <th scope="col">No Telfon</th> -->
                                            <!-- <th scope="col">Provinsi</th> -->
                                            <th scope="col">Kota</th>
                                            <th scope="col">Alamat</th>
                                            <!-- <th scope="col">Email</th> -->
                                            <!-- <th scope="col">Instagram</th> -->
                                            <!-- <th scope="col">Facebook</th> -->
                                            <th scope="col">Foto</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($umkmv as $no => $umkm)
                                        <tr>
                                            <td>{{$no + 1}}</td>
                                            <td>{{$umkm->umkm_nama}}</td>
                                            <td>{{$umkm->kategori_nama}}</td>
                                            <td>{{$umkm->umkm_lama_usaha}}</td>
                                            <!-- <td>{{$umkm->umkm_nohp}}</td> -->
                                            <!-- <td>{{$umkm->prov_nama}}</td> -->
                                            <td>{{$umkm->kota_nama}}</td>
                                            <td>{!!$umkm->umkm_alamat!!}</td>
                                            <!-- <td>{{$umkm->umkm_email}}</td> -->
                                            <!-- <td>{{$umkm->umkm_instagram}}</td> -->
                                            <!-- <td>{{$umkm->umkm_facebook}}</td> -->
                                            <td><img src="{{ asset('img/frontend/logo_umkm/' . $umkm->umkm_foto )}}" alt="homepage" class="light-logo" style="width: 10em;"></td>
                                            <td>
                                                <label class="switch">
                                                    <?php $cek = $umkm->umkm_status ?>
                                                    <input type="checkbox" class="cek_umkm" id="cek_umkm<?= $umkm->umkm_id ?>" value="<?= $umkm->umkm_id ?>" onchange="cekStatus(<?= $umkm->umkm_id ?>, this)" <?php echo ($cek == '1') ? "checked" : "" ?>>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <a href="{{ route('umkm.edit', $umkm->umkm_id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="mHapus('{{ route('umkm.delete', $umkm->umkm_id) }}')"><i class="fa fa-trash"></i> Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="belum-verifikasi" role="tabpanel" aria-labelledby="belum-verifikasi-tab">
                        <div class="card">
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                <strong>{{ session()->get('message') }}</strong>
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                            @endif
                            <div class="card-body">
                                <a href="{{route('umkm.create')}}" class="btn btn-primary my-4">
                                    Tambah Data
                                </a>
                                <table class="table exampledt">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama UMKM</th>
                                            <th scope="col">Kategori</th>
                                            <th scope="col">Lama Usaha</th>
                                            <!-- <th scope="col">No Telfon</th> -->
                                            <!-- <th scope="col">Provinsi</th> -->
                                            <th scope="col">Kota</th>
                                            <th scope="col">Alamat</th>
                                            <!-- <th scope="col">Email</th> -->
                                            <!-- <th scope="col">Instagram</th> -->
                                            <!-- <th scope="col">Facebook</th> -->
                                            <th scope="col">Foto</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($umkmb as $no => $umkm)
                                        <tr>
                                            <td>{{$no + 1}}</td>
                                            <td>{{$umkm->umkm_nama}}</td>
                                            <td>{{$umkm->kategori_nama}}</td>
                                            <td>{{$umkm->umkm_lama_usaha}}</td>
                                            <!-- <td>{{$umkm->umkm_nohp}}</td> -->
                                            <!-- <td>{{$umkm->prov_nama}}</td> -->
                                            <td>{{$umkm->kota_nama}}</td>
                                            <td>{!!$umkm->umkm_alamat!!}</td>
                                            <!-- <td>{{$umkm->umkm_email}}</td> -->
                                            <!-- <td>{{$umkm->umkm_instagram}}</td> -->
                                            <!-- <td>{{$umkm->umkm_facebook}}</td> -->
                                            <td><img src="{{ asset('img/frontend/logo_umkm/' . $umkm->umkm_foto )}}" alt="homepage" class="light-logo" style="width: 10em;"></td>
                                            <td>
                                                <label class="switch">
                                                    <?php $cek = $umkm->umkm_status ?>
                                                    <input type="checkbox" class="cek_umkm" id="cek_umkm<?= $umkm->umkm_id ?>" value="<?= $umkm->umkm_id ?>" onchange="cekStatus(<?= $umkm->umkm_id ?>, this)" <?php echo ($cek == '1') ? "checked" : "" ?>>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <a href="{{ route('umkm.edit', $umkm->umkm_id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="mHapus('{{ route('umkm.delete', $umkm->umkm_id) }}')"><i class="fa fa-trash"></i> Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="formDelete">
                <div class="modal-body">
                    @csrf
                    @method('delete')
                    Yakin Hapus Data ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // untuk hapus data
    function mHapus(url) {
        $('#ModalHapus').modal()
        $('#formDelete').attr('action', url);
    }

    function cekStatus(id, ceklis) {
        if (ceklis.checked) {
            // alert("ceklis Dihidupkan")
            axios.post("{{url('backend/umkm/aktif')}}", {
                'id': id,
            }).then(function(res) {
                // console.log(res.data.message)
                toastr.info(res.data.message)
            }).catch(function(err) {
                console.log(err);
            })
        } else {
            // alert("Ceklis dimatikan")
            axios.post("{{url('backend/umkm/mati')}}", {
                'id': id,
            }).then(function(res) {
                // console.log(res.data.message)
                toastr.warning(res.data.message)
            }).catch(function(err) {
                console.log(err);
            })
        }
    }
</script>
@endsection