<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{env('APP_NAME')}} - {{Request()->Route()->getName()}}</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('asset/images/logo.png')}}" rel="icon">
  <link href="{{ asset('asset/images/logo-touch-icon.png')}}" rel="apple-touch-icon">

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
        <h1>Tuliwamu Complaint System</h1>
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
                  <span><i class="bi bi-award"></i> Premium Service</span>
                  <span><i class="bi bi-clock"></i> Since 2015</span>
                  <span><i class="bi bi-star-fill"></i> 4.9/5 Rating</span>
                </div>
                <p class="lead">
                   
                </p>
              </div>

              <div class="service-tabs" data-aos="fade-up" data-aos-delay="200">
                <ul class="nav nav-tabs" id="serviceTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#service-details-tab-1" type="button" role="tab" aria-controls="overview" aria-selected="true">
                      <i class="bi bi-info-circle"></i> Overview
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#service-details-tab-2" type="button" role="tab" aria-controls="process" aria-selected="false">
                      <i class="bi bi-diagram-3"></i>How to Send Complaint ?
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#service-details-tab-3" type="button" role="tab" aria-controls="benefits" aria-selected="false">
                      <i class="bi bi-graph-up-arrow"></i> Benefits
                    </button>
                  </li>
                </ul>

                <div class="tab-content">

                  <div class="tab-pane fade show active" id="service-details-tab-1" role="tabpanel" aria-labelledby="overview-tab">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="content-block">
                          <h3>Tuliwamu Mobile App</h3>
                          <p>Tuliwamu is a versatile complaint assistance app that enables users to report issues via text, audio, video, or SOS alerts, ensuring accessibility for all. The app streamlines communication between complainants and support teams with features like real-time tracking, AI-powered categorization, and secure (optionally anonymous) submissions. Designed for both public and organizational use, Tuliwamu provides a user-friendly interface, multi-language support, and instant notifications to ensure timely resolution of grievances..</p>
                          
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="service-sidebar" data-aos="fade-left">
                        <div class="action-card" data-aos="zoom-in" data-aos-delay="100">
                                <h3>Ready to Assist you 24/7?</h3>
                                <p>Aims to bridge the gap between those in need and assistance providers, making complaint resolution faster and transparent</p>
                                <a href="#" class="btn-primary">Download Mobile App Now</a>
                                <span class="guarantee"><i class="bi bi-shield-check"></i> 100% Free download</span>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="service-details-tab-2" role="tabpanel" aria-labelledby="process-tab">
                    <div class="process-timeline">
                      <div class="timeline-item">
                        <div class="timeline-marker">01</div>
                        <div class="timeline-content">
                          <h4>Free Download &amp; installing</h4>
                          <p>Download Tuliwamu for free <a href="#!"> download app</a>. afer downloading install it on your device.</p>
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

                  <div class="tab-pane fade" id="service-details-tab-3" role="tabpanel" aria-labelledby="benefits-tab">
                    <div class="row g-4">
                      <div class="col-md-6">
                        <div class="benefit-card">
                          <div class="benefit-icon">
                            <i class="bi bi-graph-up"></i>
                          </div>
                          <h4>Convenient & Accessible Reporting</h4>
                          <p>Submit complaints in any format (text, audio, video, or SOS) based on preference or urgency.</p>
                          <p>No need for lengthy paperwork—quick and hassle-free submissions.</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="benefit-card">
                          <div class="benefit-icon">
                            <i class="bi bi-people"></i>
                          </div>
                          <h4>Faster Response & Resolution</h4>
                          <p>Real-time tracking keeps users updated on complaint status to ensures complaints reach the right authority quickly, reducing delays.</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="benefit-card">
                          <div class="benefit-icon">
                            <i class="bi bi-cash-coin"></i>
                          </div>
                          <h4> Enhanced Safety & Emergency Support</h4>
                          <p>SOS alerts with GPS provide immediate help in critical situations (e.g., accidents, threats).Video/audio evidence strengthens complaints, increasing credibility and actionability.</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="benefit-card">
                          <div class="benefit-icon">
                            <i class="bi bi-bar-chart-line"></i>
                          </div>
                          <h4>Inclusive & User-Friendly</h4>
                          <p>Supports multiple languages and voice-to-text for wider accessibility.Helps those with limited literacy by allowing voice/video submissions.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="service-gallery" data-aos="fade-up" data-aos-delay="300">
                <h3>Tuliwamu Mobile App Complaint Steps</h3>
                <div class="service-details-slider swiper init-swiper">
                  <script type="application/json" class="swiper-config">
                    {
                      "loop": true,
                      "speed": 800,
                      "autoplay": {
                        "delay": 5000
                      },
                      "slidesPerView": 1,
                      "spaceBetween": 30,
                      "breakpoints": {
                        "768": {
                          "slidesPerView": 2
                        }
                      },
                      "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                      }
                    }
                  </script>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <div class="portfolio-item">
                        <img src="{{ asset('asset/front/assets/img/abstract/banner.png')}}" style="height:500px; width:100%;" alt="" class="img-fluid" loading="lazy">
                        
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="portfolio-item">
                        <img src="{{ asset('asset/front/assets/img/abstract/banner.png')}}" style="height:500px; width:100%;" alt="" class="img-fluid" loading="lazy">
                        
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="portfolio-item">
                        <img src="{{ asset('asset/front/assets/img/abstract/banner.png')}}" style="height:500px; width:100%;" alt="" class="img-fluid" loading="lazy">
                        
                      </div>
                    </div>
                  </div>
                  <div class="swiper-pagination"></div>
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