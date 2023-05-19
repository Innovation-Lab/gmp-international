@extends('web.layouts.pages._form')
@section('title', 'パスワード再設定')
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
                新しいパスワードを設定してください。
              </p>
            </div>
            <div class="l-stack__item">
              <form method="POST" action="{{ route('password.store') }}" id="accountSubmitForm">
                @csrf
                <ul class="p-formList">
                  <!-- メールアドレス -->
                  <li class="p-formList__item">
                    <div class="p-formList__content">
                      <div class="p-formList__label">
                        <p class="c-txt">メールアドレス　<span class="c-txt c-txt--must">必須</span></p>
                      </div>
                      <div class="p-formList__data">
                        <input placeholder="例）gmp-international@sample.com" class="c-form" readonly="readonly" name="email" type="email" value="{{ request()->get('email') }}">
                      </div>
                      <!-- 入力不備エラーメッセージ -->
                      @error('email')
                        <p class="c-txt c-txt--err">{{ $message }}</p>
                      @enderror
                    </div>
                  </li>
                  <!-- パスワード -->
                  <li class="p-formList__item">
                    <div class="p-formList__content">
                      <div class="p-formList__label">
                        <p class="c-txt">パスワード（半角英数字6〜10文字） <span class="c-txt c-txt--must">必須</span></p>
                      </div>
                      <div class="p-formList__data">
                        <input placeholder="例）sample123" class="c-form" name="password" type="password" value="">
                      </div>
                      <!-- 入力不備エラーメッセージ -->
                      @error('password')
                        <p class="c-txt c-txt--err">{{ $message }}</p>
                      @enderror
                    </div>
                  </li>
                  <!-- パスワード確認用 -->
                  <li class="p-formList__item">
                    <div class="p-formList__content">
                      <div class="p-formList__label">
                        <p class="c-txt">パスワード（確認用） <span class="c-txt c-txt--must">必須</span></p>
                      </div>
                      <div class="p-formList__data">
                        <input placeholder="パスワードを再入力してください" class="c-form" name="password_confirmation" type="password" value="">
                        @error('password_confirmation')
                          <p class="c-txt c-txt--err">{{ $message }}</p>
                        @enderror
                      </div>
                      <!-- 入力不備エラーメッセージ -->
                      @error('password_confirmation')
                        <p style="display: none;" class="c-txt c-txt--err">{{ $message }}</p>
                      @enderror
                      <input type="hidden" name="token" value="{{ $token }}">
                    </div>
                  </li>
                </ul>
              </form>
            </div>
          </div>
        </div>
        <div class="p-formPage__foot p-formPage__foot--wide">
          <div class="p-btnWrap p-btnWrap--center">
            <button type="submit" class="c-btn c-btn--next" form="accountSubmitForm">登録する</button>
            {{-- <a class="c-btn c-btn--next"  href="{{ route('web.reset.complete') }}">登録する</a> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection