<div class="modal micromodal-slide" id="modal-alert-brand" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1">
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <header class="modal__header">
        <h2 class="modal__title" id="modal-1-title">
          注意事項
        </h2>
        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      </header>
      <main class="modal__content" id="modal-1-content">
        この操作は取り消すことができません。<br>
        本当に削除しますか？
      </main>
      {{ Form::open(['method' => 'POST', 'route' => ['admin.masters.brand.delete', $brand], 'id' => 'deleteBrandForm']) }}
      {{ Form::close() }}
      <footer class="modal__footer">
        <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">戻る</button>
        <button type="submit" form="deleteBrandForm" class="modal__btn-alert">削除する</button>
      </footer>
    </div>
  </div>
</div>
