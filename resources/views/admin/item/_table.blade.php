<div class="p-table__wrapper--index">
  <div class="p-table">
    <table class="c-table">
      <thead>
        <tr>
          <th>
            <label>
              <input type="checkbox" id="all">
            </label>
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
            <label>
              <input type="checkbox" id="{{$i}}">
            </label>
          </td>
          <td>
            <img class="c-media u-w--80" src="https://placehold.jp/3697c7/ffffff/400x300.png?text=サムネイル">
          </td>
          <td>
            <a class="c-link" href="{{route('admin.item.detail')}}">
              THE TABLE / 杉無垢材 × Black Steel
            </a>
            <p class="c-txt--sm u-clamp--2 u-mt--4">温かみのある杉無垢材の天板と、マットブラックの鉄脚を組み合わせた、シンプルモダンなデザインのテーブルです。
            杉は、美しい木目や表情豊かな節が特徴の、明るい雰囲気の木材。木目を生かしてカッティングされた、 厚みのある杉無垢材を丁寧に組み合わせて、品のある天板に仕上げています。木肌のナチュラルな風合いが好きな方におすすめです。
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
          <div class="p-table__sp">
            <details>
              <summary>
                <a href="{{route('admin.item.detail')}}" class="c-link">THE TABLE / 杉無垢材 × Black Steel</a>
                <dl class="c-dl u-mt--8">
                  <dt>料金</dt>
                  <dd>{{number_format(1200)}}</dd>
                </dl>
              </summary>
              <div class="c-box u-mt--16">
                <p class="u-txt--xs u-color--txt-weak">加工工場に直結した天然石ギャラリー「Strad. Stone Gallery」が、岐阜県関ヶ原にオープンした。70年の歴史をもつ、</p>
                <dl class="c-dl">
                  <dt>料金</dt>
                  <dd>{{number_format(1200)}}</dd>
                </dl>
              </div>
            </details>
          </div>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <div class="p-table__foot">
    @include('admin.component._pager')
  </div>
</div>