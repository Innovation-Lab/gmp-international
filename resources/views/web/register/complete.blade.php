@extends('web.layouts.pages._form')
@section('title', '会員登録完了')
@section('class', 'body_complete')
@section('content')
  <div class="l-frame__body">
    {{--エアバギー--}}
    <div class="p-formPage p-formPage--complete">
      <div class="p-formPage__complete">
        <div class="p-formPage__complete__ttl">
          <p class="c-ttl--xxl">COMPLETE</p>
          {{--airbuggy--}}
          <div class="p-formPage__complete__img p-formPage__complete__img--airbuggy" {{--style="display: none;"--}}>
            <img src="{{asset('img/web/complete/product-airbuggy.png')}}">
          </div>
          {{--britax--}}
          <div class="p-formPage__complete__img p-formPage__complete__img--britax" style="display: none;">
            <img src="{{asset('img/web/complete/product-britax.png')}}">
          </div>
          {{--dogcart--}}
          <div class="p-formPage__complete__img p-formPage__complete__img--dogcart" style="display: none;">
            <img src="{{asset('img/web/complete/product-dogcart.png')}}">
          </div>
          {{--maxicosi--}}
          <div class="p-formPage__complete__img p-formPage__complete__img--maxicosi" style="display: none;">
            <img src="{{asset('img/web/complete/product-maxicosi.png')}}">
          </div>
          {{--veer--}}
          <div class="p-formPage__complete__img p-formPage__complete__img--veer" style="display: none;">
            <img src="{{asset('img/web/complete/product-veer.png')}}">
          </div>
        </div>
        <div class="p-formPage__complete__txt">
          <p class="c-ttl c-txt--center">会員情報を登録完了しました。</p>
          <p class="c-description c-txt--center">
            ご登録いただいたメールアドレスに会員情報を<br>
            送りましたので、ご確認ください。
          </p>
          <div class="p-btnWrap p-btnWrap--center">
            <a class="c-btn c-btn--accent" href="{{route('mypage.index')}}">マイページへ</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection