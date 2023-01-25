@extends('admin.layout._page-single')
@section('title', '管理画面ログイン')
@section('main-class', 'l-main--nohidden')
@section('content')
    <div class="u-w--100p u-align--both u-pb--80">
      <div class="u-max--560">
        <div class="p-ttl u-tac">
          <h1 class="c-ttl--xxxl">SAMPLE APP CMS</h1>
          <p>管理画面ログイン</p>
        </div>
        <div class="c-box--fill c-box--xl u-mt--24">
          <!-- フォーム -->
          <form action="" class="f-form">
            <div class="f-item">
              <label class="f-label">メールアドレス</label>
              <input type="text" placeholder="">
            </div>
            <div class="f-item">
              <label class="f-label">パスワード</label>
              <input type="password" placeholder="" class="is-invalid">
              <div class="f-invalid">パスワードに誤りがあります</div>
            </div>
            <div class="f-item">
              @if(false)
                <button class="c-btn--full">ログイン</button>
              @else
                <a href="{{route('admin.dashboard')}}" class="c-btn--lg u-w--100p">ログイン</a>
              @endif
            </div>
            <div class="f-item">
              <div class="u-align--vlc u-w--100p">
                <a href="{{route('admin.auth.reset')}}" class="c-link">パスワードをお忘れの方</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

@endsection
