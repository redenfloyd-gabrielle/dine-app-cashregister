<div class="pusher">
    <div class='ui hidden divider'></div>
    <div class='ui padded basic segment'>
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
                <a class='section' href='<?php echo site_url()?>admin/dashboard'>HOME</a>
                <i class='right arrow icon divider'></i>
                <div class='active section'>REPORTS</div>
            </div> <!-- breadcrumb -->
        </div> <!-- segment -->
        <!-- end of header -->


        <!-- content -->
    <div class='ui segments'>
      <div class='ui basic segment'> 
        <h5 class='ui header brown ribbon label'><i class='bar chart icon'></i>Reports</h5>
        <div class="ui hidden divider"></div>
        <div class="ui top attached tabular menu">
          <a class="active item" data-tab="first" id="first">Overall</a>
          <a class="item" data-tab="second" id="second">Daily</a>
          <a class="item" data-tab="third" id="third" >Weekly</a>
          <a class="item" data-tab="fourth" id="fourth">Monthly</a>
        </div>

        <div class="ui bottom attached active tab segment" data-tab="first" id='tab1'>
          <div class="ui grid">
            <div class=" eight wide column">
              <h3 class="ui grey dividing header">
                  <div class="content">
                    SOLD PRODUCTS (OVERALL)
                    <!-- <div class="sub header">Shows the list of orders</div> -->
                  </div>
              </h3> <!-- header -->
              <div class="ui hidden divider"></div>
              <table class='ui sortable stackable celled table' id="all">
                <thead>
                  <tr> 
                    <td><b>Product Name</b></td>
                    <td><b>Product Quantity</b></td>  
                    <td><b>Product Total</b></td>
                  </tr>
                </thead>
                <?php
                  foreach($data as $row){
                    ?>
                    <tr>
                      <td><?php echo $row->product_name; ?></td>
                      <td><?php echo $row->quantity; ?></td>
                      <td>₱ <?php echo $row->subtotal; ?>.00</td>

                    </tr>
                    <?php
                  }
                ?>
              </table>
            </div>
            <div class="eight wide column">
              <div id="piechart" style="width: 500; height: 500px;"></div>
            </div>

            <div class=" sixteen wide column">
              <h3 class="ui grey dividing header">
                  <div class="content">
                    SALES (OVERALL)
                    <!-- <div class="sub header">Shows the list of orders</div> -->
                  </div>
              </h3> <!-- header -->
              <div class="ui hidden divider"></div>
              <table class='ui sortable stackable celled table' id="receipt_all">
                <thead>
                  <tr> 
                    <td><b>Receipt ID</b></td>
                    <td><b>Receipt Date</b></td>  
                    <td><b>Receipt Total</b></td>
                    <td><b>Cashier</b></td>
                    <td><b>Actions</b></td>
                  </tr>
                </thead>
                <?php
                  foreach($receipt as $row){
                    ?>
                    <tr>
                      <td><?php echo $row->receipt_id; ?></td>
                      <td><?php echo $row->receipt_date?></td>
                      <td>₱ <?php echo $row->receipt_total; ?>.00</td>
                      <td><?php echo $row->receipt_cashier; ?></td>
                      <td><a href="<?php echo site_url()?>admin/reports/receipt/<?php echo $row->receipt_id?>"><button class="ui inverted blue icon button">
                                        <i class="unhide icon"></i>
                                    </button></a></td>
                    </tr>
                    <?php
                  }
                ?>
              </table>
            </div>
            <div class="row">
              <div class="ui divider"></div>
              <div class="twelve wide column"></div>
              <div class="six wide column">
                <?php
                    foreach($overall as $row){
                      ?>
                      <h3 class="ttalsales">TOTAL SALES: <?php echo $row->total?></h3>
                      <?php
                    }
                ?>
              </div>

            </div>

            <div class="row"></div>

            <div class="sixteen wide center aligned middle aligned column">
              <div class="ui grid">
                <div class="four wide column"></div>
                <div class="left aligned eight wide column">
                  <h3 class="ui grey dividing header">
                    <div class="content">
                      DAILY SALES
                    </div>
                  </h3> <!-- header -->
                </div>
                <div class="four wide column"></div>
              </div>
                  
              <div class='ui container'>
                <div id="curve_chart" align="center"></div>
              </div>
            </div>
            <div class="sixteen wide center aligned middle aligned column">
              <div class="ui grid">
                <div class="four wide column"></div>
                <div class="left aligned eight wide column">
                  <h3 class="ui grey dividing header">
                    <div class="content">
                      WEEKLY SALES
                    </div>
                  </h3> <!-- header -->
                </div>
                <div class="four wide column"></div>
              </div>
              <div class='ui container'>
                <div id="curve_chart2" align="center"></div>
              </div>
            </div>
            <div class="sixteen wide center aligned middle aligned column">
              <div class="ui grid">
                <div class="four wide column"></div>
                <div class="left aligned eight wide column">
                  <h3 class="ui grey dividing header">
                    <div class="content">
                      MONTHLY SALES
                    </div>
                  </h3> <!-- header -->
                </div>
                <div class="four wide column"></div>
              </div>
              <div class='ui container'>
                <div id="curve_chart3" align="center"></div>
              </div>
            </div>
          </div>
      </div>

      <div class="ui bottom attached tab segment" data-tab="second" id='tab2'>
        <div class="ui grid">
          <div class="sixteen wide right aligned middle aligned column">
            <form method="POST" action="<?php echo site_url()?>report/daily">
              <input type="date" id="myDate" name="myDate">
              <input class="ui mini brown button" type="submit" value="Select">
            </form>
          </div>
          <div class="eight wide column">
            <h3 class="ui grey dividing header">
                <div class="content">
                  SOLD PRODUCTS (DAILY)
                  <?php
                    if($today != 0){
                      $var = new DateTime($today);
                      echo date_format($var,'F d, Y');
                    }
                  ?>
                  <!-- <div class="sub header">Shows the list of orders</div> -->
                </div>
            </h3> <!-- header -->
            <div class="ui hidden divider"></div>
            <table class='ui sortable stackable celled table' id="daily">
              <thead>
                <tr> 
                  <td><b>Product Name</b></td>
                  <td><b>Product Quantity</b></td>  
                  <td><b>Product Total</b></td>
                </tr>
              </thead>
              <?php
                foreach($datad as $row){
                  ?>
                  <tr>
                    <td><?php echo $row->product_name; ?></td>
                    <td><?php echo $row->quantity; ?></td>
                    <td>₱ <?php echo $row->subtotal; ?>.00</td>
                  </tr>
                  <?php
                }
              ?>
            </table>
          </div>
          <div class="eight wide column">
            <h3 class="ui grey dividing header">
                <div class="content">
                  DAILY SALES
                  <!-- <div class="sub header">Shows the list of orders</div> -->
                </div>
            </h3> <!-- header -->
            <div id="curve_chart4"></div>
          </div>


            <div class="sixteen wide column">
              <h3 class="ui grey dividing header">
                  <div class="content">
                    SALES (DAILY)
                    <!-- <div class="sub header">Shows the list of orders</div> -->
                  </div>
              </h3> <!-- header -->
              <div class="ui hidden divider"></div>
              <table class='ui sortable stackable celled table' id="receipt_day">
                <thead>
                  <tr> 
                    <td><b>Receipt ID</b></td>
                    <td><b>Receipt Date</b></td>  
                    <td><b>Receipt Total</b></td>
                    <td><b>Cashier</b></td>
                    <td><b>Actions</b></td>
                  </tr>
                </thead>
                <?php
                  foreach($receipt_day as $row){
                    ?>
                    <tr>
                      <td><?php echo $row->receipt_id; ?></td>
                      <td><?php echo $row->receipt_date?></td>
                      <td>₱ <?php echo $row->receipt_total; ?>.00</td>
                      <td><?php echo $row->receipt_cashier; ?></td>
                      <td><a href="<?php echo site_url()?>admin/reports/receipt/<?php echo $row->receipt_id?>"><button class="ui inverted blue icon button">
                                        <i class="unhide icon"></i>
                                    </button></a></td>
                    </tr>
                    <?php
                  }
                ?>
              </table>
            </div>
            <?php
                foreach($day as $row){
                  ?>
                  <h3>Total Sales of The Day: ₱ <?php echo $row->total; ?>.00</h3>
                  <?php
                }
            ?>
            <div class="row"></div>





        </div>
      </div>

      <div class="ui bottom attached tab segment" data-tab="third" id='tab3'>
        <div class="ui two column grid">
          <div class="column">
            <h3 class="ui grey dividing header">
                <div class="content">
                  SOLD PRODUCTS (WEEKLY)
                  <!-- <div class="sub header">Shows the list of orders</div> -->
                </div>
            </h3> <!-- header -->
            <div class="ui hidden divider"></div>
            <table class='ui sortable stackable celled table' id="weekly">
              <thead>
                <tr> 
                  <td><b>Product Name</b></td>
                  <td><b>Product Quantity</b></td>  
                  <td><b>Product Total</b></td>
                </tr>
              </thead>
              <?php
                foreach($dataw as $row){
                  ?>
                  <tr>
                    <td><?php echo $row->product_name; ?></td>
                    <td><?php echo $row->quantity; ?></td>
                    <td>₱ <?php echo $row->subtotal; ?>.00</td>
                  </tr>
                  <?php
                }
              ?>
            </table>
          </div>
          <div class="column">
            <h3 class="ui grey dividing header">
                <div class="content">
                  WEEKLY SALES
                  <!-- <div class="sub header">Shows the list of orders</div> -->
                </div>
            </h3> <!-- header -->
            <div id="curve_chart5"></div>
          </div>


            <div class=" sixteen wide column">
              <h3 class="ui grey dividing header">
                  <div class="content">
                    SALES (WEEKLY)
                    <!-- <div class="sub header">Shows the list of orders</div> -->
                  </div>
              </h3> <!-- header -->
              <div class="ui hidden divider"></div>
              <table class='ui sortable stackable celled table' id="receipt_week">
                <thead>
                  <tr> 
                    <td><b>Receipt ID</b></td>
                    <td><b>Receipt Date</b></td>  
                    <td><b>Receipt Total</b></td>
                    <td><b>Cashier</b></td>
                    <td><b>Actions</b></td>
                  </tr>
                </thead>
                <?php
                  foreach($receipt_week as $row){
                    ?>
                    <tr>
                      <td><?php echo $row->receipt_id; ?></td>
                      <td><?php echo $row->receipt_date?></td>
                      <td>₱ <?php echo $row->receipt_total; ?>.00</td>
                      <td><?php echo $row->receipt_cashier; ?></td>
                      <td><a href="<?php echo site_url()?>admin/reports/receipt/<?php echo $row->receipt_id?>"><button class="ui inverted blue icon button">
                                        <i class="unhide icon"></i>
                                    </button></a></td>
                    </tr>
                    <?php
                  }
                ?>
              </table>
            </div>
            <?php
                foreach($weekly as $row){
                  ?>
                  <h3>Total Sales of The Week: ₱ <?php echo $row->total; ?>.00</h3>
                  <?php
                }
            ?>
            <div class="row"></div>




        </div>
      </div>

      <div class="ui bottom attached tab segment" data-tab="fourth" id='tab4'>
        <div class="ui two column grid">
          <div class="column">
            <h3 class="ui grey dividing header">
                <div class="content">
                  SOLD PRODUCTS (MONTHLY)
                  <!-- <div class="sub header">Shows the list of orders</div> -->
                </div>
            </h3> <!-- header -->
            <div class="ui hidden divider"></div>
            <table class='ui sortable stackable celled table' id="monthly">
              <thead>
                <tr> 
                  <td><b>Product Name</b></td>
                  <td><b>Product Quantity</b></td>  
                  <td><b>Product Total</b></td>
                </tr>
              </thead>
              <?php
                foreach($datam as $row){
                  ?>
                  <tr>
                    <td><?php echo $row->product_name; ?></td>
                    <td><?php echo $row->quantity; ?></td>
                    <td>₱ <?php echo $row->subtotal; ?>.00</td>
                  </tr>
                  <?php
                }
              ?>
            </table>
          </div>
          <div class="column">
            <h3 class="ui grey dividing header">
                <div class="content">
                  MONTHLY SALES
                  <!-- <div class="sub header">Shows the list of orders</div> -->
                </div>
            </h3> <!-- header -->
            <div id="curve_chart6"></div>
          </div>



            <div class=" sixteen wide column">
              <h3 class="ui grey dividing header">
                  <div class="content">
                    SALES (MONTHLY)
                    <!-- <div class="sub header">Shows the list of orders</div> -->
                  </div>
              </h3> <!-- header -->
              <div class="ui hidden divider"></div>
              <table class='ui sortable stackable celled table' id="receipt_month">
                <thead>
                  <tr> 
                    <td><b>Receipt ID</b></td>
                    <td><b>Receipt Date</b></td>  
                    <td><b>Receipt Total</b></td>
                    <td><b>Cashier</b></td>
                    <td><b>Actions</b></td>
                  </tr>
                </thead>
                <?php
                  foreach($receipt_month as $row){
                    ?>
                    <tr>
                      <td><?php echo $row->receipt_id; ?></td>
                      <td><?php echo $row->receipt_date?></td>
                      <td>₱ <?php echo $row->receipt_total; ?>.00</td>
                      <td><?php echo $row->receipt_cashier; ?></td>
                      <td><a href="<?php echo site_url()?>admin/reports/receipt/<?php echo $row->receipt_id?>"><button class="ui inverted blue icon button">
                                        <i class="unhide icon"></i>
                                    </button></a></td>
                    </tr>
                    <?php
                  }
                ?>
              </table>
            </div>
            <?php
                foreach($monthly as $row){
                  ?>
                  <h3>Total Sales of The month: ₱ <?php echo $row->total; ?>.00</h3>
                  <?php
                }
            ?>
            <div class="row"></div>





        </div>
      </div>

      





        

      </div> <!-- segment -->
    </div> <!-- segments -->

        <!-- end of content -->
  </div> <!-- padded segment -->        
