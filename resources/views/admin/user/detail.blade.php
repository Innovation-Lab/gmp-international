@extends('admin.layout._page-default')
@section('title', 'ユーザー詳細')
@section('content')
    <div class="l-main__head">
      @component('admin.component._head')
        @slot('main')
        <a href="{{route('admin.user')}}" class="c-btn--goast">
          <svg>
            <use href="#chevron-left"/>
          </svg>
        </a>
        <h2 class="c-ttl--lg">
          ユーザー詳細
        </h2>
        @endslot
      @endcomponent
    </div>
    <div class="l-main__body">
      <div class="p-bread">
        <a href="{{route('admin.user')}}">ユーザー管理</a>
        <p>斎藤 啓介</p>
      </div>
      <div class="p-page">
        <div class="p-page__side">
          <div class="u-align--hlc u-gap--24 u-mb--24">
            <div class="u-max--120">
              <img class="c-media--1-1 c-media--round" src="https://placehold.jp/3697c7/ffffff/200x200.png?text=画像">
            </div>
            <div>
              <div class="c-ttl--lg">山田 太郎</div>
              <div class="c-txt--sm">やまだ たろう</div>
            </div>
          </div>
          <dl class="c-dl--sm u-mb--24">
            <dt>氏名</dt>
            <dd>山田 太郎</dd>
            <dt>フリガナ</dt>
            <dd>ヤマダ タロウ</dd>
            <dt>電話番号</dt>
            <dd>090-1234-5678</dd>
            <dt>メール</dt>
            <dd>sample@example.com</dd>
            <dt>住所</dt>
            <dd>
              〒123-1234<br>
              東京都渋谷区渋谷123 渋谷マンション1201
            </dd>
          </dl>
          <a href="" class="c-btn u-w--100p">商品情報を編集する</a>
          <div class="c-div--md"></div>
          <div class="p-ttl">
            <h3 class="c-ttl--md">プロフィール</h3>
          </div>
          <div class="c-box--sm">
            記事とは、現象・存在・状況などを文字からなる単語を組み合わせ、文章で表した事物を、伝えるための文章である。
          </div>
        </div>
        <div class="p-page__cnt">
          <section class="js-tab">
            <div class="p-tab">
              <div class="c-tab is-active">基本情報</div>
              <div class="c-tab">支払い情報</div>
              <div class="c-tab">タブ項目</div>
            </div>
            <div class="js-panel is-show">
              <div class="p-ttl">
                <h3 class="c-ttl--md">契約内容</h3>
              </div>
              <div class="c-box u-align u-w--100p">
                <div>
                  <div class="c-txt--xs u-color--txt-weak">登録中のプラン</div>
                  <strong>ABCプラン</strong>
                </div>
                <div class="u-ml--a">
                  <a href="" class="c-btn">プラン変更</a>
                </div>
              </div>
              <div class="p-ttl">
                <h3 class="c-ttl--md">プロフィール</h3>
              </div>
              <div class="c-box">
                <dl class="c-dl">
                  <dt>氏名</dt>
                  <dd>山田 太郎</dd>
                  <dt>フリガナ</dt>
                  <dd>ヤマダ タロウ</dd>
                  <dt>電話番号</dt>
                  <dd>090-1234-5678</dd>
                  <dt>メール</dt>
                  <dd>sample@example.com</dd>
                  <dt>住所</dt>
                  <dd>
                    〒123-1234<br>
                    東京都渋谷区渋谷123 渋谷マンション1201
                  </dd>
                </dl>
              </div>
              <div class="c-box">
                <div class="c-bl">
                  @foreach([
                    '生年月日' => '1988/10/10',
                    '性別' => '男性',
                    'メールアドレス' => 'sample@example.com',
                    '電話番号' => '090-1234-1234',
                    '住所' => '
                      〒1230000<br>
                      東京都渋谷区渋谷123<br>
                      渋谷マンション1201',
                    '登録日時' => '2022/11/28<br>17:00',
                  ] as $title => $data)
                    <dl>
                      <dt>{!!$title!!}</dt>
                      <dd>{!!$data!!}</dd>
                    </dl>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="js-panel">
              tab2
            </div>
            <div class="js-panel">
              tab3
            </div>
          </section>
        </div>
      </div>
    </div>
@endsection