@extends('admin.layouts.pages._default')
@section('title', '店舗情報詳細')
@section('content')
<div class="p-detail">
  <div class="l-detail">
    <div class="l-detail__head">
      {{-- 詳細ヘッド --}}
      @include('admin.masters.store.detail._head')
    </div>
    <div class="l-detail__body">
      <div class="wrapper">
        <div class="container">
          <div class="l-detail__body__inner l-detail__body__inner--full">
            {{-- メイン --}}
            <div class="l-detail__full">
              <div class="p-detail__full">
                {{-- ---------- 登録製品情報 ---------- --}}
                <div class="p-detail__full__box">
                  <div class="p-detail__full__box__wrapper">
                    {{-- ---------- リスト ---------- --}}
                    <div class="p-list--product">
                      <div class="p-list__left">
                        <div class="p-list__img p-list__img--store" style="width: 200px;">
                          <img class="" src="{{ data_get($shop, 'main_image_url') }}" alt="">
                        </div>
                      </div>
                      <div class="p-list__right">
                        <div class="p-list__head">
                          <h3 class="p-detail__main__box__head__title">店舗情報</p>
                          <a href="{{route('admin.masters.store.edit', $shop)}}" class="c-button">編集</a>
                        </div>
                        <ul class="p-list">
                          @foreach([
                            '店舗名' => data_get($shop, 'name'),
                            '電話番号' => data_get($shop, 'tel'),
                            '住所' => 
                            '〒 '.format_zip_code(data_get($shop, 'zip_code')).'<br>
                            '.data_get($shop, 'full_address'),
                            '営業時間1<br>備考' => data_get($shop, 'week_business_hour').'<br>（'.data_get($shop, 'week_business_hour_memo').'）',
                            '営業時間2<br>備考' => data_get($shop, 'holiday_business_hour').'<br>（'.data_get($shop, 'holiday_business_hour_memo').'）',
                            ] as $key => $val)
                          <li class="p-list__item">
                            <div class="p-list__label">
                              {!! $key !!}
                            </div>
                            <div class="p-list__data">
                              {!! $val !!}
                            </div>
                            @endforeach
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection