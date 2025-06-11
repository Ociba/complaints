<!DOCTYPE html>
<html lang="en">
    <head>
       @include('layouts.css')
    </head>
    <body class="nav-fixed bg-light">
        <!-- Top app bar navigation menu-->
        @include('layouts.topnav')
        <!-- Layout wrapper-->
        <div id="layoutDrawer">
            <!-- Layout navigation-->
            @include('layouts.sidebar')
            <!-- Layout content-->
            <div id="layoutDrawer_content">
                <!-- Main page content-->
                <main>
                    <!-- Main dashboard content-->
                    <div class="container-xl p-5">
                        @include('layouts.breadcrumb')
                        <!-- Colored status cards-->
                        @yield('content')
                    </div>
                </main>
                <!-- Footer-->
               @include('layouts.footer')
            </div>
        </div>
        @include('layouts.javascript')
</body>
</html>
