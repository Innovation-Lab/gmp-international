@extends('web.layouts.pages._form')
@section('title', 'ユーザー情報の入力')
@section('class', 'body_confirm')
@section('content')
  <div class="l-frame__body">
    <div class="p-formPage">
      <div class="p-formPage__head">
        <div class="l-container">
          <div class="p-formPage__head__ttl">
            <p class="c-ttl">新規会員登録</p>
          </div>
        </div>
      </div>
      <div class="l-container">
        <div class="p-formPage__body p-formPage__body--thin">
          
          <div class="l-stack">
            <div class="l-stack__item">
              <p class="c-description">
                入力内容をご確認の上、登録してください。
              </p>
            </div>
            <div class="l-stack__item">
              <ul class="p-formList p-formList--confirm">
                <!-- 購入製品 -->
                <li class="p-formList__item">
                  <div class="p-formList__content">
                    <div class="l-stack">
                      <div class="l-stack__item">
                        <div class="p-formList__label">
                          <p class="c-txt">購入日</p>
                        </div>
                        <div class="p-formList__data">
                          <p class="c-txt">2023/04/04</p>
                        </div>
                      </div>
                      <div class="l-stack__item">
                        <div class="p-formList__label">
                          <p class="c-txt">ブランド名</p>
                        </div>
                        <div class="p-formList__data">
                          <p class="c-txt">AIRBUGGY</p>
                        </div>
                      </div>
                      <div class="l-stack__item">
                        <div class="p-formList__label">
                          <p class="c-txt">製品名</p>
                        </div>
                        <div class="p-formList__data">
                          <p class="c-txt">COCO PREMIER FROM BIRTH</p>
                        </div>
                      </div>
                      <div class="l-stack__item">
                        <div class="p-formList__label">
                          <p class="c-txt">カラー</p>
                        </div>
                        <div class="p-formList__data">
                          <p class="c-txt">グリーンティー</p>
                        </div>
                      </div>
                      <div class="l-stack__item">
                        <div class="p-formList__label">
                          <p class="c-txt">シリアルナンバー</p>
                        </div>
                        <div class="p-formList__data">
                          <p class="c-txt">GMP123456789</p>
                        </div>
                      </div>
                      <div class="l-stack__item">
                        <div class="p-formList__label">
                          <p class="c-txt">購入店舗</p>
                        </div>
                        <div class="p-formList__data">
                          <p class="c-txt">エアバギー代官山店</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="p-formPage__foot">
          <div class="p-btnWrap p-btnWrap--center">
              <a href="{{route('mypage.add')}}" class="c-btn c-btn--back">修正する</a>
              <a href="{{route('mypage.index')}}" class="c-btn c-btn--next">登録する</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection