<div class="p-formList__content">
  <div class="p-formList__label p-formList__label--guide">
    <p class="c-txt">カラー</p>
    <div class="p-formList__guide">
      <a class="p-formList__guide__btn" onclick="$('#modal__guide--color').show()" role="button"></a>
    </div>
  </div>
  <div class="p-formList__data parent-element">
    <div class="c-input c-input--select">
      <select name="products[{{ $loop_num }}][m_color_id]" class="js-ty-color">
        <option value="" selected>カラーを選択してください</option>
        @foreach($colors as $k => $v)
          <option value="{{ $k }}">{{ $v }}</option>
        @endforeach
        <option value="other">上記以外のカラー</option>
      </select>
    </div>
    <!-- 上記以外の店舗選択時のフォーム -->
    <div style="display:none;" class="p-formList__content p-formList__other open-other-text-input">
      <div class="p-formList__label">
        <p class="c-txt">「上記以外のカラー」を選択した方はこちら</p>
      </div>
      <div class="p-formList__data">
        <input placeholder="例）赤" class="" name="products[{{ $loop_num }}][other_color_name]" type="text" value="{{ old('products[ '.$loop_num.' ][other_color_name"]') }}">
      </div>
    </div>
  </div>
</div>