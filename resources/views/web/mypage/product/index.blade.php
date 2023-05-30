@extends('web.layouts.pages._mypage')
@section('title', 'ホーム')
@section('class', 'body_')
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
  <div class="l-container">
    <div class="p-mypage">
      <div class="p-mypage__head">
        <div class="p-index__bar">
          <div class="p-index__ttl p-index__ttl--allItem">
            <a class="c-btn--img" href="{{ route('mypage.index') }}"><img class="c-btn--arrow" src="{{ asset('img/web/icon/back-arrow.png')}}" alt=""></a>
            <span>
              <p class="c-ttl c-ttl--xl">ALL ITEM</p>
              <p class="c-ttl">登録済み製品一覧</p>
            </span>
          </div>
          <!-- 追加登録ボタン -->
          <div class="p-index__btn">
            <a href="{{route('mypage.add')}}" class="c-btn c-btn--ghost c-btn--ghost--rd c-btn--innerIco  c-btn--innerIco--add">製品の追加登録</a>
          </div>
        </div>
      </div>
      <div class="p-mypage__body">
        <!-- 登録製品複数の場合 -->
        <ul class="p-card--list">
            @foreach ($sales_products as $sales_product)
              <li>
                <div class="p-card__item p-card__item--list">
                  <div class="p-card__info">
                    <!-- ブランド・製品名・カラー -->
                    <div class="p-card__mainData">
                      <div class="p-card__brand">
                        <p class="c-txt">{{ data_get($sales_product, 'mProduct.mBrand.name') }}</p>
                      </div>
                      <div class="p-card__product">
                        <p class="c-txt c-txt--md">{{ $sales_product->mProduct->name }}</p>
                        <p class="c-txt c-txt--sm">{{ $sales_product->mProduct->name_kana }}</p>
                      </div>
                      <div class="p-card__color">
                        <div class="c-colorBall" style="background: {{ data_get($sales_product, 'mColor.color', '#fff') }};">
                          @if (data_get($sales_product, 'mColor.second_color'))
                            <div class="c-colorBall__pallet2" style="background: {{ data_get($sales_product, 'mColor.second_color', '#fff') }};"></div>
                          @endif
                        </div>
                        <p class="c-txt">{{ data_get($sales_product, 'select_color_name', 'カラーは選択されていません。')}}</p>
                      </div>
                    </div>
                    <div class="p-card__subData p-card__subData--list">
                      <!-- 購入日・シリアルナンバー・購入店舗 -->
                      <div class="p-card__purchase p-card__purchase--all">
                        <p class="label c-txt--sm c-txt--sm--ghost">購入日</p>
                        <p class="data c-txt">{{ date('Y/m/d', strtotime(data_get($sales_product, 'purchase_date'))) }}</p>
                      </div>
                      <div class="p-card__serialNum p-card__serialNum--all">
                        <p class="label c-txt--sm c-txt--sm--ghost">シリアルNo.</p>
                        <p class="data c-txt">{{ data_get($sales_product, 'product_code', '未登録') }}</p>
                      </div>
                      <div class="p-card__store p-card__store--all">
                        <p class="label c-txt--sm c-txt--sm--ghost">購入店舗</p>
                        <p class="data c-txt">{{ data_get($sales_product, 'select_shop_name') }}</p>
                      </div>
                    </div>
                  </div>
                  <div class="p-card__other">
                    <!-- 製品画像 -->
                    <div class="p-card__img">
                      <img src="{{asset('img/web/user/sample/product_sample.png')}}" width="60px" height="75px">
                    </div>
                    <!-- 編集ボタン -->
                    <button class="modalOpen c-btn c-btn--ghost c-btn--ghost--wh js-remodal-open-{{ $sales_product->id }}" data-micromodal-trigger="modal-edit--product-{{ $sales_product->id }}" role="button">編集する</button>
                    </div>
                  </div>
              </li>
              {{-- 編集/削除 --}}
              @include('web.mypage.product._modal-edit--product',[
                'sales_product' => $sales_product
              ])
              @include('web.mypage.product._modal-delete--product', [
                'sales_product' => $sales_product
              ])
            @endforeach
        </ul>
      </div>
    </div>
    <!-- PCマイページのみ表示 -->
    <footer class="p-footer p-footer--mypage">
      <p class="c-txt--copyRight">Copyright©2023 GMP International Co., Ltd. All Right Reserved</p>
    </footer>
  </div>
</div>
{{-- 登録ガイド --}}
@include('web.components.modal._modal-guide--color')
@include('web.components.modal._modal-guide--serial')
@include('web.components.modal._modal-guide--shop')
<script>
    $(function() {
        $('select').change(function() {
            // 選択されたオプションの値を取得
            var selectedValue = $(this).val();

            if (selectedValue === 'other') {
                $(this).closest('.parent-element').find('.open-other-text-input').css('display', 'block');
            } else {
                $(this).closest('.parent-element').find('.open-other-text-input').css('display', 'none');
            }
        });
    });
</script>
<script>
    $(function() {
        $('.c-input--date input').each(function(index, elem) {
            $(this).datepicker();
        })
    });
</script>


{{-- 日付選択 --}}
<script>
    $(function() {
        otherTextBind();
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
        insert = '',
        product_id = ''
    ) {
        $.get({
            url: '/mypage/js-get-tying-array',
            data: {
                'key_name': key,
                'id': value,
            },
            success: function (response) {
                console.log(response);
                let place = '.js-insert-list-' + insert + '-' + product_id;
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
                        let place = '.js-insert-guide-click' + '-' + product_id;
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