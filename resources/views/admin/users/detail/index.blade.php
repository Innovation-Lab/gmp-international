@extends('admin.layouts.pages._default')
@section('title', 'ユーザー管理')
@section('content')
<div class="p-detail p-detail--user noBorder">
  <div class="l-detail">
    <div class="l-detail__head">
      {{-- 詳細ヘッド --}}
      @include('admin.users.detail._head', $user)
    </div>
    <div class="l-detail__body">
      <div class="wrapper">
        <div class="container">
          <div class="l-detail__body__inner">
            {{-- サイドバー --}}
            <div class="l-detail__sidebar">
              @include('admin.users.detail._sidebar', $user)
            </div>
            {{-- メイン --}}
            <div class="l-detail__main">
              <div class="p-detail__main">
                {{-- ---------- ボックス（メインエリア） ---------- --}}
                <div class="p-detail__main__box">
                  <div class="p-detail__sidebar__box__head">
                    <h3 class="p-detail__sidebar__box__head__title">
                      登録製品情報
                    </h3>
                    <a href="{{route('admin.users.create-products')}}" class="c-textButton__icon c-textButton--gray">
                      <svg class="icon"><use href="#add"/></svg>
                      登録製品を追加する
                    </a>
                  </div>
                  @foreach($sales_products as $sales_product)
                    <div class="p-detail__main__box__body">
                      <div class="p-productScroll c-scroll">
                        <ul class="p-product p-product--list">
                          <li class="p-product__item">
                            <div class="p-product__item__left">
                              <img src="{{asset('img/web/product/airbuggy_coco_premire_newflame_blossom_front.png')}}" width="64px" height="64px">
                            </div>
                            <div class="p-product__item__right">
                              <div class="p-product__item__head">
                                <div class="p-product__item__ttl">
                                  <div class="item">{{ data_get($sales_product,'mProduct.mBrand.name') }}</div>
                                  <div class="item">{{ data_get($sales_product,'mProduct.name') }}</div>
                                </div>
                                <div class="p-product__item__other">
                                  <!-- <a href="
                                    {{-- {{route('admin.users.edit-products')}} --}}
                                    " class="c-textButton">編集</a> -->
                                  <a href="{{route('admin.users.edit-products', $sales_product)}}" class="c-button">編集</a>
                                <div class="color">
                                {{ data_get($sales_product,'mColor.alphabet_name') }}
                              </div>
                              </div>
                            </div>
                            <ul class="p-product__item__body">
                              <li class="p-product__item__body__list">
                                <div class="p-product__label">
                                  シリアルNo.
                                </div>
                                <div class="p-product__data">
                                  {{ data_get($sales_product, 'product_code') }}
                                </div>
                              </li>
                              <li class="p-product__item__body__list auto">
                                <div class="p-product__label">
                                  購入日
                                </div>
                                <div class="p-product__data">
                                  {{ formatYmdSlash(data_get($sales_product, 'purchase_date')) }}
                                </div>
                              </li>
                              <li class="p-product__item__body__list">
                                <div class="p-product__label">
                                  保証期間
                                </div>
                                <div class="p-product__data">
                                  {{ data_get($sales_product, 'warranty_period') }}
                                </div>
                              </li>
                              <li class="p-product__item__body__list large">
                                <div class="p-product__label">
                                  購入店舗
                                </div>
                                <div class="p-product__data">
                                  {{ data_get($sales_product, 'select_shop_name') }}
                                </div>
                              </li>
                              <li class="p-product__item__body__list large">
                                <div class="p-product__label">
                                  管理メモ
                                </div>
                                <div class="p-product__data">
                                  {{ data_get($user, 'memo') }}
                                </div>
                              </li>
                            </ul>
                          </div>
                        </li>
                        </ul>
                        {{-- ---------- リスト ---------- --}}
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- 要素をページ下部に固定 --}}
    {{--
    <div class="l-detail__foot">
      <div class="p-detail__foot">
        要素をページ下部に固定
      </div>
    </div>
    --}}
  </div>
</div>
{{-- ユーザー写真 --}}
@include('admin.users._modal-users-photo')
<script>
  // (function() {
  //   const table = $('table');
  //   const thLength = table.find('th').length;
  //   table.css('grid-template-columns','repeat(' + thLength + ', minmax(max-content, 1fr))')
  // })();
</script>
@endsection