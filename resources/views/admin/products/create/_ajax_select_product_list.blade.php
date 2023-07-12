<div class="p-formList__content">
  <div class="p-formList__label optional">
    製品名
  </div>
  <div class="p-formList__data" style="display:block;">
    <select name="m_product_id" class="select2 js-ty-product" onchange="
      getTyArray('product', $(this).val(), $(this).data('insert'));
      getTyColorArray($(this).val(), $(this).data('color'));"
      data-insert="brand" data-color="color">
      <option value="" hidden>選択してください</option>
      @foreach ($items as $k => $v)
        <option value="{{ $k }}" @if($checkVal == $k) selected @endif>{{ $v }}</option>
      @endforeach
    </select>
  </div>
</div>