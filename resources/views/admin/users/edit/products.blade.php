@extends('admin.layouts.pages._default')
@section('title', 'ユーザー管理')
@section('content')
<div class="p-edit">
  <div class="l-edit">
    <div class="l-edit__head">
      {{-- 詳細ヘッド --}}
      @include('admin.users.edit._head')
    </div>
    <div class="l-edit__body">
      <div class="wrapper u-max--800">
        <div class="container">
          <div class="l-edit__body__inner single">
            {{-- メイン --}}
            <div class="l-edit__main">
              <div class="p-edit__main">
                {{-- ---------- ボックス（メインエリア） ---------- --}}
                <div class="p-edit__main__box">
                  <div class="p-edit__main__box__wrapper">
                    {{-- フォーム --}}
                    {!! Form::open(['method' => 'POST', 'route' => ['admin.users.update-products', $sales_product], 'class' => 'p-form', 'id' => 'salesProductSubmitForm']) !!}
                      <div class="p-edit__main__box__head">
                        <h3 class="p-edit__main__box__head__title">
                        登録製品情報
                        </h3>
                      </div>
                      <div class="l-grid__2 l-grid__2--xl" style="gap: 1.5rem 2rem;">
                        <div class="l-grid__item">
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  購入日
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::input('date', 'purchase_date', data_get($sales_product, 'purchase_date'), ['placeholder' => '0000/00/00']) !!}
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  ブランド名
                                </div>
                                <div class="p-formList__data">
                                  <select name="m_brand_id" class="select2">
                                    <option value="" hidden>選択してください</option>
                                    @foreach($brands as $k => $v)
                                    <option value="{{ $k }}" {{ old('m_brand_id', data_get($sales_product, 'mProduct.mBrand.id')) == $k ? 'selected' : '' }}>{{ $v }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  製品名
                                </div>
                                <div class="p-formList__data">
                                  <select name="m_product_id" class="select2">
                                    <option value="" hidden>選択してください</option>
                                    @foreach($products as $k => $v)
                                    <option value="{{ $k }}" {{ old('m_product_id', data_get($sales_product, 'm_product_id')) == $k ? 'selected' : '' }}>{{ $v }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                        <div class="l-grid__item">
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  カラー
                                </div>
                                <div class="p-formList__data">
                                  <select name="m_color_id" class="select2">
                                    <option value="" hidden>選択してください</option>
                                    @foreach($colors as $k => $v)
                                    <option value="{{ $k }}" {{ old('m_color_id', data_get($sales_product, 'm_color_id')) == $k ? 'selected' : '' }}>{{ $v }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            </li>
                            <!-- 上記以外のカラー選択時のフォーム -->
                            <li class="p-formList__item" style="display:none;">
                              <div class="p-formList__content p-formList__other open-other-text-input">
                                <div class="p-formList__label">上記以外のカラー</div>
                                <div class="p-formList__data">
                                  <input placeholder="例）赤" class="" name="products[1][other_color_name]" type="text" value="{{ old('products[1][other_color_name"]') }}">
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  シリアルナンバー
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::text('product_code', data_get($sales_product, 'product_code'), ['placeholder' => '例）GMP123456789']) !!}
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  購入店舗
                                </div>
                                <div class="p-formList__data">
                                  <select name="m_shop_id" class="select2">
                                    <option value="" hidden>選択してください</option>
                                    @foreach($shops as $k => $v)
                                    <option value="{{ $k }}" {{ old('m_shop_id', data_get($sales_product, 'm_shop_id')) == $k ? 'selected' : '' }}>{{ $v }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            </li>
                            <!-- 上記以外の店舗選択時のフォーム -->
                            <li class="p-formList__item" style="display:none;">
                              <div class="p-formList__content p-formList__other open-other-text-input">
                                <div class="p-formList__label">上記以外の店舗</div>
                                <div class="p-formList__data">
                                  <input placeholder="例）アカチャンホンポ○○店" class="required" name="other_shop_name" type="text" value="">
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                        <div class="l-grid__item" style="grid-column: 1/3;">
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  管理メモ
                                </div>
                                <div class="p-formList__content__data">
                                  <textarea name="memo" placeholder="修正対応や報告事項を記載してください。" class="c-scroll">{{ old('memo', data_get($sales_product, 'memo')) }}</textarea>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      {!! Form::close() !!}
                  </div>
                  <div class="p-edit__main__box__foot">
                    <a href="{{ url()->current() }}" class="c-button__reset">変更をリセット</a>
                    <button type="submit" form="salesProductSubmitForm" class="c-button">変更を反映する</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- 要素をページ下部に固定 --}}
    {{--
    <div class="l-edit__foot">
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