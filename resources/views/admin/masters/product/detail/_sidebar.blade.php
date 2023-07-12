<div class="p-detail__sidebar">
  {{-- ---------- ボックス（サイドバー） ---------- --}}
  <div class="p-detail__sidebar__img">
    <span class="img">
      <img src="{{asset('img/web/product/airbuggy_coco_premire_newflame_blossom_front.png')}}" {{--width="64px" height="64px--}}">
    </span>
    <div class="p-detail__sidebar__status">
      <span class="status">登録済み</span>
      <span class="status">未登録</span>
    </div>
  </div>
  <div class="p-detail__sidebar__box">
    <div class="p-detail__sidebar__box__head">
      <h3 class="p-detail__sidebar__box__head__title">
        登録製品情報
      </h3>
      <a href="{{route('admin.users.edit-user')}}" class="c-button__2">編集</a>
      <a href="{{route('admin.users.edit-user')}}" class="c-button">編集</a>
    </div>
    <div class="p-detail__sidebar__box__body">
      {{-- ---------- リスト ---------- --}}
      <ul class="p-list">
        @foreach([
          '製品名' => 'COCO BRAKE EX FROM BIRTH',
          'ブランド名' => 'AIRBUGGY',
          {{--'登録番号' => 'AB01-097M-HIUA',--}}
          'カラー' => 'BLOSSOM',
          '購入店舗' => '',
        ] as $key => $val)
        <li class="p-list__item">
          <div class="p-list__label">
            {!! $key !!}
          </div>
          <div class="p-list__data">
            {!! $val !!}
          </div>
          @endforeach
        </li>
      </ul>
      <div class="p-list__memo">
        <p class="p-list__label">管理メモ</p>
        <div class="p-list__memo__area c-scroll"></div>
      </div>
    </div>
  </div>
</div>