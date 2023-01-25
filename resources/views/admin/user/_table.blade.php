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
            氏名
          </th>
          <th>
            フリガナ
          </th>
          <th>
            性別
          </th>
          <th>
            電話番号
          </th>
          <th>
            メールアドレス
          </th>
          <th>
            住所
          </th>
          <th>
            会員種別
          </th>
          <th>
            ステータス
          </th>
        </tr>
      </thead>
      <tbody>
        <?php for($i=0;$i<40;$i++) { ?>
        <tr>
          <td>
            <label>
              <input type="checkbox" id="{{$i}}">
            </label>
          </td>
          <td>
            <a href="{{route('admin.user.detail')}}" class="c-link">斉藤 啓介</a>
          </td>
          <td>
            サイトウ ケイスケ
          </td>
          <td>
            男性
          </td>
          <td>
            09012345678
          </td>
          <td>
            sample@example.com
          </td>
          <td>
            〒123-0001 東京都渋谷区渋谷123 渋谷マンション1201
          </td>
          <td>
            無料会員
          </td>
          <td>
            公開
          </td>
          <div class="p-table__sp">
            <details>
              <summary>
                <a href="{{route('admin.user.detail')}}" class="c-link">斉藤 啓介</a>
                <p class="c-txt--sm u-color--txt-weak">サイトウ ケイスケ</p>
              </summary>
              <div class="c-box u-mt--16">
                <div class="u-align u-gap--8">
                  <span class="c-tag">ABC会員</span>
                  <span class="c-tag">男性</span>
                  <span class="c-tag">東京都</span>
                </div>
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