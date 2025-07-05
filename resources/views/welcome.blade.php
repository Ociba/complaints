<!DOCTYPE html>
<html lang="en">

@include('layouts.front.css')
<style>
  .hero-image {
    position: relative;
    overflow: hidden;
    height: 100%;
    /* or set a specific height */
  }

  .hero-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    /* this makes the image cover the container */
    display: block;
  }

  /* Ensure the container has a defined height */
  .image-wrapper {
    position: relative;
    height: 100%;
    /* Parent (.col-xl-6) must have a height */
    min-height: 400px;
    /* Fallback if parent height isn't set */
  }

  .images {
    width: 100%;
    height: 100%;
    position: relative;
  }

  /* Apply object-fit: cover to the main image */
  .main-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    /* Cover the container */
    object-position: center;
    /* Focus on center (adjust if needed) */
    border-radius: 1rem !important;
    /* Match rounded-4 (Bootstrap) */
    display: block;
  }

  /* Adjust the small image (assuming it's positioned absolutely) */
  .small-image {
    position: absolute;
    bottom: -20px;
    /* Adjust as needed */
    right: -20px;
    /* Adjust as needed */
    width: 40%;
    /* Adjust size */
    height: auto;
    /* Maintain aspect ratio */
    z-index: 2;
    border-radius: 1rem !important;
  }

  /* Style the floating badge */
  .experience-badge.floating {
    position: absolute;
    bottom: 20px;
    left: 20px;
    background: rgba(255, 255, 255, 0.9);
    padding: 10px;
    border-radius: 0.5rem;
    z-index: 3;
  }

  @media (max-width: 768px) {
    .image-wrapper {
      min-height: 300px;
      /* Shorter height on small screens */
    }

    .small-image {
      width: 30%;
      /* Smaller overlap on mobile */
    }
  }

  .feature-box,
  h4 {
    text-align: center;
    /* Centers icon, heading, and text */
    padding: 2rem;
  }

  .feature-box svg {
    display: block;
    margin: 0 auto 1.5rem;
    /* Centers SVG horizontally with space below */
    transition: transform 0.3s;
  }

  .feature-box:hover svg {
    transform: scale(1.1);
    /* Subtle hover effect */
  }

  /* Color overrides for SVG fills (optional) */
  .orange svg path:not([fill="#ffffff"]) {
    fill: #f39c12;
  }

  .blue svg path:not([fill="#ffffff"]) {
    fill: #3498db;
  }

  .green svg path:not([fill="#ffffff"]) {
    fill: #2ecc71;
  }

  .red svg path:not([fill="#ffffff"]) {
    fill: #e74c3c;
  }

  .info-box-with-bg {
    position: relative;
    border-radius: 15px;
    overflow: hidden;
    padding: 2rem;
    min-height: 500px;
    /* Adjust as needed */
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
    /* Dark overlay */
    url('{{ asset("asset/images/distress142.png") }}') center/cover no-repeat;
    color: white;
  }

  .info-box-content {
    position: relative;
    z-index: 2;
    /* Ensures content stays above background */
  }

  /* Adjust existing styles for dark background */
  .info-box-with-bg h3,
  .info-box-with-bg h4,
  .info-box-with-bg p {
    color: white;
  }

  .info-box-with-bg a {
    color: #4e9af1;
    text-decoration: none;
  }

  .info-box-with-bg .icon-box i {
    color: #4e9af1;
  }

  /* Optional: Add subtle animation to background */
  .info-box-with-bg:hover {
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
    url('{{ asset("asset/images/distress62.png") }}') center/cover no-repeat;
    transition: all 0.3s ease;
  }

  /* Slider Container */
  .col-lg-6.position-relative {
    min-height: 500px;
    /* Adjust as needed */
    overflow: hidden;
    border-radius: 15px;
    /* Optional rounded corners */
  }

  .hero-slider-container {
    min-height: 500px;
    overflow: hidden;
    border-radius: 15px;
  }

  .hero-slider {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  .slide {
    position: absolute;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    opacity: 0;
    transition: opacity 1s ease-in-out;
  }

  .slide.active {
    opacity: 1;
  }

  .gradient-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.3) 100%);
    z-index: 2;
  }

  .hero-content2 {
    position: relative;
    z-index: 3;
    padding: 2rem;
    color: white;
  }
  /* Phone mockup sizing control */
.phone-mockup {
  max-width: 100%; /* Adjust this value to control maximum width */
  margin: 0 auto;
}

/* Responsive width adjustments */
@media (min-width: 992px) {
  .phone-mockup {
    max-width: 320px; /* Larger width on desktop */
  }
}

