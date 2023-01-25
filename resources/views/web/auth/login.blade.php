@extends('web.layout._page-default')
@section('title', 'ログイン')
@section('content')
  <div class="container">
    <div class="u-max--480 u-mi--a u-pt--160">
      <div class="u-align--both u-w--100p u-gap--8">
        <!-- フォーム -->
        <form action="" class="f-form u-max--480">
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