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
                  <div class="c-button__2" data-micromodal-trigger="modal-users-create">ブランドを新規追加</div>
                  <a href="" class="c-button__icon c-button__icon--import">ブランド情報CSV入力</a>
                  <a href="" class="c-button__icon__line c-button__icon--export">ブランド情報CSV出力</a>
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
            {{------------ タブ ---------- --}}
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
                  <col width=200>
                  <col width=80>
                  <col>
                  <col width=80>
                </colgroup>
                <thead>
                  <th>
                    <div class="item">ブランドロゴ</div>
                  </th>
                  <th>
                    <div class="item">ブランド名</div>
                  </th>
                  <th>
                    <div class="item">登録製品数</div>
                  </th>
                  <th>
                    <div class="item"></div>
                  </th>
                  <th>
                    <div class="item"></div>
                  </th>
                </thead>
                <tbody>
                  @for ($i = 0; $i < 12; $i++)
                  <!-- 1人 -->
                  <tr>
                    <td class="item">
                      <img src="{{asset('img/admin/brand/airbuggy.svg')}}" alt="ブランドロゴ" height=16>
                    </td>
                    <td class="item">
                      AIRBUGGY
                    </td>
                    <td class="item">
                      25
                    </td>
                    <td class="item">
                    </td>
                    <td class="item">
                      <div class="c-buttonWrap">
                        <a href="{{route('admin.masters.brand.edit')}}" class="c-button">編集</a>
                      </div>
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
              @include('admin.masters.brand._pagination')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection