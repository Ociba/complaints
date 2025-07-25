<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{env('APP_NAME')}} - {{Request()->Route()->getName()}}</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('asset//images/logo.png')}}" rel="icon">
  <link href="{{ asset('asset/images/logo.png')}}" rel="apple-touch-icon">

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
        <h1>How to download and use mobile App</h1>
        <p></p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="/">Home</a></li>
            <li class="current">{{Request()->route()->getName()}}</li>
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
                <h1>Tuliwamu Complaint System</h1>
                <div class="service-meta">
                  
                </div>
                <p class="lead">
                 Tuliwamu is a user-friendly mobile application designed to empower individuals to report complaints and seek assistance efficiently. Users can submit complaints in multiple formats—text, audio, video, or SOS alerts—ensuring accessibility for all. The app streamlines communication between complainants and support teams, ensuring timely responses and resolutions.
                </p>
              </div>

              <div class="service-tabs" data-aos="fade-up" data-aos-delay="200">

                <div class="tab-content">

                  <div class="tab-pane fade show active" id="service-details-tab-1" role="tabpanel" aria-labelledby="overview-tab">
                    <div class="row">
                      
                      <div class="col-md-12">
                      <div class="process-timeline">
                      <div class="timeline-item">
                        <div class="timeline-marker">01</div>
                        <div class="timeline-content">
                          <h4>Downloading &amp; Installing</h4>
                          <p>To get started, click <a href="/mobile-app-instructions">download app</a>, after it has downloaded, install it on your phone</p>
                        </div>
                      </div>

                      <div class="timeline-item">
                        <div class="timeline-marker">02</div>
                        <div class="timeline-content">
                          <h4>Create Account</h4>
                          <p>After Successful Installation, Open the App and create account by filling the information then Login.</p>
                          <p>Note: The Information you enter will be confidential and we shall use during the time of helping you.</p>
                        </div>
                      </div>

                      <div class="timeline-item">
                        <div class="timeline-marker">03</div>
                        <div class="timeline-content">
                          <h4>Sending Complaint</h4>
                          <p>When You Login Successful,There are many options provided on how you want to send your complaint,Please select the one which favours you at the time of complaining.</p>
                        </div>
                      </div>

                      <div class="timeline-item">
                        <div class="timeline-marker">04</div>
                        <div class="timeline-content">
                        <h4>Processing &amp; Responding to Your Complaint</h4>
                        <p>Our Team is ready to proceed with the process of handling your complaint and be in touch with you and other stakeholders to rescue the situation.</p>
                        </div>
                      </div>
                    </div>
                      </div>
                      <div class="col-lg-12 col-md-12 mt-4 text-center">
                          <h4>Download Mobile App Now</h4>
                          <p class="mt-1 mb-1"></p>
                          <a href="#!"><img src="{{ asset('asset\front\assets\img\googleplay-btn.svg')}}"></a>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>

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