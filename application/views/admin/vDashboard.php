<div class="pusher">
    <div class='ui hidden divider'></div>
    <div class='ui padded basic segment'>
        <!-- header -->
        <div class='ui basic segment'>
            <h1 class="ui brown dividing header">
                <i class="dashboard icon"></i>
                <div class="content">
                  DASHBOARD
                  <div class="sub header">Shows the dashboard</div>
                </div>
            </h1> <!-- header --> 
            <div class='ui breadcrumb'>
                <a class='section' href='<?php echo site_url()?>admin/dashboard'>HOME</a>
                <i class='right arrow icon divider'></i>
                <div class='active section'>DASHBOARD</div>
            </div> <!-- breadcrumb -->
        </div> <!-- segment -->
        <!-- end of header -->
 

        <!-- content -->
        <div class='ui basic segment'> 
            <div class='ui labeled three icon item menu'>
                <a href='<?php echo site_url()?>admin/categories' class='item'><i class='food icon'></i>PRODUCTS</a>
                <a href='<?php echo site_url()?>admin/orders' class='item'><i class='shop icon'></i>ORDERS</a>
                <a href='<?php echo site_url()?>admin/reports' class='item'><i class='calculator icon'></i>REPORTS</a>
            </div> 
            <div class="ui grid">
                
                <div class="five wide column">
                    <div class="ui segment left aligned">
                        <div class="ui two column grid">
                            <div class="center aligned middle aligned column">
                                <div class="ui statistic">
                                    <div class="value">
                                        <?php 
                                            if (isset($count)) {
                                                foreach ($count as $c) {}
                                                    echo $c->orders;
                                            } 
                                        ?>  
                                    </div>
                                    <div class='label'>Orders</div>
                                </div>
                            </div>
                            <div class="right aligned middle aligned column">
                                <i class='teal huge shopping cart icon'></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="five wide column">
                    <div class="ui segment left aligned">
                        <div class="ui two column grid">
                            <div class="center aligned middle aligned column">
                                <div class="ui statistic">
                                    <div class="value">
                                        <?php 
                                            if (isset($product)) {
                                                foreach ($product as $prod) {}
                                                    echo $prod->products;
                                            } 
                                        ?>
                                    </div>
                                    <div class='label'>PRODUCTS</div>
                                </div>
                            </div>
                            <div class="right aligned middle aligned column">
                                <i class='purple huge food icon'></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="six wide column">
                    <div class="ui segment left aligned">
                        <div class="ui two column grid">
                            <div class="center aligned middle aligned column">
                                <div class="ui statistic">
                                    <div class="value">
                                        <?php 
                                             if (isset($sales)) {
                                                foreach ($sales as $s) {}
                                                     echo number_format($s->total,2);
                                             } 
                                        ?>    
                                    </div>
                                    <div class='label'>TOTAL SALES</div>
                                </div>
                            </div>
                            <div class="middle aligned column">
                                <img class="ui right floated image" style="height: 75px; width: 85px;" src="<?php echo base_url('assets/images/PhilippinePeso.svg.png')?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="five wide column">
                    <div class="ui segment left aligned">
                        <div class="ui two column grid">
                            <div class="center aligned middle aligned column">
                                <div class="ui statistic">
                                    <div class="value">
                                        <?php 
                                            if (isset($daily)) {
                                                foreach ($daily as $d) {}
                                                echo number_format($d->total,2);
                                            } 
                                        ?>
                                    </div>
                                    <div class='label'>DAILY SALES</div>
                                </div>
                            </div>
                            <div class="middle aligned column">
                                <img class="ui right floated image" style="height: 75px; width: 85px;" src="<?php echo base_url('assets/images/PhilippinePeso.svg.png')?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="five wide column">
                    <div class="ui segment left aligned">
                        <div class="ui two column grid">
                            <div class="center aligned middle aligned column">
                                <div class="ui statistic">
                                    <div class="value">
                                        <?php 
                                            if (isset($weekly)) {
                                                foreach ($weekly as $w) {}
                                                echo number_format($w->total,2);
                                            } 
                                        ?>
                                    </div>
                                    <div class='label'>WEEKLY SALES</div>
                                </div>
                            </div>
                            <div class="middle aligned column">
                                <img class="ui right floated image" style="height: 75px; width: 85px;" src="<?php echo base_url('assets/images/PhilippinePeso.svg.png')?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="six wide column">
                    <div class="ui segment left aligned">
                        <div class="ui two column grid">
                            <div class="center aligned middle aligned column">
                                <div class="ui statistic">
                                    <div class="value">
                                        <?php 
                                            if (isset($monthly)) {
                                                foreach ($monthly as $w) {}
                                                echo number_format($w->total,2);
                                            } 
                                        ?> 
                                    </div>
                                    <div class='label'>MONTHLY SALES</div>
                                </div>
                            </div>
                            <div class="middle aligned column">
                                <img class="ui right floated image" style="height: 75px; width: 85px;" src="<?php echo base_url('assets/images/PhilippinePeso.svg.png')?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui padded grid">
                <div class="row"></div>
                <div class="two column row">
                    <div class="column">
                        <h3 class="ui horizontal divider header"><i class="wait icon"></i> Pending Orders</h3>
                        <?php if(isset($pending)){?>
                        <table class="ui orange table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Total</th>
                                    <th>Ref. No.</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($pending as $item){?>
                                    <?php $qr = ($item->ordered_qr_code == 0)? 'NOT APPLICABLE' : $item->ordered_qr_code; ?>
                                <tr>
                                    <td><?php echo $item->ordered_id; ?></td>
                                    <td><?php echo '₱ '.$item->ordered_total.'.00'; ?></td>
                                    <td><?php echo $qr; ?></td>
                                    <td>
                                        <?php if($qr == 'NOT APPLICABLE' ) {?>
                                        <a class="disabled" href='<?php echo site_url()?>admin/order/<?php echo $item->ordered_id?>' >
                                            <div class='ui basic blue icon button disabled' data-tooltip="View order">
                                                <i class='unhide icon'></i>
                                            </div>
                                        </a> <!-- Edit product information -->
                                        <?php } else {?>
                                        <a href='<?php echo site_url()?>admin/order/<?php echo $item->ordered_id?>' >
                                            <div class='ui basic blue icon button' data-tooltip="View order">
                                                <i class='unhide icon'></i>
                                            </div>
                                        </a> <!-- Edit product information -->
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <a href="<?php echo site_url()?>admin/orders" class="ui button">View pending orders</a>
                        <?php }else{ 
                            echo "<p class='notice'>There are no pending orders for today.</p>";
                            } ?>
                    </div>
                    <div class="column">
                        <h3 class="ui horizontal divider header"><i class="check icon"></i> Scanned Orders</h3>
                        <?php if(isset($scanned)){?>
                        <table class="ui green table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Total</th>
                                    <th>Ref. No.</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($scanned as $item){?>
                                    <?php $qr = ($item->ordered_qr_code == 0)? 'NOT APPLICABLE' : $item->ordered_qr_code; ?>
                                <tr>
                                    <td><?php echo $item->ordered_id; ?></td>
                                    <td><?php echo '₱ '.$item->ordered_total.'.00'; ?></td>
                                    <td><?php echo $qr; ?></td>
                                    <td>
                                        <a href='<?php echo site_url()?>admin/order/<?php echo $item->ordered_id?>'>
                                            <div class='ui basic blue icon button'>
                                                <i class='unhide icon'></i>
                                            </div>
                                        </a> <!-- Edit product information -->
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <a href="<?php echo site_url()?>admin/orders" class="ui button">View scanned orders</a>
                        <?php }else{ 
                            echo "<p class='notice'>There are no scanned orders at the moment.</p>";
                            } ?>
                       
                    </div>
                </div>
                <div class="row"></div>

            </div> <!-- ui grid -->
        </div> <!-- segment -->
        <!-- end of content -->
</div> <!-- pusher -->

</body>
</html>
<script type="text/javascript">
    $(document).on('click','.disabled',function(e) {
        e.preventDefault();
    });
</script>
