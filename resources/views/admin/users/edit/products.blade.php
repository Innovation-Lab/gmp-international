@extends('admin.layouts.pages._default')
@section('title', 'ユーザー管理')
@section('content')
<div class="p-edit">
  <div class="l-edit">
    <div class="l-edit__head">
      {{-- 詳細ヘッド --}}
      @include('admin.users.edit._head')
    </div>
    <div class="l-edit__body">
      <div class="wrapper u-max--800">
        <div class="container">
          <div class="l-edit__body__inner single">
            {{-- メイン --}}
            <div class="l-edit__main">
              <div class="p-edit__main">
                {{-- ---------- ボックス（メインエリア） ---------- --}}
                <div class="p-edit__main__box">
                  <div class="p-edit__main__box__wrapper">
                    {{-- フォーム --}}
                    <form action="" class="p-form">
                      <div class="p-edit__main__box__head">
                        <h3 class="p-edit__main__box__head__title">
                        登録製品情報
                        </h3>
                      </div>
                      <div class="l-grid__2 l-grid__2--xl" style="gap: 1.5rem 2rem;">
                        <div class="l-grid__item">
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  購入日
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::input('date', 'purchase_date', '2023-04-04', ['placeholder' => '0000/00/00']) !!}
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  ブランド名
                                </div>
                                <div class="p-formList__data">
                                  <select name="brand" class="select2">
                                    <option value="" hidden>選択してください</option>
                                    <option value="brand1" selected>AIRBUGGY</option>
                                    <option value="brand2">AIRBUGGY1</option>
                                    <option value="brand3">AIRBUGGY2</option>
                                  </select>
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  製品名
                                </div>
                                <div class="p-formList__data">
                                  <select name="product" class="select2">
                                    <option value="" hidden>選択してください</option>
                                    <option value="product1" selected>COCO PREMIER FROM BIRTH</option>
                                    <option value="product2">OCO PREMIER FROM BIRTH 1</option>
                                    <option value="product3">OCO PREMIER FROM BIRTH 2</option>
                                  </select>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                        <div class="l-grid__item">
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  カラー
                                </div>
                                <div class="p-formList__data">
                                  <select name="color" class="select2">
                                    <option value="" hidden>選択してください</option>
                                    <option value="color1" selected>Red</option>
                                    <option value="color2">Blue</option>
                                    <option value="color3">Green</option>
                                  </select>
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  シリアルナンバー
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::text('serial_number', 'GMP123456789', ['placeholder' => '例）GMP123456789']) !!}
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  購入店舗
                                </div>
                                <div class="p-formList__data">
                                  <select name="store" class="select2">
                                    <option value="" hidden>選択してください</option>
                                    <option value="store1" selected>エアバギー代官山店</option>
                                    <option value="store2">エアバギー渋谷店</option>
                                    <option value="store3">エアバギー新宿店</option>
                                  </select>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                        <div class="l-grid__item" style="grid-column: 1/3;">
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  管理メモ
                                </div>
                                <div class="p-formList__content__data">
                                  <textarea placeholder="修正対応や報告事項を記載してください。" class="c-scroll"></textarea>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="p-edit__main__box__foot">
                    <button class="c-button__reset">変更をリセット</button>
                    <button class="c-button">変更を反映する</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- 要素をページ下部に固定 --}}
    {{--
    <div class="l-edit__foot">
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