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
                  <a href="{{route('admin.products.create-products')}}" class="c-button__2">製品を追加登録</a>
                  <a href="" class="c-button__icon c-button__icon--import">登録製品情報CSV入力</a>
                  <a href="" class="c-button__icon__line c-button__icon--export">登録製品情報CSV出力</a>
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
                    <div class="item">登録番号</div>
                  </th>
                  <th>
                    <div class="item">カラー</div>
                  </th>
                  <th>
                    <div class="item">購入者</div>
                  </th>
                  <th>
                    <div class="item">購入店舗</div>
                  </th>
                  <th>
                    <div class="item">ステータス</div>
                  </th>
                </thead>
                <tbody>
                  @for ($i = 0; $i < 30; $i++)
                  <!-- 1人 -->
                  <tr data-href="{{ route('admin.products.detail') }}">
                    <td class="item">
                      AIRBUGGY
                    </td>
                    <td class="item">
                      AB01-097M-HIUA
                    </td>
                    <td class="item">
                      <span>グラスグリーン</span>
                      GRASS
                    </td>
                    <td class="item">
                      <!-- <div class="u-align--both u-align--nowrap"> -->
                        <a data-href="{{ route('admin.users.detail') }}" class="user-link">山田 太郎</a>
                      <!-- </div> -->
                    </td>
                    <td class="item">
                      エアバギー代々木公園本店
                    </td>
                    <td class="item">
                      <div>
                        <span class="status status--yet">登録済み</span>
                        <span class="status status--not" style="display: none;">未登録</span>
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
              @include('admin.components._pagination', [
                  'paginate' => $products
              ])
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
