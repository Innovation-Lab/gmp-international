@extends('admin.layouts.pages._default')
@section('title', '登録製品管理')
@section('content')
<div class="p-create">
  <div class="l-create">
    <div class="l-create__head">
      {{-- 詳細ヘッド --}}
      @include('admin.products.create._head')
    </div>
    <div class="l-create__body">
      <div class="wrapper u-max--800">
        <div class="container">
          <div class="l-create__body__inner single">
            {{-- メイン --}}
            <div class="l-create__main">
              <div class="p-create__main">
                {{-- ---------- ボックス（メインエリア） ---------- --}}
                <div class="p-create__main__box">
                  <div class="p-create__main__box__wrapper">
                    {{-- フォーム --}}
                    {{ Form::open(['method' => 'POST', 'route' => 'admin.products.store', 'class' => 'p-form', 'id' => 'submitProductForm']) }}
                      @include('admin.products.create._form-product')
                      {{-- <button class="c-textButton__icon c-textButton--gray u-mt--24">
                        <svg class="icon"><use href="#add"/></svg>
                        登録製品を追加する
                      </button> --}}
                    {{ Form::close() }}
                  </div>
                  <div class="p-create__main__box__foot">
                    <a onclick="window.history.back();" class="c-button__reset">戻る</a>
                    <button type="submit" form="submitProductForm" class="c-button">この内容で登録する</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- 要素をページ下部に固定 --}}
    {{--
    <div class="l-create__foot">
      <div class="p-detail__foot">
        要素をページ下部に固定
      </div>
    </div>
    --}}
  </div>
</div>
{{-- ユーザー写真 --}}
{{-- @include('admin.users._modal-users-photo') --}}
<script>
  // (function() {
  //   const table = $('table');
  //   const thLength = table.find('th').length;
  //   table.css('grid-template-columns','repeat(' + thLength + ', minmax(max-content, 1fr))')
  // })();
</script>
<script>
  const addButton = document.querySelector(".c-textButton__icon");
  
  addButton.addEventListener("click", function() {
    event.preventDefault();

    // 新しい要素の作成
    const newElement = document.createElement("div");
    newElement.innerHTML = `
      <div class="c-div--xl"></div>
      <div class="p-form__title">
        <p>製品2</p>
        <button class="c-textButton__icon c-textButton--gray delete">
          <svg class="icon"><use href="#delete"/></svg>
          削除
        </button>
      </div>
      <div class="l-grid__2 l-grid__2--xl" style="gap: 1.5rem 2rem;">
        <div class="l-grid__item">
          <ul class="p-formList">
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                  購入日
                </div>
                <div class="p-formList__data">
                  <input type="date" name="purchase_date" placeholder="0000/00/00">
                </div>
              </div>
            </li>
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                  ブランド名
                </div>
                <div class="p-formList__data">
                  <select name="brand" class="select2">
                    <option value="" hidden>選択してください</option>
                    <option value="brand1">AIRBUGGY</option>
                    <option value="brand2">AIRBUGGY1</option>
                    <option value="brand3">AIRBUGGY2</option>
                  </select>
                </div>
              </div>
            </li>
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                  製品名
                </div>
                <div class="p-formList__data">
                  <select name="brand" class="select2">
                    <option value="" hidden>選択してください</option>
                    <option value="product1">COCO PREMIER FROM BIRTH</option>
                    <option value="product2">OCO PREMIER FROM BIRTH 1</option>
                    <option value="product3">OCO PREMIER FROM BIRTH 2</option>
                  </select>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="l-grid__item">
          <ul class="p-formList">
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                  カラー
                </div>
                <div class="p-formList__data">
                  <select name="color" class="select2">
                    <option value="" hidden>選択してください</option>
                    <option value="color1">Red</option>
                    <option value="color2">Blue</option>
                    <option value="color3">Green</option>
                  </select>
                </div>
              </div>
            </li>
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                  シリアルナンバー
                </div>
                <div class="p-formList__data">
                  <input type="text" name="serial-number" placeholder="例）GMP123456789">
                </div>
              </div>
            </li>
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                  購入店舗
                </div>
                <div class="p-formList__data">
                  <select name="store" class="select2">
                    <option value="" hidden>選択してください</option>
                    <option value="store1">エアバギー代官山店</option>
                    <option value="store2">エアバギー渋谷店</option>
                    <option value="store3">エアバギー新宿店</option>
                  </select>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="l-grid__item" style="grid-column: 1/3;">
          <ul class="p-formList">
            <li class="p-formList__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                  管理メモ
                </div>
                <div class="p-formList__content__data">
                  <textarea placeholder="修正対応や報告事項を記載してください。" class="c-scroll"></textarea>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    `;
    
    // 要素の追加
    // 親要素とボタン要素の取得
    const parentElement = addButton.parentNode;
  
    // 新しい要素をボタンの前に挿入
    parentElement.insertBefore(newElement, addButton);

    // Select2の初期化
    const selectElements = newElement.querySelectorAll("select.select2");
    selectElements.forEach((selectElement) => {
      // Select2の初期化処理を実行
      $(selectElement).select2({
        placeholder: '選択してください'
      });
    });

    // ×マークをクリックしたら要素を削除する
    const deleteIcon = newElement.querySelector(".delete");
    deleteIcon.addEventListener("click", function() {
      newElement.remove();
    });
  });
</script>
@endsection