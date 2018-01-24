

    <div class="six wide column">
      <div id="vOrder">
      <div class="ui grid">
        <div class="sixteen wide left aligned middle aligned column">
          <h1 class="ui grey dividing header">
            <i class="unordered list icon"></i>
            <div class="content">
              ORDER LIST
              <div class="sub header">List of order</div>
            </div>  
          </h1>

        </div>
        <div class="row"></div>
      </div>

      <table class="ui inverted teal basic table">
        <thead>
          <tr>
            <th class="seven wide">PRODUCT NAME</th>
            <th class="four wide">UNIT PRICE</th>
            <th class="two wide">QUANTITY</th>
            <th class="two wide">SUBTOTAL</th>
            <th>OPTION</th>
          </tr>
        </thead>
      </table>
      <table class="ui very basic compact table" id="myTable">
        <tbody>
          <?php if(isset($order_info)) { ?>
               <?php foreach ($order_info as $order){ ?>
               <form class='' id='form' method='POST' action='<?php echo site_url().'/COrderItem/updateList/'.$order->item_id.'/'.$page.'/'.$eid.'/'.$qr; ?>'>
              <tr id="myTR">
                  <td class="five wide"><?php echo $order->product_name; ?></td>
                  <td class="two wide">P<span class="price" name='prod_price'><?php echo $order->product_price; ?></span></td>
                  <input type='hidden' value='<?php echo $order->product_price; ?>' name='prod_price'>
                  <input type="hidden" id="order_item" name ="order_item" value="<?php echo $order->item_id?>">

                  <td class="qtytd five wide">
                    <button class='ui tiny basic left attached icon button minus' id='minus' data-id='<?php echo $order->product_id; ?>'>
                      <i class=' minus icon '></i>
                    </button>
                    <input type='hidden' value='<?php echo $order->item_id; ?>' id='od_id<?php echo $order->product_id; ?>'>
                    
                    <div class='ui tiny input' style='max-width: 50px;'>
                        <input style='text-align:center; '  value='<?php echo $order->order_item_qty; ?>' id='qty<?php echo $order->product_id; ?>' name='qty<?php echo $order->item_id; ?>'>
                    </div>
                    
                    <button class='ui tiny basic right attached icon button plus' id='plus' data-id='<?php echo $order->product_id; ?>'>
                        <i class='plus icon '></i>
                    </button>
                  </td>
                  <td>P<span class="subtotal" id="subtotal" name='sub<?php echo $order->item_id; ?>'><?php echo $order->order_item_subtotal; ?></span></td>
                  <td><a class="confirmRemove" style="cursor: pointer;" data-id='<?php echo $order->item_id; ?>'><i class="red remove icon"></i></a></td>  
              </tr>
            </form>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>

      <div class="ui divider"></div>

      <div class="ui grid">

        <!-- AMOUNT DUE -->
        <div class="eight wide middle aligned  column">
          AMOUNT DUE
        </div>
        <div class="eight wide middle aligned  compact column">
          <strong><p style="font-size: 1.3em;">P<span id="due"><?php if(isset($total)){echo $total;}else{ echo "0" ;} ?></span>.00</p></strong>
        </div>

      </div>
      
    </div>
    <div class="column"></div>
  </div>
  <div class="row"></div>
  <div class="row"></div>
</div> <!-- closing grid -->
<div class="ui borderless bottom fixed menu">
  <div class="right menu">
    
    <?php if($page == 'manual'){
        echo '
          <a href="'.site_url().'/CProduct/backToMDashboard/'.$eid.'" class="item"><div class="ui teal button">BACK</div></a>
        ';
     }else{
        echo '
          <a href="'.site_url().'/COrdered/displayOrderFromEditPage/'.$qr.'" class="item"><div class="ui teal button">BACK</div></a>
        ';
     }?>
    <div class="hidden item"></div> <div class="hidden item"></div> <div class="hidden item"></div> <div class="hidden item"></div><div class="hidden item"></div><div class="hidden item"></div><div class="hidden item"></div><div class="hidden item"></div><div class="hidden item"></div><div class="hidden item"></div><div class="hidden item"></div><div class="hidden item"></div><div class="hidden item"></div><div class="hidden item"></div><div class="hidden item"></div><div class="hidden item"></div><div class="hidden item"></div>
  </div>
</div>
</div> 
</div>

  <div class='ui mini modal' id='removeItem'>
    <div class='header'>Remove Item </div> 
    <div class='content'>
      <?php if(isset($prod_cat)){
         echo '<form method="POST" action="'.site_url().'/COrderItem/removeToList/'.$page.'/'.$eid.'/'.$qr.'/'.$prod_cat.'" >';
       }else{
        echo '<form method="POST" action="'.site_url().'/COrderItem/removeToList/'.$page.'/'.$eid.'/'.$qr.'/NONE" >';
       }
       ?>
        <input type='hidden' name='order_item_id' id='order_item_id' value=''>
        <p>Are you sure you want to remove this item?</p>
        <div class='actions'>
          <div class='ui gray cancel button'>
            Cancel
          </div>
          <button class='ui teal cancel button' style='background-color: #800000; color: white;' type='submit'>
            Remove
          </button>
        </div>
      </form>
    </div>
  </div>


</body>
</html>

    <script type="text/javascript">
      $(document).ready(function(){
        
         var due = 0;
         $(".subtotal").each(function() {
          var value = $(this).text();
          if(value.length != 0) {
             due += parseFloat(value);
          }
          $("#due").html(due); 
          });

      $('.confirmRemove').click(function(){
        $('#removeItem').modal('show');
        $('#order_item_id').val($(this).data("id"));

      });
    var value = 0 ;
    $(document).on('click','#plus',function() {
      var id = $(this).data("id");
      var price = $(this).closest("tr").find('.price').text();
      var get = parseInt($('#qty'+id).val());
          if (get <= 99) {
            get += 1;
            var sub = get * price;
            $('#qty'+id).val(get); 
            $(this).closest("tr").find(".subtotal").html(sub); 
        }
    });

    $(document).on('click','#minus',function(e) {
      var id = $(this).data("id");
      var price = $(this).closest("tr").find('.price').text();
      if($('#qty'+id).val() > 1){
        var get = $('#qty'+id).val();
        get -= 1;
        var sub = get * price;
        $('#qty'+id).val(get);
        $(this).closest("tr").find(".subtotal").html(sub);
      }else{
        $('#order_item_id').val($('#od_id'+id).val());
        $('#removeItem').modal('show');
        e.preventDefault();
      }
    });

    $('.ui.modal').modal('setting', 'closable', false);
         
    });


    </script>