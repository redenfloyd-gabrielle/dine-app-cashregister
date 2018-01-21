<div class="pusher">
    <div class='ui hidden divider'></div>
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
                    <div class='row'>
                        <table class='ui sortable stackable celled table' id="orders">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Total</th>
                                    <th>Reference Number</th> 
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                        
                            </tbody>
                        </table>
                    </div>
                    <div class='row'></div> <!-- row -->
                </div> <!-- ui grid -->
            </div> <!-- segment -->
        </div> <!-- segments -->
    </div> <!-- segment -->
</div> <!-- pusher -->


</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
   
        $('#orders').DataTable({
            "ajax" : {
                url: "<?php echo site_url();?>/COrdered/getOrders",
                type : 'GET',
            },
        });
    } );
</script>