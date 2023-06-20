@extends('admin.layouts.pages._default')
@section('title', '登録製品管理')
@section('content')
<div class="p-index">
  <div class="l-index">
    <div class="l-index__head">
      <div class="p-index__head">
        <div class="wrapper">
          <div class="container">
            <div class="p-index__head__inner">
              <h2 class="p-index__head__title">登録製品管理</h2>
              <div class="p-index__head__action">
                <div class="c-buttonWrap">
                  <a href="{{route('admin.products.create')}}" class="c-button__2">製品を追加登録</a>
                  <a data-micromodal-trigger="modal-sales_product-import" class="c-button__icon c-button__icon--import">登録製品情報CSV入力</a>
                  <a href="{{ route('admin.csv.salesProduct.export') }}" class="c-button__icon__line c-button__icon--export">登録製品情報CSV出力</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="l-index__middle">
      <div class="wrapper">
        <div class="container">
          <div class="inner">
            {{-- ---------- フィルター ---------- --}}
            @include('admin.components._filter-product')
          </div>
        </div>
      </div>
    </div>
    <div class="l-index__body">
      <div class="wrapper">
        <div class="container">
          <div class="inner">
            {{-- ---------- テーブル ---------- --}}
            <div class="p-table">
              {{--検索結果なしデザイン--}}
              <table>
                <colgroup>
                  <col>
                  <col>
                  <col>
                  <col>
                  <col>
                  <col>
                </colgroup>
                <thead>
                  <th>
                    <div class="item">ブランド名</div>
                  </th>
                  <th>
                    <div class="item">製品名</div>
                  </th>
                  <th>
                    <div class="item">カラー</div>
                  </th>
                  <th>
                    <div class="item">シリアルナンバー</div>
                  </th>
                  <th>
                    <div class="item">購入店舗</div>
                  </th>
                  <th>
                    <div class="item">購入者</div>
                  </th>
                  {{--<th>
                    <div class="item">ステータス</div>
                  </th>--}}
                  {{--<th>
                    <div class="item">登録番号</div>
                  </th>--}}
                </thead>
                <tbody>
                  @forelse ($sales_products as $product)
                    <tr data-href="{{ route('admin.products.detail', $product) }}">
                      <td class="item">
                        {{ data_get($product, 'mProduct.mBrand.name') }}
                      </td>
                      <td class="item">
                        {{ data_get($product, 'mProduct.name') }}
                      </td>
                      <td class="item">
                        @if(data_get($product, 'mColor.name'))
                          <span>{{ data_get($product, 'mColor.name') }}</span>
                          {{ data_get($product, 'mColor.alphabet_name', data_get($product, 'other_color_name')) }}
                        @else
                          <div class="noProducts">未登録</div>
                        @endif
                      </td>
                      <td class="item">
                        @if(data_get($product, 'product_code'))
                          {{ data_get($product, 'product_code') }}
                        @else
                          <div class="noProducts">未登録</div>
                        @endif
                      </td>
                      <td class="item">
                        @if(data_get($product, 'mShop.name', data_get($product, 'other_shop_name')))
                          {{ data_get($product, 'mShop.name', data_get($product, 'other_shop_name')) }}
                        @else
                          <div class="noProducts">未登録</div>
                        @endif
                      </td>
                      <td class="item">
                        @if(data_get($product, 'user.full_name'))
                          {{ data_get($product, 'user.full_name') }}
                        @else
                          <div class="noProducts">退会ユーザー</div>
                        @endif
                      </td>
                      {{--<td class="item">
                        <div>
                          <span class="status status--yet">登録済み</span>
                          <span class="status status--not" style="display: none;">未登録</span>
                        </div>

                      </td>--}}
                      {{--<td class="item">
                        AB01-097M-HIUA
                      </td>--}}
                    </tr>
                  @empty
                    <tr><td style="border-bottom: none;">データはありません。</td></tr>
                  @endforelse
                </tbody>
                <tfoot style="display: none;">
                  <td>
                    <div class="data">
                    </div>
                  </td>
                  <td>
                    <div class="data">
                    </div>
                  </td>
                  <td>
                    <div class="data">
                    </div>
                  </td>
                  <td>
                    <div class="data">
                    </div>
                  </td>
                  <td>
                    <div class="data">
                    </div>
                  </td>
                  <td>
                    <div class="data">
                    </div>
                  </td>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="l-index__foot">
            <div class="p-index__foot">
              {{-- ページネーション --}}
              @include('admin.components._pagination', [
                  'paginate' => $sales_products
              ])
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- 登録製品管理絞り込み検索モーダル --}}
@include('admin.products._modal-products-fillter')
@endsection
