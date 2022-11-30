@extends('admin.layout._page-default')
@section('content')
  <main class="l-main">
    <div class="p-main">
      <div class="p-main__head">
        スタイルガイド
      </div>
      <div class="p-main__body">
        <form class="f-form" action="" style="max-width: 480px; margin:0 auto;">
          <!-- ---------- input[type="text"] ---------- -->
          <div class="f-item">
            <label class="f-label"> テキスト </label>
            <input type="text" placeholder="テキスト">
          </div>
          <!-- ---------- input[type="date"] ---------- -->
          <div class="f-item">
            <label class="f-label"> 日付 </label>
            <input type="date" class="f-size--s">
          </div>
          <!-- ---------- input[type="time"] ---------- -->
          <div class="f-item">
            <label class="f-label"> 時間 </label>
            <input type="time" class="f-size--s">
          </div>
          <!-- ---------- input[type="password"] ---------- -->
          <div class="f-item">
            <label class="f-label"> パスワード（表示 / 非表示） </label>
            <input type="password">
          </div>
          <!-- ---------- input[type="file"] ---------- -->
          <div class="f-item">
            <label class="f-label"> ファイル </label>
            <div class="f-group--file">
              <span class="f-group__label">samplesamplesamplesamplesamplesamplesamplesamplesamplesample.png 
                <span class="f-close"></span>
              </span>
              <input type="file" id="file-01">
              <label for="file-01">ファイルを選択</label>
            </div>
            <label class="f-image" for="file-01">
              <img src="https://placehold.jp/3697c7/ffffff/400x300.png?text=サムネイル" class="lg">
              <span class="f-close"></span>
            </label>
          </div>
          <!-- ---------- input[type="radio"] ---------- -->
          <div class="f-item">
            <label class="f-label"> ラジオ </label>
            <input type="radio" name="radio1" id="radio-1-01" checked>
            <label for="radio-1-01">項目1</label>
            <input type="radio" name="radio1" id="radio-1-02">
            <label for="radio-1-02">項目2</label>
          </div>
          <div class="f-item">
            <label class="f-label"> ラジオ（縦並び） </label>
            <div class="f-col">
              <input type="radio" name="radio2" id="radio-2-01" checked>
              <label for="radio-2-01">ラジオ項目1</label>
              <input type="radio" name="radio2" id="radio-2-02">
              <label for="radio-2-02">ラジオ項目2</label>
            </div>
          </div>
          <div class="f-item">
            <label class="f-label"> タブ </label>
            <div class="f-tab">
              <input type="radio" name="radio3" id="radio-3-01" checked>
              <label for="radio-3-01">タブ項目1</label>
              <input type="radio" name="radio3" id="radio-3-02">
              <label for="radio-3-02">タブ項目2</label>
              <input type="radio" name="radio3" id="radio-3-03">
              <label for="radio-3-03">タブ長いラベル名項目3</label>
            </div>
            <div class="f-tab">
              <input type="radio" name="radio3" id="radio-3-04">
              <label for="radio-3-04">すべて</label>
            </div>
          </div>
          <!-- ---------- input[type="checkbox"] ---------- -->
          <div class="f-item">
            <label class="f-label"> チェックボックス </label>
            <input type="checkbox" name="checkbox1" id="checkbox-1-00" checked>
            <label for="checkbox-1-00"></label>
            <input type="checkbox" name="checkbox1" id="checkbox-1-01" checked>
            <label for="checkbox-1-01">項目1</label>
            <input type="checkbox" name="checkbox1" id="checkbox-1-02">
            <label for="checkbox-1-02">項目2</label>
          </div>
          <div class="f-item">
            <label class="f-label"> チェックボックス（縦並び） </label>
            <div class="f-col">
              <input type="checkbox" name="checkbox2" id="checkbox-2-01" class="is-invalid">
              <label for="checkbox-2-01">チェックボックス項目1</label>
              <input type="checkbox" name="checkbox2" id="checkbox-2-02" class="is-invalid">
              <label for="checkbox-2-02">チェックボックス項目2</label>
            </div>
            <div class="f-invalid">少なくとも1つは選択してください</div>
          </div>
          <div class="f-item">
            <label class="f-label"> チェックボックス（スイッチ） </label>
            <div class="f-switch">
                <input type="checkbox" name="checkbox2" id="checkbox-3-01" checked>
                <label for="checkbox-3-01"></label>
                <input type="checkbox" name="checkbox2" id="checkbox-3-02">
                <label for="checkbox-3-02">ラベルあり</label>
            </div>
          </div>
          <!-- ---------- select ---------- -->
          <div class="f-item">
            <label class="f-label"> セレクトボックス </label>
            <select name="" id="">
              <option value="">選択してください</option>
            </select>
          </div>
          <!-- ---------- textarea ---------- -->
          <div class="f-item">
            <label class="f-label"> テキストエリア </label>
            <textarea name="" id="" placeholder="テキストを入力できます"></textarea>
          </div>
          <div class="f-item">
            <label class="f-label"> テキストエリア </label>
            <textarea name="" id="" placeholder="テキストを入力できます" class="is-invalid"></textarea>
            <div class="f-invalid">入力してください</div>
          </div>
          <div class="f-row--2">
            <div class="f-item">
              <label class="f-label"> readonly </label>
              <input type="text" value="readonly" readonly>
            </div>
            <div class="f-item">
              <label class="f-label"> disabled </label>
              <input type="text" value="disabled" disabled>
            </div>
          </div>
          <div class="f-row--2">
            <div class="f-item">
              <label class="f-label"> readonly </label>
              <select readonly>
                <option value="">選択済み</option>
              </select>
            </div>
            <div class="f-item">
              <label class="f-label"> disabled </label>
              <select disabled>
                <option value="">選択できません</option>
              </select>
            </div>
          </div>
          <div class="f-item">
            <input type="radio" id="radio-disabled" disabled>
            <label for="radio-disabled">Disabled</label>
            <input type="radio" id="radio-disabled" checked disabled>
            <label for="radio-disabled">Disabled</label>
            <input type="checkbox" id="checkbox-disabled" disabled>
            <label for="checkbox-disabled">Disabled</label>
            <input type="checkbox" id="checkbox-disabled" checked disabled>
            <label for="checkbox-disabled">Disabled</label>
          </div>
        
          <div class="f-item">
            <label class="f-label">金額</label>
            <div class="f-group">
              <span>税込</span>
              <input type="text" placeholder="0">
              <span>円</span>
            </div>
          </div>
          <div class="f-item">
            <label class="f-label">郵便番号</label>
            <div class="f-group">
              <span>〒</span>
              <input type="number" placeholder="1234567">
            </div>
          </div>
          <div class="f-item">
            <label class="f-label">金額</label>
            <div class="f-group">
              <select name="" id="">
                <option value="">税込</option>
                <option value="">税抜</option>
              </select>
              <input type="number" placeholder="1234567" class="is-invalid">
              <span>円</span>
            </div>
            <div class="f-invalid">金額を入力してください。</div>
          </div>
          <div class="f-item">
            <label class="f-label">金額</label>
            <div class="f-group">
              <input type="number" placeholder="1234567">
              <select name="" id="">
                <option value="">円</option>
                <option value="">ドル</option>
              </select>
            </div>
          </div>
          
          <!-- ---------- group ---------- -->
          <div class="f-item--row">
            <label class="f-label"> グループ </label>
            <div class="f-group">
              <span>税込</span>
              <input type="text" placeholder="0">
              <span>円</span>
            </div>
          </div>
          <div class="f-item--row">
            <label class="f-label"> グループ </label>
            <div class="f-group">
              <span>〒</span>
              <input type="number" placeholder="1234567">
            </div>
          </div>
          <div class="f-item--row">
            <label class="f-label optional"> 金額 </label>
            <div class="f-group">
              <select name="" id="">
                <option value="">税込</option>
                <option value="">税抜</option>
              </select>
              <input type="number" placeholder="1234567">
              <span>円</span>
            </div>
          </div>
          <div class="f-item--row">
            <label class="f-label"> グループ </label>
            <div class="f-group">
              <input type="number" placeholder="1234567">
              <select name="" id="">
                <option value="">円</option>
                <option value="">ドル</option>
              </select>
            </div>
          </div>
          
          <!-- ---------- button ---------- -->
          <div class="f-item">
            <label class="f-label"> button / input[type=submit] </label>
            <input type="reset" value="リセット">
            <input type="submit" value="送信する" disabled>
            <button>送信する</button>
          </div>
          <div class="f-item">
            <label class="f-label"> aタグ </label>
            <a href="" class="f-btn">追加</a>
            <a href="" class="f-btn--reset">削除</a>
          </div>
          <div class="f-item">
            <label class="f-label">アイコン付き</label>
            <a href="" class="f-btn--icon">
              戻る
            </a>
            <a href="" class="f-btn--icon-right icon-right">
              次へ
            </a>
            <a href="" class="f-btn--icon icon-trush">
              削除
            </a>
          </div>
          <!-- ==========

            Large

          ========== -->
          <!-- ---------- large ---------- -->
          <div class="f-item">
            <div class="f-label">タイトル</div>
            <input type="text" class="f-lg" placeholder="タイトル">
          </div>
          <div class="f-item">
            <div class="f-label">カテゴリ</div>
            <select class="f-lg is-invalid">
              <option value="">選択してください</option>
            </select>
            <div class="f-invalid">必須項目です。選択してください。</div>
          </div>
          <div class="f-item">
            <button class="f-lg">送信する</button>
          </div>
          <div class="f-item--center">
            <a href="" class="f-btn--text">戻る</a>
          </div>
          
          <!-- ---------- お名前 ---------- -->
          <div class="f-item">
            <label class="f-label required">お名前</label>
            <div class="f-row--2">
              <input type="text" placeholder="例）山田">
              <input type="text" placeholder="例）太郎">
            </div>
          </div>
          <!-- ---------- お名前 ---------- -->
          <div class="f-item">
            <label class="f-label optional">フリガナ</label>
            <div class="f-row--2">
              <input type="text" placeholder="例）ヤマダ">
              <input type="text" placeholder="例）タロウ">
            </div>
          </div>
          <!-- ---------- 電話番号 ---------- -->
          <div class="f-item">
            <label class="f-label optional">電話番号</label>
            <input type="tel" placeholder="例）09012345678">
            <div class="f-note">ハイフンなしで入力</div>
          </div>
          <!-- ---------- メールアドレス ---------- -->
          <div class="f-item">
            <label class="f-label required">メールアドレス</label>
            <input type="email" placeholder="例）sample@example.com" class="is-invalid">
            <div class="f-invalid">正しいメールアドレスの形式で入力してください。</div>
          </div>
          <div class="f-row--2">
            <!-- ---------- 郵便番号 ---------- -->
            <div class="f-item">
              <label class="f-label required">郵便番号</label>
              <div class="f-group">
                <span>〒</span>
                <input type="number" placeholder="1234567">
              </div>
            </div>
            <!-- ---------- 都道府県 ---------- -->
            <div class="f-item">
              <label class="f-label required">都道府県</label>
              <select name="" id="" class="is-invalid">
                <option value="">選択してください</option>
                <option value="">東京都</option>
                <option value="">北海道</option>
              </select>
              <div class="f-invalid">選択してください。</div>
            </div>
          </div>
          <!-- ---------- 市区町村 ---------- -->
          <div class="f-item ">
            <label class="f-label required">市区町村</label>
            <input type="text" placeholder="例）渋谷区">
          </div>
          <!-- ---------- 番地 ---------- -->
          <div class="f-item">
            <label class="f-label required">番地</label>
            <input type="text" placeholder="例）渋谷1-2-3">
          </div>
          <!-- ---------- 建物名・部屋番号など ---------- -->
          <div class="f-item">
            <label class="f-label optional">建物名・部屋番号など</label>
            <input type="text" placeholder="例）渋谷マンション1201">
          </div>
          <div class="f-divider"></div>
          <!-- ---------- カードブランド ---------- -->
          <div class="f-item">
            <label class="f-label">使用可能なカード</label>
            <div class="f-cards">
              <span class="f-card--visa"></span>
              <span class="f-card--master"></span>
              <span class="f-card--jcb"></span>
              <span class="f-card--amex"></span>
              <span class="f-card--diners"></span>
            </div>
          </div>
          <!-- ---------- カード番号 ---------- -->
          <div class="f-row--3-2">
            <div class="f-item">
              <label class="f-label">カード番号</label>
              <input type="number" class="is-invalid">
            </div>
            <div class="f-item">
              <label class="f-label">有効期限</label>
              <div class="f-row--2">
                <select name="" id="">
                  <option value="">01</option>
                </select>
                <select name="" id="">
                  <option value="">2022</option>
                </select>
              </div>
            </div>
          </div>
          <div class="f-row--3-2">
            <div class="f-item">
              <label class="f-label">カード名義</label>
              <input type="text" placeholder="例）TARO YAMADA">
            </div>
            <div class="f-item">
              <label class="f-label">セキュリティコード</label>
              <input type="number" class="is-invalid">
            </div>
          </div>
          <div class="f-invalid">カード番号を入力してください。</div>
          <div class="f-invalid">セキュリティコードを入力してください。</div>
          <div class="f-divider"></div>
          <div class="f-item">
            <div class="f-row--1-3">
              <a href="" class="f-btn--reset" >修正</a>
              <button>この内容で送信する</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <style>
      * {
        box-sizing: border-box;
      }
      .wrapper {
        position: relative;
      }
      .wrapper_head {
        font-size: clamp(60px,10vw,100px);
        font-weight: 900;
        max-width: 1440px;
        margin-inline: auto;
        padding: 1em 1rem 0;
        padding-inline: .5rem;
      }
      .wrapper_body {
        max-width: 1440px;
        margin-inline: auto;
        padding: 0 1rem 4rem;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem 4rem;
      }
      @media screen and (min-width: 800px) {
        .wrapper_head,
        .wrapper_body {
          padding-inline: 2rem;
        }
        .wrapper_body {
          grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        }
      }
      .wrapper_body h1 {
        font-size: 2em;
        border-bottom: 1px solid #000 ;
        margin: 2.5em 0 1em;
      }
      .wrapper_foot {
        display: grid;
        place-items: center;
        background-color: rgba(200,200,200,.8);
        backdrop-filter: blur(2px);
        padding: 2rem 1rem 4rem;
        border-top: 1px solid #ccc;
        position: sticky;
        bottom: 0;
        z-index: 10;
        box-shadow: 0px -4px 8px -2px rgba(0,0,0,.1);
      }
    </style>
      </div>
    </div>
  </main>
@endsection
