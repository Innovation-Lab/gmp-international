<!DOCTYPE html>
<html lang="ja">
  @include('web.layout._head')
  <body class="@yield('body-class')" id="body">
    @include('web._svg')
    <div class="l-wrapper">
      @include('web.layout._header')
      <main class="@yield('main-class') l-main" id="main">
        @yield('content')
      </main>
      @include('web.layout._footer')
    </div>
  </body>
</html>