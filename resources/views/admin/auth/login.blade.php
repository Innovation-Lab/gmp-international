@extends('admin.layout._page-single')
@section('title', '管理画面ログイン')
@section('main-class', 'l-main--nohidden')
@section('content')
  <div class="p-main u-pb200">
    <div class="p-main__body u-align--both">
      <div class="p-main__container--sm">
        <div class="u-align--horizontal">
          <h1 class="c-h0 u-mt0 u-mb16">SAMPLE APP CMS</h1>
          <p>管理画面ログイン</p>
        </div>
        <div class="c-box--fill c-box--xl u-mt40">
          <form action="" class="f-form">
            <div class="f-item">
              <label class="f-label">メールアドレス</label>
              <input type="text" placeholder="">
            </div>
            <div class="f-item">
              <label class="f-label">パスワード</label>
              <input type="password" placeholder="">
            </div>
            <div class="f-item">
              @if(false)
                <button class="c-btn u-w100p">ログイン</button>
              @else
                <a href="{{route('admin.dashboard')}}" class="c-btn u-w100p">ログイン</a>
              @endif
            </div>
            <div class="f-item u-align--horizontal u-mt40">
              <a href="" class="c-link">パスワードをお忘れの方</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
