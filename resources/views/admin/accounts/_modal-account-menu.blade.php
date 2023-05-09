<div class="modal micromodal-slide" id="modal-account-menu" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1">
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <header class="modal__header">
        <h2 class="modal__title" id="modal-1-title">
          アカウントメニュー
        </h2>
        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      </header>
      <main class="modal__content" id="modal-1-content">
        {{-- プロフィール --}}
        <div class="p-profile">
          <div class="p-profile__image">
            <img
              src="{{ asset('img/admin/sample/profile.png')}}"
              width="48px"
              height="48px"
            >
          </div>
          <div class="p-profile__text">
            <p class="p-profile__text__title">田中 直人</p>
            <div class="p-profile__text__sub">
              h.tajima@soushin-lab.co.jp
            </div>
          </div>
        </div>
        {{-- メニュー --}}
        <div class="p-menu" style="margin: 1.5rem 0 0;">
          <ul class="p-menuList">
            <li class="p-menuList__item">
              <p class="p-menuList__button" data-micromodal-trigger="modal-account-edit" data-micromodal-close>プロフィールの変更</p>
            </li>
            <li class="p-menuList__item">
              <a href="{{route('admin.accounts.index')}}" class="p-menuList__button">アカウント管理</a>
            </li>
            <li class="p-menuList__item">
              <p class="p-menuList__button" data-micromodal-trigger="modal-account-logout" data-micromodal-close>ログアウト</p>
            </li>
            <li class="p-menuList__item">
              <p class="p-menuList__button" data-micromodal-close>メニューを閉じる</p>
            </li>
          </ul>
        </div>
      </main>
    </div>
  </div>
</div>