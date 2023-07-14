<div class="modal micromodal-slide" id="modal-sales_product-import" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1">
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <header class="modal__header">
        <h2 class="modal__title" id="modal-1-title">
          登録製品情報CSV入力
        </h2>
        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      </header>
      <main class="modal__content" id="modal-1-content">
        <div class="modal__content__input" style="margin-bottom: 10px; text-align: center">
          <a href="/csv/sales_product_template.csv" download="登録製品テンプレート.csv" class="c-button">テンプレートをダウンロード</a>
        </div>
        {!! Form::open(['method' => 'post', 'route' => 'admin.csv.salesProduct.import', 'files' => true, 'id' => 'salesProductImportForm']) !!}
        <div class="modal__content__input">
          <label for="result_csv" class="">
            {{ Form::file('csv_file', ['id' => 'sales_file', 'style' => 'width: auto;', 'onchange' => "$('#sales_product_fake_text_box').val($(this).prop('files')[0].name)"]) }}
            <input type="text" id="result_csv" value="ファイル選択" onClick="$('#sales_file').click();" style="display:none;">
          </label>
          <input type="text" id="sales_product_fake_text_box" value="ファイルを選択" size="35" readonly onClick="$('#sales_file').click();">
        </div>
        {!! Form::close() !!}
        <div class="modal__content__text">※重複するIDはスキップされます。</div>
      </main>
      <footer class="modal__footer">
        <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">戻る</button>
        <button type="submit" form="salesProductImportForm" class="modal__btn-primary">実行する</button>
      </footer>
    </div>
  </div>
</div>
