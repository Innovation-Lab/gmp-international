<div class="modal micromodal-slide" id="modal-edit--product" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1">
    <div class="modal__container modal__container--thin modal__container--min" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <div class="modal__box">
        <main class="modal__content" id="modal-1-content">
          <div class="modal__content__body">
            <!-- 登録製品 -->
            <ul class="p-formList">
              <!-- 購入日 -->
              <li class="p-formList__item">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                      <p class="c-txt">購入日 <span class="c-txt c-txt--must">必須</span></p>
                  </div>
                  <div class="p-formList__data">
                    <div class="c-input c-input--date">
                      <input id="date" placeholder="2023/05/16" class="required" name="" type="text" value="">
                    </div>
                  </div>
                  <p style="display: none;" class="c-txt c-txt--err">「姓」を入力してください。<br>※全角で入力してください。</p>
                </div>
              </li>
              <!-- ブランド名 -->
              <li class="p-formList__item">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                      <p class="c-txt">ブランド名 <span class="c-txt c-txt--must">必須</span></p>
                  </div>
                  <div class="p-formList__data">
                    <div class="c-input c-input--select">
                      <select name="pref">
                        <option value="" selected>ブランドを選択してください</option>
                        <option value="AIRBUGGY">AIRBUGGY</option>
                      </select>
                    </div>
                  </div>
                  <p style="display: none;" class="c-txt c-txt--err">ブランドを選択してください。</p>
                </div>
              </li>
              <!-- 製品名 -->
              <li class="p-formList__item">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                      <p class="c-txt">製品名</p>
                  </div>
                  <div class="p-formList__data">
                    <div class="c-input c-input--select">
                      <select name="pref">
                        <option value="" selected>製品を選択してください</option>
                        <option value="COCO PREMIER FROM BIRTH">COCO PREMIER FROM BIRTH</option>
                      </select>
                    </div>
                  </div>
                  <p style="display: none;" class="c-txt c-txt--err">「セイ」を入力してください。<br>※全角カタカナで入力してください。</p>
                </div>
              </li>
              <!-- カラー -->
              <li class="p-formList__item">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    <p class="c-txt">カラー</p>
                  </div>
                  <div class="p-formList__data">
                    <div class="c-input c-input--select">
                      <select name="color">
                        <option value="" selected>カラーを選択してください</option>
                        <option value="GRASS GREEN">GRASS GREEN</option>
                        <option value="other">上記以外のカラー</option>
                      </select>
                    </div>
                    <!-- 上記以外の店舗選択時のフォーム -->
                    <div style="display:none;" class="p-formList__content p-formList__other">
                      <div class="p-formList__label">
                        <p class="c-txt">「上記以外のカラー」を選択した方はこちら</p>
                      </div>
                      <div class="p-formList__data">
                        <input placeholder="例）赤" class="required" name="name" type="name" value="">
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <!-- シリアルナンバー -->
              <li class="p-formList__item">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    <p class="c-txt">シリアルナンバー</p>
                    <div class="p-formList__guide">
                      <a class="p-formList__guide__btn" data-micromodal-trigger="modal__guide--serial" role="button"></a>
                    </div>
                  </div>
                  <div class="p-formList__data">
                    <input placeholder="例）GMP0123456" class="required" name="name" type="name" value="">
                  </div>
                </div>
              </li>
              <!-- 購入店舗 -->
              <li class="p-formList__item">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    <p class="c-txt">購入店舗</p>
                    <div class="p-formList__guide">
                      <a class="p-formList__guide__btn" data-micromodal-trigger="modal__guide--shop" role="button"></a>
                    </div>
                  </div>
                  <div class="p-formList__data">
                    <div class="c-input c-input--select">
                      <select name="pref">
                        <option value="" selected>購入店舗を選択してください</option>
                        <option value="エアバギー代官山店">エアバギー代官山店</option>
                        <option value="other">上記以外の店舗</option>
                      </select>
                    </div>
                    <!-- 上記以外の店舗選択時のフォーム -->
                    <div style="display:none;" class="p-formList__content p-formList__other">
                      <div class="p-formList__label">
                        <p class="c-txt">「上記以外の店舗」を選択した方はこちら</p>
                      </div>
                      <div class="p-formList__data">
                        <input placeholder="例）アカチャンホンポ○○店" class="required" name="name" type="name" value="">
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="modal__content__foot">
            <div class="p-btnWrap p-btnWrap--center">
              <button class="c-btn c-btn--back" aria-label="Close modal" data-micromodal-close>戻る</button>
              <a href="{{route('mypage.product')}}" class="c-btn c-btn--accent">登録する</a>
            </div>
            <div class="p-btnWrap p-btnWrap--center">
              <button class="c-btn c-btn--text" data-micromodal-trigger="modal-delete--product" role="button">削除する</button>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
</div>