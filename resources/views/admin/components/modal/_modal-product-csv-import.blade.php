<div class="modal micromodal-slide" id="modal-product-import" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1">
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <header class="modal__header">
        <h2 class="modal__title" id="modal-1-title">
          製品情報CSV入力
        </h2>
        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      </header>
      <main class="modal__content" id="modal-1-content">
        ※重複するIDはスキップされます。<br>
      </main>
      {!! Form::open(['method' => 'post', 'route' => 'admin.csv.product.import', 'files' => true, 'id' => 'productImportForm']) !!}
        <div class="c-input ">
          <label for="result_csv" class="">
            {{ Form::file('csv_file', ['id' => 'product_file', 'style' => 'width: auto;', 'onchange' => "$('#product_fake_text_box').val($(this).prop('files')[0].name)"]) }}
            <input type="text" id="result_csv" value="ファイル選択" onClick="$('#product_file').click();" style="display:none;">
          </label>
          <input type="text" id="product_fake_text_box" value="ファイルを選択" size="35" readonly onClick="$('#product_file').click();">
        </div>
      {!! Form::close() !!}
      <footer class="modal__footer">
        <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">戻る</button>
        <button type="submit" form="productImportForm" class="modal__btn">実行する</button>
      </footer>
    </div>
  </div>
</div>
