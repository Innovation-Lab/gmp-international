@extends('admin.layout._page-single')
@section('content')
  <div class="l-main__head">
    @component('admin.component._head')
      @slot('main')
      <a href="{{route('admin.auth.login')}}" class="c-btn--goast">
        <svg>
          <use xlink:href="#chevron-left"/>
        </svg>
      </a>
      <h2 class="c-ttl--lg">
        パスワードをお忘れの方
      </h2>
      @endslot
    @endcomponent
  </div>
  <div class="l-main__body">
    <div class="p-bread">
      <a href="{{route('admin.auth.login')}}">ログイン</a>
      <p>パスワードをお忘れの方</p>
    </div>
    <div class="u-w--100p u-align--both u-pb--100 u-mt--48">
      <div class="u-max--560">
        <div class="p-ttl u-tac">
          <h1 class="c-ttl--xxl">パスワードをお忘れの方</h1>
          <p class="c-txt--lg">パスワードをお忘れの方は、下記フォームよりパスワードの再発行を行って下さい。</p>
        </div>
        <div class="c-box--fill c-box--xl u-mt--24">
          <!-- フォーム -->
          <form action="" class="f-form">
            <div class="p-ttl u-mt--0">
              <h3 class="c-ttl u-mb--24">新しいパスワードを入力</h3>
            </div>
            <div class="f-item">
              <label class="f-label required">メールアドレス</label>
              <input type="text" placeholder="">
            </div>
            <div class="f-item">
              @if(false)
                <button class="f-btn u-w--100p">パスワード再発行のメールを送信する</button>
              @else
                <a href="{{route('admin.auth.reissue')}}" class="f-btn u-w--100p">パスワード再発行のメールを送信する</a>
              @endif
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection