<div class="p-detail__head">
  <div class="wrapper">
    <div class="container">
      <div class="p-detail__head__inner">
        <a href="@if(str_contains(request()->url(), 'edit')) {{ route('admin.masters.product.detail', $product) }} @else {{ route('admin.masters.product') }} @endif" class="c-button__2">戻る</a>
        <div class="p-detail__head__action">
          <div class="c-button__2" data-micromodal-trigger="modal-alert">削除</div>
        </div>
      </div>
    </div>
  </div>
</div>