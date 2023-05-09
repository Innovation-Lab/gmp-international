<div class="modal micromodal-slide" id="modal-profile-photo" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1">
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <header class="modal__header">
        <h2 class="modal__title" id="modal-1-title">
          プロフィール写真
        </h2>
        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      </header>
      <main class="modal__content" id="modal-1-content">
        <input type="file" id="profile-photo">
        <label for="profile-photo">
          <img src="{{asset('img/admin/sample/user_profile.png')}}">
        </label>
      </main>
      <footer class="modal__footer">
        <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">閉じる</button>
        <button class="modal__btn-primary"  data-micromodal-close>変更を反映する</button>
      </footer>
    </div>
  </div>
</div>