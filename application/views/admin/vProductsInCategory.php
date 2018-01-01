                <div class='column'></div>
                <div class='eleven wide column'>
                    <div class='row'>
                        <h1 class='ui header'>
                            <div class='content'>
                                MENU
                                <div class='sub header'>Shows the list of food under a category</div> <!-- sub-header -->
                            </div> <!-- content -->
                        </h1> <!-- header -->


                        <div class='ui breadcrumb'>
                            <a class='section' href='<?php echo site_url()?>/CProduct/viewCategoryList?>'>CATEGORIES</a>
                            <i class='right arrow icon divider'></i>
                            <div class='active section'>VIEW LIST OF FOOD BY CATEGORY</div>
                        </div><!-- breadcrumb -->

                        <div class='ui hidden divider'></div>

                        

                        <div class='ui floating dropdown labeled icon button'>
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
                        <?php if (isset($prod_cat)) { ?>
                        <h1 class='ui horizontal divider header'><?php echo $prod_cat; ?></h1>
                        <?php } ?>
                        <div class='ui hidden divider'></div>
                        <?php if (isset($products)) { ?>
                        <?php foreach($products as $prod) { ?>
                        <div class='ui three stackable cards'>

                            <a class='ui small card' href='<?php echo site_url()?>/CProduct/viewMenuInfo'>
                                <div class='image'></div>
                                <div class='content' id='superadmin-card'>
                                    <div class='header' id='userHeader'>
                                        <?php echo $prod->product_name; ?>
                                    </div>
                                </div>
                            </a> <!-- meal card -->

                        </div> <!--three cards -->
                        <?php } ?>
                        <?php } ?>
                    </div> <!-- row -->
                    
                    <div class='ui hidden divider'></div>
                    <div class='ui grid'>
                        <div class='row'></div>
                        <div class='middle aligned eight wide column'>
                            <p>Page 1 out of 1 pages.</p>
                        </div>
                        <div class='right aligned eight wide column'>
                            <div class='ui pagination menu'>
                                <a class='active item'>1</a>
                                <a class='item'>2</a>
                                <a class='item'>3</a>
                            </div> <!-- pagination -->
                        </div>
                    </div>
                </div> <!-- twelve wide column -->
            </div> <!-- grid -->
        </div> <!-- thirteen wide column -->
        <div class='column'></div>
    </div> <!-- row-->
</div> <!-- grid -->
 

</body>
</html>
