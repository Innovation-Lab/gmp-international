<div class="p-formList__content">
  <div class="p-formList__label">
    カラー
  </div>
  <div class="p-formList__data" style="display:block;">
    <select name="m_color_id" class="js-ty-color">
      <option value="" selected>カラーを選択してください</option>
      @foreach ($colors as $k => $v)
        <option value="{{ $k }}" {{ old('m_color_id') == $k ? 'selected' : '' }}>{{ $v }}</option>
      @endforeach
      <option value="other" @if(old('m_color_id') == 'other') selected @endif>上記以外のカラー</option>
    </select>
  </div>
</div>