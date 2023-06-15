@extends('admin.layouts.pages._default')
@section('title', '管理者管理')
@section('class', 'nofilter')
@section('content')
<div class="p-index">
  <div class="l-index">
    <div class="l-index__head">
      <div class="p-index__head">
        <div class="wrapper">
          <div class="container">
            <div class="p-index__head__inner">
              <h2 class="p-index__head__title">管理者管理</h2>
              <div class="p-index__head__action">
                <a href="{{route('admin.staffs.create')}}" class="c-button__2">管理者を新規追加</a>
              </div>
            </div>
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
                    <div class="item">アイコン</div>
                  </th> 
                  <th>
                    <div class="item">名前/フリガナ</div>
                  </th>
                  <th>
                    <div class="item">所属店舗</div>
                  </th>
                  <th>
                    <div class="item">権限</div>
                  </th>
                  <th>
                    <div class="item">メール</div>
                  </th>
                  <th>
                    <div class="item">アカウント作成日時</div>
                  </th>
                  <th>
                    <div class="item">
                      操作
                    </div>
                  </th>
                </thead>
                <tbody>
                  @foreach ($admins as $admin)
                    <!-- 1人 -->
                    <tr>
                      <td>
                        <img src="{{ data_get($admin, 'main_image_url') }}" width="40" height="40" alt="">
                      </td>
                      <td class="item">
                        {{ data_get($admin, 'full_name') }}
                        <span>{{ data_get($admin, 'full_name_kana') }}</span>
                      </td>
                      <td class="item">
                        {{ data_get($admin, 'mShop.name') }}
                      </td>
                      <td class="item">
                        <div class="c-status__auth-{{ data_get($admin, 'authority_class') }}"></div>
                      </td>
                      <td class="item">
                        {{ data_get($admin, 'email') }}
                      </td>
                      <td class="item">
                        {{ formatYmdSlash(data_get($admin, 'created_at')) }}<br>{{ formatHiSlash(data_get($admin, 'created_at')) }}
                      </td>
                      <td class="item">
                        <a href="{{route('admin.staffs.edit', $admin)}}" class="c-button">編集</a>
                        @can('delete', $admin)
                          <button onclick="
                              if(confirm('本当に削除してよろしいですか？')) {
                                $('#deleteAdminAccountForm{{ $admin->id }}').submit();
                              }
                            " class="c-button__2">
                            削除
                          </button>
                        @endif
                      </td>
                    </tr>
                    <form method="POST" action="{{ route('admin.staffs.delete', $admin) }}" id="deleteAdminAccountForm{{ $admin->id }}">@csrf</form>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="l-index__foot">
            <div class="p-index__foot">
              {{-- ページネーション --}}
              @include('admin.components._pagination', [
                  'paginate' => $admins,
              ])
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- アカウント作成モーダル --}}
{{--@include('admin.staffs._modal-account-create')--}}
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