<div class="p-pagination">
  <form action="">
    <div class="p-pagination__content">
      {{-- カウント --}}
      <div class="p-pagination__count">
        <span class="p-pagination__count__start">1</span>
        <span class="p-pagination__count__end">3</span>
        <span class="p-pagination__count__amount">256</span>
      </div>
      {{-- ページ --}}
      <div class="p-pagination__page">
        <div class="p-pagination__page__numerator">
          <select>
            <option value="">1</option>
            <option value="">2</option>
            <option value="">3</option>
          </select>
        </div>
        <div class="p-pagination__page__denominator">9</div>
      </div>
      {{-- 移動 --}}
      <div class="p-pagination__transition">
        <div class="p-pagination__button--prev disabled"></div>
        <div class="p-pagination__button--next"></div>
      </div>
    </div>
  </form>
</div>