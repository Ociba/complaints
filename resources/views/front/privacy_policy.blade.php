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
                <h1>Tuliwamu Privacy Policy</h1>
                <div class="service-meta">
                  
                </div>
                <p class="lead">
                   Welcome to Tulwamu ("we," "our," or "us"). We respect your privacy and are committed to protecting your personal information. This Privacy Policy explains how we collect, use, disclose, and safeguard your data when you use our complaints application.
                </p>
                <p class="lead">By using our app, you consent to the practices described in this policy. If you do not agree, please do not use the application.</p>
              </div>
              <div class="service-sidebar" data-aos="fade-left">
              <div class="service-features-list" data-aos="fade-up" data-aos-delay="200">
                <h4>Privacy Policy</h4>
                <ul>
                  <li>
                    <i class="bi bi-megaphone"></i>
                    <div>
                      <h5>Information We Collect</h5>
                      <p>We may collect the following types of information:</p>
                      <ul>
                      <li class="mt-2"> Personal Information</li>
                         <p>- Name, Email address , Phone number, Location data (GPS or approximate location), Gender,Company used through travel (optional), Next of kin names,Next of kin contact, Your password (any you wish to use but should be stronger)</p>
                         <li class="mt-2"> Media and Files</li>
                         <p>Photos, Videos, Audio recordings,  Documents uploaded by users</p>
                         <li class="mt-2"> Device Information</li>
                         <p>Device type (mobile, tablet, etc.) , Operating system, IP address, Browser type </p>
                      </ul>
                    </div>
                  </li>
                  <li>
                    <i class="bi bi-search"></i>
                    <div>
                      <h5>How We Use Your Information</h5>
                      <p>We use the collected data for the following purposes: </p>
                      <p>- To process and respond to complaints.</p>
                      <p>- To improve our services and user experience</p>
                      <p>- To provide customer support.</p>
                      <p>- To comply with legal obligations.</p>
                      <p>- To analyze app usage for troubleshooting and enhancements.</p>
                    </div>
                  </li>
                  <li>
                    <i class="bi bi-newspaper"></i>
                    <div>
                      <h5>Permissions Required</h5>
                      <p>Our app requests the following permissions: </p>
                      <p>Location: To identify the user’s location for complaint submission.</p>
                      <p>Camera & Photos/Videos: To allow users to upload media related to complaints.</p>
                      <p>Microphone (Audio): To record and upload audio complaints if needed.</p>
                      <p>Storage: To access and store files related to complaints.</p>
                    </div>
                  </li>
                  <li>
                    <i class="bi bi-envelope-paper"></i>
                    <div>
                      <h5>Data Sharing & Disclosure</h5>
                      <p>We do not sell your personal information. However, we may share data with: </p>
                      <p>Authorities/Legal Bodies: If required by law or to resolve complaints.</p>
                      <p>Third-Party Service Providers: For analytics, hosting, or customer support (with strict confidentiality agreements).</p>
                      <p>Business Transfers: In case of a merger or acquisition, user data may be transferred. </p>
                    </div>
                  </li>
                  <li>
                    <i class="bi bi-graph-up-arrow"></i>
                    <div>
                      <h5>Data Security</h5>
                      <p>We implement security measures such as encryption and access controls to protect your data. However, no system is 100% secure, so we cannot guarantee absolute security.</p>
                    </div>
                  </li>

                  <li>
                    <i class="bi bi-check-circle"></i>
                    <div>
                      <h5>User Rights</h5>
                      <p>Depending on your location, you may have the right to: </p>
                      <p>- Access, correct, or delete your data. </p>
                      <p>- Opt out of data collection (where applicable).</p>
                      <p>- Withdraw consent for processing.</p>
                      <p>To exercise these rights, contact us at <a href="mailto:julisema4@gmail.com">julisema4@gmail.com</a> </p>
                    </div>
                  </li>
                  <li>
                    <i class="bi bi-person"></i>
                    <div>
                      <h5>Children’s Privac</h5>
                      <p>Our app is not intended for users under [13/16] years old. We do not knowingly collect data from children. If we become aware of such data, we will delete it.</p>
                    </div>
                  </li>
                  <li>
                    <i class="bi bi-lock"></i>
                    <div>
                      <h5>Changes to This Policy</h5>
                      <p>We may update this Privacy Policy. Users will be notified of significant changes via email or in-app alerts.  </p>
                    </div>
                  </li>
                  <li>
                    <i class="bi bi-phone"></i>
                    <div>
                      <h5>Contact Us</h5>
                      <p>For privacy-related questions, contact.</p>
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