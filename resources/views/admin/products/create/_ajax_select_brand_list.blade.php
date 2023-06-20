<div class="p-formList__content">
  <div class="p-formList__label optional">
    ブランド名
  </div>
  <div class="p-formList__data" style="display:block;">
    <select name="m_brand_id" class="select2 js-ty-brand"
      onchange="getTyArray('brand', $(this).val(), $(this).data('insert'));"
      data-insert="product">
      <option value="" hidden>選択してください</option>
      @foreach ($items as $k => $v)
        <option value="{{ $k }}" @if($checkVal == $k) selected @endif>{{ $v }}</option>
      @endforeach
    </select>
  </div>
</div>