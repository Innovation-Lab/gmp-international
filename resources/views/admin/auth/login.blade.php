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
                src="{{ asset('img/admin/logo/GMP_logo.png')}}"
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
                <div class="p-login__body__text__body">
                  <ul class="p-formList">
                    <li class="p-formList__item">
                      <div class="p-formList__content">
                        <div class="p-formList__data">
                          {!! Form::email('email', null, ['placeholder' => 'メールアドレス']) !!}
                          @error('email')
                            <div class="error">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </li>
                    <li class="p-formList__item">
                      <div class="p-formList__content">
                        <div class="p-formList__data">
                          {!! Form::password('password', ['placeholder' => 'パスワード']) !!}
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
                    {{-- <li class="p-formList__item">
                      <div class="l-grid">
                        <div class="l-grid__item">
                          <input type="checkbox" id="keep-login">
                          <label for="keep-login">ログイン状態を保持</label>
                        </div>
                      </div>
                    </li> --}}
                  </ul>
                </div>
              {!! Form::close() !!}
            </div>
          </div>
          <div class="p-login__foot">
            <div class="copyright">Copyright©2023 GMP International Co., Ltd. All Right Reserved</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection