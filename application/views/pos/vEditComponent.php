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
              <tr id="myTR">
                  <td><?php echo $order->product_name; ?></td>
                  <td>P<span class="price"><?php echo $order->product_price; ?></span></td>
                  <td class="qty"> <input type="number" name="qty" value="<?php echo $order->order_item_qty; ?>"><i class="mini add circle icon ibtn btn"><span class="sign">+</span></i><i class="mini minus circle icon ibtn btn"><span class="sign">-</span></i></td>
                  <td>P<span class="subtotal" id="subtotal"><?php echo $order->order_item_subtotal; ?></span></td>
                  <td><button class="ibtn"><i class="red remove icon"></i></button></td>
                  <input type="hidden" id="order_item" name ="order_item" value="<?php $order->item_id?>">
              </tr>
            <!-- </form> -->
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
        P<span id="due"><? echo $total ?></span>.00
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
        echo '<a href="'.site_url().'/COrdered/viewQDashboard/'.$eid.'" class="lft lbtn" align="center" ><h4 class="lbtnlabel">Back</h4></a>';
        }
        ?>
      <!-- <a href="<?php echo site_url()?>/COrdered/viewQDashboard/<?php echo $eid ?>" class="lft lbtn" align="center" ><h4 class="lbtnlabel">Back</h4></a> -->
      </div>
       <div class="five wide column">
        <?php if($page == 'manual'){
        echo '<a href="'.site_url().'/CProduct/viewMDashboard" class="lft lbtn" align="center" ><h4 class="lbtnlabel">Edit</h4></a>';
        }else{
        echo '<a href="'.site_url().'/COrdered/viewQDashboard/'.$eid.'" class="lft lbtn" align="center" ><h4 class="lbtnlabel">Edit</h4></a>';
        }
        ?>
      <!--   <a href="<?php echo site_url();?>/CLogin/viewPos" class="rght rbtn" align="center""><h4 class="rbtnlabel">Edit</h4></a> -->
      </div>
      <div class="column"></div>
    </div>
    <div class="row"></div>
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

          $(".btn").on("click", function() {

          var $button = $(this);
          var oldValue = $button.parent().find("input").val();
          var price = $button.closest("tr").find('.price').text();
          var eid = $("#order_id").val();
          var dataSet = "eid="+eid+"&qty="+newVal;


          if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;

          } else {
           // Don't allow decrementing below zero
            if (oldValue > 0) {
              var newVal = parseFloat(oldValue) - 1;
            } else {
              newVal = 0;
            }
          }

          $button.parent().find("input").val(newVal);
          sub = newVal * price;

          $button.closest("tr").find(".subtotal").html(sub);

          var due = 0;
           $(".subtotal").each(function() {
            var value = $(this).text();
            if(value.length != 0) {
               due += parseFloat(value);
            }
            $("#due").html(due); 
            });

        });




    });

    </script>