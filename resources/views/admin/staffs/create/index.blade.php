@extends('admin.layouts.pages._default')
@section('title', '管理者管理')
@section('class', 'nofilter')
@section('content')
<div class="p-create">
  <div class="l-create">
    <div class="l-create__head">
      {{-- 詳細ヘッド --}}
      @include('admin.staffs.create._head')
    </div>
    <div class="l-create__body">
      <div class="wrapper u-max--560">
        <div class="container">
          <div class="l-create__body__inner single">
            {{-- メイン --}}
            <div class="l-create__main">
              <div class="p-create__main">
                {{-- ---------- ボックス（メインエリア） ---------- --}}
                <div class="p-create__main__box">
                  <div class="p-create__main__box__wrapper">
                    {{-- フォーム --}}
                    <form action="" class="p-form min">
                      @include('admin.staffs.create._form')
                    </form>
                  </div>
                  <div class="p-create__main__box__foot">
                    <a href="{{route('admin.staffs.index')}}" class="c-button__reset">戻る</a>
                    <button class="c-button">この内容で登録する</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- 要素をページ下部に固定 --}}
    {{--
    <div class="l-create__foot">
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