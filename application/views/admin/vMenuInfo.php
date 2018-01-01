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
                        <div class='header'><?php echo $this->session->userdata['userSession']['user_first_name'].' '.$this->session->userdata['userSession']['user_mi'].'. '.$this->session->userdata['userSession']['user_last_name'];?></div>
                            <div class='description'>
                                <?php echo $this->session->userdata['userSession']['user_type']; ?>
                            </div>
                            <input type="hidden" id="pass" value="<?php echo strtolower($this->session->userdata['userSession']['user_password']); ?>"> </div>
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
                            <div class='sub header'>Display's the food information</div>
                        </div>
                    </h1> <!-- header -->

                    <div class='ui breadcrumb'> 
                        <a class='section' href='<?php echo site_url()?>/CProduct/viewCategoryList?>'>CATEGORIES</a>
                        <i class='right arrow icon divider'></i>
                        <a class='section' href='<?php echo site_url()?>/CProduct/viewProductsInCategory'>FOOD LIST</a>
                        <i class='right arrow icon divider'></i>
                        <div class='active section'>VIEW FOOD INFORMATION</div>
                    </div> <!-- breadcrumb -->
                    <?php if (isset($product)) { ?>
                    <?php foreach($product as $prod) {} ?>
                    <div class='ui hidden divider'></div>

                    <a href='<?php echo site_url()?>/CProduct/editMenuInfo/<?php echo $prod->product_id; ?>'><button class='ui big circular blue icon button' title='Edit user information'><i class='pencil icon'></i></button></a> 

                    <button class='ui big circular red icon button' title='Delete this item' id='deleteItem'><i class='remove icon'></i></button>

                    <h3 class='ui horizontal divider header'>
                        <i class='food icon'></i> Food Information
                    </h3>
                    
                    <div class='ui grid'>
                        <div class='row'>
                            <div class='center aligned middle aligned six wide column'>
                                <img src='<?php echo base_url($prod->product_image)?>'>
                            </div>
                            <div class='nine wide column'>
                                <table class='ui very basic table' style='overflow:hidden;'>
                                    <tbody>
                                        <tr>
                                            <td>FOOD NAME</td>
                                            <td><?php echo $prod->product_name;  ?></td>
                                        </tr>
                                        <tr>
                                            <td>FOOD DESCRIPTION</td>
                                            <td><?php echo $prod->product_description;  ?></td>
                                        </tr>
                                        <tr>
                                            <td>FOOD PRICE</td>
                                            <td><?php echo $prod->product_price;  ?></td>
                                        </tr>
                                        <tr>
                                            <td>FOOD CATEGORY</td>
                                            <td><?php echo $prod->product_category;  ?></td>
                                        </tr>
                                        <tr>
                                            <td>FOOD AVAILABILITY</td>
                                            <td><?php echo $prod->product_availability;  ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class='column'></div>
                        </div>
                    </div>
                <?php } ?>        
                </div> <!-- twelve wide column -->
            </div> <!-- grid -->
        </div> <!-- thirteen wide column -->
        <div class='column'></div>
    </div> <!-- row-->
</div> <!-- grid -->




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