<!DOCTYPE html>
<html>
<head>
    <title>Dine-Admin Module</title>
    <link rel='stylesheet' href='assets/css/adminAssets.css'>
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
        <a class='active item' href=''>
            <i class='dashboard icon'></i> Dashboard
        </a>
        <a class='item' href=''>
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
                    <div class='extra content' id='userContent' >
                        <strong><i class='user icon'></i>ADMIN</strong>
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
                        DASHBOARD
                        <div class='sub header'>Shows the dashboard</div>
                    </div>
                </h1>
                <!-- DASHBOARD CONTENT -->

                <div class='ui breadcrumb'></div>
                <!-- BREADCRUMB CLOSING -->
            </div>
        </div>
    </div>
</div>


</body>
</html>