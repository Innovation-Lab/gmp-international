@extends('admin.layouts.pages._default')
@section('title', 'ダッシュボード')
@section('class', 'body_dashboard')
@section('content')
<div class="p-index">
  <div class="l-index">
    <div class="l-index__head">
      <div class="p-index__head">
        <div class="wrapper">
          <div class="container">
            <div class="p-index__head__inner">
              <h2 class="p-index__head__title">
                ダッシュボード
              </h2>
              <div class="p-index__head__action">
                {{-- フォーム --}}
                {!! Form::open(['class' => 'p-form']) !!}
                  {!!
                    Form::select('analysis-period', 
                      [
                      'analysis-period-this-month' => '今月',
                      'analysis-period-last-month' => '先月',
                      ],
                      'analysis-period-this-month', ['placeholder' => '選択']
                    )
                  !!}
                {!! Form::close() !!}
              </div>
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
              @component('admin.dashboard._col',['span' => '8'])
                {{-- 行 --}}
                @component('admin.dashboard._row')
                  {{-- 列 --}}
                  @component('admin.dashboard._col',[
                    'span' => '6',
                  ])
                    {{-- プラン売上 --}}
                    @include('admin.dashboard.item._sales_plan')
                  @endcomponent
                  @component('admin.dashboard._col',[
                    'span' => '6',
                  ])
                    {{-- 商品売上 --}}
                    @include('admin.dashboard.item._sales_item')
                  @endcomponent
                @endcomponent
                @component('admin.dashboard._row')
                  {{-- 列 --}}
                  @component('admin.dashboard._col',['span' => '12'])
                    {{-- 売上推移チャート --}}
                    @include('admin.dashboard.item._chart_sales')
                  @endcomponent
                @endcomponent
              @endcomponent
              @component('admin.dashboard._col',['span' => '4'])
                {{-- 売上ランキング --}}
                @include('admin.dashboard.item._ranking_sales')
              @endcomponent
            @endcomponent
            {{-- -------------------- 行 2 -------------------- --}}
            @component('admin.dashboard._row')
              {{-- 列 --}}
              @component('admin.dashboard._col',['span' => '4'])
                <div class="p-dashboard__item">
                  <div class="p-dashboard__head">
                    <h3 class="p-dashboard__head__title">
                      支払い履歴
                    </h3>
                  </div>
                  <div class="p-dashboard__body">
                    内容
                  </div>
                </div>
              @endcomponent
              @component('admin.dashboard._col',['span' => '4'])
                {{-- コンテンツ --}}
                <div class="p-dashboard__item">
                  <div class="p-dashboard__head">
                    <h3 class="p-dashboard__head__title">
                      推移
                    </h3>
                  </div>
                  <div class="p-dashboard__body">
                    4<br>
                    4<br>
                    4<br>
                    4<br>
                  </div>
                </div>
                {{-- コンテンツ end --}}
              @endcomponent
              @component('admin.dashboard._col',['span' => '4'])
                <div class="p-dashboard__item">
                  4
                </div>
              @endcomponent
            @endcomponent
            {{-- -------------------- 行 3 -------------------- --}}
            @component('admin.dashboard._row')
              {{-- 列 --}}
              @component('admin.dashboard._col',[
                'span' => '6',
                'xxl' => '3'
              ])
                <div class="p-dashboard__item">
                  3
                </div>
              @endcomponent
              @component('admin.dashboard._col',[
                'span' => '6',
                'xxl' => '3'
              ])
                <div class="p-dashboard__item">
                  3
                </div>
              @endcomponent
              @component('admin.dashboard._col',[
                'span' => '6',
                'xxl' => '3'
              ])
                <div class="p-dashboard__item">
                  3
                </div>
              @endcomponent
              @component('admin.dashboard._col',[
                'span' => '6',
                'xxl' => '3'
              ])
                <div class="p-dashboard__item">
                  3
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
<script src="{{ asset('js/admin/chart-dashboard.js') }}"></script>
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