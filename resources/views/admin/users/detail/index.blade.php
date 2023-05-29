@extends('admin.layouts.pages._default')
@section('title', 'ユーザー管理')
@section('content')
<div class="p-detail">
  <div class="l-detail">
    <div class="l-detail__head">
      {{-- 詳細ヘッド --}}
      @include('admin.users.detail._head')
    </div>
    <div class="l-detail__body">
      <div class="wrapper">
        <div class="container">
          <div class="l-detail__body__inner">
            {{-- サイドバー --}}
            <div class="l-detail__sidebar">
              @include('admin.users.detail._sidebar')
            </div>
            {{-- メイン --}}
            <div class="l-detail__main">
              <div class="p-detail__main">
                {{-- ---------- ボックス（メインエリア） ---------- --}}
                <div class="p-detail__main__box">
                  <div class="p-detail__sidebar__box__head">
                    <h3 class="p-detail__sidebar__box__head__title">
                      登録製品情報
                    </h3>
                    <a href="" class="c-button__2">登録製品を追加する</a>
                  </div>
                  <div class="p-detail__main__box__body">
                    {{-- ---------- リスト ---------- --}}
                    <ul class="p-list">
                      @for($list = 0; $list < 10; $list++)
                      @foreach([
                        '購入日' => '2023/04/04',
                        'シリアルNo.' => 'GMP123456789',
                        '購入店舗' => 'エアバギー代々木公園本店',
                        '保証期間' => '12ヶ月',
                        '管理メモ' => '2024/04/04　タイヤ交換',
                      ] as $key => $val)
                      <li class="p-list__item">
                        <div class="p-list__ttl"></div>
                        <div class="p-list__label">
                          {!! $key !!}
                        </div>
                        <div class="p-list__data">
                          {!! $val !!}
                        </div>
                        @endforeach
                        @endfor
                      </li>
                    </ul>
              <li>
                <div class="p-card__item p-card__item--list">
                  <div class="p-card__info">
                  {{--ブランド・製品名・カラー--}}
                    <div class="p-card__mainData">
                      <div class="p-card__brand">
                        <p class="c-txt">AIR BUGGY</p>
                      </div>
                      <div class="p-card__product">
                        <p class="c-txt c-txt--md">COCO BRAKE EX FROM BIRTH</p>
                        <p class="c-txt c-txt--sm">ココブレーキEX フロムバース</p>
                      </div>
                      <div class="p-card__color">
                        <div class="c-colorBall"></div>
                        <p class="c-txt">BLOSSOM</p>
                      </div>
                    </div>
                    <div class="p-card__subData p-card__subData--list">
                      {{--購入日・シリアルナンバー・購入店舗--}}
                      <div class="p-card__purchase">
                        <p class="label c-txt--sm c-txt--sm--ghost">購入日</p>
                        <p class="data c-txt">2023/05/24</p>
                      </div>
                      <div class="p-card__serialNum">
                        <p class="label c-txt--sm c-txt--sm--ghost">シリアルNo.</p>
                        <p class="data c-txt">GMP111111111</p>
                      </div>
                      <div class="p-card__store">
                        <p class="label c-txt--sm c-txt--sm--ghost">購入店舗</p>
                        <p class="data c-txt">エアバギー名古屋店</p>
                      </div>
                    </div>
                  </div>
                  <div class="p-card__other">
                    {{--製品画像--}}
                    <div class="p-card__img">
                      <img src="http://localhost:8100/img/web/user/sample/product_sample.png" width="60px" height="75px">
                    </div>
                    {{--編集ボタン--}}
                    <button class="modalOpen c-btn c-btn--ghost c-btn--ghost--wh" data-micromodal-trigger="modal-edit--product" role="button">編集する</button>
                    </div>
                  </div>
              </li>
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
@include('admin.users._modal-users-photo')
<script>
  // (function() {
  //   const table = $('table');
  //   const thLength = table.find('th').length;
  //   table.css('grid-template-columns','repeat(' + thLength + ', minmax(max-content, 1fr))')
  // })();
</script>
@endsection