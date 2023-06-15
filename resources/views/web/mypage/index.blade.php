@extends('web.layouts.pages._mypage')
@section('title', 'マイページ')
@section('class', 'body_mypage--home')
@section('content')

<?php
  if(count($errors->all()) > 0) {
      $sales_product_id = \Session::get('sales_product_id');
      $javascriptCode = "$(document).ready(function() {
      $('.js-remodal-open-$sales_product_id').trigger('click')
    });";
      echo "<script>{$javascriptCode}</script>";
  }
?>

<div class="l-frame__body">
  <div class="p-index">
    <div class="p-index__head">
      <div class="l-container">
        <!-- タイトル -->
        <div class="p-index__bar">
          <div class="p-index__ttl">
            <p class="c-ttl c-ttl--xl">MY ITEM</p>
            <p class="c-ttl">登録済み製品</p>
          </div>
          <!-- 追加登録ボタン -->
          @if(count(data_get($user, 'salesProducts')) > 0)
            <div class="p-index__btn">
              <a href="{{route('mypage.add')}}" class="c-btn c-btn--ghost c-btn--ghost--rd c-btn--innerIco  c-btn--innerIco--add">製品の追加登録</a>
            </div>
          @endif
        </div>
        <!-- 登録製品複数の場合 -->
        @if(count($sales_products) > 0)
          <ul class="p-card">
            @foreach ($sales_products as $sales_product)
              <li>
                <div class="p-card__item">
                  <div class="p-card__box">
                    <div class="p-card__info">
                      <!-- ブランド・製品名・カラー -->
                      <div class="p-card__mainData">
                        <div class="p-card__brand">
                          <p class="c-txt">{{ data_get($sales_product, 'mProduct.mBrand.name') }}</p>
                          <!-- 編集ボタン -->
                          <button class="modalOpen c-btn c-btn--ghost c-btn--ghost--wh c-btn--ghost--wh--mypage js-remodal-open-{{ $sales_product->id }}" data-micromodal-trigger="modal-top--product-{{ $sales_product->id }}" role="button">編集する</button>
                        </div>
                        <div class="p-card__product">
                          <p class="c-txt c-txt--lg">{{ data_get($sales_product, 'mProduct.name') }}</p>
                        </div>
                        <div class="p-card__color">
                          @if (data_get($sales_product, 'mColor.image_path'))
                            {{-- 画像表示の場合 --}}
                            <div class="c-colorBall" style="background: url({{ data_get($sales_product, 'mColor.main_image_url') }})"></div>
                          @else
                            {{-- 2色の場合に追加 --}}
                            <div class="c-colorBall" style="background: {{ data_get($sales_product, 'mColor.color', '#fff')}};">
                              @if (data_get($sales_product, 'mColor.second_color'))
                                <div class="c-colorBall__pallet2" style="background: {{ data_get($sales_product, 'mColor.second_color', '#fff') }};"></div>
                              @endif
                            </div>
                          @endif
                          <p class="c-txt">
                            {{ data_get($sales_product, 'select_color_name', '未登録')}}
                          </p>
                        </div>
                      </div>
                      <div class="p-card__subData">
                        <!-- 購入日・シリアルナンバー -->
                        <div class="p-card__purchase">
                          <p class="label c-txt c-txt--sm c-txt--sm--ghost">購入日</p>
                          <p class="data c-txt">{{ date('Y/m/d', strtotime(data_get($sales_product, 'purchase_date'))) }}</p>
                        </div>
                        <!-- 購入店舗 -->
                        <div class="p-card__store">
                          <p class="label c-txt c-txt--sm c-txt--sm--ghost">購入店舗</p>
                          <p class="data c-txt">{{ data_get($sales_product, 'mShop.name', data_get($sales_product, 'other_shop_name', '未登録')) }}</p>
                        </div>
                        <div class="p-card__serialNum">
                          <p class="label c-txt c-txt--sm c-txt--sm--ghost">シリアルナンバー</p>
                          <p class="data c-txt">{{ data_get($sales_product, 'product_code', '未登録') }}</p>
                        </div>
                      </div>
                    </div>
                    <!-- 製品画像 -->
                    <div class="p-card__img p-card__img--top">
                      <img src="{{ data_get($sales_product, 'select_color_url') }}" width="110px" height="140px">
                    </div>
                  </div>
                </div>
              </li>
            @endforeach
          </ul>
        @else
          <!-- 製品未登録の場合 -->
          <a href="{{ route('mypage.add') }}">
            <ul class="p-card--notRegister">
              <li>
                <div class="p-card__item">
                  <div class="p-card__box">
                    <div class="p-card__info">
                      <!-- ブランド・製品名・カラー -->
                      <div class="p-card__mainData">
                        <div class="p-card__brand">
                          <p class="c-txt c-txt--ghost">BRAND</p>
                        </div>
                        <div class="p-card__product">
                          <p class="c-txt c-txt--lg  c-txt--lg--ghost">PRODUCT</p>
                        </div>
                        <div class="p-card__color">
                          <div class="c-colorBall c-colorBall--ghost"></div>
                          <p class="c-txt c-txt--ghost">COLOR</p>
                        </div>
                      </div>
                      <div class="p-card__subData">
                        <!-- PURCHASE DATE -->
                        <div class="p-card__purchase">
                          <p class="label c-txt c-txt--ghost">PURCHASE DATE</p>
                        </div>
                        <!-- STORE -->
                        <div class="p-card__store">
                          <p class="label c-txt c-txt--ghost">STORE DATE</p>
                        </div>
                        <!-- SERIAL NUMBER -->
                        <div class="p-card__serialNum">
                          <p class="label c-txt c-txt--ghost">SERIAL NUMBER</p>
                        </div>
                      </div>
                    </div>
                    <!-- 製品画像 -->
                    <div class="p-card__img">
                      <img src="{{asset('img/web/product/product-ghost.png')}}" width="110px" height="140px">
                    </div>
                  </div>
                  <div class="p-card__add">
                    <p class="c-ttl--xxl c-ttl--xxl--wh">ADD YOUR ITEM</p>
                    <p class="c-btn--register--rd">製品を登録する</p>
                  </div>
                </div>
              </li>
            </ul>
          </a>
        @endif
      </div>
      <!-- 一覧ページボタン -->
      <div class="p-index__btn">
        @if(count($sales_products) > 0)
          <a href="{{route('mypage.product')}}" class="c-btn c-btn--bk">登録済み製品一覧へ</a>
        @endif
      </div>
    </div>
    <div class="p-index__body">
      <div class="l-container">
        <!-- カテゴリータイトル -->
        <div class="p-index__bar">
          <div class="p-index__ttl">
            <p class="c-ttl c-ttl--xl">USER</p>
            <p class="c-ttl">会員登録情報</p>
          </div>
        </div>
        @if($user->last_name)
          <!-- ユーザー情報--登録時 -->
          <div class="p-info">
            <div class="p-info__bar">
              <div class="p-info__ttl">
                <p class="c-ttl">ユーザー情報</p>
              </div>
              <!-- 変更ボタン -->
              <div class="p-info__btn">
                <a href="{{route('mypage.user', $user)}}" class="c-btn c-btn--rd">変更する</a>
              </div>
            </div>
            <div class="p-info__txt">
              <p class="c-txt" data-ttl="お名前">{{ data_get($user, 'full_name') }}（{{ data_get($user, 'full_name_kana') }}）</p>
              <p class="c-txt" data-ttl="郵便番号">〒{{ data_get($user, 'zip_code') }}</p>
              <p class="c-txt" data-ttl="住所">{{ data_get($user, 'full_address') }}</p>
              <p class="c-txt" data-ttl="電話番号">{{ data_get($user, 'formatted_tel') }}</p>
              <p class="c-txt" data-ttl="新着情報、お得情報"><span>新着情報、お得情報</span>{{ data_get($user, 'string_dm') }}</p>
            </div>
          </div>
        @else
          <!-- ユーザー情報--未登録時 -->
          <a href="{{ route('mypage.user') }}">
            <div class="p-info--notRegister">
              <div class="p-card__add">
                <p class="c-ttl--xxl c-ttl--xxl--rd">ADD YOUR INFO</p>
                <p class="c-btn--register--rd">ユーザー情報を登録する</p>
              </div>
            </div>
          </a>
        @endif
        <!-- アカウント情報 -->
        <div class="p-info">
          <div class="p-info__bar">
            <div class="p-info__ttl">
              <p class="c-ttl">アカウント情報</p>
            </div>
            <!-- 変更ボタン -->
            <div class="p-info__btn">
              <a href="{{route('mypage.account', $user)}}" class="c-btn c-btn--rd">変更する</a>
            </div>
          </div>
          <div class="p-info__txt">
            <p class="c-txt" data-ttl="メールアドレス">{{ data_get($user, 'email') }}</p>
            <p class="c-txt" data-ttl="パスワード">パスワードはセキュリティのため非表示</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- PCマイページのみ表示 -->
  <footer class="p-footer p-footer--mypage">
    <p class="c-txt--copyRight">Copyright©2023 GMP International Co., Ltd. All Right Reserved</p>
  </footer>
