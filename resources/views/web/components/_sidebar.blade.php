<div class="p-sidebar">
  <header class="p-sidebar__head">
    {{-- ロゴ --}}
    <a href="{{route('home')}}" class="p-sidebar__head__logo">
      <img
        class="normal"
        src="{{ asset('img/admin/logo/normal.svg')}}"
        width="160px"
        height="42px"
      >
      <img
        class="icon"
        src="{{ asset('img/admin/logo/icon.png')}}"
        width="24px"
        height="24px"
      >
    </a>
    {{-- 表示サイズ切り替え --}}
    <div class="p-sidebar__head__hide">
      <div class="p-gnav__head__switch" id="js-trigger__gnavSwitch">
        <img src="{{asset('img/admin/nav/burger.png')}}" width="24px" height="24px">
      </div>
    </div>
  </header>
  <aside class="p-sidebar__body">
    <div class="p-gnav">
      @foreach(config('const.global_navigation') as $key => $val)
      <div class="p-gnav__item {{ in_array(explode('.', Route::currentRouteName())[1], [explode('.', $val['path'])[1]], TRUE) ? 'is-active' : '' }}">
        <a
          href="{{ route($val['path'])}}"
          class="p-gnav__button"
        >
          @if(in_array(explode('.', Route::currentRouteName())[1], [explode('.', $val['path'])[1]], TRUE))
            <img
              src="{{ asset('img/admin/nav/'.$key.'_active.png')}}"
              width="24px"
              height="24px"
            >
          @else
            <img
              src="{{ asset('img/admin/nav/'.$key.'.png')}}"
              width="24px"
              height="24px"
            >
          @endif
          <label>
            {{$val['label']}}
          </label>
        </a>
      </div>
      @endforeach
    </div>
  </aside>
  <div class="p-sidebar__foot">
    {{-- プロフィール --}}
    <div class="p-profile" data-micromodal-trigger="modal-account-menu">
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
  </div>
</div>