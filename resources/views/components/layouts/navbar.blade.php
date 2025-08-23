<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="#">GreenWiyata</a>
    
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" 
            id="sidebarToggle" href="#!">
        <i class="fas fa-bars"></i>
    </button>
    
    <!-- Right Side -->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="container-fluid">

            <!-- User Menu -->
            <div class="dropdown ms-auto">
                <!-- Trigger Dropdown -->
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" 
                   id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <!-- Icon User -->
                    <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" 
                         alt="User" width="32" height="32" class="rounded-circle me-2">
                    <!-- Username -->
                    <strong>{{ Auth::user()->name ?? 'Guest' }}</strong>
                </a>

                <!-- Dropdown Menu -->
                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="/logout">Log-out</a></li>
                </ul>
            </div>
        </div>
    </form>
</nav>
