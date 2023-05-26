<div class="p-formList__content">
    <div class="p-formList__label">
        <p class="c-txt">ブランド名 <span class="c-txt c-txt--must">必須</span></p>
    </div>
    <div class="p-formList__data">
        <div class="c-input c-input--select">
            <select name="products[1][m_brand_id]" required="required" class="js-ty-brand" onchange="getTyArray('brand', $(this).val(), $(this).data('loop'), $(this).data('insert'));" required="required" data-loop="{{ $loop }}" data-insert="product">
                <option value="" selected>ブランドを選択してください</option>
                @foreach($items as $k => $v)
                    <option value="{{ $k }}" @if($checkVal == $k) selected @endif>{{ $v }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <p style="display: none;" class="c-txt c-txt--err">ブランドを選択してください。</p>
</div>