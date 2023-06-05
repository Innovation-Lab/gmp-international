<form action="">
  <div class="p-filter">
    <div class="p-filter__body">
      <ul class="p-filterList">

        {{-- キーワード検索 --}}
        <li class="p-filterList__item">
          <div class="p-filterList__keyword">
            <input type="text" placeholder="キーワードで探す">
            <button class="c-button__search">検索する</button>
          </div>
        </li>
        {{-- 絞り込み検索 --}}
        <li class="p-filterList__item">
          <div class="c-textButton__search" data-micromodal-trigger="modal-products-fillter">絞り込み検索</div>
        </li>
        <li class="p-filterList__item is-active">
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
            <div class="p-filterList__content__foot">
              <button class="c-button__reset">リセット</button>
              <button class="c-button">適用</button>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="p-filter__action">
      <button class="c-button__reset">絞り込みをクリア</button>
    </div>
  </div>
</form>