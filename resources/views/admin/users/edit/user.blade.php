@extends('admin.layouts.pages._default')
@section('title', 'ユーザー管理')
@section('content')
<div class="p-edit">
  <div class="l-edit">
    <div class="l-edit__head">
      {{-- 詳細ヘッド --}}
      @include('admin.users.edit._head', $user)
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
                    <form method="POST" action="{{ route('admin.') }}" class="p-form" id="informationSubmitForm">
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
                                    {!! Form::text('last_name', old('last_name', data_get($user, 'last_name')), ['placeholder' => '例）山田']) !!}
                                  </div>
                                </div>
                                <div class="p-formList__content">
                                  <div class="p-formList__label">
                                    名
                                  </div>
                                  <div class="p-formList__data">
                                    {!! Form::text('first_name', old('first_name', data_get($user, 'first_name')), ['placeholder' => '例）太郎']) !!}
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
                                    {!! Form::text('last_name_kana', old('last_name_kana', data_get($user, 'last_name_kana')), ['placeholder' => '例）ヤマダ']) !!}
                                  </div>
                                </div>
                                <div class="p-formList__content">
                                  <div class="p-formList__label">
                                    メイ
                                  </div>
                                  <div class="p-formList__data">
                                    {!! Form::text('first_name_kana', old('first_name_kana', data_get($user, 'first_name_kana')), ['placeholder' => '例）タロウ']) !!}
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
                                  {!! Form::email('email', old('email', data_get($user, 'email')), ['placeholder' => '例）sample@example.com']) !!}
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
                                  {!! Form::tel('tel', old('tel', data_get($user, 'tel')), ['placeholder' => '例）09012345678']) !!}
                                </div>
                                <!-- <small>ハイフンなしで入力してください</small> -->
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  新着情報、お得情報
                                </div>
                                <div class="p-formList__data">
                                  <div class="radio">
                                    <input type="radio" id="inq1-2" name="is_dm" value="1" {{ old('is_dm', data_get($user, 'is_dm')) == 1 ? 'checked' : '' }}>
                                    <label for="inq1-2">同意する</label>
                                    <input type="radio" id="inq2-2" name="is_dm" value="0" {{ old('is_dm', data_get($user, 'is_dm')) == 0 ? 'checked' : '' }}>
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
                                      {!! Form::number('zip_code', old('zip_code', data_get($user, 'zip_code')), ['placeholder' => '例）1230000']) !!}
                                    </div>
                                  </div>
                                </div>
                                <div class="l-grid__item">
                                  <div class="p-formList__content">
                                    <div class="p-formList__label">
                                      都道府県
                                    </div>
                                    <div class="p-formList__data">
                                      {!! Form::select('prefectures', $prefectures, old('prefecture', data_get($user, 'prefecture')), ['placeholder' => '都道府県を選択']) !!}
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
                                  {!! Form::text('address_city', old('address_city', data_get($user, 'address_city')), ['placeholder' => '例）渋谷区']) !!}
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  番地
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::text('address_block', old('address_block', data_get($user, 'address_block')), ['placeholder' => '例）渋谷1-2-3']) !!}
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  マンション名・部屋番号など
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::text('address_building', old('address_building', data_get($user, 'address_building')), ['placeholder' => '例）渋谷マンション1201']) !!}
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  パスワード<small>（半角英数字6~10文字）</small>
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::password('password', ['placeholder' => '例）gmp0001']) !!}
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
                                  <textarea name="memo" placeholder="修正対応や報告事項を記載してください。" class="c-scroll"></textarea>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="p-edit__main__box__foot">
                    <a href="{{ url()->current() }}" class="c-button__reset">変更をリセット</a>
                    <button type="submit" form="informationSubmitForm" class="c-button">変更を反映する</button>
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