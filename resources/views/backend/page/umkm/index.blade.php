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
                    <li class="breadcrumb-item active">Data UMKM</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card">
            @if(session()->has('message'))
            <div class="alert alert-success">
                <strong>{{ session()->get('message') }}</strong>
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            </div>
            @endif
            <div class="card-header">
                Amin
            </div>
            <div class="card-body">
                <a href="{{route('umkm.create')}}" class="btn btn-primary my-4">
                    Tambah Data
                </a>
                <table class="table" id="example1">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama UMKM</th>
                            <th scope="col">Jenis</th>
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
                        @foreach ($umkm as $no => $umkm)
                        <tr>
                            <td>{{$no + 1}}</td>
                            <td>{{$umkm->umkm_nama}}</td>
                            <td>{{$umkm->jenis_nama}}</td>
                            <td>{{$umkm->umkm_lama_usaha}}</td>
                            <!-- <td>{{$umkm->umkm_nohp}}</td> -->
                            <!-- <td>{{$umkm->prov_nama}}</td> -->
                            <td>{{$umkm->kota_nama}}</td>
                            <td>{{$umkm->umkm_alamat}}</td>
                            <!-- <td>{{$umkm->umkm_email}}</td> -->
                            <!-- <td>{{$umkm->umkm_instagram}}</td> -->
                            <!-- <td>{{$umkm->umkm_facebook}}</td> -->
                            <td><img src="{{ asset('img/backend/umkm/' . $umkm->umkm_foto )}}" alt="homepage" class="light-logo" style="width: 10em;"></td>
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
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
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
</script>
@endsection