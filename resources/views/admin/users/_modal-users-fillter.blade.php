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
        {!! Form::open(['method' => 'GET', 'route' => 'admin.users.index', 'class' => 'p-form', 'id' => 'submitSearchForm']) !!}
          <ul class="p-formList u-gap--16">
            <li class="p-formList__item">
              <div class="l-grid__2 l-grid__gap3">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    名前
                  </div>
                  <div class="p-formList__data">
                    {!! Form::text('name', null, ['placeholder' => '例）山田太郎']) !!}
                  </div>
                </div>
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    フリガナ
                  </div>
                  <div class="p-formList__data">
                    {!! Form::text('kana', null, ['placeholder' => '例）ヤマダタロウ']) !!}
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
                    {!! Form::email('email', null, ['placeholder' => '例）sample@example.com']) !!}
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
                    {!! Form::date('purchase_date_form', '', ['placeholder' => '0000/00/00']) !!}
                    <span class="unit">〜</span>
                    {!! Form::date('purchase_date_to', '', ['placeholder' => '0000/00/00']) !!}
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
                    <select name="m_brand_id" class="select2">
                      <option value="">選択してください</option>
                      @foreach($brands as $k => $v)
                        <option value="{{ $k }}" {{ old('m_brand_id')}}>{{ $v }}</option>
                      @endforeach
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
                    <select name="m_product_id" class="select2">
                      <option value="" >選択してください</option>
                      @foreach($products as $k => $v)
                        <option value="{{ $k }}" {{ old('m_product_id')}}>{{ $v }}</option>
                      @endforeach
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
                      <input type="radio" id="inq1-2" name="is_dm" value="1">
                      <label for="inq1-2">受け取る</label>
                      <input type="radio" id="inq2-2" name="is_dm" value="0">
                      <label for="inq2-2">受け取らない</label>
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
        <button type="submit" form="submitSearchForm" class="modal__btn-primary">絞り込む</button>
      </footer>
    </div>
  </div>
</div>