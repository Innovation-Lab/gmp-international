<div class="p-sidebar">
  <div class="l-container">
    <header class="p-sidebar__head">
      <div class="p-sidebar__logo">  
        <a href="{{ route('mypage.index') }}" class="c-link"><img src="{{ asset('img/web/user/logo/GMP_logo.png')}}" alt="" style="width: 45px;"></a>
      </div>
    </header>
    <div class="p-sidebar__body">
      <div class="p-dashboard">
        <div class="p-dashboard__userName">
          <p class="c-txt c-txt--md">{{ $user->full_name }}<span class="c-txt--sm"> 様</span></p>
        </div>
        <ul class="p-dashboard__list">
          <li class="p-dashboard__item"><a href="{{route('mypage.index')}}" class="c-txt">マイページ</a></li>
          <li class="p-dashboard__item"><a href="{{route('mypage.product')}}" class="c-txt">登録済み製品一覧</a></li>
          <li class="p-dashboard__item"><a href="{{route('mypage.user')}}" class="c-txt">ユーザー情報変更</a></li>
          <li class="p-dashboard__item"><a href="{{route('mypage.account')}}" class="c-txt">アカウント情報変更</a></li>
        </ul>
      </div>
    </div>
    <div class="p-sidebar__foot">
      <div class="p-support">
        <div class="p-support__ttl">
          <p class="c-ttl">GMPサポートデスク</p>
        </div>
        <div class="p-support__data">
          <p class="c-txt c-txt--gr">営業時間</p>
          <p class="c-txt c-txt--md">平日 10:00〜17:00</p>
        </div>
        <div class="p-support__tel">
          <p class="c-txt c-txt--gr">ベビー用品</p>
          <a href="tel:0120-178-363" class="c-txt c-txt--lg c-txt--lg--rd">0120-178-363</a>
        </div>
        <div class="p-support__tel">
          <p class="c-txt c-txt--gr">ペット用品</p>
          <a href="tel:0120-98-1511" class="c-txt c-txt--lg c-txt--lg--rd">0120-98-1511</a>
        </div>
      </div>
    </div>
    <div class="p-sidebar__logout">
      {!! Form::open(['method' => 'POST', 'route' => 'logout']) !!}
        {{-- <p class="c-txt c-txt--md c-txt--md--gr">ログアウト</p> --}}
        <input type="submit" name="button" value="ログアウト" class="c-txt c-txt--md c-txt--md--gr">
      {!! Form::close() !!}
    </div>
  </div>
</div>