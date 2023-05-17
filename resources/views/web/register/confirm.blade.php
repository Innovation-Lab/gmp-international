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
              <ul class="p-formList p-formList--confirm">
                <!-- アカウント情報 -->
                <li class="p-formList__item">
                  <div class="p-formList__ttl">
                    <p class="c-ttl">アカウント情報</p>
                  </div>
                  <div class="p-formList__content">
                    <div class="l-stack">
                      <div class="l-stack__item">
                        <div class="p-formList__label">
                          <p class="c-txt">メールアドレス</p>
                        </div>
                        <div class="p-formList__data">
                          <p class="c-txt">h.koyama@soushin-lab.co.jp</p>
                        </div>
                      </div>
                      <div class="l-stack__item">
                        <div class="p-formList__label">
                          <p class="c-txt">パスワード</p>
                        </div>
                        <div class="p-formList__data">
                          <p class="c-txt">*********</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="l-stack__item l-stack__item--line">
              <ul class="p-formList p-formList--confirm">
                <!-- ユーザー情報 -->
                <li class="p-formList__item">
                  <div class="p-formList__ttl">
                    <p class="c-ttl">ユーザー情報</p>
                  </div>
                  <div class="p-formList__content">
                    <div class="l-stack">
                      <div class="l-stack__item">
                        <div class="p-formList__label">
                          <p class="c-txt">お名前</p>
                        </div>
                        <div class="p-formList__data">
                          <p class="c-txt">小山 浩行</p>
                        </div>
                      </div>
                      <div class="l-stack__item">
                        <div class="p-formList__label">
                          <p class="c-txt">フリガナ</p>
                        </div>
                        <div class="p-formList__data">
                          <p class="c-txt">コヤマ ヒロユキ</p>
                        </div>
                      </div>
                      <div class="l-stack__item">
                        <div class="p-formList__label">
                          <p class="c-txt">郵便番号</p>
                        </div>
                        <div class="p-formList__data">
                          <p class="c-txt">1020094</p>
                        </div>
                      </div>
                      <div class="l-stack__item">
                        <div class="p-formList__label">
                          <p class="c-txt">住所</p>
                        </div>
                        <div class="p-formList__data">
                          <p class="c-txt">
                            東京都<br>
                            千代田区 紀尾井町3-12 紀尾井町ビル16F
                          </p>
                        </div>
                      </div>
                      <div class="l-stack__item">
                        <div class="p-formList__label">
                          <p class="c-txt">電話番号</p>
                        </div>
                        <div class="p-formList__data">
                          <p class="c-txt">0363808220</p>
                        </div>
                      </div>
                      <div class="l-stack__item">
                        <div class="p-formList__label">
                          <p class="c-txt">カタログの送付</p>
                        </div>
                        <div class="p-formList__data">
                          <p class="c-txt">希望する</p>
                        </div>
                      </div>
                      <div class="l-stack__item">
                        <div class="p-formList__label">
                          <p class="c-txt">DMの送付</p>
                        </div>
                        <div class="p-formList__data">
                          <p class="c-txt">希望する</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="l-stack__item l-stack__item--line">
              <ul class="p-formList p-formList--confirm">
                <!-- 購入製品 -->
                <li class="p-formList__item">
                  <div class="p-formList__ttl">
                    <p class="c-ttl">購入製品</p>
                    <p class="c-txt">製品1</p>
                  </div>
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
                          <p class="c-txt">機種名</p>
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
                {{-- 購入製品2個目から --}}
                <li class="p-formList__item p-formList__item--productLine">
                  <div class="p-formList__ttl">
                    <p class="c-txt">製品2</p>
                  </div>
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
                          <p class="c-txt">機種名</p>
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
              <a href="{{route('register.product')}}" class="c-btn c-btn--back">修正する</a>
              <a href="{{route('register.complete')}}" class="c-btn c-btn--next">登録する</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection