@extends('web.layouts.pages._login')
@section('title', 'ログイン')
@section('content')
<div class="p-login">
  <div class="p-login__head">
    
  </div>
  <div class="p-login__body">
    <div class="p-login__body__register">
      <div class="p-login__ttl">
        初めて製品を<br>購入された方はこちら
      </div>
      <div class="p-login__body__product">
        <img src="" alt="">
        <img src="" alt="">
        <img src="" alt="">
      </div>
      <a href="http://localhost:8082/register" class="c-btn">新規会員登録</a>
    </div>
    <div class="p-login__body__auth">
      <input type="mail" name="user_mail" placeholder="メールアドレス">
      <input type="password" name="password" placeholder="パスワード">
      <input type="submit" name="button" value="ログイン">
      <a href="">パスワードを忘れた方はこちら</a>
    </div>
  </div>
  <div class="p-login__foot">
    <img src="" alt="">
  </div>
</div>
@endsection