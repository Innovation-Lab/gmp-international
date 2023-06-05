@extends('admin.layouts.pages._default')
@section('title', 'ユーザー管理')
@section('content')
<div class="p-index">
  <div class="l-index">
    <div class="l-index__head">
      <div class="p-index__head">
        <div class="wrapper">
          <div class="container">
            <div class="p-index__head__inner">
              <h2 class="p-index__head__title">ユーザー管理</h2>
              <div class="p-index__head__action">
                <div class="c-buttonWrap">
                  <a href="{{route('admin.users.create')}}" class="c-button__2">ユーザーを新規追加</a>
                  <a href="" class="c-button__icon c-button__icon--import">ユーザー情報CSV入力</a>
                  <a href="" class="c-button__icon__line c-button__icon--export">ユーザー情報CSV出力</a>
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
            @include('admin.components._filter')
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
                    <div class="item">名前/フリガナ</div>
                  </th>
                  <th>
                    <div class="item">電話番号/メール</div>
                  </th>
                  <th>
                    <div class="item">郵便番号/住所</div>
                  </th>
                  <th>
                    <div class="item">登録製品</div>
                  </th>
                  <th>
                    <div class="item">登録日時</div>
                  </th>
                </thead>
                <tbody>
                  @for ($i = 0; $i < 30; $i++)
                  <!-- 1人 -->
                  <tr data-href="{{ route('admin.users.detail') }}">
                    <td class="item">
                      山田 太郎
                      <span>ヤマダ タロウ</span>
                    </td>
                    <td class="item">
                      090-0001-0002<br>
                      user@sample.com
                    </td>
                    <td class="item">
                      <span>〒123-4567</span>
                      東京都 千代田区 紀尾井町1-1-1 紀尾井町ビル16F
                    </td>
                    <td class="item">
                      <span class="products" style="background-image:url('../img/web/product/airbuggy_coco_premire_newflame_blossom_front.png')">AIRBUGGY<br>COCO PREMIER FROM BIRTH<span class="number">+3</span></span>
                    </td>
                    <td class="item">
                      2023/04/04<br>
                      10:12
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
              @include('admin.components._pagination')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- ユーザー管理絞り込み検索モーダル --}}
@include('admin.users._modal-users-fillter')
@endsection