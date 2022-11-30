<nav class="p-sidebar">
  @foreach([
    'dashboard'=> [
      'label' => 'ダッシュボード',
      'path' => 'admin.dashboard',
    ],
    'item'=> [
      'label' => '商品',
      'path' => 'admin.item',
    ],
    'sales'=> [
      'label' => '売上',
      'path' => 'admin.sales',
    ],
    'user'=> [
      'label' => 'ユーザー',
      'path' => 'admin.user',
    ],
    'news'=> [
      'label' => 'お知らせ',
      'path' => 'admin.news',
    ],
    'contact'=> [
      'label' => 'お問い合わせ',
      'path' => 'admin.contact',
    ],
  ] as $key => $val)
    <a
      href="{{route($val['path'])}}"
      class="
        p-sidebar__btn
        {{ in_array(explode('.', Route::currentRouteName())[1], [explode('.', $val['path'])[1]], TRUE) ? 'is-active' : '' }}
      "
    >
      <svg class="icon">
        <use xlink:href="{{'#'.$key}}"/>
      </svg>
      {{$val['label']}}
    </a>
  @endforeach
  <div class="p-sidebar__ttl">
    設定
  </div>
  @foreach([
    'master'=> [
      'label' => 'マスタ',
      'path' => 'admin.master',
    ],
  ] as $key => $val)
    <a
      href="{{route($val['path'])}}"
      class="
        p-sidebar__btn
        {{ in_array(explode('.', Route::currentRouteName())[1], [explode('.', $val['path'])[1]], TRUE) ? 'is-active' : '' }}
      "
    >
      <svg class="icon">
        <use xlink:href="{{'#'.$key}}"/>
      </svg>
      {{$val['label']}}
    </a>
  @endforeach
</nav>