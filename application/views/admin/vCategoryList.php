<div class="pusher">
    <div class='ui hidden divider'></div>
    <div class='ui padded segment'>
        <!-- header -->
        <div class='ui basic segment'>
            <h1 class="ui brown dividing header">
                <i class="food icon"></i>
                <div class="content">
                  PRODUCTS
                  <div class="sub header">Shows the categories of food</div>
                </div>
            </h1> <!-- header -->
            <div class='ui breadcrumb'>
                <a class='section' href='<?php echo site_url()?>/CUser/viewAdminDashboard'>HOME</a>
                <i class='right arrow icon divider'></i>
                <div class='active section'>CATEGORIES</div>
            </div> <!-- breadcrumb -->
        </div> <!-- segment -->
        <!-- end of header -->

        <!-- content -->
        <div class='ui segments'>
            <div class='ui basic segment'> 
                <h5 class='ui header brown ribbon label'><i class='cubes icon'></i>Categories</h5>
                <?php if($this->session->flashdata('error')){ ?>
                  <div class="ui negative message">
                    <i class="close icon"></i>
                    <div class="header">
                      Your process was unsuccessful.
                    </div>
                    <p><?php echo $this->session->flashdata('error');?></p>
                  </div>
                <?php } ?>
                <?php if($this->session->flashdata('response')){ ?>
                  <div class="ui positive message">
                    <i class="close icon"></i>
                    <div class="header">
                      Your process was successful.
                    </div>
                    <p><?php echo $this->session->flashdata('response');?></p>
                  </div>
                <?php } ?>
                <div class='ui stackable padded grid'>
                    <div class='row'>
                        <div class='right aligned column'>
                            <a href='<?php echo site_url()?>/CProduct/addNewProduct'><div class='ui basic green labeled icon button'>
                                Add Product <i class='add icon'></i>
                            </div></a> <!-- Add new product -->
                        </div>
                    </div> <!-- row -->
                    <div class='row'>
                        <div class='sixteen wide column'>
                            <div class='ui three stackable centered cards'>
                                <a class='ui small card' href='<?php echo site_url()?>/CProduct/viewProductsInCategory/PANCIT'> 
                                    <div class='center aligned middle aligned content' id='superadmin-card'>
                                        <img src='<?php echo base_url("assets/images/ricemeal.png")?>' class='ui small image'>
                                        <div class='header' id='userHeader'>
                                            PANCIT
                                        </div>
                                    </div>
                                </a> <!-- category card -->

                                <a class='ui small card' href='<?php echo site_url()?>/CProduct/viewProductsInCategory/SOUP'>  
                                    <div class='center aligned middle aligned content' id='superadmin-card'>
                                        <img src='<?php echo base_url("assets/images/soup.png")?>' class='ui small image'>
                                        <div class='header' id='userHeader'>
                                            SOUP
                                        </div>
                                    </div>
                                </a> <!-- category card -->

                                <a class='ui small card' href='<?php echo site_url()?>/CProduct/viewProductsInCategory/MAIN COURSE'>    
                                    <div class='center aligned middle aligned content' id='superadmin-card'>
                                        <img src='<?php echo base_url("assets/images/meals.svg")?>' class='ui small image'>
                                        <div class='header' id='userHeader'>
                                            MAIN COURSE
                                        </div>
                                    </div>
                                </a> <!-- category card -->

                                <a class='ui small card' href='<?php echo site_url()?>/CProduct/viewProductsInCategory/DRINKS'>    
                                    <div class='center aligned middle aligned content' id='superadmin-card'>
                                        <img src='<?php echo base_url("assets/images/drinks.svg")?>' class='ui small image'>
                                        <div class='header' id='userHeader'>
                                            DRINKS
                                        </div>
                                    </div>
                                </a> <!-- category card -->

                                <a class='ui small card' href='<?php echo site_url()?>/CProduct/viewProductsInCategory/EXTRAS'>    
                                    <div class='center aligned middle aligned content' id='superadmin-card'>
                                        <img src='<?php echo base_url("assets/images/extras.svg")?>' class='ui small image'>
                                        <div class='header' id='userHeader'>
                                            EXTRAS
                                        </div>
                                    </div>
                                </a> <!-- category card -->
                            </div> <!-- stackable cards -->
                        </div> <!-- sixteen wide column -->
                    </div> <!-- row -->
                    <div class='row'></div> <!-- row -->
                </div> <!-- stackable padded grid -->
            
            </div> <!-- segment -->
        </div> <!-- segments -->

        <!-- end of content -->
    </div> <!-- padded segment -->        
</div> <!-- pusher -->


</body>
</html> 
<script>
    $(document).ready(function(){
        $('.message .close').on('click', function() {
            $(this).closest('.message').transition('fade');
        });

    });
</script>