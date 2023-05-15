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
                <ul class="p-card--all">
                    <li class="p-card__item">
                        <div class="p-card__info">
                            <!-- ブランド・製品名・カラー -->
                            <div class="p-card__mainData">
                                <div class="p-card__brand">
                                    <p class="c-txt">AIR BUGGY</p>
                                </div>
                                <div class="p-card__product">
                                    <p class="c-txt c-txt--lg">COCO PREMIER FROM BIRTH</p>
                                    <p class="c-txt c-txt--sm">ココプレミア フロムバース</p>
                                </div>
                                <div class="p-card__color">
                                    <p class="c-txt">GRASS GREEN</p>
                                </div>
                            </div>
                            <div class="p-card__subData.product">
                                <!-- 購入日・シリアルナンバー -->
                                <div class="p-card__purchase">
                                    <p class="c-txt c-txt--sm c-txt--sm--ghost">購入日</p>
                                    <p class="c-txt">2023/04/04</p>
                                </div>
                                <div class="p-card__serialNum">
                                    <p class="c-txt c-txt--sm c-txt--sm--ghost">シリアルナンバー</p>
                                    <p class="c-txt">GMP123456789</p>
                                </div>
                            </div>
                        </div>
                        <!-- 製品画像 -->
                        <div class="p-card__img">
                            <img src="{{asset('img/web/user/sample/product_sample.png')}}" width="60px" height="75px">
                        </div>
                    </li>
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
                                    <p class="c-txt c-txt--sm c-txt--sm--ghost">購入日</p>
                                    <p class="c-txt">2023/04/04</p>
                                </div>
                                <div class="p-card__serialNum">
                                    <p class="c-txt c-txt--sm c-txt--sm--ghost">シリアルナンバー</p>
                                    <p class="c-txt">GMP123456789</p>
                                </div>
                                <div class="p-card__store">
                                    <p class="c-txt c-txt--sm c-txt--sm--ghost">購入店舗</p>
                                    <p class="c-txt">エアバギー代官山</p>
                                </div>
                            </div>
                            <div class="p-card__edit">
                                <p class="c-btn">編集する</p>
                                <p class="c-txt">エアバギー代官山</p>
                            </div>
                        </div>
                        <!-- 製品画像 -->
                        <div class="p-card__img">
                            <img src="{{asset('img/web/user/sample/product_sample.png')}}" width="110px" height="140px">
                        </div>
                    </li>
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
                                    <p class="c-txt c-txt--sm c-txt--sm--ghost">購入日</p>
                                    <p class="c-txt">2023/04/04</p>
                                </div>
                                <div class="p-card__serialNum">
                                    <p class="c-txt c-txt--sm c-txt--sm--ghost">シリアルナンバー</p>
                                    <p class="c-txt">GMP123456789</p>
                                </div>
                            </div>
                        </div>
                        <!-- 製品画像 -->
                        <div class="p-card__img">
                            <img src="{{asset('img/web/user/sample/product_sample.png')}}" width="110px" height="140px">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection