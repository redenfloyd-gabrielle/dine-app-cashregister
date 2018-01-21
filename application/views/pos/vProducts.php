
      <div class="ui grid">
       
        <?php if(isset($products)) { ?>
          <?php $x=0; foreach ($products as $prod){ ?>
          
          <div class="five wide column">
          <form method="POST" action="<?php echo site_url()?>/CReceiptItem/addReceiptItem/<?php echo $prod->product_id.'/'.$this->session->userdata['receiptSession']['receipt_id'];?>">
           <!--  <div class='ui segment'>
              <span style='font-family: "Roboto"; font-size:1.2em; color: black;'>
                <?php echo $prod->product_name; ?>
              </span>
              <div class="ui hidden divider"></div>
              <div class="ui two column grid">
                <div class="column">
                  P<span id="price" style="font-size: 1.3em;"><?php echo $prod->product_price; ?>.00</span>
                </div>
                <div class="center aligned middle aligned teal column">
                  <button class="ui large labeled button" type="submit">
                     <input type="hidden" value="<?php echo $prod->product_id ?> " id="pid" name="pid" class="pid">
                      <i class="white plus icon"></i><span style="color: white;">Add</span>
                  </button>
                </div>
              </div> -->
           <div class="ui cards">
              <div class="card cardbox">
                <div class="content">
                  <div class="header" style="font-size: 14px;"><?php echo $prod->product_name; ?></div>
                  <div class="description">
                    P<span id="price" style="font-size: 14px;"><?php echo $prod->product_price; ?>.00</span>
                  </div>
                </div>
               <!--  <div class="ui bottom attached teal button">
                  <i class="add icon"></i>
                  Add
                </div> -->
                <button class="ui bottom attached teal button" type="submit">
                  <input type="hidden" value="<?php echo $prod->product_id ?> " id="pid" name="pid" class="pid">
                  <i class="white plus icon"></i><span style="color: white;">Add</span>
                </button>
              </div>
          </div>

            </form>
            </div>

          
          <?php } ?>
        <?php  }else{  echo "
            <div class='row'></div>
            <div class='row'></div>
            <div class='row'></div>
            <div class='sixteen wide column center aligned middle aligned grid'>
              <h3><i class='circle warning icon error'></i> No products to display.</h3>
            </div>
            <div class='row'></div>
            <div class='row'></div>
            <div class='row'></div>
        ";} ?> 
     
</div>
      

     