</div>
@foreach ($sales_products as $sales_product)
  @include('web.mypage._modal-top--product',[
    'sales_product' => $sales_product
  ])
@endforeach
@include('web.components.modal._modal-guide--color')
@include('web.components.modal._modal-guide--serial')
@include('web.components.modal._modal-guide--shop')
<script>
  $('.p-card').slick({
    dots: true,
    infinite: false,
    speed: 300,
    slidesToShow: 1,
    centerMode: false,
    variableWidth: false,
    arrows: true,
    centerPadding: '0px',
    responsive: [
      {
        breakpoint: 768,
        settings: {
          infinite: false,
          slidesToShow: 1,
          variableWidth: false,
          arrows: false,
          centerPadding: '16px',
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          variableWidth: true,
          arrows: false,
        }
      },
      {
        breakpoint: 375,
        settings: {
          slidesToShow: 1,
          variableWidth: false,
          arrows: false,
        }
      },
    ]
  });
</script>
<script>
  $(function(){
    let Tag = $('.slick-dots'),
        Num = Tag.find('li').length,
        Pos = 62 + (Num * 18),
        Ng  = $('.p-card').innerWidth(); 
    if(Pos > Ng - 160){
      Pos = Ng - 200;
    }
    if(Tag.length > 0){
      $('.p-index__head .p-index__btn').addClass('right');
      $('.p-card .slick-arrow.slick-next').css('left',Pos+'px');
    }
  });
