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
                      <td><a href="<?php echo site_url()?>/CReports/viewInfo/<?php echo $row->receipt_id?>"><button class="ui inverted blue icon button">
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
                      <td><a href="<?php echo site_url()?>/CReports/viewInfo/<?php echo $row->receipt_id?>"><button class="ui inverted blue icon button">
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
                      <td><a href="<?php echo site_url()?>/CReports/viewInfo/<?php echo $row->receipt_id?>"><button class="ui inverted blue icon button">
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
                      <td><a href="<?php echo site_url()?>/CReports/viewInfo/<?php echo $row->receipt_id?>"><button class="ui inverted blue icon button">
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
                            title: 'Weekly Products Sales_<?php echo $now->format('Y-m-d'); ?>_<?php echo $this->session->userdata['userSession']['user_first_name'];?> '
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
                            messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?>',
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
                    title: 'All Products Sales_<?php echo $now->format('Y-m-d'); ?>_<?php echo $this->session->userdata['userSession']['user_first_name'];?> '
                },
                {
                    extend: 'pdfHtml5',
                    customize: function ( doc ) {
                              doc.content.splice( 1, 0, {
                                margin: [ 0, 0, 0, 12 ],
                                alignment: 'center',
                                image: 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAIBAQIBAQICAgICAgICAwUDAwMDAwYEBAMFBwYHBwcGBwcICQsJCAgKCAcHCg0KCgsMDAwMBwkODw0MDgsMDAz/2wBDAQICAgMDAwYDAwYMCAcIDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAz/wAARCACjALkDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD9k/FH/BQP4V+Ff2y/C3wCk8S2158TvFdvd3EWlWTLcNpwt7UXey72tm3eS3LSRhwN6oTxlN1b9pP/AIKP/Bz9kf42+Avh74+8aaZoPij4iSONPt5pkVLSIK+25umJAt4JJU8mN34eQkDISVk/Kyct/wARpUIJJAjyBjGP+KHb868q/wCDpxtv/BYv4OHufBWi556/8TvU8D9aZMm0mz9p/wBvf/goj8N/+Cbvw00PxZ8TLrVINK8Qa1FodsNOthdTrK8UkplaPcrGJFibcy7iCyDBLAVc/bf/AG/fhf8A8E9vhPL4t+JfiO00yN1zYaVFPCdW1oiWGJxZ2zurTmMzxM+zIRW3Ngc1+cX/AAeMjd+yR8Ixk5/4TCbHp/x5Sfr/APXrgP8Ag82G61/ZzB5/5GX+ekUBdu5+1vgLx1pHxQ8C6L4m0C/h1XQfEVhBqem3sOfLu7aaNZIpVzg7WRlYZHQ1rV4b/wAEw/8AlGr+zz/2TPw3/wCmq2r3KkUFFFFABRXx7/wUW/4Li/Az/gmh4i0/QvGV/q3ijxNduyXWh+FGsr7UtGAjhkRryGW5iMAkSZGj3cuMkAgZr8of28f+DtD4o/Fa7j074DaKnwr0qzupm/tfUorXV9U1SEFlh3QyxPb24KkO8a+aQ4AEu0HeCcj+iCiv5Tv+IkT9tqVtsfxmdirbjjwhoRyvoP8AQvSvq7/gld/wWY/a4/aQ+NfiDT/Gvj7UNZ0PT/D8t8mfCel20cEy3FuocvFaIfuO/BOOScccUld2ByS3Z/QHRX5yJ+3n8WHAx4qDEHBzptmAfcfuq9F+Df8AwUt1nQpYrbxvZprViqtuv7KJIrwHLEFkysTjlVwBHgDJLHg6OjJFeaPtaivPvgT+0v4Z/aDsLiTRpprW7tpGVrC9aJLwooQmYRo7Hy8yBd3TcCK9BrJprRiCiiikAUUUUAU/EOvWvhXQL7VL+XyLHTbeS6uJNpby40UszYAJOFBOACawfhL8aPD3xs8ODUtBvo7hV/11uzqLm1+Z1XzYwSU3bGK56jkV5V/wUS+K178PPg7a6fpt8LS68RXElpcJ5cbmez8iRZlwwJHLx/MuCM9Rnng/+CVZJXx3k5P/ABL+nT/l5rTk9zmA+u6KKKzA/Dufn/g9IhPOfLx0wP8AkR2/PrXk/wDwdOsI/wDgsd8HmJOT4J0QEY/6jmp/4/57+sXBC/8AB6TB83LR9M/9SO1eU/8AB04R/wAPivg8MAv/AMIVop/8rep4/WmRP4WfTH/B4vn/AIZE+EnXjxhL3x/y5S155/wecDMP7OOS3H/CTcY4POkda9B/4PGf+TRPhLlsAeMJc8df9Cl4rz//AIPNz/ov7OefXxL/AD0ehiW79f0R+qX/AATCGP8Agmp+zwPT4Z+G/wD01W1e5V4b/wAEw/8AlGr+zz/2TPw3/wCmq2rqf2uv2r/Bv7EX7PPiX4m+Pb2az8OeGbfzZVt4xLdXkrMEitoEJAaWWRlRQWVQWyzKoZgjRs0f2hf2lvAH7J3w1u/GHxJ8XaF4M8OWm9TeandLCJ5Fikl8iFPvzzskUhWGJWkfYQqseK/nt/4KE/8AByT8YP8AgoRb+HvAHwX8NeKPhRJPrkTWk3hrxDez+JNenJlggtka1WEiOXzlJtwkjNKkeH4wfB/2wf27fj7/AMF3f2qdH8M6bZa9LZazdWltoHw/0y+eXStOnSMxG7cYRC+6ad3uZhmOOVlLrEgA/VH4Jf8ABOT9nj/g3Z/Zkf42fHWPT/ih8QbbU7aDTdQt9J82a0upRBJHZ6bbXM/ktPFLbTzreEQzCJZMbACrMhyPiT9hD/g2S+N/7btvrHi/4w61rnwehv2F3az+INK/tTWtcneWQTNNbvcxTQEFSxa4wz+YpVWBLD7U8AfA7/gmT/wSOfV9A8c+NvAfxL13WLo2t5H4q0uz8bXuiXFkWSaExWVlI1iS8pDJKFZzHjJMRx+b37dH/ByD+0b+1h468Qr4N8Ya/wDCTwBqjWzWXh7RbuBb3TzHHEHI1SK3huyJJUkkIDAbZSmGUYr4BmmfUWaUyeeZTl3Lly/PJOfXPPX8aBpH7ZXP/BzR+z/+yn8V9bX4Ifsj+DU02GSW0g1/SZrTwzcapCJCFYxRaczojhUcK7ZGQCARX0H+w1/wdBj9tD4pan4a/wCFIf8ACODTtKfU/tP/AAmX23zNs0UXl7PsMeP9bnOT93GOeP5x5oHMbbDtbHBPOSDnr3zivtP/AIIcRlP2ofEikjB8KTgYBBH+l2nPWqgrySY4q2h/QMf+ChPg/wCJusafa+MfhzZTafHLtFxcSR6l9j3YDOEeEccDO05IHQnAPb3lr+z58ffDFzo2nXXhTRpJpYo0ntLSHSb0PuBCxGaJS+7G0gKww2ODivhLYHcHOcjjk9KReASee2Mk10umumhXJvY+j/jF/wAE8fFfw/1ZL3wbNP4jslL3C4aO3vLHaxZBgsPMbGMNHglgfkXjNP4Nft3eLvgib/R/EljeeJyk8hkGpXs8d/azDYhjMkm/CLsb93sBDMTkcg4nwU/bo8a/Cq+RdQvrrxRpHzbrLUJy0mTtwUnYNIuAuAvK/MflzzX0D4k+DHw4/bq8HyeIfC9wuh60J0W6vUsysqvt3vFPDuVZGIcfvFJOVGHYAqZba0nsJtrc948D+P8ARfiVoEeqaDqdnqtjJgebbyBvLYqrbHHVHCspKMAwyMgVr1+eHgbxx40/Ye+NMek6tJeQ6VFchr6wQtLaahbuwVriFWKqXKoNr/KQU2tgb0r7z+HfxK0P4r+Gk1jw9qMWp6e8jReYishR1OCrKwDKehwwBIIPQgnGcLarYGzcooorMD4S/wCCmPjpNf8AjXp+iQ3Blj0HT1WaPDAQ3Ex3sOeDmLyDlc9cE5GB2X/BKskjx5nt/Z4/9Kq+cv2gPHX/AAs343eJteF0L2C9v5Fs5fK8vNuh2QnGAR+6SPqAeOec19G/8EqxgeO/U/2f/wC3Vdc1anYb2R9d0UUVyCPww1/WLTQf+D0K1uNQvLezgdoreN5pRGjSy+C/KjTJONzyOiKOrMwAySK8t/4OrtSg0X/gr18Jr26k8q2tPAujzTSEHCIutaoSTjrgAnA/wryP/g6f+E+ofDT/AIK4a9rlxLaywePfDuk67ZCF2LwxxwHTysmVGHMtjIflLDYyc5JVfzq1rWr/AMTavd6hql5PqGoahK011cTyNLLM7MWZ3ZiSzsxYkkksfzpkvVNH9Af/AAeP69ZWv7M3wa0yS5iXUrzxRd3NvbF8PLFFabZJAO4VpogT28wetcP/AMHm8y+T+zfhwd//AAk23kYb/kD/AOeK/D3xL4r1fxvqou9X1LUdVvI4IrVJry5edlhijWOKPLknakaogUcKqhRgAU3UPFWqeIbDTbO+v9QvrXR4GtbKGedpYrKFpHlMcSs2EQyySvtUAF3diMsSS4Jfif2M/wDBMI5/4Jqfs8Hnn4Z+G/8A01W1fz5/8FrP25vGv/BXT/go9F8LPh5L/wAJB4N8O6+PCvgnSrG5iFvrl+ZPIk1Ay+aYJPOlJEUxZEW3EbHaTIzfZv8AwVY/4KEeJv2O/wDgg9+yd4H8C6tr3hrxj8V/A/h8prul3MtncaZYadpmnzXHk3EM0csU8k01ogwrK0LXKttJXPPf8G2/7HXhX9j39lXxl+2v8VJlstPsdL1GHw8siW0y22nQEJc3secyLdyzRTWsaAxsV8xcOLhMASZ77oPwr+B3/BrF+xnrHijUdQPj/wCLnjqW5sdMvprOK3vtalWMyQ2cUQcvb6fEyQtO4dzvkViWLQRL/P8A/tVftYfED9tD4v6l46+I/iLUdf1zUHfYZ7iR4dOhaZ5Ra2yOxENujyvsjUhV3HjrnpP29/27PHn/AAUV/aMvviT4+ewi1m+tLewhstPM40/TLeGMKIraOWWRo1Zy8rKG2mSaRuCxrxQozuWGXI7DpjqB9f6ZpXBRtqJBly4LZyAOCflB9PQfXr9K+if+CWHxC+Dfws/bf8DeIfjpbX1x4B0a+S6kMEH2mKC5V1eCS4gCs01urDLxorMwGAG5U/PDSH+IkFshd3IPqeO/OK9B/Zf/AGYPF37Xnxq0L4e+BNOj1HxL4hmWK3SaRYYkXjfLK54VFGWYjJwOATgUFH9UPhz/AIKZ/se/tcad/ZD/ABQ+EPiO2fbKNP8AEUsFsHIGQRDfKmWHsuRz0wcfD/8AwW3+C/wn/wCCUOg+Dvjt8Jfh14c0bWPGutx+GNZtNPlkt9OvNOkikumaCGNhDDOWtowJEQrgnKP1r40+Jn/Bpt+1N4K8NtfaXf8Aws8ZXSyKPsGk67cRXDc9Qbu3t4go7gyZxxg15d+z3/wTh8feGfjb42/Z7+Ndp4n8GMnh/wD4SW300X8VzbQ3nnQQw6hGI3e3lby3ljLodxUum5eaqN76DPt39lz9uv4fftbQSxeG9TmttZtY1luNIv0EF3Gp/iUZKyKCCCUZtvG4LuXPr+V2EFuMfU4r8Rf2pv2NvH/7Bvivw5datqtgW1KR7rTNT0W8l3wywOpJDFY3jlTdGwIGBuG1iVOP0X/4Jz/8FBdK/ah8J6f4V1qS4tviFpNjvvFeIrBqKIxXzYnLuWYJ5ZkDbTuZioKgkdMKmtpblXPqNevTPv8Aj+prc+H3xI134VeI11bw/qN1puoCNojJFtIZG6qytlWXIBwQRlVPUAjFdTgADGeuODRGojVVyflGMnv7/WtWNn3S2r+H/wDgoF+z5NasIofGWjQG4WCN/Ja2vPLYKQW3E28jYyMnjAJ3KCPBv2cPjJrX7IXxXutC13TbazttWurOLWVu1fz7KIBisiFCRws+8gq24AAYJzXnnwM+J9z8Hvijo+uxXF/Bb29zGL6K1fDXNtvUyxYyA2VHAY43AHjGR9Rftz/DZv2gvh5ovjzwedN1PT9Etbx725RhFPPboyn5SwG9YzHOdpYEFjtBLGsWuV8r2Zns7M+qK5z4u/EO3+E/wz1vxFc7CmlWrSoj5Cyyn5Y48gEjdIVXPbdXiP8AwTv+Pw8c+CB4LvUddR8M2geCaW6aZ72Ayv0Ur8iwhoYwNzcFcYAxUv8AwUq+Jp8K/Byy8ORx75vFVzh2ZcqkFuySNg5GG3mHGQQV39DiseR83KwZ8JRElmJ6jtnPGeK+vv8AglUML479/wCz/wAP+PnivkMoJMZydvPqK+vP+CVYwPHg5/5h/wD7dV0VfgZUj67ooorjJPxs/wCDvr9kLxH8S/gt8O/i/oGiadc6R8NBfWXiq/8ANhhu4YL2exiss7iHliWcyrtXcUNyWCgM7D+fcYEe0Y25JwF2qSB06/r0r+4zxT4W0zxz4Z1HRNb06w1jRtYtpLK/sL63S4tb2CRCkkMsbgq8boSrKwIIJBBBr+fX/gv9/wAG+2hfsffDnX/j58J9Sv28JDWEk1/wvcW9ukPh9by6lCzWkiGPFqkstpbpbCJ5EDBzIyg7AD8fXQpC7gIW3cDaMnHHX/OOnJr2n9gX9i3xP+3p+1F4M+G3h221BR4h1SG11LUooVlj0a0w0lxdPuZEJjt4ppFjLqZDFsTLEAw/sHfsQeNf+Cg37SugfDfwPYyXGoam/m3t6Yi1voVirKJr64bI2xRhwMZBd3RFy8iqf6QPGn7Nvwz/AOCBX/BJn4yaz8L0v9N1y00KeU+J7yKK81fU9XmBtdNedtgQxxXNzEEjCCJFaRtpZ5GcE2fh3+3LceP/APgq/wD8FZfEngL4b6f4f8SNomoX/g34faRoM9tY6TDoWkm5Nuts8kq26xm3hebKuqM0jbAAyIPrz/g5s/axj/Z2+D/wt/Yt8DXz3HhjwN4b0i51u/bUvM1C6W1ge2sbC6SLZGD5cUd26uh3s9q6rGEG+L/gzr+Aml+Mf2i/i98SL147jUvA+i2Oj6fFJbpL5Z1GWd5LhHPMcipYGPK8lbiQE4yD+cf/AAVD+LD/ABw/4KOfHLxMNf8A+EmtL7xtqqaZqa3Iu47iwiupIrMQyZIaJbWOFY9p2hFXHGBTJt0PB/LWIkH5Qp3HPHy9/bHt+NJLlpMlyCvGFyfXt+v4fSkZR8zMAuD9MdO/+NOOUJGQQRxgYwe2B+H+eyLB8Rsw27ScgY+UkY65/T2r039jT9rXxr+wr+0DofxI8B39vDruiy7vKuEkktb6EkeZbTqjqzQyAYKhlIHQg4I8vyGOM5JyMKSdvHU+v079a+iv+CVPw9+D3xT/AG2/BOlfHHxFb+Hvh491515LcTiGyu5EYNHbXM5ZRDBIcq8m4bVPVfvAA/Rv4Q/8Hjvi7R7VE+IfwZ8M6yzSANc+H9an0sRqcdIZkuSzdTjzFzx0xz0//Bbr/gtj8N/2gP2bPhd4m+AnxFXUfEHhzxfDcaxok8F1YzeS1nK5guYJFjaeAuAjNGWTdgB92019yfHL/giN+x7+3X8MhNovgjwdokc0QjsfEXw8e304wkHcGH2YG2mODz5sb5BHTAI/KHxR/wAEEtW/Y/8A2pPGnw/8WlvGXgXxP4Fkn0Hxv/wj8sFpa38k8Sqpy7Rx3sLRyv5Szszw7SSFkZFqKbdkM9A/Zc/aa8Nf8FK/2fPFWh6jZyaZqDWR0rXbOItIYUuYnVZ4HdCvzFZCo+YoY+c8Fvzf+Knw78V/8E4P2uIJdOLC+8O3g1HRruaJlj1O0ZmVS2xh8rpvikUEfxrkdar6DceMP+Cev7VlmmonW9KOh6tH9uW1lmsx4g0+K6G/y9wHmwTCJtuRtbjuOP0G/wCCuXwo0P4wfsb3HjG0Cahf+FfI1LS7yzYS+fbTyxRygOucwmN1lLDj90p6ZrVvmjd7oZ9B/s+fGWx/aB+DHh3xpp4WK21+zSdoRub7NMCUmhLEKWMcqum7ADbcjgg12LHcqg9T0yCRXxD/AMENfHUOv/s8+JPD8l+1zfaJrjXa27vvEEE8MQQp6AyRTnAAGWJ6mvt5UEgJJDbunGOK6Iu6TKTEdRlAecc9K+tv+Cbnjaw8QeG/FXw+1WW3ktb9DcWtm6sDcRyI0dyuemNoiO3g/M5GeSPknbtGerN7810nwd8UQeCfix4a1e8mkitdL1W2ubl4wSyxJKrPgDk/KG479KJq8bEy2PQ/AWpT/sdfterbanNOthpd89jduJConspl+SZ1j3bgEeOby+TuVRww47L/AIKfavdT/GLQdPeZ2s7XRluIoj91JJJ5Vdh7kRID/uiug/4KieDILBvC2vWul28TXUtzBqN9HAqvO+yHyVkcDLHakm0MTgK2Kwf2yb0/Gf8AZ7+HHxFSG3FxKj6bqUoh8uV5jxgYz+6WWG4K5PHmDH3jWSd2pE31R8zIMZYn+lfXn/BKw5/4Tz2/s/8A9ua+Q4380bvT9D6V9ef8ErM/8V5/3D//AG6qqr91lS6H13RRRXGSFeHf8FOo0l/4JsftCLLzGfhp4j3cZ4/su5r3GvmP/gtB8VbT4Of8Ep/j3q98hkhvPB97oSjeUxLqKf2fEcgHpJdIcd8YyM5ADdkfi9/wZ+Fm/wCCk3jkuMH/AIVnfYH/AHFNK/8ArV9o/wDB29+1Tqvwl/ZK8LfDG0dBpvxcN0L9Sikt/Z17pVxHglSR8zn7rLnoc9K+K/8Agz7JP/BSnxtnkj4Y3+Tgcf8AE10nj/61e7/8Hnr4P7Nq5GW/4Sfj1/5A9FxSV1Ytf8EC/GGlf8E3f+CMfxg/aN1nS3W81bxTaW7zzvJJFe6fDJaWlsRHHkrtuL+9GQAxOM8KK/CSTc7PyQZMlmI6cnI+vX15PpX9AX/BRbUNP+BP/BqB8MPD9jaQxDx14e8IQ/6OiwL58/2fVpZGAHLM0Em4jlmYk96/n9dgpJwSRggAc8f56/QU2yIXu7v+t/1GRMskIC9Fy4K42qR/+vP+cVIVYIACCXAJJ4zkjPH09ahdiZ0DFWOQMIowvP14/wA+tSo7A7chsnoOQACPy70jQsWmmT39ykMEMlxPKMbI1Ls3c4AyeBk16P8Asr/sW/E39tP4pzeBvhf4Yv8AxR4phtpb+4slngtTBbo6RvI8k7pHGoeSNcsw+ZwOpr6b/wCDbaQt/wAFovg5nPA1v/0x6hz78ele5fsk/wDBUbwn/wAEyf8AguJ+1BqXjfwtNqOh+N/iBrujXGt2u03Xh+Aa5O7TBSpaSJvlaSNSGPkoQGKgUAfL1rY/tRf8EAf2k9J1q80+b4ceLfEWlmRYLiax1ex1jT/tCCSCQwvLEVMkKhlDLKnysCm5WP7N/wDBV/8AbZ0jxX8Lv2UvHvgy9+2+F/ix4k+xB2gbdNb3dsqqpDAFHScRZ6EFCDxkV8A/8HLH/BWj4Yft1at4H+H/AMMG0/xXpHhBm1e48WxCSNluJw8T6fFHJErBAqQyNIHKsWjG0GPJ4j9jn9pCX9un4F/AD4BPpA0GX9nHVrnxnNrj3ZvE1+E6h5q2ywbE8lgbhY9xkcbU3YyQlVG91YZif8F6PD9raeIvhhqsVuovry31K1ubgH5niha2eNSD2VppTwM/Ofavo/8AYLil+PX/AATj8MaR4iuJLmHWdFvfD85VVjK2qS3FmirtHBWFFGTk/Lnk81F/wUN/YXu/20fDegvYeI7LQtR8KLePAl3ZNJBdtMIsK8iuDEoMI+YK/DZxxz6J+x58Brn9mH9nTw54JvdTi1a80ZJ3uLmGJo4WklnkmZU3HJVTJtBOC23dhc7R1KL52+hXU/PT/giDrA0X9qzWbKSV0Go+GbhEjYcPItxbMoyO4UPz6V+rUS/KV3bsd+h/SvjP9i3/AIJcal+y38f9Q8Y6l4tstUs7dJoNNtrSzeOSdJCDum3NhCMY2LvBzncMYP2RKWGQA5PXKgAnnt/9enSTSswRIqgEkZO7qfU9P8/SkjBDFeQB3zz/AJ5NKAcDnn24H0oyUYdwf0rQZ9t/H/VbL4uf8E79O8QXE76jd2NtYXAuCGjIvFlS1nYrgZwXnXpt5yOxrnf2TPhu3xb/AGHfHPh+Iyfab/VZ2tgjqm6eOC1liUlgQFMiID7E8jqNLw/4ffxJ/wAEtZLaNijR21xdkhN3EOpPMwxkdQh57ZzzW9/wTBBX4CauCxY/2/Mff/j3tq5m7RdujM12PhUAISCCSOT07cV9ff8ABKzp477/APIP/wDbquE/4KGfBrTfhr8UbXWNNuIlHioTXEunxxBBaPGIgXyDyJGZ25AwQ3J7e4/8E4vhjbeE/gm3iNJ5JrzxZKWlUrtWGO3lliRBycnO9i3H3wMfLk1UknC/cbd0j6EooorlEFfDH/ByexX/AIIq/Gg/9gP/ANP2nV9z1+Z3/B2J8TL/AMB/8Epv7KtLgw23jXxlpejXy+Wr+dCiXF8q8glcTWUTZXBygGcEggNn5of8GlvxL0/wL/wVKudL1Byt5408Eano2nqFPM6T2t8QeuB5NnKecdOtfS3/AAegDcn7Nw3bcnxN/PR/1r88P+CBXxWsvhB/wV5+Buq6hJLHb6hrEuiAhC7NNqFpPYwjA6Ay3CAnt16Cv1v/AODtr9lbUvi1+yd4U+J1tEH0/wCEZujev5iAp/aN7pVtH8pYFsshHyg46nHWmS5W/A5D/go1p+mfHP8A4NOPhl4gtLqGdPAvhzwhMBCy3AM8DW+kyxkg/KytPJuHVSpU96/n9I2zg+mBgY45P/6vxx3r93f+CBPhDS/+Cj//AARi+L/7Oes6q8l5o/im1neCZJI4rLT5ZLS7tsSIAW3XFjenAJYHGcKy1+EzYBcnkofmBGMYY/y/pQyYN3aa/rb9C94Q8Mal4813TNG0PTr7VdX1i5jsbCwsYHubq8uJHCRxRIgLPI7MFVVBJLAAE8V956N/wbofFuy8LaPc+PviF8DvhBq/iK3jn0vQPGPiz+z9Vu9wBWPylicA5JUruJDAggV6R/wbbfs+W3gey+OH7UXinQLHWvC/wM8I39xpSzIss51WGEXzSwISFDxW8DLuYrg3SY6Er+bXxm+N/in9o74m6v4z8aa3feI/EviG5ku76+uCoaWSSQuQqABEQMxwiKqKGAUAcBGh+pf/AAR1/wCCU3x4/YZ/4LW/DOTx18O/ESeHtHXVnn8TadZy3ugbZdFvVjb7Yi+Um55FQByrF2AxkjPwr+3v8Otb+MH/AAVf+OHhfw7p93q3iDxD8VvEWn2Flarumu55NXuEjiTOMsWIAB4NfYH/AAbSft9/GGy/b1+GHwR/4TnVZvhZrR1WW48P3KQ3MCGLS726QQvIjSwDz1WQrE6BiPmB5ry/wTNj/g5qukYglP2i7xuCc4PiGXtQB8beOPgB4t+F/wAaLv4f+IPDup6T43s7qKwl0i4QLdRTy7Ske3P3m3pjnncK+wP+Ccnw/wBW/YU/bN8W6J8ZLYfDXVLbwozyW/iG4jsyolubR48F2AO5QSACScH0IF3/AIKlXXm/8HDXi0fu2J8f6KMq2eBHZdfev07/AOCwPwm+B3xU/wCChWgeG9b+Hv8AbfxLk8Jw+Mb/AFu4u7gW4sre7NpZWqxLMInzJ9qaRWjwwEQJccLcL8ysM+PNW/4LM/BzTfFUenAeLLqzkuPIOqRaYv2MDftMmGkEpQD5jiMttIwCeK+m/CPjfSPiD4XttY0HVNP1rS7sHybqyuEuIZMEqwDoSpIYEEA8EEdazvHPwf8ADHxS8GzaB4g0PTtT0a4ieH7NJCAsauu0+WVw0bY6MhVhgYIwK+Nf+CQfjPWfB3xF+KHwf1jVpLiDwXfO2m2mwNHCYrmWG7ZXwG2tIYSFJxyxAGWz1Xadn1KufZ3xB+Lfhb4TQW83inxHonh2C53eRLqV9FarOVALKpdhuYA5wMmvmuX/AILKfC+KSd4tF+IN9YwymIX8Gjx/ZnI9C0wOCOQCAeRwK811z4S2P/BQH/gpr4xtddEureAfhhZx6bIglktx54IDwEqVk5nN0dynpCBnG2vvPQtJtfD2j2unabb29nYWUKxW9vAoSOGNQFRVUcAADAHtRdy20C5kfC34weGPjb4Wi1rwprmn67pz7Q0lpMJGgdlVvLlUHdHIFYEo4DDIyBXSLICAORn8K+EvCnh/TP2I/wDgqrpHhLwyRovgz4maQJ5tOWV5YUuCLgRgbyzBjND8uDhROQMLwPuyNScg568DOSKcZX3C59meHfEMnhj/AIJbSXMQLtLa3FocNtws2ovCxz7CQnHfGK3v+CYikfAfWSeSfEE3/pNbVQ/aE0i0+En/AATv0/w9PC+nXt7bWFsLclpD9saVLqcE8gcpO3J28YHYVf8A+CYrh/gJq5H/AEH5vw/0a2rCT9xvzIXc8g/4Ke4Hx70c8ZOgQg5Gcj7Tc8fWvd/+CdPipvEP7NltaGDyRoeoXFirbs+cGIuN2MDbzOVxz93PfA+Zv+CgWvXWsftSa1bXMvmx6Vb21taKVVfKjMCSleBk/vJXOTk/NjOAAPX/APglpr95daD4y0t5i1hZT2tzDFtUbJZVlWRs4ycrFFwTgbeAMnNTX7tDb0Pq+iiiuYQV+Pn/AAeNfFix0f8AY/8AhN4FkglfUvEfjKTXYJcr5SQ2NlLBKrd9zNqMWMDGFbPJGf2Dr8Lv+D0HUYnuv2cbRZozcwr4jmkj3AsisdKCsR1wSjgf7p9KAZ+Of7KnxiP7OX7T3w68fiz/ALU/4QbxNpviA2rTGJbs2l1HP5W/DbdxjwW2nGeh6V/XL/wVA/Zqf9r7/gnx8Xfh5b2E+qapr3hy5fSLSGZYXuNStwLmxTexCgG6hgzkgYyCQOa/jegG24VQCoTHGPQfoP8APrX9zNAmj+fn/gzm+O+leDf2iPi/8Ob4Rwar440Ww1ewlkmWJZDp0twsluiHmSRkvzJheQtvISMAkfnD/wAFRPhPJ8E/+CkPxv8AC40IeGLHT/Geryadp32T7NFb2Mt20tmY48ALE1tJC0eBtMbIRwRXuP8AwUN8KfE//gjd/wAFivGHifwe+l+BdUk1fUvEvgq602wgmsINI1J7qONIoJoTCAkMsluyeWVjeNgmQFc/WH/BzV+ydH+0N8JvhV+2r4FspIPDPjvw5pFrrenvppj1C1F3C1zY3928W+M/upI7R2dsIyWqK0gcbGTfW50//BGGWeH/AINnf2vJbYN5zXPivdhCDs/4RvTg5PfGzdn2r8O4CZSGeQyKuM7QMZz0z36/05zX7C/8GznxZm/aM/Z//aX/AGS2v5LEfEbwhqWraNfNFG9tp81xappd274IldiJ7F1UEjbbyfdJy35GeJvCWo+EPEt7peq2V5pOq6VPJa3lleQNBc2s8bFXiljYBkZGBBVhkHIIyKRZ9v8A/Bttl/8AgtF8HwD91dbJIH/UDv8A+uf89bvgiTd/wc2XShmO39oq74bnH/FQy9D6e3avpz/g1L/4J1aze/GqT9o3xVaGw8N6db3mj+DJLsyQyaxqMqNFcT244WWKK3W6ib7wLs+Pmicr8yeD0z/wc2XDZbP/AA0Rdg5UHj/hIZPxxQA7/gqeMf8ABw/4rIMmT4+0XONoXGyy/Hr/AJ61+lP/AAUmcJ/wXRtd3GfgdbfT/kO3Ffmv/wAFSwYf+DhvxYuMq3j3RTkZ4/d2PFfpR/wUmUD/AILo22FB3fA62J7c/wBu3FXT+JDGqmQASW45P96vz3/4J7W8Mf8AwVY+OJEaAousbPkAZf8AiaQZAxx36iv0KUkjk8n8q/PP9gH93/wVi+OZOFRzrGAxKED+04Tx2PPY4xyeorpnuin0LH7N37Nvjr4n/Gf46eIfBnxZm+H4b4g6nY3VtBoMd/8AazFO8kcjGSVcY89gAB2JzzXsy/sh/HRnLf8ADTGonHTHhC2AHbH+u571yvwC8Y2n7MH7fHxV8A+I9Ui0+z+It9H4q8PzTukUN7LcyOHt13HJkaSTYoH3jbt0yAfsNERoog5J3gBQykE8Z6fh3ojFNAj5Dg/4JreNvEHx18IeOvGHxpu/FN34O1K3u7aKfw6kDSRRSrK0QZJ/lDEMM4bGScdRX3H8HvDVv4z+K/hfSLpJLiz1TVba1uFRjuaJ5VV8Ecj5See1eEX37Xngy1/agtPhKJb258V3tm1yHgRJrW3ZUeQwSMr70l8tC+GQDaV55Ar9Cf8AgnB4Hs/DvhzxV8QNZghitrBDb2t5IWJt440aS5cL0xtMY3YJ+VwMcgjaim0KTshf+CovjaG9k8K6FaatBK9rNczahYRTqzwvsh8lpUByp2PJtzjIZiK+kfgB8OD8Jfgz4d8PuCtxYWgNyDIJAJ3JkmAYdV8x3x7Yr4a8AWE/7ZP7XzzalFdNYanfNe3Y8rIhsol+SFmj27RsSOHzODuZTyx5/RWsamkVEk/OX9uuUTftWeK2Rw6g2qnByARaQg/iDx9RXr//AASrGF8dj/sH/wDt1Xzp+0RM0n7QHjUnJA12+BPpi4cfyr3T/gl14mNp4+8U6LsBW/0+K8LY5XyZNgHXv9o9O3Ud9Z/wym9D7SooorkJCv5w/wDg8GuZH/4KR+A4Adwj+G1i4HTBOqark57fdH5V/R5X8wv/AAdK/tEeHP2gv+CldsPDtxLP/wAIP4ZTwnqm/YRFe2mq6n5yjazcDev3sHnoKYm1ex+b8bBpwq9xyeQSMZ49B1r+5oHPPrX8M8L/ADEk4IySQTjH+e/5V/Zp/wAE6/Flx48/4J/fA3Wru5F3e6r4A0K6uZht/eTPp8DSE7eAd5bIHQ5FId9T4y/4OcP+CbHiv9uv9l/wd4p8AadqXiDxr8LtUl8rRLU721Kwv/IiuDHGI2Z545YLRxl0RYhck7m2AfK3/BuD+2f4S/a3/Zd8VfsQ/FmGa+s9X07Un8NuVgRJ9PmHm3NmjABhcxSyTXcUhDnBc7kEMat+7VfzA/8ABa79gjxt/wAEjf8AgonD8Wfh7ENE8F69r58U+CNUsbaI22g36yi5fT2h8oQx+TKGMUJRo3t9gy5WVUdyJq585ftkfsk/Ff8A4Iyftk+GtM8Q3+jWfjbQF0/xd4d1jSJlvrWXbOWgnjWaMcpc28iFJ4ly0JO1o2Vm+m/F3/B0p8Z/Hl7oN/4l+Fn7PHiPU/DxE9hfah4a1CW4gkUf6xT9uAVjyflAGTwPT9GdA+LPwO/4Oov2Mtb8L32nP8Pfi54Gkub3TLGe8iuL7RZXjMcN5FKEV7nTpWaFZ0CRnfGFIUrbzN+AP7UX7JPjz9i/4yap4K+InhvUvDmu2Esoj+0wSRwajAkskQurd3A863d4n2Sr8rBTjvQNST0Po3xZ/wAF9Pj/AOPf25fBXx91yXwfqutfD2C9i8PeH5NMmj0LTY7u0e2uFWJJlncushffJOz7ggLbFVB4Rpv7ZnifRv25Z/2hINP0D/hNpfGMvjv7I0Mp0v7dJeNeFDH5vmCDzGxt8zft43E815IqjzAW3dMcj5j+XT8PamgOyL8qpsOckYUccnH+NIo9b+O37avir9o/9szUfjjr1noMHi3VdXtNae1sbeaPT1ltvKVFCPI0nl/ulyC5JJPPp98fsof8FGPG/wDwU2/4KK6l4/8AH+m+FtK1jTfh2dBgi0G2nt7ZoI9SjnVmWaaVi5a4kydwGAvAwSfyu3gLkkbUH8XYYxyD/n9a+0/+CGoMX7UPicnex/4RWfK/9vlpV0/iQ0fqiCXVWy2DzxXjXwh/Yr8L/Bj9obxZ8R9Nv/EE+t+L/tBvILqeF7SLz7lZ28tViVwQ8YAy7YGep5r2TcQcnPPYc0u7BwTXa0i2eT/tKfsVeAP2sLeBvF+lTy6jYwPBZ6ja3T29zaKxzxglHw3IEisoJPHJzyul/sBw6Z4Oh8PW3xc+M0Oj26oIbZNZtB5aqAFAb7LuCgAALnHFfQBGFGAQScdOlbvw++Gmt/FLxAmk+H9MuNUvijTGKMABEUcszMQqjkDJIGSB1IBTS3Ynbc8z/wCCa/8AwS38GfDH4l22leDNP1m8utR2LrGrXl4j3qaeJkMuDtWJQuRgKnzMEyGIFffP7b3xTT9n7wXpPw58GpY6VZapY3LX1utuzvDbSuVARnyoEjG4DdWGAQV4J6KPQtB/4J//ALPNxdsYZ/GGrwm3FxEnm/abwozIoDEYgjbqeMgZI3MFrwP9mr4Pa3+1/wDFq81/XtTtbyDSbqzl1o3RYT3sZUhY0CADlINhJK4BBG4jFZXT16Iz3d7Hvv8AwT+/ZxPw08Hr4w1CRZNT8UWMbQQ+WA1lbs7OPnVyHEq+S+CqldoB5zX0XRRXPKTbuxn5LeLPEt14w8Vanqt75ZvNVupby48obV3yOXYgHoMk4Ga9l/4J2+J5NA/aTsbNEV11uyubKQsMlAqefkYIwd0IHfgnjuPDP48knnPtXp/7GPiGDwv+034QuZ0laOW6e0AjUE7p4pIUPJHAaRSe+AeCeK7J/C0U9EfpRRRRXCSFfxuf8FSZC/8AwUq/aELOcL8S/Ei8An/mK3PH1r+yOv42f+CoIx/wUs/aGIPT4neJM9Ov9q3P8uv/AOqgDwsglOcBgcnK8k9M56ZwPwr+r3/g3H1ObVv+CMPwWlnkeWRItXhDN12x61fxqPwVQPwr+UNPnizjGSeTx9eO3fj8a/qg/wCDZXxlp/if/gjd8NLGyuI5rnw5e6zp1/Gjqxt521S6uQhAOQfKuIWwcHDg4wQSCe59815z+1p+yv4Q/bW/Z68T/DLx1ZzXfhzxTam3maBljubOQENFcwOwYJNFIFdCVZdygMrKSp9GooGz+Tz9sX9gz48/8EJP2qdG8T6Xfa9FZaJd2dz4f8fabYyR6VqU7xmU2rnLpv3Qzo9rMcyRxMxRo3BP6nfAz/gpD+zt/wAHFP7Mj/BH48yad8L/AIhXOp20unadbauIpr26iWCNLzTLm5g8lbiWW5nhWzJmm8svjeMuv6e/tC/s0+AP2sfhtc+EPiT4R0Lxn4duiz/Y9TtVmFvK0UkXnwv9+CdUlkCzRMsibyVZTzX89n/BRH/g2x+Ln/BPm18PfEH4LeJfFXxXmi1yNbaDw14evYfEegTjzJ7e6RbRpiY4zCoa4DRFZGjwnzZDIaPM/wBub/g29/aM/ZN8b+IH8F+Ddd+LngPS2tlsvEGiWduLzUTLFGXxpcNxNdjy5WeInawxHv4U18AXFnJZSmCWN45oWKMrKd6sODnPQ8d6/Ub9hP8A4Ob/AI5fsNQaz4O+Meia58Y7fTWNpbQ6/qh0zW9DnjlkMyzXMlvLNOSWKlbjLrsUKyKCp+0fhl8fv+CZv/BXd9Y17x74E8C/C/xDolyLu+l8U6rZ+CrrXbq9LSTyrPZ3sT6gVeIlnmyymQHCmVsgKR/PJlQjAdOmMZB4/wAOB7V9q/8ABDldv7Ufib+InwpN2/6e7Svt+4/4Nm/2ev2rfinrJ+Bv7XXgyTTpXkurfQdLis/FFxpkLMSF82LUUdkQMqhnTJwMkk19C/sNf8Gv3/DF/wAUdS8S/wDC8D4k/tDSn0z7N/whv2Py900Mu/f9ukzjysbcD73XjBqLtJNlRlcyR8uQCOOP/rUqKVyTgZ/CvrZv+CfHg34Z6vYXPjP4i2MVjJKGW3uEi00Xm0gugd5iSCCAdvIB6jINdve3n7PvwB8M3WsadbeFNamt5YpEt7S8h1a+LhgA0QmlYrtzuJDKPlz1xXS6q6alOe6R89fBT9hfxr8Vb+OS/srjwxpBU5vL+HEhIxwsBZZGzuyCcKQp+bPB9/8AEfxt+G/7DXhKTw54Xjj1zWxOrXVkl6WlZ8bHknm2skbDYP3YAILDCKCTXkfxe/4KG+L/AIja7Hp/g2C48O2Mhe3Ty1S5vL4s21TkofLbBGFjyQxPznjFP4N/sHeLfjc2oax4kvrvwz5lxKJDqVjNJf3Ux8tzIUk2bkbe2ZN5JZSMHkiXrrN2QtW7sxvAvgnxt+278Zk1fVob+fTJrpUvr1AYbXTrZWQtbwMwZQyq/wAqfMxLbmzlmr728AfDrRPhb4cTSNA0+HTbCN2k8qMsxZ2OSzMxLMegySeAB0AAf4I8A6L8NtBj0vQdMtNLsY8HyreML5jBVXe56u5VVBdiWOBkmtesZ1Ob0BhWT4+8Tf8ACF+BNb1kr5n9k2E97txnd5cbPjqPT1Fa1eZ/tjeJJvCv7M3i+6g+/LaLaHp9yeVIX6g/wyH/ABHWoWrSB7H5pAsJGP3ief8A61dn+z22749eCc/9B+w/9KI645BknH/661vAHipvAvjrRdbWH7U2jX8F95O/yxN5Uivt3YOM7cZwce+K73qjRs/WGisf4d+Kj46+H+ha40P2ZtZ0+3vjDv3+V5sSvt3YGcbsZwM46CtiuBmdwr+Sn/guH+xj8S/2Xv29PiJ4m8deGJNF0P4reM/EOu+Frw3dtcx6pZtqTyCQeVI5jOy4gZkkCuA65UGv61q4f4z/ALMfw2/aPTTV+Inw98D+PV0cyGwHiLQrXVBYmTZ5hi89H2b/AC03bcZ2LnOBSA/ibihMxUFmI2jcAcAc5x756H2r+ub/AIIc/sieI/2Iv+CavgTwJ418O2nhnxzBcalfa/awzW9wzzzX87RPJLAzxyP9lFsu4M2FRVz8uB6In/BMP9muMgr+zz8DgR0x4D0oY/8AIFe5UAFFFFABRRRQB8f/APBRT/gh/wDA3/gpd4h07XPGVjq3hjxLZu73Ot+FVsrHUdYBjijVbyaW2lM6xpCix7uUXIBAOK/J/wDbx/4NLPiZ8JbuDUfgJrD/ABW07UL24WXStTks9I1LSYCd0G6eWZILkbcq7qIjuClY8Mdn9EFFAmj+U+L/AINs/wBtaOTP/Cmtm0kqV8XaECD6/wDH7/nNfVf/AASo/wCCMf7W/wCzj8avEF/438AX+jaFqOgy2SA+K9Luo5ZjcW7Kpjhu3P3Fk5IwACM88/0C0VSk07oGk90fnMv7B3xXX5f+EUAB9NSs8Y/7+16L8HP+CaOsa7JHd+N78aLaMDmwsZEmvG+8MNJhok5CsNvmZU4O09PtSitHWkymzz74Gfsz+GP2f7GePR4Zbu7uJWc398kMl4qsqAxCREUiPKBtvqSa9BoorJtvcQUUUUgCuc+Lnw0tPjD8ONV8N38s0FtqkaqZIsFo2V1dGweDhlU47jjjrXR0U72Bn5MeJfDd74Q8QX2lalA1rf6dO9vcRFgxjkU4YZBIPI6gkHsa7f8AZo+A2r/Gzx7Zi10w6houmX9qdYP2iOLybd5Du4ZgWyiScKCePpX6G698HvCXirVpb/VPC3hzUr6fHmXF1psM00mFCjLMpJwAAMnoAKueFfh/oPgX7R/YmiaRo32rb532Gzjt/O2527tgG7G5sZ6ZPrW7r6aIpvQt+HtBtvC2gWOl2UflWem28drAmc7I0UKoz7ACrlFFc9yQooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigD/9k='
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
                    messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?>'
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
                            title: 'Daily Product Sales_<?php echo $today; ?>_<?php echo $this->session->userdata['userSession']['user_first_name'];?> '
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
                            messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?>',
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
                            title: 'Monthly Product Sales_<?php echo $now->format('Y-m-d'); ?>_<?php echo $this->session->userdata['userSession']['user_first_name'];?> '
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
                            messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?>',
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
                            title: 'Weekly Products Sales_<?php echo $now->format('Y-m-d'); ?>_<?php echo $this->session->userdata['userSession']['user_first_name'];?> '
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
                            messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?>',
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
                    title: 'All Products Sales_<?php echo $now->format('Y-m-d'); ?>_<?php echo $this->session->userdata['userSession']['user_first_name'];?> '
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
                    messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?>',
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
                            title: 'Daily Product Sales_<?php echo $today; ?>_<?php echo $this->session->userdata['userSession']['user_first_name'];?> '
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
                            messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?>',
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
                            title: 'Monthly Product Sales_<?php echo $now->format('Y-m-d'); ?>_<?php echo $this->session->userdata['userSession']['user_first_name'];?> '
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
                            messageBottom: 'Printed by: <?php echo $this->session->userdata['userSession']['user_first_name'];?>',
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
