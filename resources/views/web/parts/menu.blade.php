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
                        <span><i data-feather="layers" class="align-self-center hori-menu-icon"></i>Peta</span>
                    </a>

                    <!--end submenu-->
                </li>
                <!--end has-submenu-->

                <!-- <li class="has-submenu">
                    <a href="#">
                        <span><i data-feather="database" class="align-self-center hori-menu-icon"></i>Data</span>
                    </a>
                     <ul class="submenu">
                        <li><a href="pages-blogs.html"><i class="ti ti-minus"></i>Blogs</a></li>
                        <li><a href="pages-faqs.html"><i class="ti ti-minus"></i>FAQs</a></li>
                        <li><a href="pages-pricing.html"><i class="ti ti-minus"></i>Pricing</a></li>
                        <li><a href="pages-profile.html"><i class="ti ti-minus"></i>Profile</a></li>
                        <li><a href="horizontal-starter.html"><i class="ti ti-minus"></i>Starter Page</a></li>
                        <li><a href="pages-timeline.html"><i class="ti ti-minus"></i>Timeline</a></li>
                        <li><a href="pages-treeview.html"><i class="ti ti-minus"></i>Treeview</a></li>
                    </ul> \
                </li> -->
                <!--end has-submenu-->

                <li class="has-submenu">
                    <a href="{{route('web.dokumen','semua')}}">
                        <span><i data-feather="folder" class="align-self-center hori-menu-icon"></i>Dokumen</span>
                    </a>
                </li>
                <!--end has-submenu-->
                <li class="has-submenu">
                    <a href="widgets.html">
                        <span><i data-feather="grid" class="align-self-center hori-menu-icon"></i>Survey</span>
                    </a>
                </li>
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