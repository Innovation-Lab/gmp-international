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
                  <input placeholder="例）山田" class="required" name="name" type="name" value="">
                </div>
                <p style="display: none;" class="c-txt c-txt--err">「姓」を入力してください。<br>※全角で入力してください。</p>
              </div>
              <!-- 名 -->
              <div class="p-formList__content">
                <div class="p-formList__data">
                  <input placeholder="例）太郎" class="required" name="email" type="email" value="">
                </div>
                <p style="display: none;" class="c-txt c-txt--err">「名」を入力してください。<br>※全角で入力してください。</p>
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
                  <input placeholder="例）ヤマダ" class="required" name="name" type="name" value="">
                </div>
                <p style="display: none;" class="c-txt c-txt--err">「セイ」を入力してください。<br>※全角カタカナで入力してください。</p>
              </div>
              <!-- 名 -->
              <div class="p-formList__content">
                <div class="p-formList__data">
                  <input placeholder="例）タロウ" class="required" name="email" type="email" value="">
                </div>
                <p style="display: none;" class="c-txt c-txt--err">「メイ」を入力してください。<br>※全角カタカナで入力してください。</p>
              </div>
            </li>
            <!-- 郵便番号 -->
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                    <p class="c-txt">郵便番号　<span class="c-txt c-txt--must">必須</span></p>
                </div>
                <div class="p-formList__data">
                  <input placeholder="例）1001234" maxlength="7" class="required" name="passward" type="passward" value="">
                </div>
                <p style="display: none;" class="c-txt c-txt--err">郵便番号を入力してください。</p>
              </div>
            </li>
            <!-- 住所 -->
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                    <p class="c-txt">住所　<span class="c-txt c-txt--must">必須</span></p>
                </div>
                <div style="width:152px;" class="p-formList__data">
                  <select name="pref">
                    <option value="" selected>都道府県</option>
                    <option value="北海道">北海道</option>
                    <option value="青森県">青森県</option>
                    <option value="岩手県">岩手県</option>
                    <option value="宮城県">宮城県</option>
                    <option value="秋田県">秋田県</option>
                    <option value="山形県">山形県</option>
                    <option value="福島県">福島県</option>
                    <option value="茨城県">茨城県</option>
                    <option value="栃木県">栃木県</option>
                    <option value="群馬県">群馬県</option>
                    <option value="埼玉県">埼玉県</option>
                    <option value="千葉県">千葉県</option>
                    <option value="東京都">東京都</option>
                    <option value="神奈川県">神奈川県</option>
                    <option value="新潟県">新潟県</option>
                    <option value="富山県">富山県</option>
                    <option value="石川県">石川県</option>
                    <option value="福井県">福井県</option>
                    <option value="山梨県">山梨県</option>
                    <option value="長野県">長野県</option>
                    <option value="岐阜県">岐阜県</option>
                    <option value="静岡県">静岡県</option>
                    <option value="愛知県">愛知県</option>
                    <option value="三重県">三重県</option>
                    <option value="滋賀県">滋賀県</option>
                    <option value="京都府">京都府</option>
                    <option value="大阪府">大阪府</option>
                    <option value="兵庫県">兵庫県</option>
                    <option value="奈良県">奈良県</option>
                    <option value="和歌山県">和歌山県</option>
                    <option value="鳥取県">鳥取県</option>
                    <option value="島根県">島根県</option>
                    <option value="岡山県">岡山県</option>
                    <option value="広島県">広島県</option>
                    <option value="山口県">山口県</option>
                    <option value="徳島県">徳島県</option>
                    <option value="香川県">香川県</option>
                    <option value="愛媛県">愛媛県</option>
                    <option value="高知県">高知県</option>
                    <option value="福岡県">福岡県</option>
                    <option value="佐賀県">佐賀県</option>
                    <option value="長崎県">長崎県</option>
                    <option value="熊本県">熊本県</option>
                    <option value="大分県">大分県</option>
                    <option value="宮崎県">宮崎県</option>
                    <option value="鹿児島県">鹿児島県</option>
                    <option value="沖縄県">沖縄県</option>
                  </select>
                </div>
                <div class="p-formList__data">
                  <input placeholder="市区町村 番地" class="required" name="passward" type="passward" value="">
                </div>
                <div class="p-formList__data">
                  <input placeholder="建物名" class="required" name="passward" type="passward" value="">
                </div>
                <p style="display: none;" class="c-txt c-txt--err">都道府県を選択してください。</p>
              </div>
            </li>
            <!-- 電話番号 -->
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                    <p class="c-txt">電話番号　<span class="c-txt c-txt--must">必須</span></p>
                </div>
                <div class="p-formList__data">
                  <input placeholder="例）08012345678" class="required" name="passward" type="passward" value="">
                </div>
                <p style="display: none;" class="c-txt c-txt--err">電話番号を入力してください。</p>
              </div>
            </li>
            <!-- カタログの送付 -->
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                    <p class="c-txt">カタログの送付　<span class="c-txt c-txt--must">必須</span></p>
                </div>
                <div class="p-formList__data">
                  <form action="radio.php" method="post">
                      <input type="radio" id="inq1" name="num_of_inq" value="1">
                      <label for="inq1">希望する</label>
                      <input type="radio" id="inq2" name="num_of_inq" value="2">
                      <label for="inq2">希望しない</label>
                  </form>
                </div>
              </div>
            </li>
            <!-- DMの送付 -->
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                    <p class="c-txt">DMの送付　<span class="c-txt c-txt--must">必須</span></p>
                </div>
                <div class="p-formList__data">
                  <form action="radio.php" method="post">
                      <input type="radio" id="inq1" name="num_of_inq" value="1">
                      <label for="inq1">希望する</label>
                      <input type="radio" id="inq2" name="num_of_inq" value="2">
                      <label for="inq2">希望しない</label>
                  </form>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="p-register__foot">
        <div class="l-container">
          <div class="p-btnWrap">
              <a href="{{route('web.register.account')}}" class="c-btn c-btn--back">戻る</a>
              <a href="{{route('web.register.confirm')}}" class="c-btn c-btn--next">購入製品の登録へ</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection