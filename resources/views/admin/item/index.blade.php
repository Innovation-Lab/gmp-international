@extends('admin.layout._page-default')
@section('title', '商品管理')
@section('content')
  <div class="p-main">
    @component('admin.component._main-head')
      @slot('main')
      <h2 class="p-main__head__main__txt__ttl">
        商品管理
      </h2>
      <div class="p-main__head__main__txt__act">
        <a href="" class="c-btn--sm">商品を追加</a>
      </div>
      @endslot
      @slot('sub')
        <form action="" class="p-main__head__form">
          <div class="p-main__head__search">
            <input type="text" placeholder="キーワード">
          </div>
          @include('admin.item._filter')
        </form>
      @endslot
    @endcomponent
    <div class="p-main__body" style="display: block;">
      @include('admin.item._table')
    </div>
  </div>
@endsection