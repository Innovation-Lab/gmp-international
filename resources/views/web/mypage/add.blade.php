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
          <ul class="p-formList">
            <!-- 購入日 -->
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                    <p class="c-txt">購入日　<span class="c-txt c-txt--must">必須</span></p>
                </div>
                <div class="p-formList__data">
                  <input placeholder="0000/00/00" class="required" name="name" type="name" value="">
                </div>
                <p style="display: none;" class="c-txt c-txt--err">「姓」を入力してください。<br>※全角で入力してください。</p>
              </div>
            </li>
            <!-- ブランド名 -->
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                    <p class="c-txt">ブランド名　<span class="c-txt c-txt--must">必須</span></p>
                </div>
                <div class="p-formList__data">
                  <select name="pref">
                    <option value="" selected>ブランドを選択してください</option>
                    <option value="AIRBUGGY">AIRBUGGY</option>
                  </select>
                </div>
                <p style="display: none;" class="c-txt c-txt--err">ブランドを選択してください。</p>
              </div>
            </li>
            <!-- 製品名 -->
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                    <p class="c-txt">製品名</p>
                </div>
                <div class="p-formList__data">
                  <select name="pref">
                    <option value="" selected>製品を選択してください</option>
                    <option value="COCO PREMIER FROM BIRTH">COCO PREMIER FROM BIRTH</option>
                  </select>
                </div>
                <p style="display: none;" class="c-txt c-txt--err">「セイ」を入力してください。<br>※全角カタカナで入力してください。</p>
              </div>
            </li>
            <!-- カラー -->
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                    <p class="c-txt">カラー</p>
                </div>
                <div class="p-formList__data">
                  <select name="pref">
                    <option value="" selected>カラーを選択してください</option>
                    <option value="GRASS GREEN">GRASS GREEN</option>
                  </select>
                  <!-- 上記以外の店舗選択時のフォーム -->
                  <div style="display:none;" class="p-formList__content p-formList__other">
                    <div class="p-formList__label">
                      <p class="c-txt">上記以外のカラーを選択した方はこちら</p>
                    </div>
                    <div class="p-formList__data">
                      <input placeholder="例）赤" class="required" name="name" type="name" value="">
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <!-- シリアルナンバー -->
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                    <p class="c-txt">シリアルナンバー</p>
                </div>
                <div class="p-formList__data">
                  <input placeholder="例）GMP0123456" class="required" name="name" type="name" value="">
                </div>
              </div>
            </li>
            <!-- 購入店舗 -->
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                    <p class="c-txt">購入店舗</p>
                </div>
                <div class="p-formList__data">
                  <select name="pref">
                    <option value="" selected>購入店舗を選択してください</option>
                    <option value="エアバギー代官山店">エアバギー代官山店</option>
                    <option value="上記以外の店舗">上記以外の店舗</option>
                  </select>
                  <!-- 上記以外の店舗選択時のフォーム -->
                  <div style="display:none;" class="p-formList__content p-formList__other">
                    <div class="p-formList__label">
                      <p class="c-txt">上記以外の店舗を選択した方はこちら</p>
                    </div>
                    <div class="p-formList__data">
                      <input placeholder="例）アカチャンホンポ○○店" class="required" name="name" type="name" value="">
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      <div class="p-register__foot">
        <div class="l-container">
          <div class="p-btnWrap">
              <a href="" class="c-btn c-btn--back">戻る</a>
              <a href="" class="c-btn c-btn--next">入力情報の確認へ</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection