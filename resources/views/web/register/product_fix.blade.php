@extends('web.layouts.pages._form')
@section('title', '購入製品の登録')
@section('class', 'body_')
@section('content')
  <div class="l-frame__body">
    <div class="p-formPage">
      <div class="p-formPage__head">
        <div class="l-container">
          <!-- ステップ2 -->
          <div class="p-formPage__step">
            <ul class="p-step">
              <li class="p-step__item p-step__item--complete">
                <p class="c-txt c-txt--step">STEP1</p>
              </li>
              <li class="p-step__item p-step__item--complete">
                <p class="c-txt c-txt--step">STEP2</p>
              </li>
              <li class="p-step__item p-step__item--current">
                <p class="c-txt c-txt--step">STEP3</p>
              </li>
            </ul>
          </div>
          <div class="p-formPage__head__ttl">
            <p class="c-ttl">購入製品の登録</p>
          </div>
        </div>
      </div>
      <div class="l-container">
        <div class="p-formPage__body">
          {{--<div class="skip">
            <a class="c-btn c-btn--text c-btn--text--bk " onclick="addHiddenFieldAndSubmit()">
              後で登録する
            </a>
          </div>--}}
          <form method="POST" action="{{ route('register.store.product') }}" id="productStoreForm">
          @csrf
          @foreach($sales_products as $count => $sales_product)
            <div class="l-stack l-stack--product @if($count > 1) l-stack__item--line @endif add_product" id="">
              <div class="l-stack__item">
                <input type="hidden" name="is_skip" id="is_skip_input" value="0">
                <!-- 登録製品 -->
                <ul class="p-formList" style="margin-bottom: 40px;">
                  <!-- 購入日 -->
                  <li class="p-formList__item">
                    <div class="p-formList__ttl">
                      <p class="c-ttl">製品{{ $count }}</p>
                      @if($count > 1)
                        <div class="p-btnWrap">
                          <p class="c-btn c-btn--ico c-btn--ico--remove">削除</p>
                        </div>
                      @endif
                    </div>
                    <div class="p-formList__content">
                      <div class="p-formList__label">
                        <p class="c-txt">購入日 <span class="c-txt c-txt--must">必須</span></p>
                      </div>
                      <div class="p-formList__data">
                        <div class="c-input c-input--date">
                          <input placeholder="<?php echo date('Y/m/d'); ?>" class="required add-input--date1"  name="products[{{ $count }}][purchase_date]" type="text" value="{{ data_get($sales_product, 'purchase_date') }}" style=" @error('products.'.$count.'.purchase_date') background: #FFE0E6; border: #C30E2E 1px solid; @enderror">
                        </div>
                        @error('products.'.$count.'.purchase_date')
                          <div class="c-txt c-txt--err">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </li>
                  <!-- ブランド名 -->
                  <li class="p-formList__item js-insert-list-brand-{{ $count }}">
                    <div class="p-formList__content">
                      <div class="p-formList__label">
                        <p class="c-txt">ブランド名 <span class="c-txt c-txt--must">必須</span></p>
                      </div>
                      <div class="p-formList__data">
                        <div class="c-input c-input--select">
                          <select name="products[{{ $count }}][m_brand_id]" class="js-ty-brand select2" onchange="getTyArray('brand', $(this).val(), $(this).data('loop'), $(this).data('insert'));" data-loop="{{ $count }}" data-insert="product" style=" @error('products.'.$count.'.m_brand_id') background: #FFE0E6; border: #C30E2E 1px solid; @enderror">
                            <option value="" selected>ブランドを選択してください</option>
                            @foreach($brands as $k => $v)
                              <option value="{{ $k }}" @if(data_get($sales_product, 'm_brand_id') == $k) selected @endif>{{ $v }}</option>
                            @endforeach
                          </select>
                        </div>
                        @error('products.'.$count.'.m_brand_id')
                          <div class="c-txt c-txt--err">{{ $message }}</div>
                        @enderror
                      </div>
                      <p style="display: none;" class="c-txt c-txt--err">ブランドを選択してください。</p>
                    </div>
                  </li>
                  <!-- 製品名 -->
                  <li class="p-formList__item js-insert-list-product-{{ $count }}" >
                    <div class="p-formList__content">
                      <div class="p-formList__label">
                        <p class="c-txt">製品名 <span class="c-txt c-txt--must">必須</span></p>
                      </div>
                      <div class="p-formList__data ">
                        <div class="c-input c-input--select">
                          <select name="products[{{ $count }}][m_product_id]" class="required js-ty-product select2" onchange="
                              getTyArray('product', $(this).val(), $(this).data('loop'), $(this).data('insert'));
                              getTyColorArray($(this).val(), $(this).data('loop'), $(this).data('color'));
                            "
                            data-loop="1" data-insert="brand" data-color="color" data-placeholder="製品を選択してください"
                          >
{{--                          <select name="products[{{ $count }}][m_product_id]" class="required js-ty-product select2" onchange="getTyArray('product', $(this).val(), $(this).data('loop'), $(this).data('insert'));" data-loop="{{ $count }}" data-insert="brand" style=" @error('products.'.$count.'.m_product_id') background: #FFE0E6; border: #C30E2E 1px solid; @enderror">--}}
                            <option value="" selected>製品を選択してください</option>
                            @foreach($products as $k => $v)
                              <option value="{{ $k }}" @if(data_get($sales_product, 'm_product_id') == $k) selected @endif>{{ $v }}</option>
                            @endforeach
                          </select>
                        </div>
                        @error('products.'.$count.'.m_product_id')
                          <div class="c-txt c-txt--err">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </li>
                  <!-- カラー -->
                  <li class="p-formList__item js-insert-list-color-{{ $count }}">
                    <div class="p-formList__content">
                      <div class="p-formList__label p-formList__label--guide">
                        <p class="c-txt">カラー</p>
                        <div class="p-formList__guide">
                          <a class="p-formList__guide__btn" onclick="$('#modal__guide--color').show()" role="button"></a>
                        </div>
                      </div>
                      @php
                        $color_array = [];
                        $product = \App\Models\MProduct::find(data_get($sales_product, 'm_product_id'));
                        if($product) {
                            $color_array = explode(',', data_get($product, 'color_array'));
                        }
                      @endphp
                      <div class="p-formList__data parent-element">
                        <div class="c-input c-input--select">
                          <select name="products[{{ $count }}][m_color_id]" class="js-ty-color select2">
                            <option value="" selected>カラーを選択してください</option>
                            @foreach($colors as $k => $v)
                              @if(!in_array($k, $color_array)) @continue @endif
                              <option value="{{ $k }}" @if(data_get($sales_product, 'm_color_id') == $k) selected @endif>{{ $v }}</option>
                            @endforeach
                            <option value="other" @if(old('m_color_id', data_get($sales_product, 'm_color_id')) == 'other' || data_get($sales_product, 'other_color_name')) selected @endif>上記以外のカラー</option>
                          </select>
                        </div>
                        <!-- 上記以外の店舗選択時のフォーム -->
                        <div style="@if(old('m_color_id', data_get($sales_product, 'm_color_id')) == 'other' || data_get($sales_product, 'other_color_name')) display:block; @else display:none; @endif" class="p-formList__content p-formList__other open-other-text-input">
                          <div class="p-formList__label">
                            <p class="c-txt">「上記以外のカラー」を選択した方はこちら</p>
                          </div>
                          <div class="p-formList__data">
                            <input placeholder="例）赤" class="" name="products[{{ $count }}][other_color_name]" type="text" value="{{ data_get($sales_product, 'other_color_name') }}">
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <!-- シリアルナンバー -->
                  @php
                    $guide_modal = '#modal__guide--serial-'. data_get($sales_product, 'mProduct.serial_guide_type');
                    $mProduct = new \App\Models\MProduct();
                  @endphp
                  <li class="p-formList__item js-insert-guide-click-{{ $count }}">
                    @if (data_get($sales_product, 'product_code') || $mProduct->isCheckGuide(data_get($sales_product, 'm_product_id')))
                      <div class="p-formList__content">
                        <div class="p-formList__label p-formList__label--guide">
                          <p class="c-txt">シリアルナンバー</p>
                          @if(data_get($sales_product, 'mProduct.serial_guide_type'))
                            <div class="p-formList__guide">
                              <a class="p-formList__guide__btn" onclick="$({{ $guide_modal }}).show()" role="button"></a>
                            </div>
                          @endif
                        </div>
                        <div class="p-formList__data">
                          <input placeholder="例）GMP0123456" class="js-serial-1" name="products[{{ $count }}][product_code]" type="text" value="{{ data_get($sales_product, 'product_code') }}" data-loop="1" onchange="searchSerial($(this).data('loop'), $(this).val());">
                        </div>
                    </div>
                    @endif
                  </li>
                  <!-- 購入店舗 -->
                  <li class="p-formList__item">
                    <div class="p-formList__content">
                      <div class="p-formList__label p-formList__label--guide">
                        <p class="c-txt">購入店舗 </p>
                        <div class="p-formList__guide">
                          <a class="p-formList__guide__btn" onclick="$('#modal__guide--shop').show()" role="button"></a>
                        </div>
                      </div>
                      <div class="p-formList__data parent-element">
                        <div class="c-input c-input--select">
                          <select name="products[{{ $count }}][m_shop_id]" class="select2">
                            <option value="" selected>購入店舗を選択してください</option>
                            @foreach($shops as $k => $v)
                              <option value="{{ $k }}" @if(data_get($sales_product, 'm_shop_id') == $k) selected @endif>{{ $v }}</option>
                            @endforeach
                            <option value="other" @if(old('m_shop_id', data_get($sales_product, 'm_shop_id')) == 'other' || data_get($sales_product, 'other_shop_name')) selected @endif>上記以外の店舗</option>
                          </select>
                        </div>
                        <!-- 上記以外の店舗選択時のフォーム -->
                        <div style="@if(old('m_shop_id', data_get($sales_product, 'm_shop_id')) == 'other' || data_get($sales_product, 'other_shop_name')) display:block; @else display:none; @endif" class="p-formList__content p-formList__other open-other-text-input">
                          <div class="p-formList__label">
                            <p class="c-txt">「上記以外の店舗」を選択した方はこちら</p>
                          </div>
                          <div class="p-formList__data">
                            <input placeholder="例）アカチャンホンポ○○店" class="" name="products[{{ $count }}][other_shop_name]" type="text" value="{{ data_get($sales_product, 'other_shop_name') }}">
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          @endforeach
          <div id="" class="l-stack__item">
            <!-- 登録製品追加 -->
            <a class="c-btn c-btn--ico c-btn--ico--add js-add-more-product" style="margin-top: 30px;">登録製品を追加する</a>
          </div>
        </form>
        </div>
        <div class="p-formPage__foot p-formPage__foot--wide">
          <div class="p-btnWrap p-btnWrap--center">
            <a href="{{route('register.info')}}" class="c-btn c-btn--back">戻る</a>
            <button type="submit" form="productStoreForm" class="c-btn c-btn--next">登録情報の確認へ</button>
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
              Num = $('.l-stack--product > .l-stack__item').length -1;
          $('#js-product--add').before(Code);
          $('.l-stack--product > .l-stack__item').eq(Num - 1).find('.p-formList__ttl .c-ttl').text('製品'+Num);
          $('.l-stack--product > .l-stack__item').eq(Num - 1).css('display','block')
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
          var dateClass = '.add-input--date' + 1;
          console.log(dateClass);
          $(dateClass).datepicker({
              onSelect: function(dateText) {
                  $(this).val(dateText);
              }
          });
      });
  </script>

  <script>
      function addHiddenFieldAndSubmit() {
          $("#is_skip_input").val(1);
          $("#productStoreForm").submit();
      }
  </script>

  <script>
      $(document).ready(function() {
          var num = {{ count($sales_products) + 1 }};
          //製品の削除とナンバリング
          $(document).on('click', '.c-btn--ico--remove', function(){
              num = num - 1;
              $(this).parents('.l-stack__item--line').remove();
              let Tag = $('.l-stack--product > .l-stack__item'),
                  Num = Tag.length;
              Tag.each(function(){
                  let This = $(this),
                      Ind = This.index() + 1;
                  This.find('.p-formList__ttl .c-ttl').text('製品'+Ind);
              });
          });

          $('.modal__close').on('click', function(){
              $('.modal').hide();
          });

          otherTextBind();

          $('select').each(function(index, elem) {
              if( $(elem).val() != 0 && $(elem).val()  != '' && $(elem).val()  != undefined ){
                  $(elem).css('color', '#000');
              }else{
                  $(elem).css('color', '');
              }
          })

          function otherTextBind() {
              $('select').change(function() {
                  // 選択されたオプションの値を取得
                  var selectedValue = $(this).val();

                  $('select').each(function(index, elem) {
                      if( $(elem).val() != 0 && $(elem).val()  != '' && $(elem).val()  != undefined ){
                          $(elem).css('color', '#000');
                      }else{
                          $(elem).css('color', '');
                      }
                  })

                  if (selectedValue === 'other') {
                      $(this).closest('.parent-element').find('.open-other-text-input').css('display', 'block');
                  } else {
                      $(this).closest('.parent-element').find('.open-other-text-input').css('display', 'none');
                  }
              });
          }

          $.ajax({
              url: '/register/js-get-array',
              method: 'GET',
              success: function(response) {
                  var array = response;
                  var brands = array.brands;
                  var products = array.products;
                  var colors = array.colors;
                  var shops = array.shops;
                  var selectBrandHtml = '<select name="products['+ num +']['+ 'm_brand_id' +']" class="js-ty-brand select2" onchange="getTyArray(\'brand\', $(this).val(), $(this).data(\'loop\'), $(this).data(\'insert\'));" data-insert="product" data-loop="'+ num +'">' +
                    '<option value="" selected>ブランドを選択してください</option>';

                  $.each(brands, function(key, value) {
                      selectBrandHtml += '<option value="' + key + '">' + value + '</option>';
                  });
                  selectBrandHtml += '</select>';

                  var selectProductHtml = '<select name="products['+ num +']['+ 'm_product_id' +']" class="js-ty-product select2" onchange="getTyArray(\'product\', $(this).val(), $(this).data(\'loop\'), $(this).data(\'insert\'));" data-insert="brand" data-loop="'+ num +'">' +
                    '<option value="" selected>製品を選択してください</option>';

                  $.each(products, function(key, value) {
                      selectProductHtml += '<option value="' + key + '">' + value + '</option>';
                  });
                  selectProductHtml += '</select>';

                  var selectColorHtml = '<select class="select2" name="products['+ num +']['+ 'm_color_id' +']" data-loop="'+ num +'">' +
                      '<option value="" selected>カラーを選択してください</option>';

                  $.each(colors, function(key, value) {
                      selectColorHtml += '<option value="' + key + '">' + value + '</option>';
                  });
                  selectColorHtml += '<option value="other">上記以外のカラー</option>';
                  selectColorHtml += '</select>';

                  var selectShopHtml = '<select class="select2" "name="products['+ num +']['+ 'm_shop_id' +']">' +
                      '<option value="" selected>購入店舗を選択してください</option>';

                  $.each(shops, function(key, value) {
                      selectShopHtml += '<option value="' + key + '">' + value + '</option>';
                  });
                  selectShopHtml += '<option value="other">上記以外の店舗</option>';
                  selectShopHtml += '</select>';

                  var today = new Date();
                  var year = today.getFullYear();
                  var month = String(today.getMonth() + 1).padStart(2, '0');
                  var day = String(today.getDate()).padStart(2, '0');

                  var formattedDate = year + '/' + month + '/' + day;

                  function addForm() {
                      var newForm = '<div class="l-stack__item l-stack__item--line add_product" id="" style="">' +
                      '<!-- 登録製品追加 -->' +
                      '<ul class="p-formList">' +
                      '<!-- 購入日 -->' +
                      '<li class="p-formList__item">' +
                      '    <div class="p-formList__ttl"> ' +
                      '        <p class="c-ttl">製品'+ num +'</p> ' +
                      '        <div class="p-btnWrap"> ' +
                      '            <p class="c-btn c-btn--ico c-btn--ico--remove">削除</p> ' +
                      '        </div> ' +
                      '    </div> ' +
                      '    <div class="p-formList__content"> ' +
                      '        <div class="p-formList__label"> ' +
                      '            <p class="c-txt">購入日 <span class="c-txt c-txt--must">必須</span></p> ' +
                      '        </div> ' +
                      '        <div class="p-formList__data"> ' +
                      '            <div class="c-input c-input--date"> ' +
                      '                <input placeholder="'+ formattedDate +'" class="required add-input--date'+ num + '" name="products['+ num +']['+ 'purchase_date' +']" type="text" value=""> ' +
                      '            </div> ' +
                      '        </div> ' +
                      '    </div> ' +
                      '</li> ' +
                      '<!-- ブランド名 --> ' +
                      '  <li class="p-formList__item js-insert-list-brand-'+ num +'"> ' +
                      '      <div class="p-formList__content"> ' +
                      '          <div class="p-formList__label"> ' +
                      '              <p class="c-txt">ブランド名 <span class="c-txt c-txt--must">必須</span></p> ' +
                      '          </div> ' +
                      '          <div class="p-formList__data"> ' +
                      '              <div class="c-input c-input--select"> ' +
                                        selectBrandHtml +
                      '              </div> ' +
                      '          </div> ' +
                      '      </div> ' +
                      '  </li> ' +
                      '<!-- 製品名 --> ' +
                      '  <li class="p-formList__item js-insert-list-product-'+ num +'"> ' +
                      '      <div class="p-formList__content"> ' +
                      '          <div class="p-formList__label"> ' +
                      '              <p class="c-txt">製品名 <span class="c-txt c-txt--must">必須</span></p> ' +
                      '          </div> ' +
                      '          <div class="p-formList__data"> ' +
                      '              <div class="c-input c-input--select"> ' +
                                        selectProductHtml +
                      '              </div> ' +
                      '          </div> ' +
                      '      </div> ' +
                      '  </li> ' +
                      '<!-- カラー --> ' +
                      '  <li class="p-formList__item js-insert-list-color-'+ num +'"> ' +
                      '      <div class="p-formList__content"> ' +
                      '          <div class="p-formList__label p-formList__label--guide"> ' +
                      '              <p class="c-txt">カラー</p> ' +
                      '              <div class="p-formList__guide"> ' +
                      '                  <a class="p-formList__guide__btn" onclick="$(\'#modal__guide--color\').show()" role="button"></a> ' +
                      '              </div> ' +
                      '          </div> ' +
                      '          <div class="p-formList__data parent-element"> ' +
                      '              <div class="c-input c-input--select"> ' +
                                        selectColorHtml +
                      '              </div> ' +
                      '            <!-- 上記以外の店舗選択時のフォーム --> ' +
                      '              <div style="display:none;" class="p-formList__content p-formList__other open-other-text-input"> ' +
                      '                  <div class="p-formList__label"> ' +
                      '                      <p class="c-txt">「上記以外のカラー」を選択した方はこちら</p> ' +
                      '                  </div> ' +
                      '                  <div class="p-formList__data"> ' +
                      '                      <input placeholder="例）赤" class="required" name="products['+ num +']['+ 'other_color_name' +']" type="text" value=""> ' +
                      '                  </div> ' +
                      '              </div> ' +
                      '          </div> ' +
                      '      </div> ' +
                      '  </li> ' +
                      '<!-- シリアルナンバー --> ' +
                      '  <li class="p-formList__item js-insert-guide-click-'+ num +'"> ' +
                      '  </li> ' +
                      '<!-- 購入店舗 --> ' +
                      '  <li class="p-formList__item"> ' +
                      '      <div class="p-formList__content"> ' +
                      '          <div class="p-formList__label p-formList__label--guide"> ' +
                      '              <p class="c-txt">購入店舗</p> ' +
                      '              <div class="p-formList__guide"> ' +
                      '                  <a class="p-formList__guide__btn" onclick="$(\'#modal__guide--shop\').show() role="button"></a> ' +
                      '              </div> ' +
                      '          </div> ' +
                      '          <div class="p-formList__data parent-element"> ' +
                      '              <div class="c-input c-input--select"> ' +
                                        selectShopHtml +
                      '              </div> ' +
                      '            <!-- 上記以外の店舗選択時のフォーム --> ' +
                      '              <div style="display:none;" class="p-formList__content p-formList__other open-other-text-input"> ' +
                      '                  <div class="p-formList__label"> ' +
                      '                      <p class="c-txt">「上記以外の店舗」を選択した方はこちら</p> ' +
                      '                  </div> ' +
                      '                  <div class="p-formList__data"> ' +
                      '                      <input placeholder="例）アカチャンホンポ○○店" class="required" name="products['+ num +']['+ 'other_shop_name' +']" type="text" value=""> ' +
                      '                  </div> ' +
                      '              </div> ' +
                      '          </div> ' +
                      '      </div> ' +
                      '  </li> ' +
                      '</ul>' +
                      '</div>';

                      $('.add_product').last().after(newForm);

                      $('.select2').select2({
                          placeholder: '選択してください'
                      });

                      otherTextBind();

                      var dateClass = '.add-input--date' + num;
                      console.log(dateClass);
                      $(dateClass).datepicker({
                          onSelect: function(dateText) {
                              $(this).val(dateText);
                          }
                      });

                      $('.modal__close').on('click', function(){
                          $('.modal').hide();
                      });

                      num++;
                  }

                  $('.js-add-more-product').on('click', function() {
                      addForm();
                  });
              }
          });
      });
  </script>

  {{-- 紐付け配列の取得 --}}
  <script>
      // 共通処理
      function getTyArray(
          key,
          value = '',
          loop = '',
          insert = ''
      ) {
        $.get({
            url: '/register/js-get-tying-array',
            data: {
                'key_name': key,
                'id': value,
                'loop': loop,
            },
            success: function (response) {
                console.log(response);
                let place = '.js-insert-list-' + insert + '-' + loop;
                console.log(place);
                $(place).empty().append(response);
                $('select').each(function(index, elem) {
                    if( $(elem).val() != 0 && $(elem).val()  != '' && $(elem).val()  != undefined ){
                        $(elem).css('color', '#000');
                    }else{
                        $(elem).css('color', '');
                    }
                })
            }
        });

          if (key == 'product') {
              $.get({
                  url: '/register/js-get-serial-guide-type',
                  data: {
                      'id': value,
                  },
                  success: function (response) {
                      if(Object.keys(response).length > 0) {
                          let insert ='      <div class="p-formList__content"> ' +
                              '          <div class="p-formList__label p-formList__label--guide"> ' +
                              '              <p class="c-txt">シリアルナンバー</p> ' +
                              '              <div class="p-formList__guide"> ' +
                              '                  <a class="p-formList__guide__btn" onclick="$(\'#modal__guide--serial-'+ response +'\').show()" role="button"></a> ' +
                              '              </div> ' +
                              '          </div> ' +
                              '          <div class="p-formList__data"> ' +
                              '              <input placeholder="例）GMP0123456" class="required js-serial-'+ loop +'" name="products['+ loop +']['+ 'product_code' +']" type="text" value="" data-loop="'+ loop +'" onchange="searchSerial( $(this).data(\'loop\'), $(this).val());" > ' +
                              '          </div> ' +
                              '      </div> ';

                          console.log(insert);
                          let place = '.js-insert-guide-click-' + loop;
                          console.log(place);
                          $(place).empty().append(insert);
                      } else {
                          let place = '.js-insert-guide-click-' + loop;
                          $(place).empty()
                      }

                  }
              });
          }
      }

      function getTyColorArray(
          value = '',
          loop = '',
          insert = '',
      ) {
          console.log(value);
          $.get({
              url: '/register/js-get-tying-color-array',
              data: {
                  'id': value,
                  'loop': loop,
              },
              success: function (response) {
                  let place = '.js-insert-list-' + insert + '-' + loop;
                  console.log(place);
                  $(place).empty().append(response);
                  $('select.js-ty-color.select2').on('change', function() {
                      if( $(this).val() != 0 && $(this).val() != '' && $(this).val()  != undefined ){
                          $(this).css('color', '#000');
                      }else{
                          $(this).css('color', '');
                      }

                      if ($(this).val() === 'other') {
                          $(this).closest('.parent-element').find('.open-other-text-input').css('display', 'block');
                      } else {
                          $(this).closest('.parent-element').find('.open-other-text-input').css('display', 'none');
                      }
                  })
                  $('.select2').select2({
                      placeholder: '選択してください'
                  });

              }
          });
      }
  </script>

  {{-- シリアルナンバーの判定 --}}
  <script>
      // 共通処理
      function searchSerial(
          loop,
          code = '',
      ) {
          $.get({
              url: '/register/js-search-serial',
              data: {
                  'code': code,
                  'loop': loop,
              },
              success: function (response) {
                  if (response) {
                      let place = '.js-serial-'+ loop;
                      console.log(place);
                      $(place).val('');
                      alert('既に使われているシリアルコードですので登録できません。');
                  }
              }
          });
      }
  </script>
  <script>
    function changeColor(hoge){
      if( hoge.value == 0 ){
        hoge.style.color = '';
      }else{
        hoge.style.color = '#000';
      }
    }
  </script>

@endsection