@extends('admin.layout._page-default')
@section('main-class', 'l-main--initial')
@section('content')
  <div class="l-main__head">
    @component('admin.component._head')
      @slot('main')
      <h2 class="c-ttl--lg">
        スタイルガイド
      </h2>
      @endslot
    @endcomponent
  </div>
  <div class="l-main__body u-bg--bg-light">
    <div class="p-style">
      <aside class="p-style__side">
        <nav>
          <div class="p-ttl">
            <div class="c-ttl">Component</div>
          </div>
          <a href="#c-ttl" class="c-tab u-w--100p">c-ttl</a>
          <a href="#c-txt" class="c-tab u-w--100p">c-txt</a>
          <a href="#c-note" class="c-tab u-w--100p">c-note</a>
          <a href="#c-btn" class="c-tab u-w--100p">c-btn</a>
          <a href="#c-link" class="c-tab u-w--100p">c-link</a>
          <a href="#c-tab" class="c-tab u-w--100p">c-tab</a>
          <a href="#c-dl" class="c-tab u-w--100p">c-dl</a>
          <a href="#c-bl" class="c-tab u-w--100p">c-bl</a>
          <a href="#c-table" class="c-tab u-w--100p">c-table</a>
          <a href="#c-sort" class="c-tab u-w--100p">c-sort</a>
          <a href="#c-div" class="c-tab u-w--100p">c-div</a>
          <a href="#c-media" class="c-tab u-w--100p">c-media</a>
          <a href="#c-box" class="c-tab u-w--100p">c-box</a>
          <a href="#c-tag" class="c-tab u-w--100p">c-tag</a>
          <a href="#c-msg" class="c-tab u-w--100p">c-msg</a>
          <a href="#c-modal" class="c-tab u-w--100p">c-modal</a>
          <div class="p-ttl">
            <div class="c-ttl">Project</div>
          </div>
          <a href="#p-ttl" class="c-tab u-w--100p">p-ttl</a>
          <a href="#p-grid" class="c-tab u-w--100p">p-grid</a>
          <a href="#p-msg" class="c-tab u-w--100p">p-msg</a>
          <div class="p-ttl">
            <div class="c-ttl">Utility</div>
          </div>
          <a href="#u-align" class="c-tab u-w--100p">u-align</a>
          <a href="#u-gap" class="c-tab u-w--100p">u-gap</a>
          <a href="#u-margin" class="c-tab u-w--100p">u-margin</a>
          <a href="#u-padding" class="c-tab u-w--100p">u-padding</a>
          <a href="#u-width" class="c-tab u-w--100p">u-width</a>
          <a href="#u-max" class="c-tab u-w--100p">u-max</a>
          <a href="#u-clamp" class="c-tab u-w--100p">u-clamp</a>
          <a href="#u-color" class="c-tab u-w--100p">u-color</a>
          <a href="#u-bg" class="c-tab u-w--100p">u-bg</a>
          <div class="c-div--lg"></div>
          <div class="p-ttl">
            <div class="c-ttl">Form</div>
          </div>
          <a href="#f-basic" class="c-tab u-w--100p">基本</a>
          <a href="#f-group" class="c-tab u-w--100p">グループ</a>
          <a href="#f-lg" class="c-tab u-w--100p">大/小</a>
          <a href="#f-usecase" class="c-tab u-w--100p">使用例</a>
        </nav>
      </aside>
      <div class="p-style__main">
        <!-- 

          カラー一覧

        -->
        <section class="p-style__panel" id="">
          <h1 class="p-style__ttl">カラー一覧</h1>
          <div class="u-align">
            <div class="c-media--16-9 u-w--100 u-bg--primary">--primary</div>
            <div class="c-media--16-9 u-w--100 u-bg--primary-dark u-color--white">--primary-dark</div>
            <div class="c-media--16-9 u-w--100 u-bg--primary-light">--primary-light</div>
            <div class="c-media--16-9 u-w--100 u-bg--primary-bg">--primary-bg</div>
            <div class="c-media--16-9 u-w--100 u-bg--primary-bg-light">--primary-bg-light</div>

            <div class="c-media--16-9 u-w--100 u-bg--border">--border</div>
            <div class="c-media--16-9 u-w--100 u-bg--border-light">--border-light</div>

            <div class="c-media--16-9 u-w--100 u-bg--bg">--bg</div>
            <div class="c-media--16-9 u-w--100 u-bg--bg-light">--bg-light</div>
            <div class="c-media--16-9 u-w--100 u-bg--bg-dark">--bg-dark</div>

            <div class="c-media--16-9 u-w--100 u-bg--txt u-color--white">--txt</div>
            <div class="c-media--16-9 u-w--100 u-bg--txt-weak u-color--white">--txt-weak</div>
            <div class="c-media--16-9 u-w--100 u-bg--txt-light">--txt-light</div>
            <div class="c-media--16-9 u-w--100 u-bg--txt-strong u-color--white">--txt-strong</div>

            <div class="c-media--16-9 u-w--100 u-bg--valid">--valid</div>
            <div class="c-media--16-9 u-w--100 u-bg--invalid">--invalid</div>

          </div>
        </section>
        <!-- --------------------------------------------------


          コンポーネント


        -------------------------------------------------- -->
        <div class="c-div--xl"></div>
        <div class="p-ttl u-mb--40">
          <h2 class="c-ttl--xl">Component</h2>
          <p>コンポーネント</p>
        </div>
        <!-- 
          
          タイトル

        -->
        <section class="p-style__panel" id="c-ttl">
          <h1 class="p-style__ttl">タイトル</h1>
          <h1 class="c-ttl--xxl">c-ttl--xxl タイトルタイトルタイトル</h1>
          <h2 class="c-ttl--xl">c-ttl--xl タイトルタイトルタイトル</h2>
          <h3 class="c-ttl--lg">c-ttl--lg タイトルタイトルタイトル</h3>
          <h4 class="c-ttl--md">c-ttl--md タイトルタイトルタイトル</h4>
          <h5 class="c-ttl--sm">c-ttl--sm タイトルタイトルタイトル</h5>
        </section>
        <!-- 
          
          文章

        -->
        <section class="p-style__panel" id="c-txt">
          <h1 class="p-style__ttl">文章・テキスト</h1>
          <p class="c-txt">c-txt 文章・テキスト・文章・テキスト・文章・テキスト</p>
          <p class="c-txt--sm">c-txt--sm 文章・テキスト・文章・テキスト・文章・テキスト</p>
          <p class="c-txt--xs">c-txt--xs 文章・テキスト・文章・テキスト・文章・テキスト</p>
        </section>
        <!-- 
          
          ノート

        -->
        <section class="p-style__panel" id="c-note">
          <h1 class="p-style__ttl">ノート・注意書き</h1>
          <p class="c-note">c-note ノート・注意書きノート・注意書きノート・注意書きノート・注意書きノート・注意書き・ノート・注意書きノート・注意書きノート・注意書きノート・注意書きノート・注意書き・ノート・注意書きノート・注意書きノート・注意書きノート・注意書きノート・注意書き</p>
        </section>
        <!-- 

          ボタン

        -->
        <section class="p-style__panel" id="c-btn">
          <h1 class="p-style__ttl">ボタン</h1>
          <a href="#" class="c-btn">c-btn ボタン</a>
          <a href="#" class="c-btn">
            <svg>
              <use href="#user"/>
            </svg>
          </a>
          <a href="#" class="c-btn--light">
            <svg>
              <use href="#user"/>
            </svg>
          </a>
          <a href="#" class="c-btn">
            <svg>
              <use href="#user"/>
            </svg>
            c-btn
          </a>
          <div class="p-ttl">
            <h4 class="c-ttl--md">ボタンスタイル</h4>
          </div>
          <div class="u-align u-gap--8">
            <a href="#" class="c-btn--light">c-btn--light</a>
            <a href="#" class="c-btn--goast">c-btn--goast</a>
            <a href="#" class="c-btn--invalid">
              <svg>
                <use href="#alert" />
              </svg>
              c-btn--invalid
            </a>
            <a href="#" class="c-btn--goast">
              c-btn--goast
              <svg>
                <use href="#chevron-right"/>
              </svg>
            </a>
            <a href="#" class="c-btn--sm">c-btn--sm</a>
            <a href="#" class="c-btn--sm c-btn--light">
              c-btn--sm
              <svg>
                <use href="#chevron-right"/>
              </svg>
            </a>
            <a href="#" class="c-btn--lg">c-btn--lg</a>
            <a href="#" class="c-btn--lg">
              <svg>
                <use href="#chevron-left"/>
              </svg>
              c-btn--lg
            </a>
            <a href="#" class="c-btn--lg">
              <svg>
                <use href="#user"/>
              </svg>
            </a>
          </div>
        </section>
        <!-- 

          リンク

        -->
        <section class="p-style__panel" id="c-link">
          <h1 class="p-style__ttl">リンク</h1>
          <div class="u-align u-gap--16">
            <a href="" class="c-link">c-link</a>
            <a href="" class="c-link">
              c-link
              <svg>
                <use href="#chevron-right"/>
              </svg>
            </a>
            <a href="" class="c-link">
              <svg>
                <use href="#user"/>
              </svg>
              c-link
            </a>
            <a href="" class="c-link--sm">c-link--sm</a>
          </div>

        </section>
        <!-- 

          タブ

        -->
        <section class="p-style__panel" id="c-tab">
          <h1 class="p-style__ttl">タブ</h1>
          <div class="u-align u-gap--4">
            <button class="c-tab">c-tab</button>
            <button class="c-tab">
              <svg>
                <use href="#user"/>
              </svg>
              c-tab
            </button>
            <button class="c-tab is-active">c-tab.is-active</button>
          </div>
          <div class="p-ttl">
            <h4 class="c-ttl--md">タブグループ .p-tab</h4>
          </div>
          <div class="p-tab">
            <button class="c-tab">c-tab</button>
            <button class="c-tab is-active">c-tab.is-active</button>
          </div>
        </section>
        <!-- 

          定義リスト

        -->
        <section class="p-style__panel" id="c-dl">
          <h1 class="p-style__ttl">定義リスト dl.c-dl</h1>
          <dl class="c-dl">
            <dt><strong>dt タイトル</strong></dt>
            <dd>dd データデータデータデータ</dd>
            <dt><strong>dt タイトル</strong></dt>
            <dd>dd データデータデータデータ</dd>
          </dl>
          <div class="c-div--lg"></div>
          <div class="p-ttl">
            <h4 class="c-ttl--md">.c-dl--sm.u-gap--0-8</h4>
          </div>
          <dl class="c-dl--sm u-gap--0-8">
            <dt><strong>タイトル</strong></dt>
            <dd>c-dl--sm</dd>
            <dt><strong>タイトル</strong></dt>
            <dd>データデータデータデータ</dd>
          </dl>
          <div class="c-div--lg"></div>
          <div class="p-ttl">
            <h4 class="c-ttl--md">.c-dl--between</h4>
          </div>
          <div class="u-max--240">
            <dl class="c-dl--between">
              <dt>小計</dt>
              <dd>
                <strong>¥5,000</strong>
              </dd>
            </dl>
            <dl class="c-dl--between">
              <dt>送料</dt>
              <dd>
                <strong>¥500</strong>
              </dd>
            </dl>
            <div class="c-div--sm"></div>
            <dl class="c-dl--between">
              <dt>合計</dt>
              <dd>
                <strong>¥5,500</strong>
              </dd>
            </dl>
          </div>
        </section>
        <!-- 

          ブロックリスト

        -->
        <section class="p-style__panel" id="c-bl">
          <h1 class="p-style__ttl">ブロックリスト dl.c-bl</h1>
          <div class="p-ttl">
            <h4 class="c-ttl--md">
              .c-bl > dl > dd + dd
            </h4>
          </div>
          <div class="c-bl">
            <dl>
              <dt>dt</dt>
              <dd>dd</dd>
            </dl>
            <dl>
              <dt>dt</dt>
              <dd>dd</dd>
            </dl>
            <dl>
              <dt>dt</dt>
              <dd>dd</dd>
            </dl>
            <dl>
              <dt>dt</dt>
              <dd>dd</dd>
            </dl>
            <dl>
              <dt>dt</dt>
              <dd>dd</dd>
            </dl>
            <dl>
              <dt>dt</dt>
              <dd>dd</dd>
            </dl>
            <dl>
              <dt>dt</dt>
              <dd>dd</dd>
            </dl>
            <dl>
              <dt>dt</dt>
              <dd>dd</dd>
            </dl>
            <dl>
              <dt><strong>タイトル</strong></dt>
              <dd>データデータデータデータデータデータデータ</dd>
            </dl>
          </div>
        </section>
        <!-- 

          テーブル Table

        -->
        <section class="p-style__panel" id="c-table">
          <h1 class="p-style__ttl">テーブル</h1>
          <div class="p-ttl">
            <h4 class="c-ttl--md">.p-table__wrapper > .p-table > .c-table</h4>
          </div>
          <div class="p-table__wrapper u-mt--24">
            <div class="p-table">
              <table class="c-table">
                <thead>
                  <tr>
                    <th>
                      thead-label
                    </th>
                    <th>
                      thead-label
                    </th>
                    <th>
                      thead-label
                    </th>
                    <th>
                      thead-label
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php for($i=0;$i<4;$i++) { ?>
                  <tr>
                    <td>
                      table-data
                    </td>
                    <td>
                      table-data
                    </td>
                    <td>
                      table-data
                    </td>
                    <td>
                      table-data
                    </td>
                    <div class="p-table__sp">
                      <details>
                        <summary>
                          row-summary
                        </summary>
                        row-details
                      </details>
                    </div>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </section>
        <!-- 

          ソートボタン

        -->
        <section class="p-style__panel" id="c-sort">
          <h1 class="p-style__ttl">ソートラベル</h1>
          <div class="p-ttl">
            <h4 class="c-ttl--md">c-sort .is-desc .is-asc</h4>
          </div>
          <div class="u-align u-gap--16">
            <label class="c-sort">並び替え可能項目</label>
            <label class="c-sort is-desc">降順</label>
            <label class="c-sort is-asc">昇順</label>
          </div>
        </section>
        <!-- 

          区切り線（divider）

        -->
        <section class="p-style__panel" id="c-div">
          <h1 class="p-style__ttl">区切り線</h1>
          <div class="p-ttl">
            <h4 class="c-ttl--md">c-div --sm --md --lg</h4>
            <p class="c-note">余白サイズのパターン</p>
          </div>
          <div class="p-grid--start u-gap--24" data-col="5">
            <div>
              コンテンツ
              <div class="c-div"></div>
              コンテンツ
            </div>
            <div>
              コンテンツ
              <div class="c-div--sm"></div>
              コンテンツ
            </div>
            <div>
              コンテンツ
              <div class="c-div--md"></div>
              コンテンツ
            </div>
            <div>
              コンテンツ
              <div class="c-div--lg"></div>
              コンテンツ
            </div>
            <div>
              コンテンツ
              <div class="c-div--xl"></div>
              コンテンツ
            </div>
          </div>
        </section>
        <!-- 

          メディア

        -->
        <section class="p-style__panel" id="c-media">
          <h1 class="p-style__ttl">メディア</h1>
          <div class="p-ttl">
            <h4 class="c-ttl--md">c-media--1-1 / c-media--4-3 / c-media--16-9</h4>
          </div>
          <div class="u-align u-gap--8">
            <img class="c-media--1-1 u-w--160" src="https://placehold.jp/3697c7/ffffff/600x100.png?text=画像">
            <img class="c-media u-w--160" src="https://placehold.jp/3697c7/ffffff/600x100.png?text=画像">
            <img class="c-media--16-9 u-w--160" src="https://placehold.jp/3697c7/ffffff/600x100.png?text=画像">
          </div>
        </section>
        <!-- 

          ボックス

        -->
        <section class="p-style__panel" id="c-box">
          <h1 class="p-style__ttl">ボックス</h1>
          <div class="p-ttl">
            <h4 class="c-ttl--md">c-box--xs / c-box--sm / c-box--lg / c-box--xl</h4>
          </div>
          <div class="p-grid" data-col="2">
            <div class="c-box">
              .c-box
            </div>
            <div class="c-box--xl c-box--fill">
              .c-box--xl .c-box--fill
            </div>
          </div>
        </section>
        <!-- 

          タグ

        -->
        <section class="p-style__panel" id="c-tag">
          <h1 class="p-style__ttl">タグ</h1>
          <div class="u-align u-gap--4">
            <span class="c-tag">c-tag</span>
            <span class="c-tag--valid">完了</span>
            <span class="c-tag--invalid">未完了</span>
            <span class="c-tag--primary">デザイン</span>
            <a href="" class="c-tag">a.c-tag</a>
          </div>
          <div class="p-ttl">
            <h4 class="c-ttl--md">カラーパターン</h4>
          </div>
          <div class="u-align u-gap--4">
            <span class="c-tag--type-a">c-tag--type-a</span>
            <span class="c-tag--type-b">c-tag--type-b</span>
            <span class="c-tag--type-c">c-tag--type-c</span>
            <span class="c-tag--type-d">c-tag--type-d</span>
            <span class="c-tag--type-e">c-tag--type-e</span>
            <span class="c-tag--type-f">c-tag--type-f</span>
            <span class="c-tag--type-g">c-tag--type-g</span>
            <span class="c-tag--type-h">c-tag--type-h</span>
          </div>
        </section>
        <!-- 

          メッセージ Component

        -->
        <section class="p-style__panel" id="c-msg">
          <h1 class="p-style__ttl">メッセージ</h1>
          <div class="p-ttl">
            <h4 class="c-ttl--md">c-msg / c-msg--valid / c-msg--invalid</h4>
          </div>
          <div class="u-align--vl u-w--100p">
            <div class="c-msg is-active u-mb--8">
              <i class="c-msg__ico"></i>
              <div class="c-msg__txt">
                <p class="c-txt--sm">通知・情報メッセージ</p>
              </div>
              <button class="c-msg__close"></button>
            </div>
            <div class="c-msg is-active u-mb--8">
              <i class="c-msg__ico--valid"></i>
              <div class="c-msg__txt">
                <p class="c-ttl--sm">有効・完了メッセージ</p>
                <p class="c-txt--xs u-mt--4 u-color--txt-weak">処理が有効だった場合のメッセージ表示に使用します</p>
              </div>
              <button class="c-msg__close"></button>
            </div>
            <div class="c-msg is-active u-w--100p">
              <i class="c-msg__ico--invalid"></i>
              <div class="c-msg__txt">
                <p class="c-txt--sm">未確認のメッセージがあります。メッセージ受け取り後12日間が経過しています。　<a class="c-link--sm">メッセージを確認する</a></p>
                
              </div>
            </div>
          </div>
          <div class="c-box--fill u-mt--40">
            通知で使用する場合、<a href="#p-msg" class="c-link">.p-msg</a>を使用します
          </div>
        </section>
        <!-- 

          モーダル Modal

        -->
        <section class="p-style__panel" id="c-modal">
          <h1 class="p-style__ttl">モーダル</h1>
          <div class="p-ttl">
            <h4 class="c-ttl--md">c-modal</h4>
            <p>
              モーダルを開く要素 data-modal-open="modal1"<br>
              モーダルを閉じる要素 data-modal-close<br>
              モーダル要素 .c-modal#modal1
            </p>
          </div>
          <button class="modalOpen c-btn" type="submit" data-modal-open="modal1">modal1を開く</button>
          <button class="modalOpen c-btn" type="submit" data-modal-open="modal2">modal2を開く</button>
          <!-- モーダルサンプル1 -->
          <dialog class="c-modal" id="modal1">
            <section class="c-box u-max--480">
              <div class="p-ttl u-mt--0">
                <h1 class="c-ttl">
                  モーダルタイトル
                  <button class="c-btn--light" data-modal-close>
                    <svg>
                      <use href="#close"/>
                    </svg>
                  </button>
                </h1>
                <div class="c-div--md"></div>
                <button class="c-btn" type="submit" data-modal-open="modal2">modal2を開く</button>
                <p class="c-txt--sm u-mt--24">
                  あなたが選択をした内容を削除してもよろしいですか？<br>
                  削除すると、元に戻すことはできませんので、ご注意ください。<br>
                  もしよろしければ、下のボタンを押してください。
                </p>
                <div class="u-align--both u-w--100p u-gap--4 u-mt--40">
                  <div>
                    <button type="submit" class="c-btn--goast c-btn--sm" data-modal-close>閉じる</button>
                  </div>
                  <div class="u-max--240">
                    <button type="submit" class="c-btn--invalid c-btn--sm u-w--100p">
                      <svg>
                        <use href="#alert" />
                      </svg>
                      削除する
                    </button>
                  </div>
                </div>
              </div>
            </section>
          </dialog>
          <!-- モーダルサンプル2 -->
          <dialog class="c-modal" id="modal2">
            <div class="u-align--vlc u-gap--24">
              <img src="https://placehold.jp/15ceff/ffffff/400x300.png?text=写真" class="u-w--240">
              <button class="c-btn" data-modal-close>閉じる</button>
            </div>
          </dialog>
        </section>
        <!-- --------------------------------------------------

          
          プロジェクト


        -------------------------------------------------- -->
        <div class="c-div--xl"></div>
        <div class="p-ttl u-mb--40">
          <h2 class="c-ttl--xl">Project</h2>
          <p>プロジェクト</p>
        </div>
        <!-- 

          タイトル

        -->
        <section class="p-style__panel" id="p-ttl">
          <h1 class="p-style__ttl">タイトル p-ttl</h1>
          <div class="p-grid" data-col="2">
            <div>
              <p class="c-note">.p-ttl（タイトルの余白レイアウト）</p>
              <div class="p-ttl">
                <h2 class="c-ttl">タイトル</h2>
                <p>説明文説明文説明文</p>
              </div>
            </div>
            <div>
              <p class="c-note">.p-ttl.u-mt--0（上の余白をなくす）</p>
              <div class="p-ttl u-mt--0">
                <h2 class="c-ttl">タイトル</h2>
                <p>説明文説明文説明文</p>
              </div>
            </div>
          </div>
        </section>
        <!-- 

          グリッド

        -->
        <section class="p-style__panel" id="p-grid">
          <h1 class="p-style__ttl">グリッド</h1>
          <div class="p-ttl">
            <h4 class="c-ttl--md">.p-grid.u-gap--8[data-col="2"]</h4>
          </div>
          <div class="p-grid u-gap--8" data-col="2">
            <div class="c-track u-bg--bg">
              .c-track
            </div>
            <div class="c-track u-bg--bg">
              .c-track
            </div>
            <div class="c-track u-bg--bg">
              .c-track
            </div>
          </div>
          <div class="p-ttl">
            <h4 class="c-ttl--md">.p-grid.u-gap--16[data-col="3"][data-col-md="2"][data-gap-md="8"]</h4>
          </div>
          <div
            class="p-grid u-gap--16"
            data-col="3"
            data-col-md="2"
            data-col-sm="1"
            data-gap-md="8"
          >
            <div class="c-track u-bg--bg">
              .c-track
            </div>
            <div class="c-track u-bg--bg">
              .c-track
            </div>
            <div class="c-track u-bg--bg">
              .c-track
            </div>
            <div class="c-track u-bg--bg">
              .c-track
            </div>
          </div>
        </section>
        <!-- 

          メッセージ Project

        -->
        <section class="p-style__panel" id="p-msg">
          <h1 class="p-style__ttl">メッセージ</h1>
          <div class="p-ttl">
            <h4 class="c-ttl--md">.p-msg</h4>
            <p class="c-txt--sm">通知で使用する場合は.p-msgで囲みます</p>
          </div>
          <div class="p-msg" style="position: relative; padding: 0;">
            <div class="c-msg is-active">
              <i class="c-msg__ico"></i>
              <div class="c-msg__txt">
                <p class="c-txt--sm">通知・情報メッセージ</p>
              </div>
              <button class="c-msg__close"></button>
            </div>
            <div class="c-msg is-active">
              <i class="c-msg__ico--valid"></i>
              <div class="c-msg__txt">
                <p class="c-ttl--sm">有効・完了メッセージ</p>
                <p class="c-txt--xs u-mt--4 u-color--txt-weak">処理が有効だった場合のメッセージ表示に使用します</p>
              </div>
              <button class="c-msg__close"></button>
            </div>
            <div class="c-msg is-active">
              <i class="c-msg__ico--invalid"></i>
              <div class="c-msg__txt">
                <p class="c-txt--sm">無効・エラーメッセージ</p>
              </div>
              <button class="c-msg__close"></button>
            </div>
          </div>
          <div class="u-mt--24">
            <button id="msgBtn" class="c-btn">メッセージを表示する</button>
            <script>
              const msgs = document.querySelectorAll('.c-msg');
              const msgBtn = document.getElementById('msgBtn');
              msgBtn.addEventListener('click', function(){
                msgs.forEach(el => {
                  el.classList.remove('is-hide');
                  el.classList.add('is-active');
                })
              })
            </script>
          </div>
        </section>
        <!-- --------------------------------------------------

          
          ユーティリティ


        -------------------------------------------------- -->
        <div class="c-div--xl"></div>
        <div class="p-ttl u-mb--40">
          <h2 class="c-ttl--xl">Utility</h2>
          <p>ユーティリティ</p>
        </div>
        <!-- 

          並べる

        -->
        <section class="p-style__panel" id="u-align">
          <div class="p-grid" data-col="4">
            <div>
              <div class="u-align">
                <p>u-align</p>
                <a href="" class="c-btn">並べる</a>
              </div>
            </div>
            <div>
              <div class="u-align--vlc">
                <p>u-align--vlc</p>
                <a href="" class="c-btn">中央軸で並べる</a>
              </div>
            </div>
            <div>
              <div class="u-align--vl">
                <p>u-align--vl</p>
                <a href="" class="c-btn">縦方向に並べる</a>
              </div>
            </div>
            <div>
              <div class="u-align--vlc">
                <p>u-align--vlc 縦方向中央軸で</p>
                <a href="" class="c-btn">並べる</a>
              </div>
            </div>
          </div>
        </section>
        <!-- 

          ギャップ

        -->
        <section class="p-style__panel" id="u-gap">
          <h1 class="p-style__ttl">.u-gap 間隔</h1>
          <div class="p-ttl">
            <h4 class="c-ttl--md">.u-align.u-gap--8</h4>
          </div>
          <div class="u-align u-gap--8">
            <div class="c-btn">要素</div>
            <div class="c-btn">要素</div>
            <div class="c-btn">要素</div>
          </div>
          <div class="p-ttl">
            <h4 class="c-ttl--md">.p-grid.u-gap--40</h4>
          </div>
          <div class="p-grid u-gap--40" data-col="3">
            <div class="c-track u-bg--bg">
              .c-track
            </div>
            <div class="c-track u-bg--bg">
              .c-track
            </div>
            <div class="c-track u-bg--bg">
              .c-track
            </div>
          </div>
        </section>
        <!-- 

          マージン

        -->
        <section class="p-style__panel" id="u-margin">
          <h1 class="p-style__ttl">.u-m（margin） マージン</h1>
          <div class="p-ttl">
            <h4 class="c-ttl--md">.u-mt-- / .u-mb--</h4>
          </div>
          <div class="p-grid" data-col="4">
            <div>
              <p>テキスト</p>
              <a href="" class="c-btn u-mt--24">.c-btn.u-mt--24</a>
            </div>
            <div>
              <a href="" class="c-btn u-mb--16">.c-btn.u-mb--16</a>
              <p>テキスト</p>
            </div>
          </div>
        </section>
        <!-- 

          パディング

        -->
        <section class="p-style__panel" id="u-padding">
          <h1 class="p-style__ttl">.u-p（padding) パディング</h1>
          <div class="p-ttl">
            <h4 class="c-ttl--md">.u-pt-- / .u-pb--</h4>
          </div>
          <div class="p-grid" data-col="4">
            <div>
              <a href="" class="c-btn u-pt--24">.c-btn.u-pt--24</a>
            </div>
            <div>
              <a href="" class="c-btn u-pb--16">.c-btn.u-pb--16</a>
            </div>
          </div>
        </section>
        <!-- 

          横幅

        -->
        <section class="p-style__panel" id="u-width">
          <h1 class="p-style__ttl">.u-w(width) 横幅</h1>
          <div class="u-align u-gap--16">
            <div class="c-btn u-w--200">.c-btn.u-w--200</div>
            <div class="c-btn u-w--200">.c-btn.u-w--200</div>
            <div class="c-btn u-w--200">.c-btn.u-w--200</div>
            <div class="c-btn u-w--200">.c-btn.u-w--200</div>
          </div>
        </section>
        <!-- 

          最大幅

        -->
        <section class="p-style__panel" id="u-max">
          <h1 class="p-style__ttl">.u-max 最大幅</h1>
          <div class="p-ttl">
            <h4 class="c-ttl--md">.c-media--16-9.u-max--240</h4>
          </div>
          <div class="p-grid" data-col="2">
            <img class="c-media--16-9 u-max--400" src="https://placehold.jp/3697c7/ffffff/400x300.png?text=画像">
            <p class="u-max--160">.u-max--160 テキストテキストテキストテキストテキストテキストテキストテキスト</p>
          </div>
        </section>
        <!-- 

          三点リーダー

        -->
        <section class="p-style__panel" id="u-clamp">
          <h1 class="p-style__ttl">.u-clamp 三点リーダー</h1>
          <div class="p-grid" data-col="4" data-col-md="2">
            <div>
              <p class="u-clamp">.u-clamp テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
            </div>
            <div>
              <p class="u-clamp--2">.u-clamp--2 テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
            </div>
            <div>
              <p class="u-clamp--3">.u-clamp--3 テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
            </div>
            <div>
              <p class="u-clamp--4">.u-clamp--4 テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
            </div>
          </div>
        </section>
        <!-- 

          カラー

        -->
        <section class="p-style__panel" id="u-color">
          <h1 class="p-style__ttl">.u-color 文字色</h1>
          <div class="c-ttl u-color--primary">.u-color--primary</div>
          <div class="c-ttl u-color--primary-dark">.u-color--primary-dark</div>
          <div class="c-ttl u-color--txt">.u-color--txt</div>
          <div class="c-ttl u-color--txt-weak">.u-color--txt-weak</div>
          <div class="c-ttl u-color--txt-light">.u-color--txt-light</div>
          <div class="c-ttl u-color--txt-strong">.u-color--txt-strong</div>
          <div class="c-ttl u-color--valid">.u-color--valid</div>
          <div class="c-ttl u-color--invalid">.u-color--invalid</div>
          <div class="c-media u-w--100 u-bg--txt">
            <div class="c-ttl u-color--white">.u-color--white</div>
          </div>
        </section>
        <!-- 

          背景色

        -->
        <section class="p-style__panel" id="u-bg">
          <h1 class="p-style__ttl">.u-bg 背景色</h1>
          <div class="u-align">
            <div class="c-media--1-1 u-w--100 u-bg--primary">--primary</div>
            <div class="c-media--1-1 u-w--100 u-bg--primary-dark u-color--white">--primary-dark</div>
            <div class="c-media--1-1 u-w--100 u-bg--primary-light">--primary-light</div>
            <div class="c-media--1-1 u-w--100 u-bg--primary-bg">--primary-bg</div>
            <div class="c-media--1-1 u-w--100 u-bg--primary-bg-light">--primary-bg-light</div>

            <div class="c-media--1-1 u-w--100 u-bg--bg">--bg</div>
            <div class="c-media--1-1 u-w--100 u-bg--bg-light">--bg-light</div>
            <div class="c-media--1-1 u-w--100 u-bg--bg-dark">--bg-dark</div>

          </div>
        </section>
        <!-- --------------------------------------------------

          
          フォーム


        -------------------------------------------------- -->
        <div class="c-div--xl"></div>
        <div class="p-ttl u-mb--40">
          <h2 class="c-ttl--xl">Form</h2>
          <p>フォーム</p>
        </div>
        <!-- 

          フォーム基本

        -->
        <section class="p-style__panel" id="f-basic">
          <h1 class="p-style__ttl">フォーム基本</h1>
          <div class="p-grid u-gap--40" data-col="2" data-col-md="1">
            <!-- 
              
              左側

            -->
            <div class="c-track">
              <!-- ---------- input[type="text"] ---------- -->
              <div class="f-item">
                <label class="f-label"> テキスト </label>
                <input type="text" placeholder="テキスト">
              </div>
              <!-- ---------- input[type="date"] ---------- -->
              <div class="f-item">
                <label class="f-label"> 日付 </label>
                <input type="date">
              </div>
              <!-- ---------- input[type="time"] ---------- -->
              <div class="f-item">
                <label class="f-label"> 時間 </label>
                <input type="time">
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
            </div>
            <!-- 
              
              右側

            -->
            <div class="c-track">
              <!-- ---------- input[type="radio"] ---------- -->
              <div class="f-item">
                <label class="f-label"> ラジオ </label>
                <label>
                  <input type="radio" name="radio1" id="radio-1-01" checked>
                  項目1
                </label>
                <label>
                  <input type="radio" name="radio1" id="radio-1-02">
                  項目2
                </label>
              </div>
              <div class="f-item">
                <label class="f-label"> ラジオ（縦並び） </label>
                <div class="u-align--vl u-gap--4">
                  <label class="is-invalid">
                    <input type="radio" name="radio2" id="radio-2-01" checked>
                    ラジオ項目1
                  </label>
                  <label class="is-invalid">
                    <input type="radio" name="radio2" id="radio-2-02">
                    ラジオ項目2
                  </label>
                </div>
              </div>
              <div class="f-item">
                <label class="f-label"> タブ </label>
                <div class="f-tab">
                  <label>
                    <input type="radio" name="radio3" id="radio-3-01" checked>
                    タブ項目1
                  </label>
                  <label>
                    <input type="radio" name="radio3" id="radio-3-02">
                    タブ項目2
                  </label>
                  <label>
                    <input type="radio" name="radio3" id="radio-3-03">
                    タブ長いラベル名項目3
                  </label>
                </div>
                <div class="f-tab">
                  <label>
                    <input type="radio" name="radio3" id="radio-3-04">
                    すべて
                  </label>
                </div>
              </div>

              <!-- ---------- input[type="checkbox"] ---------- -->
              <div class="f-item">
                <label class="f-label"> チェックボックス </label>
                <label>
                  <input type="checkbox" name="checkbox1" id="checkbox-1-00" checked>
                </label>
                <label>
                  <input type="checkbox" name="checkbox1" id="checkbox-1-01" checked>
                  項目1
                </label>
                <label>
                  <input type="checkbox" name="checkbox1" id="checkbox-1-02">
                  項目2
                </label>
              </div>
              <div class="f-item">
                <label class="f-label"> チェックボックス（縦並び） </label>
                <div class="u-align--vl u-gap--4">
                  <label class="is-invalid">
                    <input type="checkbox" name="checkbox2" id="checkbox-2-01">
                    チェックボックス項目1
                  </label>
                  <label class="is-invalid">
                    <input type="checkbox" name="checkbox2" id="checkbox-2-02">
                    チェックボックス項目2
                  </label>
                </div>
                <div class="f-invalid">少なくとも1つは選択してください</div>
              </div>
              <div class="f-item">
                <label class="f-label"> チェックボックス（スイッチ） </label>
                <div class="f-switch">
                  <label>
                    <input type="checkbox" id="checkbox-3-01" checked>
                  </label>
                  <label>
                    <input type="checkbox" id="checkbox-3-02">
                    ラベルあり
                  </label>
                </div>
              </div>
              <div class="p-grid u-gap--8" data-col="2">
                <div>
                  <div class="f-item">
                    <label class="f-label"> readonly </label>
                    <input type="text" value="readonly" readonly>
                  </div>
                  <div class="f-item">
                    <label class="f-label"> disabled </label>
                    <input type="text" value="disabled" disabled>
                  </div>
                </div>
                <div>
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
              </div>
              <div class="f-item">
                <label>
                  <input type="radio" id="radio-disabled" disabled>
                  Disabled
                </label>
                <label>
                  <input type="radio" id="radio-disabled" checked disabled>
                  Disabled
                </label>
                <label>
                  <input type="checkbox" id="checkbox-disabled" disabled>
                  Disabled
                </label>
                <label>
                  <input type="checkbox" id="checkbox-disabled" checked disabled>
                  Disabled
                </label>
              </div>
            </div>
          </div>
        </section>


        <!-- 
          
          フォーム グループ

        -->
        <section class="p-style__panel" id="f-group">
          <h1 class="p-style__ttl">フォームグループ</h1>
          <div class="p-grid u-gap--40" data-col="2" data-col-md="1">
            <!-- 
              
              左側

            -->
            <div class="c-track">
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
            </div>
            <!-- 
              
              右側

            -->
            <div class="c-track">
            
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
              <div class="c-div"></div>
              <!-- ---------- button ---------- -->
              <div class="f-item">
                <label class="f-label"> フォーム用ボタン </label>
                <button href="" class="f-btn">f-btn</button>
                <a href="" class="f-btn--goast">f-btn--goast</a>
                <a href="" class="f-btn--invalid">f-btn--invalid</a>
                <input type="reset" class="f-btn--light" value="f-btn--light">
                <input type="submit" value="f-btn[disabled]" class="f-btn" disabled>
              </div>
              <div class="f-item">
                <label class="f-label">アイコン付き</label>
                <a href="" class="f-btn">
                  <svg>
                    <use href="#add"/>
                  </svg>
                  追加
                </a>
                <a href="" class="f-btn--goast">
                  <svg>
                    <use href="#add-circle"/>
                  </svg>
                  追加
                </a>
                <a href="" class="f-btn--light">
                  次へ
                  <svg>
                    <use href="#chevron-right"/>
                  </svg>
                </a>
                <a href="" class="f-btn" disabled>
                  <svg>
                    <use href="#trush"/>
                  </svg>
                  削除
                </a>
              </div>
              
            </div>
          </div>
        </section>
        <!-- 
          
          大/小

        -->
        <section class="p-style__panel" id="f-lg">
          <h1 class="p-style__ttl">大/小</h1>
          <div class="p-grid u-gap--40" data-col="2" data-col-md="1">
            <!-- 
              
              左側

            -->
            <div class="c-track">
              <!-- ---------- large ---------- -->
              <div class="p-ttl">
                <h4 class="c-ttl--md">.f-lgでフォームパーツを大きく</h4>
              </div>
              <div class="f-item">
                <div class="f-label">タイトル</div>
                <input type="text" class="f-lg" placeholder="タイトル">
              </div>
              <div class="f-item">
                <div class="f-label">カテゴリ</div>
                <select class="f-lg is-invalid u-w--100p">
                  <option value="">選択してください</option>
                </select>
                <div class="f-invalid">必須項目です。選択してください。</div>
              </div>
              <div class="f-item">
                <div class="u-align u-w--100p u-gap--8">
                  <div>
                    <a href="" class="f-btn--lg f-btn--goast u-w--100p">戻る</a>
                  </div>
                  <div class="u-flex--auto">
                    <button class="f-btn--lg u-w--100p">送信する</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="c-track">
              <!-- ---------- small ---------- -->
              <div class="p-ttl">
                <h4 class="c-ttl--md">.f-smでフォームパーツを小さく</h4>
              </div>
              <div class="f-item--sm">
                <div class="f-label">タイトル</div>
                <input type="text" class="f-sm" placeholder="タイトル">
              </div>
              <div class="f-item--sm">
                <div class="f-label">カテゴリ</div>
                <select class="f-sm is-invalid u-w--100p">
                  <option value="">選択してください</option>
                </select>
                <div class="f-invalid">必須項目です。選択してください。</div>
              </div>
              <div class="f-item--sm">
                <div class="u-align u-w--100p u-gap--8">
                  <div>
                    <a href="" class="f-btn--sm f-btn--goast u-w--100p">戻る</a>
                  </div>
                  <div class="u-flex--auto">
                    <button class="f-btn--sm u-w--100p">送信する</button>
                  </div>
                </div>
              </div>
              <div class="f-item--sm">
                <div class="f-group">
                  <input class="f-sm" type="number" placeholder="1234567">
                  <select class="f-sm" name="" id="">
                    <option value="">円</option>
                    <option value="">ドル</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- 
          
          フォーム使用例

        -->
        <section class="p-style__panel" id="f-usecase">
          <h1 class="p-style__ttl">フォーム使用例</h1>
          <div class="p-grid u-gap--40" data-col="2" data-col-md="1">
            <!-- 
              
              左側

            -->
            <div class="c-track">
              <!-- ---------- お名前 ---------- -->
              <div class="f-item">
                <label class="f-label required">お名前</label>
                <div class="p-grid u-gap--8" data-col="2">
                  <input type="text" placeholder="例）山田">
                  <input type="text" placeholder="例）太郎">
                </div>
              </div>
              <!-- ---------- フリガナ ---------- -->
              <div class="f-item">
                <label class="f-label optional">フリガナ</label>
                <div class="p-grid u-gap--8" data-col="2">
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
              <!-- ---------- 郵便番号 ---------- -->
              <div class="f-item">
                <label class="f-label required">郵便番号</label>
                <div class="f-group u-w--200">
                  <span>〒</span>
                  <input type="number" placeholder="1234567">
                </div>
              </div>
              <!-- ---------- 都道府県 ---------- -->
              <div class="f-item">
                <label class="f-label required">都道府県</label>
                <select name="" id="" class="is-invalid u-w--100p">
                  <option value="">選択してください</option>
                  <option value="">東京都</option>
                  <option value="">北海道</option>
                </select>
                <div class="f-invalid">選択してください。</div>
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
            </div>
            <!-- 
              
              右側

            -->
            <div class="c-track">
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
              <div class="f-item">
                <label class="f-label">カード番号</label>
                <input type="number" class="is-invalid">
              </div>
              <!-- ---------- カード名義 ---------- -->
              <div class="f-item">
                <label class="f-label">カード名義</label>
                <input type="text" placeholder="例）TARO YAMADA">
              </div>
              <!-- ---------- カード名義 ---------- -->
              <div class="u-align u-gap--8">
                <div class="f-item">
                  <label class="f-label">有効期限</label>
                  <div class="u-align--nowrap u-gap--4">
                    <select name="" id="">
                      <option value="">01</option>
                    </select>
                    <select name="" id="">
                      <option value="">2022</option>
                    </select>
                  </div>
                </div>
                <div class="f-item u-w--128">
                  <label class="f-label">セキュリティコード</label>
                  <input type="number" class="is-invalid">
                </div>
              </div>
              <div class="f-invalid">カード番号を入力してください。</div>
              <div class="f-invalid">セキュリティコードを入力してください。</div>
              <div class="c-div--lg"></div>
              <div class="f-item">
                <div class="u-align u-w--100p u-gap--8">
                  <div>
                    <a href="" class="f-btn--goast" >修正</a>
                  </div>
                  <div class="u-flex--auto">
                    <button class="f-btn u-w--100p">この内容で送信する</button>
                  </div>
                </div>
              </div>
              <div class="c-div--lg"></div>
              <div class="f-item">
                <div class="u-align--both u-w--100p u-gap--8">
                  <div>
                    <a href="" class="f-btn--goast" >修正</a>
                  </div>
                  <div>
                    <button class="f-btn">この内容で送信する</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection
