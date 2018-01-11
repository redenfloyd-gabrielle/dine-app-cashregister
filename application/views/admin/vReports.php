    <div class='ui basic segment'>
        <h1 class="ui brown dividing header">
            <i class="dashboard icon"></i>
            <div class="content">
              DASHBOARD
              <div class="sub header">Shows the dashboard</div>
            </div>
        </h1> <!-- header -->
        <div class='ui breadcrumb'>
            <a class='section' href='<?php echo site_url()?>/CUser/viewAdminDashboard'>HOME</a>
            <i class='right arrow icon divider'></i>
            <div class='active section'>REPORTS</div>
        </div> <!-- breadcrumb -->
    </div> <!-- segment -->
   
<div align = "center">
	<!-- <form class='ui form' method='POST' action='<?php echo site_url()?>/CReports/downloadToExcel'> -->
		<table>
	 		<tr>
	 			<td><b>Product Name</b></td>
	 			<td><b>Product Quantity</b></td>	
	 			<td><b>Product Total</b></td>
	 		</tr>

 		<?php
 			foreach($data as $row){
 				?>
 				<tr>
 					<td><?php echo $row->product_name; ?></td>
 					<td><?php echo $row->quantity; ?></td>
 					<td><?php echo $row->subtotal; ?></td>
 				</tr>
 				<?php
 			}
 		?>
 	</table>

 	<a href='<?php echo site_url()?>/CReports/downloadToExcel'><button class='ui circular blue icon button' title='Edit product information'><i class='pencil icon'></i>Edit item</button></a> <!-- Edit product information -->
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
          title: 'Number of Users'
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
