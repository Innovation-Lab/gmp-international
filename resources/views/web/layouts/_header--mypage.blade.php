<div class="l-frame__head l-frame__head--mypage">
  <header class="p-header">
    <div class="p-header__logo">
      <img src="{{ asset('img/web/user/logo/GMP_logo.png')}}" alt="" width="45px">
    </div>
    <div class="p-header__btn">
      {!! Form::open(['method' => 'POST', 'route' => 'logout']) !!}
        {{-- <a href="{{ route('logout') }}" class="c-btn c-btn--ghost">ログアウト</a> --}}
        <button type="submit" name="button" class="c-btn c-btn--ghost">ログアウト</button>
      {!! Form::close() !!}
    </div>
  </header>
</div>