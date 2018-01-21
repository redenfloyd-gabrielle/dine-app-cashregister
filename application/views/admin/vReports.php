<div class="pusher">
    <div class='ui hidden divider'></div>
    <div class='ui padded segment'>
        <!-- header -->
        <div class='ui basic segment'>
            <h1 class="ui brown dividing header">
                <i class="bar chart icon"></i>
                <div class="content">
                  REPORTS
                  <div class="sub header">Shows the reports</div>
                </div>
            </h1> <!-- header -->
            <div class='ui breadcrumb'>
                <a class='section' href='<?php echo site_url()?>/CUser/viewAdminDashboard'>HOME</a>
                <i class='right arrow icon divider'></i>
                <div class='active section'>REPORTS</div>
            </div> <!-- breadcrumb -->
        </div> <!-- segment -->
        <!-- end of header -->

        <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          // ['Basketball',50],
          // ['Dota',30],
          // ['Academics',20]
          <?php
      foreach($data as $row){
        echo "['".$row->product_name."',".$row->quantity."],";
        
      }          
          ?>
        ]);

        var options = {
          title: 'chart'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Day', 'Sales'],
          <?php
            if($daily1 != 0){
              foreach($daily1 as $row){
                if($row->total != 0){
                  echo "['1',".$row->total."],";
                }else{
                  echo "['1',0],";
                }
              }
            }

            if($daily2 != 0){
              foreach($daily2 as $row){
                if($row->total != 0){
                  echo "['2',".$row->total."],";
                }else{
                  echo "['2',0],";
                }
              }
            }

            if($daily3 != 0){
              foreach($daily3 as $row){
                if($row->total != 0){
                  echo "['3',".$row->total."],";
                }else{
                  echo "['3',0],";
                }
              }
            }

            if($daily4 != 0){
              foreach($daily4 as $row){
                if($row->total != 0){
                  echo "['4',".$row->total."],";
                }else{
                  echo "['4',0],";
                }
              }
            }

            if($daily5 != 0){
              foreach($daily5 as $row){
                if($row->total != 0){
                  echo "['5',".$row->total."],";
                }else{
                  echo "['5',0],";
                }
              }
            }

            if($daily6 != 0){
              foreach($daily6 as $row){
                if($row->total != 0){
                  echo "['6',".$row->total."],";
                }else{
                  echo "['6',0],";
                }
              }
            }

            if($daily7 != 0){
              foreach($daily7 as $row){
                if($row->total != 0){
                  echo "['7',".$row->total."],";
                }else{
                  echo "['7',0],";
                }
              }
            }

            if($daily8 != 0){
              foreach($daily8 as $row){
                if($row->total != 0){
                  echo "['8',".$row->total."],";
                }else{
                  echo "['8',0],";
                }
              }
            }

            if($daily9 != 0){
              foreach($daily9 as $row){
                if($row->total != 0){
                  echo "['9',".$row->total."],";
                }else{
                  echo "['9',0],";
                }
              }
            }

            if($daily10 != 0){
              foreach($daily10 as $row){
                if($row->total != 0){
                  echo "['10',".$row->total."],";
                }else{
                  echo "['10',0],";
                }
              }
            }

            if($daily11 != 0){
              foreach($daily11 as $row){
                if($row->total != 0){
                  echo "['11',".$row->total."],";
                }else{
                  echo "['11',0],";
                }
              }
            }

            if($daily12 != 0){
              foreach($daily12 as $row){
                if($row->total != 0){
                  echo "['12',".$row->total."],";
                }else{
                  echo "['12',0],";
                }
              }
            }

            if($daily13 != 0){
              foreach($daily13 as $row){
                if($row->total != 0){
                  echo "['13',".$row->total."],";
                }else{
                  echo "['13',0],";
                }
              }
            }

            if($daily14 != 0){
              foreach($daily14 as $row){
                if($row->total != 0){
                  echo "['14',".$row->total."],";
                }else{
                  echo "['14',0],";
                }
              }
            }

            if($daily15 != 0){
              foreach($daily15 as $row){
                if($row->total != 0){
                  echo "['15',".$row->total."],";
                }else{
                  echo "['15',0],";
                }
              }
            }

            if($daily16 != 0){
              foreach($daily16 as $row){
                if($row->total != 0){
                  echo "['16',".$row->total."],";
                }else{
                  echo "['16',0],";
                }
              }
            }

            if($daily17 != 0){
              foreach($daily17 as $row){
                if($row->total != 0){
                  echo "['17',".$row->total."],";
                }else{
                  echo "['17',0],";
                }
              }
            }

            if($daily18 != 0){
              foreach($daily18 as $row){
                if($row->total != 0){
                  echo "['18',".$row->total."],";
                }else{
                  echo "['18',0],";
                }
              }
            }

            if($daily19 != 0){
              foreach($daily19 as $row){
                if($row->total != 0){
                  echo "['19',".$row->total."],";
                }else{
                  echo "['19',0],";
                }
              }
            }

            if($daily20 != 0){
              foreach($daily20 as $row){
                if($row->total != 0){
                  echo "['20',".$row->total."],";
                }else{
                  echo "['20',0],";
                }
              }
            }

            if($daily21 != 0){
              foreach($daily21 as $row){
                if($row->total != 0){
                  echo "['21',".$row->total."],";
                }else{
                  echo "['21',0],";
                }
              }
            }

            if($daily22 != 0){
              foreach($daily22 as $row){
                if($row->total != 0){
                  echo "['22',".$row->total."],";
                }else{
                  echo "['22',0],";
                }
              }
            }

            if($daily23 != 0){
              foreach($daily23 as $row){
                if($row->total != 0){
                  echo "['23',".$row->total."],";
                }else{
                  echo "['23',0],";
                }
              }
            }

            if($daily24 != 0){
              foreach($daily24 as $row){
                if($row->total != 0){
                  echo "['24',".$row->total."],";
                }else{
                  echo "['24',0],";
                }
              }
            }

            if($daily25 != 0){
              foreach($daily25 as $row){
                if($row->total != 0){
                  echo "['25',".$row->total."],";
                }else{
                  echo "['25',0],";
                }
              }
            }

            if($daily26 != 0){
              foreach($daily26 as $row){
                if($row->total != 0){
                  echo "['26',".$row->total."],";
                }else{
                  echo "['26',0],";
                }
              }
            }

            if($daily27 != 0){
              foreach($daily27 as $row){
                if($row->total != 0){
                  echo "['27',".$row->total."],";
                }else{
                  echo "['27',0],";
                }
              }
            }

            if($daily28 != 0){
              foreach($daily28 as $row){
                if($row->total != 0){
                  echo "['28',".$row->total."],";
                }else{
                  echo "['28',0],";
                }
              }
            }

            if($daily29 != 0){
              foreach($daily29 as $row){
                if($row->total != 0){
                  echo "['29',".$row->total."],";
                }else{
                  echo "['29',0],";
                }
              }
            }

            if($daily30 != 0){
              foreach($daily30 as $row){
                if($row->total != 0){
                  echo "['30',".$row->total."],";
                }else{
                  echo "['30',0],";
                }
              }
            }

            if($daily31 != 0){
              foreach($daily31 as $row){
                if($row->total != 0){
                  echo "['31',".$row->total."],";
                }else{
                  echo "['31',0],";
                }
              }
            }

          ?>
        ]);
    

        var options = {
          title: 'Daily Sales',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>



    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Day', 'Sales'],
          <?php
            if($daily1 != 0){
              foreach($daily1 as $row){
                if($row->total != 0){
                  echo "['1',".$row->total."],";
                }else{
                  echo "['1',0],";
                }
              }
            }

            if($daily2 != 0){
              foreach($daily2 as $row){
                if($row->total != 0){
                  echo "['2',".$row->total."],";
                }else{
                  echo "['2',0],";
                }
              }
            }

            if($daily3 != 0){
              foreach($daily3 as $row){
                if($row->total != 0){
                  echo "['3',".$row->total."],";
                }else{
                  echo "['3',0],";
                }
              }
            }

            if($daily4 != 0){
              foreach($daily4 as $row){
                if($row->total != 0){
                  echo "['4',".$row->total."],";
                }else{
                  echo "['4',0],";
                }
              }
            }

            if($daily5 != 0){
              foreach($daily5 as $row){
                if($row->total != 0){
                  echo "['5',".$row->total."],";
                }else{
                  echo "['5',0],";
                }
              }
            }

            if($daily6 != 0){
              foreach($daily6 as $row){
                if($row->total != 0){
                  echo "['6',".$row->total."],";
                }else{
                  echo "['6',0],";
                }
              }
            }

            if($daily7 != 0){
              foreach($daily7 as $row){
                if($row->total != 0){
                  echo "['7',".$row->total."],";
                }else{
                  echo "['7',0],";
                }
              }
            }

            if($daily8 != 0){
              foreach($daily8 as $row){
                if($row->total != 0){
                  echo "['8',".$row->total."],";
                }else{
                  echo "['8',0],";
                }
              }
            }

            if($daily9 != 0){
              foreach($daily9 as $row){
                if($row->total != 0){
                  echo "['9',".$row->total."],";
                }else{
                  echo "['9',0],";
                }
              }
            }

            if($daily10 != 0){
              foreach($daily10 as $row){
                if($row->total != 0){
                  echo "['10',".$row->total."],";
                }else{
                  echo "['10',0],";
                }
              }
            }

            if($daily11 != 0){
              foreach($daily11 as $row){
                if($row->total != 0){
                  echo "['11',".$row->total."],";
                }else{
                  echo "['11',0],";
                }
              }
            }

            if($daily12 != 0){
              foreach($daily12 as $row){
                if($row->total != 0){
                  echo "['12',".$row->total."],";
                }else{
                  echo "['12',0],";
                }
              }
            }

            if($daily13 != 0){
              foreach($daily13 as $row){
                if($row->total != 0){
                  echo "['13',".$row->total."],";
                }else{
                  echo "['13',0],";
                }
              }
            }

            if($daily14 != 0){
              foreach($daily14 as $row){
                if($row->total != 0){
                  echo "['14',".$row->total."],";
                }else{
                  echo "['14',0],";
                }
              }
            }

            if($daily15 != 0){
              foreach($daily15 as $row){
                if($row->total != 0){
                  echo "['15',".$row->total."],";
                }else{
                  echo "['15',0],";
                }
              }
            }

            if($daily16 != 0){
              foreach($daily16 as $row){
                if($row->total != 0){
                  echo "['16',".$row->total."],";
                }else{
                  echo "['16',0],";
                }
              }
            }

            if($daily17 != 0){
              foreach($daily17 as $row){
                if($row->total != 0){
                  echo "['17',".$row->total."],";
                }else{
                  echo "['17',0],";
                }
              }
            }

            if($daily18 != 0){
              foreach($daily18 as $row){
                if($row->total != 0){
                  echo "['18',".$row->total."],";
                }else{
                  echo "['18',0],";
                }
              }
            }

            if($daily19 != 0){
              foreach($daily19 as $row){
                if($row->total != 0){
                  echo "['19',".$row->total."],";
                }else{
                  echo "['19',0],";
                }
              }
            }

            if($daily20 != 0){
              foreach($daily20 as $row){
                if($row->total != 0){
                  echo "['20',".$row->total."],";
                }else{
                  echo "['20',0],";
                }
              }
            }

            if($daily21 != 0){
              foreach($daily21 as $row){
                if($row->total != 0){
                  echo "['21',".$row->total."],";
                }else{
                  echo "['21',0],";
                }
              }
            }

            if($daily22 != 0){
              foreach($daily22 as $row){
                if($row->total != 0){
                  echo "['22',".$row->total."],";
                }else{
                  echo "['22',0],";
                }
              }
            }

            if($daily23 != 0){
              foreach($daily23 as $row){
                if($row->total != 0){
                  echo "['23',".$row->total."],";
                }else{
                  echo "['23',0],";
                }
              }
            }

            if($daily24 != 0){
              foreach($daily24 as $row){
                if($row->total != 0){
                  echo "['24',".$row->total."],";
                }else{
                  echo "['24',0],";
                }
              }
            }

            if($daily25 != 0){
              foreach($daily25 as $row){
                if($row->total != 0){
                  echo "['25',".$row->total."],";
                }else{
                  echo "['25',0],";
                }
              }
            }

            if($daily26 != 0){
              foreach($daily26 as $row){
                if($row->total != 0){
                  echo "['26',".$row->total."],";
                }else{
                  echo "['26',0],";
                }
              }
            }

            if($daily27 != 0){
              foreach($daily27 as $row){
                if($row->total != 0){
                  echo "['27',".$row->total."],";
                }else{
                  echo "['27',0],";
                }
              }
            }

            if($daily28 != 0){
              foreach($daily28 as $row){
                if($row->total != 0){
                  echo "['28',".$row->total."],";
                }else{
                  echo "['28',0],";
                }
              }
            }

            if($daily29 != 0){
              foreach($daily29 as $row){
                if($row->total != 0){
                  echo "['29',".$row->total."],";
                }else{
                  echo "['29',0],";
                }
              }
            }

            if($daily30 != 0){
              foreach($daily30 as $row){
                if($row->total != 0){
                  echo "['30',".$row->total."],";
                }else{
                  echo "['30',0],";
                }
              }
            }

            if($daily31 != 0){
              foreach($daily31 as $row){
                if($row->total != 0){
                  echo "['31',".$row->total."],";
                }else{
                  echo "['31',0],";
                }
              }
            }

          ?>
        ]);
    

        var options = {
          title: 'Daily Sales',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart4'));

        chart.draw(data, options);
      }
    </script>





    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Week', 'Sales'],
          <?php
          if($weekly3 != 0){
            foreach($weekly3 as $row){
              if($row->total != 0){
                echo "['1st Week',".$row->total."],";
              }else{
                echo "['1st Week', 0],";
              }
            }
          }

          if($weekly2 != 0){
            if($weekly3 != 0){
              foreach($weekly2 as $row){
                if($row->total != 0){
                  echo "['2nd Week',".$row->total."],";
                }else{
                  echo "['2nd Week', 0],";
                }
              }
            }else{
              foreach($weekly2 as $row){
                if($row->total != 0){
                  echo "['1st Week',".$row->total."],";
                }else{
                  echo "['1st Week', 0],";
                }
              }
            }
          }

          if($weekly1 != 0){
            if($weekly2 != 0){
              if($weekly3 != 0){
                foreach($weekly1 as $row){
                  if($row->total != 0){
                    echo "['3rd Week',".$row->total."],";
                  }else{
                    echo "['3rd Week', 0],";
                  }
                }
              }else{
                foreach($weekly1 as $row){
                  if($row->total != 0){
                    echo "['2nd Week',".$row->total."],";
                  }else{
                    echo "['2nd Week', 0],";
                  }
                }
              }
            }else{
              foreach($weekly1 as $row){
                if($row->total != 0){
                  echo "['1st Week',".$row->total."],";
                }else{
                  echo "['1st Week', 0],";
                }
              }
            }
          }

          foreach($weekly as $row){
            if($row->total != 0){
              echo "['Current Week',".$row->total."],";
            }else{
              echo "['Current Week', 0],";
            }
          }

          ?>
        ]);
    

        var options = {
          title: 'Weekly Sales',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart2'));

        chart.draw(data, options);
      }
    </script>



    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Week', 'Sales'],
          <?php
          if($weekly3 != 0){
            foreach($weekly3 as $row){
              if($row->total != 0){
                echo "['1st Week',".$row->total."],";
              }else{
                echo "['1st Week', 0],";
              }
            }
          }

          if($weekly2 != 0){
            if($weekly3 != 0){
              foreach($weekly2 as $row){  
                if($row->total != 0){
                  echo "['2nd Week',".$row->total."],";
                }else{
                  echo "['2nd Week', 0],";
                }
              }
            }else{
              foreach($weekly2 as $row){
                if($row->total != 0){
                  echo "['1st Week',".$row->total."],";
                }else{
                  echo "['1st Week', 0],";
                }
              }
            }
          }

          if($weekly1 != 0){
            if($weekly2 != 0){
              if($weekly3 != 0){
                foreach($weekly1 as $row){
                  if($row->total != 0){
                    echo "['3rd Week',".$row->total."],";
                  }else{
                    echo "['3rd Week', 0],";
                  }
                }
              }else{
                foreach($weekly1 as $row){
                  if($row->total != 0){
                    echo "['2nd Week',".$row->total."],";
                  }else{
                    echo "['2nd Week', 0],";
                  }
                }
              }
            }else{
              foreach($weekly1 as $row){
                if($row->total != 0){
                  echo "['1st Week',".$row->total."],";
                }else{
                  echo "['1st Week', 0],";
                }
              }
            }
          }

          foreach($weekly as $row){
            if($row->total != 0){
              echo "['Current Week',".$row->total."],";
            }else{
              echo "['Current Week', 0],";
            }
          }

          ?>
        ]);
    

        var options = {
          title: 'Weekly Sales',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart5'));

        chart.draw(data, options);
      }
    </script>



    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Sales'],
          <?php
            if($monthly11 != 0){
            foreach($monthly11 as $row){
              if($row->total != 0){
                echo "['November',".$row->total."],";
              }else{
                echo "['November', 0],";
              }
            }
          }

          if($monthly10 != 0){
            foreach($monthly10 as $row){
              if($row->total != 0){
                echo "['October',".$row->total."],";
              }else{
                echo "['October', 0],";
              }
            }
          }

          if($monthly9 != 0){
            foreach($monthly9 as $row){
              if($row->total != 0){
                echo "['September',".$row->total."],";
              }else{
                echo "['September', 0],";
              }
            }
          }

          if($monthly8 != 0){
            foreach($monthly8 as $row){
              if($row->total != 0){
                echo "['August',".$row->total."],";
              }else{
                echo "['August', 0],";
              }
            }
          }

          if($monthly7 != 0){
            foreach($monthly7 as $row){
              if($row->total != 0){
                echo "['July',".$row->total."],";
              }else{
                echo "['July', 0],";
              }
            }
          }

          if($monthly6 != 0){
            foreach($monthly6 as $row){
              if($row->total != 0){
                echo "['June',".$row->total."],";
              }else{
                echo "['June', 0],";
              }
            }
          }    

          if($monthly5 != 0){
            foreach($monthly5 as $row){
              if($row->total != 0){
                echo "['May',".$row->total."],";
              }else{
                echo "['May', 0],";
              }
            }
          }      

          if($monthly4 != 0){
            foreach($monthly4 as $row){
              if($row->total != 0){
                echo "['April',".$row->total."],";
              }else{
                echo "['April', 0],";
              }
            }
          } 

          if($monthly3 != 0){
            foreach($monthly3 as $row){
              if($row->total != 0){
                echo "['March',".$row->total."],";
              }else{
                echo "['March', 0],";
              }
            }
          }

          if($monthly2 != 0){
            foreach($monthly2 as $row){
              if($row->total != 0){
                echo "['February',".$row->total."],";
              }else{
                echo "['February', 0],";
              }
            }
          }

          if($monthly1 != 0){
            foreach($monthly1 as $row){
              if($row->total != 0){
                echo "['January',".$row->total."],";
              }else{
                echo "['January', 0],";
              }
            }
          }

          foreach($monthly as $row){
            if($row->total != 0){
              echo "['Current Month',".$row->total."],";
            }else{
              echo "['Current Current', 0],";
            }
          }
          ?>
        ]);
    

        var options = {
          title: 'Monthly Sales',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart3'));

        chart.draw(data, options);
      }
    </script>



    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Sales'],
          <?php
            if($monthly11 != 0){
            foreach($monthly11 as $row){
              if($row->total != 0){
                echo "['November',".$row->total."],";
              }else{
                echo "['November', 0],";
              }
            }
          }

          if($monthly10 != 0){
            foreach($monthly10 as $row){
              if($row->total != 0){
                echo "['October',".$row->total."],";
              }else{
                echo "['October', 0],";
              }
            }
          }

          if($monthly9 != 0){
            foreach($monthly9 as $row){
              if($row->total != 0){
                echo "['September',".$row->total."],";
              }else{
                echo "['September', 0],";
              }
            }
          }

          if($monthly8 != 0){
            foreach($monthly8 as $row){
              if($row->total != 0){
                echo "['August',".$row->total."],";
              }else{
                echo "['August', 0],";
              }
            }
          }

          if($monthly7 != 0){
            foreach($monthly7 as $row){
              if($row->total != 0){
                echo "['July',".$row->total."],";
              }else{
                echo "['July', 0],";
              }
            }
          }

          if($monthly6 != 0){
            foreach($monthly6 as $row){
              if($row->total != 0){
                echo "['June',".$row->total."],";
              }else{
                echo "['June', 0],";
              }
            }
          }    

          if($monthly5 != 0){
            foreach($monthly5 as $row){
              if($row->total != 0){
                echo "['May',".$row->total."],";
              }else{
                echo "['May', 0],";
              }
            }
          }      

          if($monthly4 != 0){
            foreach($monthly4 as $row){
              if($row->total != 0){
                echo "['April',".$row->total."],";
              }else{
                echo "['April', 0],";
              }
            }
          } 

          if($monthly3 != 0){
            foreach($monthly3 as $row){
              if($row->total != 0){
                echo "['March',".$row->total."],";
              }else{
                echo "['March', 0],";
              }
            }
          }

          if($monthly2 != 0){
            foreach($monthly2 as $row){
              if($row->total != 0){
                echo "['February',".$row->total."],";
              }else{
                echo "['February', 0],";
              }
            }
          }

          if($monthly1 != 0){
            foreach($monthly1 as $row){
              if($row->total != 0){
                echo "['January',".$row->total."],";
              }else{
                echo "['January', 0],";
              }
            }
          }

          foreach($monthly as $row){
            if($row->total != 0){
              echo "['Current Month',".$row->total."],";
            }else{
              echo "['Current Current', 0],";
            }
          }
          ?>
        ]);
    

        var options = {
          title: 'Monthly Sales',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart6'));

        chart.draw(data, options);
      }
    </script>
        <!-- content -->
        <div class='ui segments'>
              <div class='ui basic segment'> 
                  <h5 class='ui header brown ribbon label'><i class='bar chart icon'></i>Reports</h5>
                  
                  <div class="ui hidden divider"></div>
                 
                  <div class="ui top attached tabular menu">
                    <a class="active item" data-tab="first">Overall</a>
                    <a class="item" data-tab="second">Daily</a>
                    <a class="item" data-tab="third">Weekly</a>
                    <a class="item" data-tab="fourth">Monthly</a>
                  </div>
                  <div class="ui bottom attached active tab segment" data-tab="first">
                    <!-- DIRI MAG START ANG CONTENTS SA REPORTS PAGE -->
                    <div class='ui stackable padded grid'>  
                      <div class='two column row'>
                        <!-- DIRI ISUD ANG CONTENTS (e.g. graphs and shit) -->
                        <div class='center aligned middle aligned column'>
                          <table class='ui inverted table'>
                            <thead>
                              <th>PRODUCTS</th>
                            </thead>
                          </table>
                          <!-- display 10 products -->
                          <table class='ui very basic celled compact table'>
                            <thead>
                              <tr> 
                                <td><b>Product Name</b></td>
                                <td><b>Product Quantity</b></td>  
                                <td><b>Product Total</b></td>
                              </tr>
                            </thead>
                            <?php
                            $flag = '0';
                              foreach($data as $row){
                                $flag = '1';
                                ?>
                                <tr>
                                  <td><?php echo $row->product_name; ?></td>
                                  <td><?php echo $row->quantity; ?></td>
                                  <td><?php echo $row->subtotal; ?></td>
                                </tr>
                                <?php
                              }

                              if($flag == 0){
                                ?>
                                <h1>Nothing to display. . .</h1>
                                <?php
                              }
                            ?>
                          </table>
                          <a href='<?php echo site_url()?>/CReports/downloadToExcel/<?php echo $str ?>'><button class='ui circular blue icon button' title='Edit product information'>Download to Excel</button></a>
                        </div>
                        <div class='center aligned middle aligned column'>
                            <div id="piechart" style="width: 500; height: 500px;"></div>
                        </div>
                      </div>
                        <div class="row"></div>
                        <div class="three wide column"></div>
                        <div class='ten wide center aligned middle aligned column'>
                          <!-- i display dri ang graph -->
                          <h3 class="ui horizontal divider header">Daily Sales</h3>
                          <div class='ui container'>
                            <div id="curve_chart" ></div>
                          </div>
                        </div>
                        <div class="three wide column"></div>

                        <div class="row"></div>

                        <div class="three wide column"></div>
                        <div class='ten wide center aligned middle aligned column'>
                          <!-- i display dri ang graph -->
                          <h3 class="ui horizontal divider header">Weekly Sales</h3>
                          <div class='ui container'>
                            <div id="curve_chart2"></div>
                          </div>
                        </div>
                        <div class="three wide column"></div>

                        <div class="row"></div>

                        <div class="three wide column"></div>
                        <div class='ten wide center aligned middle aligned column'>
                          <!-- i display dri ang graph -->
                          <h3 class="ui horizontal divider header">Monthly Sales</h3>
                          <div class='ui container'>
                            <div id="curve_chart3" ></div>
                          </div>
                        </div>
                        <div class="three wide column"></div>
                     

                      <div class='row'></div> <!-- row -->
                  </div> <!-- stackable padded grid -->
                  </div>
                  <div class="ui bottom attached tab segment" data-tab="second">
                    <!-- DAILY CHARTS -->

                    <!-- DAILY TABLE -->
                    <!-- DAILY TABLE -->
                    <div class='center aligned middle aligned column'>
                          <table class='ui inverted table'>
                            <thead>
                              <th>PRODUCTS</th>
                            </thead>
                          </table>
                          <!-- display 10 products -->
                          <table class='ui very basic celled compact table'>
                            <thead>
                              <tr> 
                                <td><b>Product Name</b></td>
                                <td><b>Product Quantity</b></td>  
                                <td><b>Product Total</b></td>
                              </tr>
                            </thead>
                            <?php
                            $flag = '0';
                              foreach($datad as $row){
                                $flag = '1';
                                ?>
                                <tr>
                                  <td><?php echo $row->product_name; ?></td>
                                  <td><?php echo $row->quantity; ?></td>
                                  <td><?php echo $row->subtotal; ?></td>
                                </tr>
                                <?php
                              }

                              if($flag == 0){
                                ?>
                                <h1>Nothing to display. . .</h1>
                                <?php
                              }
                            ?>
                          </table>
                          <?php
                            if($flag != 0){
                          ?>
                          <a href='<?php echo site_url()?>/CReports/downloadToExcel/<?php echo 'Daily' ?>'><button class='ui circular blue icon button' title='Edit product information'>Download to Excel</button></a>
                          <?php
                            }
                          ?>
                        </div>
                    <!-- DAILY TABLE -->
                    <!-- DAILY TABLE -->


                    <!-- DAILY CHART -->
                    <!-- DAILY CHART -->
                    <div id="curve_chart4" ></div>
                    <!-- DAILY CHART -->
                    <!-- DAILY CHART -->




                  </div>
                  <div class="ui bottom attached tab segment" data-tab="third">
                    <!-- WEEKLY CHARTS -->

                    <!-- WEEKLY TABLE -->
                    <!-- WEEKLY TABLE -->
                    <div class='center aligned middle aligned column'>
                          <table class='ui inverted table'>
                            <thead>
                              <th>PRODUCTS</th>
                            </thead>
                          </table>
                          <!-- display 10 products -->
                          <table class='ui very basic celled compact table'>
                            <thead>
                              <tr> 
                                <td><b>Product Name</b></td>
                                <td><b>Product Quantity</b></td>  
                                <td><b>Product Total</b></td>
                              </tr>
                            </thead>
                            <?php
                            $flag = '0';
                              foreach($dataw as $row){
                                $flag = '1';
                                ?>
                                <tr>
                                  <td><?php echo $row->product_name; ?></td>
                                  <td><?php echo $row->quantity; ?></td>
                                  <td><?php echo $row->subtotal; ?></td>
                                </tr>
                                <?php
                              }

                              if($flag == 0){
                                ?>
                                <h1>Nothing to display. . .</h1>
                                <?php
                              }
                            ?>
                          </table>
                          <?php
                            if($flag != 0){
                          ?>
                          <a href='<?php echo site_url()?>/CReports/downloadToExcel/<?php echo 'Weekly' ?>'><button class='ui circular blue icon button' title='Edit product information'>Download to Excel</button></a>
                          <?php
                            }
                          ?>
                        </div>
                    <!-- WEEKLY TABLE -->
                    <!-- WEEKLY TABLE -->

                     <!-- WEEKLY CHART -->
                    <!-- WEEKLY CHART -->
                    <div id="curve_chart5" ></div>
                    <!-- WEEKLY CHART -->
                    <!-- WEEKLY CHART -->
                    


                  </div>
                  <div class="ui bottom attached tab segment" data-tab="fourth">
                    <!-- MONTHLY CHARTS -->


                    <!-- MONTHLY TABLE -->
                    <!-- MONTHLY TABLE -->
                    <div class='center aligned middle aligned column'>
                          <table class='ui inverted table'>
                            <thead>
                              <th>PRODUCTS</th>
                            </thead>
                          </table>
                          <!-- display 10 products -->
                          <table class='ui very basic celled compact table'>
                            <thead>
                              <tr> 
                                <td><b>Product Name</b></td>
                                <td><b>Product Quantity</b></td>  
                                <td><b>Product Total</b></td>
                              </tr>
                            </thead>
                            <?php
                            $flag = '0';
                              foreach($datam as $row){
                                $flag = '1';
                                ?>
                                <tr>
                                  <td><?php echo $row->product_name; ?></td>
                                  <td><?php echo $row->quantity; ?></td>
                                  <td><?php echo $row->subtotal; ?></td>
                                </tr>
                                <?php
                              }

                              if($flag == 0){
                                ?>
                                <h1>Nothing to display. . .</h1>
                                <?php
                              }
                            ?>
                          </table>
                          <?php
                            if($flag != 0){
                          ?>
                          <a href='<?php echo site_url()?>/CReports/downloadToExcel/<?php echo 'Monthly' ?>'><button class='ui circular blue icon button' title='Edit product information'>Download to Excel</button></a>
                          <?php
                            }
                          ?>
                        </div>
                    <!-- MONTHLY TABLE -->
                    <!-- MONTHLY TABLE -->

                     <!-- MONTHLY CHART -->
                    <!-- MONTHLY CHART -->
                    <div id="curve_chart6" ></div>
                    <!-- MONTHLY CHART -->
                    <!-- MONTHLY CHART -->



                  </div>

                      
                      
              
              </div> <!-- segment -->
          </div> <!-- segments -->

        <!-- end of content -->
    </div> <!-- padded segment -->        
</div> <!-- pusher -->


<script>
  $('.menu .item')
  .tab()
;
</script>
</body>
</html>
