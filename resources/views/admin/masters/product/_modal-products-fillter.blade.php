<div class="modal micromodal-slide" id="modal-products-fillter" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1">
    <div class="modal__container md" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <header class="modal__header">
        <h2 class="modal__title" id="modal-1-title">
          絞り込み検索
        </h2>
      </header>
      <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      <main class="modal__content" id="modal-1-content">
        {{-- フォーム --}}
        {!! Form::open(['class' => 'p-form']) !!}
          <ul class="p-formList u-gap--16">
            <li class="p-formList__item">
              <div class="l-grid__1 l-grid__gap1">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    ブランド名
                  </div>
                  <div class="p-formList__data w-348">
                    <select name="brand" class="select2">
                      <option value="a" >選択してください</option>
                      <option value="brand1">AIRBUGGY</option>
                      <option value="brand2">AIRBUGGY1</option>
                      <option value="brand3">AIRBUGGY2</option>
                    </select>
                  </div>
                </div>
              </div>
            </li>
            <li class="p-formList__item">
              <div class="l-grid__1 l-grid__gap1">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    製品名
                  </div>
                  <div class="p-formList__data w-348">
                    <select name="brand" class="select2">
                      <option value="a" >選択してください</option>
                      <option value="product1">COCO PREMIER FROM BIRTH</option>
                      <option value="product2">COCO PREMIER FROM BIRTH 1</option>
                      <option value="product3">COCO PREMIER FROM BIRTH 2</option>
                    </select>
                  </div>
                </div>
              </div>
            </li>
            <li class="p-formList__item">
              <div class="l-grid__1 l-grid__gap1">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    カラー
                  </div>
                  <div class="p-formList__data w-348">
                    <select name="brand" class="select2">
                      <option value="a" >選択してください</option>
                      <option value="product1">ブロッサム</option>
                      <option value="product2">グラスグリーン</option>
                      <option value="product3">レッド</option>
                    </select>
                  </div>
                </div>
              </div>
            </li>
        {{--<li class="p-filterList__item is-active">
              <div class="p-filterList__label">
                ブランド
                <span>1</span>
              </div>
              <div class="p-filterList__content">
                <div class="p-filterList__content__body">
                  <input type="checkbox" name="brand" id="brand_airbuggy" checked>
                  <label for="brand_airbuggy">AIRBUGGY</label>
                  <input type="checkbox" name="brand" id="brand_airbuggy_pet">
                  <label for="brand_airbuggy_pet">AIRBUGGY.Pet</label>
                  <input type="checkbox" name="brand" id="brand_maxi_cosi">
                  <label for="brand_maxi_cosi">MAXI-COSI</label>
                  <input type="checkbox" name="brand" id="brand_britax">
                  <label for="brand_britax">britax</label>
                  <input type="checkbox" name="brand" id="brand_veer">
                  <label for="brand_veer">veer</label>
                </div>
              </div>
            </li>--}}
          </ul>
        {!! Form::close() !!}
      </main>
      <footer class="modal__footer">
        <button class="modal__btn" data-micromodal-close>戻る</button>
        <button  class="modal__btn-primary">絞り込む</button>
      </footer>
    </div>
  </div>
</div>