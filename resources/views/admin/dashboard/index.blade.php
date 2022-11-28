@extends('admin.layout._page-default')
@section('content')
  <div class="p-main">
    @component('admin.component._main-head')
      @slot('main')
      <h2 class="p-main__head__main__txt__ttl">
        ダッシュボード
      </h2>
      @endslot
    @endcomponent
    <div class="p-main__body">
      <h1 class="c-h0 u-mb24">ダッシュボード</h1>
    </div>
  </div>
@endsection