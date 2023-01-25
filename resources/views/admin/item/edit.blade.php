@extends('admin.layout._page-default')
@section('title', '商品詳細')
@section('content')
  <div class="l-main__head">
    @component('admin.component._head')
      @slot('main')
      <a href="{{route('admin.item')}}" class="c-btn--goast">
        <svg>
          <use xlink:href="#chevron-left"/>
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
      <a href="{{route('admin.item.detail')}}">THE TABLE / 杉無垢材 × Black Steel</a>
      <p>商品情報の編集</p>
    </div>
    
    <form action="" class="f-form">
      <div class="p-page">
        <div class="p-page__head">
          <h2 class="c-ttl--lg">
            基本情報の編集
            @if(false)
              <buttton class="c-btn--sm">変更を保存する</buttton>
            @else
              <a href="{{route('admin.news')}}" class="c-btn--sm">変更を保存する</a>
            @endif
          </h2>
          <div class="c-div u-mb24"></div>
        </div>
        <div class="p-page__cnt">
          <div class="f-item">
            <label class="f-label required">商品名</label>
            <input type="text" placeholder="商品名を入力" value="THE TABLE / 杉無垢材 × Black Steel">
          </div>
          <div class="f-item">
            <label class="f-label required">商品説明</label>
            <textarea style="height: 320px;" placeholder="商品説明を入力">
温かみのある杉無垢材の天板と、マットブラックの鉄脚を組み合わせた、シンプルモダンなデザインのテーブルです。

杉は、美しい木目や表情豊かな節が特徴の、明るい雰囲気の木材。木目を生かしてカッティングされた、 厚みのある杉無垢材を丁寧に組み合わせて、品のある天板に仕上げています。木肌のナチュラルな風合いが好きな方におすすめです。

ダイニングテーブルにもワークスペース用のデスクにもぴったりのこちらのテーブルは、サイズオーダーが無料。空間や利用人数、用途に合わせて、テーブルの長さをカスタムオーダーできます。天板と合わせるテーブル脚のセレクションも充実。

KANADEMONO では、シンプルでミニマルモダンなアイアン脚を多く取り揃えています。

空間にフィットするサイズの天板と、お好みのアイアン脚を組み合わせて、オリジナルのテーブルをオーダーしてみませんか。
            </textarea>
          </div>
          <div class="f-item">
            <label class="f-label optional">サイズ</label>
            <textarea name="" id="">
・天板の幅・奥行きはお好きなサイズでオーダー可能
・テーブルの高さ：700 mm※Square H70：730 mm
・アジャスターの高さ：10 mm〜</textarea>
          </div>
          <div class="f-item">
            <label class="f-label optional">天板厚み</label>
            <input type="text" value="30mm"> 
          </div>
          <div class="f-item">
            <label class="f-label optional">素材</label>
            <input type="text" value="天板：杉無垢材 脚：スチール"> 
          </div>
          <div class="f-item">
            <label class="f-label optional">仕上げ</label>
            <input type="text" value="天板：マットウレタンニス塗装 脚：マットブラック粉体塗装"> 
          </div>
          <div class="f-item">
            <label class="f-label optional">耐荷重</label>
            <input type="text" value="50kg"> 
          </div>
          <div class="f-item">
            <label class="f-label optional">備考</label>
            <textarea name="" id="">備考欄</textarea>
          </div>
        </div>
        <div class="p-page__side">
          <div class="f-item">
            <label class="f-label required">公開</label>
            <label for="radio-1-01">
              公開
              <input type="radio" name="radio1" id="radio-1-01" checked>
            </label>
            <label for="radio-1-02">
              非公開
              <input type="radio" name="radio1" id="radio-1-02">
            </label>
          </div>
          <div class="f-item">
            <label class="f-label required">公開日時</label>
            <div class="p-grid u-gap--8" data-col="2">
              <input type="date" class="u-w100p">
              <input type="time" class="u-w100p">
            </div>
          </div>
          <div class="f-item">
            <label class="f-label optional">カテゴリー</label>
            <select name="" id="" class="u-w100p">
              <option value="">選択してください</option>
            </select>
          </div>
          <div class="f-item">
            <label class="f-label optional">アイキャッチ</label>
            <div class="f-group--file">
              <span class="f-group__label">samplesamplesamplesamplesamplesamplesamplesamplesamplesample.png 
                <span class="f-close"></span>
              </span>
              <input type="file" id="file-01">
              <label for="file-01">ファイルを選択</label>
            </div>
            <label class="f-image" for="file-01">
              <img src="https://placehold.jp/3697c7/ffffff/400x300.png?text=サムネイル" class="lg">
              <span class="f-close"></span>
            </label>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection