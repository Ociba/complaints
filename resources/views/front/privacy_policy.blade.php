<!DOCTYPE html>
<html lang="en">

@include('layouts.front.css')

<body class="service-details-page">

  @include('layouts.front.menu')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <h1>Privacy Policy</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="/">Home</a></li>
            <li class="current">Mobile App Privacy Policy</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

      <div class="container">

        <div class="row gy-5">

         <div class="col-lg-1"></div>

          <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

            <div class="service-box">
              <h4>Tuliwamu Privacy Policy</h4>
              <div class="services-list">
                <p class="active"><i class="bi bi-arrow-right-circle"></i><span> Welcome to Tulwamu ("we," "our," or "us"). We respect your privacy and are committed to protecting your personal information. This Privacy Policy explains how we collect, use, disclose, and safeguard your data when you use our complaints application.</span></p>
                <p class="lead">By using our app, you consent to the practices described in this policy. If you do not agree, please do not use the application.</p>
                <p><i class="bi bi-megaphone me-3"></i><span style="font-size:18px; font-weight:bold;">Information We Collect</span></p>
                <p>We may collect the following types of information:</p>
                <ul>
                  <li class="mt-0">
                  <li><i class="bi bi-check-circle"></i> Personal Information</li>
                  <p>- Name, Email address , Phone number, Location data (GPS or approximate location), Gender,Company used through travel (optional), Next of kin names,Next of kin contact, Your password (any you wish to use but should be stronger)</p>
                  <li class="mt-0">
                  <li><i class="bi bi-check-circle"></i> Media and Files</li>
                  <p>Photos, Videos, Audio recordings, Documents uploaded by users</p>
                  <li class="mt-0">
                  <li><i class="bi bi-check-circle"></i> Device Information</li>
                  <p>Device type (mobile, tablet, etc.) , Operating system, IP address, Browser type </p>
                </ul>
                <p><i class="bi bi-search me-3"></i><span style="font-size:18px; font-weight:bold;">How We Use Your Information</span></p>
                <p>We use the collected data for the following purposes:</p>
                <p> - To process and respond to complaints.</p>
                <p> - To improve our services and user experience</p>
                <p>- To provide customer support.</p>
                <p>- To comply with legal obligations.</p>
                <p>- To analyze app usage for troubleshooting and enhancements.</p>
                <p><i class="bi bi-newspaper me-3"></i><span style="font-size:18px; font-weight:bold;">Permissions Required</span></p>
                <p>Our app requests the following permissions:</p>
                <p>- Location: To identify the user’s location for complaint submission.</p>
                <p>- Camera & Photos/Videos: To allow users to upload media related to complaints.</p>
                <p>- Microphone (Audio): To record and upload audio complaints if needed.</p>
                <p>- Storage: To access and store files related to complaints.</p>
                <p><i class="bi bi-envelope-paper me-3"></i><span style="font-size:18px; font-weight:bold;">Data Sharing & Disclosure</span></p>
                <p>We do not sell your personal information. However, we may share data with: </p>
                <p>- Authorities/Legal Bodies: If required by law or to resolve complaints.</p>
                <p>- Third-Party Service Providers: For analytics, hosting, or customer support (with strict confidentiality agreements).</p>
                <p>- Business Transfers: In case of a merger or acquisition, user data may be transferred. </p>

                <p><i class="bi bi-graph-up-arrow me-3"></i><span style="font-size:18px; font-weight:bold;">Data Security</span></p>
                <p>We implement security measures such as encryption and access controls to protect your data. However, no system is 100% secure, so we cannot guarantee absolute security. </p>

                <p><i class="bi bi-check-circle me-3"></i><span style="font-size:18px; font-weight:bold;">User Rights</span></p>
                <p>Depending on your location, you may have the right to: </p>
                <p>Depending on your location, you may have the right to: </p>
                <p>- Access, correct, or delete your data. </p>
                <p>- Opt out of data collection (where applicable).</p>
                <p>- Withdraw consent for processing.</p>
                <p>To exercise these rights, contact us at <a href="mailto:julisema4@gmail.com">julisema4@gmail.com</a> </p>

                <p><i class="bi bi-person me-3"></i><span style="font-size:18px; font-weight:bold;">Children’s Privacy</span></p>
                <p>Our app is not intended for users under [13/16] years old. We do not knowingly collect data from children. If we become aware of such data, we will delete it. </p>

                <p><i class="bi bi-lock me-3"></i><span style="font-size:18px; font-weight:bold;">Changes to This Policy</span></p>
                <p>We may update this Privacy Policy. Users will be notified of significant changes via email or in-app alerts. </p>

                <p><i class="bi bi-phone me-3"></i><span style="font-size:18px; font-weight:bold;">Contact Us</span></p>
                <p>For privacy-related questions, contact.. </p>
              </div>
            </div><!-- End Services List -->
          </div>

          <div class="col-lg-1"></div>

        </div>

      </div>

    </section><!-- /Service Details Section -->

  </main>

  @include('layouts.front.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  @include('layouts.front.javascript')

</body>

</html>