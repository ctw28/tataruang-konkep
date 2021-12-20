<!-- Navbar -->
<nav class="navbar-custom">
    <ul class="list-unstyled topbar-nav float-end mb-0">



        <li class="menu-item">
            <!-- Mobile menu toggle-->
            <a class="navbar-toggle nav-link" id="mobileToggle">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a><!-- End mobile menu toggle-->
        </li>
        <!--end menu item-->
    </ul>
    <!--end topbar-nav-->

    <div class="navbar-custom-menu">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li class="has-submenu">
                    <a href="{{url('/')}}">
                        <span><i data-feather="home" class="align-self-center hori-menu-icon"></i>Beranda</span>
                    </a>
                </li>
                <!--end has-submenu-->
                <li class="has-submenu">
                    <a href="{{url('/')}}">
                        <span><i data-feather="map" class="align-self-center hori-menu-icon"></i>Peta</span>
                    </a>

                    <!--end submenu-->
                </li>
                <!--end has-submenu-->

                <li class="has-submenu">
                    <a href="#">
                        <span><i data-feather="database" class="align-self-center hori-menu-icon"></i>Pengaturan Pembinaan PR</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="pages-blogs.html"><i class="ti ti-minus"></i>Landasan Hukum</a></li>
                        <li><a href="pages-faqs.html"><i class="ti ti-minus"></i>Kineja Penataan Ruanga</a></li>
                    </ul>
                </li>
                <!--end has-submenu-->

                <li class="has-submenu">
                    <a href="{{route('web.tkprd')}}">
                        <span><i data-feather="command" class="align-self-center hori-menu-icon"></i>TKPRD</span>
                    </a>
                </li>
                <!-- <li class="has-submenu">
                    <a href="{{route('web.dokumen','semua')}}">
                        <span><i data-feather="folder" class="align-self-center hori-menu-icon"></i>Dokumen</span>
                    </a>
                </li> -->
                <!--end has-submenu-->
                <!-- <li class="has-submenu">
                    <a href="widgets.html">
                        <span><i data-feather="grid" class="align-self-center hori-menu-icon"></i>Survey</span>
                    </a>
                </li> -->
                <!--end has-submenu-->
                <li class="has-submenu">
                    <a href="widgets.html">
                        <span><i data-feather="info" class="align-self-center hori-menu-icon"></i>Tentang</span>
                    </a>
                </li>
                <!--end has-submenu-->
            </ul><!-- End navigation menu -->
        </div> <!-- end navigation -->
    </div>
    <!-- Navbar -->
</nav>
<!-- end navbar-->