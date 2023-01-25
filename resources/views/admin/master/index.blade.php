@extends('admin.layout._page-default')
@section('content')
  <div class="l-main__head">
    @component('admin.component._head')
      @slot('main')
      <h2 class="c-ttl--lg">
        マスタ管理
      </h2>
      @endslot
      @slot('sub')
      <!-- <form action="" class="p-filter">
        <div class="p-filter__search">
          <input type="text" placeholder="キーワード">
        </div>
      </form> -->
      @endslot
    @endcomponent
  </div>
  <div class="l-main__body">
    ボディ
  </div>
@endsection