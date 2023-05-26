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
              <form method="POST" class="h-adr" action="{{ route('mypage.add') }}" id="productAddSubmitForm">
                @csrf
                <ul class="p-formList">
                  <!-- 購入日 -->
                  <li class="p-formList__item">
                    <div class="p-formList__content">
                      <div class="p-formList__label">
                          <p class="c-txt">購入日 <span class="c-txt c-txt--must">必須</span></p>
                      </div>
                      <div class="p-formList__data">
                        <div class="c-input c-input--date" style="width: 100%;">
                          <input id="date" placeholder="<?php date_default_timezone_set('UTC'); echo date('Y/m/d'); ?>" class="required" name="purchase_date" type="text" value="{{ old('purchase_date') }}">
                          @error('purchase_date')
                          <div class="c-txt c-txt--err">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
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
                          <select value="{{ old('m_brand_id') }}" name="m_brand_id">
                            <option value="" selected>ブランドを選択してください</option>
                            @foreach($brands as $k => $v)
                              <option value="{{ $k }}" {{ old('m_brand_id') == $k ? 'selected' : '' }}>{{ $v }}</option>
                            @endforeach
                          </select>
                          @error('m_brand_id')
                            <div class="c-txt c-txt--err">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </li>
                  <!-- 製品名 -->
                  <li class="p-formList__item">
                    <div class="p-formList__content">
                      <div class="p-formList__label">
                          <p class="c-txt">製品名 <span class="c-txt c-txt--must">必須</span></p>
                      </div>
                      <div class="p-formList__data">
                        <div class="c-input c-input--select">
                          <select value="{{ old('m_product_id') }}"name="m_product_id">
                            <option value="" selected>製品を選択してください</option>
                            @foreach($products as $k => $v)
                              <option value="{{ $k }}" {{ old('m_product_id') == $k ? 'selected' : '' }}>{{ $v }}</option>
                            @endforeach
                          </select>
                          @error('m_product_id')
                            <div class="c-txt c-txt--err">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </li>
                  <!-- カラー -->
                  <li class="p-formList__item">
                    <div class="p-formList__content">
                      <div class="p-formList__label">
                        <p class="c-txt">カラー</p>
                      </div>
                      <div class="p-formList__data">
                        <div class="c-input c-input--select">
                          <select name="m_color_id">
                            <option value="" selected>カラーを選択してください</option>
                            @foreach($colors as $k => $v)
                              <option value="{{ $k }}" {{ old('m_color_id') == $k ? 'selected' : '' }}>{{ $v }}</option>
                            @endforeach
                          </select>
                        </div>
                        <!-- 上記以外のカラー選択時のフォーム -->
                        <div style="display:none;" class="p-formList__content p-formList__other">
                          <div class="p-formList__label">
                            <p class="c-txt">「上記以外のカラー」を選択した方はこちら</p>
                          </div>
                          <div class="p-formList__data">
                            <input placeholder="例）赤" class="required" name="other_color_name" type="name" value="{{ old('m_shop_id') == '9999999' ? old('other_shop_name') : '' }}">
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
                          <button class="p-formList__guide__btn" data-micromodal-trigger="modal__guide--serial" role="button"></button>
                        </div>
                      </div>
                      <div class="p-formList__data">
                        <input placeholder="例）GMP0123456" class="required" name="product_code" type="name" value="{{ old('product_code') }}">
                      </div>
                    </div>
                  </li>
                  <!-- 購入店舗 -->
                  <li class="p-formList__item">
                    <div class="p-formList__content">
                      <div class="p-formList__label">
                        <p class="c-txt">購入店舗</p>
                        <div class="p-formList__guide">
                          <button class="p-formList__guide__btn" data-micromodal-trigger="modal__guide--shop" role="button"></button>
                        </div>
                      </div>
                      <div class="p-formList__data">
                        <div class="c-input c-input--select">
                          <select name="m_shop_id">
                            <option value="" selected>購入店舗を選択してください</option>
                            @foreach($shops as $k => $v)
                              <option value="{{ $k }}" {{ old('m_shop_id') == $k ? 'selected' : '' }}>{{ $v }}</option>
                            @endforeach
                          </select>
                        </div>
                        <!-- 上記以外の店舗選択時のフォーム -->
                        <div style="display:none;" class="p-formList__content p-formList__other">
                          <div class="p-formList__label">
                            <p class="c-txt">「上記以外の店舗」を選択した方はこちら</p>
                          </div>
                          <div class="p-formList__data">
                            <input placeholder="例）アカチャンホンポ○○店" class="required" name="other_shop_name" type="name" value="{{ old('m_shop_id') == '9999999' ? old('other_shop_name') : '' }}">
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </form>
            </div>
          </div>
        </div>
        <div class="p-formPage__foot p-formPage__foot--wide">
          <div class="p-btnWrap p-btnWrap--center">
            @if(count($sales_products) > 0)
              <a href="{{route('mypage.product')}}" class="c-btn c-btn--back">戻る</a>
            @else
              <a href="{{route('mypage.index')}}" class="c-btn c-btn--back">戻る</a>
            @endif
              <button type="submit" class="c-btn c-btn--next" form="productAddSubmitForm">確認する</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- モーダル --}}
  @include('web.components.modal._modal-guide--color')
  @include('web.components.modal._modal-guide--serial')
  @include('web.components.modal._modal-guide--shop')
  
  {{-- フォームの表示切り替え --}}
  <script>
    $('select').on('keydown keyup keypress change click lord',function(){    
      if($(this).val() == '9999999'){
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