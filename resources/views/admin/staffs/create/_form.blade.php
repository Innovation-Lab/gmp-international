<div class="l-grid__1" style="gap: 1.5rem 2rem;">
  <div class="l-grid__item">
    <ul class="p-formList">
      <li class="p-formList__item">
        <div class="l-grid__2 l-grid__gap2 u-align--end">
          <div class="p-formList__content">
            <div class="p-formList__data">
              <input type="file" id="staff_icon" name="staff_icon" value="">
              <label for="staff_icon" class="icon">
                <div class="c-image" style="background-image: url();"></div>
              </label>
            </div>
          </div>
          <div class="p-formList__content">
            <div class="p-formList__label">
              権限
            </div>
            <div class="p-formList__data">
              <div class="f-tab">
                <label for="inq1-2">
                  <input type="radio" id="inq1-2" name="is_dm" value="1" {{ Auth::user()->is_dm == 1 ? 'checked' : '' }}>
                  一般
                </label>
                <label for="inq2-2">
                  <input type="radio" id="inq2-2" name="is_dm" value="0" {{ Auth::user()->is_dm == 0 ? 'checked' : '' }}>
                  管理者
                </label>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="l-grid__2 l-grid__gap2">
          <div class="p-formList__content">
            <div class="p-formList__label">
              姓
            </div>
            <div class="p-formList__data">
              {!! Form::text('last-name', null, ['placeholder' => '例）山田']) !!}
            </div>
          </div>
          <div class="p-formList__content">
            <div class="p-formList__label">
              名
            </div>
            <div class="p-formList__data">
              {!! Form::text('first-name', null, ['placeholder' => '例）太郎']) !!}
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
              {!! Form::text('sei', null, ['placeholder' => '例）ヤマダ']) !!}
            </div>
          </div>
          <div class="p-formList__content">
            <div class="p-formList__label">
              メイ
            </div>
            <div class="p-formList__data">
              {!! Form::text('mei', null, ['placeholder' => '例）タロウ']) !!}
            </div>
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            所属店舗
          </div>
          <div class="p-formList__data">
            <select name="store" class="select2">
              <option value="" hidden>選択してください</option>
              <option value="store1">エアバギー代官山店</option>
              <option value="store2">エアバギー渋谷店</option>
              <option value="store3">エアバギー新宿店</option>
            </select>
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label">
            メールアドレス
          </div>
          <div class="p-formList__data">
            {!! Form::email('email', null, ['placeholder' => '例）sample@example.com']) !!}
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__data">
            <div class="checkbox">
              <input type="checkbox" name="change-password" id="change-password-checkbox" onchange="checkChangePassword()" >
              <label for="change-password-checkbox">パスワードを変更する</label>
            </div>
          </div>
        </div>
        <div class="p-formList__content js-target__change-password u-mt--10" style="display: none;">
          <div class="p-formList__label">
            パスワード<small>（半角英数字6〜10文字）</small>
          </div>
          <div class="p-formList__data">
            {!! Form::password('password', null, ['placeholder' => '例）gmp123456', 'required' => 'required']) !!}
          </div>
          <div class="p-formList__data">
            {!! Form::password('password_confirmation', null, ['placeholder' => 'パスワードを再入力', 'required' => 'required']) !!}
          </div>
        </div>
        <script>
          function checkChangePassword(){
            checkbox = document.getElementById('change-password-checkbox');
            if(checkbox.checked) {
              $('.js-target__change-password').css({'display':'block'});
              $('input[name="password"]').prop('required', true);
              $('input[name="password_confirmation"]').prop('required', true);
            }else{
              $('.js-target__change-password').css({'display':'none'});
              $('input[name="password"]').prop('required', false);
              $('input[name="password"]').val('');
              $('input[name="password_confirmation"]').prop('required', false);
              $('input[name="password_confirmation"]').val('');
            }
          }
        </script>
      </li>
    </ul>
  </div>
</div>