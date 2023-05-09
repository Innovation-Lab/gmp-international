@extends('web.layout.layout--form')
@section('title', 'サイト使用パーツ')
@section('content')
  <div class="p-parts">
    <!-- カラー -->
    <div class="p-parts__item">
      <div class="p-parts__head">
        カラー
      </div>
      <div class="p-parts__body">
        <ul class="p-parts__colorList">
          @foreach([
          'primary',
          'primaryDark',
          'secondary',
          'textPrimary',
          'textSecondary',
          'textThird',
          'textDisabled',
          'backgroundDark',
          'background',
          'backgroundLight',
          'backgroundError',
          'line',
          'lineLight',
          'lineExtraLight',
          'lineForm',
          'correct',
          'error'
          ] as $val)
          <li class="p-parts__colorList__item {{'p-parts__colorList__item--'.$val}}">
            <div class="c-image"></div>
            <p class="p-parts__colorList__name">{{$val}}</p>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
    <!-- ボタン -->
    <div class="p-parts__item">
      <div class="p-parts__head">
        ボタン
      </div>
      <div class="p-parts__body">
        <div class="l-grid">
          <div class="l-grid__6">
            <div class="l-stack">
              <div class="l-stack__item">
                <div class="c-button">.c-button</div>
              </div>
              <div class="l-stack__item">
                <div class="c-button c-button--1">.c-button--1</div>
              </div>
              <div class="l-stack__item">
                <div class="c-button c-button--2">.c-button--2</div>
              </div>
            </div>
          </div>
          <div class="l-grid__6">
            <div class="l-stack">
              <div class="l-stack__item">
                <div class="c-button c-button--negative">.c-button--negative</div>
              </div>
              <div class="l-stack__item">
                <div class="c-button c-button--alert">.c-button--alert</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- リスト -->
    <div class="p-parts__item">
      <div class="p-parts__head">
        リスト(component._p-list)
      </div>
      <div class="p-parts__body">
        @component('component._p-list',
          ['list' => 
            [
              'ラベル1' => '値テキスト',
              'ラベル2' => '値テキスト',
              'ラベル3' => '<div class="c-button c-button--1">ボタン</div>',
            ]
          ]
        )
        @endcomponent
      </div>
    </div>
    <!-- フォームリスト -->
    <div class="p-parts__item">
      <div class="p-parts__head">
        フォームリスト
      </div>
      <div class="p-parts__body">
        <form action="" class="p-form">
          <div class="l-grid l-grid--gap48">
            <div class="l-grid__6">
              <ul class="p-formList">
                <li class="p-formList__item">
                  <div class="p-formList__content">
                    <div class="p-formList__content__label">
                      日付（.datePicker）
                    </div>
                    <div class="p-formList__content__data">
                      <div class="l-grid">
                        <div class="l-grid__fix160">
                          <div class="p-form__icon p-form__icon--calendar">
                            <input class="datePicker" type="text" placeholder="----/--/--" value="2021/09/15">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="p-formList__item">
                  <div class="p-formList__content">
                    <div class="p-formList__content__label">
                      金額（.numberFormat）
                    </div>
                    <div class="p-formList__content__data">
                      <div class="p-form__icon p-form__icon--yen">
                        <input class="numberFormat" type="text" value="{{number_format(1000000)}}">
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="l-grid__6">
              <ul class="p-formList">
                <li class="p-formList__item">
                  <div class="p-formList__content">
                    <div class="p-formList__content__label">
                      テキストエリア
                    </div>
                    <div class="p-formList__content__data">
                      <textarea placeholder="メモ"></textarea>
                    </div>
                    <div class="p-formList__content__alert">
                      <p class="p-formList__content__alert__message">エラーの表示</p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- モーダル -->
    <div class="p-parts__item">
      <div class="p-parts__head">
        モーダル
      </div>
      <div class="p-parts__body">
        <div class="c-button" data-remodal-target="modalSample">モーダル</div>
        @include('component._modalSample')
      </div>
    </div>
  </div>
@endsection