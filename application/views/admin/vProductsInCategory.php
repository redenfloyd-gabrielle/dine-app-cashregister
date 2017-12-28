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
                                <div class='sub header'>Shows the list of food under a category</div> <!-- sub-header -->
                            </div> <!-- content -->
                        </h1> <!-- header -->


                        <div class='ui breadcrumb'>
                            <a class='section' href='<?php echo site_url()?>/CProduct/viewCategoryList?>'>CATEGORIES</a>
                            <i class='right arrow icon divider'></i>
                            <div class='active section'>VIEW LIST OF FOOD BY CATEGORY</div>
                        </div><!-- breadcrumb -->

                        <div class='ui hidden divider'></div>

                        

                        <div class='ui floating dropdown labeled icon button'>
                            <i class='filter icon'></i>
                            <span class='text'>Filter products</span>
                            <div class='menu'>
                                <div class='item'>
                                    <div class='ui blue empty circular label'></div>
                                    All
                                </div>
                                <div class='item'>
                                    <div class='ui green empty circular label'></div>
                                    Available
                                </div>
                                <div class='item'>
                                    <div class='ui red empty circular label'></div>
                                    Not Available
                                </div>
                            </div>
                        </div>

                        <h1 class='ui horizontal divider header'>CATEGORY NAME</h1>
                        <div class='ui hidden divider'></div>

                        <div class='ui three stackable cards'>

                            <a class='ui small card' href='<?php echo site_url()?>/CProduct/viewMenuInfo'>
                                <div class='image'></div>
                                <div class='content' id='superadmin-card'>
                                    <div class='header' id='userHeader'>
                                        Chicken Meal
                                    </div>
                                </div>
                            </a> <!-- meal card -->

                        </div> <!--three cards -->

                    </div> <!-- row -->
                    
                    <div class='ui hidden divider'></div>

                    <div class='center aligned middle aligned row'>
                        <div class='ui pagination menu'>
                            <a class='active item'>1</a>
                            <a class='item'>2</a>
                            <a class='item'>3</a>
                        </div> <!-- pagination -->
                    </div> <!-- row -->

                </div> <!-- twelve wide column -->
            </div> <!-- grid -->
        </div> <!-- thirteen wide column -->
        <div class='column'></div>
    </div> <!-- row-->
</div> <!-- grid -->
 

</body>
</html>
