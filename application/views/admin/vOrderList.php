<div class="pusher">
    <div class='ui hidden segment'></div>
    <div class='ui padded segment'>
        <!-- header -->
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
        <!-- content -->
        <div class='ui segments'>
            <div class='ui basic segment'>
                <h5 class='ui header brown ribbon label'><i class='shop icon'></i>
                    Orders List
                </h5> 
                <div class='ui stackable padded grid'>
                    <div class='two column row'>
                        <div class='column'>
                            <label>
                                Show 
                                <select class='ui compact dropdown'>
                                    <option value='10'>10</option>
                                    <option value='20'>20</option>
                                    <option value='30'>30</option>
                                </select>
                                entries
                            </label>
                        </div>
                        <div class='right aligned column'></div>
                    </div>
                    <div class='row'>
                        <table class='ui sortable stackable celled table'>
                            <thead>
                                <tr>
                                    <th class='sortable sorted ascending'>Order ID</th>
                                    <th class='sortable'>Order Date</th>
                                    <th class='sortable'>Total</th>
                                    <th class='sortable'>QR Code</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                           
                                <tr class='item'>
                                    <td>1</td>
                                    <td>2018-01-02</td>
                                    <td>P 300</td>
                                    <td>----</td>
                                    <td>
                                        <a href='<?php echo site_url()?>/COrderItem/viewOrderInfo?>'><button class="ui inverted blue icon button">
                                            <i class="unhide icon"></i>
                                        </button></a>
                                    </td>
                                </tr>
                            
                            </tbody>
                        </table>
                    </div>
                    <div class='row'></div> <!-- row -->

                    <!-- pagination -->
                    <div class='two column row'>
                        <div class='middle aligned column'>
                            Showing 1 to 5 of 5 entries.
                        </div>
                        <div class='right aligned column'>
                            <div class='ui pagination menu'>
                                <a class='previous item'>Previous</a>
                                <a class='active item'>1</a>
                                <a class='next item' >Next</a>
                            </div> <!-- pagination -->
                        </div>
                    </div> <!-- two column row -->

                    <!-- end of pagination -->
                </div> <!-- ui grid -->
            </div> <!-- segment -->
        </div> <!-- segments -->
    </div> <!-- segment -->
</div> <!-- pusher -->


</body>
</html>