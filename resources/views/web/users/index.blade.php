@extends('web.layouts.pages._default')
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
                <div class="c-button" data-micromodal-trigger="modal-users-create">ユーザーを新規追加</div>
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
            @include('components._tab')
            {{-- ---------- フィルター ---------- --}}
            @include('components._filter')
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
                  <tr data-href="{{route('admin.users.detail.account')}}">
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
              @include('components._pagination')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  // (function() {
  //   $('tbody tr[data-href]').addClass('clickable').click( function() {
  //       window.location = $(this).attr('data-href');
  //   }).find('label','a').hover( function() {
  //       $(this).parents('tr').unbind('click');
  //   }, function() {
  //       $(this).parents('tr').click( function() {
  //           window.location = $(this).attr('data-href');
  //       });
  //   });
  // })();
</script>
<script>
  // (function() {
  //   $('.p-filterList__label').on('click', function (e) {
  //     const target = $(this).siblings('.p-filterList__content');
  //     $('.p-filterList__content').removeClass('is-active');
  //     target.addClass('is-active');
  //     e.stopPropagation();
  //   });
  //   $('.p-filterList__content').on('click', function (e) {
  //     e.stopPropagation();
  //   });
  //   $(document).on('click', function (e) {
  //     $('.p-filterList__content').removeClass('is-active');
  //   });
  // })();
</script>
<script>
  // (function() {
  //   const table = $('table');
  //   const thLength = table.find('th').length;
  //   table.css('grid-template-columns','repeat(' + thLength + ', minmax(max-content, 1fr))')
  // })();
</script>
@endsection