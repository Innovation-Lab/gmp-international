<div class="p-dashboard__item">
  <div class="p-dashboard__head">
    <h3 class="p-dashboard__head__title">
      売上ランキング
    </h3>
  </div>
  <div class="p-dashboard__body" style="height: 520px;">
    <div class="p-dashboard__content">
      <div class="p-dashboard__ranking__sales">
        <ul class="p-dashboard__ranking__list">
          @foreach(config('staff.staff') as $key => $val)
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
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>