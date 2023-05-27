<!doctype html>
<html lang="{{ app()->getLocale() }}">
  {{-- ヘッド --}}
  @include('web.layouts._head')
  <body class="@yield('class')" id="body">
    {{-- ローディング --}}
    {{-- フラッシュメッセージ --}}
    @include('components.project._p-flashMessage')
    {{-- ページフレーム --}}
    <div class="l-frame l-frame--mypage" id="js-target__gnavSwitch">
      @include('web.layouts._header--mypage')
      <aside class="l-frame__sidebar">
        @include('web.components._sidebar')
      </aside>
      <main class="l-frame__main">
        @yield('content')
      </main>
      @include('web.layouts._footer--mypage')
    </div>

    {{-- ---------- スクリプト ---------- --}}
    <script>
      MicroModal.init({
        disableScroll: true,
        awaitOpenAnimation: true,
        // awaitCloseAnimation: true
      });
    </script>
    {{-- ボタン --}}
    <script>
      // ボタンクリック時の伝播を止める
      $('[class*="c-button"]').click(function(e) {
        e.stopPropagation();
      })
    </script>
    {{--
    <!-- Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>
    <script src="{{ asset('js/admin/flatPickr.js') }}"></script>
    --}}
    {{-- 日付選択 --}}
  </body>
</html>
