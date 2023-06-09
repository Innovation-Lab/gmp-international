<div class="p-tab">
  <ul class="p-tabList">
    <li class="p-tabList__item">
      <a href="{{route('admin.masters.brand')}}" class="p-tabList__label @if(Route::currentRouteName() == 'admin.masters.brand') is-active @endif">
        ブランドマスタ
        <span>{{ \App\Models\MBrand::query()->count() }}</span>
      </a>
    </li>
    <li class="p-tabList__item">
      <a href="{{route('admin.masters.product')}}" class="p-tabList__label @if(Route::currentRouteName() == 'admin.masters.product') is-active @endif">
        製品マスタ
        <span>{{ \App\Models\MProduct::query()->count() }}</span>
      </a>
    </li>
    <li class="p-tabList__item">
      <a href="{{route('admin.masters.store')}}" class="p-tabList__label @if(Route::currentRouteName() == 'admin.masters.store') is-active @endif">
        店舗マスタ
        <span>{{ \App\Models\MShop::query()->count() }}</span>
      </a>
    </li>
    <li class="p-tabList__item">
      <a href="{{route('admin.masters.color')}}" class="p-tabList__label @if(Route::currentRouteName() == 'admin.masters.color') is-active @endif">
        カラーマスタ
        <span>{{ \App\Models\MColor::query()->count() }}</span>
      </a>
    </li>
  </ul>
</div>