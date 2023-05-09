<div class="p-detail__sidebar">
  {{-- ---------- ボックス（サイドバー） ---------- --}}
  <div class="p-detail__sidebar__box">
    <div class="p-detail__sidebar__box__body">
      <div class="p-profileImage">
        <div class="p-profileImage__image circle" data-micromodal-trigger="modal-profile-photo">
          <img src="{{asset('img/admin/sample/user_profile.png')}}">
        </div>
        <div class="p-profileImage__text">
          <h4 class="p-profileImage__text__title center">
            <strong>田中 由梨恵</strong>
            <span>タナカ ユリエ</span>
          </h4>
        </div>
      </div>
      {{-- ---------- リスト ---------- --}}
      <ul class="p-list" style="margin-top: 1rem;">
        @foreach([
          '会員番号' => '<p class="focus">000012345678</p>',
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
      <h3 class="p-detail__sidebar__box__head__title">
        契約中のプラン
      </h3>
      <div class="c-status__plan-basic"></div>
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