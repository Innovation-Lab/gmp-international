@extends('admin.layouts.pages._default')
@section('title', '製品情報編集')
@section('class', 'body_edit')
@section('content')
<div class="p-edit">
  <div class="l-edit">
    <div class="l-edit__head">
      {{-- 詳細ヘッド --}}
      @include('admin.masters.product.edit._head')
    </div>
    <div class="l-edit__body">
      <div class="wrapper u-max--560">
        <div class="container">
          <div class="l-edit__body__inner single">
            {{-- メイン --}}
            <div class="l-edit__main">
              <div class="p-edit__main">
                {{-- ---------- ボックス（メインエリア） ---------- --}}
                <div class="p-edit__main__box">
                  <div class="p-edit__main__box__wrapper">
                    {{-- フォーム --}}
                    <form action="" class="p-form min">
                      <div class="l-grid__1">
                        <div class="l-grid__item">
                          <ul class="p-formList u-max--320">
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  製品画像
                                </div>
                                <div class="p-formList__data">
                                  <input type="file" id="brand_logo" name="brand_logo" value="">
                                  <label for="brand_logo" class="product">
                                  <img class="" src="{{ asset('img/web/product/airbuggy_coco_premire_newflame_blossom_front.png')}}" alt="">
                                  </label>
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  ブランド名
                                </div>
                                <div class="p-formList__data  u-max--240">
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
                                <div class="p-formList__data u-max--240">
                                  <select name="product" class="select2">
                                    <option value="" hidden>選択してください</option>
                                    <option value="product1" selected>COCO PREMIER FROM BIRTH</option>
                                    <option value="product2">COCO PREMIER FROM BIRTH 1</option>
                                    <option value="product3">COCO PREMIER FROM BIRTH 2</option>
                                  </select>
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  カラー
                                </div>
                                <div class="p-formList__data  u-max--240">
                                  <select name="color" class="select2">
                                    <option value="" hidden>選択してください</option>
                                    <option value="color1" selected>Red</option>
                                    <option value="color2">Blue</option>
                                    <option value="color3">Green</option>
                                  </select>
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
    </div>
  </div>
</div>
@endsection