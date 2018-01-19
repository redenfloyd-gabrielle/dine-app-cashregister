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


</body>
</html>
