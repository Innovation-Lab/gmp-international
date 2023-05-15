@extends('web.layouts.pages._form')
@section('title', 'アカウント情報の入力')
@section('class', 'body_')
@section('content')
  <div class="l-frame__body">
    <div class="p-register">
      <div class="p-register__head">
        <div class="l-container"> 
          <div class="p-register__ttl">
            <p class="c-txt c-txt--ttl">新規会員登録</p>
          </div>
          <!-- ステップ1 -->
          <div class="p-register__step">
            <ul class="p-step">
              <li class="p-step__item p-step__item--current">
                <p class="c-txt c-txt--step">アカウント<br>情報の入力</p>
              </li>
              <li class="p-step__item">
                <p class="c-txt c-txt--step">ユーザー<br>情報の入力</p>
              </li>
              <li class="p-step__item">
                <p class="c-txt c-txt--step">購入製品<br>登録</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="p-register__body">
        <div class="l-container">
          <form method="POST" action="{{ route('register.store.account') }}" >
            @csrf
            <ul class="p-formList">
              <!-- メールアドレス -->
              <li class="p-formList__item">
                {{-- <form action=""> --}}
                  <div class="p-formList__content">
                    <div class="p-formList__label">
                      <p class="c-txt">メールアドレス　<span class="c-txt c-txt--must">必須</span></p>
                    </div>
                    <div class="p-formList__data">
                      <input placeholder="例）gmp-international@sample.com" class="c-form" name="email" type="email" value="{{ old('email') }}">
                    </div>
                    <!-- 入力不備エラーメッセージ -->
                    {{-- <p style="display: none;" class="c-txt c-txt--err">メールアドレスを半角英数字で入力してください</p> --}}
                    {{-- @if ($errors->has('email'))
                      <p class="c-txt c-txt--err">{{$errors->first('email')}}</p>
                    @endif --}}
                    @error('email')
                      <div class="c-txt c-txt--err">{{ $message }}</div>
                    @enderror
                  </div>
                {{-- </form> --}}
              </li>
              <!-- パスワード -->
              <li class="p-formList__item">
                {{-- <form action=""> --}}
                  <div class="p-formList__content">
                    <div class="p-formList__label">
                      <p class="c-txt">パスワード（半角英数字6〜10文字）　<span class="c-txt c-txt--must">必須</span></p>
                    </div>
                    <div class="p-formList__data">
                      <input placeholder="例）sample123" class="c-form" name="password" type="password" value="">
                    </div>
                    <!-- 入力不備エラーメッセージ -->
                    {{-- <p style="display: none;" class="c-txt c-txt--err">パスワードを半角英数字で入力してください</p> --}}
                    {{-- @if ($errors->has('password'))
                      <p class="c-txt c-txt--err">{{$errors->first('password')}}</p>
                    @endif --}}
                    @error('password')
                      <div class="c-txt c-txt--err">{{ $message }}</div>
                    @enderror
                  </div>
                {{-- </form> --}}
              </li>
              <!-- パスワード確認用 -->
              <li class="p-formList__item">
                {{-- <form action=""> --}}
                  <div class="p-formList__content">
                    <div class="p-formList__label">
                      <p class="c-txt">パスワード（確認用）　<span class="c-txt c-txt--must">必須</span></p>
                    </div>
                    <div class="p-formList__data">
                      <input placeholder="パスワードを再入力してください" class="c-form" name="password_confirmation" type="password" value="">
                    </div>
                    <!-- 入力不備エラーメッセージ -->
                    {{-- <p style="display: none;" class="c-txt c-txt--err">同じパスワードを入力してください</p> --}}
                    @error('password_confirmation')
                      <div class="c-txt c-txt--err">{{ $message }}</div>
                    @enderror
                  </div>
                {{-- </form> --}}
              </li>
            </ul>
            <div class="p-btnWrap">
              <a href="localhost:8100/login" class="c-btn c-btn--back">戻る</a>
              {{-- <a href="{{ route('register.user') }}" class="c-btn c-btn--next">ユーザー情報の入力へ</a> --}}
              <button type="submit" class="c-btn c-btn--next">ユーザー情報の入力へ</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection