<div class="p-detail__sidebar">
  {{-- ---------- ボックス（サイドバー） ---------- --}}
  <div class="p-detail__sidebar__box">
    <div class="p-detail__sidebar__box__body">
      <div class="p-profileImage">
        <div class="p-profileImage__image" data-micromodal-trigger="modal-profile-photo">
          <img src="{{asset('img/admin/sample/item.png')}}">
        </div>
        <div class="p-profileImage__text">
          <h4 class="p-profileImage__text__title">
            <span>Aesop</span>
            <strong>イソップ ボディスプレー</strong>
          </h4>
        </div>
      </div>
      {{-- ---------- リスト ---------- --}}
      <ul class="p-list" style="margin-top: 1rem;">
        @foreach([
          '商品番号' => '<p class="focus">000012345678</p>',
        ] as $key => $val)
        <li class="p-list__item">
          <div class="p-list__label">
            {!! $key !!}
          </div>
          <div class="p-list__data">
            {!! $val !!}
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
  {{-- ---------- ボックス（サイドバー） ---------- --}}
  <div class="p-detail__sidebar__box">
    <div class="p-detail__sidebar__box__head">
      @component('admin.components._list',[
        'list' => [
          '商品画像　<div data-micromodal-trigger="modal-profile-photo">写真を変更</div>' => '
            <div class="p-photo">
              <ul class="p-photo__list">
                <li class="p-photo__list__item">
                  <img src="'.asset('img/admin/sample/item.png').'">
                </li>
                <li class="p-photo__list__item">
                  <img src="'.asset('img/admin/sample/item.png').'">
                </li>
                <li class="p-photo__list__item">
                  <img src="'.asset('img/admin/sample/item.png').'">
                </li>
                <li class="p-photo__list__item">
                  <img src="'.asset('img/admin/sample/item.png').'">
                </li>
                <li class="p-photo__list__item">
                  <img src="'.asset('img/admin/sample/item.png').'">
                </li>
              </ul>
            </div>
          ',
        ]
      ])
      @endcomponent
    </div>
  </div>
  {{-- ---------- ボックス（サイドバー） ---------- --}}
  <div class="p-detail__sidebar__box">
    <div class="p-detail__sidebar__box__head">
      <h3 class="p-detail__sidebar__box__head__title">
        基本情報
      </h3>
    </div>
    <div class="p-detail__sidebar__box__body">
      {{-- ---------- リスト ---------- --}}
      <ul class="p-list">
        @foreach([
          '性別' => '女性',
          '生年月日' => '2022/03/03（24歳）',
          '電話番号' => '09012345678',
          'メールアドレス' => 'sample@example.com',
          '住所' => '
          〒 1530001<br>
          東京都渋谷区渋谷123<br>
          渋谷マンション102',
        ] as $key => $val)
        <li class="p-list__item">
          <div class="p-list__label">
            {!! $key !!}
          </div>
          <div class="p-list__data">
            {!! $val !!}
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
  {{-- ---------- ボックス（サイドバー） ---------- --}}
  <div class="p-detail__sidebar__box">
    <div class="p-detail__sidebar__box__body">
      {{-- ---------- リスト ---------- --}}
      <ul class="p-list p-list--2">
        @foreach([
          '会員登録日1' => '2022/03/03',
          '会員登録日2' => '2022/03/03',
          '会員登録日3' => '2022/03/03',
          '会員登録日4' => '2022/03/03',
        ] as $key => $val)
        <li class="p-list__item">
          <div class="p-list__label">
            {!! $key !!}
          </div>
          <div class="p-list__data">
            {!! $val !!}
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>