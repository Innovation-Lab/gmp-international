@extends('admin.layout._page-default')
@section('title', 'お知らせ管理')
@section('content')
  <div class="l-main__head">
    @component('admin.component._head')
      @slot('main')
      <h2 class="c-ttl--lg">
        お知らせ管理
        <a href="" class="c-btn--sm">お知らせを追加</a>
      </h2>
      @endslot
      @slot('sub')
      <form action="" class="p-filter">
        <div class="p-filter__search">
          <input type="text" placeholder="キーワード">
        </div>
        @include('admin.news._filter')
      </form>
      @endslot
    @endcomponent
  </div>
  <div class="l-main__body">
    @include('admin.news._table')
  </div>
@endsection