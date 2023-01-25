@extends('admin.layout._page-default')
@section('title', '商品管理')
@section('content')
  <div class="l-main__head">
    @component('admin.component._head')
      @slot('main')
      <h2 class="c-ttl--lg">
        商品管理
        <a href="{{route('admin.item.add')}}" class="c-btn--sm">商品を新規作成</a>
      </h2>
      @endslot
      @slot('sub')
        <form action="" class="p-filter">
          <div class="p-filter__search">
            <input type="text" placeholder="キーワード">
          </div>
          @include('admin.item._filter')
        </form>
      @endslot
    @endcomponent
  </div>
  <div class="l-main__body">
    @include('admin.item._table')
  </div>
@endsection