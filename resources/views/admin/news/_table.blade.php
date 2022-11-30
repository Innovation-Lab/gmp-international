<div class="t-wrapper">
  <div class="t-head">
    <div class="t-head__count">
      1〜3件目を表示 / 全3件
    </div>
  </div>
  <div class="t-table">
    <table>
      <thead>
        <tr>
          <th>
            <input type="checkbox" id="all">
            <label for="all"></label>
          </th>
          <th>
            アイキャッチ
          </th>
          <th>
            商品名
          </th>
          <th>
            商品管理
          </th>
          <th>
            公開
          </th>
          <th>
            カテゴリ
          </th>
          <th>
            公開日
          </th>
          <th>
            作成日時
          </th>
        </tr>
      </thead>
      <tbody>
        <?php for($i=0;$i<30;$i++) { ?>
        <tr>
          <td>
            <input type="checkbox" id="{{$i}}">
            <label for="{{$i}}"></label>
          </td>
          <td>
            <img src="https://placehold.jp/3697c7/ffffff/400x300.png?text=サムネイル" class="lg">
          </td>
          <td>
            <a href="{{route('admin.news.edit')}}">世界中のコレクションが集まる「天然石のギャラリー」</a>
            <p class="line2 u-mt4">加工工場に直結した天然石ギャラリー「Strad. Stone Gallery」が、岐阜県関ヶ原にオープンした。70年の歴史をもつ、「関ヶ原石材株式会社」が選び抜いた表情豊かな石の数々。
            </p>
          </td>
          <td>
            ¥1,200
          </td>
          <td>
            公開
          </td>
          <td>
            生活
          </td>
          <td>
            2022/11/22
          </td>
          <td>
            2022/11/22<br>
            12:20
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <div class="t-foot">
    <div class="t-pagert">
      123
    </div>
  </div>
</div>