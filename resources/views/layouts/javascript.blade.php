<!-- Load Bootstrap JS bundle-->
<script src="{{ asset('asset/admin/dist/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
<!-- Load global scripts-->
<script type="module" src="{{ asset('asset/admin/js/material.js')}}"></script>
<script src="{{ asset('asset/admin/js/scripts.js')}}"></script>
<!--  Load Chart.js via CDN-->
<script src="{{ asset('asset/admin/dist/js/chart.min.js')}}" crossorigin="anonymous"></script>
<!--  Load Chart.js customized defaults-->
<script src="{{ asset('asset/admin/js/charts/chart-defaults.js')}}"></script>
<!--  Load chart demos for this page-->
<script src="{{ asset('asset/admin/js/charts/demos/chart-pie-demo.js')}}"></script>
<!-- <script src="{{ asset('asset/admin/js/charts/demos/dashboard-chart-bar-grouped-demo.js')}}"></script> -->
<!-- Load Simple DataTables Scripts-->
<script src="{{ asset('asset/admin/dist/js/simple-datatables.min.js')}}" crossorigin="anonymous"></script>
<script src="{{ asset('asset/admin/js/datatables/datatables-simple-demo.js')}}"></script>

<!-- <script src="https://assets.startbootstrap.com/js/sb-customizer.js"></script> -->
@livewireScripts
@stack('scripts')

        <sb-customizer project="material-admin-pro"></sb-customizer>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'94d8a30ad801c836',t:'MTc0OTU1NjA3Ny4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='cdn-cgi/challenge-platform/h/b/scripts/jsd/f9574c83b4d7/maind41d.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"94d8a30ad801c836","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.5.0","token":"6e2c2575ac8f44ed824cef7899ba8463"}' crossorigin="anonymous"></script>