@extends('web.layouts.pages._login')
@section('title', 'ログイン')
@section('content')
<?php
  $userAgent = request()->header('User-Agent');
    if (isMobile($userAgent) && count($errors->all()) > 0) {
        $javascriptCode = "$(document).ready(function() {
            if (window.innerWidth <= 1024) { // タブレットサイズ以下の場合
                $('#modal-login').show();
            } else { // PCサイズの場合
                // PC向けの表示処理を行う
            }
        });";
        echo "<script>{$javascriptCode}</script>";
    }
  /**
   * @param $userAgent
   * @return false|int
   */
  function isMobile($userAgent): false|int
  {
      return preg_match('/(iPhone|Android)/', $userAgent);
  }
?>
  <!-- SP -->
  <div class="p-login p-login--sp">
    <div class="p-login__head">
        <img src="{{ asset('img/web/user/logo/GMP_logo.png')}}" alt="">
    </div>
    <div class="p-login__body">
      <div class="p-login__register">
        <a href="{{ route('register.terms') }}" class="c-btn c-btn--login">新規会員登録</a>
      </div>
      <div class="p-login__registered">
        <button class="p-login__registered__btn" onclick="$('#modal-login').show()" role="button">登録済みの方はこちら</button>
        <!-- 編集ボタン -->
      </div>
      <div class="p-login__forget">
        <a class="c-btn--text c-btn--text--nv" href="{{route('password.request')}}">パスワードを忘れた方はこちら</a>
      </div>
    </div>
  </div>

  <!-- PC -->
  <div class="p-login p-login--pc">
    <div class="l-container">
      <div class="p-login__body">
        <div class="p-login__link">
          <div class="p-login__register">
            <div class="p-login__ttl--2l">
              <p class="c-ttl"><span>初めて製品を<br>購入された方はこちら</span></p>
            </div>
            <div class="p-login__img">
              <img class="p-login__img__ph" src="{{ asset('img/web/login/login-product.png')}}" alt="">
            </div>
            <a href="{{ route('register.terms') }}" class="c-btn c-btn--login">新規会員登録</a>
          </div>
          <div class="p-login__auth">
            <div class="p-login__ttl">
              <p class="c-ttl">登録済みの方はこちら</p>
            </div>
            {!! Form::open(['method' => 'POST', 'route' => 'login']) !!}
            <div class="p-formList__data @error('email') p-formList__data--err @enderror">
              <input class="mailbox" type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
              @error('email')
                <p class="c-txt c-txt--err">{{ $message }}</p>
              @enderror
            </div>
            <div class="p-formList__data @error('password') p-formList__data--err @enderror">
              <input class="passbox"type="password" name="password" placeholder="パスワード">
              @error('password')
                <p class="c-txt c-txt--err">{{ $message }}</p>
              @enderror
            </div>
            <input class="login" type="submit" name="button" value="ログイン">
            {!! Form::close() !!}
          </div>
          <a class="c-btn c-btn--text" href="{{route('password.request')}}">パスワードを忘れた方はこちら</a>
        </div>
        <div class="p-login__support">
          <p class="c-txt">GMPサポートデスク　営業時間：平日10:00〜17:00</p>
          <div class="p-footer__tel">
            <div class="p-footer__tel__item">
              <p class="c-ttl">ベビー用品</p>
              <a href="tel:0120-178-363" class="c-txt c-txt--tel">0120-178-363</a>
            </div>
            <div class="p-footer__tel__item">
              <p class="c-ttl">ペット用品</p>
              <a href="tel:0120-98-1511" class="c-txt c-txt--tel">0120-98-1511</a>
            </div>
          </div>
        </div>
        <!-- <div class="p-login__support">
          <div class="p-login__txt">
            <p class="c-txt--support">GMPサポートデスク　営業時間：平日10:00〜17:00</p>
            <p class="c-txt--support">ベビー用品0120-178-363｜ペット用品0120-98-1511</p>
          </div>
          <p class="c-txt--copyright">Copyright©2023 GMP International Co., Ltd. All Right Reserved</p>
        </div> -->
      </div>
    </div>
  </div>
  
  {{-- SPログイン --}}
  @include('web.components.modal._modal-login')

@endsection