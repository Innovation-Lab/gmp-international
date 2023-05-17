@extends('web.layouts.pages._default')
@section('title', 'アカウント管理')
@section('class', 'nofilter')
@section('content')
<div class="p-index">
  <div class="wrapper">
    <div class="container">
      <div class="inner">
        <div class="l-index">
          <div class="l-index__head">
            <div class="p-index__head">
              <h2 class="p-index__head__title">アカウント管理</h2>
              <div class="p-index__head__action">
                <div data-micromodal-trigger="modal-account-create" class="c-button">アカウントを新規追加</div>
              </div>
            </div>
          </div>
          <div class="l-index__middle">
            {{-- ---------- タブ ---------- --}}
            @include('staffs._tab')
          <div class="l-index__body">
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
                    <div class="item">権限</div>
                  </th>
                  <th>
                    <div class="item">メール</div>
                  </th>
                  <th>
                    <div class="item">
                      操作
                    </div>
                  </th>
                  <th>
                    <div class="item">アカウント作成日時</div>
                  </th>
                </thead>
                <tbody>
                  @for ($i = 0; $i < 3; $i++)
                  <!-- 1人 -->
                  <tr>
                    <td class="item">
                      田嶋浩明
                      <span>タジマヒロアキ</span>
                    </td>
                    <td class="item">
                      男性
                      <span>1988/06/18</span>
                    </td>
                    <td class="item">
                      <div class="c-status__auth-admin"></div>
                    </td>
                    <td class="item">
                      <span>h.tajima@soushin-lab.co.jp</span>
                    </td>
                    <td class="item">
                      <div data-micromodal-trigger="modal-account-edit" class="c-button small">編集</div>
                      <div data-micromodal-trigger="modal-alert" class="c-button__2 small">削除</div>
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
              </table>
            </div>
          </div>
          <div class="l-index__foot">
            <div class="p-index__foot">
              {{-- ページネーション --}}
              @include('components._pagination')
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- アカウント作成モーダル --}}
@include('staffs._modal-account-create')
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