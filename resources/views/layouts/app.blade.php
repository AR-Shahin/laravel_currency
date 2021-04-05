<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendor/animate-css/vivify.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/mooli.min.css">
    @stack('css')
</head>
<body data-theme="light">

<div id="body" class="theme-orange">
    @if(session('message'))
           <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
              {{ session('message') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           @endif

  @yield('app_content')
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Javascript -->
    <script src="{{ 'backend' }}/assets/bundles/libscripts.bundle.js"></script>
    <script src="{{ 'backend' }}/assets/bundles/vendorscripts.bundle.js"></script>

    <!-- Vedor js file and create bundle with grunt  -->
    <script src="{{ 'backend' }}/assets/bundles/apexcharts.bundle.js"></script>

    <!-- Project core js file minify with grunt -->
    <script src="{{ 'backend' }}/assets/bundles/mainscripts.bundle.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('backend/custom.js') }}"></script>
    @stack('script')
</body>
</html>
