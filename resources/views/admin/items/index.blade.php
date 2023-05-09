@extends('admin.layouts.pages._default')
@section('title', '商品管理')
@section('content')

<div class="p-index">
  <div class="l-index">
    <div class="l-index__head">
      <div class="p-index__head">
        <div class="wrapper">
          <div class="container">
            <div class="p-index__head__inner">
              <h2 class="p-index__head__title">商品管理</h2>
              <div class="p-index__head__action">
                <a href="" class="c-button">商品を新規追加</a>
                <a href="" class="c-button__2">CSVインポート</a>
                <a href="" class="c-button__2">CSVエクスポート</a>
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
            @include('admin.components._tab')
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
                    <div class="item">性別/生年月日</div>
                  </th>
                  <th>
                    <div class="item">電話番号/メール</div>
                  </th>
                  <th>
                    <div class="item">住所</div>
                  </th>
                  <th>
                    <div class="item">プラン</div>
                  </th>
                  <th>
                    <div class="item">登録日時</div>
                  </th>
                </thead>
                <tbody>
                  @for ($i = 0; $i < 30; $i++)
                  <!-- 1人 -->
                  <tr data-href="{{route('admin.items.detail.index')}}">
                    <td class="item">
                      田嶋浩明
                      <span>タジマヒロアキ</span>
                    </td>
                    <td class="item">
                      男性
                      <span>1988/06/18</span>
                    </td>
                    <td class="item">
                      090-1234-5678
                      <span>h.tajima@soushin-lab.co.jp</span>
                    </td>
                    <td class="item">
                      <span>〒123-45678</span>
                      東京都 目黒区大橋 1-2-3 目黒大橋マンション1101
                    </td>
                    <td class="item">
                      <div class="c-status__plan-standard"></div>
                    </td>
                    <td class="item">
                      <span>
                        2022/03/03<br>
                        15:31
                      </span>
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
@endsection