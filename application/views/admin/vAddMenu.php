
<!-- please include vAdminFooter para muload ang dropdown -->
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
                <h1 class='ui header'>
                    <div class='content'>
                        MENU
                        <div class='sub header'>Add a new item to the menu</div>
                    </div>
                </h1> <!-- header -->

                <div class='ui breadcrumb'>
                    <a class='section' href='<?php echo site_url()?>/CProduct/viewMenuList?>'>MENU</a>
                    <i class='right arrow icon divider'></i>
                    <div class='active section'>ADD MENU</div>
                </div> <!-- breadcrumb -->

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
                            </div> <!-- category dropdown -->

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
                            </div> <!-- availability dropdown -->

                            <div class='ui hidden divider'></div>

                            <div class='ui submit positive right floated button'>Add</div>

                            <a href="<?php echo site_url()?>/CProduct/viewMenuList?>"><div class='ui submit negative right floated button'>Cancel</div></a>
                        </div> <!-- fillUpForm -->
                    </form> <!-- form -->
                </div> <!-- content -->
            </div> <!-- twelve wide column -->
        </div> <!-- grid -->
    </div> <!-- pusher -->
</div> <!-- segment -->


</body>
</html>