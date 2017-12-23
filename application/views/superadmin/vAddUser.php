<!DOCTYPE html>
<html>
<head>
    <title>Dine-Admin Module</title>
    <link rel='stylesheet' href='assets/css/superadminAssets.css'>
    <link rel='stylesheet' href='assets/semantic/semantic.min.css'>
    <script src='assets/jquery.min.js'></script>
    <script src='assets/semantic/semantic.min.js'></script>
</head>
<body>


<div class='ui top attached inverted menu'>
    <a class='borderless item' href=''>
        <strong>DINE</strong>
    </a>
    <div class='ui right floated simple dropdown item' tabindex='0'>
        <i class='user icon'></i>Profile
        <i class='dropdown icon' tabindex='0'>
      <div class='menu' tabindex='-1'></div>
    </i>
        <div class='menu' tabindex='-1'>
            <a href='' class='item'><i class='settings icon'></i>Settings</a>
            <a href='' class='item'><i class='sign out icon'></i>Logout</a>
        </div>
    </div>
</div>
<div class='ui bottom attached segment pushable'>
    <div class='ui attached visible inverted labeled icon left inline vertical sidebar menu' id='sidebar'>
        <a class='item' href=''>
            <i class='dashboard icon'></i> Dashboard
        </a>
        <a class='active item' href=''>
            <i class='users icon'></i> Users
        </a>
    </div>
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
                </div>
                <div class='ui category search'>
                    <div class='ui fluid icon input'>
                        <input class='prompt' type='text' placeholder='Search . . .'>
                        <i class='search icon'></i>
                    </div>
                    <div class='results'></div>
                </div>
            </div>
            <div class='twelve wide column'>
                <h1 class='ui header'>
                    <div class='content'>
                        USERS
                        <div class='sub header'>Add new user</div>
                    </div>
                </h1>
                <!-- USER HEADER CLOSING-->

                <div class='ui breadcrumb'>
                    <a class='section' href=''>USERS</a>
                    <i class='right arrow icon divider'></i>
                    <div class='active section'>ADD NEW USER</div>
                </div>
                <!-- BREADCRUMB CLOSING -->

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
                            </div>
                            <div class='ui hidden divider'></div>
                            <div class='ui submit positive right floated button'>Add</div>
                            <div class='ui submit negative right floated button'>Cancel</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>