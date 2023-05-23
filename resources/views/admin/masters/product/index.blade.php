@extends('admin.layouts.pages._default')
@section('title', 'ユーザー管理')
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
                  <div class="c-button__2" data-micromodal-trigger="modal-users-create">製品を新規追加</div>
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
            <div class="p-table">
              <table>
                <colgroup>
                  <col width=400>
                  <col width=200>
                  <col width=80>
                  <col>
                </colgroup>
                <thead>
                  <th>
                    <div class="item">製品名</div>
                  </th>
                  <th>
                    <div class="item">ブランド名</div>
                  </th>
                  <th>
                    <div class="item">カラー登録数</div>
                  </th>
                  <th>
                    <div class="item"></div>
                  </th>
                </thead>
                <tbody>
                  @for ($i = 0; $i < 44; $i++)
                  <!-- 1人 -->
                  <tr data-href="">
                    <td class="item">
                      COCO BRAKE EX FROM BIRTH ココブレーキEX フロムバース
                    </td>
                    <td class="item">
                      AIRBUGGY
                    </td>
                    <td class="item">
                      8
                    </td>
                    <td class="item">
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
@endsection