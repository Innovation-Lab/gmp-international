<div class="p-detail__head">
  <div class="wrapper">
    <div class="container">
      <div class="p-detail__head__inner">
        <a href="@if(str_contains(request()->url(), 'edit')) {{ route('admin.masters.store.detail', $shop) }} @else {{ route('admin.masters.store') }} @endif" class="c-button__2">戻る</a>
      </div>
    </div>
  </div>
</div>