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
        <ul class="p-formList u-gap--16">
          <li class="p-formList__item">
            <div class="l-grid__1 l-grid__gap1">
              <div class="p-formList__content">
                <div class="p-formList__label">
                  ブランド名
                </div>
                <div class="p-formList__data w-348">
                  <select name="m_brand_id" class="select2" form="productMasterForm">
                    <option value="" selected>選択してください</option>
                    @foreach($brands as $k => $v)
                      <option value="{{ $k }}" @if(old('m_brand_id') == $k) selected @endif>{{ $v }}</option>
                    @endforeach
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
                  <select name="m_color_id" class="select2" form="productMasterForm">
                    <option value="" selected>選択してください</option>
                    @foreach($colors as $k => $v)
                      <option value="{{ $k }}" @if(old('m_color_id') == $k) selected @endif>{{ $v }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </main>
      <footer class="modal__footer">
        <button class="modal__btn" data-micromodal-close>戻る</button>
        <button form="productMasterForm" class="modal__btn-primary">絞り込む</button>
      </footer>
    </div>
  </div>
</div>