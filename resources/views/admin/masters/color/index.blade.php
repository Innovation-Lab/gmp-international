@extends('admin.layouts.pages._default')
@section('title', 'カラーマスタ')
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
                  <a href="{{route('admin.masters.color.create')}}" class="c-button__2">カラーを新規追加</a>
                  <a href="" class="c-button__icon c-button__icon--import">カラー情報CSV入力</a>
                  <a href="" class="c-button__icon__line c-button__icon--export">カラー情報CSV出力</a>
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
                  <col width=60>
                  <col width=160>
                  <col width=160>
                  <col width=120>
                  <col>
                  <col width=80>
                </colgroup>
                <thead>
                  <th>
                    <div class="item">カラー</div>
                  </th>
                  <th>
                    <div class="item">カラー名</div>
                  </th>
                  <th>
                    <div class="item">カラー名（英字）</div>
                  </th>
                  <th>
                    <div class="item">カラーコード</div>
                  </th>
                  <th>
                    <div class="item"></div>
                  </th>
                  <th>
                    <div class="item"></div>
                  </th>
                </thead>
                <tbody>
                  @forelse ($colors as $color)
                  <!-- 1人 -->
                  <tr>
                    <td class="item">
                      {{-- 2色の場合に追加 --}}
                      <div class="c-colorBall" style="background: {{ data_get($color, 'color', '#fff')}};">
                        @if (data_get($color, 'second_color'))
                          <div class="c-colorBall__pallet2" style="background: {{ data_get($color, 'second_color', '#fff') }};"></div>
                        @endif
                      </div>
                      <!-- {{-- 画像表示の場合 --}}
                      <div class="c-colorBall" style="background: url({{asset('img/web/sample/c-color--camo.png')}})"></div> -->
                    </td>
                    <td class="item">
                      {{ data_get($color, 'name') }}
                    </td>
                    <td class="item">
                      {{ data_get($color, 'alphabet_name') }}
                    </td>
                    <td class="item">
                      {{ data_get($color, 'color', '#fff') }} {{ data_get($color, 'second_color') ? '/ '.data_get($color, 'second_color') : '' }}
                    </td>
                    <td class="item"></td>
                    <td class="item">
                      <div class="p-btnWrap">
                        <a href="{{route('admin.masters.color.edit', $color)}}" class="c-button">編集</a>
                      </div>
                    </td>
                  </tr>
                  @empty
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
                  'paginate' => $colors,
              ])
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection