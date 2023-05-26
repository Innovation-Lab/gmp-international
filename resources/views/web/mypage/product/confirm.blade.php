@extends('web.layouts.pages._form')
@section('title', 'ユーザー情報の入力')
@section('class', 'body_confirm')
@section('content')
  <div class="l-frame__body">
    <div class="p-formPage">
      <div class="p-formPage__head">
        <div class="l-container">
          <div class="p-formPage__head__ttl">
            <p class="c-ttl">製品の追加登録</p>
          </div>
        </div>
      </div>
      <div class="l-container">
        <div class="p-formPage__body p-formPage__body--thin">
          <div class="l-stack">
            <div class="l-stack__item">
              <p class="c-description">
                入力内容をご確認の上、登録してください。
              </p>
            </div>
            <div class="l-stack__item">
              <ul class="p-formList p-formList--confirm">
                <!-- 購入製品 -->
                <li class="p-formList__item">
                  <div class="p-formList__content">
                    <form method="POST" action="{{ route('mypage.store') }}" id="salesProductSubmitForm">
                      @csrf
                      <div class="l-stack">
                        <div class="l-stack__item">
                          <div class="p-formList__label">
                            <p class="c-txt">購入日</p>
                          </div>
                          <div class="p-formList__data">
                            <p class="c-txt">{{ data_get($product, 'purchase_date') }}</p>
                          </div>
                        </div>
                        <div class="l-stack__item">
                          <div class="p-formList__label">
                            <p class="c-txt">ブランド名</p>
                          </div>
                          <div class="p-formList__data">
                            <p class="c-txt">{{ data_get($product, 'm_brand_id') ? $brands[data_get($product, 'm_brand_id')] : '指定なし' }}</p>
                          </div>
                        </div>
                        <div class="l-stack__item">
                          <div class="p-formList__label">
                            <p class="c-txt">製品名</p>
                          </div>
                          <div class="p-formList__data">
                            <p class="c-txt">{{ data_get($product, 'm_product_id') ? $products[data_get($product, 'm_product_id')] : '指定なし' }}</p>
                          </div>
                        </div>
                        <div class="l-stack__item">
                          <div class="p-formList__label">
                            <p class="c-txt">カラー</p>
                          </div>
                          <div class="p-formList__data">
                            <p class="c-txt">{{ data_get($product, 'm_color_id') && data_get($product, 'm_color_id') != '9999999' ? $colors[data_get($product, 'm_color_id')] : (data_get($product, 'other_color_name') ? data_get($product, 'other_color_name') : '選択されていません') }}</p>
                          </div>
                        </div>
                        <div class="l-stack__item">
                          <div class="p-formList__label">
                            <p class="c-txt">シリアルナンバー</p>
                          </div>
                          <div class="p-formList__data">
                            <p class="c-txt">{{ data_get($product, 'product_code') ? data_get($product, 'product_code') : '入力されていません' }}</p>
                          </div>
                        </div>
                        <div class="l-stack__item">
                          <div class="p-formList__label">
                            <p class="c-txt">購入店舗</p>
                          </div>
                          <div class="p-formList__data">
                            <p class="c-txt">{{ data_get($product, 'm_shop_id') && data_get($product, 'm_shop_id') != '9999999' ? $shops[data_get($product, 'm_shop_id')] : (data_get($product, 'other_shop_name') ? data_get($product, 'other_shop_name') : '選択されていません') }}</p>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="p-formPage__foot">
          <div class="p-btnWrap p-btnWrap--center">
              <a href="{{route('mypage.add')}}" class="c-btn c-btn--back">修正する</a>
              <button type="submit" form="salesProductSubmitForm" class="c-btn c-btn--next">登録する</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection