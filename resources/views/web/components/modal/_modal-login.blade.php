<div class="modal micromodal-slide" id="modal-login" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1">
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <header class="modal__header">
        <h2 class="modal__title" id="modal-1-title">
          ログイン
        </h2>
        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      </header>
      <main class="modal__content" id="modal-1-content">
        <div class="p-login__auth p-login__auth--modal">
          {!! Form::open(['method' => 'POST', 'route' => 'login']) !!}
            <input class="mailbox" type="email" name="email" placeholder="メールアドレス">
            <input class="passbox"type="password" name="password" placeholder="パスワード">
            @foreach ($errors->all() as $error)
              <div class="error">{{ $error }}</div>
            @endforeach
            <input class="login" type="submit" name="button" value="ログイン">
<<<<<<< HEAD
          </form>
          {{-- !! Form::close() !! --}}
          <a class="c-btn c-btn--text" href="{{route('web.reset.index')}}">パスワードを忘れた方はこちら</a>
=======
          {!! Form::close() !!}
          <a class="c-btn c-btn--text" href="{{route('password.request')}}">パスワードを忘れた方はこちら</a>
>>>>>>> 897abbd0db56c68252b229c47aa418e553743194
        </div>
      </main>
    </div>
  </div>
</div>
