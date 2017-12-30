<div class="ui two column grid">
 <div class="row"></div>
  <div class="row">
    <div class="column">
      <div class="ui stackable grid">
        <div class="row">
          <div class="column"></div>
          <div class="seven wide column">
            <h1 class="huge header"><?php echo $prod_cat?></h1>
          </div>
        </div>
        <div class="row">
          <div class="column"></div>
          <div class="fourteen wide column"> 
            <div class="ui breadcrumb">
              <?php 
              if($page == 'manual'){
                echo '<a class="section" href="'.site_url().'/CProduct/viewMDashboard">Home</a>';
              }else if($page == 'qr'){
                echo '<a class="section" href="'.site_url().'/COrderItem/viewEditOrderFromProduct/'.$ordered_id.'">Home</a>';
              }
              ?>
              <i class="right chevron icon divider"></i>
              <div class="active section">Category Name</div>
            </div>  
            <input type="hidden" name="ordered_id" id="ordered_id" value="<?php echo $ordered_id; ?>">
            
            <div class="ui three cards">
            <?php if(isset($products)) { ?>
              <?php foreach ($products as $prod){ ?>
              <div class="ui grey card">
                <form method="POST" action="<?php echo site_url()?>/COrderItem/addOrderItem/<?php echo $prod->product_id?>">
                  <div class="ui grey card">
                <img class="ui centered fluid image" src= "<?php echo base_url($prod->product_image)?>">
                <div class="content">
                  <div class="header"><?php echo $prod->product_name; ?></div>
                </div>
                <div class="extra content">
                  <span class="left floated price">
                  P<span id="price"><?php echo $prod->product_price; ?>.00</span>
                  </span>
                  <button class="right floated cart pbtn" id="pbtn" type="submit">
                      <i class="cart icon"></i>
                    Order
                  </button>
                  <input type="hidden" value="<?php echo $ordered_id?> " id="ordered_id" name="ordered_id">
                </div>
              </div>
              </form>
              </div>
              <?php } ?>
            <?php }else{  echo "<i class='circle warning icon error'></i><span> No items to display.</span>" ;;}?> 
            </div>
          </div>
          <div class="column"></div>
        </div>
      </div>
    </div>
    <div id="vEditOrder" class="column">
    <!-- <?php //$this->view('pos/vEditComponent'); ?> -->
    </div>
  </div>
</div>
<!-- <div class="vdivide"></div> -->
</body>
</html>
<script>
 $(document).ready(function(){
   
    var ordered_id = $('#ordered_id').val();
   
    var dataSet = "ordered_id="+ordered_id;
    $.ajax({
        type: "POST",
        url: '<?php echo site_url()?>/COrderItem/displayOrderListFromQR',
        data: dataSet,
        cache: false,
        success: function(result){
            if(result){
               $('#vEditOrder').html(result);
            }else{
                alert("Error");
            }                         
        },
        error: function(jqXHR, errorThrown){
            console.log(errorThrown);
        }
    });
});
</script>
