<div class="p-dashboard__item">
  <div class="p-dashboard__head">
    <h3 class="p-dashboard__head__title">
      各製品登録数
    </h3>
  </div>
  <div class="p-dashboard__body" style="height: 560px;">
    <div class="p-dashboard__content">
      <div class="p-dashboard__ranking__sales">
        <ul class="p-dashboard__ranking__list">
          @for($i = 0; $i < 10; $i++)
          <li class="p-dashboard__ranking__list__item">
            <div class="p-dashboard__ranking__list__image">
              <img src="{{asset('img/web/product/airbuggy_coco_premire_newflame_blossom_front.png')}}" width="40px" height="40px">
            </div>
            <div class="p-dashboard__ranking__list__text">
              <p class="title">COCO PREMIER FROM BIRTH</p>
              <p class="sub">ココプレミア フロムバース</p>
            </div>
            <div class="p-dashboard__ranking__list__data">
              <p class="amount">
                12,340
              </p>
            </div>
          </li>
          @endfor
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