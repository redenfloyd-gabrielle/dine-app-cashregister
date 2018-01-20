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
                <a class='section' id='confirmCancelBR'>CATEGORIES</a>
                <i class='right arrow icon divider'></i>
                <div class='active section'>EDIT PRODUCT INFORMATION</div>
            </div> <!-- breadcrumb -->
        </div> <!-- segment -->
        <!-- end of header -->

        <!-- content -->
        <div class='ui segments'>
            <div class='ui basic segment'>
                <h4 class='ui header brown ribbon label'>
                    <i class="info icon"></i>
                    <div class='content'>
                        Product Information
                    </div>
                </h4> 
                <div class='ui stackable padded grid'> 
                    <?php if (isset($product)) { ?>
                    <?php foreach($product as $prod) {} ?>  
                    <div class='row'>
                        <div class='column'>
                            <form class='ui form' method='POST' action='<?php echo site_url()?>/CProduct/updateProduct/<?php echo $prod->product_id; ?>' accept-charset="utf-8" enctype="multipart/form-data">
                                <div class='nine wide field'>
                                    <label>UPLOAD IMAGE</label>
                                    <input type="hidden" name='pic' id='pic' >
                                    <input type="file" name="image" id='image' accept="image/*" >
                                </div>

                                <div class='nine wide required field'><label>FOOD NAME</label><input name='name' type='text' placeholder='Enter first name' value='<?php echo $prod->product_name;  ?>'></div>

                                <div class='nine wide  required field'><label>FOOD DESCRIPTION</label><textarea name='description' placeholder='Enter food description'><?php echo $prod->product_description;  ?></textarea></div>

                                <div class='nine wide  required field'><label>FOOD PRICE</label><input name='price' type='number' placeholder='Enter food price' value='<?php echo $prod->product_price;  ?>'></div>

                                <label>CATEGORY</label><br>
                                <input type="hidden" name="category" id="category" value="<?php echo $prod->product_category;  ?>">
                                <select class="ui dropdown" name='cat' id="cat">
                                    <option value="DRINKS">Drinks</option>
                                    <option value="PANCIT">Pancit</option>
                                    <option value="SOUP">Soup</option>
                                    <option value="MAIN COURSE">Main Course</option>  
                                    <option value="EXTRAS">Extras</option>
                                </select> <!-- availability dropdown -->

                                <div class='ui hidden divider'></div>

                                <label>AVAILABILITY</label><br>
                                <input type="hidden" name="availability" id="availability" value="<?php echo $prod->product_availability;  ?>">
                                <select class="ui dropdown" name='avail' id="avail">
                                    <option value="AVAILABLE">Available</option>
                                    <option value="NOT AVAILABLE">Not Available</option>
                                </select> <!-- availability dropdown -->

                                <div class='ui hidden divider'></div>
                                <div class='ui hidden divider'></div>

                                <a id='confirmCancel'><div class='ui submit gray button'>Cancel</div></a>

                                <button class='ui submit brown button' type='submit'>Edit</button>

                                <div class='ui hidden divider'></div>

                            </form> <!-- form -->
                        </div>
                    </div>

                    <?php } ?> 
                
                </div> <!-- ui grid -->
            </div> <!-- segment -->
        </div> <!-- segments -->
    </div> <!-- segment -->
</div> <!-- pusher -->


                    
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('#cat').val($('#category').val());
        $(document).on('change','#cat',function() {
            $('#category').val($('#cat').val());
        });

        $('#avail').val($('#availability').val());
        $(document).on('change','#avail',function() {
            $('#availability').val($('#avail').val());
        });
    });
</script> 
