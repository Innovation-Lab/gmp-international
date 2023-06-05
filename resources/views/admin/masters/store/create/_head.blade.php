<div class="p-detail__head">
  <div class="wrapper">
    <div class="container">
      <div class="p-detail__head__inner">
        @if(Route::current()->getName() == 'admin.master.store.create')
          <a href="{{route('admin.store.index')}}" class="c-button__2">戻る</a>
        @else
          <a href="{{route('admin.masters.store.detail')}}" class="c-button__2">戻る</a>
        @endif
      </div>
    </div>
  </div>
</div>