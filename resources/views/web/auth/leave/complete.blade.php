@extends('web.layouts.pages._form')
@section('title', '退会完了')
@section('class', 'body_complete')
@section('content')
  <div class="l-frame__body">
    {{--エアバギー--}}
    <div class="p-formPage p-formPage--complete">
      <div class="p-formPage__complete">
        <div class="p-formPage__complete__txt">
          <p class="c-ttl--lg c-txt--center">退会が完了しました。</p>
          <p class="c-description c-txt--center">サービスのご利用ありがとうございました。</p>
          <div class="p-btnWrap p-btnWrap--center">
            <a class="c-btn c-btn--accent" href="">トップへ</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection