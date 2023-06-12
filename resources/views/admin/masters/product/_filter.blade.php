<form method="get" id="productMasterForm">
  <div class="p-filter">
    <div class="p-filter__body">
      <ul class="p-filterList">

        {{-- キーワード検索 --}}
        <li class="p-filterList__item">
          <div class="p-filterList__keyword">
            <input type="text" name="keyword" value="{{ request()->get('keyword') }}" placeholder="キーワードで探す">
            <button type="submit" class="c-button__search">検索する</button>
          </div>
        </li>
        {{-- 絞り込み検索 --}}
        <li class="p-filterList__item">
          <div class="c-textButton__search" data-micromodal-trigger="modal-products-fillter">絞り込み検索</div>
        </li>
      </ul>
    </div>
    <div class="p-filter__action">
      <a href="{{ route('admin.masters.product') }}" class="c-button__reset">絞り込みをクリア</a>
    </div>
  </div>
</form>