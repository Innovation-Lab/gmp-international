<div class="p-detail__sidebar">
  {{-- ---------- ボックス（サイドバー） ---------- --}}
  <div class="p-detail__sidebar__box">
    <div class="p-detail__sidebar__box__head">
      <h3 class="p-detail__sidebar__box__head__title">
        ユーザー情報
      </h3>
      <a href="" class="c-button__2">編集</a>
    </div>
    <div class="p-detail__sidebar__box__body">
      {{-- ---------- リスト ---------- --}}
      <ul class="p-list">
        @foreach([
          '会員番号' => 'No.000000123456',
          '名前（フリガナ）' => '山田　太郎（ヤマダ　タロウ）',
          '電話番号' => '080-1234-5678',
          'メールアドレス' => 'gmp@sample.com',
          '住所' => '
          〒 1530001<br>
          東京都千代田区紀尾井町1-1-1<br>
          紀尾井町ビル16F',
          '個人情報の取り扱いについて' => '同意する',
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
          <div class="p-list__memo">
            <p class="p-list__label">管理メモ</p>
            <div class="p-list__memo__area"></div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>