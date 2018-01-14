  <div class="row"></div>
  <div class="row">
    <div class="column"></div>
    <div class="six wide column">
      <h1 class="ui grey dividing header">
            <img class="ui big image" src="<?php echo base_url("assets/images/hand.png")?>">
            <div class="content">
              ORDER
              <div class="sub header">Create new order</div>
            </div>  
        </h1>

        <a href="<?php echo site_url()?>/CLogin/viewPos?>">
          <h4 style="color: gray;"><i class="left arrow grey icon"></i>BACK TO HOME</h4>
        </a>

        <h3 class="ui header"><i class="cubes icon"></i>CATEGORIES</h3>
        <div class="ui three stackable cards">
          <a class='ui small card' href='<?php echo site_url()?>/CProduct/viewProduct/RICE MEAL'> 
            <div class='center aligned middle aligned content'>
                <img src='<?php echo base_url("assets/images/ricemeal.png")?>' class='ui small image'>
                <div class='header' id='userHeader'>
                    RICE MEAL
                </div>
            </div>
          </a> <!-- category card -->

          <a class='ui small card' href="<?php echo site_url();?>/CProduct/viewProduct/DRINKS"> 
            <div class='center aligned middle aligned content'>
                <img src="<?php echo base_url('assets/images/drinks.svg')?>" class='ui small image'>
                <div class='header' id='userHeader'>
                    DRINKS
                </div>
            </div>
          </a> <!-- category card -->

          <a class='ui small card' href="<?php echo site_url();?>/CProduct/viewProduct/SOUP"> 
            <div class='center aligned middle aligned content'>
                <img src="<?php echo base_url('assets/images/soup.png')?>" class='ui small image'>
                <div class='header' id='userHeader'>
                    SOUP
                </div>
            </div>
          </a> <!-- category card -->

          <a class='ui small card' href="<?php echo site_url();?>/CProduct/viewProduct/MAIN COURSE"> 
            <div class='center aligned middle aligned content'>
                <img src="<?php echo base_url('assets/images/meals.svg')?>" class='ui small image'>
                <div class='header' id='userHeader'>
                    MAIN COURSE
                </div>
            </div>
          </a> <!-- category card -->

          <a class='ui small card' href="<?php echo site_url();?>/CProduct/viewProduct/EXTRAS"> 
            <div class='center aligned middle aligned content'>
                <img src="<?php echo base_url('assets/images/extras.svg')?>" class='ui small image'>
                <div class='header' id='userHeader'>
                    EXTRAS
                </div>
            </div>
          </a> <!-- category card -->
        </div>

    </div>
    <div class="two wide column"></div>
    <?php $this->view("pos/vOrder");?> 

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