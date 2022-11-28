@extends('admin.layout._page-single')
@section('content')
  <div class="p-main">
    @component('admin.component._main-head')
      @slot('main')
      <h2 class="p-main__head__main__txt__ttl">
        アカウントを編集
      </h2>
      @endslot
    @endcomponent
    <div class="p-main__body">
      <div class="p-main__wrapper--lg">
        <div class="p-main__container">
          コンテナ
          <a class="c-btn" href="{{route('admin.account.admin.index')}}">一覧に戻る</a>
        </div>
      </div>
    </div>
  </div>
@endsection