
<!-- please include vAdminFooter para muload ang dropdown -->

<div class='ui visible left vertical inverted sidebar labeled icon menu'>
    <div class='borderless item'>
        <strong>DINE</strong>
    </div>
    <a class='item' href='<?php echo site_url()?>/CUser/viewAdminDashboard?>'>
        <i class='dashboard icon'></i> Dashboard
    </a>
    <a class='active item' href='<?php echo site_url()?>/CProduct/viewCategoryList?>'>
        <i class='sidebar icon'></i> Menu
    </a>
    <a class='item' href='<?php echo site_url()?>/COrdered/viewOrderList?>'>
        <i class='shop icon'></i> Orders
    </a>
    <a class='item' href='<?php echo site_url()?>/CUser/viewReports?>'>
        <i class='bar chart icon'></i> Reports
    </a>
    <a class='item' href=''>
        <i class='calculator icon'></i> POS
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
                <div class='column'></div>
                <div class='eleven wide column'>
                    <h1 class='ui header'>
                        <div class='content'>
                            MENU
                            <div class='sub header'>Edit information of the item</div>
                        </div>
                    </h1> <!-- header -->

                    <div class='ui breadcrumb'> 
                        <a class='section' href='<?php echo site_url()?>/CProduct/viewCategoryList?>'>CATEGORIES</a>
                        <i class='right arrow icon divider'></i>
                        <a class='section' href='<?php echo site_url()?>/CProduct/viewProductsInCategory?>'>FOOD LIST</a>
                        <i class='right arrow icon divider'></i>
                        <a class='section' href='<?php echo site_url()?>/CProduct/viewMenuInfo?>'>FOOD INFORMATION</a>
                        <i class='right arrow icon divider'></i>
                        <div class='active section'>EDIT FOOD INFORMATION</div>
                    </div> <!-- breadcrumb -->

                    <div class='ui hidden divider'></div>
                    <div class='ui hidden divider'></div>
                    <div class='ui hidden divider'></div>
                    <?php if (isset($product)) { ?>
                    <?php foreach($product as $prod) {} ?>
                    <div class='content'>
                        <form class='ui form'>
                            <h3 class='ui horizontal divider header'>
                                <i class='food icon'></i> Food Information
                            </h3>

                            <div class='ui hidden divider'></div>

                            <div class='nine wide field'>
                                <label>UPLOAD IMAGE</label>
                                <input type="file" name="pic" accept="image/*">
                            </div>

                            <div class='nine wide required field'><label>FOOD NAME</label><input type='text' placeholder='Enter first name' value='<?php echo $prod->product_name;  ?>'></div>

                            <div class='nine wide  required field'><label>FOOD DESCRIPTION</label><textarea placeholder='Enter food description'><?php echo $prod->product_description;  ?></textarea></div>

                            <div class='nine wide  required field'><label>FOOD PRICE</label><input type='number' placeholder='Enter food price' value='<?php echo $prod->product_price;  ?>'></div>

                            <label>CATEGORY</label><br>
                            <select class="ui dropdown">
                              <option value="<?php echo $prod->product_description;  ?>" class='selected'><?php echo $prod->product_category;  ?></option>
                              <option value="1">Beverage</option>
                              <option value="2">Meal</option>
                            </select> <!-- availability dropdown -->

                            <div class='ui hidden divider'></div>

                            <label>AVAILABILITY</label><br>
                            <select class="ui dropdown">
                              <option value="<?php echo $prod->product_availability;  ?>" class='selected'><?php echo $prod->product_availability;  ?></option>
                              <option value="">Choose availability</option>
                              <option value="1">Available</option>
                              <option value="0">Not Available</option>
                            </select> <!-- availability dropdown -->

                            <div class='ui hidden divider'></div>
                            <div class='ui hidden divider'></div>

                            <a href="<?php echo site_url()?>/CProduct/viewMenuInfo?>"><div class='ui submit negative button'>Cancel</div></a>

                            <div class='ui submit positive button'>Edit</div>

                            <div class='ui hidden divider'></div>

                        </form> <!-- form -->
                    </div> <!-- content -->
                </div> <!-- twelve wide column -->
            </div> <!-- grid -->
            <?php } ?>   
        </div> <!-- thirteen wide column -->
        <div class='column'></div>
    </div> <!-- row-->
</div> <!-- grid -->


</body>
</html>
