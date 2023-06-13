@extends('admin.layouts.pages._default')
@section('title', '登録製品詳細')
@section('content')
<div class="p-detail">
  <div class="l-detail">
    <div class="l-detail__head">
      {{-- 詳細ヘッド --}}
      @include('admin.products.detail._head')
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
                        <div class="p-list__img" style="width: 200px;">
                          <img class="" src="{{ data_get($product, 'mProduct.first_color_url.url', data_get($product, 'mProduct.main_image_url')) }}" alt="">
                        </div>
                        {{-- <div class="p-list__status p-list__status--registered">
                          <span class="status">登録済み</span>
                        </div>
                        <div class="p-list__status p-list__status--notregistered" style="display: none;">
                          <span class="status">未登録</span>
                        </div> --}}
                      </div>
                      <div class="p-list__right">
                        <div class="p-list__head">
                          <h3 class="p-detail__main__box__head__title">登録製品情報</p>
                          <a href="{{route('admin.products.edit', $product)}}" class="c-button">編集</a>
                        </div>
                        <ul class="p-list">
                          @foreach([
                            'ブランド名' => data_get($product, 'mProduct.mBrand.name'),
                            '製品名' => data_get($product, 'mProduct.name'),
                            'カラー' => data_get($product, 'mColor.alphabet_name') ? data_get($product, 'mColor.alphabet_name') : data_get($product, 'other_color_name', '未登録'),
                            '購入日' => formatYmdSlash(data_get($product, 'purchase_date')),
                            '購入店舗' => data_get($product, 'mShop.name') ? data_get($product, 'mShop.name') : data_get($product, 'other_shop_name', '未登録'),
                            'シリアルNo.' => data_get($product, 'product_code', '未登録'),
                            '管理メモ' => data_get($product, 'memo'),
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
            {{-- メイン --}}
            <div class="l-detail__full">
              <div class="p-detail__full">
                {{-- ---------- 登録ユーザー情報 ---------- --}}
                <div class="p-detail__full__box">
                  @if ($user)
                    <div class="p-detail__full__box__wrapper">
                      {{-- ---------- 登録済み ---------- --}}
                      <div class="p-list__head">
                        <h3 class="p-detail__main__box__head__title">登録ユーザー情報</p>
                        <a href="{{ route('admin.users.detail', $user) }}" class="c-button__2">登録ユーザーへ</a>
                      </div>
                      <ul class="p-list p-list--user">
                        @foreach([
                          '会員番号' => 'No.000000123456',
                          '名前<span>（フリガナ）</span>' => data_get($user, 'full_name') . '<span>（' . data_get($user, 'full_name_kana') . '）</span>',
                          '電話番号' => data_get($user, 'formatted_tel'),
                          'メールアドレス' => data_get($user, 'email'),
                          '住所' => '〒' . data_get($user, 'zip_code') . '<br>' . data_get($user, 'full_address') . '<br>' ,
                          '新着情報、お得情報' => data_get($user, 'string_dm'),
                          'アカウント作成日時' => formatYmdSlash(data_get($user, 'created_at')) . '　' . formatHiSlash(data_get($user, 'created_at')),
                          '管理メモ' => data_get($user, 'memo'),
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
                  @else
                    <div class="p-detail__full__box__wrapper">
                      {{-- ---------- 未登録 ---------- --}}
                      <div class="p-list__head p-list__head--center">
                        <h3 class="p-detail__main__box__head__title center">ユーザー情報は登録されていません</p>
                      </div>
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- ユーザー写真 --}}
{{--@include('users._modal-users-photo')--}}
{{-- アラートモーダル --}}
@include('admin.components.modal._modal-alert-product')
<script>
  // (function() {
  //   const table = $('table');
  //   const thLength = table.find('th').length;
  //   table.css('grid-template-columns','repeat(' + thLength + ', minmax(max-content, 1fr))')
  // })();
</script>
@endsection