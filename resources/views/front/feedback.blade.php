<!DOCTYPE html>
<html lang="en">

@include('layouts.front.css')

<body class="index-page">

  @include('layouts.front.menu')

  <main class="main">

    <div class="page-title light-background">
      <div class="container">
        <h1>Feedback</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="/">Home</a></li>
            <li class="current">Your Feedback</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->
    <section class="contact section mt-3 light-backgroun">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4 g-lg-5">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
              <h3>Send Your Feedback</h3>
              @livewire('front.feedback')
            </div>
          </div>
          <div class="col-lg-3"></div>
        </div>
      </div>
      </div>

  </main>

  @include('layouts.front.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('asset/front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('asset/front/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset('asset/front/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('asset/front/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ asset('asset/front/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{ asset('asset/front/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{ asset('asset/front/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('asset/front/assets/js/main.js')}}"></script>

</body>

</html>