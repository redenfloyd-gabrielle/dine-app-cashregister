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
              <a class="section" href="<?php echo site_url()?>/CProduct/viewMDashboard?>">Home</a>
              <i class="right chevron icon divider"></i>
              <div class="active section">Category Name</div>
            </div>  
       
            <div class="ui three cards">
            <?php if(isset($products)) { ?>
              <?php $x=0; foreach ($products as $prod){ ?>
              <div class="ui grey card">
                <form method="POST" action="<?php echo site_url()?>/CReceiptItem/addReceiptItem/<?php echo $prod->product_id?>">
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
                  <input type="hidden" value="<?php echo $this->session->userdata['receiptSession']['receipt_id']?>" name="receipt_id" id="receipt_id">
                </div>
              </div>
              </form>
              </div>
              <?php } ?>
            <?php }else{  echo "<i class='circle warning icon error'></i><span> No items to display.</span>" ;} ?> 
            </div>
          </div>
          <div class="column"></div>
        </div>
      </div>
    </div>
    <div id="vOrder" class="column">
    <?php $this->view('pos/vOrder'); ?>
    </div>
  </div>
</div>
<!-- <div class="vdivide"></div> -->
</body>
</html>
<script>
  $(document).ready(function(){
   
    var receipt_id = $('#receipt_id').val();
   
    var dataSet = "receipt_id="+receipt_id;
    $.ajax({
        type: "POST",
        url: '<?php echo site_url()?>/CReceiptItem/displayOrderListManual',
        data: dataSet,
        cache: false,
        success: function(result){
            if(result){
               $('#vOrder').html(result);
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
