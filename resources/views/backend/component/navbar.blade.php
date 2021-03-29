<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('backend/dashboard')}}" class="nav-link">Home</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="btn btn-dark btn-sm" href="{{ route('logout') }}" role="button"><i class="fas fa-sign-out-alt"></i></a>
            <!-- <button type="button" class="btn btn-danger btn-sm" href="{{ route('logout') }}"><i class="fa fa-sign-out-alt"></i> Logout</button> -->
        </li>
    </ul>
</nav>