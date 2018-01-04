<div class="pusher">
    <div class='ui hidden segment'></div>
    <div class='ui padded segment'>
        <!-- header -->
        <div class='ui basic segment'>
            <h1 class="ui brown dividing header">
                <i class="food icon"></i>
                <div class="content">
                  PRODUCTS
                  <div class="sub header">Shows the list of products under a category</div>
                </div>
            </h1> <!-- header -->
            <div class='ui breadcrumb'>
                <a class='section' href='<?php echo site_url()?>/CUser/viewAdminDashboard'>HOME</a>
                <i class='right arrow icon divider'></i>
                <a class='section' href='<?php echo site_url()?>/CProduct/viewCategoryList'>CATEGORIES</a>
                <i class='right arrow icon divider'></i>
                <div class='active section'>PRODUCT LIST</div>
            </div> <!-- breadcrumb -->
        </div> <!-- segment -->

        <!-- content -->
        <div class='ui segments'>
            <div class='ui basic segment'>
                <h5 class='ui header brown ribbon label'><i class='food icon'></i>
                    <?php if (isset($prod_cat)) { 
                        echo $prod_cat; 
                    } ?>
                </h5> 
            
                <div class='ui stackable padded grid'>
                    <?php if (isset($products)) { ?>
                    <div class='two column row'>
                        <div class='column'>
                            <label>
                                Show 
                                <select class='ui compact dropdown'>
                                    <option value='10'>10</option>
                                    <option value='20'>20</option>
                                    <option value='30'>30</option>
                                </select>
                                entries
                            </label>
                        </div>
                        <div class='right aligned column'>
                            <div class='ui floating dropdown labeled gray basic icon button'>
                                <i class='filter icon'></i>
                                <span class='text'>Filter products</span>
                                <div class='menu'>
                                    <div class='item'>
                                        <div class='ui blue empty circular label'></div>
                                        All
                                    </div>
                                    <div class='item'>
                                        <div class='ui green empty circular label'></div>
                                        Available
                                    </div>
                                    <div class='item'>
                                        <div class='ui red empty circular label'></div>
                                        Not Available
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <table class='ui sortable stackable celled table'>
                            <thead>
                                <tr>
                                    <th class='sortable sorted ascending'>Product ID</th>
                                    <th>Product Image</th>
                                    <th class='sortable'>Product Name</th>
                                    <th class='sortable'>Availability</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($products as $prod) { ?>
                                <tr class='item'>
                                    <td><?php echo $prod->product_id; ?></td>
                                    <td><img class='ui centered small image' src='<?php echo base_url($prod->product_image)?>'></td>
                                    <td><?php echo $prod->product_name; ?></td>
                                    <td>
                                        <?php 
                                            if($prod->product_availability == "AVAILABLE"){
                                                echo "<div class='ui empty large circular green label'></div>&nbsp AVAILABLE";
                                            }else{
                                                echo "<div class='ui empty large red circular label'></div>&nbsp NOT AVAILABLE";
                                            }
                                        ?>        
                                    </td>
                                    <td>
                                        <a href='<?php echo site_url()?>/CProduct/viewProductInfo/<?php echo $prod->product_id; ?>'><button class="ui inverted blue icon button">
                                            <i class="unhide icon"></i>
                                        </button></a>
                                        <a id='deleteItem'><button class="ui inverted red icon button">
                                            <i class="trash icon"></i>
                                        </button></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class='row'>
                        <div class='sixteen wide column'>
                            <div class='ui five stackable cards'>
                                <?php if (isset($products)) { ?>
                                <?php foreach($products as $prod) { ?>
                                <a class='ui small card' href='<?php echo site_url()?>/CProduct/viewProductInfo/<?php echo $prod->product_id; ?>'>
                                    <div class='image'></div>
                                    <div class='content' id='superadmin-card'>
                                        <div class='header' id='userHeader'>
                                            <?php echo $prod->product_name; ?>
                                        </div>
                                    </div>
                                </a> <!-- meal card -->
                                <?php } ?>
                                <?php } ?>
                            </div> <!-- five cards -->
                        </div> <!-- sixteen wide column -->
                    </div> <!-- row -->

                    <div class='row'></div> <!-- row -->

                    <!-- pagination -->
                    <div class='two column row'>
                        <div class='middle aligned column'>
                            Showing 1 to 5 of 5 entries.
                        </div>
                        <div class='right aligned column'>
                            <div class='ui pagination menu'>
                                <a class='previous item'>Previous</a>
                                <a class='active item'>1</a>
                                <a class='next item' >Next</a>
                            </div> <!-- pagination -->
                        </div>
                    </div> <!-- two column row -->

                    <!-- end of pagination -->

                <?php }else{
                    echo "<div class='row'></div>
                          <p style='font-size: 1.2em;'><i class='warning circle icon'></i>There are no products in this category <i class='frown icon'></i></p>
                          <div class='row'></div>
                        ";
                }

                ?>
                </div> <!-- ui grid -->   
            
            </div> <!-- segment -->
        </div> <!-- segments -->
    </div> <!-- segment -->
</div> <!-- pusher -->



<div class="ui basic modal" id="confirmDelete">
  <div class="ui icon header">
    <i class="remove icon"></i>
    Remove Item
  </div>
  <div class="content">
<form class='ui form' method='POST' action='<?php echo site_url()?>/CProduct/deleteProduct?>'>
    <center><p style='font-size: 1.5em;'>Are you sure you want to remove this item?</p></center>
    <input hidden='' type='text' name='product_id' id='product_id' value='<?php echo $prod->product_id?>'>
  </div>
  <div class="actions">
    <div class="ui gray basic cancel inverted button">
      <i class="remove icon"></i>
      No
    </div>
    <button class="ui basic brown ok inverted button" type="submit">
      <i class="checkmark icon"></i>
      Yes
    </button>
</form>
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