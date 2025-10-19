<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title') | Personal</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  @include('home.partials.link')
  @yield('styles')


</head>

<body class="index-page">

    @include('home.partials.nav')

  <main class="main">

    @yield('content')

  </main>

  @include('home.partials.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  @include('home.partials.script')

</body>

</html>
