<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{env('APP_NAME')}} - {{Request()->Route()->getName()}}</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('asset/front/assets/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('asset/front/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('asset/front/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('asset/front/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('asset/front/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('asset/front/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{ asset('asset/front/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('asset/front/assets/css/main.css')}}" rel="stylesheet">
</head>

<body class="service-details-page">

  @include('layouts.front.menu')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade">
      <div class="container position-relative">
        <h1>Privacy Policy</h1>
        <p></p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="/">Home</a></li>
            <li class="current">Privacy Policy</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">

          <div class="col-lg-12 order-lg-1 order-2">
            <div class="service-main-content">
              <div class="service-header" data-aos="fade-up">
                <h1>Save Me Complaint System Privacy Policy</h1>
                <div class="service-meta">
                  
                </div>
                <p class="lead">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo erat at malesuada bibendum. Nullam eu risus sit amet nunc fermentum lacinia.
                </p>
              </div>
              <div class="service-sidebar" data-aos="fade-left">
              <div class="service-features-list" data-aos="fade-up" data-aos-delay="200">
                <h4>Privacy Policy</h4>
                <ul>
                  <li>
                    <i class="bi bi-megaphone"></i>
                    <div>
                      <h5>Social Media Marketing</h5>
                      <p>Strategic presence across all relevant platforms</p>
                    </div>
                  </li>
                  <li>
                    <i class="bi bi-search"></i>
                    <div>
                      <h5>SEO Optimization</h5>
                      <p>Improve your search engine rankings</p>
                    </div>
                  </li>
                  <li>
                    <i class="bi bi-newspaper"></i>
                    <div>
                      <h5>Content Marketing</h5>
                      <p>Engaging content that converts visitors</p>
                    </div>
                  </li>
                  <li>
                    <i class="bi bi-envelope-paper"></i>
                    <div>
                      <h5>Email Campaigns</h5>
                      <p>Targeted email marketing strategies</p>
                    </div>
                  </li>
                  <li>
                    <i class="bi bi-graph-up-arrow"></i>
                    <div>
                      <h5>Analytics &amp; Reporting</h5>
                      <p>Comprehensive performance tracking</p>
                    </div>
                  </li>
                </ul>
              </div></div>

            </div>
          </div>
        </div>

      </div>

    </section><!-- /Service Details Section -->

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