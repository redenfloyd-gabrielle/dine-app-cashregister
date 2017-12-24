
<div class='ui bottom attached segment pushable'>
    <div class='ui attached visible inverted labeled icon left inline vertical sidebar menu' id='sidebar'>
        <a class='active item' href='<?php echo site_url()?>/CUser/viewSuperadminDashboard?>'>
            <i class='dashboard icon'></i> Dashboard
        </a>
        <a class='item' href='<?php echo site_url()?>/CUser/viewUsersList?>'>
            <i class='users icon'></i> Users
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
                    <div class='extra content' id='userContent' style='background-color:burlywood;'>
                        <strong><i class='user icon'></i>SUPERADMIN</strong>
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
                <h1 class='ui header'>
                    <div class='content'>
                        DASHBOARD
                        <div class='sub header'>Shows the dashboard</div>
                    </div>
                </h1>
                <div class='ui breadcrumb'>
                </div> <!-- breadcrumb -->

                <div class='ui hidden divider'></div>

            </div> <!-- twelve wide column -->
        </div> <!-- grid -->
    </div> <!-- pusher -->
</div> <!-- segment -->


</body>
</html>