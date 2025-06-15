<nav class="top-app-bar navbar navbar-expand navbar-primary bg-primary">
    <div class="container-fluid px-4">
        <!-- Drawer toggle button-->
        <button class="btn btn-lg btn-icon order-1 order-lg-0" id="drawerToggle" href="javascript:void(0);"><i class="material-icons text-white">menu</i></button>
        <!-- Navbar brand-->
        <a class="navbar-brand me-auto" href="/home"><div class="text-uppercase text-white font-monospace">Tuliwamu </div></a>
        <!-- Navbar items-->
        <div class="d-flex align-items-center mx-3 me-lg-0">
            <!-- Navbar-->
            <ul class="navbar-nav d-none d-lg-flex">
                <li class="nav-item"><a class="nav-link text-white" href="#">{{auth()->user()->name}}</a></li>
            </ul>
            <!-- Navbar buttons-->
            <div class="d-flex">
                <!-- User profile dropdown-->
                <div class="dropdown">
                    <button class="btn btn-lg btn-icon dropdown-toggle" id="dropdownMenuProfile" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons text-white">person</i></button>
                    <ul class="dropdown-menu dropdown-menu-end mt-3" aria-labelledby="dropdownMenuProfile">
                        <li>
                           
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <a class="dropdown-item" href="{{ route ('logout') }}">
                                <i class="material-icons leading-icon">logout</i>
                                <div class="me-3">Logout</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>