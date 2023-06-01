<div class="modal micromodal-slide" id="modal-users-fillter" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1">
    <div class="modal__container lg" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <header class="modal__header">
        <h2 class="modal__title" id="modal-1-title">
          絞り込み検索
        </h2>
      </header>
      <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      <main class="modal__content" id="modal-1-content">
        {{-- フォーム --}}
        {!! Form::open(['class' => 'p-form']) !!}
          <ul class="p-formList u-gap--16">
            <li class="p-formList__item">
              <div class="l-grid__2 l-grid__gap3">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    名前
                  </div>
                  <div class="p-formList__data">
                    {!! Form::text('name', '', ['placeholder' => '例）小山浩行']) !!}
                  </div>
                </div>
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    フリガナ
                  </div>
                  <div class="p-formList__data">
                    {!! Form::text('kana', '', ['placeholder' => '例）コヤマヒロユキ']) !!}
                  </div>
                </div>
              </div>
            </li>
            <li class="p-formList__item">
              <div class="l-grid__2 l-grid__gap3">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    電話番号
                  </div>
                  <div class="p-formList__data">
                    {!! Form::tel('tel', '', ['placeholder' => '例）08012345678']) !!}
                  </div>
                </div>
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    メールアドレス
                  </div>
                  <div class="p-formList__data">
                    {!! Form::email('email', null, ['placeholder' => '例）h.koyama@soushin-lab.co.jp']) !!}
                  </div>
                </div>
              </div>
            </li>
            <li class="p-formList__item">
              <div class="l-grid__1 l-grid__gap1">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    登録番号
                  </div>
                  <div class="p-formList__data w-348">
                    {!! Form::text('registr_number1', '', ['placeholder' => '例）QYO']) !!}
                    <span class="unit">ー</span>
                    {!! Form::number('registr_number2', '', ['placeholder' => '1000']) !!}
                    <span class="unit">ー</span>
                    {!! Form::text('registr_number3', '', ['placeholder' => 'VACOK']) !!}
                  </div>
                </div>
              </div>
            </li>
            <li class="p-formList__item">
              <div class="l-grid__1 l-grid__gap1">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    購入日
                  </div>
                  <div class="p-formList__data w-348">
                    {!! Form::date('purchase_date1', '', ['placeholder' => '0000/00/00']) !!}
                    <span class="unit">〜</span>
                    {!! Form::tel('purchase_date2', '', ['placeholder' => '0000/00/00']) !!}
                  </div>
                </div>
              </div>
            </li>
            <li class="p-formList__item">
              <div class="l-grid__1 l-grid__gap1">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    ブランド名
                  </div>
                  <div class="p-formList__data w-348">
                    <select name="brand" class="select2">
                      <option value="" hidden>選択してください</option>
                      <option value="brand1">AIRBUGGY</option>
                      <option value="brand2">AIRBUGGY1</option>
                      <option value="brand3">AIRBUGGY2</option>
                    </select>
                  </div>
                </div>
              </div>
            </li>
            <li class="p-formList__item">
              <div class="l-grid__1 l-grid__gap1">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    製品名
                  </div>
                  <div class="p-formList__data w-348">
                    <select name="brand" class="select2">
                      <option value="" hidden>選択してください</option>
                      <option value="product1">COCO PREMIER FROM BIRTH</option>
                      <option value="product2">OCO PREMIER FROM BIRTH 1</option>
                      <option value="product3">OCO PREMIER FROM BIRTH 2</option>
                    </select>
                  </div>
                </div>
              </div>
            </li>
            <li class="p-formList__item">
              <div class="l-grid__1 l-grid__gap1">
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
              </div>
            </li> 
          </ul>
        {!! Form::close() !!}
      </main>
      <footer class="modal__footer">
        <button class="modal__btn" data-micromodal-close>戻る</button>
        <button  class="modal__btn-primary">絞り込む</button>
      </footer>
    </div>
  </div>
</div>