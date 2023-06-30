@extends('layouts.side_nav')

@section('pageTitle', 'Register')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Register</li>
@endsection

@section('content')
<main>
    <div class="container">

        <section class="section register d-flex flex-column align-items-center justify-content-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">
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
@endsection

@push('styles')
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
    <link href="{{ asset('css/login-register-style.css') }}" rel="stylesheet">
@endpush

@push('scripts')
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
@endpush
