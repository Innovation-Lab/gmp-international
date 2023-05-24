@extends('web.layouts.pages._form')
@section('title', 'アカウント情報の変更')
@section('class', 'body_')
@section('content')
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
          <form method="POST" action="{{ route('mypage.account', $user) }}" id="accountSubmitForm">
            @csrf
            <ul class="p-formList">
              <!-- メールアドレス -->
              <li class="p-formList__item">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    <p class="c-txt">メールアドレス <span class="c-txt c-txt--must">必須</span></p>
                  </div>
                  <div class="p-formList__data @error('email') p-formList__data--err @enderror">
                    <input placeholder="例）gmp-international@sample.com" class="c-form" name="email" type="email" value="{{ old('email', data_get($user, 'email')) }}">
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
                    <p class="c-txt">パスワード<br />(半角英数字6〜10文字)</p>
                  </div>
                  <div class="p-formList__data @error('password') p-formList__data--err @enderror">
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
                    <p class="c-txt">パスワード(確認用)</p>
                  </div>
                  <div class="p-formList__data @error('password_confirmation') p-formList__data--err @enderror">
                    <input placeholder="パスワードを再入力してください" class="c-form" name="password_confirmation" type="password" value="">
                  </div>
                  <!-- 入力不備エラーメッセージ -->
                  @error('password_confirmation')
                    <p class="c-txt c-txt--err">{{ $message }}</p>
                  @enderror
                </div>
              </li>
            </ul>
          </form>
        </div>
        <div class="p-formPage__foot p-formPage__foot--wide">
          <div class="p-btnWrap p-btnWrap--center">
            <a href="{{ route('mypage.index') }}" class="c-btn c-btn--back">戻る</a>
            <button type="submit" class="c-btn c-btn--next" form="accountSubmitForm">登録する</button>
          </div>
        </div>
        <div class="p-formPage__btn">
          <a class="c-btn c-btn--text" href="{{route}}">退会手続きへ</a>
        </div>
      </div>
    </div>
  </div>
@endsection