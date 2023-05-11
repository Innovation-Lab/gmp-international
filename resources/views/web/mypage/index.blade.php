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
                        <p class="c-ttl c-ttl--xl">MY ITEM</p>
                        <p class="c-ttl">登録済み製品</p>
                    </div>
                    <!-- 追加登録ボタン -->
                    <div class="p-index__btn">
                        <a href="" class="c-btn c-btn--ghost c-btn--ghost--rd">製品の追加登録</a>
                    </div>
                </div>
                <ul class="p-card">
                    <li class="p-card__item">
                        <div class="p-card__info">
                            <!-- ブランド・製品名・カラー -->
                            <div class="p-card__mainData">
                                <div class="p-card__brand">
                                    <p class="c-txt">AIR BUGGY</p>
                                </div>
                                <div class="p-card__product">
                                    <p class="c-txt c-txt--lg">COCO PREMIER FROM BIRTH</p>
                                </div>
                                <div class="p-card__color">
                                    <p class="c-txt">GRASS GREEN</p>
                                </div>
                            </div>
                            <div class="p-card__subData">
                                <!-- 購入日・シリアルナンバー -->
                                <div class="p-card__purchase">
                                    <p class="c-txt c-txt--sm">購入日</p>
                                    <p class="c-txt">2023/04/04</p>
                                </div>
                                <div class="p-card__serialNum">
                                    <p class="c-txt c-txt--sm">シリアルナンバー</p>
                                    <p class="c-txt">GMP123456789</p>
                                </div>
                            </div>
                        </div>
                        <!-- 製品画像 -->
                        <div class="p-card__img">
                            <img src="" alt="">
                        </div>
                    </li>
                </ul>
                <!-- 一覧ページボタン -->
                <div class="p-index__btn">
                    <a href="" class="c-btn">登録済み製品一覧へ</a>
                </div>
            </div>
            <div class="p-index__body">
                <!-- カテゴリータイトル -->
                <div class="p-index__ttlBar">
                    <div class="p-index__ttl">
                        <p class="c-ttl c-ttl--xl">user</p>
                        <p class="c-ttl">会員登録情報</p>
                    </div>
                </div>
                <!-- ユーザー情報 -->
                <div class="p-info">
                    <div class="p-info__bar">
                        <div class="p-info__ttl">
                            <p class="c-txt">ユーザー情報</p>
                        </div>
                        <!-- 変更ボタン -->
                        <div class="p-info__btn">
                            <a href="" class="c-btn">変更する</a>
                        </div>
                    </div>
                    <div class="p-info__txt">
                        <p class="c-txt">名前 なまえ</p>
                        <p class="c-txt">〒102-0094</p>
                        <p class="c-txt">東京都千代田区紀尾井町3-12 紀尾井町ビル16F</p>
                        <p class="c-txt">03-6380-8220</p>
                    </div>
                </div>
                <!-- アカウント情報 -->
                <div class="p-info">
                    <div class="p-info__bar">
                        <div class="p-info__ttl">
                            <p class="c-txt">アカウント情報</p>
                        </div>
                        <!-- 変更ボタン -->
                        <div class="p-info__btn">
                            <a href="" class="c-btn">変更する</a>
                        </div>
                    </div>
                    <div class="p-info__txt">
                        <p class="c-txt">h.koyama@soushin-lab.co.jp</p>
                        <p class="c-txt">パスワードはセキュリティのため非表示</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection