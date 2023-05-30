<div class="modal micromodal-slide" id="modal-develop" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1">
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <header class="modal__header">
        <h2 class="modal__title" id="modal-1-title">
          開発用チートシート
        </h2>
        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      </header>
      <main class="modal__content" id="modal-1-content">
        {{-- ブレイクポイント --}}
        <p class="c-text__1">ブレイクポイント</p>
        "sm":  min-width: 576px<br>
        "md":  min-width: 768px<br>
        "lg":  min-width: 992px<br>
        "xl":  min-width: 1200px<br>
        "xxl": min-width: 1366px
      </main>
      <footer class="modal__footer">
        <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">閉じる</button>
      </footer>
    </div>
  </div>
</div>
<style>
  .develop {
    display: grid;
    place-items: center;
    width: 2rem;
    height: 2rem;
    background-color: rgba(255,255,255,.2);
    position: fixed;
    top: 0;
    right: 0;
    z-index: 10000;
  }
</style>