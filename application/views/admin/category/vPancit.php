<div class="pusher">
    <div class='ui hidden divider'></div>
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
                    <div class='row'>
                        <table class='ui sortable stackable celled table' id="pancit">
                            <thead>
                                <tr>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Availability</th> 
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                        
                            </tbody>
                        </table>
                    </div>

                    <div class='row'></div> <!-- row -->


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
    <input type='hidden' name='product_id' id='product_id' value="">
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

<div class="ui basic modal" id="confirmRestock">
  <div class="ui icon header">
    <i class="remove icon"></i>
    Restock Item
  </div>
  <div class="content">
<form class='ui form' method='POST' action='<?php echo site_url()?>/CProduct/restockProduct'>
    <center><p style='font-size: 1.5em;'>Are you sure you want to restock this item?</p></center>
    <input type='hidden' name='rproduct_id' id='rproduct_id' value="">
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

</body>
</html> 

<script> 
$(document).ready(function(){
    $(document).on('click','.deleteItem',function() {
        var id = $(this).data("id");
        $('#product_id').val(id);
        $('#confirmDelete').modal('show');
        
    });

    $(document).on('click','.restockProduct',function() {
        var id = $(this).data("id");
        $('#rproduct_id').val(id);
        $('#confirmRestock').modal('show');
        
    });
});


$(document).ready(function() {
   
    $('#pancit').DataTable({
        "ajax" : {
            url: "<?php echo site_url();?>/CProduct/getPancit",
            type : 'GET',
        },
    });
} );


</script>