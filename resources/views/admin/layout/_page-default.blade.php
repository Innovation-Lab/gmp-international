<!DOCTYPE html>
<html lang="ja" class="">
  @include('admin.layout._head')
  <body class="@yield('body-class')" id="body">
    @include('admin._svg')
    <div class="l-wrapper">
      <aside class="l-sidebar" id="sidebar">
        <div class="l-sidebar__inner">
          @include('admin.layout._header')
          @include('admin.layout._sidebar')
          <div class="dev-route">
            <div class="u-align--vl u-gap--4">
              <a href="{{route('web.index')}}" class="c-btn--goast">
                ユーザー画面
              </a>
              <a href="{{route('admin.styleguide')}}" class="c-btn">スタイルガイド</a>
            </div>
          </div>
          <style>
            .dev-route {
              position: fixed;
              left: 1rem;
              bottom: 1rem;
            }
          </style>
        </div>
      </aside>
      <main class="@yield('main-class') l-main" id="main">
        @yield('content')
      </main>
    </div>
    @include('admin.layout._script')
  </body>
</html>

