<!DOCTYPE html>
<html lang="en">

<head>
 @include('layouts.front.css')
</head>

<body class="index-page">

  <main class="main">

    <!-- Contact Section -->
    <section  class="contact section">

      <!-- Contact Form Section (Overlapping) -->
      <div class="container form-container-overla">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="contact-form-wrapper">
              <h2 class="text-center mb-4">Enter Your Credentials</h2>

              <form method="POST" action="{{ route('login') }}" class="php-email-for">
                 @csrf
                <div class="row g-3">
                <div class="col-md-12">
                    <div class="form-group">
                      <div class="input-with-icon">
                        <i class="bi bi-envelope"></i> &nbsp;Email
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email" required autocomplete="email" autofocus>
                      </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="input-with-icon">
                        <i class="bi bi-lock"></i> &nbsp;Password
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password" required autocomplete="current-password">
                      </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>


                  <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary btn-submit">Login</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <!-- Preloader -->
  <div id="preloader"></div>

  @include('layouts.front.javascript')

</body>

</html>











