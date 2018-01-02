
<div class="ui two column grid">
	<div class="row"></div>
	<div class="row">
		<div class="column">
      <div class="ui stackable grid">
      <div class="row">
        <div class="column"></div>
        <div class="seven wide column">
          <h1 class="huge header">CATEGORIES</h1>
        </div>
      </div>
      <div class="row">
        <div class="column"></div>
        <div class="fourteen wide column"> 
          <input type="hidden" value="<?php echo $this->session->userdata['receiptSession']['receipt_id']?>" name="receipt_id" id="receipt_id">  
          <div class="ui three cards">

            <div class="ui card">
              <a class="image" href="<?php echo site_url();?>/CProduct/viewProduct/MEALS">
                <img class="ui centered fluid image" src="<?php echo base_url('assets/images/meals.svg')?>">
              </a>
              <div class="content">
                <a class="header" href="<?php echo site_url();?>/CProduct/viewProduct/MEALS">MEALS</a>
                <div class="meta">
                  <a>Category</a>
                </div>
              </div>
            </div>


            <div class="ui card">
              <a class="image" href="<?php echo site_url();?>/CProduct/viewProduct/DRINKS">
                <img class="ui centered fluid image" src="<?php echo base_url('assets/images/drinks.svg')?>">
              </a>
              <div class="content">
                <a class="header" href="<?php echo site_url();?>/CProduct/viewProduct/DRINKS">DRINKS</a>
                <div class="meta">
                  <a>Category</a>
                </div>
              </div>
            </div>

            <div class="ui card">
              <a class="image" href="<?php echo site_url();?>/CProduct/viewProduct/DESSERTS">
                <img class="ui centered fluid image" src="<?php echo base_url('assets/images/desserts.svg')?>">
              </a>
              <div class="content">
                <a class="header" href="<?php echo site_url();?>/CProduct/viewProduct/DESSERTS">DESSERTS</a>
                <div class="meta">
                  <a>Category</a>
                </div>
              </div>
            </div>

            <div class="ui card">
              <a class="image" href="<?php echo site_url();?>/CProduct/viewProduct/EXTRAS">
                <img class="ui centered fluid image" src="<?php echo base_url('assets/images/extras.svg')?>">
              </a>
              <div class="content">
                <a class="header" href="<?php echo site_url();?>/CProduct/viewProduct/EXTRAS">EXTRAS</a>
                <div class="meta">
                  <a>Category</a>
                </div>
              </div>
            </div>
          </div>
        <div class="column"></div>
      </div>
    </div>
  </div>
</div>
  <div class="column" id="vOrder">
 <!--  <?php //$this->view('pos/vOrder'); ?> -->
  </div>

<!-- <div class="vdivide"></div> -->
</body>
</html>

<script>
  $(document).ready(function(){
   
    var receipt_id = $('#receipt_id').val().trim();
   
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