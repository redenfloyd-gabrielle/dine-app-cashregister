                <div class='column'></div>
                <div class='eleven wide column'>
                    <h1 class='ui header'>
                        <div class='content'>
                            MENU
                            <div class='sub header'>Add a new item to the menu</div>
                        </div>
                    </h1> <!-- header --> 

                    <div class='ui breadcrumb'>
                        <a class='section' href='<?php echo site_url()?>/CProduct/viewCategoryList'>CATEGORIES</a>
                        <i class='right arrow icon divider'></i>
                        <div class='active section'>ADD MENU</div>
                    </div> <!-- breadcrumb -->

                    <div class='ui hidden divider'></div>
                    <div class='ui hidden divider'></div>
                    <div class='ui hidden divider'></div>

                    <div class='content'>
                        <form class='ui form' method="POST" action="<?php echo site_url()?>/CProduct/addProduct" accept-charset="utf-8" enctype="multipart/form-data" >
                            <h3 class='ui horizontal divider header'>
                                <i class='food icon'></i> Food Information
                            </h3>

                            <div class='ui hidden divider'></div>

                            <div class='nine wide field'>
                                <label>UPLOAD IMAGE</label>
                                <input type="file" name="image" accept="image/*">
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

                            <a href="<?php echo site_url()?>/CProduct/viewCategoryList?>"><div class='ui submit negative button'>Cancel</div></a>

                            <button class='ui submit positive button' type="submit" >Add</button>

                            <div class='ui hidden divider'></div>

                        </form> <!-- form -->
                    </div> <!-- content -->
                </div> <!-- twelve wide column -->
            </div> <!-- grid -->
        </div> <!-- thirteen wide column -->
        <div class='column'></div>
    </div> <!-- row-->
</div> <!-- grid -->


</body>
</html>
