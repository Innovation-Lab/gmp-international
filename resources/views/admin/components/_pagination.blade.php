<div class="p-pagination">
    <div class="p-pagination__content">
      {{-- カウント --}}
      <div class="p-pagination__count">
        <span class="p-pagination__count__start">{{ number_format($paginate->firstItem()) }}</span>
        <span class="p-pagination__count__end">{{ number_format($paginate->lastItem()) }}</span>
        <span class="p-pagination__count__amount">{{ number_format($paginate->total()) }}</span>
      </div>
      {{-- ページ --}}
      <div class="p-pagination__page">
        <div class="p-pagination__page__numerator">
          <select onchange="window.location.href = this.value;">
            @if (request()->get('page'))
              @foreach (range(1, $paginate->lastPage()) as $page)
                <option value="{{ str_replace('page='.request()->get('page', 1), 'page='.$page, url()->full()) }}" {{ $paginate->currentPage() === $page ? 'selected' : '' }}>{{ $page }}</option>
              @endforeach
            @else
              @foreach (range(1, $paginate->lastPage()) as $page)
                <option value="{{ count(request()->all()) > 0 ? url()->full().'&page='.$page : str_replace('page='.request()->get('page', 1), 'page='.$page, url()->full().'?page='.$page) }}" {{ $paginate->currentPage() === $page ? 'selected' : '' }}>{{ $page }}</option>
              @endforeach
            @endif
          </select>
        </div>
        <div class="p-pagination__page__denominator">{{ number_format($paginate->lastPage()) }}</div>
      </div>
      {{-- 移動 --}}
      <div class="p-pagination__transition">
        @if($paginate->onFirstPage())
          <div class="p-pagination__button--prev disabled"></div>
        @else
          <a href="{{ $paginate->appends(request()->all())->previousPageUrl() }}" class="p-pagination__button--prev"></a>
        @endif

        @if(!$paginate->hasMorePages())
          <div class="p-pagination__button--next disabled"></div>
        @else
          <a href="{{ $paginate->appends(request()->all())->nextPageUrl() }}" class="p-pagination__button--next"></a>
        @endif
      </div>
    </div>
</div>