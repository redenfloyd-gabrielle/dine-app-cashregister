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
            <div class='active section'>PRODUCT LIST</div>
        </div> <!-- breadcrumb -->
    </div> <!-- segment -->
    <?php if (isset($prod_cat)) { ?>
    <h3 class="ui horizontal header divider">
        <i class='food icon'></i>
        <?php echo $prod_cat; ?>
    </h3>
    <?php } ?>
    <div class='ui hidden divider'></div>
    <div class='ui attached segment'> 
        <div class='ui stackable padded grid'>
            <div class='row'>
                <div class='ui floating dropdown labeled brown icon button'>
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
                        </div> <!--three cards -->
                      
                </div> <!-- sixteen wide column -->
            </div> <!-- row -->

            <div class='row'></div> <!-- row -->

            <div class='two column row'>
                <div class='middle aligned column'>
                    Pages 1 out of 1 pages.
                </div>
                <div class='right aligned column'>
                    <div class='ui pagination menu'>
                        <a class='active item'>1</a>
                    </div> <!-- pagination -->
                </div>
            </div> <!-- two column row -->

        </div> <!-- ui grid -->
    </div> <!-- segment -->
  </div> <!-- pusher -->
</div> <!-- bottom attached segment -->


</body>
</html> 