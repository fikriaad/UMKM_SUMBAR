@extends ('backend/layout.app')

@section ('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Admin</h1>
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
                Amin
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route($url, $admin->admin_id ?? null) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($admin))
                    @method('put')
                    @endif
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('admin_nama') {{ 'is-invalid' }} @enderror" name="admin_nama" value="{{ old('admin_nama') ?? $admin->admin_nama ?? '' }}">

                            @error('admin_nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('admin_email') {{ 'is-invalid' }} @enderror" name="admin_email" value="{{ old('admin_email') ?? $admin->admin_email ?? '' }}">

                            @error('admin_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control @error('admin_password') {{ 'is-invalid' }} @enderror" name="admin_password" value="{{ old('admin_password') ?? '' }}">
                            @error('admin_password')
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