/* Maintain aspect ratio */
.phone-mockup img {
  object-fit: contain;
  object-position: center;
}
</style>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('asset/images/logo.png')}}" alt="">
        <h1 class="sitename">Tuliwamu </h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#home" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#whatwedo">What We Do</a></li>
          <li><a href="#complaint">How to send Complaint</a></li>
          <li><a href="#faq">FAQ</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="#">Get Started</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="home" class="hero section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">
          <div class="col-lg-6">

            <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
              <h1 class="mb-4">
                Tuliwamu&nbsp;Mobile&nbsp;App<br>
                <span class="accent-text">IN DISTRESS, <br>WE RESPOND</span>
              </h1>
              <p class="mb-4 mb-md-5">Tuliwamu is a dedicated emergency response app designed to assist distressed Ugandans in the diaspora by providing immediate help and ensuring their safe return home. Whether you're facing an emergency, need urgent assistance, or want to report a complaint, Tuliwamu connects you with the right support quickly and efficiently.</p>
              <div class="hero-buttons">
                <a href="#about" class="btn btn-primary me-0 me-sm-2 mx-1">View More</a>
                <a href="#" class="btn btn-link mt-2 mt-sm-0 glightbox">
                  <i class="bi bi-play-circle me-1"></i>
                  Play Video
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6  position-relative hero-slider-container">
            <!-- Image Slider -->
            <div class="hero-slider">
              <div class="slide" style="background-image: url('{{ asset('asset/images/distress5.png') }}');"></div>
              <div class="slide" style="background-image: url('{{ asset('asset/images/distress11.png') }}');"></div>
              <div class="slide" style="background-image: url('{{ asset('asset/images/distress8.png') }}');"></div>
              <div class="slide" style="background-image: url('{{ asset('asset/images/distress10.png') }}');"></div>
              <div class="slide" style="background-image: url('{{ asset('asset/images/distress13.png') }}');"></div>
              <div class="slide" style="background-image: url('{{ asset('asset/images/distress142.png') }}');"></div>
            </div>
            <div class="gradient-overla"></div>
          </div>
        </div>

        <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
          <div class="container fw-bold text-center mt-2">
            <h2>Why should i install Tuliwamu Mobile Application ?</h2>
            <div class="company-badg mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-info-circle-fill me-2" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
              </svg>
              Tuliwamu App will/shall be used incase of the following situations listed below so that you can be helped as soon as possible.
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="stat-item">
              <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#ff3b30" viewBox="0 0 24 24">
                  <path d="M12 2L1 21h22L12 2zm0 3.5L18.5 19h-13L12 5.5z" />
                  <path d="M12 16a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" fill="#fff" />
                  <circle cx="12" cy="8.5" r="1.5" fill="#fff" />
                </svg>
              </div>
              <div class="stat-content">
                <h4>Danger</h4>
                <p class="mb-0">When you are in danger situation</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="stat-item">
              <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#8e44ad" viewBox="0 0 24 24">
                  <path d="M19 3h-4V1h-6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm6 12H6v-1.4c0-2 4-3.1 6-3.1s6 1.1 6 3.1V18z" />
                  <path d="M8 10h8v2H8z" fill="#fff" />
                </svg>
              </div>
              <div class="stat-content">
                <h4>Mistreated</h4>
                <p class="mb-0">When You are mistreated.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="stat-item">
              <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#3498db" viewBox="0 0 24 24">
                  <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-8 12H9v-2h2v2zm0-4H9V9h2v2zm0-4H9V5h2v2zm4 8h-2v-2h2v2zm0-4h-2V9h2v2zm0-4h-2V5h2v2z" />
                </svg>
              </div>
              <div class="stat-content">
                <h4>Under Serviced</h4>
                <p class="mb-0">Denial of rights</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="stat-item">
              <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#f39c12" viewBox="0 0 24 24">
                  <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                  <path d="M12 6.5c-.28 0-.5-.22-.5-.5s.22-.5.5-.5.5.22.5.5-.22.5-.5.5z" fill="#fff" />
                </svg>
              </div>
              <div class="stat-content">
                <h4>Stranded</h4>
                <p class="mb-0">When You have lost direction</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 align-items-center justify-content-between">

          <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
            <span class="about-meta">MORE ABOUT US</span>
            <h2 class="about-title">Specialized assistance for Ugandans abroad and within</h2>
            <p class="about-description">Tuliwamu is your reliable partner in distress—ensuring you’re never alone, no matter where you are. Download now and stay protected!.Diaspora Support – Specialized assistance for Ugandans abroad, including repatriation help when needed.</p>

            <div class="row feature-list-wrapper">
              <div class="col-md-6">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> a versatile complaint assistance app</li>
                  <li><i class="bi bi-check-circle-fill"></i> enables users to report issues instantly.</li>
                  <li><i class="bi bi-check-circle-fill"></i> Report issues via text, audio, video, or SOS alerts</li>
                </ul>
              </div>
              <div class="col-md-6">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> ensuring accessibility for all</li>
                  <li><i class="bi bi-check-circle-fill"></i> streamlines 24/7 reporting</li>
                  <li><i class="bi bi-check-circle-fill"></i> ensure timely resolution of grievances</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
            <div class="image-wrapper">
              <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                <img src="{{ asset('asset/images/distress152.png')}}" alt="Business Meeting" class="img-fluid main-image rounded-4">
                <img src="{{ asset('asset/images/distress142.png')}}" alt="Team Discussion" class="img-fluid small-image rounded-4">
              </div>
              <div class="experience-badge floating">
                <h3>Tuliwamu</span></h3>
                <p>Download App Now</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Features Section -->

    <!-- Features Cards Section -->
    <section id="whatwedo" class="features-cards section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="feature-box orange">
              <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#ffffff" viewBox="0 0 24 24">
                <path d="M12 2L1 21h22L12 2zm0 3.5L18.5 19h-13L12 5.5z" />
                <text x="12" y="16" font-family="Arial" font-size="10" font-weight="bold" text-anchor="middle" fill="#ff3b30">SOS</text>
              </svg>
              <h4>SOS Alert</h4>
              <p>Instantly alert emergency contacts and response teams with your location in critical situations.</p>
            </div>
          </div><!-- End Feature Borx-->

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="feature-box blue">
              <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#ffffff" viewBox="0 0 24 24">
                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z" />
                <path d="M7 12h10v2H7zm0-4h10v2H7z" fill="#3498db" />
                <path d="M15 18l-5-3v6l5-3z" fill="#3498db" />
              </svg>
              <h4>Complaints Portal</h4>
              <p>Report incidents via audio, video, or text to ensure your concerns are documented and addressed.</p>
            </div>
          </div><!-- End Feature Borx-->

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="feature-box green">
              <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#ffffff" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="8" stroke="#2ecc71" stroke-width="2" fill="none" />
                <path d="M12 4v3M12 17v3M4 12h3M17 12h3" stroke="#2ecc71" stroke-width="2" />
                <path d="M12 8l3 3-3 3-3-3z" fill="#2ecc71" />
              </svg>
              <h4>Quick Response System</h4>
              <p>Connects you with trusted support networks for timely assistance.</p>
            </div>
          </div><!-- End Feature Borx-->

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="feature-box red">
              <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#ffffff" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 12c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z" />
                <circle cx="12" cy="9" r="3" fill="#e74c3c" />
                <path d="M12 6v6" stroke="#ffffff" stroke-width="2" />
              </svg>
              <h4>Location Tracking</h4>
              <p>Helps responders locate and reach you faster in emergencies.</p>
            </div>
          </div><!-- End Feature Borx-->

        </div>

      </div>

    </section><!-- /Features Cards Section -->

    <!-- Features 2 Section -->
    <section id="complaint" class="features-2 section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">

          <div class="col-lg-4">

            <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="200">
              <div class="d-flex align-items-center justify-content-end gap-4">
                <div class="feature-content">
                  <h3>How to download App ?</h3>
                  <p>Search for <strong>"Tuliwamu"</strong> on your phone device in play store.</p>
                </div>
                <div class="feature-icon flex-shrink-0">
                  {{--<i class="bi bi-display"></i>--}} 01
                </div>
              </div>
            </div><!-- End .feature-item -->

            <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="300">
              <div class="d-flex align-items-center justify-content-end gap-4">
                <div class="feature-content">
                  <h3>Download &amp; installing</h3>
                  <p>Click download Tuliwamu for free <a href="#!"> download app</a>. afer downloading install it on your device.</p>
                </div>
                <div class="feature-icon flex-shrink-0">
                  {{--<i class="bi bi-feather"></i>--}} 02
                </div>
              </div>
            </div><!-- End .feature-item -->

            <div class="feature-item text-end" data-aos="fade-right" data-aos-delay="400">
              <div class="d-flex align-items-center justify-content-end gap-4">
                <div class="feature-content">
                  <h3>Open the App</h3>
                  <p>After Successful Installation, Open the App, <strong>Note:</strong> The Information you enter will be confidential and we shall use during the time of helping you. </p>
                </div>
                <div class="feature-icon flex-shrink-0">
                  03
                </div>
              </div>
            </div><!-- End .feature-item -->

          </div>

          <div class="col-lg-4 text-center" data-aos="zoom-in" data-aos-delay="200">
              <div class="phone-mockup d-inline-block">
                <img src="{{ asset('asset/images/app.png')}}"
                    alt="App Preview"
                    class="img-fluid"
                    style="border-radius: 25px; height: 500px; width: auto; max-width: 100%;">
              </div>
            </div>

          <div class="col-lg-4">

            <div class="feature-item mb-5" data-aos="fade-left" data-aos-delay="200">
              <div class="d-flex align-items-center gap-4">
                <div class="feature-icon flex-shrink-0">
                  04
                </div>
                <div class="feature-content">
                  <h3>Create Account</h3>
                  <p>create account by filling the information then click create to submit your details.</p>
                </div>
              </div>
            </div><!-- End .feature-item -->

            <div class="feature-item mb-5" data-aos="fade-left" data-aos-delay="300">
              <div class="d-flex align-items-center gap-4">
                <div class="feature-icon flex-shrink-0">
                  05
                </div>
                <div class="feature-content">
                  <h3>Sending Complaint</h3>
                  <p>When You Login Successful,There are many options provided on how you want to send your complaint,Please select the one which favours you at the time of complaining.</p>
                </div>
              </div>
            </div><!-- End .feature-item -->

            <div class="feature-item" data-aos="fade-left" data-aos-delay="400">
              <div class="d-flex align-items-center gap-4">
                <div class="feature-icon flex-shrink-0">
                  06
                </div>
                <div class="feature-content">
                  <h3>Processing &amp; Responding to Your Complaint</h3>
                  <p>Our Team is ready to proceed with the process of handling your complaint and be in touch with you and other stakeholders to rescue the situation..</p>
                </div>
              </div>
            </div><!-- End .feature-item -->

          </div>
        </div>

      </div>

    </section><!-- /Features 2 Section -->


    <!-- Faq Section -->
    <section class="faq-9 faq section light-background" id="faq">

      <div class="container">
        <div class="row">

          <div class="col-lg-5" data-aos="fade-up">
            <h2 class="faq-title">Have a question? Check out the FAQ</h2>
            <p class="faq-description">This app allows individuals to report complaints or issues related to services, infrastructure, safety, or customer care. It helps connect people with the relevant authorities or service providers who can address those concerns.</p>
            <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
              <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z" fill="currentColor"></path>
              </svg>
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
            <div class="faq-container">
              <div class="faq-item faq-active">
                <h3>Who is supposed to use this App?</h3>
                <div class="faq-content">
                  <p>Every Ugandan who is in trouble, danger or anyone one who needs assistance whether you are in Uganda or abroad.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Who sees my complaint?</h3>
                <div class="faq-content">
                  <p>Only authorized personnel from the relevant department or organization will see your complaint. If marked public, others may view the summary without personal details.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>How do I submit a complaint?</h3>
                <div class="faq-content">
                  <p>Open the app if you have already downloaded it.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Is my data safe?</h3>
                <div class="faq-content">
                  <p>Yes, we use secure encryption and follow data protection best practices. Your personal details will not be shared without your consent.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Why do you want me to enter personal details ?</h3>
                <div class="faq-content">
                  <p>These details will be kept confidential and will only be used when you are in need of help.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>
          </div>

        </div>
      </div>
    </section><!-- /Faq Section -->


    <!-- Contact Section -->
    <section id="contact" class="contact section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Aims to bridge the gap between those in need and assistance providers, making complaint resolution faster and transparent</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4 g-lg-5">
          <div class="col-lg-5 position-relative"> <!-- Added position-relative -->
            <div class="info-box-with-bg" data-aos="fade-up" data-aos-delay="200">
              <div class="info-box-content"> <!-- New wrapper for content -->
                <h3>Contact Info</h3>
                <p>Download Tuliwamu for free <a href="#!">download app</a>. After downloading install it on your device.</p>

                <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                  <div class="icon-box">
                    <i class="bi bi-geo-alt"></i>
                  </div>
                  <div class="content">
                    <h4>Our Location</h4>
                    <p>A108 Adam Street</p>
                    <p>New York, NY 535022</p>
                  </div>
                </div>

                <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                  <div class="icon-box">
                    <i class="bi bi-telephone"></i>
                  </div>
                  <div class="content">
                    <h4>Phone Number</h4>
                    <p>+1 5589 55488 55</p>
                    <p>+1 6678 254445 41</p>
                  </div>
                </div>

                <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                  <div class="icon-box">
                    <i class="bi bi-envelope"></i>
                  </div>
                  <div class="content">
                    <h4>Email Address</h4>
                    <p>info@example.com</p>
                    <p>contact@example.com</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
              <h3>Get In Touch</h3>

              @livewire('front.contact-us')

            </div>
          </div>

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  @include('layouts.front.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('layouts.front.javascript')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const slides = document.querySelectorAll('.slide');
      let currentSlide = 0;

      function showSlide(index) {
        // Hide all slides
        slides.forEach(slide => slide.classList.remove('active'));

        // Show current slide
        slides[index].classList.add('active');
      }

      function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
      }

      // Initial display
      showSlide(0);

      // Change slide every 5 seconds (adjust timing as needed)
      setInterval(nextSlide, 2000);
    });
  </script>

</body>

</html>