</div> <!-- pusher -->

<script type="text/javascript">
  $(document).ready(function(){  
        <?php if(isset($script)){
            echo $script;
        } ?>
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
      $('.menu .item').tab();
        var flag=0;
        $(document).on('click', '#third', function(){
            <?php $now = new DateTime(NULL, new DateTimeZone('Asia/Manila')); ?>
            if(flag==0){
                $('#weekly').DataTable({
                    // "ajax" : {
                    //     url: "<?php echo site_url();?>/CReports/getWeekly",
                    //     type : 'GET',
                    // },
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2]
                            },
                            messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?> <?php echo $this->session->userdata['userSession']['user_last_name'];?>',
                            title: 'Weekly Products Sales_<?php echo $now->format('Y-m-d'); ?>'
                        },

                        {
                            extend: 'pdfHtml5',
                            customize: function ( doc ) {
                              doc.content.splice( 1, 0, {
                                margin: [ 0, 0, 0, 12 ],
                                alignment: 'center',
                                image: 'data:image/jpeg;base64,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'
                              } );
                            },
                            exportOptions: {
                                columns: [0, 1, 2]
                            },
                            title: 'Dine: Mamengs Seafood & BBQ Hauz',
                            messageTop: 'Weekly Products Sales_<?php echo $now->format('Y-m-d'); ?>_<?php echo $this->session->userdata['userSession']['user_first_name'];?> '
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2]
                            },
                            messageTop: 'This PDF contains orders from dine-app.net',
                            messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?> <?php echo $this->session->userdata['userSession']['user_last_name'];?>',
                            title: 'Weekly Products Sales_<?php echo $now->format('Y-m-d'); ?>'
                        }
                    ]
                });
                flag++;
            }
        });

        
    } );
    $(document).ready(function() {
        <?php $now = new DateTime(NULL, new DateTimeZone('Asia/Manila')); ?>
        $('#all').DataTable({
            // "ajax" : {
            //     url: "<?php echo site_url();?>/CReports/getAll",
            //     type : 'GET',
            // },
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2]
                    },
                    messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?> <?php echo $this->session->userdata['userSession']['user_last_name'];?>',
                    title: 'All Products Sales_<?php echo $now->format('Y-m-d'); ?>'
                },
                {
                    extend: 'pdfHtml5',
                    customize: function ( doc ) {
                              doc.content.splice( 1, 0, {
                                margin: [ 0, 0, 0, 12 ],
                                alignment: 'center',
                                image: 'data:image/jpeg;base64,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'
                              } );
                            },
                    exportOptions: {
                        columns: [0, 1, 2]
                    },
                    title: 'Dine: Mamengs Seafood & BBQ Hauz',
                    messageTop: 'All Products Sales_<?php echo $now->format('Y-m-d'); ?>_<?php echo $this->session->userdata['userSession']['user_first_name'];?> '
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2]
                    },
                    messageTop: 'This PDF contains all orders from dine-app.net',
                    title: 'All Products Sales_<?php echo $now->format('Y-m-d'); ?>',
                    messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?> <?php echo $this->session->userdata['userSession']['user_last_name'];?>'
                }
            ]
            
        });
    } );

    $(document).ready(function() {
        var flag=0;
        $(document).on('click', '#second', function(){
            <?php $now = new DateTime(NULL, new DateTimeZone('Asia/Manila')); ?>
            if(flag==0){
                $('#daily').DataTable({
                    // "ajax" : {
                    //     url: "<?php echo site_url();?>/CReports/getDaily",
                    //     type : 'GET',
                    // },
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2]
                            },
                            messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?> <?php echo $this->session->userdata['userSession']['user_last_name'];?>',
                            title: 'Daily Product Sales_<?php echo $today; ?>'
                        },
                        {
                            extend: 'pdfHtml5',
                            customize: function ( doc ) {
                              doc.content.splice( 1, 0, {
                                margin: [ 0, 0, 0, 12 ],
                                alignment: 'center',
                                image: 'data:image/jpeg;base64,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'
                              } );
                            },
                            exportOptions: {
                                columns: [0, 1, 2]
                            },
                            title: 'Dine: Mamengs Seafood & BBQ Hauz',
                            messageTop: 'Daily Product Sales_<?php echo $today; ?>_<?php echo $this->session->userdata['userSession']['user_first_name'];?> '
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2]
                            },
                            messageTop: 'This PDF contains orders from dine-app.net',
                            messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?> <?php echo $this->session->userdata['userSession']['user_last_name'];?>',
                            title: 'Daily Product Sales_<?php echo $today; ?>'
                        }
                    ]
                });
                flag++;
            }
        });
    } );

    $(document).ready(function() {
        var flag=0;
        $(document).on('click', '#fourth', function(){
            <?php $now = new DateTime(NULL, new DateTimeZone('Asia/Manila')); ?>
            if(flag==0){
                $('#monthly').DataTable({
                    // "ajax" : {
                    //     url: "<?php echo site_url();?>/CReports/getDaily",
                    //     type : 'GET',
                    // },
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2]
                            },
                            messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?> <?php echo $this->session->userdata['userSession']['user_last_name'];?>',
                            title: 'Monthly Product Sales_<?php echo $now->format('Y-m-d'); ?>'
                        },
                        {
                            extend: 'pdfHtml5',
                            customize: function ( doc ) {
                              doc.content.splice( 1, 0, {
                                margin: [ 0, 0, 0, 12 ],
                                alignment: 'center',
                                image: 'data:image/jpeg;base64,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'
                              } );
                            },
                            exportOptions: {
                                columns: [0, 1, 2]
                            },
                            title: 'Dine: Mamengs Seafood & BBQ Hauz',
                            messageTop: 'Monthly Product Sales_<?php echo $now->format('Y-m-d'); ?>_<?php echo $this->session->userdata['userSession']['user_first_name'];?> '
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2]
                            },
                            messageTop: 'This PDF contains orders from dine-app.net',
                            messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?> <?php echo $this->session->userdata['userSession']['user_last_name'];?>',
                            title: 'Monthly Product Sales_<?php echo $now->format('Y-m-d'); ?>'
                        }
                    ]
                });
                flag++;
            }
        });
    } );
 
