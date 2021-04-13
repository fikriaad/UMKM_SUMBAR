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
                    <div class="form-group">
                        <input class="input" type="text" name="komentar_nama" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="komentar_nohp" placeholder="Your Phone Number">
                    </div>
                    <div class="form-group">
                        <input class="input" type="email" name="email" placeholder="Enter Your Email">
                    </div>
                    <div class="form-group">
                        <textarea class="input" placeholder="Comment here"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-lg" type="submit" name="simpan">SUBMIT</button>
                    </div>
                </div>
                <!-- /Billing Details -->
            </div>
        </div>
    </div>
</div>

@endsection