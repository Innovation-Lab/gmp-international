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
                    {!! Form::open(['method' => 'POST', 'route' => ['admin.users.update-user', $user], 'class' => 'p-form', 'id' => 'informationSubmitForm']) !!}
                    {!! Form::hidden('id', data_get($user, 'id')) !!}
                      <div class="p-edit__main__box__head">
                        <h3 class="p-edit__main__box__head__title">
                        ユーザー情報編集
                        </h3>
                      </div>
                      <div class="l-grid__2 l-grid__2--xl" style="gap: 1.5rem 2rem;">
                        <div class="l-grid__item">
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="l-grid__2 l-grid__gap2">
                                <div class="p-formList__content">
                                  <div class="p-formList__label optional optional">
                                    姓
                                  </div>
                                  <div class="p-formList__data">
                                    {!! Form::text('last_name', old('last_name', data_get($user, 'last_name')), ['placeholder' => '例）山田']) !!}
                                    @error('last_name')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                  </div>
                                </div>
                                <div class="p-formList__content">
                                  <div class="p-formList__label optional">
                                    名
                                  </div>
                                  <div class="p-formList__data">
                                    {!! Form::text('first_name', old('first_name', data_get($user, 'first_name')), ['placeholder' => '例）太郎']) !!}
                                    @error('first_name')
                                      <div class="error">{{ $message }}</p>
                                    @enderror
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="l-grid__2 l-grid__gap2">
                                <div class="p-formList__content">
                                  <div class="p-formList__label optional">
                                    セイ
                                  </div>
                                  <div class="p-formList__data">
                                    {!! Form::text('last_name_kana', old('last_name_kana', data_get($user, 'last_name_kana')), ['placeholder' => '例）ヤマダ']) !!}
                                    @error('last_name_kana')
                                      <div class="error">{{ $message }}</p>
                                    @enderror
                                  </div>
                                </div>
                                <div class="p-formList__content">
                                  <div class="p-formList__label optional">
                                    メイ
                                  </div>
                                  <div class="p-formList__data">
                                    {!! Form::text('first_name_kana', old('first_name_kana', data_get($user, 'first_name_kana')), ['placeholder' => '例）タロウ']) !!}
                                    @error('first_name_kana')
                                      <div class="error">{{ $message }}</p>
                                    @enderror
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label optional">
                                  メールアドレス
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::email('email', data_get($user, 'email', old('email')), ['placeholder' => '例）sample@example.com']) !!}
                                  @error('email')
                                    <div class="error">{{ $message }}</p>
                                  @enderror
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <!-- <div class="p-formList__label optional optional"> -->
                                <div class="p-formList__label optional">
                                  電話番号<small>（ハイフンなし）</small>
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::tel('tel', old('tel', data_get($user, 'tel')), ['placeholder' => '例）09012345678']) !!}
                                  @error('tel')
                                    <div class="error">{{ $message }}</p>
                                  @enderror
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label optional">
                                  新着情報、お得情報
                                </div>
                                <div class="p-formList__data">
                                  <div class="radio">
                                    <input type="radio" id="inq1-2" name="is_dm" value="1" {{ old('is_dm', data_get($user, 'is_dm')) == 1 ? 'checked' : '' }}>
                                    <label for="inq1-2">受け取る</label>
                                    <input type="radio" id="inq2-2" name="is_dm" value="0" {{ old('is_dm', data_get($user, 'is_dm')) == 0 ? 'checked' : '' }}>
                                    <label for="inq2-2">受け取らない</label>
                                  </div>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                        <div class="l-grid__item">
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label optional" style="white-space: nowrap">
                                  郵便番号<small>（ハイフンなし）</small>
                                </div>
                                <div class="p-formList__data" style="width: 143.5px;">
                                  {!! Form::number('zip_code', old('zip_code', data_get($user, 'zip_code')), ['placeholder' => '例）1230000']) !!}
                                  @error('zip_code')
                                    <div class="error">{{ $message }}</p>
                                  @enderror
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label optional">
                                  都道府県
                                </div>
                                <div class="p-formList__data" style="width: 143.5px;">
                                  {!! Form::select('prefecture', $prefectures, old('prefecture', data_get($user, 'prefecture')), ['placeholder' => '都道府県を選択']) !!}
                                  @error('prefecture')
                                    <div class="error">{{ $message }}</p>
                                  @enderror
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label optional">
                                  市区町村
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::text('address_city', old('address_city', data_get($user, 'address_city')), ['placeholder' => '例）渋谷区']) !!}
                                  @error('address_city')
                                    <div class="error">{{ $message }}</p>
                                  @enderror
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label optional">
                                  番地
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::text('address_block', old('address_block', data_get($user, 'address_block')), ['placeholder' => '例）渋谷1-2-3']) !!}
                                  @error('address_block')
                                    <div class="error">{{ $message }}</p>
                                  @enderror
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
                                <div class="p-formList__label optional">
                                  パスワード<small>（半角英数字6文字~）</small>
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
                                  <textarea name="memo" value="{{ old('memo', data_get($user, 'memo')) }}" placeholder="修正対応や報告事項を記載してください。" class="c-scroll"></textarea>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    {!! Form::close() !!}
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