<div class="pusher">
    <div class='ui hidden divider'></div>
    <div class='ui padded basic segment'>
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
                <a class='section' href='<?php echo site_url()?>admin/dashboard'>HOME</a>
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
                <div class="ui top attached tabular menu">
                  <a class="active item" data-tab="first" id="first">ALL</a>
                  <a class="item" data-tab="second" id="second">PENDING</a>
                  <a class="item" data-tab="third" id="third">SCANNED</a>
                  <a class="item" data-tab="fourth" id="fourth">EXPIRED</a>
                </div>
                <div class="ui bottom attached active tab segment" data-tab="first">
                    <h3 class="ui grey dividing header">
                        <div class="content">
                          ALL ORDERS
                          <!-- <div class="sub header">Shows the list of orders</div> -->
                        </div>
                    </h3> <!-- header -->
                    <div class="ui hidden divider"></div>
                    <table class='ui sortable stackable celled table' id="all">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Total</th>
                                <th>Reference Number</th> 
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                    
                        </tbody>
                    </table>
                </div>
                <div class="ui bottom attached tab segment" data-tab="second">
                    <h3 class="ui grey dividing header">
                        <div class="content">
                          PENDING ORDERS
                          <!-- <div class="sub header">Shows the list of orders</div> -->
                        </div>
                    </h3> <!-- header -->
                    <div class="ui hidden divider"></div>
                    <table class='ui sortable stackable celled table' id="pending">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Total</th>
                                <th>Reference Number</th> 
                                <!-- <th>Status</th> -->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                    
                        </tbody>
                    </table>
                </div>
                <div class="ui bottom attached tab segment" data-tab="third">
                    <h3 class="ui grey dividing header">
                        <div class="content">
                          SCANNED ORDERS
                          <!-- <div class="sub header">Shows the list of orders</div> -->
                        </div>
                    </h3> <!-- header -->
                    <div class="ui hidden divider"></div>
                    <table class='ui sortable stackable celled table' id="scanned">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Total</th>
                                <th>Reference Number</th> 
                                <!-- <th>Status</th> -->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                    
                        </tbody>
                    </table>
                </div>
                <div class="ui bottom attached tab segment" data-tab="fourth">
                    <h3 class="ui grey dividing header">
                        <div class="content">
                          EXPIRED ORDERS
                          <!-- <div class="sub header">Shows the list of orders</div> -->
                        </div>
                    </h3> <!-- header -->
                    <div class="ui hidden divider"></div>
                    <table class='ui sortable stackable celled table' id="expired">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Total</th>
                                <th>Reference Number</th> 
                                <!-- <th>Status</th> -->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                    
                        </tbody>
                    </table>
                </div>
            </div> <!-- segment -->
        </div> <!-- segments -->
    </div> <!-- segment -->
</div> <!-- pusher -->


</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        var flag=0;
        $(document).on('click', '#third', function(){
            <?php $now = new DateTime(NULL, new DateTimeZone('Asia/Manila')); ?>
            if(flag==0){
                $('#scanned').DataTable({
                    "ajax" : {
                        url: "<?php echo site_url();?>getscannedorders",
                        type : 'GET',
                    },
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            },
                            title: 'Scanned Orders_<?php echo $now->format('Y-m-d'); ?>'
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            },
                            messageTop: 'This PDF contains Scanned orders from dine-app.net',
                            title: 'Scanned Orders_<?php echo $now->format('Y-m-d'); ?>'
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            },
                            messageTop: 'This PDF contains Scanned orders from dine-app.net',
                            title: 'Scanned Orders_<?php echo $now->format('Y-m-d'); ?>'
                        }
                    ]
                });
                flag++;
            }
        });

        $('.menu .item').tab();
    } );
    $(document).ready(function() {
        <?php $now = new DateTime(NULL, new DateTimeZone('Asia/Manila')); ?>
        $('#all').DataTable({
            "ajax" : {
                url: "<?php echo site_url();?>getorders",
                type : 'GET',
            },
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    },
                    title: 'All Orders_<?php echo $now->format('Y-m-d'); ?>'
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4 ]
                    },
                    messageTop: 'This PDF contains all orders from dine-app.net',
                    title: 'All Orders_<?php echo $now->format('Y-m-d'); ?>'
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4 ]
                    },
                    messageTop: 'This PDF contains all orders from dine-app.net',
                    title: 'All Orders_<?php echo $now->format('Y-m-d'); ?>'
                }
            ]
            
        });
    } );

    $(document).ready(function() {
        var flag=0;
        $(document).on('click', '#second', function(){
            <?php $now = new DateTime(NULL, new DateTimeZone('Asia/Manila')); ?>
            if(flag==0){
                $('#pending').DataTable({
                    "ajax" : {
                        url: "<?php echo site_url();?>getpendingorders",
                        type : 'GET',
                    },
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            },
                            title: 'Pending  Orders_<?php echo $now->format('Y-m-d'); ?>'
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            },
                            messageTop: 'This PDF contains Pending orders from dine-app.net',
                            title: 'Pending Orders_<?php echo $now->format('Y-m-d'); ?>'
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            },
                            messageTop: 'This PDF contains Pending orders from dine-app.net',
                            title: 'Pending Orders_<?php echo $now->format('Y-m-d'); ?>'
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
                $('#expired').DataTable({
                    "ajax" : {
                        url: "<?php echo site_url();?>getexpiredorders",
                        type : 'GET',
                    },
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            },
                            title: 'Expired Orders_<?php echo $now->format('Y-m-d'); ?>'
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            },
                            messageTop: 'This PDF contains Expired orders from dine-app.net',
                            title: 'Expired Orders_<?php echo $now->format('Y-m-d'); ?>'
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            },
                            messageTop: 'This PDF contains Expired orders from dine-app.net',
                            title: 'Expired Orders_<?php echo $now->format('M-d-Y'); ?>'
                        }
                    ]
                });
                flag++;
            }
        });
    } );
    
</script>