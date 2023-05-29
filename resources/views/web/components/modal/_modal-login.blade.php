<div class="modal micromodal-slide" id="modal-login" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1">
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <header class="modal__header">
        <h2 class="modal__title" id="modal-1-title">
          ログイン
        </h2>
        <button class="modal__close" aria-label="Close modal" onclick="$('#modal-login').hide()"></button>
      </header>
      <main class="modal__content" id="modal-1-content">
        <div class="p-login__auth p-login__auth--modal">
          {!! Form::open(['method' => 'POST', 'route' => 'login']) !!}
            <input class="mailbox" type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス"
             style=" @error('email') background: #FFE0E6; border: #C30E2E 1px solid; @enderror"
            >
            @error('email')
              <p class="c-txt c-txt--err" style="display: block; width: 100%; margin: 4px 0 0;">{{ $message }}</p>
            @enderror
            <input class="passbox" type="password" name="password" placeholder="パスワード"
             style=" @error('password') background: #FFE0E6; border: #C30E2E 1px solid; @enderror"
            >
            @error('password')
              <p class="c-txt c-txt--err" style="display: block; width: 100%; margin: 4px 0 0;">{{ $message }}</p>
            @enderror
            <input class="login" type="submit" name="button" value="ログイン">
          {!! Form::close() !!}
          <a class="c-btn--text" href="{{route('password.request')}}">パスワードを忘れた方はこちら</a>
        </div>
      </main>
    </div>
  </div>
</div>
