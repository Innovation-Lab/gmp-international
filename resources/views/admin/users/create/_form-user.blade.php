<div class="p-create__main__box__head">
  <h3 class="p-create__main__box__head__title">
  ユーザー新規追加
  </h3>
</div>
<div class="l-grid__2 l-grid__2--xl" style="gap: 1.5rem 2rem;">
  <div class="l-grid__item">
    <ul class="p-formList">
      <li class="p-formList__item">
        <div class="l-grid__2 l-grid__gap2">
          <div class="p-formList__content">
            <div class="p-formList__label optional">
              姓
            </div>
            <div class="p-formList__data" style="display: block;">
              {!! Form::text('last_name', old('last_name'), ['placeholder' => '例）山田']) !!}
              @error('last_name')
                <div class="error">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="p-formList__content">
            <div class="p-formList__label optional">
              名
            </div>
            <div class="p-formList__data" style="display: block;">
              {!! Form::text('first_name', old('first_name'), ['placeholder' => '例）太郎']) !!}
              @error('first_name')
                <div class="error">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="l-grid__2 l-grid__gap2">
          <div class="p-formList__content">
            <div class="p-formList__label optional">
              セイ
            </div>
            <div class="p-formList__data" style="display: block;">
              {!! Form::text('last_name_kana',  old('last_name_kana'), ['placeholder' => '例）ヤマダ']) !!}
              @error('last_name_kana')
                <div class="error">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="p-formList__content">
            <div class="p-formList__label optional">
              メイ
            </div>
            <div class="p-formList__data" style="display: block;">
              {!! Form::text('first_name_kana',  old('first_name_kana'), ['placeholder' => '例）タロウ']) !!}
              @error('first_name_kana')
                <div class="error">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label optional">
            メールアドレス
          </div>
          <div class="p-formList__data" style="display: block;">
            {!! Form::email('email', old('email'), ['placeholder' => '例）sample@example.com']) !!}
            @error('email')
              <div class="error">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label optional">
            電話番号<small>（ハイフンなし）</small>
          </div>
          <div class="p-formList__data" style="display: block;">
            {!! Form::tel('tel', old('tel'), ['placeholder' => '例）09012345678']) !!}
            @error('tel')
              <div class="error">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label optional">
            新着情報、お得情報
          </div>
          <div class="p-formList__data">
            <div class="radio">
              <input type="radio" id="inq1-2" name="is_dm" value="1" {{ old('is_dm') == 1 ? 'checked' : '' }}>
              <label for="inq1-2">同意する</label>
              <input type="radio" id="inq2-2" name="is_dm" value="0" {{ old('is_dm') == 0 ? 'checked' : '' }}>
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
        <div class="p-formList__content">
          <div class="p-formList__label optional" style="white-space: nowrap;">
            郵便番号<small>（ハイフンなし）</small>
          </div>
          <div class="p-formList__data" style="width: 207px; display:block;">
            {!! Form::number('zip_code', old('zip_code'), ['class' => 'p-postal-code', 'placeholder' => '例）1230000']) !!}
            @error('zip_code')
              <div class="error">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label optional">
            都道府県
          </div>
          <div class="p-formList__data" style="width: 207px; display:block;">
            {!! Form::select('prefecture', $prefectures, old('prefecture'), ['class' => 'p-region', 'placeholder' => '都道府県を選択']) !!}
            @error('prefecture')
              <div class="error">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label optional">
            市区町村
          </div>
          <div class="p-formList__data" style="display: block;">
            {!! Form::text('address_city', old('address_city'), ['class' => 'p-locality p-street-address', 'placeholder' => '例）渋谷区']) !!}
            @error('address_city')
              <div class="error">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label optional">
            番地
          </div>
          <div class="p-formList__data" style="display: block;">
            {!! Form::text('address_block', old('address_block'), ['class' => '', 'placeholder' => '例）1-2-3']) !!}
            @error('address_block')
              <div class="error">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            マンション名・部屋番号など
          </div>
          <div class="p-formList__data">
            {!! Form::text('address_building', old('address_building'), ['class' => 'p-extended-address', 'placeholder' => '例）渋谷マンション1201']) !!}
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label optional">
            パスワード<small>（半角英数字6文字~）</small>
          </div>
          <div class="p-formList__data" style="display: block;">
            <input type="password" name="password" value="" placeholder="例）gmp0001" autocomplete="new-password">
            @error('password')
              <div class="error">{{ $message }}</div>
            @enderror
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
            <textarea name="user_memo" placeholder="修正対応や報告事項を記載してください。" class="c-scroll">{{ old('user_memo') }}</textarea>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>