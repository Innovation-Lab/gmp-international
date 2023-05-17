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
                <!-- 登録製品複数の場合 -->
                <ul class="p-card">
                    <li class="p-card__item">
                        <div class="p-card__box">
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
                        </div>
                    </li>
                    <li class="p-card__item">
                        <div class="p-card__box">
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
                        </div>
                    </li>
                    <li class="p-card__item">
                        <div class="p-card__box">
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
                <div class="p-index__bar">
                    <div class="p-index__ttl">
                        <p class="c-ttl c-ttl--xl">USER</p>
                        <p class="c-ttl">会員登録情報</p>
                    </div>
                </div>
                <!-- ユーザー情報 -->
                <div class="p-info">
                    <div class="p-info__bar">
                        <div class="p-info__ttl">
                            <p class="c-ttl">ユーザー情報</p>
                        </div>
                        <!-- 変更ボタン -->
                        <div class="p-info__btn">
                            <a href="" class="c-btn c-btn--rd">変更する</a>
                        </div>
                    </div>
                    <div class="p-info__txt">
                        <div class="c-txt">名前 なまえ</div>
                        <div class="c-txt">〒102-0094</div>
                        <div class="c-txt">東京都千代田区紀尾井町3-12 紀尾井町ビル16F</div>
                        <div class="c-txt">03-6380-8220</div>
                    </div>
                </div>
                <!-- アカウント情報 -->
                <div class="p-info">
                    <div class="p-info__bar">
                        <div class="p-info__ttl">
                            <p class="c-ttl">アカウント情報</p>
                        </div>
                        <!-- 変更ボタン -->
                        <div class="p-info__btn">
                            <a href="" class="c-btn c-btn--rd">変更する</a>
                        </div>
                    </div>
                    <div class="p-info__txt">
                        <div class="c-txt">h.koyama@soushin-lab.co.jp</div>
                        <div class="c-txt">パスワードはセキュリティのため非表示</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PCマイページのみ表示 -->
        <footer class="p-footer p-footer--mypage">
            <p class="c-txt--copyLight">Copyright©2008 GMP International Co., Ltd. All Right Reserved</p>
        </footer>
    </div>
</div>
@endsection