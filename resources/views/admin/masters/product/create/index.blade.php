@extends('admin.layouts.pages._default')
@section('title', '製品情報追加')
@section('class', 'body_edit')
@section('content')
<div class="p-edit">
  <div class="l-edit">
    <div class="l-edit__head">
      {{-- 詳細ヘッド --}}
      @include('admin.masters.product.create._head')
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
                                  ブランド名
                                </div>
                                <div class="p-formList__data  u-max--360">
                                  <select name="brand" class="select2">
                                    <option value="" hidden>選択してください</option>
                                    <option value="brand1" >AIRBUGGY</option>
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
                                <div class="p-formList__data u-max--360">
                                  <select name="product" class="select2">
                                    <option value="" hidden>選択してください</option>
                                    <option value="product1">COCO PREMIER FROM BIRTH</option>
                                    <option value="product2">COCO PREMIER FROM BIRTH 1</option>
                                    <option value="product3">COCO PREMIER FROM BIRTH 2</option>
                                  </select>
                                </div>
                              </div>
                            </li>
                            <ul class="p-formList u-max--320">
                              <li class="p-formList__item">
                                <div class="p-formList__content">
                                  <div class="p-formList__label">
                                    カラー
                                  </div>
                                  <div class="p-formList__data  u-max--360">
                                    <select name="color" class="select2">
                                      <option value="" hidden>選択してください</option>
                                      <option value="color1" selected>BLOSSOM</option>
                                      <option value="color2">Blue</option>
                                      <option value="color3">Green</option>
                                    </select>
                                  </div>
                                  <div class="p-formList__data  u-max--360">
                                    <input type="text" placeholder="URLを入力" value=https://www.airbuggy.com/wp-content/uploads/2021/04/airbuggy_coco_premire_newflame_blossom_front.png">
                                  </div>
                                </div>
                                <div class="p-formList__btn">
                                  <button class="c-textButton__icon c-textButton--gray {{--u-mt--24--}}">
                                    <svg class="icon"><use href="#add"/></svg>カラーを追加する
                                  </button>
                                </div>
                              </li>
                              <li class="p-formList__item">
                                <div class="p-formList__content">
                                  <div class="p-formList__label">
                                    カラー
                                  </div>
                                  <div class="p-formList__data  u-max--360">
                                    <select name="color" class="select2">
                                      <option value="" hidden>選択してください</option>
                                      <option value="color1" selected>BLOSSOM</option>
                                      <option value="color2">Blue</option>
                                      <option value="color3">Green</option>
                                    </select>
                                  </div>
                                  <div class="p-formList__data  u-max--360">
                                    <input type="text" placeholder="URLを入力" value=https://www.airbuggy.com/wp-content/uploads/2021/04/airbuggy_coco_premire_newflame_blossom_front.png">
                                  </div>
                                </div>
                                <div class="p-formList__btn">
                                  <button class="c-textButton__icon c-textButton--gray {{--u-mt--24--}}">
                                    <svg class="icon"><use href="#add"/></svg>カラーを追加する
                                  </button>
                                  <button class="c-textButton__icon c-textButton--gray delete">
                                    <svg class="icon"><use href="#delete"/></svg>削除
                                  </button>
                                </div>
                              </li>
                              <li class="p-formList__item">
                                <div class="p-formList__content">
                                  <div class="p-formList__label">
                                    カラー
                                  </div>
                                  <div class="p-formList__data  u-max--360">
                                    <select name="color" class="select2">
                                      <option value="" hidden>選択してください</option>
                                      <option value="color1" selected>BLOSSOM</option>
                                      <option value="color2">Blue</option>
                                      <option value="color3">Green</option>
                                    </select>
                                  </div>
                                  <div class="p-formList__data  u-max--360">
                                    <input type="text" placeholder="URLを入力" value=https://www.airbuggy.com/wp-content/uploads/2021/04/airbuggy_coco_premire_newflame_blossom_front.png">
                                  </div>
                                </div>
                                <div class="p-formList__btn">
                                  <button class="c-textButton__icon c-textButton--gray {{--u-mt--24--}}">
                                    <svg class="icon"><use href="#add"/></svg>カラーを追加する
                                  </button>
                                  <button class="c-textButton__icon c-textButton--gray delete">
                                    <svg class="icon"><use href="#delete"/></svg>削除
                                  </button>
                                </div>
                              </li>
                              <li class="p-formList__item">
                                <div class="p-formList__content">
                                  <div class="p-formList__label">
                                    カラー
                                  </div>
                                  <div class="p-formList__data  u-max--360">
                                    <select name="color" class="select2">
                                      <option value="" hidden>選択してください</option>
                                      <option value="color1" selected>BLOSSOM</option>
                                      <option value="color2">Blue</option>
                                      <option value="color3">Green</option>
                                    </select>
                                  </div>
                                  <div class="p-formList__data  u-max--360">
                                    <input type="text" placeholder="URLを入力" value=https://www.airbuggy.com/wp-content/uploads/2021/04/airbuggy_coco_premire_newflame_blossom_front.png">
                                  </div>
                                </div>
                                <div class="p-formList__btn">
                                  <button class="c-textButton__icon c-textButton--gray {{--u-mt--24--}}">
                                    <svg class="icon"><use href="#add"/></svg>カラーを追加する
                                  </button>
                                  <button class="c-textButton__icon c-textButton--gray delete">
                                    <svg class="icon"><use href="#delete"/></svg>削除
                                  </button>
                                </div>
                              </li>
                            </ul>
                          </ul>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="p-edit__main__box__foot">
                    <button class="c-button__reset">戻る</button>
                    <button class="c-button">この内容で登録する</button>
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