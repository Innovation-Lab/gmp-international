<div class="p-create__main__box__head">
  <h3 class="p-create__main__box__head__title">
  ユーザー情報
  </h3>
</div>
<div class="l-grid__2 l-grid__2--xl" style="gap: 1.5rem 2rem;">
  <div class="l-grid__item">
    <ul class="p-formList">
      <li class="p-formList__item">
        <div class="l-grid__2 l-grid__gap2">
          <div class="p-formList__content">
            <div class="p-formList__label">
              姓
            </div>
            <div class="p-formList__data">
              {!! Form::text('last-name', null, ['placeholder' => '例）山田']) !!}
            </div>
          </div>
          <div class="p-formList__content">
            <div class="p-formList__label">
              名
            </div>
            <div class="p-formList__data">
              {!! Form::text('first-name', null, ['placeholder' => '例）太郎']) !!}
            </div>
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="l-grid__2 l-grid__gap2">
          <div class="p-formList__content">
            <div class="p-formList__label">
              セイ
            </div>
            <div class="p-formList__data">
              {!! Form::text('sei', null, ['placeholder' => '例）ヤマダ']) !!}
            </div>
          </div>
          <div class="p-formList__content">
            <div class="p-formList__label">
              メイ
            </div>
            <div class="p-formList__data">
              {!! Form::text('mei', null, ['placeholder' => '例）タロウ']) !!}
            </div>
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            メールアドレス
          </div>
          <div class="p-formList__data">
            {!! Form::email('email', null, ['placeholder' => '例）sample@example.com']) !!}
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            電話番号
          </div>
          <div class="p-formList__data">
            {!! Form::tel('telephone', null, ['placeholder' => '例）09012345678']) !!}
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            新着情報、お得情報
          </div>
          <div class="p-formList__data">
            <div class="radio">
              <input type="radio" id="inq1-2" name="is_dm" value="1" {{ Auth::user()->is_dm == 1 ? 'checked' : '' }}>
              <label for="inq1-2">同意する</label>
              <input type="radio" id="inq2-2" name="is_dm" value="0" {{ Auth::user()->is_dm == 0 ? 'checked' : '' }}>
              <label for="inq2-2">同意しない</label>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
  <div class="l-grid__item">
    <ul class="p-formList">
      <li class="p-formList__item">
        <div class="l-grid__2 l-grid__gap2">
          <div class="l-grid__item">
            <div class="p-formList__content">
              <div class="p-formList__label">
                郵便番号
              </div>
              <div class="p-formList__data">
                {!! Form::number('zip', null, ['placeholder' => '例）1230000']) !!}
              </div>
            </div>
          </div>
          <div class="l-grid__item">
            <div class="p-formList__content">
              <div class="p-formList__label">
                都道府県
              </div>
              <div class="p-formList__data">
                {!!
                  Form::select('prefectures', 
                    [
                    'tokyo' => '東京都',
                    'kanagawa' => '神奈川県',
                    'saitama' => '埼玉県',
                    'chiba' => '千葉県',
                    ],
                    'tokyo', ['placeholder' => '都道府県を選択']
                  )
                !!}
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            市区町村
          </div>
          <div class="p-formList__data">
            {!! Form::text('city', null, ['placeholder' => '例）渋谷区渋谷1-2-3']) !!}
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            マンション名・部屋番号など
          </div>
          <div class="p-formList__data">
            {!! Form::text('room', null, ['placeholder' => '例）渋谷マンション1201']) !!}
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            パスワード<small>（半角英数字6~10文字）</small>
          </div>
          <div class="p-formList__data">
            {!! Form::password('password', null, ['placeholder' => '例）gmp0001']) !!}
          </div>
        </div>
      </li>
    </ul>
  </div>
  <div class="l-grid__item" style="grid-column: 1/3;">
    <ul class="p-formList">
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            管理メモ
          </div>
          <div class="p-formList__content__data">
            <textarea placeholder="修正対応や報告事項を記載してください。" class="c-scroll"></textarea>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>