@extends ('frontend/layouts/app')

@section ('title', 'Tentang Kami')
@section ('content')
<div id="breadcrumb" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">{{$articel->artikel_judul}}</h3>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="col-md-12 text-center">
                    <img src="{{ asset('img/backend/artikel/'. $articel->artikel_gambar) }}" alt="">	
                    <hr>
                </div>
                {!! $articel->artikel_isi !!}	
            </div>
            <div class="col-md-4">
                <h3><b> Artikel lainnya </b></h3>
                <hr>
                <div>
                    <ul>
                        @foreach( $articel_judul as $no => $articel_juduls )
                        <li class="li_list_judul">
                            <a href="{{ route('articel', $articel_juduls->artikel_id) }}">{{ Str::limit($articel_juduls->artikel_judul, 50) }}</a>
                        </li>
                        <hr>
                        @endforeach
                        {{ $articel_judul->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection