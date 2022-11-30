@extends('admin.layout._page-default')
@section('title', 'お知らせ管理')
@section('content')
  <div class="p-main">
    @component('admin.component._main-head')
      @slot('main')
      <h2 class="p-main__head__main__txt__ttl">
        お知らせ管理
      </h2>
      <div class="p-main__head__main__txt__act">
        <a href="" class="c-btn--sm">お知らせを追加</a>
      </div>
      @endslot
      @slot('sub')
        <form action="" class="p-main__head__form">
          <div class="p-main__head__search">
            <input type="text" placeholder="キーワード">
          </div>
          @include('admin.news._filter')
        </form>
      @endslot
    @endcomponent
    <div class="p-main__body" style="display: block;">
      @include('admin.news._table')
    </div>
  </div>
@endsection