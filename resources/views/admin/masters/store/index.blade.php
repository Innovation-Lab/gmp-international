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
                  <a  data-micromodal-trigger="modal-shop-import" class="c-button__icon c-button__icon--import">店舗情報CSV入力</a>
                  <a href="{{ route('admin.csv.shop.export') }}" class="c-button__icon__line c-button__icon--export">店舗情報CSV出力</a>
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
                  @forelse ($shops as $shop)
                  <!-- 1人 -->
                    <tr data-href="{{ route('admin.masters.store.detail', $shop) }}">
                      <td class="item">
                        {{ data_get($shop, 'name') }}
                      </td>
                      <td class="item">
                        〒{{ format_zip_code(data_get($shop, 'zip_code')) }}<br />
                        {{ data_get($shop, 'full_address') }}
                      </td>
                      <td class="item">
                        {{ phone_template_format(data_get($shop, 'tel')) }}
                      </td>
                      <td class="item">
                        {{ data_get($shop, 'week_business_hour')  }}<br />
                        <small>{{ data_get($shop, 'week_business_hour_memo') ? '('.data_get($shop, 'week_business_hour_memo').')' : '' }}</small>
                      </td>
                    </tr>
                  @empty
                    <tr><td class="noResult" style="border-bottom: none;">データはありません。</td></tr>
                  @endforelse
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
                  'paginate' => $shops,
              ])
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection