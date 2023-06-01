<div class="p-formList__content">
  <div class="p-formList__label">
    <p class="c-txt">ブランド名 <span class="c-txt c-txt--must">必須</span></p>
  </div>
  <div class="p-formList__data">
    <div class="c-input c-input--select">
      <select name="m_brand_id" onchange="getTyArray('brand', $(this).val(), $(this).data('insert'), {{ $sales_id }});" data-insert="product">
        <option value="" selected>ブランドを選択してください</option>
        @foreach($items as $k => $v)
          <option value="{{ $k }}" @if($checkVal == $k) selected @endif>{{ $v }}</option>
        @endforeach
      </select>
    </div>
    @error('m_brand_id')
      <div class="c-txt c-txt--err">{{ $message }}</div>
    @enderror
  </div>
</div>