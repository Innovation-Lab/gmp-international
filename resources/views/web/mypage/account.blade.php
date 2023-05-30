@extends('web.layouts.pages._form')
@section('title', 'アカウント情報の変更')
@section('class', 'body_')
@section('content')

<?php
  if(count($errors->get('password')) > 0 || count($errors->get('password_confirmation')) > 0) {
      $javascriptCode = "$(document).ready(function() {
        $('.js-target__change-password').css({'display':'block'})
      });";
      echo "<script>{$javascriptCode}</script>";
  }
?>

  <div class="l-frame__body">
    <div class="p-formPage">
      <div class="p-formPage__head">
        <div class="l-container"> 
          <div class="p-formPage__head__ttl">
            <p class="c-ttl">アカウント情報の変更</p>
          </div>
        </div>
      </div>
      <div class="l-container">
        <div class="p-formPage__body">
          {{ Form::open(['route' => ['mypage.account', $user], 'method' => 'POST', 'id' => 'accountSubmitForm']) }}
            <ul class="p-formList">
              <!-- メールアドレス -->
              <li class="p-formList__item">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    <p class="c-txt">メールアドレス <span class="c-txt c-txt--must">必須</span></p>
                  </div>
                  <div class="p-formList__data @error('email') p-formList__data--err @enderror">
                    <input placeholder="例）gmp-international@sample.com" class="c-form" name="email" type="email" value="{{ data_get($user, 'email', old('email')) }}">
                    @error('email')
                      <p class="c-txt c-txt--err">{{ $message }}</p>
                    @enderror
                  </div>
                  <!-- 入力不備エラーメッセージ -->
                </div>
              </li>
              <li class="p-formList__item">
                <div class="p-formList__content">
                  <!-- <div class="p-formList__label">
                    <p class="c-txt">パスワード <span class="c-txt c-txt--must">必須</span></p>
                  </div> -->
                  <div class="p-formList__data--ac c-txt">
                    {!! Form::checkbox('change-password', 'value', false, ['id' => 'change-password','onclick' => 'checkChangePassword()']) !!}
                    {!! Form::label('change-password', 'パスワードを変更する') !!}
                  </div>
                  <div class="split">
                    <div class="p-formList__data js-target__change-password
                      @error('password') p-formList__data--err @enderror
                      @error('password_confirmation') @if($message == 'パスワード(確認用)とパスワードには同じ値を入力してください。') p-formList__data--err @endif @enderror
                    "  style="display: none;">
                      <div class="p-formList__label p-formList__label--pass">
                        <p class="c-txt">パスワード（半角英数字6〜10文字）<span class="c-txt c-txt--must">必須</span></p>
                      </div>
                      {!! Form::password('password', ['placeholder' => '例）sample123', 'autocomplete' => 'off']) !!}
                      @error('password')
                        <p class="c-txt c-txt--err" style="width: 100%">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="p-formList__data js-target__change-password @error('password_confirmation') p-formList__data--err @enderror" style="display: none;">
                      <div class="p-formList__label p-formList__label--pass">
                        <p class="c-txt">パスワード確認用 <span class="c-txt c-txt--must">必須</span></p>
                      </div>
                      {!! Form::password('password_confirmation', ['placeholder' => 'パスワードを再入力してください']) !!}
                      @error('password_confirmation')
                        <p class="c-txt c-txt--err" style="width: 100%">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                </div>
              </li>
              {{-- パスワード変更 表示/非表示 --}}
              <script>
                function checkChangePassword(){
                  radio = document.getElementsByName('change-password')
                  if(radio[0].checked) {
                    $('.js-target__change-password').css({'display':'block'});
                  }else{
                    $('.js-target__change-password').css({'display':'none'});
                  }
                }
              </script>
            </ul>
          {{ Form::close() }}
        </div>
        <div class="p-formPage__foot p-formPage__foot--wide">
          <div class="p-btnWrap p-btnWrap--center">
            <a href="{{ route('mypage.index') }}" class="c-btn c-btn--back">戻る</a>
            <button type="submit" class="c-btn c-btn--next" form="accountSubmitForm">登録する</button>
          </div>
        </div>
        <div class="p-formPage__btn">
          <a href="{{ route('mypage.withdrawal') }}" class="c-btn c-btn--text">退会手続きへ</a>
        </div>
      </div>
    </div>
  </div>
@endsection