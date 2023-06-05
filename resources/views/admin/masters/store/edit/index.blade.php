@extends('admin.layouts.pages._default')
@section('title', '店舗情報編集')
@section('content')
<div class="p-edit">
  <div class="l-edit">
    <div class="l-edit__head">
      {{-- 詳細ヘッド --}}
      @include('admin.masters.store.edit._head')
    </div>
    <div class="l-edit__body">
      <div class="wrapper u-max--800">
        <div class="container">
          <div class="l-edit__body__inner single">
            {{-- メイン --}}
            <div class="l-edit__main">
              <div class="p-edit__main">
                {{-- ---------- ボックス（メインエリア） ---------- --}}
                <div class="p-edit__main__box">
                  <div class="p-edit__main__box__wrapper">
                    {{-- フォーム --}}
                    <form action="" class="p-form">
                      <div class="p-edit__main__box__head">
                        <h3 class="p-edit__main__box__head__title">
                        店舗情報編集
                        </h3>
                      </div>
                      <div class="l-grid__2 l-grid__2--xl" style="gap: 1.5rem 2rem;">
                        <div class="l-grid__item" style="grid-column: 1/3;">
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__data" style="width: 220px;">
                                  <input type="file" id="store_img" name="store_img" value="">
                                  <label for="product_img" class="">
                                    <img src="{{asset('img/admin/store/airbuggy-yoyogipark.png')}}">
                                  </label>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                        <div class="l-grid__item">
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  店舗名
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::text('store-name', 'エアバギー代々木公園本店', ['placeholder' => '例）エアバギー○○店']) !!}
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <!-- <div class="p-formList__label optional"> -->
                                <div class="p-formList__label">
                                  電話番号
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::tel('telephone', '090-1234-5678', ['placeholder' => '例）09012345678']) !!}
                                </div>
                                <!-- <small>ハイフンなしで入力してください</small> -->
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="l-grid__2 l-grid__gap2">
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
                                  建物名など
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::text('room', 'ラクール代々木公園1F', ['placeholder' => '例）代々木公園ビル1F']) !!}
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                        <div class="l-grid__item">
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="l-grid__1 l-grid__gap2">
                                <div class="l-grid__item">
                                  <div class="p-formList__content">
                                    <div class="p-formList__label">
                                      営業時間1
                                    </div>
                                    <div class="l-grid__4">
                                      <div class="p-formList__data">
                                        {!! Form::time('prefectures', '10:00', ['placeholder' => '例）10:00']) !!}
                                      </div>
                                      <div class="p-formList__data store">
                                        {!! Form::time('prefectures', '19:00', ['placeholder' => '例）19:00']) !!}
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  営業時間1備考
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::text('hour', '（定休日：木曜）', ['placeholder' => '例）定休日：○曜日']) !!}
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="l-grid__1 l-grid__gap2">
                                <div class="l-grid__item">
                                  <div class="p-formList__content">
                                    <div class="p-formList__label">
                                      営業時間2
                                    </div>
                                    <div class="l-grid__4">
                                      <div class="p-formList__data">
                                        {!! Form::time('prefectures', '10:00', ['placeholder' => '例）11:00']) !!}
                                      </div>
                                      <div class="p-formList__data store">
                                        {!! Form::time('prefectures', '20:00', ['placeholder' => '例）20:00']) !!}
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  営業時間2備考
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::text('hour', '（土日祝）', ['placeholder' => '例）定休日：○曜日']) !!}
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="p-edit__main__box__foot">
                    <button class="c-button__reset">変更をリセット</button>
                    <button class="c-button">変更を反映する</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- 要素をページ下部に固定 --}}
    {{--
    <div class="l-edit__foot">
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

                              