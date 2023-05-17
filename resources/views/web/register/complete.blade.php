@extends('web.layouts.pages._form')
@section('title', '会員登録完了')
@section('class', 'body_complete')
@section('content')
  <div class="l-frame__body">
    <div class="p-formPage p-formPage--complete">
      <div class="p-formPage__complete">
        <div class="p-formPage__complete__img">
          <img src="{{asset('img/web/complete/default.png')}}">
        </div>
        <div class="p-formPage__complete__txt">
          <p class="c-ttl c-txt--center">会員情報を登録完了しました。</p>
          <p class="c-description c-txt--center">
            ご登録いただいたメールアドレスに会員情報を<br>
            送りましたので、ご確認ください。
          </p>
          <div class="p-btnWrap p-btnWrap--center">
            <a class="c-btn c-btn--accent" href="{{route('web.mypage.index')}">マイページへ</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection