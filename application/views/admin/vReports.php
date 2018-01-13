<div class="pusher">
    <div class='ui hidden segment'></div>
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

        <!-- content -->
        <div class='ui segments'>
            <div class='ui basic segment'> 
                <h5 class='ui header brown ribbon label'><i class='bar chart icon'></i>Reports</h5>
                <div class='ui stackable padded grid'>
                    
                    <!-- DIRI MAG START ANG CONTENTS SA REPORTS PAGE -->
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
                              <th>Product Name</th>
                              <th>Product Price</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Dummy</td>
                              <td>P 129</td>
                            </tr>
                            <tr>
                              <td>Dummy</td>
                              <td>P 150</td>
                            </tr>
                          </tbody>
                        </table>
                        <a href='<?php echo site_url()?>/CReports/downloadToExcel'><button class='ui circular blue icon button' title='Edit product information'>Download to Excel</button></a>
                      </div>
                      <div class='center aligned middle aligned column'>
                        <table class='ui inverted table'>
                          <thead>
                            <th>ORDERS</th>
                          </thead>
                        </table>
                        <!-- display 10 products -->
                        <table class='ui very basic celled compact table'>
                          <thead>
                            <tr>
                              <th>Order ID</th>
                              <th>Order Date</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Dummy</td>
                              <td>P 129</td>
                              <td>P 129</td>
                            </tr>
                            <tr>
                              <td>Dummy</td>
                              <td>P 150</td>
                              <td>P 129</td>
                            </tr>
                          </tbody>
                        </table>
                        <a href='<?php echo site_url()?>/CReports/downloadToExcel'><button class='ui circular blue icon button' title='Edit product information'>Download to Excel</button></a>
                      </div>
                    </div>
                    <!-- if isa ka graph/chart in one row -->
                    <div class='row'>
                      <div class='center aligned middle aligned column'>
                        <!-- i display dri ang graph -->
                      </div>
                    </div>

                    <!-- PLEASE KO DELETE SA DILI GAMITON -->

                    <!-- if duha ka graphs/charts in one row -->
                    <div class='two column row'>
                      <div class='center aligned middle aligned column'>
                        <!-- i display dri ang graph -->
                      </div>
                      <div class='center aligned middle aligned column'>
                        <!-- i display dri ang graph -->
                      </div>
                      <div class='center aligned middle aligned column'>
                        <!-- i display dri ang graph -->
                      </div>
                    </div>

                    <!-- if tulo ka graphs/charts in one row -->
                    <div class='three column row'>
                      <div class='center aligned middle aligned column'>
                        <!-- i display dri ang graph -->
                      </div>
                      <div class='center aligned middle aligned column'>
                        <!-- i display dri ang graph -->
                      </div>
                      <div class='center aligned middle aligned column'>
                        <!-- i display dri ang graph -->
                      </div>
                    </div>

                    <!-- DIRI MAG END ANG CONTENTS SA REPORTS PAGE -->

                    <div class='row'></div> <!-- row -->

                    <!-- pagination -->
                    <!-- <div class='two column row'>
                        <div class='middle aligned column'>
                            Showing 1 to 5 of 5 entries.
                        </div>
                        <div class='right aligned column'>
                            <div class='ui pagination menu'>
                                <a class='previous item'>Previous</a>
                                <a class='active item'>1</a>
                                <a class='next item' >Next</a>
                            </div>
                        </div>
                    </div> --> <!-- two column row -->

                    <!-- end of pagination -->
                </div> <!-- stackable padded grid -->
            
            </div> <!-- segment -->
        </div> <!-- segments -->

        <!-- end of content -->
    </div> <!-- padded segment -->        
</div> <!-- pusher -->











<div align = "center">
	<!-- <form class='ui form' method='POST' action='<?php echo site_url()?>/CReports/downloadToExcel'> -->
  <div class='row'>
		<table class='ui sortable stackable celled table'>
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
 </div>

 	<a href='<?php echo site_url()?>/CReports/downloadToExcel'><button class='ui circular blue icon button' title='Edit product information'>Download to Excel</button></a> <!-- Edit product information -->
 	 <!-- <button class='ui submit brown button' type='submit'>Download to Excel</button>
 	</form> -->
</div>

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
<div align = "center">
	<div id="piechart" style="width: 1000px; height: 500px;"></div>
</div>
</body>
</html>
