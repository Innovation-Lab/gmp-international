<div class="p-detail__sidebar">
  {{-- ---------- ボックス（サイドバー） ---------- --}}
  <div class="p-detail__sidebar__box">
    <div class="p-detail__sidebar__box__head">
      <h3 class="p-detail__sidebar__box__head__title">
        ユーザー情報
      </h3>
      <a href="{{route('admin.users.edit-user', $user)}}" class="c-button">編集</a>
    </div>
    <div class="p-detail__sidebar__box__body">
      {{-- ---------- リスト ---------- --}}
      <ul class="p-list">
        @foreach([
          '会員番号' => data_get($user, 'id'),
          '名前<span>（フリガナ）</span>' => data_get($user, 'full_name') . '<span>（' . data_get($user, 'full_name_kana') . '）</span>',
          '電話番号' => data_get($user, 'formatted_tel'),
          'メールアドレス' => data_get($user, 'email'),
          '住所' => '
          〒' . data_get($user, 'zip_code') . '<br>' .
          data_get($user, 'prefecture') . data_get($user, 'address_city') . data_get($user, 'address_block') . '<br>' .
          data_get($user, 'address_building'),
          '新着情報、お得情報' => data_get($user, 'string_dm'),
          'アカウント作成日時' => formatYmdSlash(data_get($user, 'created_at')) . '　' . formatHiSlash(data_get($user, 'created_at')),
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
        @if(data_get($user, 'old_id'))
          <li class="p-list__item">
            <div class="p-list__label">
              ※旧会員番号
            </div>
            <div class="p-list__data">
              {!! data_get($user, 'old_id') !!}
            </div>
          </li>
        @endif
      </ul>
      <div class="p-list__memo">
        <p class="p-list__label">管理メモ</p>
        <div class="p-list__memo__area c-scroll">{{ data_get($user, 'memo') }}</div>
      </div>
    </div>
  </div>
</div>