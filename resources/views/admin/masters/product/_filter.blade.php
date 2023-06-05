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
      </ul>
    </div>
    <div class="p-filter__action">
      <button class="c-button__reset">絞り込みをクリア</button>
    </div>
  </div>
</form>