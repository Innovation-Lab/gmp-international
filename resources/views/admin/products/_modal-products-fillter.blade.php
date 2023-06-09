<div class="modal micromodal-slide" id="modal-products-fillter" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1">
    <div class="modal__container lg" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <header class="modal__header">
        <h2 class="modal__title" id="modal-1-title">
          絞り込み検索
        </h2>
      </header>
      <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      <main class="modal__content" id="modal-1-content">
        {{-- フォーム --}}
        {!! Form::open(['method' => 'GET', 'route' => 'admin.products.index', 'class' => 'p-form', 'id' => 'submitSearchForm']) !!}
          <ul class="p-formList u-gap--16">
            <li class="p-formList__item">
              <div class="l-grid__1 l-grid__gap1">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    ブランド名
                  </div>
                  <div class="p-formList__data w-700">
                    <select name="m_brand_id[]" class="select2" multiple>
                      <option value="" hidden>選択してください</option>
                      @foreach($brands as $k => $v)
                        <option value="{{ $k }}" {{ in_array($k, $request->input('m_brand_id', [])) ? 'selected' : '' }}>{{ $v }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </li>
            <li class="p-formList__item">
              <div class="l-grid__1 l-grid__gap1">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    製品名
                  </div>
                  <div class="p-formList__data w-700">
                    <select name="m_product_id[]" class="select2" multiple>
                      <option value="" hidden>選択してください</option>
                      @foreach($products as $k => $v)
                        <option value="{{ $k }}" {{ in_array($k, $request->input('m_product_id', [])) ? 'selected' : '' }}>{{ $v }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </li>
            <li class="p-formList__item">
                <div class="l-grid__1 l-grid__gap1">
                  <div class="p-formList__content">
                    <div class="p-formList__label">
                      店舗名
                    </div>
                    <div class="p-formList__data w-700">
                      <select name="m_shop_id[]" class="select2" multiple>
                        <option value="" >選択してください</option>
                        @foreach($shops as $k => $v)
                        <option value="{{ $k }}" {{ in_array($k, $request->input('m_shop_id', [])) ? 'selected' : '' }}>{{ $v }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </li>
            <li class="p-formList__item">
                <div class="l-grid__1 l-grid__gap1">
                  <div class="p-formList__content">
                    <div class="p-formList__label">
                      カラー
                    </div>
                    <div class="p-formList__data w-700">
                      <select name="m_color_id[]" class="select2" multiple>
                        <option value="" >選択してください</option>
                        @foreach($colors as $k => $v)
                        <option value="{{ $k }}" {{ in_array($k, $request->input('m_color_id', [])) ? 'selected' : '' }}>{{ $v }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </li>
            <!-- <li class="p-formList__item">
              <div class="l-grid__1 l-grid__gap1">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    登録番号
                  </div>
                  <div class="p-formList__data w-700">
                    {!! Form::text('registr_number1', '', ['placeholder' => '例）QYO']) !!}
                    <span class="unit">ー</span>
                    {!! Form::number('registr_number2', '', ['placeholder' => '1000']) !!}
                    <span class="unit">ー</span>
                    {!! Form::text('registr_number3', '', ['placeholder' => 'VACOK']) !!}
                  </div>
                </div>
              </div>
            </li> -->
            {{--<li class="p-formList__item">
              <div class="l-grid__1 l-grid__gap1">
                <div class="p-formList__content">
                  <div class="p-formList__label">
                    ステータス
                  </div>
                  <div class="p-formList__data w-700">
                    <select name="brand" class="select2">
                      <option value="" hidden>選択してください</option>
                      <option value="product1">未登録</option>
                      <option value="product2">登録済み</option>
                    </select>
                  </div>
                </div>
              </div>
            </li>--}}
            <!-- <li class="p-formList__item">
              <select multiple="multiple">
                <option value="1">COCO PREMIER FROM BIRTH</option>
                <option value="1">COCO PREMIER FROM BIRTH</option>
                <option value="1">COCO PREMIER FROM BIRTH</option>
              </select>
            </li> -->
                <!-- Multiple Select -->
            <!-- <li class="p-formList__item">
              <select multiple="multiple">
                <option value="1">1月</option>
                <option value="2">2月</option>
                <option value="3">3月</option>
                <option value="4">4月</option>
                <option value="5">5月</option>
                <option value="6">6月</option>
                <option value="7">7月</option>
                <option value="8">8月</option>
                <option value="9">9月</option>
                <option value="10">10月</option>
                <option value="11">11月</option>
                <option value="12">12月</option>
              </select>
            </li>
          </ul>
          <select multiple="multiple">
            <option value="1">1月</option>
            <option value="2">2月</option>
            <option value="3">3月</option>
            <option value="4">4月</option>
            <option value="5">5月</option>
            <option value="6">6月</option>
            <option value="7">7月</option>
            <option value="8">8月</option>
            <option value="9">9月</option>
            <option value="10">10月</option>
            <option value="11">11月</option>
            <option value="12">12月</option>
            </select> -->
        {!! Form::close() !!}
      </main>
      <footer class="modal__footer">
        <button class="modal__btn" data-micromodal-close>戻る</button>
        <button type="submit" form="submitSearchForm" class="modal__btn-primary">絞り込む</button>
      </footer>
    </div>
  </div>
</div>
<!-- <script>
  $(function(){
    $('select').multipleSelect({
      width: 200,
      formatSelectAll: function(){
        return 'すべて';
      },
      formatAllSelected: function(){
        return'すべて選択されています';
      }
    });
  });
</script> -->



<script>
  $('.select2').select2({
    multiple: true, //複数選択可能
    closeOnSelect: false, //選択するたびに閉じないよう設定
    language: 'ja' // Select2のメッセージに使用する言語を指定
  });
</script>

<script>
    $(function () {
        $('select').multipleSelect({
            width: 200,
            formatSelectAll: function() {
                return 'すべて';
            },
            formatAllSelected: function() {
                return '全て選択されています';
            }
        });
    });
</script>