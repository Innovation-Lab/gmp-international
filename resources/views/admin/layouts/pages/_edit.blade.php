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

    {{-- 開発用チートシート --}}
    <div class="develop" data-micromodal-trigger="modal-develop">
      <img src="{{asset('img/admin/develop/icon.svg')}}" width="24px" height="24px">
    </div>

    @include('admin.layouts._modal-develop')
    

    {{-- ページフレーム --}}
    <div class="l-frame edit" id="js-target__gnavSwitch">
      <main class="l-frame__main">
        @yield('content')
      </main>
    </div>

    {{-- ---------- モーダル ---------- --}}
    <!-- その他 -->
    {{-- ヒントモーダル --}}
    @include('admin.components.modal._modal-hint')
    {{-- アラートモーダル --}}
    @include('admin.components.modal._modal-alert')

    {{-- ---------- スクリプト ---------- --}}
    {{-- jQuery読み込み --}}
    <script src="{{ asset('js/admin/library/jquery-3.5.1.min.js') }}"></script>

    {{-- ローディング --}}
    <script src="{{ asset('js/admin/loading.js') }}"></script>

    {{-- モーダル --}}
    <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
    <script src="{{ asset('js/admin/micromodal-trigger.js') }}"></script>

    {{-- ストップ --}}
    <script src="{{ asset('js/admin/stop.js') }}"></script>

    {{-- スムーズスクロール --}}
    <script src="{{ asset('js/admin/smooth-scroll.js') }}"></script>

    {{--
    <!-- Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>
    <script src="{{ asset('js/admin/flatPickr.js') }}"></script>
    --}}
</html>
