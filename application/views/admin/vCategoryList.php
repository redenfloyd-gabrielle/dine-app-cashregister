                <div class='column'></div>
                <div class='eleven wide column'>
                    <div class='row'>
                        <h1 class='ui header'>
                            <div class='content'>
                                MENU
                                <div class='sub header'>Shows the list of food by category</div> <!-- sub-header -->
                            </div> <!-- content -->
                        </h1> <!-- header -->

                        <div class='ui breadcrumb'></div><!-- breadcrumb -->

                        <div class='ui hidden divider'></div>

                        <a href='<?php echo site_url()?>/CProduct/addMenu'><button class='ui big circular green icon button' title='Add new food'><i class='plus icon'></i></button></a> <!-- Add new user -->

                        
                        <h1 class='ui horizontal divider header'>CATEGORIES</h1>
                        <div class='ui hidden divider'></div>
                         
                        <div class='ui three stackable cards'>
                            <a class='ui small card' href='<?php echo site_url()?>/CProduct/viewProductsInCategory/MEALS'>
                                
                                <div class='center aligned middle aligned content' id='superadmin-card'>
                                    <img src='<?php echo base_url("assets/images/meals.svg")?>' class='ui small image'>
                                    <div class='header' id='userHeader'>
                                        MEALS
                                    </div>
                                </div>
                            </a> <!-- meal card -->

                            <a class='ui small card' href='<?php echo site_url()?>/CProduct/viewProductsInCategory/DRINKS'>
                                
                                <div class='center aligned middle aligned content' id='superadmin-card'>
                                    <img src='<?php echo base_url("assets/images/drinks.svg")?>' class='ui small image'>
                                    <div class='header' id='userHeader'>
                                        DRINKS
                                    </div>
                                </div>
                            </a> <!-- meal card -->

                            <a class='ui small card' href='<?php echo site_url()?>/CProduct/viewProductsInCategory/DESSERTS'>
                                
                                <div class='center aligned middle aligned content' id='superadmin-card'>
                                    <img src='<?php echo base_url("assets/images/desserts.svg")?>' class='ui small image'>
                                    <div class='header' id='userHeader'>
                                        DESSERTS
                                    </div>
                                </div>
                            </a> <!-- meal card -->

                            <a class='ui small card' href='<?php echo site_url()?>/CProduct/viewProductsInCategory/EXTRAS'>
                                
                                <div class='center aligned middle aligned content' id='superadmin-card'>
                                    <img src='<?php echo base_url("assets/images/extras.svg")?>' class='ui small image'>
                                    <div class='header' id='userHeader'>
                                        EXTRAS
                                    </div>
                                </div>
                            </a> <!-- meal card -->
                        </div> <!--three cards -->
                    </div> <!-- row -->                    
                    <div class='ui hidden divider'></div>
                </div> <!-- twelve wide column -->
            </div> <!-- grid -->
        </div> <!-- thirteen wide column -->
        <div class='column'></div>
    </div> <!-- row-->
</div> <!-- grid -->
 

</body>
</html>
