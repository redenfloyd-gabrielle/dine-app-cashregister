<?php  $this->view('imports/vPosHeader')?>
<div class="row"></div>
  <div class="row">
    <div class="column"></div>
    <div class="seven wide column">
      <h1 class="ui grey dividing header">
            <img class="ui big image" src="<?php echo base_url("assets/images/hand.png")?>">
            <div class="content">
              EDIT ORDER
              <div class="sub header">Edit current order</div>
            </div>  
        </h1>
        <?php if($page == 'manual'){
            echo '
              <a href="'.site_url().'/CProduct/backToMDashboard/'.$eid.'" class="item">
                <h4 style="color: gray;"><i class="left arrow grey icon"></i>BACK TO ORDERS</h4>
              </a>
            ';
         }else{
            echo '
              <a href="'.site_url().'/COrdered/displayOrderFromEditPage/'.$qr.'" class="item">
                <h4 style="color: gray;"><i class="left arrow grey icon"></i>BACK TO ORDERS</h4>
              </a>
            ';
         }?>
        <input type="hidden" name="qr" value="<?php echo $qr ?>" id="qr">
        <input type="hidden" name="page" value="<?php echo $page ?>" id="page">
        <input type="hidden" name="eid" value="<?php echo $eid ?>" id="eid">

      <div class="ui top attached fluid tabular menu">
        <a class="item active" data-tab="maincourse">MAIN COURSE</a>
        <a class="item" data-tab="drinks">DRINKS</a>
        <a class="item" data-tab="soup">SOUP</a>
        <a class="item" data-tab="pancit">PANCIT</a>
        <a class="item" data-tab="extras">EXTRAS</a>
      </div>
      <div class="scrollbar" id='scroll'>
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
    </div>
    <div class="column"></div>
    
   <?php $this->view('pos/vEditComponent') ?>

</body>
</html>

<script>
  $(document).ready(function(){

      var eid = $('#eid').val();
      var page = $('#page').val(); 
      var qr = $('#qr').val();

  $.ajax({

        type: "POST",
        url: "<?php echo site_url()?>/CProduct/viewProductEdit/"+page+"/MAINCOURSE/"+eid+"/"+qr,
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
      var eid = $('#eid').val();
      var page = $('#page').val(); 
      var qr = $('#qr').val();
     
      //cat = cat.replace(/ /g,'');
        cat = $.trim(cat.replace(/[\t\n]+/g,' '));
        $.ajax({
        type: "POST",
        url: "<?php echo site_url()?>/CProduct/viewProductEdit/"+page+"/"+cat+"/"+eid+"/"+qr,
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


