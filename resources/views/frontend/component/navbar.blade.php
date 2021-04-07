    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class="{{ $active == 'home' ? 'active' : '' }}"><a href="{{ route('home')}}">Home</a></li>
                    <li class="{{ $active == 'about' ? 'active' : '' }}"><a href="{{route('about')}}">Tentang Kami</a></li>
                    <li class="{{ $active == 'product' ? 'active' : '' }}"><a href="{{ route('product')}}">Produk</a></li>
                    <li class="{{ $active == 'listUmkm' ? 'active' : '' }}"><a href="{{ route('listUmkm')}}">UMKM</a></li>
                    <li class="{{ $active == 'contact' ? 'active' : '' }}"><a href="#">Hubungi Kami</a></li>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container --> 
    </nav>
    <!-- /NAVIGATION -->