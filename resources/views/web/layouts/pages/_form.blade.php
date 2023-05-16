<!doctype html>
<html lang="{{ app()->getLocale() }}">
  {{-- ヘッド --}}
  @include('web.layouts._head')
  <body class="@yield('class')" id="body">
    {{-- ローディング --}}
    {{-- フラッシュメッセージ --}}
    {{-- ページフレーム --}}
    <div class="l-frame" id="js-target__gnavSwitch">
      @include('web.layouts._header--form')
      <main class="l-frame__main">
        @yield('content')
      </main>
      @include('web.layouts._footer--form')
    </div>

    {{-- ---------- モーダル ---------- --}}
    <!-- アカウント関連 -->

    <!-- その他 -->

    {{-- ---------- スクリプト ---------- --}}
    {{-- jQuery読み込み --}}
    <script src="{{ asset('js/admin/library/jquery-3.5.1.min.js') }}"></script>
    <script src="//code.jquery.com/jquery-2.1.0.min.js" type="text/javascript"></script>
    <script src="//jpostal-1006.appspot.com/jquery.jpostal.js" type="text/javascript"></script>
    {{-- モーダル --}}
    <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
    <script>
      MicroModal.init({
        disableScroll: true,
        awaitOpenAnimation: true,
        // awaitCloseAnimation: true
      });
    </script>
    {{-- 住所検索 --}}
    <script type="text/javascript">
      $(window).ready( function() {
        $('#postcode').jpostal({
          postcode : [
            '#postcode'
          ],
          address : {
            '#address1'  : '%3',
            '#address2'  : '%4%5',
          }
        });
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
