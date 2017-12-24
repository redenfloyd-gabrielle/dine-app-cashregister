
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
                        <div class='sub header'>Edit user's information</div>
                    </div>
                </h1> <!-- header -->

                <div class='ui breadcrumb'>
                    <a class='section' href='<?php echo site_url()?>/CUser/viewUsersList?>'>USERS</a>
                    <i class='right arrow icon divider'></i>
                    <div class='active section'>EDIT USER INFORMATION</div>
                </div> <!-- breadcrumb -->

                <div class='ui hidden divider'></div>
                <div class='ui hidden divider'></div>
                <div class='ui hidden divider'></div>

                <div class='content'>
                    <form class='ui form'>
                        <div id='fillUpForm'>
                            <h3 class='ui horizontal divider header'>
                                <i class='address card outline icon'></i> User Personal Information
                            </h3>

                            <div class='ui hidden divider'></div>

                            <div class='nine wide required field'><label>FIRST NAME</label><input type='text' placeholder='Enter first name'></div>

                            <div class='nine wide  required field'><label>MIDDLE NAME</label><input type='text' placeholder='Enter middle name'></div>

                            <div class='nine wide  required field'><label>LAST NAME</label><input type='text' placeholder='Enter last name'></div>

                            <h3 class='ui horizontal divider header'><i class='user icon'></i>User Account Information</h3>

                            <div class='ui hidden divider'></div>

                            <div class='nine wide  required field'><label>USERNAME</label><input type='text' placeholder='Enter username'></div>

                            <div class='nine wide  required field'><label>EMAIL</label><input type='text' placeholder='Enter email address'></div>

                            <label>POSITION</label><br>
                            <div class='ui required search selection dropdown'>
                                <input type='hidden' name='position'>
                                <i class='dropdown icon'></i>
                                <div class='default text'>Choose user position</div>
                                <div class='menu'>
                                    <div class='item' data-value='1'>Manager</div>
                                    <div class='item' data-value='2'>Employee</div>
                                </div>
                            </div> <!-- position dropdown -->

                            <div class='ui hidden divider'></div>

                            <div class='ui submit positive right floated button'>Update</div>
                            <a href='<?php echo site_url()?>/CUser/viewUserInfo?>'><div class='ui submit negative right floated button'>Cancel</div></a>
                        </div> <!-- fillUpForm -->
                    </form> <!-- form -->
                </div> <!-- content -->
            </div> <!-- twelve wide column -->
        </div> <!-- grid -->
    </div> <!-- pusher -->
</div> <!-- segment -->

</body>
</html>