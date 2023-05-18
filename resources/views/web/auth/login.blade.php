@extends('web.layouts.pages._login')
@section('title', 'ログイン')
@section('content')

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
        <button class="p-login__registered__btn" data-micromodal-trigger="modal__guide--serial" role="button">登録済みの方はこちら</button>
      </div>
      <div class="p-login__forget">
        <a class="c-btn--text c-btn--text--nv" href="{{route('web.forgot.index')}}">パスワードを忘れた方はこちら</a>
      </div>
      <a href="{{ route('register.terms') }}" class="c-btn">新規会員登録</a>
    </div>
    <div class="p-login__body__auth">
      {!! Form::open(['method' => 'POST', 'route' => 'login']) !!}
        @csrf
        <input type="email" name="email" placeholder="メールアドレス">
        <input type="password" name="password" placeholder="パスワード">
        @foreach ($errors->all() as $error)
          <div class="error">{{ $error }}</div>
        @endforeach
        <input type="submit" name="button" value="ログイン">
      {!! Form::close() !!}
      <a href="{{route('password.request')}}">パスワードを忘れた方はこちら</a>
    </div>
  </div>

  <!-- PC -->
  <div class="p-login p-login--pc">
    <div class="l-container">
      <div class="p-login__body">
        <div class="p-login__link">
          <div class="p-login__register">
            <div class="p-login__img">
              <img class="p-login__img__ph" src="{{ asset('img/web/product/login_product.png')}}" alt="">
            </div>
            <a href="{{ route('register.terms') }}" class="c-btn c-btn--login">新規会員登録</a>
          </div>
          <div class="p-login__auth">
            <div class="p-login__ttl">
              <p class="c-ttl">登録済みの方はこちら</p>
            </div>
            {{--!! Form::open(['method' => 'POST', 'route' => 'login'])1 !! --}}
            <form class="form" action="">
              <input class="mailbox" type="email" name="email" placeholder="メールアドレス">
              <input class="passbox"type="password" name="password" placeholder="パスワード">
              @foreach ($errors->all() as $error)
              <div class="error">{{ $error }}</div>
              @endforeach
              <input class="login" type="submit" name="button" value="ログイン">
            </form>
            {{-- !! Form::close() !! --}}
            <a class="c-btn c-btn--text" href="{{route('web.forgot.index')}}">パスワードを忘れた方はこちら</a>
          </div>
        </div>
        <div class="p-login__support">
          <div class="p-login__txt">
            <p class="c-txt--support">GMPサポートデスク　営業時間：平日10:00〜17:00</p>
            <p class="c-txt--support">ベビー用品0120-178-363｜ペット用品0120-98-1511</p>
          </div>
          <p class="c-txt--copyright">Copyright©2008 GMP International Co., Ltd. All Right Reserved</p>
        </div>
      </div>
    </div>
  </div>
  
@endsection