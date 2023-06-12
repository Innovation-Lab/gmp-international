<style>
    input[type=file] + label.clear_fake:before {
        opacity: 0;
    }
    input[type=file] + label.clear_fake:after {
        content: "";
        opacity: 0;
    }
</style>
<?php
if(count($errors->get('password')) > 0 || count($errors->get('password_confirmation')) > 0) {
    $javascriptCode = "$(document).ready(function() {
        $('#change-password-checkbox').prop('checked', true);
        checkChangePassword();
      });";
    echo "<script>{$javascriptCode}</script>";
}
?>
<div class="l-grid__1" style="gap: 1.5rem 2rem;">
  <div class="l-grid__item">
    <ul class="p-formList">
      <li class="p-formList__item">
        <div class="l-grid__2 l-grid__gap2 u-align--end">
          <div class="p-formList__content">
            <div class="p-formList__data" style="display: block;">
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
            <div class="p-formList__label optional">
              権限
            </div>
            <div class="p-formList__data" style="display: block;">
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
            <div class="p-formList__label optional">
              姓
            </div>
            <div class="p-formList__data" style="display: block;">
              {!! Form::text('last_name', old('last_name', data_get($admin, 'last_name')), ['placeholder' => '例）山田']) !!}
              @error('last_name')
              <p class="error">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="p-formList__content">
            <div class="p-formList__label optional">
              名
            </div>
            <div class="p-formList__data" style="display: block;">
              {!! Form::text('first_name', old('first_name', data_get($admin, 'first_name')), ['placeholder' => '例）太郎']) !!}
              @error('first_name')
              <p class="error">{{ $message }}</p>
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
            <div class="p-formList__data" style="display: block;">
              {!! Form::text('last_name_kana', old('last_name_kana', data_get($admin, 'last_name_kana')), ['placeholder' => '例）ヤマダ']) !!}
              @error('last_name_kana')
              <p class="error">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="p-formList__content">
            <div class="p-formList__label optional">
              メイ
            </div>
            <div class="p-formList__data" style="display: block;">
              {!! Form::text('first_name_kana', old('first_name_kana', data_get($admin, 'first_name_kana')), ['placeholder' => '例）タロウ']) !!}
              @error('first_name_kana')
              <p class="error">{{ $message }}</p>
              @enderror
            </div>
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label optional">
            所属店舗
          </div>
          <div class="p-formList__data" style="display: block;">
            <select name="m_shop_id" class="select2">
              <option value="" hidden>所属店舗を選択してください</option>
              @foreach($shops as $k => $v)
                <option value="{{ $k }}" {{ old('m_shop_id', data_get($admin, 'm_shop_id')) == $k ? 'selected' : '' }}>{{ $v }}</option>
              @endforeach
            </select>
            @error('m_shop_id')
            <p class="error">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </li>
      <li class="p-formList__item">
        <div class="p-formList__content">
          <div class="p-formList__label optional">
            メールアドレス
          </div>
          <div class="p-formList__data" style="display: block;">
            {!! Form::email('email', old('email', data_get($admin, 'email')), ['placeholder' => '例）sample@example.com']) !!}
            @error('email')
            <p class="error">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </li>
      @if (data_get($admin, 'id'))
        <li class="p-formList__item">
          <div class="p-formList__content">
            <div class="p-formList__data" style="display: block;">
              <div class="checkbox">
                <input type="checkbox" name="change-password" id="change-password-checkbox" onchange="checkChangePassword()" >
                <label for="change-password-checkbox" id="change-password-label">パスワードを変更する</label>
              </div>
            </div>
          </div>
          <div class="p-formList__content js-target__change-password u-mt--10" style="display: none;">
            <div class="p-formList__label optional">
              パスワード<small>（半角英数字6文字〜）</small>
            </div>
            <div class="p-formList__data" style="display: block;">
              {!! Form::password('password', null, ['placeholder' => '例）gmp123456', 'disabled' => 'false']) !!}
              @error('password')
              <p class="error">{{ $message }}</p>
              @enderror
            </div>
            <div class="p-formList__data" style="display: block;">
              {!! Form::password('password_confirmation', null, ['placeholder' => 'パスワードを再入力', 'disabled' => 'false']) !!}
              @error('password_confirmation')
              <p class="error">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <script>
            function checkChangePassword(){
              checkbox = document.getElementById('change-password-checkbox');
              if(checkbox.checked) {
                $('.js-target__change-password').css({'display':'block'});
                $('input[name="password"]').prop('required', true);
                $('input[name="password_confirmation"]').prop('required', true);
                $('input[name="password"]').prop('disabled', false);
                $('input[name="password_confirmation"]').prop('disabled', false);
              }else{
                $('.js-target__change-password').css({'display':'none'});
                $('input[name="password"]').prop('required', false);
                $('input[name="password_confirmation"]').prop('required', false);
                $('input[name="password"]').prop('disabled', true);
                $('input[name="password_confirmation"]').prop('disabled', true);
              }
            }
          </script>
        </li>
      @else
        <li class="p-formList__item">
          <div class="p-formList__content u-mt--10">
            <div class="p-formList__label optional">
              パスワード<small>（半角英数字6文字〜）</small>
            </div>
            <div class="p-formList__data" style="display: block;">
              {!! Form::password('password', null, ['placeholder' => '例）gmp123456']) !!}
              @error('password')
                <p class="error">{{ $message }}</p>
              @enderror
            </div>
            <div class="p-formList__data" style="display: block;">
              {!! Form::password('password_confirmation', null, ['placeholder' => 'パスワードを再入力']) !!}
              @error('password_confirmation')
              <p class="error">{{ $message }}</p>
              @enderror
            </div>
          </div>
        </li>
      @endif
    </ul>
  </div>
</div>