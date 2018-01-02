  <div class="pusher">
    <div class='ui basic segment'>
        <h1 class="ui brown dividing header">
            <i class="shop icon"></i>
            <div class="content">
              ORDERS
              <div class="sub header">Shows the list of orders</div>
            </div>
        </h1> <!-- header -->
        <div class='ui breadcrumb'>
            <a class='section' href='<?php echo site_url()?>/CUser/viewAdminDashboard'>HOME</a>
            <i class='right arrow icon divider'></i>
            <div class='active section'>ORDERS</div>
        </div> <!-- breadcrumb -->
    </div> <!-- segment -->
    <h3 class="ui horizontal header divider">
        Order List
    </h3>
    <div class='ui segment'> 
        <div class='ui stackable padded grid'>
            <div class='row'>
                <div class='column'>
                    <table class='ui very basic large sortable striped table'>
                        <thead>
                            <tr>
                                <th>Reference Number</th>
                                <th>Total</th>
                                <th>Order Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>  
                                <td>00001</td>
                                <td>300.00</td>
                                <td>01/05/18</td>
                                <td>
                                    <a href='<?php echo site_url()?>/COrderItem/viewOrderInfo?>'>
                                        <div class="ui blue horizontal label">View Order</div>
                                    </a>
                                </td>
                            </tr>
                            <tr>  
                                <td>00020</td>
                                <td>150.00</td>
                                <td>01/05/18</td>
                                <td>
                                    <a href='<?php echo site_url()?>/COrderItem/viewOrderInfo?>'>
                                        <div class="ui blue horizontal label">View Order</div>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table> 
                </div>
            </div>
            <div class='row'></div> <!-- row -->
            <div class='two column row'>
                <div class='middle aligned column'>
                    Pages 1 out of 1 pages.
                </div>
                <div class='right aligned column'>
                    <div class='ui pagination menu'>
                        <a class='active item'>1</a>
                    </div> <!-- pagination -->
                </div>
            </div> <!-- two column row -->
        </div> <!-- ui grid -->
    </div> <!-- segment -->
  </div> <!-- pusher -->
</div> <!-- bottom attached segment -->


</body>
</html>