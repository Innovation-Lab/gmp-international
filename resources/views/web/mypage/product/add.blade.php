@extends('web.layouts.pages._form')
@section('title', '製品の追加登録')
@section('class', 'body_')
@section('content')
  <div class="l-frame__body">
    <div class="p-formPage">
      <div class="p-formPage__head">
        <div class="l-container">
          <div class="p-formPage__head__ttl">
            <p class="c-ttl">製品の追加登録</p>
          </div>
        </div>
      </div>
      <div class="l-container">
        <div class="p-formPage__body">
          <div class="l-stack l-stack--product">
            <div class="l-stack__item">
              <!-- 登録製品 -->
              <ul class="p-formList">
                <!-- 購入日 -->
                <li class="p-formList__item">
                  <div class="p-formList__content">
                    <div class="p-formList__label">
                        <p class="c-txt">購入日 <span class="c-txt c-txt--must">必須</span></p>
                    </div>
                    <div class="p-formList__data">
                      <div class="c-input c-input--date">
                        <input id="date" placeholder="2023/05/16" class="required" name="" type="text" value="">
                      </div>
                    </div>
                    <p style="display: none;" class="c-txt c-txt--err">「姓」を入力してください。<br>※全角で入力してください。</p>
                  </div>
                </li>
                <!-- ブランド名 -->
                <li class="p-formList__item">
                  <div class="p-formList__content">
                    <div class="p-formList__label">
                        <p class="c-txt">ブランド名 <span class="c-txt c-txt--must">必須</span></p>
                    </div>
                    <div class="p-formList__data">
                      <div class="c-input c-input--select">
                        <select name="pref">
                          <option value="" selected>ブランドを選択してください</option>
                          <option value="AIRBUGGY">AIRBUGGY</option>
                        </select>
                      </div>
                    </div>
                    <p style="display: none;" class="c-txt c-txt--err">ブランドを選択してください。</p>
                  </div>
                </li>
                <!-- 製品名 -->
                <li class="p-formList__item">
                  <div class="p-formList__content">
                    <div class="p-formList__label">
                        <p class="c-txt">製品名</p>
                    </div>
                    <div class="p-formList__data">
                      <div class="c-input c-input--select">
                        <select name="pref">
                          <option value="" selected>製品を選択してください</option>
                          <option value="COCO PREMIER FROM BIRTH">COCO PREMIER FROM BIRTH</option>
                        </select>
                      </div>
                    </div>
                    <p style="display: none;" class="c-txt c-txt--err">「セイ」を入力してください。<br>※全角カタカナで入力してください。</p>
                  </div>
                </li>
                <!-- カラー -->
                <li class="p-formList__item">
                  <div class="p-formList__content">
                    <div class="p-formList__label">
                      <p class="c-txt">カラー</p>
                      <div class="p-formList__guide">
                        <a class="p-formList__guide__btn" data-micromodal-trigger="modal__guide--color" role="button"></a>
                      </div>
                    </div>
                    <div class="p-formList__data">
                      <div class="c-input c-input--select">
                        <select name="color">
                          <option value="" selected>カラーを選択してください</option>
                          <option value="GRASS GREEN">GRASS GREEN</option>
                          <option value="other">上記以外のカラー</option>
                        </select>
                      </div>
                      <!-- 上記以外の店舗選択時のフォーム -->
                      <div style="display:none;" class="p-formList__content p-formList__other">
                        <div class="p-formList__label">
                          <p class="c-txt">「上記以外のカラー」を選択した方はこちら</p>
                        </div>
                        <div class="p-formList__data">
                          <input placeholder="例）赤" class="required" name="name" type="name" value="">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- シリアルナンバー -->
                <li class="p-formList__item">
                  <div class="p-formList__content">
                    <div class="p-formList__label">
                      <p class="c-txt">シリアルナンバー</p>
                      <div class="p-formList__guide">
                        <a class="p-formList__guide__btn" data-micromodal-trigger="modal__guide--serial" role="button"></a>
                      </div>
                    </div>
                    <div class="p-formList__data">
                      <input placeholder="例）GMP0123456" class="required" name="name" type="name" value="">
                    </div>
                  </div>
                </li>
                <!-- 購入店舗 -->
                <li class="p-formList__item">
                  <div class="p-formList__content">
                    <div class="p-formList__label">
                      <p class="c-txt">購入店舗</p>
                      <div class="p-formList__guide">
                        <a class="p-formList__guide__btn" data-micromodal-trigger="modal__guide--shop" role="button"></a>
                      </div>
                    </div>
                    <div class="p-formList__data">
                      <div class="c-input c-input--select">
                        <select name="pref">
                          <option value="" selected>購入店舗を選択してください</option>
                          <option value="エアバギー代官山店">エアバギー代官山店</option>
                          <option value="other">上記以外の店舗</option>
                        </select>
                      </div>
                      <!-- 上記以外の店舗選択時のフォーム -->
                      <div style="display:none;" class="p-formList__content p-formList__other">
                        <div class="p-formList__label">
                          <p class="c-txt">「上記以外の店舗」を選択した方はこちら</p>
                        </div>
                        <div class="p-formList__data">
                          <input placeholder="例）アカチャンホンポ○○店" class="required" name="name" type="name" value="">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            
          </div>
        </div>
        <div class="p-formPage__foot p-formPage__foot--wide">
          <div class="p-btnWrap p-btnWrap--center">
              <a href="{{route('mypage.product')}}" class="c-btn c-btn--back">戻る</a>
              <a href="{{route('mypage.confirm')}}" class="c-btn c-btn--next">確認する</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- モーダル --}}
  @include('web.components.modal._modal-guide--color')
  @include('web.components.modal._modal-guide--serial')
  @include('web.components.modal._modal-guide--shop')

  {{-- 登録製品追加 / 削除 --}}
  <script>
    //製品の追加とナンバリング
    $(document).on('click', '#js-product--add', function(){
      let Tag = $('.l-stack__item.l-stack__item--line').eq(0),
          Code = Tag.clone(),
          Num = $('.l-stack--product > .l-stack__item').length;
      $('#js-product--add').before(Code);
      $('.l-stack--product > .l-stack__item').eq(Num - 1).find('.p-formList__ttl .c-ttl').text('製品'+Num);
    });
  </script>
  <script>
    //製品の削除とナンバリング
    $(document).on('click', '.c-btn--ico--remove', function(){
      $(this).parents('.l-stack__item--line').remove();
      let Tag = $('.l-stack--product > .l-stack__item'),
          Num = Tag.length;
      Tag.each(function(){
        let This = $(this),
            Ind = This.index() + 1;
        This.find('.p-formList__ttl .c-ttl').text('製品'+Ind);
      });
    });
  </script>
  {{-- フォームの表示切り替え --}}
  <script>
    $('select').on('keydown keyup keypress change click lord',function(){    
      if($(this).val() == 'other'){
        $(this).parents('.p-formList__data').find('.p-formList__other').css('display','grid');
      }else{   
        $(this).parents('.p-formList__data').find('.p-formList__other').hide();
      }  
    }).change();
  </script>
  {{-- 日付選択 --}}
  <script>
    $(function() {
      $('.c-input--date input').datepicker();
    });
  </script>


  
@endsection