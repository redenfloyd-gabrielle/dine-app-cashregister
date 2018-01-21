  <div class="row"></div>
  <div class="row">
    <div class="column"></div>
    <div class="seven wide column">
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

       <div class="ui top attached fluid tabular menu">
        <a class="item active" data-tab="maincourse">MAIN COURSE</a>
        <a class="item" data-tab="drinks">DRINKS</a>
        <a class="item" data-tab="soup">SOUP</a>
        <a class="item" data-tab="pancit">PANCIT</a>
        <a class="item" data-tab="extras">EXTRAS</a>
      </div>
      <div class="ui bottom attached tab segment active" data-tab="maincourse" id="MAINCOURSE">
        <font style="font-size:0px">MAIN COURSE</font>
      </div>
      <div class="ui bottom attached tab segment" data-tab="drinks" id="DRINKS">
         <font style="font-size:0px">DRINKS</font>
      </div>
      <div class="ui bottom attached tab segment" data-tab="soup" id="SOUP">
         <font style="font-size:0px">SOUP</font>
      </div>
      <div class="ui bottom attached tab segment" data-tab="pancit" id="PANCIT">
         <font style="font-size:0px">PANCIT</font>
      </div>
      <div class="ui bottom attached tab segment" data-tab="extras" id="EXTRAS">
         <font style="font-size:0px">EXTRAS</font>
      </div>

    </div>
    <div class="column"></div>
    <?php $this->view("pos/vOrder");?> 

</body>
</html>


<script>
  $(document).ready(function(){
     $.ajax({
        type: "POST",
        url: '<?php echo site_url()?>/CReceiptItem/displayOrderListManual',
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
     $.ajax({
        type: "POST",
        url: "<?php echo site_url()?>/CProduct/viewProduct/MAINCOURSE",
        cache: false,
        success: function(result){
          $('#MAINCOURSE').html(result);  
        },
        error: function(jqXHR, errorThrown){
            console.log(errorThrown);
        }

      });
   $('.menu .item')
      .tab({'onVisible':function(){
      var cat = $(this).text();
      //cat = cat.replace(/ /g,'');
      cat = $.trim(cat.replace(/[\t\n]+/g,' '));
        $.ajax({
        type: "POST",
        url: "<?php echo site_url()?>/CProduct/viewProduct/"+cat,
        cache: false,
        success: function(result){
         
          cat = cat.replace(/ /g,'');

          $('#'+cat).html(result);
       
        },
        error: function(jqXHR, errorThrown){
            console.log(errorThrown);
        }

      });
      }
    });

   
  });

</script>