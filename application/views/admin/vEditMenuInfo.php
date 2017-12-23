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
        <a class='item' href=''>
            <i class='dashboard icon'></i> Dashboard
        </a>
        <a class='active item' href=''>
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
                    <div class='extra content' id='userContent'>
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
                        MENU
                        <div class='sub header'>Edit the information of the item</div>
                    </div>
                </h1>
                <!-- USER HEADER CLOSING-->

                <div class='ui breadcrumb'>
                    <a class='section' href=''>MENU</a>
                    <i class='right arrow icon divider'></i>
                    <div class='active section'>EDIT MENU</div>
                </div>
                <!-- BREADCRUMB CLOSING -->

                <div class='ui hidden divider'></div>
                <div class='ui hidden divider'></div>
                <div class='ui hidden divider'></div>
                <div class='content'>
                    <form class='ui form'>
                        <div id='fillUpForm'>
                            <h3 class='ui horizontal divider header'>
                                <i class='food icon'></i> Food Information
                            </h3>
                            <div class='ui hidden divider'></div>
                            <div class='nine wide required field'><label>FOOD NAME</label><input type='text' placeholder='Enter first name'></div>
                            <div class='nine wide  required field'><label>FOOD DESCRIPTION</label><textarea placeholder='Enter food description'></textarea></div>
                            <div class='nine wide  required field'><label>FOOD PRICE</label><input type='number' placeholder='Enter food price'></div>

                            <label>CATEGORY</label><br>
                            <div class='ui required search selection dropdown'>
                                <input type='hidden' name='positon'>
                                <i class='dropdown icon'></i>
                                <div class='default text'>Choose food category</div>
                                <div class='menu'>
                                    <div class='item' data-value='1'>Beverage</div>
                                    <div class='item' data-value='2'>Meal</div>
                                </div>
                            </div>
                            <div class='ui hidden divider'></div>
                            <label>AVAILABILITY</label><br>
                            <div class='ui required search selection dropdown'>
                                <input type='hidden' name='position'>
                                <i class='dropdown icon'></i>
                                <div class='default text'>Choose food availability</div>
                                <div class='menu'>
                                    <div class='item' data-value='1'>Available</div>
                                    <div class='item' data-value='0'>Not Available</div>
                                </div>
                            </div>
                            <div class='ui hidden divider'></div>
                            <div class='ui submit positive right floated button'>Update</div>
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