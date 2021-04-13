<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{url('backend/dashboard')}}" class="brand-link" style="text-align: center;">
        <!-- <img src="{{asset('lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">
            <h3>ADMIN</h3>
        </span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="{{url('backend/dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('backend/admin')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>
                            Admin
                        </p>
                    </a>
                </li>
                <li class="nav-header">UMKM</li>
                <!-- <li class="nav-item">
                    <a href="{{url('backend/jenis')}}" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Jenis UMKM
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="{{url('backend/umkm')}}" class="nav-link">
                        <i class="nav-icon fas fa-coins"></i>
                        <p>
                            Data UMKM
                        </p>
                    </a>
                </li>
                <li class="nav-header">BARANG</li>
                <li class="nav-item">
                    <a href="{{url('backend/kategori')}}" class="nav-link">
                        <i class="nav-icon fas fa-pencil-alt"></i>
                        <p>
                            Kategori Barang
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('backend/sub')}}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Sub Kategori Barang
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{url('backend/barang')}}" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Data Barang
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('backend/gambar')}}" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Data Gambar Barang
                        </p>
                    </a>
                </li> -->
                <li class="nav-header">LAYOUT</li>
                <li class="nav-item ">
                    <a href="{{url('backend/slider')}}" class="nav-link">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                            Data Slider
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('backend/iklan')}}" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Data Iklan
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('backend/artikel')}}" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Data Artikel
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>