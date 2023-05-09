@extends('admin.layouts.pages._default')
@section('title', 'ユーザー管理')
@section('content')
<div class="p-detail">
  <div class="l-detail">
    <div class="l-detail__head">
      {{-- 詳細ヘッド --}}
      @include('admin.users.detail._head')
    </div>
    <div class="l-detail__body">
      <div class="wrapper">
        <div class="container">
          <div class="l-detail__body__inner">
            {{-- サイドバー --}}
            <div class="l-detail__sidebar">
              @include('admin.users.detail._sidebar')
            </div>
            {{-- メイン --}}
            <div class="l-detail__main">
              {{-- ---------- タブ ---------- --}}
              @include('admin.users.detail._tab')
              <div class="p-detail__main">
                {{-- ---------- ボックス（メインエリア） ---------- --}}
                <div class="p-detail__main__box">
                  <div class="p-detail__main__box__wrapper">
                    <form action="" class="p-form">
                      <div class="l-grid__1 l-grid__2--xl">
                        <div class="l-grid__item">
                          <div class="p-detail__main__box__head">
                            <h3 class="p-detail__main__box__head__title">
                              基本情報
                            </h3>
                          </div>
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="l-grid__2 l-grid__gap1">
                                <div class="p-formList__content">
                                  <div class="p-formList__label">
                                    姓
                                  </div>
                                  <div class="p-formList__data">
                                    {!! Form::text('last-name', '田中', ['placeholder' => '例）山田']) !!}
                                  </div>
                                </div>
                                <div class="p-formList__content">
                                  <div class="p-formList__label">
                                    名
                                  </div>
                                  <div class="p-formList__data">
                                    {!! Form::text('first-name', '由梨恵', ['placeholder' => '例）太郎']) !!}
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
                                    {!! Form::text('sei', 'タナカ', ['placeholder' => '例）ヤマダ']) !!}
                                  </div>
                                </div>
                                <div class="p-formList__content">
                                  <div class="p-formList__label">
                                    メイ
                                  </div>
                                  <div class="p-formList__data">
                                    {!! Form::text('mei', 'ユリエ', ['placeholder' => '例）タロウ']) !!}
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
                                    {!! Form::radio('gender', 'value', false, ['id' => 'gender-male']) !!}
                                    {!! Form::label('gender-male', '男性') !!}
                                    {!! Form::radio('gender', 'value', true, ['id' => 'gender-female']) !!}
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
                                            <option>
                                              年を選択
                                            </option>
                                            <option value="{{'birth-year-'.($i)}}" selected>
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
                                          'birth-month-06', ['placeholder' => '月を選択']
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
                                          'birth-day-28', ['placeholder' => '日を選択']
                                        )
                                      !!}
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </li>
                          </ul>
                          <div class="p-detail__main__box__head" style="margin-top: 3rem;">
                            <h3 class="p-detail__main__box__head__title">
                              パスワード
                            </h3>
                          </div>
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__data">
                                  {!! Form::checkbox('change-password', 'value', false, ['id' => 'change-password','onclick' => 'checkChangePassword()']) !!}
                                  {!! Form::label('change-password', 'パスワードを変更する') !!}
                                </div>
                                <div class="p-formList__data js-target__change-password" style="display: none;">
                                  {!! Form::password('password', ['placeholder' => 'パスワードを入力']) !!}
                                </div>
                                <div class="p-formList__data js-target__change-password" style="display: none;">
                                  {!! Form::password('password-confirm', ['placeholder' => 'パスワードを再度入力']) !!}
                                </div>
                              </div>
                              {{-- パスワード変更 表示/非表示 --}}
                              <script>
                                function checkChangePassword(){
                                  radio = document.getElementsByName('change-password')
                                  if(radio[0].checked) {
                                    $('.js-target__change-password').css({'display':'block'});
                                  }else{
                                    $('.js-target__change-password').css({'display':'none'});
                                  }
                                }
                              </script>  
                            </li>
                          </ul>
                        </div>
                        <div class="l-grid__item">
                          <div class="p-detail__main__box__head">
                            <h3 class="p-detail__main__box__head__title">
                              連絡先
                            </h3>
                          </div>
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label optional">
                                  電話番号
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::tel('telephone', '09012345678', ['placeholder' => '例）09012345678']) !!}
                                </div>
                                <small>ハイフンなしで入力してください</small>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  メールアドレス
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::email('email', 'sample@example.com', ['placeholder' => '例）sample@example.com']) !!}
                                </div>
                              </div>
                            </li>
                          </ul>
                          <div class="p-detail__main__box__head" style="margin-top: 3rem;">
                            <h3 class="p-detail__main__box__head__title optional">
                              配送先
                            </h3>
                          </div>
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="l-grid__2 l-grid__gap1">
                                <div class="l-grid__item">
                                  <div class="p-formList__content">
                                    <div class="p-formList__label">
                                      郵便番号
                                    </div>
                                    <div class="p-formList__data">
                                      {!! Form::number('zip', '1230000', ['placeholder' => '例）1230000']) !!}
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
                                  {!! Form::text('city', '渋谷区渋谷123', ['placeholder' => '例）渋谷区渋谷1-2-3']) !!}
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  マンション名・部屋番号など
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::text('room', 'マンション名・部屋番号など', ['placeholder' => '例）渋谷マンション1201']) !!}
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="p-detail__main__box__foot">
                    <button class="c-button__reset">変更をリセット</button>
                    <button class="c-button__disabled">保存する</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- 要素をページ下部に固定 --}}
    {{--
    <div class="l-detail__foot">
      <div class="p-detail__foot">
        要素をページ下部に固定
      </div>
    </div>
    --}}
  </div>
</div>
{{-- ユーザー写真 --}}
@include('admin.users._modal-users-photo')
<script>
  // (function() {
  //   const table = $('table');
  //   const thLength = table.find('th').length;
  //   table.css('grid-template-columns','repeat(' + thLength + ', minmax(max-content, 1fr))')
  // })();
</script>
@endsection