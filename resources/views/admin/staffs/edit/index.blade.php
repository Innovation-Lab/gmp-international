@extends('admin.layouts.pages._default')
@section('title', '管理者管理')
@section('class', 'nofilter')
@section('content')
<div class="p-edit">
  <div class="l-edit">
    <div class="l-edit__head">
      {{-- 詳細ヘッド --}}
      @include('admin.staffs.edit._head')
    </div>
    <div class="l-edit__body">
      <div class="wrapper u-max--560">
        <div class="container">
          <div class="l-edit__body__inner single">
            {{-- メイン --}}
            <div class="l-edit__main">
              <div class="p-edit__main">
                {{-- ---------- ボックス（メインエリア） ---------- --}}
                <div class="p-edit__main__box">
                  <div class="p-edit__main__box__wrapper">
                    {{-- フォーム --}}
                    {!! Form::open(['method' => 'POST', 'route' => 'admin.staffs.updateOrCreate', 'class' => 'p-form min', 'id' => 'updateStaffForm', 'files' => true]) !!}
                    {!! Form::hidden('id', data_get($admin, 'id')) !!}
                      @include('admin.staffs.edit._form')
                    {!! Form::close() !!}
                  </div>
                  <div class="p-edit__main__box__foot">
                    <button class="c-button__reset">変更をリセット</button>
                    <button form="updateStaffForm" class="c-button">変更を反映する</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- 要素をページ下部に固定 --}}
    {{--
    <div class="l-edit__foot">
      <div class="p-detail__foot">
        要素をページ下部に固定
      </div>
    </div>
    --}}
  </div>
</div>
{{-- アカウント作成モーダル --}}
{{--@include('admin.staffs._modal-account-create')--}}
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