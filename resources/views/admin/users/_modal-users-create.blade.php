<div class="modal micromodal-slide" id="modal-users-create" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1">
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <header class="modal__header">
        <h2 class="modal__title" id="modal-1-title">
          ユーザーを新規追加
        </h2>
        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      </header>
      <main class="modal__content" id="modal-1-content">
        {{-- フォーム --}}
        {!! Form::open(['class' => 'p-form']) !!}
          <ul class="p-formList">
            <li class="p-formList__item">
              <div class="l-grid__2 l-grid__gap1">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    姓
                  </div>
                  <div class="p-formList__data">
                    {!! Form::text('last-name', '', ['placeholder' => '例）山田']) !!}
                  </div>
                </div>
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    名
                  </div>
                  <div class="p-formList__data">
                    {!! Form::text('first-name', '', ['placeholder' => '例）太郎']) !!}
                  </div>
                </div>
              </div>
            </li>
            <li class="p-formList__item">
              <div class="l-grid__2 l-grid__gap1">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    セイ
                  </div>
                  <div class="p-formList__data">
                    {!! Form::text('sei', '', ['placeholder' => '例）ヤマダ']) !!}
                  </div>
                </div>
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    メイ
                  </div>
                  <div class="p-formList__data">
                    {!! Form::text('mei', '', ['placeholder' => '例）タロウ']) !!}
                  </div>
                </div>
              </div>
            </li>
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                  性別
                </div>
                <div class="p-formList__data">
                  <div class="radio">
                    {!! Form::radio('gender', 'value', true, ['id' => 'gender-male']) !!}
                    {!! Form::label('gender-male', '男性') !!}
                    {!! Form::radio('gender', 'value', false, ['id' => 'gender-female']) !!}
                    {!! Form::label('gender-female', '女性') !!}
                  </div>
                </div>
              </div>
            </li>
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label optional">
                  生年月日
                </div>
                <div class="p-formList__data">
                  <div class="l-grid__fit">
                    <div class="l-grid__item" style="flex: 1.4;">
                      <select name="" id="birth-year">
                        @for ($i = 1900; $i <= 2022; $i++)
                          @if($i == 1980)
                            <option selected>
                              年を選択
                            </option>
                            <option value="{{'birth-year-'.($i)}}">
                              {{$i}}
                            </option>
                          @else
                            <option value="{{'birth-year-'.($i)}}">
                              {{$i}}
                            </option>
                          @endif
                        @endfor
                      </select>
                    </div>
                    <div class="l-grid__item">
                      {!!
                        Form::select('birth-month', 
                          [
                          'birth-month-01' => '01',
                          'birth-month-02' => '02',
                          'birth-month-03' => '03',
                          'birth-month-04' => '04',
                          'birth-month-05' => '05',
                          'birth-month-06' => '06',
                          'birth-month-07' => '07',
                          'birth-month-08' => '08',
                          'birth-month-09' => '09',
                          'birth-month-10' => '10',
                          'birth-month-11' => '11',
                          'birth-month-12' => '12',
                          ],
                          null, ['placeholder' => '月を選択']
                        )
                      !!}
                    </div>
                    <div class="l-grid__item">
                      {!!
                        Form::select('birth-day', 
                          [
                          'birth-day-01' => '01',
                          'birth-day-02' => '02',
                          'birth-day-03' => '03',
                          'birth-day-04' => '04',
                          'birth-day-05' => '05',
                          'birth-day-06' => '06',
                          'birth-day-07' => '07',
                          'birth-day-08' => '08',
                          'birth-day-28' => '28',
                          'birth-day-29' => '29',
                          'birth-day-30' => '30',
                          'birth-day-31' => '31',
                          ],
                          null, ['placeholder' => '日を選択']
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
                  メールアドレス
                </div>
                <div class="p-formList__data">
                  {!! Form::email('email', null, ['placeholder' => 'メールアドレスを入力']) !!}
                </div>
              </div>
            </li>
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                  パスワード
                </div>
                <div class="p-formList__data">
                  {!! Form::password('password', ['placeholder' => 'パスワードを入力']) !!}
                </div>
                <div class="p-formList__data">
                  {!! Form::password('password-confirm', ['placeholder' => 'パスワードを再度入力']) !!}
                  <div class="error">パスワードが一致しません</div>
                  <div class="error">使えない文字が含まれています</div>
                </div>
              </div>
            </li>
          </ul>
        {!! Form::close() !!}
      </main>
      <footer class="modal__footer">
        <button 
          class="modal__btn"
          data-micromodal-close
        >戻る</button>
        <button  class="modal__btn-primary">
          この内容で作成する
        </button>
      </footer>
    </div>
  </div>
</div>