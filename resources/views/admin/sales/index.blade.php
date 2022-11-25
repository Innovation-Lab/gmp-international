@extends('admin.layout._page-default')
@section('content')
  <div class="p-main">
    @component('admin.component._main-head')
      @slot('main')
      <h2 class="p-main__head__main__txt__ttl">
        売上管理
      </h2>
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