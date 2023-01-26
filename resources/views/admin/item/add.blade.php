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
        商品の新規作成
      </h2>
      @endslot
    @endcomponent
  </div>
  <div class="l-main__body">
    <div class="p-bread">
      <a href="{{route('admin.item')}}">商品管理</a>
      <p>商品の新規作成</p>
    </div>
    
    <form action="" class="f-form">
      <div class="p-page">
        <div class="p-page__head">
          <h2 class="c-ttl--lg">
            商品の基本情報
            @if(false)
              <buttton class="c-btn--sm">この内容で新規作成する</buttton>
            @else
              <a href="{{route('admin.item')}}" class="c-btn--sm">この内容で新規作成する</a>
            @endif
          </h2>
          <div class="c-div u-mb24"></div>
        </div>
        <div class="p-page__cnt">
          <div class="f-item">
            <label class="f-label required">商品名</label>
            <input type="text" placeholder="商品名を入力" value="">
          </div>
          <div class="f-item">
            <label class="f-label required">商品説明</label>
            <textarea style="height: 320px;" placeholder="商品説明を入力">
            </textarea>
          </div>
          <div class="f-item">
            <label class="f-label optional">サイズ</label>
            <textarea name="" id=""></textarea>
          </div>
          <div class="f-item">
            <label class="f-label optional">天板厚み</label>
            <input type="text" value=""> 
          </div>
          <div class="f-item">
            <label class="f-label optional">素材</label>
            <input type="text" value=""> 
          </div>
          <div class="f-item">
            <label class="f-label optional">仕上げ</label>
            <input type="text" value=""> 
          </div>
          <div class="f-item">
            <label class="f-label optional">耐荷重</label>
            <input type="text" value=""> 
          </div>
          <div class="f-item">
            <label class="f-label optional">備考</label>
            <textarea name="" id="">
              備考欄
            </textarea>
          </div>
        </div>
        <div class="p-page__side">
          <div class="f-item">
            <label class="f-label required">公開</label>
            <input type="radio" name="radio1" id="radio-1-01" checked>
            <label for="radio-1-01">公開</label>
            <input type="radio" name="radio1" id="radio-1-02">
            <label for="radio-1-02">非公開</label>
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
              <img src="https://placehold.jp/3697c7/ffffff/400x300.png?text=Upload" class="lg">
              <span class="f-close"></span>
            </label>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection