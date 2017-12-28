
<!-- please include vAdminFooter para muload ang dropdown -->
 
<div class='ui visible left vertical inverted sidebar labeled icon menu'>
    <div class='borderless item'>
        <strong>DINE</strong> 
    </div>
    <a class='item' href='<?php echo site_url()?>/CUser/viewAdminDashboard?>'>
        <i class='dashboard icon'></i> Dashboard
    </a>
    <a class='item' href='<?php echo site_url()?>/CProduct/viewCategoryList?>'>
        <i class='sidebar icon'></i> Menu
    </a> 
    <a class='active item' href='<?php echo site_url()?>/COrdered/viewOrderList?>'>
        <i class='shop icon'></i> Orders
    </a>
    <a class='item' href='<?php echo site_url()?>/CUser/viewReports?>'>
        <i class='bar chart icon'></i> Reports
    </a>
    <a class='item' href=''>
        <i class='calculator icon'></i> POS
    </a>
</div> <!-- sidebar menu -->


<div class='ui grid'>
    <div class='row'></div>
    <div class='row'></div>
    <div class='row'>
        <div class='two wide column'></div>
        <div class='thirteen wide column'>
            <div class='ui stackable grid'>

                <div class='four wide column'>
                    <div class='ui card'>
                        <div class='content'>
                            <div class='header'>Joanne Malaluan</div>
                            <div class='description'>
                                Employee
                            </div>
                        </div>
                        <div class='extra content' id='userContent'>
                            <strong><i class='user icon'></i>ADMIN</strong>
                        </div>
                    </div> <!-- user info card -->

                    <div class='ui category search'>
                        <div class='ui fluid icon input'>
                            <input class='prompt' type='text' placeholder='Search . . .'>
                            <i class='search icon'></i>
                        </div>
                        <div class='results'></div>
                    </div> <!-- search -->
                </div> <!-- four wide column -->
                <div class='column'></div>
                <div class='eleven wide column'>
                    <h1 class='ui header'>
                        <div class='content'>
                            ORDERS
                            <div class='sub header'>Shows the information of the order</div>
                        </div>
                    </h1> <!-- header -->

                    <div class='ui breadcrumb'>
                        <a class='section' href='<?php echo site_url()?>/COrdered/viewOrderList?>'>ORDER LIST</a>
                        <i class='right arrow icon divider'></i>
                        <div class='active section'>VIEW ORDER INFORMATION</div>
                    </div> <!-- breadcrumb -->

                    <div class='ui hidden divider'></div>
                    <p>REFERENCE NUMBER: <strong style='font-style: italic;'>00001</strong></p>

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
                                <td>70.00</td>
                                <td>3</td>
                                <td>210.00</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class='ui hidden divider'></div>
                    <p>TOTAL (P): <strong style='font-style: italic;'>200.00</strong></p>
                    <p>CASH (P): <strong style='font-style: italic;'>200.00</strong></p>
                    <p>CHANGE (P): <strong style='font-style: italic;'>200.00</strong></p>
                    <div class='ui hidden divider'></div>
                    
                </div> <!-- twelve wide column -->
            </div> <!-- grid -->
        </div> <!-- thirteen wide column -->
        <div class='column'></div>
    </div> <!-- row-->
</div> <!-- grid -->


</body>
</html>
