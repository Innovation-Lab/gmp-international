@extends('web.layouts.pages._auth')
@section('title', 'ログイン')
@section('content')
<div class="p-login">
  <div class="p-login__head">
    <div class="p-login__head__logo">
      <img 
        src="{{ asset('img/web/user/logo/GMP_logo.png')}}" alt=""
        width="136px"
      >
    </div>
  </div>
  <div class="p-login__body">
    <div class="p-login__body__register">
      <div class="p-login__ttl">
        初めて製品を<br>購入された方はこちら
      </div>
      <div class="p-login__body__product">
        <!-- <img src="{{ asset('img/web/user/product/veer.png')}}" alt=""> -->
        <img src="" alt="">
        <img src="" alt="">
        <img src="" alt="">
      </div>
      <a href="" class="c-btn">新規会員登録</a>
    </div>
    <div class="p-login__body__auth">
      {!! Form::open(['method' => 'POST', 'route' => 'login', 'class' => '']) !!}
        <input type="email" name="email" placeholder="メールアドレス">
        <input type="password" name="password" placeholder="パスワード">
        <button type="submit" name="button" value="">ログイン</button>
      {!! Form::close() !!}
      <a href="">パスワードを忘れた方はこちら</a>
    </div>
    <div class="p-login__body__information">
      <p>GMPサポートデスク  ： 平日10:00〜17:00  ベビー用品
        <a href="tel:0120178363" class="c-txt c-txt--freeDial">0120-178-363</a>
        ｜ペット用品
        <a href="tel:0120981511" class="c-txt c-txt--freeDial">0120-98-1511</a>
      </p>
      <p class="c-txt c-txt--copy">Copyright©2008 GMP International Co., Ltd. All Right Reserved</p>
    </div>
  </div>
  <div class="p-login__foot">
    <img src="" alt="">
  </div>
</div>
@endsection