<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.2.0
* @link https://coreui.io
* Copyright (c) 2020 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="{{ app()->getLocale() }}">

<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="{{ config('site.description') }}">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="{{ config('site.author') }}">
  <meta name="keyword" content="{{ config('site.keyword') }}">
  <title> @yield('title') - {{ config('app.name') }}</title>
  <link rel="apple-touch-icon" sizes="432x512" href="{{ asset('assets/img/logo/logo.png') }}">
  <link rel="icon" type="image/png" sizes="432x512" href="{{ asset('assets/img/logo/logo.png') }}">
  <link rel="manifest" href="{{ asset('assets/manifest/manifest.json') }}">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{ asset('assets/img/logo/logo.png') }}">
  <meta name="theme-color" content="#ffffff">
  <!-- Main styles for this application-->
  <link href="{{ asset('assets/coreui/css/coreui.min.css') }}" rel="stylesheet">
  <!-- font awesome basic kit -->
  <script src="https://kit.fontawesome.com/91c858ef37.js" crossorigin="anonymous"></script>
  <!-- sweetalert2 -->
  <link rel="stylesheet" href="{{ asset('assets/lib/sweetalert2/sweetalert2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/lib/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/custom/css/custom.css') }}">
  @stack('css')
</head>

<body class="c-app">
  @include('layouts.backend.partials.sidebar')
  <div class="c-wrapper c-fixed-components" id="app">
    @include('layouts.backend.partials.header')
    <div class="c-body">
      <main class="c-main">
        <!-- Content -->
        @yield('content')
      </main>
      <!-- footer -->
      @include('layouts.backend.partials.footer')
    </div>
  </div>
  <!-- CoreUI and necessary plugins-->
  <!-- CoreUI -->
  <script src="{{ asset('assets/coreui/js/coreui.bundle.min.js') }}"></script>
  {{--
  <!-- Vue -->
  <script src="{{ !config('vue.isProduction') ? asset('assets/lib/vue/vue.js') : asset('assets/lib/vue/vue.min.js') }}"></script>
  <!-- Axios -->
  <script src="{{ asset('assets/lib/axios/axios.min.js') }}"></script>
  --}}
  <!-- Jquery -->
  <script src="{{ asset('assets/lib/jquery/jquery-3.5.1.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('assets/lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <!-- Plugins and scripts required by this view-->
  <!-- SweetAlert -->
  <script src="{{ asset('assets/lib/sweetalert2/sweetalert2.min.js') }}"></script>
  <!-- SweetAlert Config -->
  <script src="{{ asset('assets/custom/js/sweetalert.js') }}"></script>
  <!-- csrf config -->
  <script src="{{ asset('assets/custom/js/csrf.js') }}"></script>
  <!-- toastr -->
  <script src="{{ asset('assets/lib/toastr/toastr.min.js') }}"></script>

  @include('layouts.backend.partials.flash')
  @stack('scripts')
</body>

</html>