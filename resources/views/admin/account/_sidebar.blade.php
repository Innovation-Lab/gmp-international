<nav class="p-main__sidebar--sm">
  <div class="p-main__sidebar__ttl">
    アカウント管理
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
  ] as $key => $val)
    <a
      href="{{route($val['path'])}}"
      class="
        p-main__sidebar__btn
        {{ in_array(explode('.', Route::currentRouteName())[2], [explode('.', $val['path'])[2]], TRUE) ? 'is-active' : '' }}
      "
    >
      {{$val['label']}}
    </a>
  @endforeach
  <div class="p-main__sidebar__divider"></div>
  <div class="p-main__sidebar__ttl">
    管理者権限
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
        p-main__sidebar__btn
        {{ in_array(explode('.', Route::currentRouteName())[2], [explode('.', $val['path'])[2]], TRUE) ? 'is-active' : '' }}
      "
    >
      {{$val['label']}}
    </a>
  @endforeach
</nav>