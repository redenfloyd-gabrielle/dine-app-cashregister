<div class="ui unstackable grid">
  <div class="row">
    <div class="column"></div>
    <div class="twelve wide column">
      <h1 class="ui header headerName">
        <i class="circular cart icon"></i>
        <div class="content">
          Orders
          <div class="sub header subHeaderName">List of Orders</div>
        </div>
      </h1>
    </div>
    <div class="three wide column">
      <!-- <button class="ibtn" id="ibtn"><i class="huge blue edit icon"></i></button> -->
       <a href="<?php echo site_url()?>/COrderItem/viewEdit/qr/<?php echo $id ?>"><i class="huge blue edit icon"></i></a>
    </div>
  </div>
  <div class="row">
    <div class="column"></div>
    <div class="fourteen wide column">
      <?php if (isset($id)){ ?>
      <input type="hidden" id="eid" value="<?php echo $id; ?>" name='eid'>
      <?php } ?>
      <form>
        <table class="ui single line table">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Unit Price</th>
              <th>Quantity</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
          <?php if(isset($order_info)) { ?>
               <?php foreach ($order_info as $order){ ?>
              <tr id="myTR">
                  <td><?php echo $order->product_name; ?></td>
                  <td><?php echo $order->product_price; ?></td>
                  <td><?php echo $order->order_item_qty; ?></td>
                  <td><?php echo $order->order_item_subtotal; ?></td>
              </tr>
              <?php } ?>
          <?php } ?>
          </tbody>
        </table>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="four wide right aligned column">
    </div>
    <div class="nine wide column">
      <form class="ui form">
      <div class="field">
        <label for="amount">Cash Amount</label>
        <input type="number" placeholder="Enter Cash Amount" id="amount">
      </div>
    </form>
    </div>
    <div class="column"></div>
  </div>
  
  <div class="row">

    <div class="six wide column"> 
    </div>
    <div class="three wide column">
      <strong class="itemLabels">AMOUNT DUE</strong>
    </div>
    <div class="six wide right aligned column">
      
      P<span id="due">0</span>.00
     
    </div>
    <div class="column"></div>
  </div>

  <div class="row">
    <div class="six wide column"></div>
    <div class="three wide column">
      <span class="itemLabels">Cash</span>
    </div>
    <div class="six wide right aligned column">
      P<span id="cash">0.00</span>
    </div>
    <div class="column"></div>
  </div>

  <div class="row">
    <div class="six wide column"></div>
    <div class="three wide column">
      <span class="red itemLabels" >Change</span>
    </div>
    <div class="six wide right aligned column">
      <span id="peso">P</span><span id="change">0.00</span>
    </div>
    <div class="column"></div>
  </div>

</div>

<div class="ui grid ">
  <div class="row"></div>

  <div class="row">
    <div class="three wide column">
      <a href="<?php echo site_url();?>/CLogin/viewPosNoSession" class="lft lbtn" align="center" ><h4 class="lbtnlabel">Back</h4></a>
    </div>
    <div class="ten wide column">
      <a href="<?php echo site_url();?>/CLogin/viewPos" class="rght rbtn" align="center" ><h4 class="rbtnlabel">Charge/No Receipt</h4></a>
    </div>
    <div class="three wide column">
      <a href="<?php echo site_url();?>/CReceipt/viewReceipt" class="rght rbtn" align="center" "><h4 class="rbtnlabel">Charge & Print</h4></a>
    </div>
    
    <div class="column"></div>
  </div>
  <div class="row"></div>
<script>
  $(document).ready(function(){
      $('#amount').on('keyup', function() {
        var amt = $("#amount").val();
        var due = $("#due").text();
        var cash = amt+'.00';
        var change = parseFloat(cash)-parseFloat(due)+'.00';
        $("#cash").html(cash); 
        $("#change").html(change);
        if(change < 0){
            $("#change").css("color","red");
            $('#peso').css("color","red");
          }else{
            $("#change").css("color","black");
            $('#peso').css("color","black");
          }
      });

    //   $('#ibtn').on('click', function() {
    //     var eid = $("#eid").val();
    //     var page = "qr";
    //     var dataSet = "eid="+eid+"&page="+page;

    //     $.ajax({
    //       type: "POST",
    //       url: '<?php echo site_url()?>/COrderItem/viewEditOrder',
    //       data: dataSet,
    //       cache: false,
    //       success: function(result){
    //           if(result){
    //              $('body').html(result);

    //           }else{
    //               alert("Error");
    //           }                         
    //       },
    //       error: function(jqXHR, errorThrown){
    //           console.log(errorThrown);

    //       }
    //   });
    // });
  });
</script>



