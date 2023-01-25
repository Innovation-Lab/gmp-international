@extends('admin.layout._page-single')
@section('content')
  <div class="l-main__head">
    @component('admin.component._head')
      @slot('main')
      <a href="{{route('admin.account.profile')}}" class="c-btn--goast">
        <svg>
          <use xlink:href="#chevron-left"/>
        </svg>
      </a>
      <h2 class="c-ttl--lg">
        アカウントを作成
      </h2>
      @endslot
    @endcomponent
  </div>
  <div class="l-main__body">
    123
  </div>
@endsection