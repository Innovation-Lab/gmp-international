<nav class="p-page__side--sm is-top">
  <div class="p-ttl u-mt--0">
    <h3 class="c-ttl--xs">アカウント管理</h3>
  </div>
  @foreach([
    'profile'=> [
      'label' => 'プロフィール',
      'path' => 'admin.account.profile',
    ],
    'mail'=> [
      'label' => 'メールアドレス変更',
      'path' => 'admin.account.mail',
    ],
    'password'=> [
      'label' => 'パスワード変更',
      'path' => 'admin.account.password',
    ],
    'logout'=> [
      'label' => 'ログアウト',
      'path' => 'admin.auth.login',
    ],
  ] as $key => $val)
    <a
      href="{{route($val['path'])}}"
      class="
      c-tab
        {{ in_array(explode('.', Route::currentRouteName())[2], [explode('.', $val['path'])[2]], TRUE) ? 'is-active' : '' }}
      "
    >
      {{$val['label']}}
    </a>
  @endforeach
  <div class="c-div--md"></div>
  <div class="p-ttl">
    <h3 class="c-ttl--xs">管理者権限</h3>
  </div>
  @foreach([
    'account'=> [
      'label' => 'アカウント一覧',
      'path' => 'admin.account.admin.index',
    ],
  ] as $key => $val)
    <a
      href="{{route($val['path'])}}"
      class="
        c-tab
        {{ in_array(explode('.', Route::currentRouteName())[2], [explode('.', $val['path'])[2]], TRUE) ? 'is-active' : '' }}
      "
    >
      {{$val['label']}}
    </a>
  @endforeach
</nav>