</script>



<script type="text/javascript">
    $(document).ready(function() {
      $('.menu .item').tab();
        var flag=0;
        $(document).on('click', '#third', function(){
            <?php $now = new DateTime(NULL, new DateTimeZone('Asia/Manila')); ?>
            if(flag==0){
                $('#receipt_week').DataTable({
                    // "ajax" : {
                    //     url: "<?php echo site_url();?>/CReports/getWeekly",
                    //     type : 'GET',
                    // },
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2]
                            },
                            messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?> <?php echo $this->session->userdata['userSession']['user_last_name'];?>',
                            title: 'Weekly Products Sales_<?php echo $now->format('Y-m-d'); ?>'
                        },
                        {
                            extend: 'pdfHtml5',
                            customize: function ( doc ) {
                              doc.content.splice( 1, 0, {
                                margin: [ 0, 0, 0, 12 ],
                                alignment: 'center',
                                image: 'data:image/jpeg;base64,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'
                              } );
                            },
                            exportOptions: {
                                columns: [0, 1, 2]
                            },
                            title: 'Dine: Mamengs Seafood & BBQ Hauz',
                            messageTop: 'Weekly Products Sales_<?php echo $now->format('Y-m-d'); ?>_<?php echo $this->session->userdata['userSession']['user_first_name'];?> '
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2]
                            },
                            messageTop: 'This PDF contains orders from dine-app.net',
                            messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?> <?php echo $this->session->userdata['userSession']['user_last_name'];?>',
                            title: 'Weekly Products Sales_<?php echo $now->format('Y-m-d'); ?>'
                        }
                    ]
                });
                flag++;
            }
        });

        
    } );
    $(document).ready(function() {
        <?php $now = new DateTime(NULL, new DateTimeZone('Asia/Manila')); ?>
        $('#receipt_all').DataTable({
            // "ajax" : {
            //     url: "<?php echo site_url();?>/CReports/getAll",
            //     type : 'GET',
            // },
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2]
                    },
                    messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?> <?php echo $this->session->userdata['userSession']['user_last_name'];?>',
                    title: 'All Products Sales_<?php echo $now->format('Y-m-d'); ?>'
                },
                {
                    extend: 'pdfHtml5',
                    customize: function ( doc ) {
                              doc.content.splice( 1, 0, {
                                margin: [ 0, 0, 0, 12 ],
                                alignment: 'center',
                                image: 'data:image/jpeg;base64,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'
                              } );
                            },
                    exportOptions: {
                        columns: [0, 1, 2]
                    },
                    title: 'Dine: Mamengs Seafood & BBQ Hauz',
                    messageTop: 'All Products Sales_<?php echo $now->format('Y-m-d'); ?>_<?php echo $this->session->userdata['userSession']['user_first_name'];?> '
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2]
                    },
                    messageTop: 'This PDF contains all orders from dine-app.net',
                    messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?> <?php echo $this->session->userdata['userSession']['user_last_name'];?>',
                    title: 'All Products Sales_<?php echo $now->format('Y-m-d'); ?>'
                }
            ]
            
        });
    } );

    $(document).ready(function() {
        var flag=0;
        $(document).on('click', '#second', function(){
            <?php $now = new DateTime(NULL, new DateTimeZone('Asia/Manila')); ?>
            if(flag==0){
                $('#receipt_day').DataTable({
                    // "ajax" : {
                    //     url: "<?php echo site_url();?>/CReports/getDaily",
                    //     type : 'GET',
                    // },
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2]
                            },
                            messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?> <?php echo $this->session->userdata['userSession']['user_last_name'];?>',
                            title: 'Daily Product Sales_<?php echo $today; ?>'
                        },
                        {
                            extend: 'pdfHtml5',
                            customize: function ( doc ) {
                              doc.content.splice( 1, 0, {
                                margin: [ 0, 0, 0, 12 ],
                                alignment: 'center',
                                image: 'data:image/jpeg;base64,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'
                              } );
                            },
                            exportOptions: {
                                columns: [0, 1, 2]
                            },
                            title: 'Dine: Mamengs Seafood & BBQ Hauz',
                            messageTop: 'Daily Product Sales_<?php echo $today; ?>_<?php echo $this->session->userdata['userSession']['user_first_name'];?> '
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2]
                            },
                            messageTop: 'This PDF contains orders from dine-app.net',
                            messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?> <?php echo $this->session->userdata['userSession']['user_last_name'];?>',
                            title: 'Daily Product Sales_<?php echo $today; ?>'
                        }
                    ]
                });
                flag++;
            }
        });
    } );

    $(document).ready(function() {
        var flag=0;
        $(document).on('click', '#fourth', function(){
            <?php $now = new DateTime(NULL, new DateTimeZone('Asia/Manila')); ?>
            if(flag==0){
                $('#receipt_month').DataTable({
                    // "ajax" : {
                    //     url: "<?php echo site_url();?>/CReports/getDaily",
                    //     type : 'GET',
                    // },
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2]
                            },
                            messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?> <?php echo $this->session->userdata['userSession']['user_last_name'];?>',
                            title: 'Monthly Product Sales_<?php echo $now->format('Y-m-d'); ?>'
                        },
                        {
                            extend: 'pdfHtml5',
                            customize: function ( doc ) {
                              doc.content.splice( 1, 0, {
                                margin: [ 0, 0, 0, 12 ],
                                alignment: 'center',
                                image: 'data:image/jpeg;base64,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'
                              } );
                            },
                            exportOptions: {
                                columns: [0, 1, 2]
                            },
                            title: 'Dine: Mamengs Seafood & BBQ Hauz',
                            messageTop: 'Monthly Product Sales_<?php echo $now->format('Y-m-d'); ?>_<?php echo $this->session->userdata['userSession']['user_first_name'];?> '
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2]
                            },
                            messageTop: 'This PDF contains orders from dine-app.net',
                            messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?> <?php echo $this->session->userdata['userSession']['user_last_name'];?>',
                            title: 'Monthly Product Sales_<?php echo $now->format('Y-m-d'); ?>'
                        }
                    ]
                });
                flag++;
            }
        });
    } );
 
