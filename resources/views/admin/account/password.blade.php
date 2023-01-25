@extends('admin.layout._page-default')
@section('content')
  <div class="l-main__head">
    @component('admin.component._head')
      @slot('main')
      <h2 class="c-ttl--lg">
        アカウント
      </h2>
      @endslot
    @endcomponent
  </div>
  <div class="l-main__body">
    <div class="p-page--lg">
      @include('admin.account._sidebar')
      <div class="p-page__cnt">
        コンテナ
        <a class="c-btn" href="{{route('admin.account.admin.edit')}}">アカウントを編集</a>
      </div>
    </div>
  </div>
@endsection