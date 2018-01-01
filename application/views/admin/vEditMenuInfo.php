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

                            <div class='nine wide required field'><label>FOOD NAME</label><input type='text' placeholder='Enter first name'></div>

                            <div class='nine wide  required field'><label>FOOD DESCRIPTION</label><textarea placeholder='Enter food description'></textarea></div>

                            <div class='nine wide  required field'><label>FOOD PRICE</label><input type='number' placeholder='Enter food price'></div>

                            <label>CATEGORY</label><br>
                            <select class="ui dropdown">
                              <option value="">Choose category</option>
                              <option value="1">Beverage</option>
                              <option value="2">Meal</option>
                            </select> <!-- availability dropdown -->

                            <div class='ui hidden divider'></div>

                            <label>AVAILABILITY</label><br>
                            <select class="ui dropdown">
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
        </div> <!-- thirteen wide column -->
        <div class='column'></div>
    </div> <!-- row-->
</div> <!-- grid -->


</body>
</html>
