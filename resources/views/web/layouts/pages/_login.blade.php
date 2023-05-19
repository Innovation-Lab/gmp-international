<!doctype html>
<html lang="{{ app()->getLocale() }}">
  {{-- ヘッド --}}
  @include('web.layouts._head')
  <body class="@yield('class')" id="body">
    {{-- ローディング --}}
    {{-- フラッシュメッセージ --}}
    @include('components.project._p-flashMessage')
    {{-- ページフレーム --}}
    <div class="l-frame" id="js-target__gnavSwitch">
      <div class="l-frame__background"></div>
      @include('web.layouts._header--login')
      <main class="l-frame__main">
        @yield('content')
      </main>
      @include('web.layouts._footer--login')
    </div>

    {{-- ---------- モーダル ---------- --}}
    <!-- アカウント関連 -->

    <!-- その他 -->

    {{-- ---------- スクリプト ---------- --}}
    {{-- jQuery読み込み --}}
    <script src="{{ asset('js/admin/library/jquery-3.5.1.min.js') }}"></script>
    {{-- モーダル --}}
    <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
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
</html>
