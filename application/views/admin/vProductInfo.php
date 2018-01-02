<div class="pusher">
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
            <a class='section' href='<?php echo site_url()?>/CProduct/viewProductsInCategory'>PRODUCT LIST</a>
            <i class='right arrow icon divider'></i>
            <div class='active section'>PRODUCT INFORMATION</div>
        </div> <!-- breadcrumb -->
    </div> <!-- segment -->
    <h3 class="ui horizontal header divider">
        <i class="food icon"></i>
        Product Information
    </h3>
    <div class='ui attached segment'> 
        <div class='ui stackable padded grid'>
            <?php if (isset($product)) { ?>
            <?php foreach($product as $prod) {} ?>    
                <div class='row'>
                    <a href='<?php echo site_url()?>/CProduct/editProductInfo/<?php echo $prod->product_id; ?>'><button class='ui circular blue icon button' title='Edit product information'><i class='pencil icon'></i>Edit item</button></a> <!-- Edit product information -->

                    <button class='ui circular red icon button' title='Delete this product' id='deleteItem'><i class='remove icon'></i>Remove item</button> <!-- Delete product -->
                </div>
                <div class='two column row'>
                    <div class='center aligned middle aligned column'>
                        <img src='<?php echo base_url($prod->product_image)?>'>
                    </div>
                    <div class='column'>
                        <h3><table class='ui very basic table'>
                            <tbody>
                                <tr>
                                    <td>FOOD NAME</td>
                                    <td style='font-style: italic;'><?php echo $prod->product_name;  ?></td>
                                </tr>
                                <tr>
                                    <td>FOOD DESCRIPTION</td>
                                    <td style='font-style: italic;'><?php echo $prod->product_description;  ?></td>
                                </tr>
                                <tr>
                                    <td>FOOD PRICE</td>
                                    <td style='font-style: italic;'><?php echo $prod->product_price;  ?></td>
                                </tr>
                                <tr>
                                    <td>FOOD CATEGORY</td>
                                    <td style='font-style: italic;'><?php echo $prod->product_category;  ?></td>
                                </tr>
                                <tr>
                                    <td>FOOD AVAILABILITY</td>
                                    <td style='font-style: italic;'><?php echo $prod->product_availability;  ?></td>
                                </tr>
                            </tbody>
                        </table><h3>
                    </div>
                </div>
            <?php } ?> 
            <div class='row'></div> <!-- row -->
        </div> <!-- ui grid -->
    </div> <!-- segment -->
  </div> <!-- pusher -->
</div> <!-- bottom attached segment -->



<div class="ui mini modal" id="confirmDelete">
  <div class="header">Remove item</div>
  <div class="content">
    <p>Are you sure you want to remove this item?</p>
  </div>
  <div class="actions">
    <div class="ui cancel gray button">Cancel</div>
    <a><div class="ui approve brown button">Yes</div></a>
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