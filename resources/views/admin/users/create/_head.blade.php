<div class="p-detail__head">
  <div class="wrapper">
    <div class="container">
      <div class="p-detail__head__inner">
        @if(Route::current()->getName() == 'admin.users.create')
          <a href="{{route('admin.users.index')}}" class="c-button__2">戻る</a>
        @else
          <a href="{{route('admin.users.detail', $user)}}" class="c-button__2">戻る</a>
        @endif
      </div>
    </div>
  </div>
</div>