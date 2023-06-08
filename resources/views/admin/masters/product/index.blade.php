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
                  <a href="" class="c-button__icon c-button__icon--import">製品情報CSV入力</a>
                  <a href="" class="c-button__icon__line c-button__icon--export">製品情報CSV出力</a>
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
            <div class="p-table p-table--product">
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
                    <div class="item">カラー登録数</div>
                  </th>
                </thead>
                <tbody>
                  @for ($i = 0; $i < 44; $i++)
                  <!-- 1人 -->
                  <tr data-href="{{ route('admin.masters.product.detail') }}">
                    <td class="item">
                      <img class="" src="{{ asset('img/web/product/airbuggy_coco_premire_newflame_blossom_front.png')}}" alt="" style="height: 40px;">
                    </td>
                    <td class="item">
                      COCO BRAKE EX FROM BIRTH ココブレーキEX フロムバース
                    </td>
                    <td class="item">
                      AIRBUGGY
                    </td>
                    <td class="item">
                      8
                    </td>
                  </tr>
                  @endfor
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
              @include('admin.masters.product._pagination')
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