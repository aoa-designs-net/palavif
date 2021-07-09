<!-- Navbar -->
<div class="navbar-vertical navbar-expand-lg mb-3 mb-lg-5">
    <!-- Navbar Toggle -->
    <div id="">
        <button type="button" class="navbar-toggler btn btn-block btn-white mb-3" aria-label="Toggle navigation"
            aria-expanded="false" aria-controls="navbarVerticalNavMenu" data-toggle="collapse"
            data-target="#navbarVerticalNavMenu">
            <span class="d-flex justify-content-between align-items-center">
                <span class="h5 mb-0">Nav menu</span>

                <span class="navbar-toggle-default">
                    <i class="tio-menu-hamburger"></i>
                </span>

                <span class="navbar-toggle-toggled">
                    <i class="tio-clear"></i>
                </span>
            </span>
        </button>
    </div>
    <!-- End Navbar Toggle -->

    <div id="navbarVerticalNavMenu" class="collapse navbar-collapse">
        <!-- Navbar Nav -->
        <ul class="js-scrollspy navbar-nav navbar-nav-lg nav-tabs card card-navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ set_active_route('dashboard.index') }}" href="{{ route('dashboard.index') }}">
                    <i class="tio-apps nav-icon"></i>Dashbaord
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ set_active_route('dashboard.profile.index') }}"
                    href="{{ route('dashboard.profile.index') }}">
                    <i class="tio-user-outlined nav-icon"></i>My Profile
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ set_active_route('dashboard.wallet.index') }}"
                    href="{{ route('dashboard.wallet.index') }}">
                    <i class="tio-wallet nav-icon"></i>My Wallet
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ set_active_route('dashboard.transaction.index') }}"
                    href="{{ route('dashboard.transaction.index') }}">
                    <i class="tio-archive nav-icon"></i>My Transactions
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- End Navbar -->
