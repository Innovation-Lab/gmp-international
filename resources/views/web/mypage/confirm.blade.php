@extends('web.layouts.pages._form')
@section('title', 'ユーザー情報の入力')
@section('class', 'body_')
@section('content')
  <div class="l-frame__body">
    <div class="p-register">
      <div class="p-register__head">
        <div class="l-container">
          <div class="p-register__ttl">
            <p class="c-ttl">製品の追加登録</p>
          </div>
        </div>
      </div>
      <div class="p-register__body">
        <div class="l-container">
          <div class="p-register__txt">
            <p class="c-txt">入力内容をご確認の上、登録してください。</p>
          </div>
          <ul class="p-formList p-formList--add">
            <!-- 購入日 -->
            <li class="p-formList__item p-formList__item--add">
              <div class="p-formList__content p-formList__content--add">
                <div class="p-formList__label p-formList__label--add">
                    <p class="c-txt c-txt--gr">購入日</p>
                </div>
                <div class="p-formList__data">
                  <p class="c-txt">2023/01/01</p>
                </div>
              </div>
            </li>
            <!-- ブランド名 -->
            <li class="p-formList__item p-formList__item--add">
              <div class="p-formList__content p-formList__content--add">
                <div class="p-formList__label p-formList__label--add">
                    <p class="c-txt c-txt--gr">ブランド名</p>
                </div>
                <div class="p-formList__data">
                  <p class="c-txt">AIRBUGGY</p>
                </div>
              </div>
            </li>
            <!-- 製品名 -->
            <li class="p-formList__item p-formList__item--add">
              <div class="p-formList__content p-formList__content--add">
                <div class="p-formList__label p-formList__label--add">
                    <p class="c-txt c-txt--gr">製品名</p>
                </div>
                <div class="p-formList__data">
                  <p class="c-txt">COCO PREMIER FROM BIRTH</p>
                </div>
              </div>
            </li>
            <!-- カラー -->
            <li class="p-formList__item p-formList__item--add">
              <div class="p-formList__content p-formList__content--add">
                <div class="p-formList__label p-formList__label--add">
                    <p class="c-txt c-txt--gr">カラー</p>
                </div>
                <div class="p-formList__data">
                  <p class="c-txt">GRASS GREEN</p>
                </div>
              </div>
            </li>
            <!-- シリアルナンバー -->
            <li class="p-formList__item p-formList__item--add">
              <div class="p-formList__content p-formList__content--add">
                <div class="p-formList__label p-formList__label--add">
                    <p class="c-txt c-txt--gr">シリアルナンバー</p>
                </div>
                <div class="p-formList__data">
                  <p class="c-txt">GMP123456789</p>
                </div>
              </div>
            </li>
            <!-- 購入店舗 -->
            <li class="p-formList__item p-formList__item--add">
              <div class="p-formList__content p-formList__content--add">
                <div class="p-formList__label p-formList__label--add">
                    <p class="c-txt c-txt--gr">購入店舗</p>
                </div>
                <div class="p-formList__data">
                  <p class="c-txt">エアバギー代官山店</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      <div class="p-register__foot">
        <div class="l-container">
          <div class="p-btnWrap">
              <a href="" class="c-btn c-btn--back">修正する</a>
              <a href="" class="c-btn c-btn--next">製品を登録する</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection