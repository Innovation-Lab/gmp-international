<!DOCTYPE html>
<html lang="ja" class="">
  @include('admin.layout._head')
  <body class="@yield('body-class')" id="body">
    @include('admin._svg')
    <div class="l-wrapper">
      <main class="@yield('main-class') l-main" id="main">
        @yield('content')
      </main>
    </div>
    @include('admin.layout._footer')
    @include('admin.layout._script')
  </body>
</html>