</script>
<script>
    $(function() {
        $('.c-input--date input').each(function(index, elem) {
            $(this).datepicker();
        })

        $('select').each(function(index, elem) {
            if( $(elem).val() != 0 && $(elem).val()  != '' && $(elem).val()  != undefined ){
                $(elem).css('color', '#000');
            }else{
                $(elem).css('color', '');
            }
        })
    });
</script>

{{-- 日付選択 --}}
<script>
    $(function() {
        othertextbind();
    });

    function othertextbind() {
        $('select').change(function() {
            // 選択されたオプションの値を取得
            var selectedvalue = $(this).val();

            if( selectedvalue != 0 && selectedvalue != '' && selectedvalue != undefined ){
                $(this).css('color', '#000');
            }else{
                $(this).css('color', '');
            }

            if (selectedvalue === 'other') {
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
        insert = '',
        product_id = ''
    ) {
        $.get({
            url: '/mypage/js-get-tying-array',
            data: {
                'key_name': key,
                'id': value,
                'sales_id': product_id,
            },
            success: function (response) {
                let place = '.js-insert-list-' + insert + '-' + product_id;
                $(place).empty().append(response);

                othertextbind();

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
                url: '/mypage/js-get-serial-guide-type',
                data: {
                    'id': value,
                },
                success: function (response) {
                    if(response != 'undefined' && response != null && response != '') {
                        let insert ='      <div class="p-formlist__content"> ' +
                            '          <div class="p-formlist__label"> ' +
                            '              <p class="c-txt">シリアルナンバー</p> ' +
                            '              <div class="p-formlist__guide"> ' +
                            '                  <a class="p-formlist__guide__btn" onclick="$(\'#modal__guide--serial-'+ response +'\').show()" role="button"></a> ' +
                            '              </div> ' +
                            '          </div> ' +
                            '          <div class="p-formlist__data"> ' +
                            '              <input placeholder="例）gmp0123456" class="required js-serial" name="product_code" type="text" value="" onchange="searchserial($(this).val());" > ' +
                            '          </div> ' +
                            '      </div> ';
                        let place = '.js-insert-guide-click' + '-' + product_id;
                        $(place).empty().append(insert);
                    } else {
                        let place = '.js-insert-guide-click-' + product_id;
                        $(place).empty()
                    }
                }
            });
        }
    }
</script>
<script>
    // 共通処理
    function searchserial(
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