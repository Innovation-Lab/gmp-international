<div class="p-detail__head">
  <div class="wrapper">
    <div class="container">
      <div class="p-detail__head__inner">
        <a href="{{route('admin.masters.brand')}}" class="c-button__2">戻る</a>
        <div class="p-detail__head__action">
          @if(str_contains(request()->url(), 'edit'))
            <div class="c-button__2" data-micromodal-trigger="modal-alert">削除</div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>