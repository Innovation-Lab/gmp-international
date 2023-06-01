<div class="p-formList__content">
  <div class="p-formList__label">
    <p class="c-txt">製品名 <span class="c-txt c-txt--must">必須</span></p>
  </div>
  <div class="p-formList__data">
    <div class="c-input c-input--select">
      <select name="m_product_id" onchange="getTyArray('product', $(this).val(), $(this).data('insert'), {{ $sales_id }});" data-insert="brand">
        <option value="" selected>製品を選択してください</option>
        @foreach($items as $k => $v)
          <option value="{{ $k }}" @if($checkVal) selected @endif>{{ $v }}</option>
        @endforeach
      </select>
    </div>
    @error('m_product_id')
    <div class="c-txt c-txt--err">{{ $message }}</div>
    @enderror
  </div>
</div>