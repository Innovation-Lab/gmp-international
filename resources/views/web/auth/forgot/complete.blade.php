@extends('web.layouts.pages._form')
@section('title', 'メール送信完了')
@section('class', 'body_complete')
@section('content')
  <div class="l-frame__body">
    <div class="p-formPage p-formPage--complete">
      <div class="p-formPage__complete">
        <!-- <div class="p-formPage__complete__img">
          <img src="{{asset('img/web/complete/sendMail.png')}}">
        </div> -->
        <div class="p-formPage__complete__ttl p-formPage__complete__ttl--pc">
        <p class="c-ttl--xxl">SENT E-MAIL</p>
        </div>
        <div class="p-formPage__complete__ttl p-formPage__complete__ttl--sp">
          <p class="c-ttl--xxl">SENT<br>E-MAIL</p>
        </div>
        <div class="p-formPage__complete__txt">
          <p class="c-ttl c-txt--center">メールの送信が完了しました。</p>
          <p class="c-description c-txt--center">
            ご入力いただいたメールアドレスに<br>
            パスワード再設定用のメールをお送りしました。
          </p>
          <div class="p-btnWrap p-btnWrap--center">
            <a class="c-btn c-btn--accent" href="{{route('mypage.index')}}">トップへ戻る</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection