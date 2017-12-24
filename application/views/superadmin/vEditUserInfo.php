
<!-- please include vAdminFooter para muload ang dropdown -->
 
<div class='ui visible left vertical inverted sidebar labeled icon menu'>
    <div class='borderless item'>
        <strong>DINE</strong> 
    </div>
    <a class='item' href='<?php echo site_url()?>/CUser/viewSuperadminDashboard?>'>
        <i class='dashboard icon'></i> Dashboard
    </a>
    <a class='active item' href='<?php echo site_url()?>/CUser/viewUsersList?>'>
        <i class='users icon'></i> Users
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
                <div class='column'></div>
                <div class='eleven wide column'>
                    <h1 class='ui header'>
                        <div class='content'>
                            USERS
                            <div class='sub header'>Edit the user's information</div>
                        </div>
                    </h1> <!-- header -->

                    <div class='ui breadcrumb'>
                        <a class='section' href='<?php echo site_url()?>/CUser/viewUsersList?>'>USERS</a>
                        <i class='right arrow icon divider'></i>
                        <div class='active section'>EDIT INFORMATION</div>
                    </div> <!-- breadcrumb -->

                    <div class='ui hidden divider'></div>
                    <div class='ui hidden divider'></div>
                    <div class='ui hidden divider'></div>

                    <div class='content'>
                        <form class='ui form'>
                            <h3 class='ui horizontal divider header'>
                                <i class='address card outline icon'></i> User Personal Information
                            </h3>

                            <div class='ui hidden divider'></div>

                            <div class='nine wide required field'><label>FIRST NAME</label><input type='text' placeholder='Enter first name'></div>

                            <div class='nine wide  required field'><label>MIDDLE NAME</label><input type='text' placeholder='Enter middle name'></div>

                            <div class='nine wide  required field'><label>LAST NAME</label><input type='text' placeholder='Enter last name'></div>

                            <h3 class='ui horizontal divider header'><i class='user icon'></i>User Account Information</h3>

                            <div class='ui hidden divider'></div>

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
                            <div class='ui hidden divider'></div>

                            <a href="<?php echo site_url()?>/CUser/viewUsersList?>"><div class='ui submit negative button'>Cancel</div></a>

                            <div class='ui submit positive button'>Edit</div>

                            <div class='ui hidden divider'></div>

                        </form> <!-- form -->
                    </div> <!-- content -->
                </div> <!-- twelve wide column -->
            </div> <!-- grid -->
        </div> <!-- thirteen wide column -->
        <div class='column'></div>
    </div> <!-- row-->
</div> <!-- grid -->


</body>
</html>
