@extends('admin.layouts.pages._default')
@section('title', '店舗マスタ')
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
                  <a href="{{route('admin.masters.store.create')}}" class="c-button__2">店舗を新規追加</a>
                  <a href="" class="c-button__icon c-button__icon--import">店舗情報CSV入力</a>
                  <a href="" class="c-button__icon__line c-button__icon--export">店舗情報CSV出力</a>
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
            <!-- {{-- ---------- フィルター ---------- --}}
            @include('admin.components._filter') -->
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
                  <col width=240>
                  <col>
                  <col width=140>
                  <col width=200>
                </colgroup>
                <thead>
                  <th>
                    <div class="item">店舗名</div>
                  </th>
                  <th>
                    <div class="item">住所</div>
                  </th>
                  <th>
                    <div class="item">電話番号</div>
                  </th>
                  <th>
                    <div class="item">営業時間</div>
                  </th>
                </thead>
                <tbody>
                  @for ($i = 0; $i < 8; $i++)
                  <!-- 1人 -->
                  <tr data-href="{{ route('admin.masters.store.detail') }}">
                    <td class="item">
                      エアバギー代々木公園本店
                    </td>
                    <td class="item">
                      〒151-0063<br />
                      東京都 渋谷区富ヶ谷1-16-1 ラクール代々木公園1F
                    </td>
                    <td class="item">
                      03-5465-7580
                    </td>
                    <td class="item">
                      11:00〜19:00<br />
                      <small>(定休日:木曜)</small>
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
              @include('admin.masters.store._pagination')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection