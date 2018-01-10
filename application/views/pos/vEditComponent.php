  <div class="ui unstackable grid">
    <div class="row">
      <div class="column"></div>
      <div class="twelve wide column">
        <h1 class="ui header headerName">
          <i class="circular pencil icon"></i>
          <div class="content">
            Edit Orders
            <div class="sub header subHeaderName">Orders</div>
          </div>
        </h1>
      </div>
    </div>
    <div class="row">
      <div class="column"></div>
      <div class="fourteen wide column">
        
          <table class="ui single line table itemLabels" id="mytable">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php if(isset($order_info)) { ?>
               <?php foreach ($order_info as $order){ ?>
              <!--  <form method="POST" action = "<?php echo site_url()?>/COrderItem/updateQty/<?php $order->item_id?>"> -->
              <form class='' id='form' method='POST' action='<?php echo site_url()?>/COrderItem/updateList/<?php echo  $order->item_id.'/'.$page.'/'.$eid.'/'.$qr; ?>'>
              <tr id="myTR">
                  <td><?php echo $order->product_name; ?></td>
                  <td>P<span class="price" name='prod_price'><?php echo $order->product_price; ?></span></td>
                  <input type='hidden' value='<?php echo $order->product_price; ?>' name='prod_price'>

                  <td class="qtytd">
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
                  <td ><button class="ibtn"><i class="red remove icon"></i></button></td>
                  <input type="hidden" id="order_item" name ="order_item" value="<?php $order->item_id?>">
              </tr>
             </form>
              <?php } ?>
          <?php } ?>
            </tbody>
          </table>
        </form>
      </div>
    </div>
    <div class="row"></div>
    <div class="row">
      <div class="six wide column"> 
      </div>
      <div class="three wide column">
        <strong class="itemLabels">AMOUNT DUE</strong>
      </div>
      <div class="six wide right aligned column">
        P<span id="due"><?php if(isset($total)){echo $total;}else{ echo "0" ;} ?></span>.00
      </div>
      <div class="column"></div>
    </div>
  </div>

  <div class="ui grid orderOptions">
    <div class="row"></div>

    <div class="row orderOptions">
      <div class="seven wide column"></div>
      <div class="four wide column">
      <?php if($page == 'manual'){
        echo '<a href="'.site_url().'/CProduct/viewMDashboard" class="lft lbtn" align="center" ><h4 class="lbtnlabel">Back</h4></a>';
        }else{
        echo '<a href="'.site_url().'/COrdered/displayOrderFromEditPage/'.$qr.'" class="lft lbtn" align="center" ><h4 class="lbtnlabel">Back</h4></a>';
        }
        ?>
      </div>
       
      <div class="column"></div>
    </div>
    <div class="row"></div>

    <div class='ui mini modal' id='removeItem'>
      <div class='header'>Remove Item </div> 
      <div class='content'>
      <form method="POST" action="<?php echo site_url().'/COrderItem/removeToList/'.$order->item_id.'/'.$page.'/'.$eid.'/'.$qr; ?>" >
      <input type='hidden' name='order_item_id' id='order_item_id' value=''>
        <p>Are you sure you want to remove this item?</p>
      
      <div class='actions'>
        <div class='ui gray cancel button'>
          Cancel
        </div>
        <button class='ui cancel button' style='background-color: #800000; color: white;' type='submit'>
          Remove
        </button>
      </div>
      </form>
    </div>
    </div>

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
      $('#order_item_id').val($(this).data("id"));
      $('#removeItem').modal('show');

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
          // $(".btn").on("click", function() {

          // var $button = $(this);
          // var oldValue = $button.parent().find("input").val();
          // var price = $button.closest("tr").find('.price').text();
          // var eid = $("#order_id").val();
          // var dataSet = "eid="+eid+"&qty="+newVal;


          // if ($button.text() == "+") {
          //   var newVal = parseFloat(oldValue) + 1;

          // } else {
          //  // Don't allow decrementing below zero
          //   if (oldValue > 0) {
          //     var newVal = parseFloat(oldValue) - 1;
          //   } else {
          //     newVal = 0;
          //   }
          // }

          // $button.parent().find("input").val(newVal);
          // sub = newVal * price;

          // $button.closest("tr").find(".subtotal").html(sub);

          // var due = 0;
          //  $(".subtotal").each(function() {
          //   var value = $(this).text();
          //   if(value.length != 0) {
          //      due += parseFloat(value);
          //   }
          //   $("#due").html(due); 
          //   });

     //   });



    });


    </script>