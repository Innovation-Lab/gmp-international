<div class="p-create__main__box__head">
  <h3 class="p-create__main__box__head__title">
  登録製品追加
  </h3>
</div>
{{-- @if(Route::current()->getName() == 'admin.products.create-products') --}}
{{-- <div class="p-form__title">
  <p>製品1</p>
</div> --}}
{{-- @else
@endif --}}
<div class="l-grid__2 l-grid__2--xl" style="gap: 1.5rem 2rem;">
  <div class="l-grid__item">
    <ul class="p-formList">
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label optional">
            購入日
          </div>
          <div class="p-formList__data" style="width: 50%; display: block;">
            {!! Form::date('purchase_date', null, ['placeholder' => '0000/00/00']) !!}
            @error('purchase_date')
              <p class="error">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </li>
      <li class="p-formList__item js-insert-list-brand">
        <div class="p-formList__content">
          <div class="p-formList__label optional">
            ブランド名
          </div>
          <div class="p-formList__data" style="display: block;">
            <select name="m_brand_id" class="select2 js-ty-brand"
             onchange="getTyArray('brand', $(this).val(), $(this).data('insert'));" data-insert="product">
              <option value="" hidden>選択してください</option>
              @foreach ($brands as $k => $v)
                <option value="{{ $k }}" {{ old('m_brand_id') == $k ? 'selected' : '' }}>{{ $v }}</option>
              @endforeach
            </select>
            @error('m_brand_id')
              <p class="error">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </li>
      <li class="p-formList__item js-insert-list-product">
        <div class="p-formList__content">
          <div class="p-formList__label optional">
            製品名
          </div>
          <div class="p-formList__data" style="display: block;">
            <select name="m_product_id"
            class="select2 required js-ty-product" onchange="
            getTyArray('product', $(this).val(), $(this).data('insert'));
            getTyColorArray($(this).val(), $(this).data('color'));"
            data-insert="brand" data-color="color">
              <option value="" hidden>選択してください</option>
              @foreach ($products as $k => $v)
                <option value="{{ $k }}" {{ old('m_product_id') == $k ? 'selected' : '' }}>{{ $v }}</option>
              @endforeach
            </select>
            @error('m_product_id')
              <p class="error">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            購入者
          </div>
          <div class="p-formList__data" style="display: block;">
            <input type="text" id="user_search" placeholder="例）キーワードで検索">
            @error('user_id')
            <p class="error">{{ $message }}</p>
            @enderror
          </div>
          <div class="p-formList__data js-insert-user"></div>
        </div>
      </li>
    </ul>
  </div>

  <script>
    $(function() {
        $('#user_search').on('change', function(e) {
            let target = $(this).val();
            $.get({
                url: '/admin/js-get-user',
                data: {
                    'keyword': target,
                },
                success: function (response) {
                    $('.js-insert-user').empty().append(response);
                    $('.select2').select2({
                        placeholder: '選択してください'
                    });
                }
            });
        })
    })
  </script>
  <div class="l-grid__item">
    <ul class="p-formList">
      <li class="p-formList__item js-insert-list-color">
        <div class="p-formList__content">
          <div class="p-formList__label">
            カラー
          </div>
          <div class="p-formList__data">
            <select name="m_color_id" class="js-ty-color" disabled>
              <option value="" selected>先に製品を選択してください</option>
              @foreach ($colors as $k => $v)
                <option value="{{ $k }}" {{ old('m_color_id') == $k ? 'selected' : '' }}>{{ $v }}</option>
              @endforeach
              <option value="other" @if(old('m_color_id') == 'other') selected @endif>上記以外のカラー</option>
            </select>
          </div>
        </div>
      </li>
      <!-- 上記以外のカラー選択時のフォーム -->
      <li style="@if(old('m_color_id') == 'other') display:block; @else display:none; @endif" class="p-formList__item p-formList__other m_color">
        <div class="p-formList__content open-other-text-input">
          <div class="p-formList__label">上記以外のカラー</div>
          <div class="p-formList__data">
            <input placeholder="例）赤" class="" name="other_color_name" type="text" value="{{ old('other_color_name') }}">
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            シリアルナンバー
          </div>
          <div class="p-formList__data">
            {!! Form::text('product_code', old('product_code'), ['placeholder' => '例）GMP123456789']) !!}
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            購入店舗
          </div>
          <div class="p-formList__data">
            <select name="m_shop_id" class="select2">
              <option value="" hidden>選択してください</option>
              @foreach ($shops as $k => $v)
                <option value="{{ $k }}" {{ old('m_shop_id') == $k ? 'selected' : '' }}>{{ $v }}</option>
              @endforeach
              <option value="other" @if(old('m_shop_id') == 'other') selected @endif>上記以外の店舗</option>
            </select>
          </div>
        </div>
      </li>
      <!-- 上記以外の店舗選択時のフォーム -->
      <li style="@if(old('m_shop_id') == 'other') display:block; @else display:none; @endif" class="p-formList__item p-formList__other m_shop">
        <div class="p-formList__content open-other-text-input">
          <div class="p-formList__label">上記以外の店舗</div>
          <div class="p-formList__data">
            <input placeholder="例）アカチャンホンポ○○店" class="required" name="other_shop_name" type="text" value="{{ old('other_shop_name') }}">
          </div>
        </div>
      </li>
      {{--<li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            ステータス
          </div>
          <div class="p-formList__data">
            <select name="store" class="select2">
              <option value="" hidden>選択してください</option>
              <option value="store1">登録済み</option>
              <option value="store2">未登録</option>
            </select>
          </div>
        </div>
      </li>--}}
    </ul>
  </div>
  <div class="l-grid__item" style="grid-column: 1/3;">
    <ul class="p-formList">
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            管理メモ
          </div>
          <div class="p-formList__content__data">
            <textarea name="memo" placeholder="修正対応や報告事項を記載してください。"class="c-scroll">{{ old('memo') }}</textarea>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>
{{-- フォームの表示切り替え --}}
<script>
  // $('select').on('keydown keyup keypress change click lord',function(){
  //     if($(this).val() == 'other'){
  //         $(this).parents('.p-formList').find('.p-formList__other', '.m_shop', '.m_color').css('display','grid');
  //     }else{
  //         $(this).parents('.p-formList').find('.p-formList__other', '.m_shop', '.m_color').hide();
  //     }
  // }).change();

  $('select[name="m_shop_id"], select[name="m_color_id"]').on('change', function() {
    var colorValue = $('select[name="m_color_id"]').val();
    var shopValue = $('select[name="m_shop_id"]').val();

    if (colorValue == 'other') {
      $('.p-formList__other.m_color').css('display', 'grid');
    } else {
      $('.p-formList__other.m_color').hide();
    }
    
    if (shopValue == 'other') {
        $('.p-formList__other.m_shop').css('display', 'grid');
    } else {
        $('.p-formList__other.m_shop').hide();
    }
});
</script>

  {{-- 紐付け配列の取得 --}}
  <script>
      // 共通処理
      function getTyArray(
          key,
          value = '',
          insert = '',
      ) {
        $.get({
            url: '/admin/js-get-tying-array',
            data: {
                'key_name': key,
                'id': value,
            },
            success: function (response) {
              let place = '.js-insert-list-' + insert;
              console.log('テスト');
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
      }

      function getTyColorArray(
          value = '',
          insert = '',
      ) {
        $.get({
            url: '/admin/js-get-tying-color-array',
            data: {
                'id': value,
            },
            success: function (response) {
                let place = '.js-insert-list-' + insert;
                console.log(place);
                $(place).empty().append(response);
                $('select.js-ty-color').on('change', function() {
                  if( $(this).val() != 0 && $(this).val() != '' && $(this).val()  != undefined ){
                        $(this).css('color', '#000');
                    }else{
                        $(this).css('color', '');
                    }
                    
                  var colorValue = $('select[name="m_color_id"]').val();
                  var shopValue = $('select[name="m_shop_id"]').val();

                  if (colorValue == 'other') {
                    $('.p-formList__other.m_color').css('display', 'grid');
                  } else {
                    $('.p-formList__other.m_color').hide();
                  }
                  
                  if (shopValue == 'other') {
                      $('.p-formList__other.m_shop').css('display', 'grid');
                  } else {
                      $('.p-formList__other.m_shop').hide();
                  }
              });

            }
        });
      }
  </script>