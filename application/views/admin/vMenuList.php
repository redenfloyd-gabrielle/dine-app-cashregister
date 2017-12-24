
<div class='ui bottom attached segment pushable'>
    <div class='ui attached visible inverted labeled icon left inline vertical sidebar menu' id='sidebar'>
        <a class='item' href='<?php echo site_url()?>/CUser/viewAdminDashboard?>'>
            <i class='dashboard icon'></i> Dashboard
        </a>
        <a class='active item' href='<?php echo site_url()?>/CProduct/viewMenuList?>'>
            <i class='sidebar icon'></i> Menu
        </a>
        <a class='item' href=''>
            <i class='shop icon'></i> Orders
        </a>
        <a class='item' href=''>
            <i class='bar chart icon'></i> Reports
        </a>
        <a class='item' href=''>
            <i class='calculator icon'></i> POS
        </a>
    </div> <!-- sidebar menu -->
    <div class='pusher' id='pusher'>
        <div class='ui grid'>
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

            <div class='twelve wide column'>
                <div class='row'>
                    <h1 class='ui header'>
                        <div class='content'>
                            MENU
                            <div class='sub header'>Shows the list of food available in the menu</div> <!-- sub-header -->
                        </div> <!-- content -->
                    </h1> <!-- header -->

                    <div class='ui breadcrumb'></div><!-- breadcrumb -->

                    <div class='ui hidden divider'></div>

                    <a href='<?php echo site_url()?>/CProduct/addMenu?>'><button class='ui big circular green icon button' title='Add new user'><i class='plus icon'></i></button></a> <!-- Add new user -->

                    <div class='ui hidden divider'></div>

                    <div class='ui stackable three cards'>

                        <a class='ui card' href='<?php echo site_url()?>/CProduct/viewMenuInfo'>
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
    </div> <!-- pusher -->
</div> <!-- segment -->

</body>
</html>