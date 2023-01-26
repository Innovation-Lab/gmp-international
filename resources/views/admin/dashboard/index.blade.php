@extends('admin.layout._page-default')
@section('content')
  <div class="l-main__head">
    @component('admin.component._head')
      @slot('main')
      <h2 class="c-ttl--lg">
        ダッシュボード
      </h2>
      @endslot
    @endcomponent
  </div>
  <div class="l-main__body">
    <div class="p-dashboard">
      <div class="p-dashboard__body">
        <!-- ボックス -->
        <div class="p-dashboard__panel c-box">
          <h3 class="c-ttl--lg">
            今月の売上
            <a href="{{route('admin.item')}}" class="c-btn">売上管理へ</a>
          </h3>
          <div class="c-ttl--xxl u-mt--16">
            {{'¥'.number_format(1240180)}}
          </div>
          <p class="c-txt--sm">過去30日間で</p>
          <div class="c-div"></div>
          <dl class="c-dl--between">
            <dt>商品代金</dt>
            <dd>{{'¥'.number_format(932100)}}</dd>
            <dt>販売商品数</dt>
            <dd>{{number_format(1024)}}</dd>
            <dt>送料</dt>
            <dd>{{'¥'.number_format(50080)}}</dd>
            <dt>消費税</dt>
            <dd>{{'¥'.number_format(9200)}}</dd>
          </dl>
        </div>
        <div class="p-dashboard__panel c-box">
          <div class="p-ttl u-mt--0">
            <h3 class="c-ttl--lg">
              売上分析
              <span class="u-ml--a">
                <select class="f-sm" name="" id="">
                  <option value="">2022/1-6</option>
                </select>
              </span>
            </h3>
          </div>
          <div id="graph">
            <div id="salesChart"></div>
            <script>
              const myData = {
                xAxis: ['2022-01', '2022-02', '2022-03', '2022-04', '2022-05',],
                series: [
                  {
                    name: 'CSS',
                    data: [30, 50, 70, 120, 100]
                  },
                  {
                    name: 'Script',
                    data: [20, 30, 90, 60, 120]
                  },
                  {
                    name: 'Com',
                    data: [0, 40, 60, 30, 100]
                  },
                ]
              }
              const salesChart = dopyo.createChart({
                type: 'area', // or 'area'
                size: {
                  width: 480,
                  height: 320,
                },
                containerEl: '#salesChart',
                data: myData,
                options: {
                  xAxis: {
                    show: true,
                    title: '日付'
                  },
                  yAxis: {
                    show: true,
                    title: '千円'
                  },
                  tooltip: {
                    show: true
                  }
                }
              });
            </script>
            <style>
              #salesChart {
                width: 100% !important;
                min-width: auto !important;
              }
            </style>
          </div>
        </div>
        <div class="p-dashboard__panel c-box">
          <div class="p-ttl u-mt--0">
            <h3 class="c-ttl--lg">
              最新のお知らせ
              <div class="u-align--hlc u-gap--8 u-ml--a">
                <div class="c-btn--light">
                  <svg>
                    <use href="#chevron-left"/>
                  </svg>
                </div>
                <p class="c-txt--sm">1/3</p>
                <div class="c-btn--light">
                  <svg>
                    <use href="#chevron-right"/>
                  </svg>
                </div>
              </div>
            </h3>
          </div>
          <div class="p-grid" data-col="2">
            <div>
              <p class="c-txt--sm light">2022/12/01</p>
              <a href="" class="c-link u-mt--8 u-mb--8">
                世界中のコレクションが集まる「天然石のギャラリー」
              </a>
              <p class="c-txt--xs u-color--txt-weak u-clamp--3">加工工場に直結した天然石ギャラリー「Strad. Stone Gallery」が、岐阜県関ヶ原にオープンした。70年の歴史をもつ、「関ヶ原石材株式会社」が選び抜いた表情豊かな石の数々。</p>
            </div>
            <div>
              <img src="https://placehold.jp/3697c7/ffffff/400x300.png?text=サムネイル">
            </div>
          </div>
          <a href="{{route('admin.news')}}" class="c-btn--goast c-btn--sm u-mt--16">お知らせ管理に移動</a>
        </div>
        <div class="p-dashboard__panel c-box">
          <div class="p-ttl u-mt--0">
            <h3 class="c-ttl--lg">カテゴリ別売上</h3>
            <p class="c-txt--sm">今月のカテゴリ別売上金額</p>
          </div>
          <div class="c-div"></div>
          <dl class="c-dl--between">
            <dt>
              <div class="u-align u-gap--16">
                <svg class="c-media--1-1 u-w--20">
                  <use href="#digital"/>
                </svg>
                デジタル
              </div>
            </dt>
            <dd>{{'¥'.number_format(480200)}}</dd>
            <dt>
              <div class="u-align u-gap--16">
                <svg class="c-media--1-1 u-w--20">
                  <use href="#life"/>
                </svg>
                生活
              </div>
            </dt>
            <dd>{{'¥'.number_format(18080)}}</dd>
            <dt>
              <div class="u-align u-gap--16">
                <svg class="c-media--1-1 u-w--20">
                  <use href="#kitchen"/>
                </svg>
                キッチン
              </div>
            </dt>
            <dd>{{'¥'.number_format(48200)}}</dd>
            <dt>
              <div class="u-align u-gap--16">
                <svg class="c-media--1-1 u-w--20">
                  <use href="#sports"/>
                </svg>
                スポーツ
              </div>
            </dt>
            <dd>{{'¥'.number_format(54100)}}</dd>
            <dt>
              <div class="u-align u-gap--16">
                <svg class="c-media--1-1 u-w--20">
                  <use href="#others"/>
                </svg>
                その他
              </div>
            </dt>
            <dd>{{'¥'.number_format(1200)}}</dd>
          </dl>
        </div>
        <div class="p-dashboard__panel c-box">
          <div class="p-ttl u-mt--0">
            <h3 class="c-ttl--lg">商品ランキング</h3>
            <p class="c-txt--sm">過去30日間の売上ランキング</p>
          </div>
          <div class="c-div"></div>
          <dl class="c-dl--sm u-gap--8">
            <dt>
              <img src="https://placehold.jp/3697c7/ffffff/400x300.png?text=サムネイル" class="u-w--80">
            </dt>
            <dd>
              <a href="" class="c-link">商品タイトル。商品タイトル。商品タイトル。</a>
              <p>販売数：x1,864</p>
            </dd>
            <dt>
              <img src="https://placehold.jp/3697c7/ffffff/400x300.png?text=サムネイル" class="u-w--80">
            </dt>
            <dd>
              <div>
                <a href="" class="c-link">商品タイトル。商品タイトル。商品タイトル。</a>
                <p>販売数：x1,024</p>
              </div>
            </dd>
            <dt>
              <img src="https://placehold.jp/3697c7/ffffff/400x300.png?text=サムネイル" class="u-w--80">
            </dt>
            <dd>
              <div>
                <a href="" class="c-link">商品タイトル。商品タイトル。商品タイトル。</a>
                <p>販売数：x400</p>
              </div>
            </dd>
            <dt>
              <img src="https://placehold.jp/3697c7/ffffff/400x300.png?text=サムネイル" class="u-w--80">
            </dt>
            <dd>
              <div>
                <a href="" class="c-link">商品タイトル。商品タイトル。商品タイトル。</a>
                <p>販売数：x328</p>
              </div>
            </dd>
          </dl>
          <a href="{{route('admin.item')}}" class="c-btn--goast c-btn--sm u-mt--16">商品管理に移動</a>
        </div>
        <div class="p-dashboard__panel c-box">
          <div class="p-ttl u-mt--0">
            <h3 class="c-ttl--lg">最新の売上</h3>
            <p class="c-txt--sm">最新の購入情報</p>
          </div>
          <div class="c-div"></div>
          <dl class="c-dl--between u-gap--8">
            <dt>
              <div>
                <a href="" class="c-link">ミズノグローブx1, 軟式野球ボールx5</a>
                <p class="c-note">2022/12/01 13:21　田中 圭吾</p>
              </div>
            </dt>
            <dd>{{'¥'.number_format(14800)}}</dd>
            <dt>
              <div>
                <a href="" class="c-link">ミズノグローブx1, 軟式野球ボールx5</a>
                <p class="c-note">2022/12/01 13:21　田中 圭吾</p>
              </div>
            </dt>
            <dd>{{'¥'.number_format(14800)}}</dd>
            <dt>
              <div>
                <a href="" class="c-link">ミズノグローブx1, 軟式野球ボールx5</a>
                <p class="c-note">2022/12/01 13:21　田中 圭吾</p>
              </div>
            </dt>
            <dd>{{'¥'.number_format(14800)}}</dd>
            <dt>
              <div>
                <a href="" class="c-link">ミズノグローブx1, 軟式野球ボールx5</a>
                <p class="c-note">2022/12/01 13:21　田中 圭吾</p>
              </div>
            </dt>
            <dd>{{'¥'.number_format(14800)}}</dd>
          </dl>
          <a href="{{route('admin.item')}}" class="c-btn--goast c-btn--sm u-mt--16">売上管理に移動</a>
        </div>
        <div class="p-dashboard__panel c-box">
          <div class="p-ttl u-mt--0">
            <h3 class="c-ttl--lg u-mt--0">最新のお問合せ</h3>
            <p class="c-txt--sm">お客様からの最新のお問合せ一覧</p>
          </div>
          <div class="c-div"></div>
          <dl class="c-dl--between u-gap--8">
            <dt>
              <div>
                <a href="" class="c-link">送料についての不明点</a>
                <p class="c-note">2022/12/01 13:21　田中 圭吾</p>
              </div>
            </dt>
            <dd>p-tag c-tag 未対応</dd>
            <dt>
              <div>
                <a href="" class="c-link">送料についての不明点</a>
                <p class="c-note">2022/12/01 13:21　田中 圭吾</p>
              </div>
            </dt>
            <dd>未対応</dd>
            <dt>
              <div>
                <a href="" class="c-link">送料についての不明点</a>
                <p class="c-note">2022/12/01 13:21　田中 圭吾</p>
              </div>
            </dt>
            <dd>未対応</dd>
            <dt>
              <div>
                <a href="" class="c-link">送料についての不明点</a>
                <p class="c-note">2022/12/01 13:21　田中 圭吾</p>
              </div>
            </dt>
            <dd>未対応</dd>
          </dl>
          <a href="{{route('admin.contact')}}" class="c-btn--goast c-btn--sm u-mt--16">お問合せ管理に移動</a>
        </div>
      </div>
    </div>
  </div>
@endsection