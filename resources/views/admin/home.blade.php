@extends('admin.layouts.pages._default')
@section('title', 'ダッシュボード')
@section('class', 'body_dashboard')
@section('content')
<div class="p-index">
  <div class="l-index">
    <div class="l-index__head">
      <div class="p-index__head" style="margin: 0 0 1.5rem;">
        <div class="wrapper">
          <div class="container">
            <div class="p-index__head__inner">
              <h2 class="p-index__head__title">
                ダッシュボード
              </h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="l-index__body">
      <div class="wrapper">
        <div class="container">
          <div class="inner">
          {{-- ---------- ダッシュボード ---------- --}}
          <div class="p-dashboard">
            {{-- -------------------- 行 1 -------------------- --}}
            @component('admin.dashboard._row')
              {{-- 列 --}}
              @component('admin.dashboard._col',['span' => '7'])
                {{-- 行 --}}
                @component('admin.dashboard._row')
                  {{-- 列 --}}
                  @component('admin.dashboard._col',[
                    'span' => '6',
                  ])
                    {{-- ユーザー数 --}}
                    @include('admin.dashboard.item._count_user')
                  @endcomponent
                  @component('admin.dashboard._col',[
                    'span' => '6',
                  ])
                    {{-- 製品登録数 --}}
                    @include('admin.dashboard.item._count_item')
                  @endcomponent
                @endcomponent
                @component('admin.dashboard._row')
                  {{-- 列 --}}
                  @component('admin.dashboard._col',['span' => '12'])
                    {{-- ユーザー数推移チャート --}}
                    @include('admin.dashboard.item._chart_user')
                  @endcomponent
                @endcomponent
              @endcomponent
              @component('admin.dashboard._col',['span' => '5'])
                {{-- 製品登録数 --}}
                @include('admin.dashboard.item._ranking_product')
              @endcomponent
            @endcomponent
            {{-- -------------------- 行 2 -------------------- --}}
            @component('admin.dashboard._row')
              {{-- 列 --}}
              @component('admin.dashboard._col',['span' => '12'])
                <div class="c-buttonWrap c-buttonWrap--dashboard">
                  {{-- ユーザー情報CSV --}}
                  <a href="" class="c-button__icon c-button__icon--import">ユーザー情報CSV入力</a>
                  <a href="" class="c-button__icon__line c-button__icon--export">ユーザー情報CSV出力</a>
                  {{-- 製品情報CSV --}}
                  <a href="" class="c-button__icon c-button__icon--import">製品情報CSV入力</a>
                  <a href="" class="c-button__icon__line c-button__icon--export">製品情報CSV出力</a>
                </div>
              @endcomponent
            @endcomponent
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
{{--<script src="{{ asset('js/admin/chart-dashboard.js') }}"></script>--}}
<script>
  // (function() {
  //   $('tbody tr[data-href]').addClass('clickable').click( function() {
  //       window.location = $(this).attr('data-href');
  //   }).find('label','a').hover( function() {
  //       $(this).parents('tr').unbind('click');
  //   }, function() {
  //       $(this).parents('tr').click( function() {
  //           window.location = $(this).attr('data-href');
  //       });
  //   });
  // })();
</script>
<script>
  // (function() {
  //   $('.p-filterList__label').on('click', function (e) {
  //     const target = $(this).siblings('.p-filterList__content');
  //     $('.p-filterList__content').removeClass('is-active');
  //     target.addClass('is-active');
  //     e.stopPropagation();
  //   });
  //   $('.p-filterList__content').on('click', function (e) {
  //     e.stopPropagation();
  //   });
  //   $(document).on('click', function (e) {
  //     $('.p-filterList__content').removeClass('is-active');
  //   });
  // })();
</script>
<script>
  // (function() {
  //   const table = $('table');
  //   const thLength = table.find('th').length;
  //   table.css('grid-template-columns','repeat(' + thLength + ', minmax(max-content, 1fr))')
  // })();
</script>
@endsection