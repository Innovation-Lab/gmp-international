<div class="p-create__main__box__head">
  <h3 class="p-create__main__box__head__title">
  登録製品の追加
  </h3>
</div>
{{-- @if(Route::current()->getName() == 'admin.products.create-products') --}}
<div class="p-form__title">
  <p>製品1</p>
</div>
{{-- @else
@endif --}}
<div class="l-grid__2 l-grid__2--xl" style="gap: 1.5rem 2rem;">
  <div class="l-grid__item">
    <ul class="p-formList">
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            購入日
          </div>
          <div class="p-formList__data">
            {!! Form::date('purchase_date', null, ['placeholder' => '0000/00/00']) !!}
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            ブランド名
          </div>
          <div class="p-formList__data">
            <select name="brand" class="select2">
              <option value="" hidden>選択してください</option>
              <option value="brand1">AIRBUGGY</option>
              <option value="brand2">AIRBUGGY1</option>
              <option value="brand3">AIRBUGGY2</option>
            </select>
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            製品名
          </div>
          <div class="p-formList__data">
            <select name="brand" class="select2">
              <option value="" hidden>選択してください</option>
              <option value="product1">COCO PREMIER FROM BIRTH</option>
              <option value="product2">COCO PREMIER FROM BIRTH 1</option>
              <option value="product3">COCO PREMIER FROM BIRTH 2</option>
            </select>
          </div>
        </div>
      </li>
      {{--<li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            登録番号
          </div>
          <div class="p-formList__data">
            {!! Form::text('register_number', 'AB01-097M-HIUA', ['placeholder' => '例）AB01097MHIUA']) !!}
          </div>
        </div>
      </li>--}}
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
            <select name="color" class="select2">
              <option value="" hidden>選択してください</option>
              <option value="color1">Red</option>
              <option value="color2">Blue</option>
              <option value="color3">Green</option>
            </select>
          </div>
        </div>
      </li>
      <!-- 上記以外のカラー選択時のフォーム -->
      <li class="p-formList__item" style="display:none;">
        <div class="p-formList__content p-formList__other open-other-text-input">
          <div class="p-formList__label">上記以外のカラー</div>
          <div class="p-formList__data">
            <input placeholder="例）赤" class="" name="products[1][other_color_name]" type="text" value="{{ old('products[1][other_color_name"]') }}">
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            シリアルナンバー
          </div>
          <div class="p-formList__data">
            {!! Form::text('serial_number', null, ['placeholder' => '例）GMP123456789']) !!}
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            購入店舗
          </div>
          <div class="p-formList__data">
            <select name="store" class="select2">
              <option value="" hidden>選択してください</option>
              <option value="store1">エアバギー代官山店</option>
              <option value="store2">エアバギー渋谷店</option>
              <option value="store3">エアバギー新宿店</option>
            </select>
          </div>
        </div>
      </li>
      <!-- 上記以外の店舗選択時のフォーム -->
      <li class="p-formList__item" style="display:none;">
        <div class="p-formList__content p-formList__other open-other-text-input">
          <div class="p-formList__label">上記以外の店舗</div>
          <div class="p-formList__data">
            <input placeholder="例）アカチャンホンポ○○店" class="required" name="other_shop_name" type="text" value="">
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
            <textarea placeholder="修正対応や報告事項を記載してください。" class="c-scroll"></textarea>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>