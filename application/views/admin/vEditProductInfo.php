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
            <a class='section' id='confirmCancelBR'>CATEGORIES</a>
            <i class='right arrow icon divider'></i>
            <div class='active section'>EDIT PRODUCT INFORMATION</div>
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
                        <select class="ui dropdown" name='category'>
                            <option value="<?php echo $prod->product_category;  ?>" selected='selected'><?php echo $prod->product_category;  ?></option>
                            <option value="DRINKS">Drinks</option>
                            <option value="RICE MEAL">Rice Meal</option>
                            <option value="SOUP">Soup</option>
                            <option value="MAIN COURSE">Main Course</option>  
                            <option value="EXTRAS">Extras</option>
                        </select> <!-- availability dropdown -->

                        <div class='ui hidden divider'></div>

                        <label>AVAILABILITY</label><br>
                        <select class="ui dropdown" name='availability'>
                            <option value="<?php echo $prod->product_availability;  ?>" selected='selected'>  <?php echo $prod->product_availability;  ?></option>
                            <option value="">Choose availability</option>
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
  </div> <!-- pusher -->
</div> <!-- bottom attached segment -->


                    
</body>
</html>
