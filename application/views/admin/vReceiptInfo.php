

<div class="container"> 
<table class='ui sortable stackable celled table' id="all">
                <thead>
                  <tr> 
                    <td><b>prod name</b></td>
                    <td><b>prod qty</b></td>  
                    <td><b>prod subtotal</b></td>
                   
                  </tr>
                </thead>
                <?php
                  foreach($values as $row){
                    ?>
                    <tr>
                      <td><?php echo $row->product_name;?></td>
                      <td><?php echo $row->receipt_item_quantity; ?></td>
                      <td><?php echo $row->receipt_item_subtotal; ?></td>
                     
                    </tr>
                    <?php
                  }
                ?>
                <?php
                	foreach($rec_info as $row){
                		?>
                		<br>
                		<br>
                		<br>
                		<br>
                		<br>
                		<h1>Total: <?php echo $row->receipt_total ?></h1>
                		<h1>Cashier First Name: <?php echo $row->user_first_name ?></h1>
                		<h1>Cashier Last Name: <?php echo $row->user_last_name ?></h1>
                <?php
                	}
                ?>
              </table>
              </div>