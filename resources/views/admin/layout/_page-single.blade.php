<!DOCTYPE html>
<html lang="ja" class="">
  @include('admin.layout._head')
  <body class="@yield('class')" id="body">
    @include('admin._svg')
    <div class="l-wrapper">
      <main class="l-main">
        @yield('content')
      </main>
    </div>
    @include('admin.layout._script')
  </body>
</html>
