<style>
    input[type=file] + label.clear_fake:before {
        opacity: 0;
    }
    input[type=file] + label.clear_fake:after {
        content: "";
        opacity: 0;
    }
</style>
<div class="l-grid__1" style="gap: 1.5rem 2rem;">
  <div class="l-grid__item">
    <ul class="p-formList">
      <li class="p-formList__item">
        <div class="l-grid__2 l-grid__gap2 u-align--end">
          <div class="p-formList__content">
            <div class="p-formList__data">
              <input
                id="staff_icon"
                type="file"
                name="image_path"
                class="file_img_preview"
                accept="image/jpeg,image/png,.svg"
                onchange="
                  const [file] = $(this).prop('files');
                  if(file){
                    changeFilePreview(file);
                  }
                "
              >
              <label for="staff_icon" class="icon icon--edit @if(data_get($admin, 'image_path')) clear_fake @endif">
                <img
                  id="image_preview_form"
                  src="{{ data_get($admin, 'main_image_url') }}"
                >
              </label>
              <script>
                  function changeFilePreview(file) {
                      $('#image_preview_form').attr('src', URL.createObjectURL(file));
                      $('.icon').addClass('clear_fake')
                  }
              </script>
            </div>
          </div>
          <div class="p-formList__content">
            <div class="p-formList__label">
              権限
            </div>
            <div class="p-formList__data">
              <div class="f-tab">
                <label for="inq1-2">
                  <input type="radio" id="inq1-2" name="authority" value="2" {{ data_get($admin, 'authority', 1) == 2 ? 'checked' : '' }}>
                  一般
                </label>
                <label for="inq2-2">
                  <input type="radio" id="inq2-2" name="authority" value="1" {{ data_get($admin, 'authority', 1) == 1 ? 'checked' : '' }}>
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
              {!! Form::text('last-name', old('last_name', data_get($admin, 'last_name')), ['placeholder' => '例）山田']) !!}
            </div>
          </div>
          <div class="p-formList__content">
            <div class="p-formList__label">
              名
            </div>
            <div class="p-formList__data">
              {!! Form::text('first-name', old('first_name', data_get($admin, 'first_name')), ['placeholder' => '例）太郎']) !!}
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
              {!! Form::text('sei', old('last_name_kana', data_get($admin, 'last_name_kana')), ['placeholder' => '例）ヤマダ']) !!}
            </div>
          </div>
          <div class="p-formList__content">
            <div class="p-formList__label">
              メイ
            </div>
            <div class="p-formList__data">
              {!! Form::text('mei', old('last_name_kana', data_get($admin, 'last_name_kana')), ['placeholder' => '例）タロウ']) !!}
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
            <select name="m_shop_id" class="select2">
              <option value="" hidden>所属店舗を選択してください</option>
              @foreach($shops as $k => $v)
                <option value="{{ $k }}" {{ old('m_shop_id', data_get($admin, 'm_shop_id')) == $k ? 'selected' : '' }}>{{ $v }}</option>
              @endforeach
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
            {!! Form::email('email', old('email', data_get($admin, 'email')), ['placeholder' => '例）sample@example.com']) !!}
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__data">
            <div class="checkbox">
              <input type="checkbox" name="change-password" id="change-password-checkbox" onchange="checkChangePassword()" >
              <label for="change-password-checkbox" id="change-password-label">パスワードを変更する</label>
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