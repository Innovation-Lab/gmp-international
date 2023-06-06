<div class="p-detail__sidebar">
  {{-- ---------- ボックス（サイドバー） ---------- --}}
  <div class="p-detail__sidebar__box">
    <div class="p-detail__sidebar__box__head">
      <h3 class="p-detail__sidebar__box__head__title">
        ユーザー情報
      </h3>
      <!-- <a href="{{route('admin.users.edit-user')}}" class="c-button__2">編集</a> -->
      <a href="{{route('admin.users.edit-user')}}" class="c-button">編集</a>
    </div>
    <div class="p-detail__sidebar__box__body">
      {{-- ---------- リスト ---------- --}}
      <ul class="p-list">
        @foreach([
          '会員番号' => 'No.000000123456',
          '名前<span>（フリガナ）</span>' => '山田　太郎<span>（ヤマダ　タロウ）</span>',
          '電話番号' => '080-1234-5678',
          'メールアドレス' => 'gmp@sample.com',
          '住所' => '
          〒 1530001<br>
          東京都千代田区紀尾井町1-1-1<br>
          紀尾井町ビル16F',
          '新着情報、お得情報' => '受け取る',
          'アカウント作成日時' => '2023/04/04　10:12',
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