<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <script src="https://unpkg.com/apexcharts/dist/apexcharts.min.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/web.css') }}">
  </head>

<body>
  <header class="header">
    <div class="header_logo">
      <img src="../web/img/logo.svg" alt="">
    </div>
    <div class="header_week">
      <li class="header_week_4th">4th week</li>
    </div>
    <div class="header_record">
      <button id="header_record_button">記録・投稿</button>
    </div>
  </header>

  <main class="main">
    <div class="container">
      <div class="hours_container">
        <div class="hours">
          <ul id="today_hours">
            <li class="hours_title" id="today_title" name="today"></li>
            <li class="hours_count"><?php echo $today_sum;?></li>
            <li class="hours_hour">hour</li>
          </ul>
          <ul class="month_hours">
            <li class="hours_title" id="month_title"><?php echo $this_month?>の合計</li>
            <li class="hours_count"><?php echo $month_sum;?></li>
            <li class="hours_hour">hour</li>
          </ul>
          <ul class="total_hours">
            <li class="hours_title">総計</li>
            <li class="hours_count"><?php echo $total_sum;?></li>
            <li class="hours_hour">hour</li>
          </ul>
        </div>
        <div class="canvas_container" id="hours_chart"></div>
        <script>
          var options = {
            series: [{
              name: 'hour',
              data: [3, 4, 5, 3, 0, 0, 4, 2, 2, 8, 8, 2, 2, 1, 7, 4, 4, 3, 3, 3, 2, 2, 6, 2, 2, 1, 1, 1, 7, 8],
            }],
            chart: {
              type: 'bar',
              height: 420,
              toolbar: {
                show: false
              },
            },
            plotOptions: {
              bar: {
                horizontal: false,
                columnWidth: '50%',
                borderRadius: 5,
                endingShape: 'rounded'
              },
            },
            dataLabels: {
              enabled: false
            },
            xaxis: {
              axisTicks: {
                show: false //x軸の値区切り.-.
              },
              axisBorder: {
                show: false
              },

              labels: {
                formatter: function(value) {
                  if (value !== undefined) {
                    const categories = value.split(" ")
                    const day = categories[0]
                    return day % 2 == 1 ? "" : value;
                  }
                },
                style: {
                  colors: '#6ba0f0'
                },
              },
            },

            grid: {
              yaxis: {
                lines: {
                  show: false
                },
              },
            },

            yaxis: {
              labels: {
                formatter: function(value) {
                  return value + "h";
                },
                style: {
                  colors: '#6ba0f0',
                }
              },
              type: 'category',
              axisTicks: {
                show: false,
                width: 1,
              }
            },

            labels: ['1', '02', '3', '04', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'],

            fill: {
              colors: ["#1174BD"],
              type: 'gradient',
              gradient: {
                type: 'vertical', //上垂直にグラデーション 
                gradientToColors: ['#3BCFFF'],
              }
            },

            responsive: [{
              breakpoint: 480,
              options: {
                xaxis: {
                  labels: {
                    offsetY: -7,
                    style: {
                      fontSize: '7.5px',
                    }
                  }
                },
                chart: {
                  height: 200,
                }
              },
            }]
          };

          var chart = new ApexCharts(document.querySelector("#hours_chart"), options);
          chart.render();
        </script>
      </div>
      <div class="learning">
        <div class="learning_character">
          <p class="learning_title">学習言語</p>
          <div class="character_chart">
            <div id="learning_character_chart"></div>
              <ul class="learning_character_detail">
                <li class="circle circle_js">JavaScript</li>
                <li class="circle circle_css">CSS</li>
                <li class="circle circle_php">PHP</li>
                <li class="circle circle_html">HTML</li>
                <li class="circle circle_laravel">Laravel</li>
                <li class="circle circle_sql">SQL</li>
                <li class="circle circle_shell">Shell</li>
                <li class="circle circle_others">情報システム基礎情報（その他）</li>
              </ul>
            <div class="learning_chart" id="chart1">
            <script>
              var options = {
                series: [44, 55, 13, 43, 22],
                chart: {
                width: 300,
                type: 'pie',
              },
              labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
              responsive: [{
                breakpoint: 480,
                options: {
                  chart: {
                    width: 200
                  },
                  legend: {
                    position: 'bottom'
                  }
                }
              }]
              };
              var chart = new ApexCharts(document.querySelector("#chart1"), options);
              chart.render();
            </script>
            </div>
          </div>
        </div>

        <div class="learning_content">
          <p class="learning_title">学習コンテンツ</p>
          <div id="learning_content_chart"></div>
          <ul class="learning_content_detail">
            <li class="circle circle_dot">ドットインストール</li>
            <li class="circle circle_N_cramSchool">N予備校</li>
            <li class="circle circle_posse">Posse課題</li>
          </ul>
          <div class="canvas_container" id="hours_chart">
            <script>
            var options = {
              series: [44, 55, 13, 43, 22],
              chart: {
              width: 300,
              type: 'pie',
            },
            labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
            responsive: [{
              breakpoint: 480,
              options: {
                chart: {
                  width: 200
                },
                legend: {
                  position: 'bottom'
                }
              }
            }]
            };
            var chart = new ApexCharts(document.querySelector("#hours_chart"), options);
            chart.render();
          </script>
        </div>
        </div>
      </div>
    </div>

    <div class="date">
      <div class="arrow arrow-left"></div>
      <div id="date_detail"><?php echo $this_month;?></div>
      <div class="arrow arrow-right"></div>
    </div>
    <div class="footer_record">
      <button id="footer_record_button">記録・投稿</button>
    </div>
    <div class="modal">
      <form action="" method="post" id="form_record">
        <div class="modal_content">
          <button class="modal_close"><span class="batsu"></span></button>
          <div class="modal_detail">
            <div class="modal_detail_left">
              <div class="modal_learning_day">
                <div class="modal_learning_day_detail">
                  <p class="learning_day_title" >学習日</p>
                  <input type="date" name="learning_day_detail" class="learning_day_text">
                  <!-- <button id="learning_day_detail" placeholder="2022年10月23日"> -->
                </div>
              </div>
              <div class="modal_learning_content">
                <p class="learning_content_title">学習コンテンツ （複数選択可）</p>
                <div class="modal_learning_content_detail">
                  <div class="modal_N">
                    <input type="checkbox"  name=""><label for="N_cramSchool" class="N_cramSchool">N予備校</label>
                  </div>
                  <div class="modal_dot">
                    <input type="checkbox"  name=""><label for="dotinstall" class="dotinstall">ドットインストール</label>
                  </div>
                  <div class="modal_Posse">
                    <input type="checkbox"  name=""><label for="posse"class="posse">POSSE課題</label>
                  </div>
                </div>
              </div>
              <div class="modal_learning_language">
                <p class="learning_language_title">学習言語（複数選択可）</p>
                <div class="learning_language_content">
                  <div class="modal_html">
                    <input type="checkbox"  name=""><label for="html"class="html">HTML</label>
                  </div>
                  <div class="modal_css">
                    <input type="checkbox"  name=""><label for="css"class="css">CSS</label>
                  </div>
                  <div class="modal_js">
                    <input type="checkbox"  name=""><label for="js"class="js">JavaScript</label>
                  </div>
                  <div class="modal_php">
                    <input type="checkbox"  name=""><label for="php"class="php">PHP</label>
                  </div>
                  <div class="modal_laravel">
                    <input type="checkbox" name=""><label for="laravel"class="laravel">Laravel</label>
                  </div>
                  <div class="modal_sql">
                    <input type="checkbox" name=""><label for="sql"class="sql">SQL</label>
                  </div>
                  <div class="modal_shell">
                    <input type="checkbox"  name=""><label for="shell"class="shell">SHELL</label>
                  </div>
                  <div class="modal_others">
                    <input type="checkbox"  name=""><label for="others"class="others">情報システム基礎情報（その他</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal_detail_right">
              <div class="modal_learning_time">
                <p class="learning_time_title">学習時間</p>
                <input type="text" name="" class="learning_time_title_detail" placeholder="">
              </div>
              <div class="modal_comment">
                <p class="comment_title">Twitter用コメント</p>
                <textarea name="" id="comment_title_detail" cols="30" rows="10"></textarea>
              </div>
              <div class="modal_twitter">
                <input type="checkbox"  name=""><label for="modal_twitter_button" class="modal_twitter_button" id="twitter_share">Twitterにシャアする</label>
              </div>
            </div>
          </div>
          <button class="modal_record" id="modal_record">記録・投稿</button>
        </div>
      </form>
    </div>
    <div class="calender">
      <div class="calender_content">
        <button id="calender_close"><span class="batsu"></span></button>
        <div class="calender_detail">
          <table>
            <thead>
              <tr>
                <th id="prev">&laquo;</th>
                <th id="title" colspan="3">2022/10</th>
                <th id="next">&raquo;</th>
              </tr>
              <tr>
                <th class="weekday">Sun</th>
                <th class="weekday">Mon</th>
                <th class="weekday">Tue</th>
                <th class="weekday">Wed</th>
                <th class="weekday">Thu</th>
                <th class="weekday">Fri</th>
                <th class="weekday">Sat</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
        <button class="calender_decide">決定</button>
      </div>
    </div>
    <div class="loading">
      <button class="loading_close"><span class="batsu" ></span></button>
      <div class="loading_content">
        <div class="loader"></div>
      </div>

    </div>
    <div class="finish">
      <div class="finish_content">
        <button class="finish_close"><span class="batsu"></span></button>
        <div class="finish_mark">
          <p class="finish_awesome">AWESOME!</p>
          <ul class="finish_checkbox">
            <li class="finish_checkbox_item"></li>
          </ul>
          <p class="finish_anounce">記録・投稿<br>完了しました</p>
        </div>
      </div>
    </div>
    <div class="error">
      <div class="error_content">
        <p class="error_content_error">ERROR</p>
        <i class="gg-danger"></i>
        <p class="error_anounce">一時的にご利用できない状態です。<br>しばらく経ってから<br>再度アクセスしてください</p>
      </div>
    </div>
  </main>
</body>
</html>