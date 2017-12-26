
<!-- please include vAdminFooter para muload ang dropdown -->
 
<div class='ui visible left vertical inverted sidebar labeled icon menu'>
    <div class='borderless item'>
        <strong>DINE</strong> 
    </div>
    <a class='active item' href='<?php echo site_url()?>/CUser/viewAdminDashboard?>'>
        <i class='dashboard icon'></i> Dashboard
    </a>
    <a class='item' href='<?php echo site_url()?>/CProduct/viewCategoryList?>'>
        <i class='sidebar icon'></i> Menu
    </a> 
    <a class='item' href=''>
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
                            DASHBOARD
                            <div class='sub header'>Shows the dashboard</div>
                        </div>
                    </h1> <!-- header -->

                    <div class='ui breadcrumb'></div> <!-- breadcrumb -->

                    <div class='ui hidden divider'></div>
                    <div class='ui hidden divider'></div>
                    <div class='ui hidden divider'></div>

                    <!-- dashboard content here -->

                </div> <!-- twelve wide column -->
            </div> <!-- grid -->
        </div> <!-- thirteen wide column -->
        <div class='column'></div>
    </div> <!-- row-->
</div> <!-- grid -->


</body>
</html>
