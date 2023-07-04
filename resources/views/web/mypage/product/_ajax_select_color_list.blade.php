<div class="p-formList__content">
  <div class="p-formList__label p-formList__label--@if($page)guide @else modal @endif">
    <p class="c-txt">カラー</p>
    <div class="p-formList__guide">
      <a class="p-formList__guide__btn" onclick="$('#modal__guide--color').show()" role="button"></a>
    </div>
  </div>
  <div class="p-formList__data parent-element">
    <div class="c-input c-input--select">
      <select name="m_color_id" class="js-ty-color select2">
        <option value="" selected>カラーを選択してください</option>
        @foreach($colors as $k => $v)
          <option value="{{ $k }}" {{ old('m_color_id') == $k ? 'selected' : '' }}>{{ $v }}</option>
        @endforeach
        <option value="other" @if(old('m_color_id') == 'other') selected @endif>上記以外のカラー</option>
      </select>
    </div>
    <!-- 上記以外のカラー選択時のフォーム -->
    <div style="@if(old('m_color_id') == 'other') display:block; @else display:none; @endif" class="p-formList__content p-formList__other open-other-text-input">
      <div class="p-formList__label">
        <p class="c-txt">「上記以外のカラー」を選択した方はこちら</p>
      </div>
      <div class="p-formList__data">
        <input placeholder="例）赤" class="required" name="other_color_name" type="name" value="{{ old('other_color_name') }}">
      </div>
    </div>
  </div>
</div>