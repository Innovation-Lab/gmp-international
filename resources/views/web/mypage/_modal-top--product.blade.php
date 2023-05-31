<div class="modal micromodal-slide" id="modal-top--product-{{ $sales_product->id }}" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1">
    <div class="modal__container modal__container--thin modal__container--min" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <div class="modal__box">
        <main class="modal__content" id="modal-1-content">
          <header class="modal__header modal__header--column">
            <h2 class="modal__title c-txt--center" id="modal-1-title">
              登録製品編集
            </h2>
          </header>
          <div class="modal__content__body">
            <!-- 登録製品 -->
            <form method="POST" action="{{ route('mypage.update', $sales_product) }}" id="SalesProductSubmitForm-{{ $sales_product->id }}">
              @csrf
              <input type="hidden" name="sales_product_id" value="{{ $sales_product->id }}">
              <ul class="p-formList">
                <!-- 購入日 -->
                <li class="p-formList__item">
                  <div class="p-formList__content">
                    <div class="p-formList__label">
                        <p class="c-txt">購入日 <span class="c-txt c-txt--must">必須</span></p>
                    </div>
                    <div class="p-formList__data">
                      <div class="c-input c-input--date" style="width: 100%">
                        <input placeholder="<?php echo date('Y/m/d'); ?>" class="required" name="purchase_date" type="text" value="{{ old('purchase_date', data_get($sales_product, 'purchase_date')) }}">
                      </div>
                      @error('purchase_date')
                        <div class="c-txt--err">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </li>
                <!-- ブランド名 -->
                <li class="p-formList__item js-insert-list-brand-{{ $sales_product->id }}">
                  <div class="p-formList__content">
                    <div class="p-formList__label">
                        <p class="c-txt">ブランド名 <span class="c-txt c-txt--must">必須</span></p>
                    </div>
                    <div class="p-formList__data">
                      <div class="c-input c-input--select">
                        <select name="m_brand_id" onchange="getTyArray('brand', $(this).val(), $(this).data('insert'), {{ $sales_product->id }});" data-insert="product">
                          <option value="" selected>ブランドを選択してください</option>
                          @foreach($brands as $k => $v)
                            <option value="{{ $k }}" {{ old('m_brand_id', $sales_product->mProduct->mBrand->id) == $k ? 'selected' : '' }}>{{ $v }}</option>
                          @endforeach
                        </select>
                      </div>
                      @error('m_brand_id')
                        <div class="c-txt--err">{{ $message }}</div>
                      @enderror
                    </div>
                    <p style="display: none;" class="c-txt c-txt--err">ブランドを選択してください。</p>
                  </div>
                </li>
                <!-- 製品名 -->
                <li class="p-formList__item js-insert-list-product-{{ $sales_product->id }}">
                  <div class="p-formList__content">
                    <div class="p-formList__label">
                        <p class="c-txt">製品名 <span class="c-txt c-txt--must">必須</span></p>
                    </div>
                    <div class="p-formList__data">
                      <div class="c-input c-input--select">
                        <select name="m_product_id" onchange="getTyArray('product', $(this).val(), $(this).data('insert'), {{ $sales_product->id }});" data-insert="brand" >
                          <option value="" selected>製品を選択してください</option>
                          @foreach($products as $k => $v)
                            <option value="{{ $k }}" {{ old('m_product_id', data_get($sales_product, 'm_product_id')) == $k ? 'selected' : '' }}>{{ $v }}</option>
                          @endforeach
                        </select>
                      </div>
                      @error('m_product_id')
                        <div class="c-txt--err">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </li>
                <!-- カラー -->
                <li class="p-formList__item">
                  <div class="p-formList__content">
                    <div class="p-formList__label p-formList__label--modal">
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
                            <option value="{{ $k }}" {{ old('m_color_id', data_get($sales_product, 'm_color_id')) == $k ? 'selected' : '' }}>{{ $v }}</option>
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
                          <input placeholder="例）赤" class="required" name="other_color_name" type="name" value="{{ old('other_color_name', data_get($sales_product, 'm_color_id') != 'other' ? '' : data_get($sales_product, 'other_color_name')) }}">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- シリアルナンバー -->
                <li class="p-formList__item js-insert-guide-click-{{ $sales_product->id }}">
                  @if ($sales_product->hasSerialSpace())
                    <div class="p-formList__content">
                      <div class="p-formList__label p-formList__label--modal">
                        <p class="c-txt">シリアルナンバー</p>
                        <div class="p-formList__guide">
                          <a class="p-formList__guide__btn" data-micromodal-trigger="modal__guide--serial-{{ data_get($sales_product, 'mProduct.serial_guide_type') }}" role="button"></a>
                        </div>
                      </div>
                      <div class="p-formList__data">
                        <input placeholder="例）GMP0123456" class="required" name="product_code" type="name" value="{{ old('product_code', data_get($sales_product, 'product_code')) }}">
                      </div>
                    </div>
                  @endif
                </li>
                <!-- 購入店舗 -->
                <li class="p-formList__item">
                  <div class="p-formList__content">
                    <div class="p-formList__label p-formList__label--modal">
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
                            <option value="{{ $k }}" {{ old('m_shop_id', data_get($sales_product, 'm_shop_id')) == $k ? 'selected' : '' }}>{{ $v }}</option>
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
                          <input placeholder="例）アカチャンホンポ○○店" class="required" name="other_shop_name" type="name" value="{{ old('other_shop_name', data_get($sales_product, 'm_shop_id') != 'other' ? '' : data_get($sales_product, 'other_shop_name')) }}">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </form>
          </div>
          <div class="modal__content__foot">
            <div class="p-btnWrap p-btnWrap--center">
              <button class="c-btn c-btn--back" aria-label="Close modal" data-micromodal-close>戻る</button>
              <button type="submit" class="c-btn c-btn--accent" form="SalesProductSubmitForm-{{ $sales_product->id }}">登録する</button>
            </div>
            <div class="p-btnWrap p-btnWrap--center">
              <button class="c-btn c-btn--text" data-micromodal-trigger="modal-delete--product-{{ $sales_product->id }}" role="button">削除する</button>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
</div>
{{-- 削除モーダル --}}
@include('web.mypage.product._modal-delete--product')