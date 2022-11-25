@extends('admin.layout._page-default')
@section('content')
  <div class="p-main">
    <div class="p-main__head">
      <div class="p-main__head__main">
        <div class="p-main__head__main__txt">
          <h2 class="p-main__head__main__txt__ttl">
            ダッシュボード
          </h2>
          <div class="p-main__head__main__txt__act">
            <a href="" class="c-btn--sm">商品を新規追加</a>
          </div>
        </div>
        <div class="p-main__head__main__act">
          <div class="p-main__account">
            <span></span>
            <p class="p-main__account__name">
              sample@example.com
            </p>
            <div class="p-main__account__act">
              <a href="">
                <svg class="icon">
                  <use xlink:href="#dot"/>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
      <form action="" class="p-main__head__form">
        <input type="text" placeholder="キーワード">
      </form>
    </div>
    <div class="p-main__body">
      ボディ
    </div>
  </div>
@endsection
