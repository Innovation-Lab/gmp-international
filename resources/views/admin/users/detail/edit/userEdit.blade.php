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
              <div class="p-detail__main">
                {{-- ---------- ボックス（メインエリア） ---------- --}}
                <div class="p-detail__main__box">
                  <div class="p-detail__sidebar__box__head">
                    <h3 class="p-detail__sidebar__box__head__title">
                      登録製品情報
                    </h3>
                  </div>
                  <ul class="p-formList">
                    <li class="p-formList__item">
                      <div class="l-grid__2 l-grid__gap1">
                        <div class="p-formList__content">
                          <div class="p-formList__label optional">
                            姓
                          </div>
                          <div class="p-formList__data">
                            {!! Form::text('last-name', '田中', ['placeholder' => '例）山田']) !!}
                          </div>
                        </div>
                        <div class="p-formList__content">
                          <div class="p-formList__label optional">
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
                          <div class="p-formList__label optional">
                            セイ
                          </div>
                          <div class="p-formList__data">
                            {!! Form::text('sei', 'タナカ', ['placeholder' => '例）ヤマダ']) !!}
                          </div>
                        </div>
                        <div class="p-formList__content">
                          <div class="p-formList__label optional">
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