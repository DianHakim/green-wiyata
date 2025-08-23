<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a href="{{ route('home') }}" class="nav-link">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Home
                </a>
                <a href="{{ route('posts.index') }}" class="nav-link">
                    <div class="sba-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                    Post
                </a>
                 <a href="{{ route('plants.index') }}" class="nav-link">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Plants
                </a>
                 <a href="{{ route('locationplant.index') }}" class="nav-link">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                    Location Plants
                </a>
            </div>
        </div>
    </nav>
</div>
