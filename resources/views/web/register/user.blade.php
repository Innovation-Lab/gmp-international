@extends('web.layouts.pages._form')
@section('title', 'ユーザー情報の入力')
@section('class', 'body_')
@section('content')
  <div class="l-frame__body">
    <div class="p-register">
      <div class="p-register__head">
        <div class="l-container">
          <div class="p-register__ttl">
            <p class="c-ttl">新規会員登録</p>
          </div>
          <!-- ステップ2 -->
          <div class="p-register__step">
            <ul class="p-step">
              <li class="p-step__item p-step__item--complete">
                <p class="c-txt c-txt--step">アカウント<br>情報の入力</p>
              </li>
              <li class="p-step__item p-step__item--current">
                <p class="c-txt c-txt--step">ユーザー<br>情報の入力</p>
              </li>
              <li class="p-step__item">
                <p class="c-txt c-txt--step">購入製品<br>登録</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="p-register__body">
        <form method="POST" action="{{ route('register.store.information') }}" id="informationSubmitForm">
          @csrf
          <div class="l-container">
            <ul class="p-formList">
              <!-- お名前 -->
              <li class="p-formList__item p-formList__item--half">
                <!-- 姓 -->
                <div class="p-formList__content">
                  <div class="p-formList__label">
                      <p class="c-txt">お名前　<span class="c-txt c-txt--must">必須</span></p>
                  </div>
                  <div class="p-formList__data">
                    <input placeholder="例）山田" class="required" name="last_name" type="text" value="{{ old('last_name') }}">
                    @error('last_name')
                      <div class="c-txt c-txt--err">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <!-- 名 -->
                <div class="p-formList__content">
                  <div class="p-formList__data">
                    <input placeholder="例）太郎" class="required" name="first_name" type="text" value="{{ old('first_name') }}">
                    @error('first_name')
                      <div class="c-txt c-txt--err">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </li>
              <!-- フリガナ -->
              <li class="p-formList__item p-formList__item--half">
                <!-- セイ -->
                <div class="p-formList__content">
                  <div class="p-formList__label">
                      <p class="c-txt">フリガナ　<span class="c-txt c-txt--must">必須</span></p>
                  </div>
                  <div class="p-formList__data">
                    <input placeholder="例）ヤマダ" class="required" name="last_name_kana" type="text" value="{{ old('last_name_kana') }}">
                    @error('last_name_kana')
                      <div class="c-txt c-txt--err">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <!-- 名 -->
                <div class="p-formList__content">
                  <div class="p-formList__data">
                    <input placeholder="例）タロウ" class="required" name="first_name_kana" type="text" value="{{ old('first_name_kana') }}">
                    @error('first_name_kana')
                      <div class="c-txt c-txt--err">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </li>
              <!-- 郵便番号 -->
              <li class="p-formList__item">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                      <p class="c-txt">郵便番号　<span class="c-txt c-txt--must">必須</span></p>
                  </div>
                  <div class="p-formList__data">
                    <input placeholder="" maxlength="7" class="required" name="zip_code" type="number" value="{{ old('zip_code') }}">
                    @error('zip_code')
                      <div class="c-txt c-txt--err">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </li>
              <!-- 住所 -->
              <li class="p-formList__item">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                      <p class="c-txt">住所　<span class="c-txt c-txt--must">必須</span></p>
                  </div>
                  <div class="p-formList__data">
                    <select name="prefecture" value="{{ old('prefecture') }}">
                      @foreach($prefectures as $index => $name)
                        <option value="" hidden>都道府県</option>
                        <option value="{{ $index }}" {{ old('prefecture') == $index ? 'selected' : '' }} >{{ $name }}</option>
                      @endforeach
                    </select>
                    @error('prefecture')
                      <div class="c-txt c-txt--err">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="p-formList__data">
                    <input placeholder="市区町村" class="required" name="address_city" type="text" value="{{ old('address_city') }}">
                    @error('address_city')
                      <div class="c-txt c-txt--err">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="p-formList__data">
                    <input placeholder="番地" class="required" name="address_block" type="text" value="{{ old('address_block') }}">
                    @error('address_block')
                      <div class="c-txt c-txt--err">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="p-formList__data">
                    <input placeholder="建物名" class="required" name="address_building" type="text" value="{{ old('address_building') }}">
                    @error('address_building')
                      <div class="c-txt c-txt--err">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </li>
              <!-- 電話番号 -->
              <li class="p-formList__item">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                      <p class="c-txt">電話番号　<span class="c-txt c-txt--must">必須</span></p>
                  </div>
                  <div class="p-formList__data">
                    <input placeholder="例）08012345678" class="required" name="tel" type="number" value="{{ old('tel') }}">
                    @error('tel')
                      <div class="c-txt c-txt--err">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </form>
      </div>
      <div class="p-register__foot">
        <div class="l-container">
          <div class="p-btnWrap">
            <a href="{{route('register.account')}}" class="c-btn c-btn--back">戻る</a>
            <button type="submit" class="c-btn c-btn--next" form="informationSubmitForm">購入製品の登録へ</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection