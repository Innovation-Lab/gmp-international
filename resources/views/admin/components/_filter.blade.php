<form action="">
  <div class="p-filter">
    <div class="p-filter__body">
      <ul class="p-filterList">
        <li class="p-filterList__item">
          <div class="p-filterList__label">
            キーワードで検索
          </div>
          <div class="p-filterList__content">
            <div class="p-filterList__content__body">
              <input type="text" placeholder="キーワードを入力">
            </div>
            <div class="p-filterList__content__foot">
              <button class="c-button__reset">リセット</button>
              <button class="c-button">適用</button>
            </div>
          </div>
        </li>
        <li class="p-filterList__item">
          <div class="p-filterList__label">
            性別
          </div>
          <div class="p-filterList__content">
            <div class="p-filterList__content__body">
              <input type="checkbox" name="gender" id="gender_male">
              <label for="gender_male">男性</label>
              <input type="checkbox" name="gender" id="gender_female">
              <label for="gender_female">女性</label>
            </div>
            <div class="p-filterList__content__foot">
              <button class="c-button__reset">リセット</button>
              <button class="c-button">適用</button>
            </div>
          </div>
        </li>
        <li class="p-filterList__item is-active">
          <div class="p-filterList__label">
            プラン
            <span>3</span>
          </div>
          <div class="p-filterList__content">
            <div class="p-filterList__content__body">
              <input type="checkbox" name="plan" id="plan_free">
              <label for="plan_free">フリー</label>
              <input type="checkbox" name="plan" id="plan_silver">
              <label for="plan_silver">シルバー</label>
              <input type="checkbox" name="plan" id="plan_gold">
              <label for="plan_gold">ゴールド</label>
              <input type="checkbox" name="plan" id="plan_platinum">
              <label for="plan_platinum">プラチナ</label>
            </div>
            <div class="p-filterList__content__foot">
              <button class="c-button__reset">リセット</button>
              <button class="c-button">適用</button>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="p-filter__action">
      <button class="c-button__reset">絞り込みをクリア</button>
    </div>
  </div>
</form>