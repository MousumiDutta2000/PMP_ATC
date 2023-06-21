<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pages / Register - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: May 30 2023 with Bootstrap v5.3.0
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body class="bimg">

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="{{ asset('img/adamastech_logo.png') }}" alt="">
                                    <span class="d-none d-lg-block">NiceAdmin</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3 xtraSpace">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">{{ __('Create an Account') }}</h5>
                                        {{-- <p class="text-center small">{{ __('Enter your personal details to create an account') }}</p> --}}
                                    </div>

                                    <form class="row g-3" method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="col-12">
                                            <x-label for="name" value="{{ __('Name') }}" />
                                            <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your name" />
                                        </div>

                                        <div class="col-12">
                                            <x-label for="email" value="{{ __('Email Address') }}" />
                                            <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Enter your email address" />
                                        </div>

                                        <div class="col-12">
                                            <x-label for="password" value="{{ __('Password') }}" />
                                            <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="Enter your password" />
                                        </div>

                                        <div class="col-12">
                                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                            <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password" />
                                        </div>

                                        <div class="col-12">
                                          <div class="form-check">
                                            <input class="form-check-input sizeBox" name="terms" type="checkbox" value="" id="acceptTerms" required>
                                            <label class="form-check-label sizeFont" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                                            <div class="invalid-feedback">You must agree before submitting.</div>
                                          </div>
                                        </div>

                                        <div class="col-12 d-grid">
                                            <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                                        </div>

                                    </form>

                                </div>

                            </div>

                            <div class="text-center mt-2">
                                <span class="text-muted">{{ __('Already have an account?') }}</span>
                                <a href="{{ route('login') }}">{{ __('Log in') }}</a>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 <!-- Vendor JS Files -->
 <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
 <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('vendor/chart.js/chart.umd.js') }}"></script>
 <script src="{{ asset('vendor/echarts/echarts.min.js') }}"></script>
 <script src="{{ asset('vendor/quill/quill.min.js') }}"></script>
 <script src="{{ asset('vendor/simple-datatables/simple-datatables.js') }}"></script>
 <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
 <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
  
    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
  
  </body>
  
  </html>

