<div class="p-dashboard__item">
  <div class="p-dashboard__head">
    <h3 class="p-dashboard__head__title">
      各製品登録数
    </h3>
  </div>
  <div class="p-dashboard__body" style="max-height: 530px;">
    <div class="p-dashboard__content">
      <div class="p-dashboard__ranking__sales">
        <ul class="p-dashboard__ranking__list">
          @foreach($sales_product_ranks as $product)
          <li class="p-dashboard__ranking__list__item">
            <div class="p-dashboard__ranking__list__image">
              <img src="{{asset('img/web/product/airbuggy_coco_premire_newflame_blossom_front.png')}}" width="40px" height="40px">
            </div>
            <div class="p-dashboard__ranking__list__text">
              <p class="title">{{ data_get($product, 'name', '---') }}</p>
              <p class="sub">{{ data_get($product, 'name_kana', '---') }}</p>
            </div>
            <div class="p-dashboard__ranking__list__data">
              <p class="amount">
                {{ number_format(data_get($product, 'member_count')) }}
              </p>
            </div>
          </li>
          @endforeach
          {{-- @foreach(config('staff.staff') as $key => $val)
          <li class="p-dashboard__ranking__list__item">
            <div class="p-dashboard__ranking__list__image">
              <img src="{{asset('img/admin/sample/profile.png')}}" width="40px" height="40px">
            </div>
            <div class="p-dashboard__ranking__list__text">
              <p class="title">{{$val['last-name'].''.$val['first-name']}}</p>
              <p class="sub">{{$val['sei'].''.$val['mei']}}</p>
            </div>
            <div class="p-dashboard__ranking__list__data">
              <p class="amount">
                {{'¥'.number_format(config('staff.sales')[$val['id']])}}
              </p>
            </div>
          </li>
          @endforeach --}}
        </ul>
      </div>
    </div>
  </div>
</div>