
<div class='ui bottom attached segment pushable'>
    <div class='ui attached visible inverted labeled icon left inline vertical sidebar menu' id='sidebar'>
        <a class='item' href='<?php echo site_url()?>/CUser/viewSuperadminDashboard?>'>
            <i class='dashboard icon'></i> Dashboard
        </a>
        <a class='active item' href='<?php echo site_url()?>/CUser/viewUsersList?>'>
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
                        USERS
                        <div class='sub header'>Shows the list of the registered users</div>
                    </div>
                </h1> <!-- header -->
                <div class='ui breadcrumb'></div> <!-- breadcrumb -->
                
                <div class='ui hidden divider'></div>

                <a href='<?php echo site_url()?>/CUser/addUser?>'><button class='ui big circular green icon button' title='Add new user'><i class='plus icon'></i></button></a>

                <div class='ui hidden divider'></div>

                <div class='ui stackable three cards'>
                    <a class='ui card' href='<?php echo site_url()?>/CUser/viewUserInfo?>'>
                        <div class='image'></div>
                        <div class='content' id='superadmin-card'>
                            <div class='header' id='userHeader'>
                                Redenfloyd
                            </div>
                            <div class='description' id='userDesc'>
                                CEO
                            </div> 
                        </div>
                    </a>
                </div> <!-- stackable cards -->

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