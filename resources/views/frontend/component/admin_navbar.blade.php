    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class="{{ $active == 'home' ? 'active' : '' }}"><a href="{{ route('dashboard-umkm')}}">Home</a></li>
                    <li class="{{ $active == 'profile' ? 'active' : '' }}"><a href="{{ route('profile-umkm')}}">Profile</a></li>
                    <li class="{{ $active == 'product' ? 'active' : '' }}"><a href="{{ route('product-umkm')}}">Produk</a></li>
                    <!-- <li class="{{ $active == 'listUmkm' ? 'active' : '' }}"><a href="{{ route('listUmkm')}}">Transaksi</a></li> -->
                    <li class="{{ $active == 'contact' ? 'active' : '' }}"><a href="#">Hubungi Kami</a></li>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container --> 
    </nav>
    <!-- /NAVIGATION -->