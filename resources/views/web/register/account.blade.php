@extends('web.layouts.pages._form')
@section('title', 'アカウント情報の入力')
@section('class', 'body_')
@section('content')
  <div class="l-frame__body">
    <div class="p-formPage">
      <div class="p-formPage__head">
        <div class="l-container"> 
          <!-- ステップ1 -->
          <!-- <span class="circle"></span> -->
          <div class="p-formPage__step">
            <ul class="p-step">
              <li class="p-step__item p-step__item--current">
                <p class="c-txt c-txt--step">STEP1</p>
              </li>
              <li class="p-step__item">
                <p class="c-txt c-txt--step">STEP2</p>
              </li>
              <li class="p-step__item">
                <p class="c-txt c-txt--step">STEP3</p>
              </li>
            </ul>
          </div>
          <div class="p-formPage__head__ttl">
            <p class="c-ttl">アカウント情報の入力</p>
          </div>
        </div>
      </div>
      <div class="l-container">
        <div class="p-formPage__body">
          <form method="POST" action="{{ route('register.store.account') }}" id="accountSubmitForm">
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
                    <!-- 入力不備エラーメッセージ -->
                    @error('email')
                    <p class="c-txt c-txt--err">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </li>
              <!-- パスワード -->
              <li class="p-formList__item">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    <p class="c-txt">パスワード<br />(半角英数字6文字〜) <span class="c-txt c-txt--must">必須</span></p>
                  </div>
                  <div class="p-formList__data
                   @error('password') p-formList__data--err @enderror
                   @error('password_confirmation') @if($message == 'パスワード(確認用)とパスワードには同じ値を入力してください。') p-formList__data--err @endif @enderror
                   @if(data_get($user, 'password')) p-formList__data--err @endif
                  ">
                    <input placeholder="例）sample123" class="c-form" name="password" type="password" value="">
                    <!-- 入力不備エラーメッセージ -->
                    @error('password')
                    <p class="c-txt c-txt--err">{{ $message }}</p>
                    @enderror
                    @if(data_get($user, 'password'))
                      <p class="c-txt c-txt--err">再度ご入力ください。</p>
                    @endif
                  </div>
                </div>
              </li>
              <!-- パスワード確認用 -->
              <li class="p-formList__item">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    <p class="c-txt">パスワード(確認用) <span class="c-txt c-txt--must">必須</span></p>
                  </div>
                  <div class="p-formList__data @error('password_confirmation') p-formList__data--err @enderror
                   @if(data_get($user, 'password')) p-formList__data--err @endif
                  ">
                    <input placeholder="パスワードを再入力してください" class="c-form" name="password_confirmation" type="password" value="">
                    <!-- 入力不備エラーメッセージ -->
                    @error('password_confirmation')
                    <p class="c-txt c-txt--err">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </li>
            </ul>
          </form>
        </div>
        <div class="p-formPage__foot p-formPage__foot--wide">
          <div class="p-btnWrap p-btnWrap--center">
            <a href="{{ route('register.terms') }}" class="c-btn c-btn--back">戻る</a>
            <button type="submit" class="c-btn c-btn--next" form="accountSubmitForm">ユーザー情報の入力へ</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection