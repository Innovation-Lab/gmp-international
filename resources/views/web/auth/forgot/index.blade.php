@extends('web.layouts.pages._form')
@section('title', 'アカウント情報の入力')
@section('class', 'body_')
@section('content')
  <div class="l-frame__body">
    <div class="p-formPage">
      <div class="p-formPage__head">
        <div class="l-container"> 
          <div class="p-formPage__head__ttl">
            <p class="c-ttl">パスワード再設定</p>
          </div>
        </div>
      </div>
      <div class="l-container">
        <div class="p-formPage__body p-formPage__body--thin">
          <div class="l-stack">
            <div class="l-stack__item">
              <p class="c-description c-txt--center--md">
                登録しているメールアドレスを入力してください。<br>
                パスワード再設定用のリンクをお送りします。
              </p>
            </div>
            <div class="l-stack__item">
              <form method="POST" action="{{ route('register.store.account') }}" id="accountSubmitForm">
                @csrf
                <ul class="p-formList">
                  <!-- メールアドレス -->
                  <li class="p-formList__item">
                    <div class="p-formList__content">
                      <div class="p-formList__label">
                        <p class="c-txt">メールアドレス <span class="c-txt c-txt--must">必須</span></p>
                      </div>
                      <div class="p-formList__data">
                        <input placeholder="例）gmp-international@sample.com" class="c-form" name="email" type="email" value="{{ old('email') }}">
                      </div>
                      <!-- 入力不備エラーメッセージ -->
                      @error('email')
                        <p style="display: none;" class="c-txt c-txt--err">{{ $message }}</p>
                      @enderror
                    </div>
                  </li>
                </ul>
              </form>
            </div>
          </div>
        </div>
        <div class="p-formPage__foot p-formPage__foot--wide">
          <div class="p-btnWrap p-btnWrap--center">
            <a href="" class="c-btn c-btn--back">戻る</a>
            <!-- <button type="submit" class="c-btn c-btn--next" form="accountSubmitForm">送信する</button> -->
            <a class="c-btn c-btn--next"  href="{{ route('web.forgot.complete') }}">送信する</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection