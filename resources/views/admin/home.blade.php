@extends('admin.layout._page-default')
@section('content')
  <div class="p-main">
    @component('admin.component._main-head')
      @slot('main')
      <h2 class="p-main__head__main__txt__ttl">
        ダッシュボード
      </h2>
      @endslot
      @slot('sub')
        <form action="" class="p-main__head__form">
          <div class="p-main__head__search">
            <input type="text" placeholder="キーワード">
          </div>
          <div class="p-main__head__filter js-accordion">
            <div class="p-main__head__filter__item ">
              <button type="button" class="p-main__head__filter__btn">
                <dl>
                  <dt>並び替え</dt>
                  <dd>日付昇順</dd>
                </dl>
              </button>
              <div class="p-main__head__filter__content">
                <div class="p-main__head__filter__main">
                  <select style="width: 100%;">
                    <option value="">日付昇順</option>
                    <option value="">日付降順</option>
                  </select>
                </div>
                <div class="p-main__head__filter__action">
                  <button class="c-btn--sm">リセット</button>
                  <button class="c-btn--sm">適用する</button>
                </div>
              </div>
            </div>
            <div class="p-main__head__filter__item">
              <button type="button" class="p-main__head__filter__btn">
                <dl>
                  <dt>カテゴリー</dt>
                  <dd>すべて</dd>
                </dl>
              </button>
              <div class="p-main__head__filter__content">
                <div class="p-main__head__filter__main">
                  <select style="width: 100%;">
                    <option value="">日付昇順</option>
                    <option value="">日付降順</option>
                  </select>
                </div>
                <div class="p-main__head__filter__action">
                  <button class="c-btn--sm">リセット</button>
                  <button class="c-btn--sm">適用する</button>
                </div>
              </div>
            </div>
            <div class="p-main__head__filter__item">
              <button type="button" class="p-main__head__filter__btn">
                <dl>
                  <dt>金額</dt>
                  <dd>すべて</dd>
                </dl>
              </button>
              <div class="p-main__head__filter__content">
                <div class="p-main__head__filter__main">
                  <input type="checkbox">
                  <label for="">123</label>
                  <input type="checkbox">
                  <label for="">123</label>
                </div>
                <div class="p-main__head__filter__action">
                  <button class="c-btn--sm">リセット</button>
                  <button class="c-btn--sm">適用する</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      @endslot
    @endcomponent
    <div class="p-main__body">
      ボディ
    </div>
  </div>
@endsection