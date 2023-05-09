# Project Name

-   [環境（言語、フレームワーク、サーバー要件 etc）](#dependency)
-   [コーディング規約（HTML、CSS）](#html-rules)
-   [コーディング規約（PHP）](#php-rules)
-   [Git の運用ルール](#git)

## プロジェクトの始め方

1. プロジェクトのディレクトリに移動
2. 以下のコマンドを実行

```bash
$ make build
$ make run
$ make setup
```

3. ブラウザで以下の URL に接続

```
http://localhost:8000
```

## TIPS

### コンテナ内の DB に SequelPro 等のクライアントで接続する

以下の接続情報を入力する

```
Host: 127.0.0.1
Username: user
Password: password
Database: app
Port: 33060
```

### 各コンテナ内のターミナルに入る

```
app$ make appsh
web$ make websh
db $ make dbsh
```

### コンテナの状態を確認

```
$ make status
```

### コンテナを一時停止する

```
$ make stop
```

### コンテナを再開させる

```
$ make start
```

### dump をする

以下のコマンドを実行する

```
$ make dump
```

### キャッシュをクリアする

```
$ make clear
```

## <a name="dependency"> 環境構成

| コンテナ名 | 環境                      | ベースイメージ        |
| :--------- | :------------------------ | :-------------------- |
| web        | nginx                     | nginx:1.19.2 - alpine |
| db         | MySQL 5.7                 | mysql:5.7             |
| app        | PHP 7.4 & Laravel 6.2 LTS | php:7.4 - fpm         |
| smtp       | mailhog                   | alpine:3.4            |

## <a name="html_rules"> コーディング規約（HTML、CSS）

■ HTML

-   インデントは半角スペース 2 つ
-   id は使用しない。（アンカーリンクでの使用を除く）
-   クラス名・使用するワードについて
-   スネーク方式(例：area_about) ※すべて小文字 ※JS はキャメルでも可
-   英単語を使用。(例えば卵のクラス名を付与する場合：× tamago ○ egg )
    一般的な名称であれば省略可
-   title => ttl
-   contents => cnt
-   適したタグを使用する

```
× <div class*=“list_sample">
      <div>サンプル_1</div>
      <div>サンプル_2</div>
      <div>サンプル_3</div>
    </div>
○ <ul class*=“list_sample”>
      <li>
        <p>サンプル_1</p>
      </li>
      <li>
        <p>サンプル_1</p>
      </li>
      <li>
        <p>サンプル_1</p>
      </li>
    </ul>
```

■ CSS

-   カラーコード　=　 HEX (例：#fff)
-   アルファ値が必要な場合のみ RGBA を使用してもよい

```
  × .text {font-size:12px; font-weight:bold; line-height:1.3em; font-family: sans-serif;}
  ○ .text {font:bold 12px/1.3em sans-serif;}
```

-   共通化できる箇所は共通化する

```
  <a herf=“” class*=“btn_red”>赤いボタン</btn>
  <a herf=“” class*=“btn_red”>青い</btn>
```

```
  [class*=“btn_”] {
    font: 300 12px/1em 'noto sans japanese',sans-serif;
    display: block;
    padding: 5px 10px;
  }
  [class*=“btn_"][class*=“blue”] {
    background:blue;
  }
  [class*=“btn_"][class*=“red”] {
    background:blue;
  }
```

-   float は使用不可
-   float は使用せず flexbox で組む
-   レスポンシブについて

    -   最小幅 320px まで考慮

-   ブラウザ対応について
    -   下記ブラウザの最新版まで考慮する
        -   Firefox
        -   Safari
        -   GoogleChrome
        -   InternetExplorer
        -   Microsoft Edge
-   !important を使用しない

■ image

-   名称は以下いずれかに当てはめる（動画を除く）
    -   img○○○
    -   bg○○○
    -   ico○○○
    -   bnr○○○
    -   tmb_○○○
-   拡張子について（動画を除く）
    -   アイコン、シェイプについては SVG を使用
    -   画像については png もしくは jpg を使用

## <a name="php_rules"> コーディング規約

PSR-2 に従う。

```
<?php
// 開始は「<?php」または「<?=」のみ可
// ファイルの文字コードはUTF-8（BOMなし）
// 改行コードはLF
// 行の長さをソフトリミット120字とし、80字以内におさまるようにする

// 呼んだだけで動くファイルの中で宣言系の処理を書いてはいけない（クラス定数は除く）
// define("DEF_ITEM", '定数アイテム');

// クラス名はアッパーキャメルケース
// extendsは同じ行に書く
class RulesExplain extends RulesBase
// クラス名のあとの「{」は改行する
{
// インデントは半角スペース4つ

    // 定数は大文字+「_」で定義する
    const DEF_ITEM = '定数アイテム';

    // アクセス修飾子は必ずつける
    // 関数名は（ローワー）キャメルケース
    // 引数後のカンマの前にスペースは入れない
    // 引数後のカンマの後にはスペースを入れる
    public function getRules($rule1, $rule2)
    // 関数名のあとの「{」は改行する
    {
        // 変数名に関しては一貫性を持たせればなんでもいい（今回はキャメルケース）
        $rulesName = $rule1;

        // 予約語は小文字にする
        $rulesBool = true;

        // 「if」などと「(」の間は半角スペースを空ける
        // 「)」と「{」の間は半角スペースを空ける
        // ifなどの後の「{」は改行しない
        if ($rulesName === $rulesBool) {
            echo 'rule!';
        // elseifはつなげる
        } elseif ($rulesName === $rule2) {

        }

        //「;」の前の空白は不要
        for ($i = 0; $i < 5; $i++) {
            echo 'rule' . $i;
        }
    }

    public function tooMuchArgument(
        // 複数行になる場合、1行につき引数は1つまで
        $itemOne,
        $itemTwo,
        $itemThree,
        $itemFour,
        $itemFive,
    ) {
        $itemTemp = $itemOne;

        switch ($itemTemp) {
            case 1:
                echo '1以上';
                // no break
                // 空でないcaseで意図的にbreakしない場合その旨のコメントを使う
            case 2:
            case 3:
                echo '2以上';
                break;
        }

    }
}
// [EOF]
// ファイルの末尾は改行し空行をいれる
/* 「?>」は省略する */
```

## Git の運用ルール

下記のルールに従う。

1. master ブランチは常時デプロイ可能ものとする
2. feature ブランチで作業を行う
3. 作業終了後 master ブランチにマージする
4. ブランチのネーミング形式
    - feature/20190523/(任意)
5. コメント規則

```
[種別(add/update/fix/remove)][バックログタスクID]作業内容の要約をここに記載する。

作業内容の詳細をここに記載する。
作業内容の詳細をここに記載する。
作業内容の詳細をここに記載する。
```
