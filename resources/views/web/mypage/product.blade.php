@extends('web.layouts.pages._mypage')
@section('title', 'ホーム')
@section('class', 'body_')
@section('content')
<div class="l-flame__body">
    <div class="l-container">
        <div class="p-index">
            <div class="p-index__head">
                <!-- カテゴリータイトル -->
                <div class="p-index__bar">
                    <div class="p-index__ttl">
                        <p class="c-ttl c-ttl--xl">ALL ITEM</p>
                        <p class="c-ttl">登録済み製品一覧</p>
                    </div>
                    <!-- 追加登録ボタン -->
                    <div class="p-index__btn">
                        <a href="" class="c-btn c-btn--ghost c-btn--ghost--rd">製品の追加登録</a>
                    </div>
                </div>
                <!-- 登録製品複数の場合 -->
                <ul class="p-card--list">
                    <li class="p-card__item p-card__item--list">
                        <div class="p-card__info">
                            <!-- ブランド・製品名・カラー -->
                            <div class="p-card__mainData">
                                <div class="p-card__brand">
                                    <p class="c-txt">AIR BUGGY</p>
                                </div>
                                <div class="p-card__product">
                                    <p class="c-txt c-txt--md">COCO PREMIER FROM BIRTH</p>
                                    <p class="c-txt c-txt--sm">ココプレミア フロムバース</p>
                                </div>
                                <div class="p-card__color">
                                    <p class="c-txt">GRASS GREEN</p>
                                </div>
                            </div>
                            <div class="p-card__subData p-card__subData--list">
                                <!-- 購入日・シリアルナンバー・購入店舗 -->
                                <div class="p-card__purchase">
                                    <p class="c-txt--sm c-txt--sm--ghost">購入日</p>
                                    <p class="c-txt">2023/04/04</p>
                                </div>
                                <div class="p-card__serialNum">
                                    <p class="c-txt--sm c-txt--sm--ghost">シリアルNo.</p>
                                    <p class="c-txt">GMP123456789</p>
                                </div>
                                <div class="p-card__store">
                                    <p class="c-txt--sm c-txt--sm--ghost">購入店舗</p>
                                    <p class="c-txt">エアバギー代官山店</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-card__other">
                            <!-- 製品画像 -->
                            <div class="p-card__img">
                                <img src="{{asset('img/web/user/sample/product_sample.png')}}" width="60px" height="75px">
                            </div>
                            <!-- 編集ボタン -->
                            <button class="modalOpen c-btn c-btn--ghost c-btn--ghost--wh" type="submit" data-modal-open="edit">編集する</button>
                            <dialog style="display:none;" class="c-modal" id="edit" open="">
                                <section class="c-box u-max--480">
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
                                                            <input placeholder="例）山田" class="required" name="name" type="name" value="">
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
                                                                <option value="エアバギー代官山店">エアバギー代官山店</option>
                                                                <option value="GRASS GREEN">GRASS GREEN</option>
                                                            </select>
                                                            <!-- 上記以外の店舗選択時のフォーム -->
                                                            <div {{--style="display:none;"--}} class="p-formList__content p-formList__other">
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
                                                        <div {{--style="display:none;"--}} class="p-formList__content p-formList__other">
                                                            <div class="p-formList__label">
                                                                <p class="c-txt">上記以外の店舗を選択した方はこちら</p>
                                                            </div>
                                                            <div class="p-formList__data">
                                                                <input placeholder="例）アカチャンホンポ○○店" class="required" name="name" type="name" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="p-btnWrap">
                                                <a href="" class="c-btn c-btn--back">戻る</a>
                                                <a href="" class="c-btn c-btn--next">登録する</a>
                                            </div>
                                            <div class="p-btnDelete">
                                                <a href="" class="c-btn">削除する</a>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </dialog>
                            <!-- <div class="p-card__modal">
                                <ul class="p-formList p-formList--add">
                                    購入日
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
                                        <div class="p-btnWrap">
                                            <a href="" class="c-btn c-btn--back">戻る</a>
                                            <a href="" class="c-btn c-btn--next">登録する</a>
                                        </div>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- PCマイページのみ表示 -->
        <footer class="p-footer p-footer--mypage">
            <p class="c-txt--copyLight">Copyright©2008 GMP International Co., Ltd. All Right Reserved</p>
        </footer>
    </div>
</div>
@endsection