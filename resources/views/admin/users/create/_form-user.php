<div class="p-edit__main__box__head">
  <h3 class="p-edit__main__box__head__title">
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
              <input type="text" name="last-name" placeholder="例）山田">
            </div>
          </div>
          <div class="p-formList__content">
            <div class="p-formList__label">
              名
            </div>
            <div class="p-formList__data">
              <input type="text" name="first-name" placeholder="例）太郎">
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
              <input type="text" name="sei" placeholder="例）ヤマダ">
            </div>
          </div>
          <div class="p-formList__content">
            <div class="p-formList__label">
              メイ
            </div>
            <div class="p-formList__data">
              <input type="text" name="mei" placeholder="例）タロウ">
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
            <input type="email" name="email" placeholder="例）sample@example.com">
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            電話番号
          </div>
          <div class="p-formList__data">
            <input type="tel" name="tel" placeholder="例）09012345678">
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            新着情報、お得情報
          </div>
          <div class="p-formList__data">
            <div class="c-input c-input--radio">
              <input type="radio" id="inq1-2" name="is_dm" value="1" checked>
              <label for="inq1-2">同意する</label>
              <input type="radio" id="inq2-2" name="is_dm" value="0">
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
                <input type="number" name="zip" placeholder="例）1230000">
              </div>
            </div>
          </div>
          <div class="l-grid__item">
            <div class="p-formList__content">
              <div class="p-formList__label">
                都道府県
              </div>
              <div class="p-formList__data">
                <select name="prefectures">
                  <option value="" hidden>選択してください</option>
                  <option value="tokyo">東京都</option>
                  <option value="kanagawa">神奈川県</option>
                  <option value="saitama">埼玉県</option>
                  <option value="chiba">千葉県</option>
                </select>
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
            <input type="text" name="city" placeholder="例）渋谷区渋谷1-2-3">
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            マンション名・部屋番号など
          </div>
          <div class="p-formList__data">
            <input type="text" name="room" placeholder="例）渋谷マンション1201">
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            パスワード<small>（半角英数字6~10文字）</small>
          </div>
          <div class="p-formList__data">
            <input type="password" name="password" placeholder="例）gmp0001">
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