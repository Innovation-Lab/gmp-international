@extends('web.layouts.pages._form')
@section('title', 'ユーザー情報の入力')
@section('class', 'body_')
@section('content')
  <div class="l-frame__body">
    <div class="p-formPage">
      <div class="p-formPage__head">
        <div class="l-container">
          <div class="p-formPage__head__ttl">
            <p class="c-ttl">新規会員登録</p>
          </div>
          <!-- ステップ2 -->
          <div class="p-formPage__step">
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
      <div class="l-container">
        <div class="p-formPage__body">
          <form method="POST" action="{{ route('register.store.information') }}" id="informationSubmitForm">
            @csrf
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
                          <input placeholder="例）山田" class="required" name="last_name" type="text" value="{{ old('last_name') }}">
                        </div>
                        @error('last_name')
                          <div class="c-txt c-txt--err">{{ $message }}</div>
                        @enderror
                      </div>
                      <!-- 名 -->
                      <div class="c-input__item @error('first_name') c-input__item--err @enderror">
                        <div class="c-input">
                          <input placeholder="例）太郎" class="required" name="first_name" type="text" value="{{ old('first_name') }}">
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
                          <input placeholder="例）ヤマダ" class="required" name="last_name_kana" type="text" value="{{ old('last_name_kana') }}">
                        </div>
                        @error('last_name_kana')
                          <div class="c-txt c-txt--err">{{ $message }}</div>
                        @enderror
                      </div>
                      <!-- メイ -->
                      <div class="c-input__item @error('last_name_kana') c-input__item--err @enderror">
                        <div class="c-input">
                          <input placeholder="例）タロウ" class="required" name="first_name_kana" type="text" value="{{ old('first_name_kana') }}">
                        </div>
                        @error('last_name_kana')
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
                      <input id="postcode" placeholder="1500000" maxlength="7" class="required" name="zip_code" type="number" value="{{ old('zip_code') }}">
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
                      <select id="address1" name="prefecture" value="{{ old('prefecture') }}">
                        @foreach($prefectures as $index => $name)
                          <option value="" hidden>都道府県</option>
                          <option value="{{ $index }}" {{ old('prefecture') == $index ? 'selected' : '' }} >{{ $name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="c-input">
                      <input id="address2" placeholder="市区町村" class="required" name="address_block" type="text" value="{{ old('address_block') }}">
                    </div>
                    <div class="c-input">
                      <input id="address3" placeholder="番地・建物名" class="required" name="address_building" type="text" value="{{ old('address_building') }}">
                    </div>
                    @error('prefecture')
                      <div class="c-txt c-txt--err">{{ $message }}</div>
                    @enderror
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
                      <input placeholder="例）08012345678" class="required" name="tel" type="number" value="{{ old('tel') }}">
                    </div>
                    @error('tel')
                      <div class="c-txt c-txt--err">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </li>
              <!-- カタログの送付 -->
              <li class="p-formList__item">
                <div class="p-formList__content">
                  <div class="p-formList__label p-formList__label--thin">
                      <p class="c-txt">カタログの送付 <span class="c-txt c-txt--must">必須</span></p>
                  </div>
                  <div class="p-formList__data">
                    <div class="c-input c-input--radio">
                      <input type="radio" id="inq1-1" name="num_of_inq-1" value="1" checked>
                      <label for="inq1-1">希望する</label>
                      <input type="radio" id="inq2-1" name="num_of_inq-1" value="2">
                      <label for="inq2-1">希望しない</label>
                    </div>
                  </div>
                </div>
              </li>
              <!-- DMの送付 -->
              <li class="p-formList__item">
                <div class="p-formList__content">
                  <div class="p-formList__label p-formList__label--thin">
                      <p class="c-txt">DMの送付 <span class="c-txt c-txt--must">必須</span></p>
                  </div>
                  <div class="p-formList__data">
                    <div class="c-input c-input--radio">
                      <input type="radio" id="inq1-2" name="num_of_inq-2" value="1" checked>
                      <label for="inq1-2">希望する</label>
                      <input type="radio" id="inq2-2" name="num_of_inq-2" value="2">
                      <label for="inq2-2">希望しない</label>
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