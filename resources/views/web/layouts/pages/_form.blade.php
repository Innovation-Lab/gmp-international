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
      @include('web.layouts._header--form')
      <main class="l-frame__main">
        @yield('content')
      </main>
      @include('web.layouts._footer--form')
    </div>

    {{-- ---------- スクリプト ---------- --}}
    <script>
      MicroModal.init({
        disableScroll: false,
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
        $('select.initial').each(function(){
          if ($(this).val() !== "") {
            $(this).removeClass("is-empty");
          } 
          else {
            $(this).addClass("is-empty");
          }
        });
      });

      $('select.initial').each(function(){
        if ($(this).val() !== "") {
          $(this).removeClass("is-empty");
        } 
        else {
          $(this).addClass("is-empty");
        }
      });

      $(document).on('click', '.js-add-more-product', function(){
        $('select.initial').each(function(){
          if ($(this).val() !== "") {
            $(this).removeClass("is-empty");
          } 
          else {
            $(this).addClass("is-empty");
          }
        });
      });
    </script>--}}
    <!-- <script>
      function changeColor(hoge){
        if( hoge.value == 0 ){
          hoge.style.color = '';
        }else{
          hoge.style.color = '#000';
        }
      }
    </script> -->



    {{--
    <!-- Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>
    <script src="{{ asset('js/admin/flatPickr.js') }}"></script>
    --}}
  </body>
</html>
