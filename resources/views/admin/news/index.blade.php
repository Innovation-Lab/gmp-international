@extends('admin.layout._page-default')
@section('content')
  <div class="p-main">
    @component('admin.component._main-head')
      @slot('main')
      <h2 class="p-main__head__main__txt__ttl">
        お知らせ管理
      </h2>
      <div class="p-main__head__main__txt__act">
        <a href="" class="c-btn--sm">お知らせを新規追加</a>
      </div>
      @endslot
      @slot('sub')
        <form action="" class="p-main__head__form">
          <input type="text" placeholder="キーワード">
        </form>
      @endslot
    @endcomponent
    <div class="p-main__body">
      ボディ
    </div>
  </div>
@endsection