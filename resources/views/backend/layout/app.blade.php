<!DOCTYPE html>
<html lang="en">

<head>
    @include('component/header')
</head>

<body class="hold-transition sidebar-mini">
    <script src="{{asset('lte/ckeditor/ckeditor.js')}}"> </script>
    <div class="wrapper">
        @include('component/navbar')

        @include('component/sidebar')

        <div class="content-wrapper">

        </div>

        @include('component/footer')
    </div>

    @include('component/script')
</body>

</html>