<div class="pusher">
    <div class='ui hidden divider'></div>
    <div class='ui padded basic segment'>
        <!-- header -->
        <div class='ui basic segment'>
            <h1 class="ui teal dividing header">
                <i class="dashboard icon"></i>
                <div class="content">
                  PRODUCTS
                  <div class="sub header">Shows the list of products</div>
                </div>
            </h1> <!-- header -->
            <div class='ui breadcrumb'>
                <a class='section' href='<?php echo site_url()?>/CUser/viewSuperadminDashboard'>HOME</a>
                <i class='right arrow icon divider'></i>
                <div class='active section'>PRODUCTS</div>
            </div> <!-- breadcrumb -->
        </div> <!-- segment -->

        <!-- content -->
        <div class='ui segments'>
            <div class='ui basic segment'>
                <h5 class='ui header teal ribbon label'><i class='food icon'></i>
                    ALL PRODUCTS
                </h5> 
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
                        <table class='ui sortable stackable celled table' id="products">
                            <thead>
                                <tr>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Product Category</th>
                                    <th>Product Price</th>
                                    <th>Availability</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <div class='row'></div> <!-- row -->


                
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
    <button class="ui basic teal ok inverted button" type="submit">
      <i class="checkmark icon"></i>
      Yes
    </button>
</form>
  </div>
</div>

</body>
</html> 

<script> 
$(document).ready(function(){
    $(document).on('click','.deleteItem',function() {
        var id = $(this).data("id");
        $('#product_id').val(id);
        $('#confirmDelete').modal('show');
        
    });
});

$(document).ready(function() {
    $('#products').DataTable({
        "ajax" : {
            url: "<?php echo site_url();?>/CProduct/getAllProducts",
            type : 'GET',
        },
    });

    $('.message .close').on('click', function() {
        $(this).closest('.message').transition('fade');
    });
} );


</script>