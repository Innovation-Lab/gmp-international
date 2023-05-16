@extends('web.layouts.pages._form')
@section('title', 'メール送信完了')
@section('class', 'body_complete')
@section('content')
  <div class="l-frame__body">
    <div class="p-formPage p-formPage--complete">
      <div class="p-formPage__complete">
        <div class="p-formPage__complete__img">
          <img src="{{asset('img/web/complete/sendMail.png')}}">
        </div>
        <div class="p-formPage__complete__txt">
          <p class="c-ttl c-txt--center">メールの送信が完了しました。</p>
          <p class="c-description c-txt--center">
            ご登録いただいたメールアドレスに<br>
            パスワード再設定URLを送りました。
          </p>
        </div>
      </div>
    </div>
  </div>
@endsection