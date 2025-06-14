<div id="layoutDrawer_nav">
    <!-- Drawer navigation-->
     
    <nav class="drawer accordion drawer-light bg-white" id="drawerAccordion">
        <div class="drawer-menu">
            <div class="nav">
                <!-- Drawer section heading (Account)-->
                <div class="drawer-menu-heading d-sm-none">Account</div>
                <!-- Drawer link (Notifications)-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i class="material-icons">notifications</i></div>
                    Notifications
                </a>
                <!-- Drawer link (Messages)-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i class="material-icons">mail</i></div>
                    Messages
                </a>
                <!-- Divider-->
                <div class="drawer-menu-divider"></div>
                <div class="drawer-menu-divider d-sm-none"></div>
                <a class="nav-link" href="/home" style="{{ Route::currentRouteName() === 'Home' ? 'font-weight:bold; color:#000;' : '' }}">
                    <div class="nav-link-icon"><i class="material-icons">language</i></div>
                    Dashboard
                </a>
                <div class="drawer-menu-divider"></div>
                <!-- Drawer section heading (Complaints)-->
                <div class="drawer-menu-heading">Complaints</div>
                <a class="nav-link"
                    href="{{ route('complaints.index') }}"
                    style="{{ Route::currentRouteName() === 'complaints.index' ? 'font-weight:bold; color:#000;' : '' }}">
                        All
                    </a>

                    <a class="nav-link"
                    href="{{ route('complaints.status', 'pending') }}"
                    style="{{ request()->routeIs('complaints.status') && request()->route('status') === 'pending' ? 'font-weight:bold; color:#000;' : '' }}">
                        Pending
                    </a>

                    <a class="nav-link"
                    href="{{ route('complaints.status', 'resolved') }}"
                    style="{{ request()->routeIs('complaints.status') && request()->route('status') === 'resolved' ? 'font-weight:bold; color:#000;' : '' }}">
                        Resolved
                    </a>

                
                <div class="drawer-menu-divider"></div>
                <!-- Drawer section heading (Complaints)-->
                <div class="drawer-menu-heading">Settings</div>
                <!-- Nested drawer nav (Dashboards)-->
                 <a class="nav-link" href="/admin/settings/system_user" style="{{ Route::currentRouteName() === 'Users' ? 'font-weight:bold; color:#000;' : '' }}">
                    System Users
                </a>
            </div>
        </div>
        <!-- Drawer footer        -->
        <div class="drawer-footer border-top">
            <div class="d-flex align-items-center">
                <i class="material-icons text-muted">account_circle</i>
                <div class="ms-3">
                    <div class="caption">Logged in as:</div>
                    <div class="small fw-500">{{ auth()->user()->role }}</div>
                </div>
            </div>
        </div>
    </nav>
</div>