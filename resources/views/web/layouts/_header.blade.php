<div class="c-loading" id="js-target__loading"></div>
<!-- ローディング入れる！ -->
<header class="p-header">
  <div class="p-header__text">
    <h2 class="p-header__text__title">
      @if( Request::routeIs('home'))
        <div class="c-image">
          <img src="{{asset('img/admin/menu/menu-dashboard.png')}}">
        </div>
        ダッシュボード
      @elseif( Request::routeIs('user.index'))
        <div class="c-image">
          <img src="{{asset('img/admin/menu/menu-user.png')}}">
        </div>
        顧客管理
      @elseif( Request::routeIs('user.detail'))
        <a href="{{route('user.index')}}" class="c-link c-link--back">顧客一覧</a>
      @elseif( Request::routeIs('sales.index'))
        <div class="c-image">
          <img src="{{asset('img/admin/menu/menu-sales.png')}}">
        </div>
        売掛・売上管理
      @elseif( Request::routeIs('sales.detail'))
        <a href="{{route('sales.index')}}" class="c-link c-link--back">売掛・売り上げ一覧</a>
      @elseif( Request::routeIs('invoice.index'))
        <div class="c-image">
          <img src="{{asset('img/admin/menu/menu-invoice.png')}}">
        </div>
        請求管理
      @elseif( Request::routeIs('invoice.detail'))
        <a href="{{route('invoice.index')}}" class="c-link c-link--back">請求一覧</a>
      @else
      <a href="{{route('home')}}">
        <img src="{{asset('img/admin/logo/logo.svg')}}" width="120" height="28">
      </a>
      @endif
    </h2>
  </div>
  <div class="p-header__action">
    @if( Request::routeIs('user.index'))
      <a href="{{route('user.new')}}" class="c-button c-button--1">顧客を新規追加</a>
    @elseif( Request::routeIs('sales.index'))
      <a href="{{route('sales.new')}}" class="c-button c-button--1">売掛・売上を新規追加</a>
    @else
    @endif
  </div>
  <div class="p-header__account">
    <a href="{{route('auth.login')}}" class="p-header__account__name">管理者</a>
  </div>
</header>