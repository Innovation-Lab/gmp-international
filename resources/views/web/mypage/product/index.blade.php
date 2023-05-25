@extends('web.layouts.pages._mypage')
@section('title', 'ホーム')
@section('class', 'body_')
@section('content')
<div class="l-frame__body">
  <div class="l-container">
    <div class="p-mypage">
      <div class="p-mypage__head">
        <div class="p-index__bar">
          <div class="p-index__ttl p-index__ttl--allItem">
            <a class="c-btn--img" href="{{ route('mypage.index') }}"><img class="c-btn--arrow" src="{{ asset('img/web/icon/back-arrow.png')}}" alt=""></a>
            <span>
              <p class="c-ttl c-ttl--xl">ALL ITEM</p>
              <p class="c-ttl">登録済み製品一覧</p>
            </span>
          </div>
          <!-- 追加登録ボタン -->
          <div class="p-index__btn">
            <a href="{{route('mypage.add')}}" class="c-btn c-btn--ghost c-btn--ghost--rd c-btn--innerIco  c-btn--innerIco--add">製品の追加登録</a>
          </div>
        </div>
      </div>
      <div class="p-mypage__body">
        <!-- 登録製品複数の場合 -->
        <ul class="p-card--list">
          
            @foreach ($sales_products as $sales_product)
              <li>
                <div class="p-card__item p-card__item--list">
                  <div class="p-card__info">
                    <!-- ブランド・製品名・カラー -->
                    <div class="p-card__mainData">
                      <div class="p-card__brand">
                        <p class="c-txt">{{ data_get($sales_product, 'mProduct.mBrand.name') }}</p>
                      </div>
                      <div class="p-card__product">
                        <p class="c-txt c-txt--md">{{ $sales_product->mProduct->name }}</p>
                        <p class="c-txt c-txt--sm">{{ $sales_product->mProduct->name_kana }}</p>
                      </div>
                      <div class="p-card__color">
                        <div class="c-colorBall"></div>
                        <p class="c-txt">{{ data_get($sales_product, 'mProduct.color')}}</p>
                      </div>
                    </div>
                    <div class="p-card__subData p-card__subData--list">
                      <!-- 購入日・シリアルナンバー・購入店舗 -->
                      <div class="p-card__purchase">
                        <p class="label c-txt--sm c-txt--sm--ghost">購入日</p>
                        <p class="data c-txt">{{ date('Y/m/d', strtotime(data_get($sales_product, 'purchase_date'))) }}</p>
                      </div>
                      <div class="p-card__serialNum">
                        <p class="label c-txt--sm c-txt--sm--ghost">シリアルNo.</p>
                        <p class="data c-txt">{{ data_get($sales_product, 'product_code') }}</p>
                      </div>
                      <div class="p-card__store">
                        <p class="label c-txt--sm c-txt--sm--ghost">購入店舗</p>
                        <p class="data c-txt">{{ data_get($sales_product, 'mShop.name') }}</p>
                      </div>
                    </div>
                  </div>
                  <div class="p-card__other">
                    <!-- 製品画像 -->
                    <div class="p-card__img">
                      <img src="{{asset('img/web/user/sample/product_sample.png')}}" width="60px" height="75px">
                    </div>
                    <!-- 編集ボタン -->
                    <button class="modalOpen c-btn c-btn--ghost c-btn--ghost--wh" data-micromodal-trigger="modal-edit--product" role="button">編集する</button>
                    </div>
                  </div>
              </li>
            @endforeach
        </ul>
      </div>
    </div>
    <!-- PCマイページのみ表示 -->
    <footer class="p-footer p-footer--mypage">
      <p class="c-txt--copyRight">Copyright©2023 GMP International Co., Ltd. All Right Reserved</p>
    </footer>
  </div>
</div>
{{-- 編集/削除 --}}
@include('web.mypage.product._modal-edit--product')
@include('web.mypage.product._modal-delete--product')
{{-- 登録ガイド --}}
@include('web.components.modal._modal-guide--color')
@include('web.components.modal._modal-guide--serial')
@include('web.components.modal._modal-guide--shop')

@endsection