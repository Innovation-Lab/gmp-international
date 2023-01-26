@extends('admin.layout._page-default')
@section('title', '商品詳細')
@section('content')
  <div class="l-main__head">
    @component('admin.component._head')
      @slot('main')
      <a href="{{route('admin.item')}}" class="c-btn--goast">
        <svg>
          <use href="#chevron-left"/>
        </svg>
      </a>
      <h2 class="c-ttl--lg">
        商品詳細
      </h2>
      @endslot
    @endcomponent
  </div>
  <div class="l-main__body">
    <div class="p-bread">
      <a href="{{route('admin.item')}}">商品管理</a>
      <p>THE TABLE / 杉無垢材 × Black Steel</p>
    </div>
    <div class="p-page">
      <div class="p-page__side">
        <div class="p-profile u-mb--16">
          <div class="p-profile__txt">
            <div class="p-profile__sub">TBL-K01-SQU-BK</div>
            <div class="c-ttl--lg u-mt--8 u-mb--0">THE TABLE / 杉無垢材 × Black Steel</div>
          </div>
        </div>
        <dl class="c-dl--sm u-mb--16">
          <dt>料金</dt>
          <dd>¥55,000(税込)</dd>
          <dt>送料</dt>
          <dd>¥1,000(税込)</dd>
          <dt>在庫</dt>
          <dd>64</dd>
        </dl>
        <a href="{{route('admin.item.edit')}}" class="c-btn u-w--100p">商品情報を編集する</a>
        <div class="c-div--md"></div>
        <div class="p-gallery">
          <div class="p-gallery__main">
            <img src="https://placehold.jp/3697c7/ffffff/400x300.png?text=商品画像" class="lg">
          </div>
          <div class="p-gallery__sub">
            <img src="https://placehold.jp/3697c7/ffffff/400x300.png?text=商品画像" class="lg">
            <img src="https://placehold.jp/3697c7/ffffff/400x300.png?text=商品画像" class="lg">
            <img src="https://placehold.jp/3697c7/ffffff/400x300.png?text=商品画像" class="lg">
            <img src="https://placehold.jp/3697c7/ffffff/400x300.png?text=商品画像" class="lg">
            <img src="https://placehold.jp/3697c7/ffffff/400x300.png?text=商品画像" class="lg">
          </div>
        </div>
        <div class="c-div"></div>
        <div class="p-ttl">
          <h3 class="c-ttl--md">レビュー</h3>
        </div>
        <div class="c-box">
          ★★★★★
        </div>
      </div>
      <div class="p-page__cnt">
        <section class="js-tab">
          <div class="p-tab">
            <div class="c-tab is-active">基本情報</div>
            <div class="c-tab">販売履歴</div>
            <div class="c-tab">メモ</div>
          </div>
          <div class="js-panel is-show">
            <div class="p-ttl">
              <h3 class="c-ttl--md">商品説明</h3>
            </div>
            <div class="c-box">
              <p>温かみのある杉無垢材の天板と、マットブラックの鉄脚を組み合わせた、シンプルモダンなデザインのテーブルです。</p>
              <p>杉は、美しい木目や表情豊かな節が特徴の、明るい雰囲気の木材。木目を生かしてカッティングされた、 厚みのある杉無垢材を丁寧に組み合わせて、品のある天板に仕上げています。木肌のナチュラルな風合いが好きな方におすすめです。</p>
              <p>ダイニングテーブルにもワークスペース用のデスクにもぴったりのこちらのテーブルは、サイズオーダーが無料。空間や利用人数、用途に合わせて、テーブルの長さをカスタムオーダーできます。天板と合わせるテーブル脚のセレクションも充実。</p>
              <p>KANADEMONO では、シンプルでミニマルモダンなアイアン脚を多く取り揃えています。</p>
              <p>空間にフィットするサイズの天板と、お好みのアイアン脚を組み合わせて、オリジナルのテーブルをオーダーしてみませんか。</p>
            </div>
            <div class="p-ttl">
              <h3 class="c-ttl--md">商品情報</h3>
            </div>
            <div class="c-box">
            <dl class="c-dl">
              <dt>サイズ</dt>
              <dd>
                ・天板の幅・奥行きはお好きなサイズでオーダー可能<br>
                ・テーブルの高さ：700 mm※Square H70：730 mm<br>
                ・アジャスターの高さ：10 mm〜
              </dd>
              <dt>天板厚み</dt>
              <dd>30mm</dd>
              <dt>素材</dt>
              <dd>天板：杉無垢材 脚：スチール</dd>
              <dt>仕上げ</dt>
              <dd>天板：マットウレタンニス塗装 脚：マットブラック粉体塗装</dd>
              <dt>耐荷重</dt>
              <dd>50kg</dd>
              <dt>備考</dt>
              <dd>備考を記載。</dd>
            </dl>
            </div>
          </div>
          <div class="js-panel">
            <div class="p-ttl">
              <h3 class="c-ttl--md">販売履歴</h3>
            </div>
            <div class="c-box">
              <p>温かみのある杉無垢材の天板と、マットブラックの鉄脚を組み合わせた、シンプルモダンなデザインのテーブルです。</p>
              <p>杉は、美しい木目や表情豊かな節が特徴の、明るい雰囲気の木材。木目を生かしてカッティングされた、 厚みのある杉無垢材を丁寧に組み合わせて、品のある天板に仕上げています。木肌のナチュラルな風合いが好きな方におすすめです。</p>
              <p>ダイニングテーブルにもワークスペース用のデスクにもぴったりのこちらのテーブルは、サイズオーダーが無料。空間や利用人数、用途に合わせて、テーブルの長さをカスタムオーダーできます。天板と合わせるテーブル脚のセレクションも充実。</p>
              <p>KANADEMONO では、シンプルでミニマルモダンなアイアン脚を多く取り揃えています。</p>
              <p>空間にフィットするサイズの天板と、お好みのアイアン脚を組み合わせて、オリジナルのテーブルをオーダーしてみませんか。</p>
            </div>
          </div>
          <div class="js-panel">
            <div class="p-ttl">
              <h3 class="c-ttl--md">メモ</h3>
            </div>
            <textarea></textarea>
            <div class="u-mt--8">
              <button class="f-btn">メモを保存する</button>
            </div>
          </div>
        </section>
      </section>
    </div>
  </div>
@endsection