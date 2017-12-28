<div class='ui visible left vertical inverted sidebar labeled icon menu'>
    <div class='borderless item'>
        <strong>DINE</strong> 
    </div>
    <a class='item' href='<?php echo site_url()?>/CUser/viewAdminDashboard'>
        <i class='dashboard icon'></i> Dashboard
    </a>
    <a class='active item' href='<?php echo site_url()?>/CProduct/viewCategoryList'>
        <i class='sidebar icon'></i> Menu
    </a> 
    <a class='item' href='<?php echo site_url()?>/COrdered/viewOrderList?>'>
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
                    <div class='row'>
                        <h1 class='ui header'>
                            <div class='content'>
                                MENU
                                <div class='sub header'>Shows the list of food by category</div> <!-- sub-header -->
                            </div> <!-- content -->
                        </h1> <!-- header -->

                        <div class='ui breadcrumb'></div><!-- breadcrumb -->

                        <div class='ui hidden divider'></div>

                        <a href='<?php echo site_url()?>/CProduct/addMenu'><button class='ui big circular green icon button' title='Add new user'><i class='plus icon'></i></button></a> <!-- Add new user -->

                        
                        <h1 class='ui horizontal divider header'>CATEGORIES</h1>
                        <div class='ui hidden divider'></div>
                         
                        <div class='ui three stackable cards'>
                            <a class='ui small card' href='<?php echo site_url()?>/CProduct/viewProductsInCategory'>
                                
                                <div class='center aligned middle aligned content' id='superadmin-card'>
                                    <img src='<?php echo base_url("assets/images/meals.svg")?>' class='ui small image'>
                                    <div class='header' id='userHeader'>
                                        MEALS
                                    </div>
                                </div>
                            </a> <!-- meal card -->

                            <a class='ui small card' href='<?php echo site_url()?>/CProduct/viewProductsInCategory'>
                                
                                <div class='center aligned middle aligned content' id='superadmin-card'>
                                    <img src='<?php echo base_url("assets/images/drinks.svg")?>' class='ui small image'>
                                    <div class='header' id='userHeader'>
                                        DRINKS
                                    </div>
                                </div>
                            </a> <!-- meal card -->

                            <a class='ui small card' href='<?php echo site_url()?>/CProduct/viewProductsInCategory'>
                                
                                <div class='center aligned middle aligned content' id='superadmin-card'>
                                    <img src='<?php echo base_url("assets/images/desserts.svg")?>' class='ui small image'>
                                    <div class='header' id='userHeader'>
                                        DESSERTS
                                    </div>
                                </div>
                            </a> <!-- meal card -->

                            <a class='ui small card' href='<?php echo site_url()?>/CProduct/viewProductsInCategory'>
                                
                                <div class='center aligned middle aligned content' id='superadmin-card'>
                                    <img src='<?php echo base_url("assets/images/extras.svg")?>' class='ui small image'>
                                    <div class='header' id='userHeader'>
                                        EXTRAS
                                    </div>
                                </div>
                            </a> <!-- meal card -->



                        </div> <!--three cards -->

                    </div> <!-- row -->
                    
                    <div class='ui hidden divider'></div>
                </div> <!-- twelve wide column -->
            </div> <!-- grid -->
        </div> <!-- thirteen wide column -->
        <div class='column'></div>
    </div> <!-- row-->
</div> <!-- grid -->
 

</body>
</html>
