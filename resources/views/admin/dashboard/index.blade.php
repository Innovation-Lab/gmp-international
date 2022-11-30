@extends('admin.layout._page-default')
@section('content')
  <div class="p-main">
    @component('admin.component._main-head')
      @slot('main')
      <h2 class="p-main__head__main__txt__ttl">
        ダッシュボード
      </h2>
      @endslot
    @endcomponent
    <div class="p-main__body">
      <div class="p-dashboard">
        <div class="p-dashboard__head">
          <h2 class="c-h0 u-mt0">ダッシュボード</h2>
        </div>
        <div class="p-dashboard__body">
          <div class="p-dashboard__body__item c-box">
            <h3 class="c-h2 u-mt0">
              今月の売上
              <a href="" class="c-btn--sm">売上管理へ</a>
            </h3>
            <div class="c-h0">¥1,240,180</div>
            123
          </div>
          <div class="p-dashboard__body__item c-box">
            <h3 class="c-h2 u-mt0">最新のお知らせ</h3>
            12311555<br>
            12311555<br>
            12311555
            <a href="" class="c-link">お知らせ管理に移動</a>
          </div>
          <div class="p-dashboard__body__item c-box">
            <h3 class="c-h2 u-mt0">カテゴリ別売上</h3>
            <p>今月のカテゴリ別売上金額</p>
            12311555<br>
            12311555<br>
            12311555<br>
            12311555<br>
            12311555<br>
            12311555<br>
            12311555<br>
            12311555<br>
            12311555<br>
            12311555<br>
            12311555<br>
            12311555<br>
            12311555<br>
            12311555
          </div>
          <div class="p-dashboard__body__item c-box">
            <h3 class="c-h2 u-mt0">商品ランキング</h3>
            <p>過去30日間の売上ランキング</p>
            12311555<br>
            12311555<br>
            12311555
            <a href="" class="c-link">商品管理に移動</a>
          </div>
          <div class="p-dashboard__body__item c-box">
            <h3 class="c-h2 u-mt0">最新の売上</h3>
            <p>最新の購入情報</p>
            12311555<br>
            12311555<br>
            12311555
            <a href="" class="c-link">売上管理に移動</a>
          </div>
          <div class="p-dashboard__body__item c-box">
            <h3 class="c-h2 u-mt0">最新のお問合せ</h3>
            <p>お客様からの最新のお問合せ一覧</p>
            12311555<br>
            12311555<br>
            12311555
            <a href="" class="c-link">お問合せ管理に移動</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection