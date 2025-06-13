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
                <div class="drawer-menu-divider d-sm-none"></div>
                <a class="nav-link" href="/home">
                    <div class="nav-link-icon"><i class="material-icons">language</i></div>
                    Dashboard
                </a>
                <div class="drawer-menu-divider"></div>
                <!-- Drawer section heading (Complaints)-->
                <div class="drawer-menu-heading">Complaints</div>
                <a class="nav-link" href="/admin/complaints/pending">
                    Pending
                </a>
                <a class="nav-link" href="/admin/complaints/resolved">
                    Resolved
                </a>
                <a class="nav-link" href="/admin/complaints">
                    Emergency
                </a>
                <!-- Drawer link (Dashboards)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                    <div class="nav-link-icon"><i class="material-icons">dashboard</i></div>
                    Settings
                    <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                </a>
                <!-- Nested drawer nav (Dashboards)-->
                <div class="collapse" id="collapseDashboards" aria-labelledby="headingOne" data-bs-parent="#drawerAccordion">
                    <nav class="drawer-menu-nested nav">
                        <a class="nav-link" href="/admin/settings/system_user">System Users</a>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Drawer footer        -->
        <div class="drawer-footer border-top">
            <div class="d-flex align-items-center">
                <i class="material-icons text-muted">account_circle</i>
                <div class="ms-3">
                    <div class="caption">Logged in as:</div>
                    <div class="small fw-500">Start Bootstrap</div>
                </div>
            </div>
        </div>
    </nav>
</div>