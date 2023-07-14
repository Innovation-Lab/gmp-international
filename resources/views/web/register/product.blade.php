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
          <div class="l-stack l-stack--product add_product" id="">
            <div class="l-stack__item">
              <input type="hidden" name="is_skip" id="is_skip_input" value="0">
              <!-- 登録製品 -->
              <ul class="p-formList" style="margin-bottom: 40px;">
                <!-- 購入日 -->
                <li class="p-formList__item">
                  <div class="p-formList__ttl">
                    <p class="c-ttl">製品1</p>
                  </div>
                  <div class="p-formList__content">
                    <div class="p-formList__label">
                      <p class="c-txt">購入日 <span class="c-txt c-txt--must">必須</span></p>
                    </div>
                    <div class="p-formList__data">
                      <div class="c-input c-input--date">
                        <input placeholder="<?php echo date('Y/m/d'); ?>" class="required add-input--date1" name="products[1][purchase_date]" type="text" value="{{ old('products[1][purchase_date"]') }}">
                      </div>
                    </div>
                  </div>
                </li>
                <!-- ブランド名 -->
                <li class="p-formList__item js-insert-list-brand-1">
                  <div class="p-formList__content">
                    <div class="p-formList__label">
                      <p class="c-txt">ブランド名 <span class="c-txt c-txt--must">必須</span></p>
                    </div>
                    <div class="p-formList__data">
                      <div class="c-input c-input--select">
                        <select name="products[1][m_brand_id]" class="js-ty-brand select2" onchange="getTyArray('brand', $(this).val(), $(this).data('loop'), $(this).data('insert'));" data-loop="1" data-insert="product" data-placeholder="ブランドを選択してください">
                          <option value="" selected>ブランドを選択してください</option>
                          @foreach($brands as $k => $v)
                            <option value="{{ $k }}">{{ $v }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <p style="display: none;" class="c-txt c-txt--err">ブランドを選択してください。</p>
                  </div>
                </li>
                <!-- 製品名 -->
                <li class="p-formList__item js-insert-list-product-1" >
                  <div class="p-formList__content">
                    <div class="p-formList__label">
                      <p class="c-txt">製品名 <span class="c-txt c-txt--must">必須</span></p>
                    </div>
                    <div class="p-formList__data ">
                      <div class="c-input c-input--select">
                        <select name="products[1][m_product_id]" class="required js-ty-product select2" onchange="
                          getTyArray('product', $(this).val(), $(this).data('loop'), $(this).data('insert'));
                          getTyColorArray($(this).val(), $(this).data('loop'), $(this).data('color'));
                          "
                          data-loop="1" data-insert="brand" data-color="color" data-placeholder="製品を選択してください"
                        >
                          <option value="" selected>製品を選択してください</option>
                          @foreach($products as $k => $v)
                            <option value="{{ $k }}">{{ $v }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- カラー -->
                <li class="p-formList__item js-insert-list-color-1">
                  <div class="p-formList__content">
                    <div class="p-formList__label p-formList__label--guide">
                      <p class="c-txt">カラー</p>
                      <div class="p-formList__guide">
                        <a class="p-formList__guide__btn" onclick="$('#modal__guide--color').show()" role="button"></a>
                      </div>
                    </div>
                    <div class="p-formList__data parent-element">
                      <div class="c-input c-input--select">
                        <select name="products[1][m_color_id]" class="js-ty-color select2" disabled data-placeholder="先に製品を選択してください">
                          <option value="" selected>先に製品を選択してください</option>
                          @foreach($colors as $k => $v)
                            <option value="{{ $k }}">{{ $v }}</option>
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
                          <input placeholder="例）赤" class="" name="products[1][other_color_name]" type="text" value="{{ old('products[1][other_color_name"]') }}">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- シリアルナンバー -->
                <li class="p-formList__item js-insert-guide-click-1">
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
                        <select name="products[1][m_shop_id]" class="select2" data-placeholder="購入店舗を選択してください">
                          <option value="" selected>購入店舗を選択してください</option>
                          @foreach($shops as $k => $v)
                            <option value="{{ $k }}">{{ $v }}</option>
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
                          <input placeholder="例）アカチャンホンポ○○店" class="" name="products[1][other_shop_name]" type="text" value="{{ old('products[1][other_shop_name"]') }}">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
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
          $('select').each(function(index, elem) {
              if( $(elem).val() != 0 && $(elem).val()  != '' && $(elem).val()  != undefined ){
                  $(elem).css('color', '#000');
              }else{
                  $(elem).css('color', '');
              }
          });

          var dateClass = '.add-input--date' + 1;
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
          var num = 2;

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

          function otherTextBind() {
              $('select').change(function() {
                  // 選択されたオプションの値を取得
                  var selectedValue = $(this).val();

                  if( selectedValue != 0 && selectedValue != '' && selectedValue != undefined ){
                      $(this).css('color', '#000');
                  }else{
                      $(this).css('color', '');
                  }

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
                  function addForm() {
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

                      var selectProductHtml = '<select name="products['+ num +']['+ 'm_product_id' +']" class="js-ty-product select2" onchange="getTyArray(\'product\', $(this).val(), $(this).data(\'loop\'), $(this).data(\'insert\')); getTyColorArray($(this).val(), $(this).data(\'loop\'), $(this).data(\'color\'));" data-insert="brand" data-color="color" data-loop="'+ num +'">' +
                        '<option value="" selected>製品を選択してください</option>';

                      $.each(products, function(key, value) {
                          selectProductHtml += '<option value="' + key + '">' + value + '</option>';
                      });
                      selectProductHtml += '</select>';

                      var selectColorHtml = '<select class="select2 js-ty-color" name="products['+ num +']['+ 'm_color_id' +']" data-loop="'+ num +'" disabled>' +
                          '<option value="" selected>先に製品を選択してください</option>';

                      $.each(colors, function(key, value) {
                          selectColorHtml += '<option value="' + key + '">' + value + '</option>';
                      });
                      selectColorHtml += '<option value="other">上記以外のカラー</option>';
                      selectColorHtml += '</select>';

                      var selectShopHtml = '<select class="select2" name="products['+ num +']['+ 'm_shop_id' +']">' +
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
                      '                  <a class="p-formList__guide__btn" onclick="$(\'#modal__guide--shop\').show()" role="button"></a>' +
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
          insert = '',
      ) {
        $.get({
            url: '/register/js-get-tying-array',
            data: {
                'key_name': key,
                'id': value,
                'loop': loop,
            },
            success: function (response) {
                let place = '.js-insert-list-' + insert + '-' + loop;
                $(place).empty().append(response);
                $('select').each(function(index, elem) {
                    if( $(elem).val() != 0 && $(elem).val()  != '' && $(elem).val()  != undefined ){
                        $(elem).css('color', '#000');
                    }else{
                        $(elem).css('color', '');
                    }
                })
                $('.select2').select2({
                    placeholder: '選択してください'
                });
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

                      let place = '.js-insert-guide-click-' + loop;
                        $(place).empty().append(insert);
                    } else {
                        let place = '.js-insert-guide-click-' + loop;
                        $(place).empty();
                    }

                },
                error: function(xhr, status, error) {
                    let place = '.js-insert-guide-click-' + loop;
                    $(place).empty();
                }

            });
        }
      }

      function getTyColorArray(
          value = '',
          loop = '',
          insert = '',
      ) {
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
                $(".js-ty-color").select2({
                  placeholder: '選択してください',
                  templateResult: function (idioma) {
                    var $span = $('<div class="p-list__data"><div class="c-image" style="background: url(img/color/'+idioma.id+'.png)"></div><p class="title">'+idioma.text+'</p></div>');
                    return $span;
                  },
                  templateSelection: function (idioma) {
                    var $span = $('<div class="p-list__data"><div class="c-image" style="background: url(img/color/'+idioma.id+'.png)"></div><p class="title">'+idioma.text+'</p></div>');
                    return $span;
                  }
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
                      $(place).val('');
                      alert('既に使われているシリアルコードですので登録できません。');
                  }
              }
          });
      }
  </script>

@endsection