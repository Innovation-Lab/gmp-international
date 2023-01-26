@extends('admin.layout._page-default')
@section('title', 'お知らせ管理')
@section('content')
  <div class="l-main__head">
    @component('admin.component._head')
      @slot('main')
      <a href="{{route('admin.news')}}" class="c-btn--goast">
        <svg>
          <use href="#chevron-left"/>
        </svg>
      </a>
      <h2 class="c-ttl--lg">
        お知らせを編集
      </h2>
      @endslot
    @endcomponent
  </div>
  <div class="l-main__body">
    <div class="p-bread">
      <a href="{{route('admin.news')}}">お知らせ管理</a>
      <p>お知らせを編集</p>
    </div>
    <form action="" class="f-form">
      <div class="p-page">
        <div class="p-page__head">
          <h2 class="c-ttl--lg">
            お知らせ
            @if(false)
              <buttton class="c-btn--sm">この内容で作成する</buttton>
            @else
              <a href="{{route('admin.news')}}" class="c-btn--sm">この内容で作成する</a>
            @endif
          </h2>
          <div class="c-div u-mb24"></div>
        </div>
        <div class="p-page__cnt">
          <div class="f-item">
            <label class="f-label required">テキスト</label>
            <input type="text" placeholder="テキスト">
          </div>
          <div class="f-item">
            <label class="f-label required">内容</label>
            <textarea style="height: 560px;" placeholder="エディタを入れる"></textarea>
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
              <img src="https://placehold.jp/3697c7/ffffff/400x300.png?text=サムネイル" class="lg">
              <span class="f-close"></span>
            </label>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection