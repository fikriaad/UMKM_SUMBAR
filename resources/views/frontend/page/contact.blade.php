@extends ('frontend/layouts/app')

@section ('title', 'Tentang Kami')
@section ('content')
<div id="breadcrumb" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Hubungi Kami</h3>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- Billing Details -->
                <div class="billing-details">
                    <!-- <div class="section-title">
                        <h3 class="title"></h3>
                    </div> -->
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        <strong>{{ session()->get('message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    </div>
                    @endif
                    <form action="{{route('pesan')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input class="input" type="text" name="pesan_nama" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input class="input" type="number" name="pesan_nohp" placeholder="Your Phone Number">
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="pesan_email" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group">
                            <textarea class="input" placeholder="Comment here" name="pesan_isi"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-lg" type="submit" name="kirim">SUBMIT</button>
                        </div>
                    </form>
                </div>
                <!-- /Billing Details -->
            </div>
        </div>
    </div>
</div>

@endsection