<div class="pusher">
    <div class='ui hidden divider'></div>
    <div class='ui padded basic segment'>
        <!-- header -->
        <div class='ui basic segment'>
            <h1 class="ui brown dividing header">
                <i class="shop icon"></i>
                <div class="content">
                  REPORTS
                  <div class="sub header">Shows the receipt information of the order</div>
                </div>
            </h1> <!-- header -->
            <div class='ui breadcrumb'>
                <a class='section' href='<?php echo site_url()?>/CUser/viewAdminDashboard'>HOME</a>
                <i class='right arrow icon divider'></i>
                <a class='section' href='<?php echo site_url()?>/CReports/getData'>REPORTS</a>
                <i class='right arrow icon divider'></i>
                <div class='active section'>RECEIPT INFORMATION</div>
            </div> <!-- breadcrumb -->
        </div> <!-- segment -->
        <!-- end of header -->

        <!-- content -->
        <div class='ui segments'>
            <div class='ui basic segment'>
                
                <h5 class='ui header brown ribbon label'><i class='file icon'></i>
                    Receipt Information
                </h5> 
                <div class='ui stackable padded grid'>
                    <div class='row'>
                        <div class='two wide column'></div>
                        <div class='twelve wide column'>
                          <?php foreach($rec_info as $row){ ?>
                            <p>RECEIPT ID: <strong style='font-style: italic;'>000<?php echo $row->receipt_id ?></strong></p>
                            <p>RECEIPT DATE: <strong style='font-style: italic;'><?php echo $row->receipt_date ?></strong></p>

                            <p>CASHIER ID: <?php echo $row->receipt_cashier ?></p>
                            <p>CASHIER: <strong style='font-style: italic;'><?php echo $row->user_last_name;?>, <?php echo $row->user_first_name;?></strong></p>
                            <div class='ui hidden divider'></div>
                            <table class='ui very basic table' id="all">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($values as $row){ ?>
                                  <tr>
                                      <td><?php echo $row->product_name;?></td>
                                      <td><?php echo $row->receipt_item_quantity; ?></td>
                                      <td><?php echo $row->receipt_item_subtotal; ?></td>
                                  </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <div class='ui hidden divider'></div>
                            <p style="float: right;">TOTAL (P): <strong style='font-style: italic;'><?php echo '₱ '.$row->receipt_total; ?>.00</strong></p>
                           <!--  <p>CASH (P): <strong style='font-style: italic;'>200.00</strong></p>
                            <p>CHANGE (P): <strong style='font-style: italic;'>200.00</strong></p> -->
                            <div class='ui hidden divider'></div>
                        </div>
                        <?php }?>
                        <div class='two wide column'></div>
                    </div>
                    <div class='row'></div> <!-- row -->
                </div> <!-- ui grid -->
            </div> <!-- segment -->
        </div> <!-- segments -->
    </div> <!-- segment -->
</div> <!-- pusher -->


</body>
</html>
