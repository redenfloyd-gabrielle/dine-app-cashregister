
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
                        <div class='sub header'>Add new user</div>
                    </div>
                </h1> <!-- header -->

                <div class='ui breadcrumb'>
                    <a class='section' href='<?php echo site_url()?>/CUser/viewUsersList?>'>USERS</a>
                    <i class='right arrow icon divider'></i>
                    <div class='active section'>ADD NEW USER</div>
                </div> <!-- breadcrumb -->

                <div class='ui hidden divider'></div>
                <div class='ui hidden divider'></div>
                <div class='ui hidden divider'></div>

                <div class='content'>
                    <form class='ui form' method="POST" action="<?php echo site_url()?>/CUser/addUser?>">
                        <div id='fillUpForm'>
                            <h3 class='ui horizontal divider header'>
                                <i class='address card outline icon'></i> User Personal Information
                            </h3>

                            <div class='ui hidden divider'></div>

                            <div class='nine wide required field'><label>FIRST NAME</label><input type='text' placeholder='Enter first name' name="fname"></div>

                            <div class='nine wide  required field'><label>MIDDLE NAME</label><input type='text' placeholder='Enter middle name' name="mname"></div>

                            <div class='nine wide  required field'><label>LAST NAME</label><input type='text' placeholder='Enter last name' name="lname"></div>

                            <h3 class='ui horizontal divider header'><i class='user icon'></i>User Account Information</h3>

                            <div class='ui hidden divider'></div>

                           <!--  <div class='nine wide  required field'><label>USERNAME</label><input type='text' placeholder='Enter username' name="username"></div>

                            <div class='nine wide  required field'><label>EMAIL</label><input type='text' placeholder='Enter email address' name="email"></div> -->

                            <label>POSITION</label><br>

                            <div class='ui required search selection dropdown' name="position" >
                                <input type='hidden' name='position'>
                                <i class='dropdown icon'></i>
                                <div class='default text'>Choose user position</div>
                                <div class='menu'>
                                    <div class='item' data-value='SUPERADMIN'>Superadmin</div>
                                    <div class='item' data-value='ADMIN'>Manager</div>
                                    <div class='item' data-value='REGULAR'>Employee</div>
                                </div>
                            </div> <!-- position dropdown -->

                            <div class='ui hidden divider'></div>

                            <button class='ui submit positive right floated button' type="submit">Add</button>
                            <a href='<?php echo site_url()?>/CUser/viewUsersList?>'><div class='ui submit negative right floated button'>Cancel</div></a>
                        </div> <!-- fillUpForm -->
                    </form> <!-- form -->
                </div> <!-- content -->
            </div> <!-- twelve wide column -->
        </div> <!-- grid -->
    </div> <!-- pusher -->
</div> <!-- segment -->

</body>
</html>