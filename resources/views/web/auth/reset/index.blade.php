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
              <form method="POST" action="{{ route('password.store') }}" id="passwordSubmitForm">
                @csrf
                <ul class="p-formList">
                  <!-- メールアドレス -->
                  <li class="p-formList__item">
                    <div class="p-formList__content">
                      <div class="p-formList__label p-formList__label--mail">
                        <p class="c-txt">メールアドレス　<span class="c-txt c-txt--must">必須</span></p>
                      </div>
                      <div class="p-formList__data">
                        <input placeholder="例）gmp-international@sample.com" class="c-form" readonly="readonly" name="email" type="email" value="{{ request()->get('email') }}">
                      </div>
                    </div>
                  </li>
                  <!-- パスワード -->
                  <li class="p-formList__item">
                    <div class="p-formList__content">
                      <div class="p-formList__label">
                        <p class="c-txt">パスワード（半角英数字6文字〜） <span class="c-txt c-txt--must">必須</span></p>
                      </div>
                      <div class="p-formList__data">
                        <input placeholder="例）sample123" class="c-form" name="password" type="password" value="">
                        <!-- 入力不備エラーメッセージ -->
                        @error('password')
                          <p class="c-txt c-txt--err">{{ $message }}</p>
                        @enderror
                      </div>
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
            <button onclick="blockNewPassDoubleClick()" id="submitPasswordForm" class="c-btn c-btn--next">登録する</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
      function blockNewPassDoubleClick()
      {
          $('#submitPasswordForm').prop('disabled', true);
          $('#passwordSubmitForm').submit();
      }
  </script>
@endsection