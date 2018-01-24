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
              <div class='center aligned column'>
                <h3 class="ui horizontal divider header"><i class="food icon"></i>SOLD PRODUCTS</h3>
                <!-- display 10 products -->
                <table class='ui celled compact table'>
                  <thead>
                    <tr> 
                      <td><b>Product Name</b></td>
                      <td><b>Product Quantity</b></td>  
                      <td><b>Product Total</b></td>
                    </tr>
                  </thead>
                </table>
                <div class="ui hidden divider"></div>
                <a href='<?php echo site_url()?>/CReports/downloadToExcel/<?php echo $str ?>'><button class='ui circular blue icon button' title='Edit product information'>Download to Excel</button></a>
              </div>
              <div class='center aligned middle aligned column'>
                PIE CHART HERE
              </div>
            </div>
            <div class="row"></div>
            <div class='five wide center aligned middle aligned column'>
              <!-- i display dri ang graph -->
              <h3 class="ui horizontal divider header">Daily Sales</h3>
              <div class='ui container'>
                CHART HERE
              </div>
            </div>
            <div class='five wide center aligned middle aligned column'>
              <!-- i display dri ang graph -->
              <h3 class="ui horizontal divider header">Weekly Sales</h3>
              <div class='ui container'>
                CHART HERE
              </div>
            </div>
            <div class='five wide center aligned middle aligned column'>
              <!-- i display dri ang graph -->
              <h3 class="ui horizontal divider header">Monthly Sales</h3>
              <div class='ui container'>
                CHART HERE
              </div>
            </div>
            <div class='row'></div> <!-- row -->
          </div> <!-- stackable padded grid -->
        </div>



        <div class="ui bottom attached tab segment" data-tab="second">
          <!-- DIRI MAG START ANG CONTENTS SA REPORTS PAGE -->
          <div class='ui stackable padded grid'>  
            <div class='two column row'>
              <!-- DIRI ISUD ANG CONTENTS (e.g. graphs and shit) -->
              <div class='center aligned column'>
                <h3 class="ui horizontal divider header"><i class="food icon"></i>SOLD PRODUCTS</h3>
                <!-- display 10 products -->
                <table class='ui celled compact table'>
                  <thead>
                    <tr> 
                      <td><b>Product Name</b></td>
                      <td><b>Product Quantity</b></td>  
                      <td><b>Product Total</b></td>
                    </tr>
                  </thead>
                </table>
                <div class="ui hidden divider"></div>
                <a href='<?php echo site_url()?>/CReports/downloadToExcel/<?php echo $str ?>'><button class='ui circular blue icon button' title='Edit product information'>Download to Excel</button></a>
              </div>
              <div class='center aligned middle aligned column'>
                PIE CHART HERE
              </div>
            </div>
            <div class="row"></div>
            <div class='five wide center aligned middle aligned column'>
              <!-- i display dri ang graph -->
              <h3 class="ui horizontal divider header">Daily Sales</h3>
              <div class='ui container'>
                CHART HERE
              </div>
            </div>
            <div class='five wide center aligned middle aligned column'>
              <!-- i display dri ang graph -->
              <h3 class="ui horizontal divider header">Weekly Sales</h3>
              <div class='ui container'>
                CHART HERE
              </div>
            </div>
            <div class='five wide center aligned middle aligned column'>
              <!-- i display dri ang graph -->
              <h3 class="ui horizontal divider header">Monthly Sales</h3>
              <div class='ui container'>
                CHART HERE
              </div>
            </div>
            <div class='row'></div> <!-- row -->
          </div> <!-- stackable padded grid -->
        </div>


        <div class="ui bottom attached tab segment" data-tab="third">
          <!-- DIRI MAG START ANG CONTENTS SA REPORTS PAGE -->
          <div class='ui stackable padded grid'>  
            <div class='two column row'>
              <!-- DIRI ISUD ANG CONTENTS (e.g. graphs and shit) -->
              <div class='center aligned column'>
                <h3 class="ui horizontal divider header"><i class="food icon"></i>SOLD PRODUCTS</h3>
                <!-- display 10 products -->
                <table class='ui celled compact table'>
                  <thead>
                    <tr> 
                      <td><b>Product Name</b></td>
                      <td><b>Product Quantity</b></td>  
                      <td><b>Product Total</b></td>
                    </tr>
                  </thead>
                </table>
                <div class="ui hidden divider"></div>
                <a href='<?php echo site_url()?>/CReports/downloadToExcel/<?php echo $str ?>'><button class='ui circular blue icon button' title='Edit product information'>Download to Excel</button></a>
              </div>
              <div class='center aligned middle aligned column'>
                PIE CHART HERE
              </div>
            </div>
            <div class="row"></div>
            <div class='five wide center aligned middle aligned column'>
              <!-- i display dri ang graph -->
              <h3 class="ui horizontal divider header">Daily Sales</h3>
              <div class='ui container'>
                CHART HERE
              </div>
            </div>
            <div class='five wide center aligned middle aligned column'>
              <!-- i display dri ang graph -->
              <h3 class="ui horizontal divider header">Weekly Sales</h3>
              <div class='ui container'>
                CHART HERE
              </div>
            </div>
            <div class='five wide center aligned middle aligned column'>
              <!-- i display dri ang graph -->
              <h3 class="ui horizontal divider header">Monthly Sales</h3>
              <div class='ui container'>
                CHART HERE
              </div>
            </div>
            <div class='row'></div> <!-- row -->
          </div> <!-- stackable padded grid -->
        </div>

        <div class="ui bottom attached tab segment" data-tab="fourth">
          <!-- DIRI MAG START ANG CONTENTS SA REPORTS PAGE -->
          <div class='ui stackable padded grid'>  
            <div class='two column row'>
              <!-- DIRI ISUD ANG CONTENTS (e.g. graphs and shit) -->
              <div class='center aligned column'>
                <h3 class="ui horizontal divider header"><i class="food icon"></i>SOLD PRODUCTS</h3>
                <!-- display 10 products -->
                <table class='ui celled compact table'>
                  <thead>
                    <tr> 
                      <td><b>Product Name</b></td>
                      <td><b>Product Quantity</b></td>  
                      <td><b>Product Total</b></td>
                    </tr>
                  </thead>
                </table>
                <div class="ui hidden divider"></div>
                <a href='<?php echo site_url()?>/CReports/downloadToExcel/<?php echo $str ?>'><button class='ui circular blue icon button' title='Edit product information'>Download to Excel</button></a>
              </div>
              <div class='center aligned middle aligned column'>
                PIE CHART HERE
              </div>
            </div>
            <div class="row"></div>
            <div class='five wide center aligned middle aligned column'>
              <!-- i display dri ang graph -->
              <h3 class="ui horizontal divider header">Daily Sales</h3>
              <div class='ui container'>
                CHART HERE
              </div>
            </div>
            <div class='five wide center aligned middle aligned column'>
              <!-- i display dri ang graph -->
              <h3 class="ui horizontal divider header">Weekly Sales</h3>
              <div class='ui container'>
                CHART HERE
              </div>
            </div>
            <div class='five wide center aligned middle aligned column'>
              <!-- i display dri ang graph -->
              <h3 class="ui horizontal divider header">Monthly Sales</h3>
              <div class='ui container'>
                CHART HERE
              </div>
            </div>
            <div class='row'></div> <!-- row -->
          </div> <!-- stackable padded grid -->
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
