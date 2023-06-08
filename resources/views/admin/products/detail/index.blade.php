@extends('admin.layouts.pages._default')
@section('title', '登録製品詳細')
@section('content')
<div class="p-detail">
  <div class="l-detail">
    <div class="l-detail__head">
      {{-- 詳細ヘッド --}}
      @include('admin.products.detail._head')
    </div>
    <div class="l-detail__body">
      <div class="wrapper">
        <div class="container">
          <div class="l-detail__body__inner l-detail__body__inner--full">
            {{-- メイン --}}
            <div class="l-detail__full">
              <div class="p-detail__full">
                {{-- ---------- 登録製品情報 ---------- --}}
                <div class="p-detail__full__box">
                  <div class="p-detail__full__box__wrapper">
                    {{-- ---------- リスト ---------- --}}
                    <div class="p-list--product">
                      <div class="p-list__left">
                        <div class="p-list__img" style="width: 200px;">
                          <img class="" src="{{ asset('img/web/product/airbuggy_coco_premire_newflame_blossom_front.png')}}" alt="">
                        </div>
                        <div class="p-list__status p-list__status--registered">
                          <span class="status">登録済み</span>
                        </div>
                        <div class="p-list__status p-list__status--notregistered" style="display: none;">
                          <span class="status">未登録</span>
                        </div>
                      </div>
                      <div class="p-list__right">
                        <div class="p-list__head">
                          <h3 class="p-detail__main__box__head__title">登録製品情報</p>
                          <!-- <a href="{{route('admin.products.edit-products')}}" class="c-button__2">編集</a> -->
                          <a href="{{route('admin.products.edit-products')}}" class="c-button">編集</a>
                        </div>
                        <ul class="p-list">
                          @foreach([
                            'ブランド名' => 'AIRBUGGY',
                            '製品名' => 'COCO BRAKE EX FROM BIRTH',
                            'カラー' => 'BLOSSOM',
                            '購入日' => '2023/04/04',
                            '購入店舗' => 'エアバギー代々木公園本店',
                            'シリアルNo.' => 'GMP123456789',
                            '登録番号' => 'AB01-097M-HIUA',
                            '管理メモ' => '2024/04/04　タイヤ交換',
                            ] as $key => $val)
                          <li class="p-list__item">
                            <div class="p-list__label">
                              {!! $key !!}
                            </div>
                            <div class="p-list__data">
                              {!! $val !!}
                            </div>
                            @endforeach
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            {{-- メイン --}}
            <div class="l-detail__full">
              <div class="p-detail__full">
                {{-- ---------- 登録ユーザー情報 ---------- --}}
                <div class="p-detail__full__box">
                  <div class="p-detail__full__box__wrapper" style="display: none;">
                    {{-- ---------- 未登録 ---------- --}}
                    <div class="p-list__head p-list__head--center">
                      <h3 class="p-detail__main__box__head__title center">ユーザー情報は登録されていません</p>
                    </div>
                  </div>
                  <div class="p-detail__full__box__wrapper">
                    {{-- ---------- 登録済み ---------- --}}
                    <div class="p-list__head">
                      <h3 class="p-detail__main__box__head__title">登録ユーザー情報</p>
                      <a href="
                      {{-- {{ route('admin.users.detail', $user) }} --}}
                      " 
                      class="c-button__2">登録ユーザーへ</a>
                    </div>
                    <ul class="p-list p-list--user">
                      @foreach([
                        '会員番号' => 'No.000000123456',
                        '名前<span>（フリガナ）</span>' => '山田　太郎<span>（ヤマダ　タロウ）</span>',
                        '電話番号' => '080-1234-5678',
                        'メールアドレス' => 'gmp@sample.com',
                        '住所' => '
                        〒1530001<br>
                        東京都千代田区紀尾井町1-1-1　紀尾井町ビル16F',
                        '新着情報、お得情報' => '受け取る',
                        'アカウント作成日時' => '2023/04/04　10:12',
                        '管理メモ' => '2024/04/04　タイヤ交換',
                      ] as $key => $val)
                      <li class="p-list__item">
                        <div class="p-list__label">
                          {!! $key !!}
                        </div>
                        <div class="p-list__data">
                          {!! $val !!}
                        </div>
                        @endforeach
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- ユーザー写真 --}}
{{--@include('users._modal-users-photo')--}}
<script>
  // (function() {
  //   const table = $('table');
  //   const thLength = table.find('th').length;
  //   table.css('grid-template-columns','repeat(' + thLength + ', minmax(max-content, 1fr))')
  // })();
</script>
@endsection