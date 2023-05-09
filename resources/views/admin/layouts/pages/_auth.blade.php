<!doctype html>
<html lang="{{ app()->getLocale() }}">
  @include('admin.layouts._head')
  <body class="@yield('class')" id="body">
    @yield('content')
  </body>
</html>
