<div class="modal micromodal-slide" id="modal-alert" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1">
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <header class="modal__header">
        <h2 class="modal__title" id="modal-1-title">
          ログイン
        </h2>
        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      </header>
      <main class="modal__content" id="modal-1-content">
        この操作は取り消すことができません。<br>
        本当に削除しますか？
      </main>
      <footer class="modal__footer">
        <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">閉じる</button>
        <button class="modal__btn-alert" data-micromodal-close aria-label="Close this dialog window">削除する</button>
      </footer>
    </div>
  </div>
</div>

      <div class="p-login__auth">
        {{--!! Form::open(['method' => 'POST', 'route' => 'login']) !! --}}
        <form action="">
          <input type="email" name="email" placeholder="メールアドレス">
          <input type="password" name="password" placeholder="パスワード">
          @foreach ($errors->all() as $error)
            <div class="error">{{ $error }}</div>
          @endforeach
          <input type="submit" name="button" value="ログイン">
        </form>
        {{-- !! Form::close() !! --}}
        <a href="{{route('web.forgot.index')}}">パスワードを忘れた方はこちら</a>
      </div>