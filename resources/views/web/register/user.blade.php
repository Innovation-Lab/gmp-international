@extends('web.layouts.pages._form')
@section('title', 'ユーザー情報の入力')
@section('class', 'body_')
@section('content')
  <div class="l-frame__body">
    <div class="p-formPage">
      <div class="p-formPage__head">
        <div class="l-container">
          <!-- ステップ2 -->
          <div class="p-formPage__step">
            <ul class="p-step">
              <li class="p-step__item p-step__item--complete">
                <p class="c-txt c-txt--step">STEP1</p>
              </li>
              <li class="p-step__item p-step__item--current">
                <p class="c-txt c-txt--step">STEP2</p>
              </li>
              <li class="p-step__item">
                <p class="c-txt c-txt--step">STEP3</p>
              </li>
            </ul>
          </div>
          <div class="p-formPage__head__ttl">
            <p class="c-ttl">ユーザー情報の入力</p>
          </div>
        </div>
      </div>
      <div class="l-container">
        <div class="p-formPage__body">
          {{--<div class="skip">
            <a class="c-btn c-btn--text c-btn--text--bk " onclick="addHiddenFieldAndSubmit()">
              後で登録する
            </a>
          </div>--}}
          <form method="POST" class="h-adr" action="{{ route('register.store.information') }}" id="informationSubmitForm">
            @csrf
            <input type="hidden" name="is_skip" id="is_skip_input" value="0">
            <span class="p-country-name" style="display:none;">Japan</span>
            <ul class="p-formList">
              <!-- お名前 -->
              <li class="p-formList__item p-formList__item--half">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                      <p class="c-txt">お名前 <span class="c-txt c-txt--must">必須</span></p>
                  </div>
                  <div class="p-formList__data">
                    <div class="c-input c-input--name">
                      <!-- 姓 -->
                      <div class="c-input__item @error('last_name') c-input__item--err @enderror">
                        <div class="c-input">
                          <input placeholder="例）山田" class="required" name="last_name" type="text" value="{{ old('last_name', data_get($user, 'last_name')) }}">
                        </div>
                        @error('last_name')
                          <div class="c-txt c-txt--err">{{ $message }}</div>
                        @enderror
                      </div>
                      <!-- 名 -->
                      <div class="c-input__item @error('first_name') c-input__item--err @enderror">
                        <div class="c-input">
                          <input placeholder="例）太郎" class="required" name="first_name" type="text" value="{{ old('first_name', data_get($user, 'first_name')) }}">
                        </div>
                        @error('first_name')
                          <div class="c-txt c-txt--err">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <!-- フリガナ -->
              <li class="p-formList__item p-formList__item--half">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                      <p class="c-txt">フリガナ <span class="c-txt c-txt--must">必須</span></p>
                  </div>
                  <div class="p-formList__data">
                    <div class="c-input c-input--name">
                      <!-- セイ -->
                      <div class="c-input__item @error('last_name_kana') c-input__item--err @enderror">
                        <div class="c-input">
                          <input placeholder="例）ヤマダ" class="required" name="last_name_kana" type="text" value="{{ old('last_name_kana', data_get($user, 'last_name_kana')) }}">
                        </div>
                        @error('last_name_kana')
                          <div class="c-txt c-txt--err">{{ $message }}</div>
                        @enderror
                      </div>
                      <!-- メイ -->
                      <div class="c-input__item @error('last_name_kana') c-input__item--err @enderror">
                        <div class="c-input">
                          <input placeholder="例）タロウ" class="required" name="first_name_kana" type="text" value="{{ old('first_name_kana', data_get($user, 'first_name_kana')) }}">
                        </div>
                        @error('first_name_kana')
                          <div class="c-txt c-txt--err">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <!-- 郵便番号 -->
              <li class="p-formList__item">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                      <p class="c-txt">郵便番号 <span class="c-txt c-txt--must">必須</span></p>
                  </div>
                  <div class="p-formList__data @error('zip_code') p-formList__data--err @enderror">
                    <div class="c-input c-input--post">
                      <input id="postcode" placeholder="半角数値7桁" maxlength="7" class="required p-postal-code" name="zip_code" type="text" value="{{ old('zip_code', data_get($user, 'zip_code')) }}" pattern="[0-9]{7}">
                    </div>
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
                      <p class="c-txt">住所 <span class="c-txt c-txt--must">必須</span></p>
                  </div>
                  <div class="p-formList__data @error('prefecture') p-formList__data--selectErr @enderror">
                    <div class="c-input c-input--select c-input--prefectures">
                      <select id="prefecture" name="prefecture" class="p-region">
                        @foreach($prefectures as $index => $name)
                          <option value="" hidden>都道府県</option>
                          <option value="{{ $index }}" {{ old('prefecture', data_get($user, 'prefecture')) == $index ? 'selected' : '' }} >{{ $name }}</option>
                        @endforeach
                      </select>
                    </div>
                      @error('prefecture')
                        <div class="c-txt c-txt--err" style="margin-bottom: 7px">{{ $message }}</div>
                      @enderror
                    <div class="c-input p-formList__data @error('address_city') p-formList__data--err @enderror">
                      <input id="address2" placeholder="市区町村" class="required p-locality p-street-address " name="address_city" type="text" value="{{ old('address_city', data_get($user, 'address_city')) }}">
                      @error('address_city')
                        <div class="c-txt c-txt--err">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="c-input p-formList__data @error('address_block') p-formList__data--err @enderror">
                      <input placeholder="番地" class="required p-extended-address" name="address_block" type="text" value="{{ old('address_block', data_get($user, 'address_block')) }}">
                      @error('address_block')
                        <div class="c-txt c-txt--err">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="c-input">
                      <input placeholder="建物名" class="required" name="address_building" type="text" value="{{ old('address_building', data_get($user, 'address_building')) }}">
                      @error('address_building')
                        <div class="c-txt c-txt--err">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>                  
                </div>
              </li>
              <!-- 電話番号 -->
              <li class="p-formList__item">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                      <p class="c-txt">電話番号 <span class="c-txt c-txt--must">必須</span></p>
                  </div>
                  <div class="p-formList__data @error('tel') p-formList__data--err @enderror">
                    <div class="c-input c-input--tel">
                      <input placeholder="例）08012345678" class="required" name="tel" type="tel" value="{{ old('tel', data_get($user, 'tel')) }}">
                    </div>
                    @error('tel')
                      <div class="c-txt c-txt--err">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </li>
              {{--個人情報の取り扱いについて--}}
              <li class="p-formList__item">
                <div class="p-formList__content">
                  <div class="p-formList__label p-formList__label--thin">
                      <p class="c-txt"></p>
                  </div>
                  <div class="p-formList__data">
                    <div class="c-input c-input--radio">
                      <input type="checkbox" id="inq1-2" name="is_dm" value="1" {{ old('is_dm', data_get($user, 'is_dm', 0)) == 1 ? 'checked' : '' }}>
                      <label for="inq1-2" style="width: auto;">新着情報、お得情報を受け取る</label>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </form>
        </div>
        <div class="p-formPage__foot p-formPage__foot--wide">
          <div class="p-btnWrap p-btnWrap--center">
            <a href="{{route('register.account')}}" class="c-btn c-btn--back">戻る</a>
            <button type="submit" class="c-btn c-btn--next" form="informationSubmitForm">購入製品の登録へ</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
<script>
  function addHiddenFieldAndSubmit() {
      $("#is_skip_input").val(1);
      $("#informationSubmitForm").submit();
  }
</script>