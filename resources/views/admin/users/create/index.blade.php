@extends('admin.layouts.pages._default')
@section('title', 'ユーザー管理')
@section('content')
<div class="p-create">
  <div class="l-create">
    <div class="l-create__head">
      {{-- 詳細ヘッド --}}
      @include('admin.users.create._head')
    </div>
    <div class="l-create__body">
      <div class="wrapper u-max--800">
        <div class="container">
          <div class="l-create__body__inner single">
            {{-- メイン --}}
            <div class="l-create__main">
              <div class="p-create__main">
                {{-- ---------- ボックス（メインエリア） ---------- --}}
                <div class="p-create__main__box">
                  <div class="p-create__main__box__wrapper">
                    {{-- フォーム --}}
                    {{ Form::open(['method' => 'POST', 'route' => 'admin.users.store', 'class' => 'p-form h-adr', 'id' => 'submitForm']) }}
                    <span class="p-country-name" style="display:none;">Japan</span>
                      {{-- ユーザー情報 --}}
                      @include('admin.users.create._form-user')
                      <div class="c-div--xl"></div>
                      {{-- 登録製品情報 --}}
                      @include('admin.users.create._form-product')
                    {{ Form::close() }}
                  </div>
                  <div class="p-create__main__box__foot">
                    <a href="{{route('admin.users.index')}}" class="c-button__reset">戻る</a>
                    <button type="submit" form="submitForm" class="c-button">この内容で登録する</button>
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
{{-- ユーザー写真 --}}
@include('admin.users._modal-users-photo')
<script>
  // (function() {
  //   const table = $('table');
  //   const thLength = table.find('th').length;
  //   table.css('grid-template-columns','repeat(' + thLength + ', minmax(max-content, 1fr))')
  // })();
</script>
@endsection