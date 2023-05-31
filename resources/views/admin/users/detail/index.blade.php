@extends('admin.layouts.pages._default')
@section('title', 'ユーザー管理')
@section('content')
<div class="p-detail">
  <div class="l-detail">
    <div class="l-detail__head">
      {{-- 詳細ヘッド --}}
      @include('admin.users.detail._head')
    </div>
    <div class="l-detail__body">
      <div class="wrapper">
        <div class="container">
          <div class="l-detail__body__inner">
            {{-- サイドバー --}}
            <div class="l-detail__sidebar">
              @include('admin.users.detail._sidebar')
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
                    <a href="" class="c-button__2">登録製品を追加する</a>
                  </div>
                  <div class="p-detail__main__box__body">
                    {{-- ---------- リスト ---------- --}}
                    <ul class="p-product">
                      @for($list = 0; $list < 10; $list++)
                      <li class="p-product__item">
                        <div class="p-product__item__left">
                          <img src="{{asset('img/web/product/airbuggy_coco_premire_newflame_blossom_front.png')}}" width="64px" height="64px">
                        </div>
                        <div class="p-product__item__right">
                          <div class="p-product__item__head">
                            <div class="p-product__item__ttl">
                              <div class="item">AIRBUGGY</div>
                              <div class="item">COCO PREMIER FROM BIRTH</div>
                            </div>
                            <div class="p-product__item__other">
                              <a href="" class="c-button__2">編集</a>
                              <div class="item">BLOSSOM</div>
                            </div>
                          </div>
                          <ul class="p-product__item__body">
                            <li class="p-product__item__body__list">
                              <div class="p-product__label">
                                購入日
                              </div>
                              <div class="p-product__data">
                                2023/04/04
                              </div>
                            </li>
                            <li class="p-product__item__body__list">
                              <div class="p-product__label">
                                シリアルNo.
                              </div>
                              <div class="p-product__data">
                                GMP123456789
                              </div>
                            </li>
                            <li class="p-product__item__body__list">
                              <div class="p-product__label">
                                保証期間
                              </div>
                              <div class="p-product__data">
                                12ヶ月
                              </div>
                            </li>
                            <li class="p-product__item__body__list">
                              <div class="p-product__label">
                                購入店舗
                              </div>
                              <div class="p-product__data">
                                エアバギー代々木公園本店
                              </div>
                            </li>
                            <li class="p-product__item__body__list">
                              <div class="p-product__label">
                                管理メモ
                              </div>
                              <div class="p-product__data">
                                2024/04/04　タイヤ交換
                              </div>
                            </li>
                          </ul>
                        </div>
                      </li>
                      @endfor
                    </ul>
                  </div>
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