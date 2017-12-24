
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
                </div><!-- user info card -->

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
                        <div class='sub header'>Display's the food information</div>
                    </div>
                </h1> <!-- header -->

                <div class='ui breadcrumb'>
                    <a class='section' href='<?php echo site_url()?>/CProduct/viewMenuList?>'>MENU</a>
                    <i class='right arrow icon divider'></i>
                    <div class='active section'>VIEW FOOD INFORMATION</div>
                </div> <!-- breadcrumb -->

                <div class='ui hidden divider'></div>

                <a href='<?php echo site_url()?>/CProduct/editMenuInfo?>'><button class='ui big circular blue icon button' title='Edit user information'><i class='pencil icon'></i></button></a> 

                <button class='ui big circular red icon button' title='Delete this item' id='deleteItem'><i class='remove icon'></i></button>

                <h3 class='ui horizontal divider header'>
                    <i class='food icon'></i> Food Information
                </h3>
                
                <table class='ui very basic table'>
                    <tbody>
                        <tr>
                            <td>FOOD NAME</td>
                            <td>Chicken Joy</td>
                        </tr>
                        <tr>
                            <td>FOOD DESCRIPTION</td>
                            <td>FOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOD</td>
                        </tr>
                        <tr>
                            <td>FOOD PRICE</td>
                            <td>P 10000.00</td>
                        </tr>
                        <tr>
                            <td>FOOD CATEGORY</td>
                            <td>Meal</td>
                        </tr>
                        <tr>
                            <td>FOOD AVAILABILITY</td>
                            <td>Available</td>
                        </tr>
                    </tbody>
                </table>
            </div> <!-- twelve wide column -->
        </div> <!-- grid -->
    </div> <!-- pusher -->
</div> <!-- segment -->


<div class="ui mini modal" id="confirmDelete">
  <div class="header">Delete item</div>
  <div class="content">
    <p>Are you sure you want to delete this item?</p>
  </div>
  <div class="actions">
    <div class="ui cancel negative button">Cancel</div>
    <a><div class="ui approve positive button">Yes</div></a>
  </div>
</div>

</body>
</html>

<script> 
$(document).ready(function(){
    $('#deleteItem').click(function(){
        $('#confirmDelete').modal('show');
    });
});
</script>