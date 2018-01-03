<div class="pusher">
    <div class='ui hidden segment'></div>
    <div class='ui padded segment'>
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
                <a class='section' href='<?php echo site_url()?>/CUser/viewAdminDashboard'>HOME</a>
                <i class='right arrow icon divider'></i>
                <a class='section' href='<?php echo site_url()?>/COrdered/viewOrderList'>ORDERS</a>
                <i class='right arrow icon divider'></i>
                <div class='active section'>ORDER INFORMATION</div>
            </div> <!-- breadcrumb -->
        </div> <!-- segment -->
        <!-- end of header -->

        <!-- content -->
        <div class='ui segments'>
            <div class='ui basic segment'>
                <h5 class='ui header brown ribbon label'><i class='info icon'></i>
                    Orders Information
                </h5> 
                <div class='ui stackable padded grid'>
                    <div class='row'>
                        <div class='two wide column'></div>
                        <div class='twelve wide column'>
                            <p>ORDER ID: <strong style='font-style: italic;'>00001</strong></p>

                            <p>ORDER DATE: <strong style='font-style: italic;'>01/20/18</strong></p>

                            <p>CASHIER: <strong style='font-style: italic;'>Lowis</strong></p>
                            <div class='ui hidden divider'></div> 

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
                                    <tr>
                                        <td>Porksilog</td>
                                        <td>P 70.00</td>
                                        <td>3</td>
                                        <td>P 210.00</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class='ui hidden divider'></div>
                            <p>TOTAL (P): <strong style='font-style: italic;'>200.00</strong></p>
                            <p>CASH (P): <strong style='font-style: italic;'>200.00</strong></p>
                            <p>CHANGE (P): <strong style='font-style: italic;'>200.00</strong></p>
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


</body>
</html>