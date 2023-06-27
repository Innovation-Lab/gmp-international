@extends('admin.layouts.pages._default')
@section('title', '製品マスタ')
@section('content')
<div class="p-index">
  <div class="l-index l-index--gray">
    <div class="l-index__head">
      <div class="p-index__head">
        <div class="wrapper">
          <div class="container">
            <div class="p-index__head__inner">
              <h2 class="p-index__head__title">マスタ管理</h2>
              <div class="p-index__head__action">
                <div class="c-buttonWrap">
                  <a href="{{route('admin.masters.product.create')}}" class="c-button__2">製品を新規追加</a>
                  <a data-micromodal-trigger="modal-product-import" class="c-button__icon c-button__icon--import">製品情報CSV入力</a>
                  <a href="{{ route('admin.csv.product.export') }}" class="c-button__icon__line c-button__icon--export">製品情報CSV出力</a>
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
            {{-- ---------- タブ ---------- --}}
            @include('admin.masters._tab')
            {{-- ---------- フィルター ---------- --}}
            @include('admin.masters.product._filter')
          </div>
        </div>
      </div>
    </div>
    <div class="l-index__body">
      <div class="wrapper">
        <div class="container">
          <div class="inner">
            {{-- ---------- テーブル ---------- --}}
            <div class="p-table p-table--short">
              {{--検索結果なしデザイン--}}
              <div class="noResult" style="display: none;">検索結果がありません。</div>
              <table>
                <!-- <colgroup>
                  <col width=50>
                  <col width=400>
                  <col width=200>
                  <col width=80>
                  <col>
                </colgroup> -->
                <thead>
                  <th>
                    <div class="item">製品画像</div>
                  </th>
                  <th>
                    <div class="item">製品名</div>
                  </th>
                  <th>
                    <div class="item">ブランド名</div>
                  </th>
                  <th>
                    <div class="item">登録カラー数</div>
                  </th>
               
                </thead>
                <tbody>
                  @forelse ($products as $product)
                  <!-- 1人 -->
                  <tr data-href="{{ route('admin.masters.product.detail', $product) }}">
                    <td class="item">
                      <img class="" src="{{ data_get($product, 'first_color_ball_with_name.url', asset('img/admin/noImage/product.png')) }}" alt="" style="height: 40px;">
                    </td>
                    <td class="item">
                      {{ data_get($product, 'name') }} {{ data_get($product, 'name_kana') }}
                    </td>
                    <td class="item">
                      {{ data_get($product, 'mBrand.name') }}
                    </td>
                    <td class="item">
                      {{ data_get($product, 'color_count') }}
                    </td>
                  </tr>
                  @empty
                    <tr><td colspan=4 class="noResult" style="border-bottom: none;">データはありません。</td></tr>
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
                  'paginate' => $products,
              ])
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- 製品マスタ絞り込み検索モーダル --}}
@include('admin.masters.product._modal-products-fillter')
@endsection