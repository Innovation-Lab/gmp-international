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
                          <input id="date" placeholder="<?php echo date('Y/m/d'); ?>" class="required" name="purchase_date" type="text" value="{{ old('purchase_date') }}" style=" @error('purchase_date') background: #FFE0E6; border: #C30E2E 1px solid; @enderror">
                        </div>
                        @error('purchase_date')
                        <div class="c-txt c-txt--err">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </li>
                  <!-- ブランド名 -->
                  <li class="p-formList__item js-insert-list-brand">
                    <div class="p-formList__content">
                      <div class="p-formList__label">
                          <p class="c-txt">ブランド名 <span class="c-txt c-txt--must">必須</span></p>
                      </div>
                      <div class="p-formList__data">
                        <div class="c-input c-input--select">
                          <select name="m_brand_id" onchange="getTyArray('brand', $(this).val(), $(this).data('insert'));" data-insert="product" style=" @error('m_brand_id') background: #FFE0E6; border: #C30E2E 1px solid; @enderror">
                            <option value="" selected>ブランドを選択してください</option>
                            @foreach($brands as $k => $v)
                              <option value="{{ $k }}" {{ old('m_brand_id') == $k ? 'selected' : '' }}>{{ $v }}</option>
                            @endforeach
                          </select>
                        </div>
                        @error('m_brand_id')
                          <div class="c-txt c-txt--err">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </li>
                  <!-- 製品名 -->
                  <li class="p-formList__item js-insert-list-product">
                    <div class="p-formList__content">
                      <div class="p-formList__label">
                          <p class="c-txt">製品名 <span class="c-txt c-txt--must">必須</span></p>
                      </div>
                      <div class="p-formList__data">
                        <div class="c-input c-input--select">
                          <select name="m_product_id" onchange="getTyArray('product', $(this).val(), $(this).data('insert'));" data-insert="brand" style=" @error('m_product_id') background: #FFE0E6; border: #C30E2E 1px solid; @enderror">
                            <option value="" selected>製品を選択してください</option>
                            @foreach($products as $k => $v)
                              <option value="{{ $k }}" {{ old('m_product_id') == $k ? 'selected' : '' }}>{{ $v }}</option>
                            @endforeach
                          </select>
                        </div>
                        @error('m_product_id')
                          <div class="c-txt c-txt--err">{{ $message }}</div>
                        @enderror
                      </div>
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
                      <div class="p-formList__data parent-element">
                        <div class="c-input c-input--select">
                          <select name="m_color_id">
                            <option value="" selected>カラーを選択してください</option>
                            @foreach($colors as $k => $v)
                              <option value="{{ $k }}" {{ old('m_color_id') == $k ? 'selected' : '' }}>{{ $v }}</option>
                            @endforeach
                            <option value="other">上記以外のカラー</option>
                          </select>
                        </div>
                        <!-- 上記以外のカラー選択時のフォーム -->
                        <div style="display:none;" class="p-formList__content p-formList__other open-other-text-input">
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
                  <li class="p-formList__item js-insert-guide-click">
                    @if (old('product_code'))
                      <div class="p-formList__content">
                        <div class="p-formList__label">
                          <p class="c-txt">シリアルナンバー</p>
                          <div class="p-formList__guide">
                            <a class="p-formList__guide__btn" data-micromodal-trigger="modal__guide--serial" role="button"></a>
                          </div>
                        </div>
                        <div class="p-formList__data">
                          <input placeholder="例）GMP0123456" class="required js-serial" name="product_code" type="name" value="{{ old('product_code') }}" onchange="searchSerial($(this).val());">
                        </div>
                      </div>
                    @endif
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
                      <div class="p-formList__data parent-element">
                        <div class="c-input c-input--select">
                          <select name="m_shop_id">
                            <option value="" selected>購入店舗を選択してください</option>
                            @foreach($shops as $k => $v)
                              <option value="{{ $k }}" {{ old('m_shop_id') == $k ? 'selected' : '' }}>{{ $v }}</option>
                            @endforeach
                            <option value="other">上記以外の店舗</option>
                          </select>
                        </div>
                        <!-- 上記以外の店舗選択時のフォーム -->
                        <div style="display:none;" class="p-formList__content p-formList__other open-other-text-input">
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


  {{-- 日付選択 --}}
  <script>
    $(function() {
      $('.c-input--date input').datepicker();
      otherTextBind();

        $.get({
            url: '/mypage/js-get-serial-guide-type',
            data: {
                'id': {{ old('product_code', '') }},
            },
            success: function (response) {
                if(!undefined && !null) {
                    let insert ='      <div class="p-formList__content"> ' +
                        '          <div class="p-formList__label"> ' +
                        '              <p class="c-txt">シリアルナンバー</p> ' +
                        '              <div class="p-formList__guide"> ' +
                        '                  <a class="p-formList__guide__btn" onclick="$(\'#modal__guide--serial-'+ response +'\').show()" role="button"></a> ' +
                        '              </div> ' +
                        '          </div> ' +
                        '          <div class="p-formList__data"> ' +
                        '              <input placeholder="例）GMP0123456" class="required js-serial" name="product_code" type="text" value="" onchange="searchSerial($(this).val());" > ' +
                        '          </div> ' +
                        '      </div> ';

                    console.log(insert);
                    let place = '.js-insert-guide-click';
                    console.log(place);
                    $(place).empty().append(insert);
                }
            }
        });
    });

    function otherTextBind() {
        $('select').change(function() {
            // 選択されたオプションの値を取得
            var selectedValue = $(this).val();

            if (selectedValue === 'other') {
                $(this).closest('.parent-element').find('.open-other-text-input').css('display', 'block');
            } else {
                $(this).closest('.parent-element').find('.open-other-text-input').css('display', 'none');
            }
        });
    }
  </script>

  <script>
      // 共通処理
      function getTyArray(
          key,
          value = '',
          insert = ''
      ) {
          $.get({
              url: '/mypage/js-get-tying-array',
              data: {
                  'key_name': key,
                  'id': value,
              },
              success: function (response) {
                  console.log(response);
                  let place = '.js-insert-list-' + insert;
                  console.log(place);
                  $(place).empty().append(response);

              }
          });

          if (key == 'product') {
              $.get({
                  url: '/mypage/js-get-serial-guide-type',
                  data: {
                      'id': value,
                  },
                  success: function (response) {
                      if(!undefined && !null) {
                          let insert ='      <div class="p-formList__content"> ' +
                              '          <div class="p-formList__label"> ' +
                              '              <p class="c-txt">シリアルナンバー</p> ' +
                              '              <div class="p-formList__guide"> ' +
                              '                  <a class="p-formList__guide__btn" onclick="$(\'#modal__guide--serial-'+ response +'\').show()" role="button"></a> ' +
                              '              </div> ' +
                              '          </div> ' +
                              '          <div class="p-formList__data"> ' +
                              '              <input placeholder="例）GMP0123456" class="required js-serial" name="product_code" type="text" value="" onchange="searchSerial($(this).val());" > ' +
                              '          </div> ' +
                              '      </div> ';

                          console.log(insert);
                          let place = '.js-insert-guide-click';
                          console.log(place);
                          $(place).empty().append(insert);

                      }
                  }
              });
          }
      }
  </script>
  <script>
      // 共通処理
      function searchSerial(
          code = ''
      ) {
          $.get({
              url: '/register/js-search-serial',
              data: {
                  'code': code,
              },
              success: function (response) {
                  if (response) {
                      let place = '.js-serial';
                      $(place).val('');
                      alert('既に使われているシリアルコードですので登録できません。');
                  }
              }
          });
      }
  </script>
@endsection