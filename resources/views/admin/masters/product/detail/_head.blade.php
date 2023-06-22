<div class="p-detail__head">
  <div class="wrapper">
    <div class="container">
      <div class="p-detail__head__inner">
        <a href="{{url()->previous()}}" class="c-button__2">戻る</a>
        <div class="p-detail__head__action">
          @if(str_contains(request()->url(), 'detail'))
            <div class="c-button__2" data-micromodal-trigger="modal-alert-m_product">削除</div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@if(str_contains(request()->url(), 'detail'))
  @include('admin.components.modal._modal-alert-m_product')
@endif