@extends('web.layout._page-default')
@section('title', 'ホームページ')
@section('content')
  <div class="container">
    <div class="u-max--480 u-mi--a u-pt--160">
      <div class="u-align--both u-w--100p u-gap--8">
        <a href="{{route('web.auth.login')}}" class="c-btn">ログイン</a>
        <a href="{{route('web.auth.register')}}" class="c-btn">新規会員登録</a>
        <a href="{{route('admin.auth.login')}}" class="c-btn">管理画面へ</a>
      </div>
    </div>
  </div>
@endsection