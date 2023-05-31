<!doctype html>
<html lang="{{ app()->getLocale() }}">
{{-- ヘッド --}}
@include('admin.layouts._head')
<body class="@yield('class')" id="body">
{{-- ローディング --}}
<div class="c-loading" id="js-target__loading">
  <img src="{{asset('img/admin/loading/icon.gif')}}" width="72px" height="72px">
  <p style="font-size:1rem;" font-weight: 700;>Now Loading</p>
</div>
{{-- フラッシュメッセージ --}}
{{--
@component('admin.components._flash',[
  "flash" => [
    [
      "type" => "info",  // info,success,alert
      "title" => "tttttt",
      "description" => "zzzzz",
      "auto-hide" => false,
    ],
    [
      "type" => "success",  // info,success,alert
      "title" => "正しく保存されました",
      "auto-hide" => true,
    ],
    [
      "type" => "alert",  // info,success,alert
      "title" => "titletitle",
      "description" => "説明文説明文説明文説明文",
      "auto-hide" => false,
    ]
  ]
])
@endcomponent
--}}

{{-- 開発用チートシート --}}
<div class="develop" data-micromodal-trigger="modal-develop">
  <img src="{{asset('img/admin/develop/icon.svg')}}" width="24px" height="24px">
</div>
@include('admin.layouts._modal-develop')

{{-- ページフレーム --}}
<div class="l-frame" id="js-target__gnavSwitch">
  <aside class="l-frame__sidebar">
    @include('admin.components._sidebar')
  </aside>
  <main class="l-frame__main">
    @yield('content')
  </main>
</div>

{{-- ---------- アイコン ---------- --}}
@include('admin.components._svg')

{{-- ---------- モーダル ---------- --}}
<!-- アカウント関連 -->
{{-- アカウント編集モーダル --}}
@include('admin.staffs._modal-account-edit')
{{-- アカウントメニューモーダル --}}
@include('admin.staffs._modal-account-menu')
{{-- ログアウトモーダル --}}
@include('admin.staffs._modal-account-logout')

<!-- その他 -->
{{-- ヒントモーダル --}}
@include('admin.components.modal._modal-hint')
{{-- アラートモーダル --}}
@include('admin.components.modal._modal-alert')

{{-- ---------- スクリプト ---------- --}}
{{-- jQuery読み込み --}}
<script src="{{ asset('js/admin/library/jquery-3.5.1.min.js') }}"></script>
{{-- ナビゲーション表示/非表示 --}}
<script src="{{ asset('js/admin/gnavHide.js') }}"></script>
{{-- ローディング --}}
<script src="{{ asset('js/admin/loading.js') }}"></script>
{{-- フラッシュメッセージ --}}
<script src="{{ asset('js/admin/flash-message.js') }}"></script>
{{-- テーブルリンク --}}
<script src="{{ asset('js/admin/dataHref.js') }}"></script>
{{-- フィルター --}}
<script src="{{ asset('js/admin/filter.js') }}"></script>
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
    $('[class*="c-button"]').click(function (e) {
        e.stopPropagation();
    })
</script>
{{--
<!-- Flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>
<script src="{{ asset('js/admin/flatPickr.js') }}"></script>
--}}
<script>
  $('#color_code').on("keydown keyup keypress change click",function(){   
     let Val = $(this).val(),
         Tag = $('#color_palet');
    Tag.val(Val);
  });
</script>
</html>
