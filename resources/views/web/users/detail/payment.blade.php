@extends('layouts.pages._default')
@section('title', 'ユーザー詳細')
@section('content')
<div class="p-detail">
  <div class="l-detail">
    <div class="l-detail__head">
      {{-- 詳細ヘッド --}}
      @include('users.detail._head')
    </div>
    <div class="l-detail__body">
      <div class="wrapper">
        <div class="container">
          <div class="l-detail__body__inner">
            {{-- サイドバー --}}
            <div class="l-detail__sidebar">
              @include('users.detail._sidebar')
            </div>
            {{-- メイン --}}
            <div class="l-detail__main--hidden">
              {{-- ---------- タブ ---------- --}}
              @include('users.detail._tab')
              <div class="p-detail__main">
                {{-- ---------- ボックス（メインエリア） ---------- --}}
                <div class="p-detail__main__box">
                  <div class="p-detail__main__box__wrapper">
                    <form action="" class="p-form">
                      <div class="l-grid__1 l-grid__2--xl">
                        <div class="l-grid__item">
                          <div class="p-detail__main__box__head">
                            @include('users.detail._tab_payment')
                            <h3 class="p-detail__main__box__head__title" style="margin-top: 2.5rem;">
                              支払い総額
                            </h3>
                          </div>
                          <ul class="p-dataList">
                            @foreach([
                              [
                                'label' => '会費',
                                'data' => '53,763',
                              ],
                              [
                                'label' => 'EC',
                                'data' => '203,500',
                              ],
                              [
                                'label' => '保証',
                                'data' => '0',
                              ],
                              [
                                'label' => 'その他',
                                'data' => '0',
                              ],
                              [
                                'label' => '合計金額（税込）',
                                'data' => '¥257,263',
                                'bold' => true,
                              ]
                            ] as $key => $val)
                            <li class="p-dataList__item {{ isset($val['bold']) ? 'p-dataList__item--bold' : '' }}">
                              <div class="p-dataList__label">
                                {{$val['label']}}
                              </div>
                              <div class="p-dataList__data">
                                @if(isset($val['bold']))
                                  <b>
                                    {{$val['data']}}
                                  </b>
                                @else
                                  {{$val['data']}}
                                @endif
                              </div>
                            </li>
                            @endforeach
                          </ul>
                        </div>
                        <div class="l-grid__item">
                          <div class="p-detail__main__box__head">
                            <h3 class="p-detail__main__box__head__title">
                              決済情報
                            </h3>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                {{-- ---------- ボックス（メインエリア） ---------- --}}
                <div class="p-detail__main__box">
                  <div class="p-detail__main__box__wrapper">
                    <div class="p-detail__main__box__head">
                      <h3 class="p-detail__main__box__head__title">
                        変更履歴
                      </h3>
                    </div>
                  </div>
                  <div class="p-detail__main__box__table">
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
                              ゴールドプラン
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
                        <tfoot>
                          <td>
                            <div class="data">
                              123
                            </div>
                          </td>
                          <td>
                            <div class="data">
                              123
                            </div>
                          </td>
                          <td>
                            <div class="data">
                              123
                            </div>
                          </td>
                          <td>
                            <div class="data">
                              123
                            </div>
                          </td>
                          <td>
                            <div class="data">
                              123
                            </div>
                          </td>
                          <td>
                            <div class="data">
                              123
                            </div>
                          </td>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- 要素をページ下部に固定 --}}
    {{--
    <div class="l-detail__foot">
      <div class="p-detail__foot">
        要素をページ下部に固定
      </div>
    </div>
    --}}
  </div>
</div>
{{-- ユーザー写真 --}}
@include('users._modal-users-photo')
<script>
  // (function() {
  //   const table = $('table');
  //   const thLength = table.find('th').length;
  //   table.css('grid-template-columns','repeat(' + thLength + ', minmax(max-content, 1fr))')
  // })();
</script>
@endsection