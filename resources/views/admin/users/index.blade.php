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
              {{--検索結果なしデザイン--}}
              <div class="noResult" style="display: none;">検索結果がありません。</div>
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
                @foreach($users as $user)
                  <tr data-href="{{ route('admin.users.detail', $user) }}">
                    <td class="item">
                      {{ data_get($user, 'full_name') }}
                      <span>{{ data_get($user, 'full_name_kana') }}</span>
                    </td>
                    <td class="item">
                      {{ data_get($user, 'formatted_tel') }}
                      <span>{{ data_get($user, 'email') }}</span>
                    </td>
                    <td class="item">
                      <span>〒{{ format_zip_code(data_get($user, 'zip_code')) }}</span>
                      {{ data_get($user, 'full_address') }}
                    </td>
                    <td class="item">
                        {{--登録製品なしデザイン--}}
                        <div class="noProducts" style="display: none;">登録されている製品はありません</div>
                      @if(count($user->salesProducts) > 0)
                        <span class="products" style="background-image:url('../img/web/product/airbuggy_coco_premire_newflame_blossom_front.png')">
                      @endif
                        {{ data_get($user,'first_product') ? data_get($user,'first_product.mBrand.name') : '' }}<br>
                        {{ data_get($user,'first_product') ? data_get($user,'first_product.name') : '' }}
                        @if($user->other_product_count > 0)
                          <span class="number">{{ data_get($user,'other_product_count') > 1 ? '+' . data_get($user,'other_product_count') : '' }}</span>
                        @endif
                      </span>
                    </td>
                    <td class="item">
                      <span>
                        {{ formatYmdSlash(data_get($user, 'created_at')) }}<br>{{ formatHiSlash(data_get($user, 'created_at')) }}
                      </span>
                    </td>
                  </tr>
                @endforeach
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
                  'paginate' => $users,
              ])
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