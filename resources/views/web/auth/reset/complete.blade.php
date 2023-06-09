@extends('web.layouts.pages._form')
@section('title', 'パスワードの変更完了')
@section('class', 'body_complete')
@section('content')
  <div class="l-frame__body">
    <div class="p-formPage p-formPage--complete">
      <div class="p-formPage__complete">
        <!-- <div class="p-formPage__complete__img">
          <img src="{{asset('img/web/complete/changePassword.png')}}">
        </div> -->
        <div class="p-formPage__complete__ttl">
          <p class="c-ttl--xxl">PASSWORD<br>CHANGED</p>
        </div>
        <div class="p-formPage__complete__txt">
          <p class="c-ttl c-txt--center">パスワードの変更が完了しました。</p>
          <div class="p-btnWrap p-btnWrap--center">
            <a class="c-btn c-btn--accent" href="{{ route('mypage.index')}} ">マイページへ</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection