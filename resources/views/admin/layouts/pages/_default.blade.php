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
@include('admin.components._flash')

@include('admin.layouts._modal-develop')

{{-- ページフレーム --}}
  @if(Route::current()->getName() == 'admin.users.detail')
    <div class="l-frame white" id="js-target__gnavSwitch">
  @else
    <div class="l-frame" id="js-target__gnavSwitch">
  @endif
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

{{-- csvモーダル --}}
@include('admin.components.modal._modal-user-csv-import')
@include('admin.components.modal._modal-shop-csv-import')
@include('admin.components.modal._modal-brand-csv-import')
@include('admin.components.modal._modal-color-csv-import')
@include('admin.components.modal._modal-product-csv-import')
@include('admin.components.modal._modal-sales_product-csv-import')

{{-- ---------- スクリプト ---------- --}}
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
{{-- Select2 --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/i18n/ja.js"></script>
<script src="{{ asset('js/admin/select2.js') }}"></script>
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
