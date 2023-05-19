@extends('admin.layouts.pages._auth')
@section('title', 'ログイン')
@section('content')
<div class="p-login">
  <div class="wrapper">
    <div class="container">
      <div class="inner">
        <div class="p-login__item">
          <div class="p-login__head">
            <div class="p-login__head__logo">
              <img
                src="{{ asset('img/admin/logo/normal.png')}}"
                width="160px"
                height="42px"
              >
            </div>
          </div>
          <div class="p-login__body">
            {{-- テキスト --}}
            <div class="p-login__body__text">
              {{-- フォーム --}}
              {!! Form::open(['method' => 'POST', 'route' => 'admin.login', 'class' => 'p-form']) !!}
                @csrf
                <div class="p-login__body__text__head">
                  <h1 class="p-login__body__text__head__title">管理システムログイン</h1>
                </div>
                <div class="p-login__body__text__body">
                  <ul class="p-formList">
                    <li class="p-formList__item">
                      <div class="p-formList__content">
                        <div class="p-formList__label">
                          メールアドレス
                        </div>
                        <div class="p-formList__data">
                          {!! Form::email('email', null, ['placeholder' => 'メールアドレスを入力']) !!}
                          @error('email')
                            <div class="error">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </li>
                    <li class="p-formList__item">
                      <div class="p-formList__content">
                        <div class="p-formList__label">
                          パスワード
                        </div>
                        <div class="p-formList__data">
                          {!! Form::password('password', ['placeholder' => 'パスワードを入力']) !!}
                          {{-- <div class="error">メールアドレスとパスワードが一致しません</div> --}}
                          @error('password')
                            <div class="error">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </li>
                    <li class="p-formList__item">
                      <input type="submit" name="button" value="ログイン">
                    </li>
                    <li class="p-formList__item">
                      <div class="l-grid">
                        <div class="l-grid__item">
                          <input type="checkbox" id="keep-login">
                          <label for="keep-login">ログイン状態を保持</label>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              {!! Form::close() !!}
            </div>
            {{-- 画像 --}}
            <div class="p-login__body__image">
              <img src="{{asset('img/admin/auth/login.png')}}" width="720px" height="560px">
            </div>
          </div>
          <div class="p-login__foot">
            <div class="copyright">© 2022 Innovation Lab, Inc.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection