<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend/component/header')
</head>

<body class="hold-transition sidebar-mini">
    <script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('lte/ckeditor/ckeditor.js')}}"> </script>
    <div class="wrapper">
        @include('backend/component/navbar')

        @include('backend/component/sidebar')

        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('backend/component/footer')
    </div>

    @include('backend/component/script')
</body>

</html>