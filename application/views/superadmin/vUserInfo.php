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
                        <div class='sub header'>Displays the user's information</div>
                    </div>
                </h1>
                <div class='ui breadcrumb'>
                    <a class='section' href=''>USERS</a>
                    <i class='right arrow icon divider'></i>
                    <div class='active section'>VIEW USER INFORMATION</div>
                </div>
                <!-- BREADCRUMB CLOSING -->

                <div class='ui hidden divider'></div>
                <a href=''><button class='ui big circular blue icon button' title='Edit user information'><i class='pencil icon'></i></button></a>
                <button class='ui big circular red icon button' title='Delete this user'><i class='remove icon'></i></button>
                <div class='ui hidden divider'></div>

                <h3 class='ui horizontal divider header'>
                    <i class='user icon'></i> User Information
                </h3>
                <table class='ui very basic table'>
                    <tbody>
                        <tr> 
                            <td class='background-color: '>NAME</td>
                            <td>Joanne Malaluan</td>
                        </tr>
                        <tr>
                            <td>USERNAME</td>
                            <td>malaluanjo</td>
                        </tr>
                        <tr>
                            <td>EMAIL ADDRESS</td>
                            <td>malaluanjo@gmail.com</td>
                        </tr>
                        <tr>
                            <td>POSITION</td>
                            <td>Manager</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>
</html>