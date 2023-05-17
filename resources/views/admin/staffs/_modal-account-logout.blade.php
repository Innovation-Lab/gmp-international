<div class="modal micromodal-slide" id="modal-account-logout" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1">
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <header class="modal__header">
        <h2 class="modal__title" id="modal-1-title">
          ログアウト
        </h2>
        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      </header>
      <main class="modal__content" id="modal-1-content">
        <p>
          ログアウトしますか？
        </p>
      </main>
      <footer class="modal__footer">
        <button 
          class="modal__btn"
          data-micromodal-trigger="modal-account-menu"
          data-micromodal-close
          aria-label="Close this dialog window"
        >戻る</button>
        <button onclick="window.location='{{ route("admin.auth.login") }}'" class="modal__btn-primary">ログアウトする</button>
      </footer>
    </div>
  </div>
</div>