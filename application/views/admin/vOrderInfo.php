<div class="pusher">
    <div class='ui hidden divider'></div>
    <div class='ui padded basic segment'>
        <!-- header -->
        <div class='ui basic segment'>
            <h1 class="ui brown dividing header">
                <i class="shop icon"></i>
                <div class="content">
                  ORDERS
                  <div class="sub header">Shows the order information</div>
                </div>
            </h1> <!-- header -->
            <div class='ui breadcrumb'>
                <a class='section' href='<?php echo site_url()?>admin/dashboard'>HOME</a>
                <i class='right arrow icon divider'></i>
                <a class='section' href='<?php echo site_url()?>admin/orders'>ORDERS</a>
                <i class='right arrow icon divider'></i>
                <div class='active section'>ORDER INFORMATION</div>
            </div> <!-- breadcrumb -->
        </div> <!-- segment -->
        <!-- end of header -->

        <!-- content -->
        <div class='ui segments'>
            <div class='ui basic segment'>
                <?php if (isset($orders)) { ?>
                    <?php foreach($orders as $o) {} ?>  
                <h5 class='ui header brown ribbon label'><i class='info icon'></i>
                    Orders Information
                </h5> 
                <div class='ui stackable padded grid'>
                    <div class='row'>
                        <div class='two wide column'></div>
                        <div class='twelve wide column'>
                            <p>ORDER ID: <strong style='font-style: italic;'><?php echo $o->ordered_id; ?></strong></p>
                            <?php  $date = date_create_from_format('Y-m-d H:i:s', $o->ordered_time); ?>
                            <p>ORDER DATE: <strong style='font-style: italic;'><?php echo $date->format('F d, Y g:i a'); ?></strong></p>

                            <!-- <p>CASHIER: <strong style='font-style: italic;'><?php echo $o->ordered_guest_id; ?></strong></p> -->
                            <div class='ui hidden divider'></div> 
                 
                <?php if (isset($items)) { ?>
                      
                            <table class='ui very basic table'>
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Unit Price</th>
                                        <th>Product Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0; ?>
                                    <?php foreach($items as $i) { ?>
                                        <tr>
                                            <td><?php echo $i->product_name; ?></td>
                                            <td>₱ <?php echo $i->product_price; ?>.00</td>
                                            <td><?php echo $i->order_item_qty; ?></td>
                                            <td>₱ <?php echo $i->order_item_subtotal; ?>.00</td>
                                            <?php $total += $i->order_item_subtotal ; ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class='ui hidden divider'></div>
                            <p style="float: right;">TOTAL (P): <strong style='font-style: italic;'><?php echo '₱ '.$total; ?>.00</strong></p>
                           <!--  <p>CASH (P): <strong style='font-style: italic;'>200.00</strong></p>
                            <p>CHANGE (P): <strong style='font-style: italic;'>200.00</strong></p> -->
                            <div class='ui hidden divider'></div>
                        </div>
                        <div class='two wide column'></div>
                    </div>
                    <div class='row'></div> <!-- row -->
                </div> <!-- ui grid -->
            </div> <!-- segment -->
        </div> <!-- segments -->
    </div> <!-- segment -->
</div> <!-- pusher -->
<?php } ?>
<?php } ?>

</body>
</html>