</script>


<!-- <div></div> -->


<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Product', 'Quantity Sold'],
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
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        <?php
        if($daily1 != 0){
              foreach($daily1 as $row){
                if($row->total != 0){
                  echo "['1',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily2 != 0){
              foreach($daily2 as $row){
                if($row->total != 0){
                  echo "['2',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily3 != 0){
              foreach($daily3 as $row){
                if($row->total != 0){
                  echo "['3',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily4 != 0){
              foreach($daily4 as $row){
                if($row->total != 0){
                  echo "['4',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily5 != 0){
              foreach($daily5 as $row){
                if($row->total != 0){
                  echo "['5',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily6 != 0){
              foreach($daily6 as $row){
                if($row->total != 0){
                  echo "['6',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily7 != 0){
              foreach($daily7 as $row){
                if($row->total != 0){
                  echo "['7',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily8 != 0){
              foreach($daily8 as $row){
                if($row->total != 0){
                  echo "['8',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily9 != 0){
              foreach($daily9 as $row){
                if($row->total != 0){
                  echo "['9',".$row->total.",'#99ccff'],";
                } 
              }
            }

            if($daily10 != 0){
              foreach($daily10 as $row){
                if($row->total != 0){
                  echo "['10',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily11 != 0){
              foreach($daily11 as $row){
                if($row->total != 0){
                  echo "['11',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily12 != 0){
              foreach($daily12 as $row){
                if($row->total != 0){
                  echo "['12',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily13 != 0){
              foreach($daily13 as $row){
                if($row->total != 0){
                  echo "['13',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily14 != 0){
              foreach($daily14 as $row){
                if($row->total != 0){
                  echo "['14',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily15 != 0){
              foreach($daily15 as $row){
                if($row->total != 0){
                  echo "['15',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily16 != 0){
              foreach($daily16 as $row){
                if($row->total != 0){
                  echo "['16',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily17 != 0){
              foreach($daily17 as $row){
                if($row->total != 0){
                  echo "['17',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily18 != 0){
              foreach($daily18 as $row){
                if($row->total != 0){
                  echo "['18',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily19 != 0){
              foreach($daily19 as $row){
                if($row->total != 0){
                  echo "['19',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily20 != 0){
              foreach($daily20 as $row){
                if($row->total != 0){
                  echo "['20',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily21 != 0){
              foreach($daily21 as $row){
                if($row->total != 0){
                  echo "['21',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily22 != 0){
              foreach($daily22 as $row){
                if($row->total != 0){
                  echo "['22',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily23 != 0){
              foreach($daily23 as $row){
                if($row->total != 0){
                  echo "['23',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily24 != 0){
              foreach($daily24 as $row){
                if($row->total != 0){
                  echo "['24',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily25 != 0){
              foreach($daily25 as $row){
                if($row->total != 0){
                  echo "['25',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily26 != 0){
              foreach($daily26 as $row){
                if($row->total != 0){
                  echo "['26',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily27 != 0){
              foreach($daily27 as $row){
                if($row->total != 0){
                  echo "['27',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily28 != 0){
              foreach($daily28 as $row){
                if($row->total != 0){
                  echo "['28',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily29 != 0){
              foreach($daily29 as $row){
                if($row->total != 0){
                  echo "['29',".$row->total.",'#99ccff'],";
                }else{
                  echo "['29',0,'blue'],";
                }
              }
            }

            if($daily30 != 0){
              foreach($daily30 as $row){
                if($row->total != 0){
                  echo "['30',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily31 != 0){
              foreach($daily31 as $row){
                if($row->total != 0){
                  echo "['31',".$row->total.",'#99ccff'],";
                }
              }
            }
        ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("curve_chart"));
      chart.draw(view, options);
  }
  </script>


      <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        <?php
        if($daily1 != 0){
              foreach($daily1 as $row){
                if($row->total != 0){
                  echo "['1',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily2 != 0){
              foreach($daily2 as $row){
                if($row->total != 0){
                  echo "['2',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily3 != 0){
              foreach($daily3 as $row){
                if($row->total != 0){
                  echo "['3',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily4 != 0){
              foreach($daily4 as $row){
                if($row->total != 0){
                  echo "['4',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily5 != 0){
              foreach($daily5 as $row){
                if($row->total != 0){
                  echo "['5',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily6 != 0){
              foreach($daily6 as $row){
                if($row->total != 0){
                  echo "['6',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily7 != 0){
              foreach($daily7 as $row){
                if($row->total != 0){
                  echo "['7',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily8 != 0){
              foreach($daily8 as $row){
                if($row->total != 0){
                  echo "['8',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily9 != 0){
              foreach($daily9 as $row){
                if($row->total != 0){
                  echo "['9',".$row->total.",'#99ccff'],";
                } 
              }
            }

            if($daily10 != 0){
              foreach($daily10 as $row){
                if($row->total != 0){
                  echo "['10',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily11 != 0){
              foreach($daily11 as $row){
                if($row->total != 0){
                  echo "['11',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily12 != 0){
              foreach($daily12 as $row){
                if($row->total != 0){
                  echo "['12',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily13 != 0){
              foreach($daily13 as $row){
                if($row->total != 0){
                  echo "['13',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily14 != 0){
              foreach($daily14 as $row){
                if($row->total != 0){
                  echo "['14',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily15 != 0){
              foreach($daily15 as $row){
                if($row->total != 0){
                  echo "['15',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily16 != 0){
              foreach($daily16 as $row){
                if($row->total != 0){
                  echo "['16',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily17 != 0){
              foreach($daily17 as $row){
                if($row->total != 0){
                  echo "['17',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily18 != 0){
              foreach($daily18 as $row){
                if($row->total != 0){
                  echo "['18',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily19 != 0){
              foreach($daily19 as $row){
                if($row->total != 0){
                  echo "['19',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily20 != 0){
              foreach($daily20 as $row){
                if($row->total != 0){
                  echo "['20',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily21 != 0){
              foreach($daily21 as $row){
                if($row->total != 0){
                  echo "['21',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily22 != 0){
              foreach($daily22 as $row){
                if($row->total != 0){
                  echo "['22',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily23 != 0){
              foreach($daily23 as $row){
                if($row->total != 0){
                  echo "['23',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily24 != 0){
              foreach($daily24 as $row){
                if($row->total != 0){
                  echo "['24',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily25 != 0){
              foreach($daily25 as $row){
                if($row->total != 0){
                  echo "['25',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily26 != 0){
              foreach($daily26 as $row){
                if($row->total != 0){
                  echo "['26',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily27 != 0){
              foreach($daily27 as $row){
                if($row->total != 0){
                  echo "['27',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily28 != 0){
              foreach($daily28 as $row){
                if($row->total != 0){
                  echo "['28',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily29 != 0){
              foreach($daily29 as $row){
                if($row->total != 0){
                  echo "['29',".$row->total.",'#99ccff'],";
                }else{
                  echo "['29',0,'blue'],";
                }
              }
            }

            if($daily30 != 0){
              foreach($daily30 as $row){
                if($row->total != 0){
                  echo "['30',".$row->total.",'#99ccff'],";
                }
              }
            }

            if($daily31 != 0){
              foreach($daily31 as $row){
                if($row->total != 0){
                  echo "['31',".$row->total.",'#99ccff'],";
                }
              }
            }
        ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
     
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("curve_chart4"));
      chart.draw(view, options);
  }
  </script>


  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        <?php
          if($weekly4 != 0){
            foreach($weekly4 as $row){
              if($row->total != 0){
                echo "['1st Week',".$row->total.",'#99ccff'],";
              }
            }
          }

          if($weekly3 != 0){
            if($weekly4 != 0){
              foreach($weekly3 as $row){
                if($row->total != 0){
                  echo "['2nd Week',".$row->total.",'#99ccff'],";
                }
              }
            }else{
                foreach($weekly3 as $row){
                  if($row->total != 0){
                    echo "['1stt Week',".$row->total.",'#99ccff'],";
                  }
                }
              }
          }

          if($weekly2 != 0){
            if($weekly3 != 0){
              if($weekly4 != 0){
                foreach($weekly2 as $row){
                  if($row->total != 0){
                    echo "['3rd Week',".$row->total.",'#99ccff'],";
                  }
                }
              }else{
                foreach($weekly2 as $row){
                  if($row->total != 0){
                    echo "['2nd Week',".$row->total.",'#99ccff'],";
                  }
                }
              }
            }else{
              foreach($weekly2 as $row){
                if($row->total != 0){
                  echo "['1st Week',".$row->total.",'#99ccff'],";
                }
              }
            }
          }

          if($weekly1 != 0){
            if($weekly2 != 0){
              if($weekly3 != 0){
                if($weekly4 !=0){
                  foreach($weekly1 as $row){
                    if($row->total != 0){
                      echo "['4th Week',".$row->total.",'#99ccff'],";
                    }
                  }
                }else{
                  foreach($weekly1 as $row){
                    if($row->total != 0){
                      echo "['3rd Week',".$row->total.",'#99ccff'],";
                    }
                  }
                }
              }else{
                foreach($weekly1 as $row){
                  if($row->total != 0){
                    echo "['2nd Week',".$row->total.",'#99ccff'],";
                  }
                }
              }
            }else{
              foreach($weekly1 as $row){
                if($row->total != 0){
                  echo "['1st Week',".$row->total.",'#99ccff'],";
                }
              }
            }
          }

          foreach($weekly as $row){
            if($row->total != 0){
              echo "['Current Week',".$row->total.",'#99ccff'],";
            }
          }
        ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
       
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("curve_chart2"));
      chart.draw(view, options);
  }
  </script>


  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        <?php
            if($weekly4 != 0){
            foreach($weekly4 as $row){
              if($row->total != 0){
                echo "['1st Week',".$row->total.",'#99ccff'],";
              }
            }
          }

          if($weekly3 != 0){
            if($weekly4 != 0){
              foreach($weekly3 as $row){
                if($row->total != 0){
                  echo "['2nd Week',".$row->total.",'#99ccff'],";
                }
              }
            }else{
                foreach($weekly3 as $row){
                  if($row->total != 0){
                    echo "['1stt Week',".$row->total.",'#99ccff'],";
                  }
                }
              }
          }

          if($weekly2 != 0){
            if($weekly3 != 0){
              if($weekly4 != 0){
                foreach($weekly2 as $row){
                  if($row->total != 0){
                    echo "['3rd Week',".$row->total.",'#99ccff'],";
                  }
                }
              }else{
                foreach($weekly2 as $row){
                  if($row->total != 0){
                    echo "['2nd Week',".$row->total.",'#99ccff'],";
                  }
                }
              }
            }else{
              foreach($weekly2 as $row){
                if($row->total != 0){
                  echo "['1st Week',".$row->total.",'#99ccff'],";
                }
              }
            }
          }

          if($weekly1 != 0){
            if($weekly2 != 0){
              if($weekly3 != 0){
                if($weekly4 !=0){
                  foreach($weekly1 as $row){
                    if($row->total != 0){
                      echo "['4th Week',".$row->total.",'#99ccff'],";
                    }
                  }
                }else{
                  foreach($weekly1 as $row){
                    if($row->total != 0){
                      echo "['3rd Week',".$row->total.",'#99ccff'],";
                    }
                  }
                }
              }else{
                foreach($weekly1 as $row){
                  if($row->total != 0){
                    echo "['2nd Week',".$row->total.",'#99ccff'],";
                  }
                }
              }
            }else{
              foreach($weekly1 as $row){
                if($row->total != 0){
                  echo "['1st Week',".$row->total.",'#99ccff'],";
                }
              }
            }
          }

          foreach($weekly as $row){
            if($row->total != 0){
              echo "['Current Week',".$row->total.",'#99ccff'],";
            }
          }
        ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
       
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("curve_chart5"));
      chart.draw(view, options);
  }
  </script>


  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        <?php
         if($monthly11 != 0){
            foreach($monthly11 as $row){
              if($row->total != 0){
                echo "['November',".$row->total.",'99ccff'],";
              }
            }
          }

          if($monthly10 != 0){
            foreach($monthly10 as $row){
              if($row->total != 0){
                echo "['October',".$row->total.",'99ccff'],";
              }
            }
          }

          if($monthly9 != 0){
            foreach($monthly9 as $row){
              if($row->total != 0){
                echo "['September',".$row->total.",'99ccff'],";
              }
            }
          }

          if($monthly8 != 0){
            foreach($monthly8 as $row){
              if($row->total != 0){
                echo "['August',".$row->total.",'99ccff'],";
              }
            }
          }

          if($monthly7 != 0){
            foreach($monthly7 as $row){
              if($row->total != 0){
                echo "['July',".$row->total.",'99ccff'],";
              }
            }
          }

          if($monthly6 != 0){
            foreach($monthly6 as $row){
              if($row->total != 0){
                echo "['June',".$row->total.",'99ccff'],";
              }
            }
          }    

          if($monthly5 != 0){
            foreach($monthly5 as $row){
              if($row->total != 0){
                echo "['May',".$row->total.",'99ccff'],";
              }
            }
          }      

          if($monthly4 != 0){
            foreach($monthly4 as $row){
              if($row->total != 0){
                echo "['April',".$row->total.",'blue'],";
              }
            }
          } 

          if($monthly3 != 0){
            foreach($monthly3 as $row){
              if($row->total != 0){
                echo "['March',".$row->total.",'99ccff'],";
              }
            }
          }

          if($monthly2 != 0){
            foreach($monthly2 as $row){
              if($row->total != 0){
                echo "['February',".$row->total.",'99ccff'],";
              }
            }
          }

          if($monthly1 != 0){
            foreach($monthly1 as $row){
              if($row->total != 0){
                echo "['January',".$row->total.",'99ccff'],";
              }
            }
          }

          foreach($monthly as $row){
            if($row->total != 0){
              echo "['Current Month',".$row->total.",'99ccff'],";
            }
          }
        ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
       
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("curve_chart3"));
      chart.draw(view, options);
  }
  </script>


  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        <?php
         if($monthly11 != 0){
            foreach($monthly11 as $row){
              if($row->total != 0){
                echo "['November',".$row->total.",'99ccff'],";
              }
            }
          }

          if($monthly10 != 0){
            foreach($monthly10 as $row){
              if($row->total != 0){
                echo "['October',".$row->total.",'99ccff'],";
              }
            }
          }

          if($monthly9 != 0){
            foreach($monthly9 as $row){
              if($row->total != 0){
                echo "['September',".$row->total.",'99ccff'],";
              }
            }
          }

          if($monthly8 != 0){
            foreach($monthly8 as $row){
              if($row->total != 0){
                echo "['August',".$row->total.",'99ccff'],";
              }
            }
          }

          if($monthly7 != 0){
            foreach($monthly7 as $row){
              if($row->total != 0){
                echo "['July',".$row->total.",'99ccff'],";
              }
            }
          }

          if($monthly6 != 0){
            foreach($monthly6 as $row){
              if($row->total != 0){
                echo "['June',".$row->total.",'99ccff'],";
              }
            }
          }    

          if($monthly5 != 0){
            foreach($monthly5 as $row){
              if($row->total != 0){
                echo "['May',".$row->total.",'99ccff'],";
              }
            }
          }      

          if($monthly4 != 0){
            foreach($monthly4 as $row){
              if($row->total != 0){
                echo "['April',".$row->total.",'blue'],";
              }
            }
          } 

          if($monthly3 != 0){
            foreach($monthly3 as $row){
              if($row->total != 0){
                echo "['March',".$row->total.",'99ccff'],";
              }
            }
          }

          if($monthly2 != 0){
            foreach($monthly2 as $row){
              if($row->total != 0){
                echo "['February',".$row->total.",'99ccff'],";
              }
            }
          }

          if($monthly1 != 0){
            foreach($monthly1 as $row){
              if($row->total != 0){
                echo "['January',".$row->total.",'99ccff'],";
              }
            }
          }

          foreach($monthly as $row){
            if($row->total != 0){
              echo "['Current Month',".$row->total.",'99ccff'],";
            }
          }
        ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
       
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("curve_chart6"));
      chart.draw(view, options);
  }
  </script>

</body>
</html>
