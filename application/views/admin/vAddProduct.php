<div class="pusher">
    <div class='ui basic segment'>
        <h1 class="ui brown dividing header">
            <i class="food icon"></i>
            <div class="content">
              PRODUCTS
              <div class="sub header">Add a new product</div>
            </div>
        </h1> <!-- header -->
        <div class='ui breadcrumb'>
            <a class='section' href='<?php echo site_url()?>/CUser/viewAdminDashboard'>HOME</a>
            <i class='right arrow icon divider'></i>
            <div class='active section'>ADD NEW PRODUCT</div>
        </div> <!-- breadcrumb -->
    </div> <!-- segment --> 
    <h3 class="ui horizontal header divider">
        <i class="food icon"></i>
        Product Information
    </h3>
    <div class='ui attached segment'> 
        <div class='ui stackable padded grid'> 
            <div class='row'>
                <div class='column'>
                    <form class='ui form' method="POST" action="<?php echo site_url()?>/CProduct/addProduct" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class='nine wide field'>
                            <label>UPLOAD IMAGE</label>
                            <input type="file" name="pic"id='pic' accept="image/*">
                        </div>

                        <div class='nine wide required field'>
                                <label>FOOD NAME</label>
                                <input type='text' placeholder='Enter first name' name="name">
                            </div>

                            <div class='nine wide  required field'>
                                <label>FOOD DESCRIPTION</label>
                                <textarea placeholder='Enter food description' name="description"></textarea>
                            </div>

                            <div class='nine wide  required field'>
                                <label>FOOD PRICE</label>
                                <input type='number' placeholder='Enter food price' name="price">
                            </div>

                            <label>CATEGORY</label><br>
                            <select class="ui dropdown" name="category">
                              <option value="">Choose category</option>
                              <option value="MEALS">Meals</option>
                              <option value="DRINKS">Drinks</option>
                              <option value="DESSERTS">Desserts</option>
                              <option value="EXTRAS">Extras</option>
                            </select> <!-- availability dropdown -->

                            <div class='ui hidden divider'></div>

                            <label>AVAILABILITY</label><br>
                            <select class="ui dropdown" name="availability">
                              <option value="">Choose availability</option>
                              <option value="1">Available</option>
                              <option value="0">Not Available</option>
                            </select> <!-- availability dropdown -->

                        <div class='ui hidden divider'></div>
                        <div class='ui hidden divider'></div>

                        <a href="<?php echo site_url()?>/CProduct/viewCategoryList?>"><div class='ui submit gray button'>Cancel</div></a>

                        <div class='ui submit brown button'>Add</div>

                        <div class='ui hidden divider'></div>

                    </form> <!-- form -->
                </div>
            </div>
        
        </div> <!-- ui grid -->
    </div> <!-- segment -->
  </div> <!-- pusher -->
</div> <!-- bottom attached segment -->



                    
</body>
</html>