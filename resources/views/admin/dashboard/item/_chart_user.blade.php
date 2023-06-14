<div class="p-dashboard__item">
  <div class="p-dashboard__head">
    <h3 class="p-dashboard__head__title">
      ユーザー数推移チャート
    </h3>
    <div class="p-index__head__action">
      {{-- フォーム --}}
      <form method="get" action="{{route('admin.home') }}"  class="p-form" id="chartForm">
        <select class="chart" name="period_length" id="js-store-period-length" data-period="{{ request()->get('period_length', 'month') }}">
          <option value="month" @if(request()->get('period_length', 'month') == 'month') selected @endif>月間</option>
          <option value="year" @if(request()->input('period_length') == 'year') selected @endif>年間</option>
        </select>
      </form>
    </div>
  </div>
  <div class="p-dashboard__body" style="padding: 1rem;">
    <div class="p-dashboard__content">
      <canvas id="chart-dashboard" height="320px"></canvas>
      <script src="{{ asset('js/admin/library/jquery-3.5.1.min.js') }}"></script>
      <script>
          $(function() {
            $('select[name="period_length"]').on('change', function() {
                $('#chartForm').submit();
            });
            var period = $('#js-store-period-length').data('period');
            $.ajax({
                url : '/admin/chartUserRegister',
                type : "GET",
                datatype:'json',
                data : {
                    'period': period
                },
            }).done(function(response) {
                // データ作成 --------------------------------------------------
                const ctx = document.getElementById('chart-dashboard').getContext('2d');

                // 色の定義 --------------------------------------------------
                const color_1 = '#3a5bdf';
                const color_2 = '#1a349e';
                const color_3 = '#0D1553';

                // テキストカラー
                const color_text = '#515567';

                // ラインカラー
                const color_line = '#f1f2f6';

                // グラデーション
                const gradient_1 = ctx.createLinearGradient(0, 0, 0, 320);
                gradient_1.addColorStop(.2, '#3a5bdf22');
                gradient_1.addColorStop(.8, '#3a5bdf00');
                const gradient_2 = ctx.createLinearGradient(0, 0, 0, 320);
                gradient_2.addColorStop(.2, '#1a349e22');
                gradient_2.addColorStop(.8, '#1a349e00');
                const gradient_3 = ctx.createLinearGradient(0, 0, 0, 320);
                gradient_3.addColorStop(.2, '#0D155322');
                gradient_3.addColorStop(.8, '#0D155300');

                // 一括指定項目（ライン） --------------------------------------------------
                Chart.defaults.global.elements.line = {
                    borderWidth: 3,   // 線の太さ
                    tension: 0,       // 折れ線グラフ
                    borderDash: [],   // ダッシュ線設定(.lineを指定する場合必要な模様)
                    fill: 'start',      // 上側を塗りつぶす
                };

                // 一括指定項目（ポイント）--------------------------------------------------
                Chart.defaults.global.elements.point = {
                    borderWidth: 3,           // 線の太さ
                    radius: 3,                // ポイントの半径
                    pointStyle: 'circle',     // ポイントのスタイル
                    hitRadius: 20,            // ホバー検出の半径
                    hoverRadius: 8,          // ホバー時の半径
                };

                // チャート本体
                const myChart = new Chart(ctx, {
                    // チャートタイプ --------------------------------------------------
                    type: 'line',

                    // 表示データ --------------------------------------------------
                    data: {
                        labels: response.label,
                        datasets: [{
                            label: '',
                            data: response.data,
                            borderColor: color_1,
                            backgroundColor: gradient_1,
                            pointBackgroundColor: "#fff",
                        }]
                    },

                    // オプション --------------------------------------------------
                    options: {
                        // 凡例 --------------------
                        legend: {
                            position: 'bottom',
                            display: false,
                            labels: {
                                fontSize: 12,
                                fontFamily: '"Noto Sans JP","Roboto"',
                                fontColor: color_text,
                                usePointStyle: true,        // ポイントの表示にするか
                                padding: 16,                // 周りの余白
                                boxWidth: 4,                // 大きさ
                            }
                        },
                        // スケール --------------------------------------------------
                        scales: {
                            //横軸 --------------------
                            xAxes: [
                                {
                                    display: true,
                                    fillColor: false,
                                    maxBarThickness: 8,
                                    minBarLength: 4,
                                    categoryPercentage: 0.6,
                                    ticks: {
                                        fontSize: 11,
                                        fontFamily: 'Roboto',
                                        fontColor: color_text,
                                        callback: function(label, index, labels) {
                                            return  label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                                        }
                                    },
                                    // スタック
                                    stacked: false,
                                    scaleLabel: {
                                        display: false, //表示するか否か
                                        labelString: '---',
                                        fontSize: 10,
                                    },
                                    // ガイドライン
                                    gridLines: {
                                        display: false, //表示するか否か
                                        drawBorder: false,
                                    },
                                }
                            ],
                            //縦軸 --------------------
                            yAxes: [
                                {
                                    // スタック
                                    stacked: false,
                                    ticks: {
                                        fontSize: 11,
                                        fontFamily: 'Roboto',
                                        fontColor: color_text,
                                        min: 0,
                                        // max: 10000000,
                                        stepSize: 10000,
                                        /* 人数をカンマ区切りで表示 */
                                        callback: function(label, index, labels) {
                                            return  label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + '人';
                                        }
                                    },
                                    // ガイドライン
                                    gridLines: {
                                        /* 線の色 */
                                        color: color_line,
                                        /* 軸の線 */
                                        drawBorder:false,
                                    },
                                }
                            ],
                        },

                        // ツールチップ --------------------------------------------------
                        tooltips: {
                            /* 金額をカンマ区切りで表示 */
                            callbacks: {
                                label: function(tooltipItem, data){
                                    return tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + '人';
                                }
                            }
                        },

                        // アスペクト比固定解除 --------------------------------------------------
                        maintainAspectRatio: false,
                        responsive: true,

                    }
                });
            });
          })
      </script>
    </div>
  </div>
</div>