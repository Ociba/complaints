<!DOCTYPE html>
<html lang="en">

<head>
 @include('layouts.front.css')
</head>

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
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#testimony">Testimonials</a></li>
          <li><a href="#steps">How We Work</a></li>
          <li><a href="#faq">FAQ</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="/mobile-app-instructions">Get Started</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 content-col" data-aos="fade-up">
            <div class="content">

              <div class="main-heading">
                <h1>IN DISTRESS <br>WE RESPOND</h1>
              </div>

              <div class="divider"></div>

              <div class="description">
                <p>Tuliwamu is a dedicated emergency response app designed to assist distressed Ugandans in the diaspora by providing immediate help and ensuring their safe return home. Whether you're facing an emergency, need urgent assistance, or want to report a complaint, Tuliwamu connects you with the right support quickly and efficiently.</p>
              </div>

              <div class="cta-button">
                <a href="/about_us" class="btn">
                  <span>View More</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-5" data-aos="zoom-out">
            <div class="visual-content">
              <div class="fluid-shape">
                <img src="{{ asset('asset/front/assets/img/abstract/banner.png')}}" style="height:500px;" alt="Abstract Fluid Shape" class="fluid-img">
                
              </div>
              <div class="stats-card">
                <div class="stats-number">
                  <h4>Tuliwamu</h4>
                </div>
                <div class="stats-label">
                  <p>Download App Now</p>
                </div>
                <div class="stats-arrow">
                  <a href="#portfolio"><i class="bi bi-download"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <div><span>Learn More</span> <span class="description-title">About Us</span></div>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gx-5 align-items-center">
          {{--<div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <div class="about-image position-relative">
              <img src="{{ asset('asset/front/assets/img/about/about-portrait-1.webp')}}" class="img-fluid rounded-4 shadow-sm" alt="About Image" loading="lazy">
              <div class="experience-badge">
                <span class="years">20+</span>
                <span class="text">Years of Expertise</span>
              </div>
            </div>
          </div>--}}

          <div class="col-lg-12 mt-4 mt-lg-0" data-aos="fade-left" data-aos-delay="300">
            <div class="about-content">
              <p class="lead">Tuliwamu is your reliable partner in distress—ensuring you’re never alone, no matter where you are. Download now and stay protected!.</p>
              <p>Diaspora Support – Specialized assistance for Ugandans abroad, including repatriation help when needed.</p>

              <div class="row g-4 mt-3">
                <div class="col-md-3" data-aos="zoom-in" data-aos-delay="400">
                  <div class="feature-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <h5>SOS Button</h5>
                    <p>Instantly alert emergency contacts and response teams with your location in critical situations.</p>
                  </div>
                </div>
                <div class="col-md-3" data-aos="zoom-in" data-aos-delay="450">
                  <div class="feature-item">
                    <i class="bi bi-lightbulb-fill"></i>
                    <h5>Complaints Portal</h5>
                    <p>Report incidents via audio, video, or text to ensure your concerns are documented and addressed.</p>
                  </div>
                </div>
                <div class="col-md-3" data-aos="zoom-in" data-aos-delay="450">
                  <div class="feature-item">
                    <i class="bi bi-globe"></i>
                    <h5>Quick Response System</h5>
                    <p>Connects you with trusted support networks for timely assistance.</p>
                  </div>
                </div>
                <div class="col-md-3" data-aos="zoom-in" data-aos-delay="450">
                  <div class="feature-item">
                    <i class="bi bi-geo-alt"></i>
                    <h5>Location Tracking</h5>
                    <p>Helps responders locate and reach you faster in emergencies.</p>
                  </div>
                </div>
              </div>
              <p class="mt-3">Tuliwamu is your reliable partner in distress—ensuring you’re never alone, no matter where you are. Download now and stay protected!</p>
              <p>In Distress, We Respond.</p>
              <a href="/about_us" class="btn btn-primary mt-4">View More</a>
            </div>
          </div>
        </div></div></section>
        
        <section id="testimony" class="about section">
        <div class="container">
        <div  class="testimonial-section mt-5 pt-5" data-aos="fade-up" data-aos-delay="100">
          <div class="row">
            <div class="col-lg-4" data-aos="fade-right" data-aos-delay="200">
              <div class="testimonial-intro">
                <h3>Rescued Individuals</h3>
                <p>Hear directly from those who have experienced the impact of our partnership and achieved their strategic goals.</p>
                <p>Hear directly from those who have experienced the impact.</p>
                <div class="swiper-nav-buttons mt-4">
                  <button class="slider-prev"><i class="bi bi-arrow-left"></i></button>
                  <button class="slider-next"><i class="bi bi-arrow-right"></i></button>
                </div>
              </div>
            </div>

            <div class="col-lg-8" data-aos="fade-left" data-aos-delay="300">
              <div class="testimonial-slider swiper init-swiper">
                <script type="application/json" class="swiper-config">
                  {
                    "loop": true,
                    "speed": 800,
                    "autoplay": {
                      "delay": 5000
                    },
                    "slidesPerView": 1,
                    "spaceBetween": 30,
                    "navigation": {
                      "nextEl": ".slider-next",
                      "prevEl": ".slider-prev"
                    },
                    "breakpoints": {
                      "768": {
                        "slidesPerView": 2
                      }
                    }
                  }
                </script>
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      <p>"Their strategic vision and unwavering commitment to results provided exceptional value. Our operational efficiency has signficantly improved."</p>
                      <div class="client-info d-flex align-items-center mt-4">
                        <img src="{{ asset('asset/front/assets/img/person/person-f-1.webp')}}" class="client-img" alt="Client" loading="lazy">
                        <div>
                          <h6 class="mb-0">Eleanor Vance</h6>
                          <span>Operations Manager</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      
                      <p>"Collaborating with their team was a revelation. Their innovative strategies guided us toward achieving our objectives with precision and speed."</p>
                      <div class="client-info d-flex align-items-center mt-4">
                        <img src="{{ asset('asset/front/assets/img/person/person-m-1.webp')}}" class="client-img" alt="Client" loading="lazy">
                        <div>
                          <h6 class="mb-0">David Kim</h6>
                          <span>Product Lead</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      
                      <p>"The depth of knowledge and unwavering dedication they bring to every project is exceptional. They've become an essential ally in driving our expansion."</p>
                      <div class="client-info d-flex align-items-center mt-4">
                        <img src="{{ asset('asset/front/assets/img/person/person-f-2.webp')}}" class="client-img" alt="Client" loading="lazy">
                        <div>
                          <h6 class="mb-0">Isabella Diaz</h6>
                          <span>Research Analyst</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      
                      <p>"Their dedication to delivering superior solutions and their meticulous attention to detail have profoundly impacted our corporate growth trajectory."</p>
                      <div class="client-info d-flex align-items-center mt-4">
                        <img src="{{ asset('asset/front/assets/img/person/person-f-3.webp')}}" class="client-img" alt="Client" loading="lazy">
                        <div>
                          <h6 class="mb-0">Olivia Chen</h6>
                          <span>Development Strategist</span>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->


    <!-- Steps Section -->
    <section id="steps" class="steps section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Steps</h2>
        <div><span>How we</span> <span class="description-title">Work</span></div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="steps-wrapper">

          <div class="step-item" data-aos="fade-right" data-aos-delay="200">
            <div class="step-content">
              <div class="step-icon">
                <i class="bi bi-lightbulb"></i>
              </div>
              <div class="step-info">
                <span class="step-number">Step 01</span>
                <h3>Initial Consultation</h3>
                <p>Conducting thorough discovery sessions to understand your business requirements and objectives. Our expert team analyzes your needs to create a customized approach.</p>
              </div>
            </div>
          </div><!-- End Step Item -->

          <div class="step-item" data-aos="fade-left" data-aos-delay="300">
            <div class="step-content">
              <div class="step-icon">
                <i class="bi bi-gear"></i>
              </div>
              <div class="step-info">
                <span class="step-number">Step 02</span>
                <h3>Planning &amp; Tuliwamu</h3>
                <p>Developing comprehensive strategies and detailed project plans based on the initial consultation. We create actionable roadmaps with clear milestones and deliverables.</p>
              </div>
            </div>
          </div><!-- End Step Item -->

          <div class="step-item" data-aos="fade-right" data-aos-delay="400">
            <div class="step-content">
              <div class="step-icon">
                <i class="bi bi-bar-chart"></i>
              </div>
              <div class="step-info">
                <span class="step-number">Step 03</span>
                <h3>Development Phase</h3>
                <p>Executing the planned strategies with precision and agility. Our team implements solutions while maintaining constant communication and progress updates.</p>
              </div>
            </div>
          </div><!-- End Step Item -->

          <div class="step-item" data-aos="fade-left" data-aos-delay="500">
            <div class="step-content">
              <div class="step-icon">
                <i class="bi bi-check2-circle"></i>
              </div>
              <div class="step-info">
                <span class="step-number">Step 04</span>
                <h3>Launch &amp; Support</h3>
                <p>Ensuring smooth deployment and providing ongoing support for implemented solutions. We monitor performance and make necessary adjustments for optimal results.</p>
              </div>
            </div>
          </div><!-- End Step Item -->

        </div>

      </div>

    </section><!-- /Steps Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="advertise-1 d-flex flex-column flex-lg-row gap-4 align-items-center position-relative">

          <div class="content-left flex-grow-1" data-aos="fade-right" data-aos-delay="200">
            <span class="badge text-uppercase mb-2">Don't Miss!</span>
            <h2>Your Path To Safety Today</h2>
            <p class="my-4">Strategia accelerates your business growth through innovative solutions and cutting-edge technology. Join thousands of satisfied customers who have transformed their operations.</p>

            <div class="features d-flex flex-wrap gap-3 mb-4">
              <div class="feature-item">
                <i class="bi bi-check-circle-fill"></i>
                <span>Premium Support</span>
              </div>
              <div class="feature-item">
                <i class="bi bi-check-circle-fill"></i>
                <span>Cloud Integration</span>
              </div>
              <div class="feature-item">
                <i class="bi bi-check-circle-fill"></i>
                <span>Real-time Analytics</span>
              </div>
            </div>

            <div class="cta-buttons d-flex flex-wrap gap-3">
              <a href="/mobile-app-instructions" class="btn btn-primary">Get Started</a>
              <a href="#" class="btn btn-outline">Learn More</a>
            </div>
          </div>

          <div class="content-right position-relative" data-aos="fade-left" data-aos-delay="300">
            <img src="{{ asset('asset/front/assets/img/abstract/banner.png')}}"  style="height:450px;" alt="Digital Platform" class="img-fluid rounded-4">
            <div class="floating-card">
              <div class="card-icon">
                <i class="bi bi-download"></i>
              </div>
              <div class="card-content">
                <span class="stats-number">Tuliwamu</span>
                <span class="stats-text">Download App Now</span>
              </div>
            </div>
          </div>

          <div class="decoration">
            <div class="circle-1"></div>
            <div class="circle-2"></div>
          </div>

        </div>

      </div>

    </section><!-- /Call To Action Section -->

   
    <!-- Faq Section -->
    <section class="faq-9 faq section" id="faq">

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
                <h3>How do I submit a complaint?</h3>
                <div class="faq-content">
                  <p>Open the app if you have already downloaded it.</p>
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
                <h3>Is my data safe?</h3>
                <div class="faq-content">
                  <p>Yes, we use secure encryption and follow data protection best practices. Your personal details will not be shared without your consent.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
                <div class="faq-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>
                <div class="faq-content">
                  <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                <div class="faq-content">
                  <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed in suscipit sequi. Distinctio ipsam dolore et.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>
          </div>

        </div>
      </div>
    </section><!-- /Faq Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <div><span>Let's</span> <span class="description-title">Connect</span></div>
      </div><!-- End Section Title -->

      @livewire('front.contact-us')

    </section><!-- /Contact Section -->

  </main>

  @include('layouts.front.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  @include('layouts.front.javascript')

</body>

</html>





