<div class="pusher">
    <div class='ui hidden divider'></div>
    <div class='ui padded basic segment'>
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
                <div class='active section'>PRODUCT INFORMATION</div>
            </div> <!-- breadcrumb -->
        </div> <!-- segment -->
        <!-- end of header -->

        <!-- content -->
        <div class='ui segments'>
            <div class='ui basic segment'> 
                <h5 class='ui header brown ribbon label'><i class='info icon'></i>Product Information</h5>
                <?php if($this->session->flashdata('error')){ ?>
                  <div class="ui negative message">
                    <i class="close icon"></i>
                    <div class="header">
                      Your process was unsuccessful.
                    </div>
                    <p><?php echo $this->session->flashdata('error');?></p>
                  </div>
                <?php } ?>
                <div class='ui stackable padded grid'>
                    <?php if (isset($product)) { ?>
                    <?php foreach($product as $prod) {} ?>  
                        <div class='row'>
                            <div class='right aligned column'>
                                <a href='<?php echo site_url()?>/CProduct/editProductInfo/<?php echo $prod->product_id; ?>'>
                                    <div class='ui basic blue labeled icon button'>
                                        Edit <i class='pencil icon'></i>
                                    </div>
                                </a> <!-- Edit product information -->
                            </div>
                        </div>
                        <div class='two column row'>
                            <div class='center aligned middle aligned column'>
                                <img class="ui large centered image" src='<?php echo base_url($prod->product_image)?>'>
                            </div>
                            <div class='column'>
                                <p style='font-size: 1em;'>PRODUCT ID &nbsp &nbsp| &nbsp &nbsp <span style='font-size: 1.2em; font-style: italic; font-weight: bold;'><?php echo $prod->product_id; ?></span></p>
                                <div class='ui divider'></div>

                                <p style='font-size: 1em;'>PRODUCT NAME &nbsp &nbsp| &nbsp &nbsp <span style='font-size: 1.2em; font-style: italic; font-weight: bold;'><?php echo $prod->product_name; ?></span></p>
                                <div class='ui divider'></div>

                                <p style='font-size: 1em;'>PRODUCT DESCRIPTION &nbsp &nbsp| &nbsp &nbsp <span style='font-size: 1.2em; font-style: italic; font-weight: bold;'><?php echo $prod->product_description; ?></span></p>
                                <div class='ui divider'></div>

                                <p style='font-size: 1em;'>PRODUCT PRICE &nbsp &nbsp| &nbsp &nbsp P <span style='font-size: 1.2em; font-style: italic; font-weight: bold;'><?php echo $prod->product_price; ?>.00</span></p>
                                <div class='ui divider'></div>

                                <p style='font-size: 1em;'>PRODUCT CATEGORY &nbsp &nbsp| &nbsp &nbsp <span style='font-size: 1.2em; font-style: italic; font-weight: bold;'><?php echo $prod->product_category; ?></span></p>
                                <div class='ui divider'></div>

                                <p style='font-size: 1em;'>PRODUCT AVAILABILITY &nbsp &nbsp| &nbsp &nbsp <span style='font-size: 1.2em; font-style: italic; font-weight: bold;'><?php echo $prod->product_availability; ?></span></p>
                                <div class='ui divider'></div>
                            </div>
                        </div>
                    <?php } ?> 
                    <div class='row'></div> <!-- row -->
                </div> <!-- ui grid -->    
            </div> <!-- segment -->
        </div> <!-- segments -->
    </div> <!-- padded segment -->
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
    $('.message .close').on('click', function() {
        $(this).closest('.message').transition('fade');
    });
});
</script>