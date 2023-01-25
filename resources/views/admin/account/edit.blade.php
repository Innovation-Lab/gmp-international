@extends('admin.layout._page-default')
@section('content')
  <div class="l-main__head">
    @component('admin.component._head')
      @slot('main')
      <a href="{{route('admin.account')}}" class="c-btn--goast">
        <svg>
          <use xlink:href="#chevron-left"/>
        </svg>
      </a>
      <h2 class="c-ttl--lg">
        プロフィールを編集
      </h2>
      @endslot
    @endcomponent
  </div>
  <div class="l-main__body">
    123
  </div>
@endsection