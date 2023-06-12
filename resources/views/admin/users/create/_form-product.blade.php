<div class="p-create__main__box__head">
  <h3 class="p-create__main__box__head__title">
  登録製品の追加
  </h3>
</div>
@if(Route::current()->getName() == 'admin.users.create-products')
{{-- <div class="p-form__title">
  <p>製品1</p>
</div> --}}
@else
@endif
<div class="l-grid__2 l-grid__2--xl" style="gap: 1.5rem 2rem;">
  <div class="l-grid__item">
    <ul class="p-formList">
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label optional">
            購入日
          </div>
          <div class="p-formList__data" style="display: block;">
            {!! Form::date('purchase_date', old('purchase_date'), ['placeholder' => '0000/00/00']) !!}
            @error('purchase_date')
            <p class="error">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label optional">
            ブランド名
          </div>
          <div class="p-formList__data" style="display: block;">
            <select name="m_brand_id" class="select2">
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
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label optional">
            製品名
          </div>
          <div class="p-formList__data" style="display: block;">
            <select name="m_product_id" class="select2">
              <option value="" hidden>選択してください</option>
              @foreach ($products as $k => $v)
                <option value="{{ $k }}" {{ old('m_product_id')  == $k ? 'selected' : '' }}>{{ $v }}</option>
              @endforeach
            </select>
            @error('m_product_id')
            <p class="error">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </li>
    </ul>
  </div>
  <div class="l-grid__item">
    <ul class="p-formList">
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            カラー
          </div>
          <div class="p-formList__data">
            <select name="m_color_id" class="select2">
              <option value="" hidden>選択してください</option>
              @foreach ($colors as $k => $v)
                  <option value="{{ $k }}" {{ old('m_color_id')  == $k ? 'selected' : '' }}>{{ $v }}</option>
              @endforeach
              <option value="other" @if(old('m_color_id') == 'other') selected @endif>上記以外のカラー</option>
            </select>
          </div>
        </div>
      </li>
      <!-- 上記以外のカラー選択時のフォーム -->
      <li class="p-formList__item p-formList__other other_color_name" style="display:none;">
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
          <div class="p-formList__data" style="display: block;">
            {!! Form::text('product_code', old('product_code'), ['placeholder' => '例）GMP123456789']) !!}
            @error('product_code')
            <p class="error">{{ $message }}</p>
            @enderror
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
      <li class=" p-formList__item p-formList__other other_shop_name open-other-text-input" style="display:none;">
        <div class="p-formList__content">
          <div class="p-formList__label">上記以外の店舗</div>
          <div class="p-formList__data">
            <input placeholder="例）アカチャンホンポ○○店" class="required" name="other_shop_name" type="text" value="{{ old('other_shop_name') }}">
          </div>
        </div>
      </li>
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
            <textarea name="product_memo" placeholder="修正対応や報告事項を記載してください。" class="c-scroll">{{ old('product_memo') }}</textarea>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>
{{-- フォームの表示切り替え --}}
<script>
  $('select[name="m_shop_id"], select[name="m_color_id"]').on('change', function() {
    var colorValue = $('select[name="m_color_id"]').val();
    var shopValue = $('select[name="m_shop_id"]').val();

    if (colorValue == 'other') {
      $('.p-formList__other.other_color_name').css('display', 'grid');
    } else {
      $('.p-formList__other.other_color_name').hide();
    }

    if (shopValue == 'other') {
        $('.p-formList__other.other_shop_name').css('display', 'grid');
    } else {
        $('.p-formList__other.other_shop_name').hide();
    }
  });
</script>