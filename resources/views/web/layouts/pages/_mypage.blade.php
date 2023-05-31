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

      <style>
        .modal__overlay{
          max-height: calc(var(--vh, 1vh) * 100);
        }
      </style>
      <script>
        $(window).on('load scroll',function(){
          // 最初に、ビューポートの高さを取得し、0.01を掛けて1%の値を算出して、vh単位の値を取得
          let vh = window.innerHeight * 0.01;
          // カスタム変数--vhの値をドキュメントのルートに設定
          document.documentElement.style.setProperty('--vh', `${vh}px`);
        });
      </script>
    {{-- ボタン --}}
    <script>
      // ボタンクリック時の伝播を止める
      $('[class*="c-button"]').click(function(e) {
        e.stopPropagation();
      })
    </script>

    {{--<script>
      // 'initial'クラスが付いている要素を全て取得
      const select = $(".initial");
      // is-emptyクラスを付与
      select.addClass("is-empty");

      // selectのoptionを切り替え時
      select.on("change", function () {
        // option選択時
        if ($(this).val() !== "") {
          // is-emptyクラスを削除
          $(this).removeClass("is-empty");
        } 
        // placeholder選択時
        else {
          // is-emptyクラスを付与
          $(this).addClass("is-empty");
        }
      });

      $('select.initial').each(function(){
        if ($(this).val() !== "") {
          $(this).removeClass("is-empty");
        } 
        else {
          $(this).addClass("is-empty");
        }
      });
    </script>--}}
    {{--
    <!-- Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>
    <script src="{{ asset('js/admin/flatPickr.js') }}"></script>
    --}}
    {{-- 日付選択 --}}
  </body>
</html>
