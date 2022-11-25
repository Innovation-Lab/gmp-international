<div class="p-main__head">
  <div class="p-main__head__main">
    <div class="p-main__head__main__txt">
      {{$main}}
    </div>
    <div class="p-main__head__main__act">
      <div class="p-main__account">
        <a href="{{ route('admin.account.profile') }}" class="p-main__account__user">
          <span>
            <svg class="icon">
              <use xlink:href="#user"/>
            </svg>
          </span>
          <p class="p-main__account__name">
            sample@example.com
          </p>
        </a>
        <div class="p-main__account__act" id="js-accordion">
          <button
            class="p-main__account__act__btn"
            id="p-main__account__act__btn"
          >
            <svg class="icon">
              <use xlink:href="#dot"/>
            </svg>
          </button>
          <div
            class="p-main__account__act__menu"
            id="p-main__account__act__menu"
          >
            <a href="{{ route('admin.auth.login') }}" class="c-btn--sm">ログアウト</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @isset($sub)
    {{$sub}}
  @endisset
</div>