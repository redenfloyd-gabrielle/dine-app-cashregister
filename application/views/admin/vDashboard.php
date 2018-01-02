  <div class="pusher">
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
            <div class='active section'>DASHBOARD</div>
        </div> <!-- breadcrumb -->
    </div> <!-- segment -->
    <div class='ui segment'> 
        <div class='ui labeled three icon item menu'>
            <a href='<?php echo site_url()?>/CProduct/viewCategoryList?>' class='item'><i class='food icon'></i>PRODUCTS</a>
            <a href='<?php echo site_url()?>/COrdered/viewOrderList?>' class='item'><i class='shop icon'></i>ORDERS</a>
            <a href='<?php echo site_url()?>/CReports/viewReports?>' class='item'><i class='calculator icon'></i>REPORTS</a>
        </div> 

        <div class='ui stackable padded grid'>
            <div class='row'>
                <div class='sixteen wide tablet sixteen wide mobile four wide computer column'>
                    <div class='ui left aligned segment'>
                        <div class='ui two column grid'>
                            <div class='center aligned middle aligned column'>
                                <div class='ui grey statistic'>
                                    <div class='value'> 
                                        23   
                                    </div>
                                    <div class='label'>Orders</div>
                                </div>
                            </div> 
                            <div class='right aligned middle aligned column'>
                                <i class='teal huge shopping cart icon'></i>
                            </div>
                        </div>
                    </div>
                </div> <!-- column -->
                <div class='sixteen wide tablet sixteen wide mobile four wide computer column'>
                    <div class='ui left aligned segment'>
                        <div class='ui two column grid'>
                            <div class='center aligned middle aligned column'>
                                <div class='ui grey statistic'>
                                    <div class='value'> 
                                        40  
                                    </div>
                                    <div class='label'>PRODUCTS</div>
                                </div>
                            </div> 
                            <div class='right aligned middle aligned column'>
                                <i class='purple huge food icon'></i>
                            </div>
                        </div>
                    </div>
                </div> <!-- column -->
                <div class='sixteen wide tablet sixteen wide mobile eight wide computer column'>
                    <div class='ui left aligned segment'>
                        <div class='ui two column grid'>
                            <div class='center aligned middle aligned column'>
                                <div class='ui grey statistic'>
                                    <div class='value'> 
                                        123,456  
                                    </div>
                                    <div class='label'>TOTAL SALES</div>
                                </div>
                            </div> 
                            <div class='right aligned middle aligned column'>
                                <i class='blue huge dollar icon'></i>
                            </div>
                        </div>
                    </div>
                </div> <!-- column -->
            </div> <!-- row -->
        </div> <!-- ui grid -->
    </div>
  </div> <!-- pusher -->
</div> <!-- bottom attached segment -->


</body>
</html>
