
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
    <!--   <button class="ibtn" id="ibtn"><i class="huge blue edit icon"></i></button> -->
        <a href="<?php echo site_url()?>/COrderItem/viewEdit/manual/<?php echo $this->session->userdata['receiptSession']['receipt_id']?>"><i class="huge blue edit icon"></i></a>
      </div>
    </div>
    <div class="row">
      <div class="column"></div>
      <div class="fourteen wide column">
        <form>
          <table class="ui single line table itemLabels">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php if(isset($receipt_item)) { ?>
                 <?php foreach ($receipt_item as $item){ ?>
              <tr id="myTR">
                <td><?php echo $item->product_name ?></td>
                <td><?php echo $item->product_price ?></td>
                <td><?php echo $item->receipt_item_quantity ?></td>
                <td class="subtotal"><?php echo $item->receipt_item_subtotal ?></td>
              </tr>
              <?php } ?>
               <?php } ?>
            </tbody>
          </table>
           <input type="hidden" value="<?php echo $this->session->userdata['receiptSession']['receipt_id']?>" name="eid" id="eid">
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

  <div class="ui grid">
    <div class="row"></div>

    <div class="row">
      <div class="three wide column">
        <a href="<?php echo site_url();?>/CLogin/viewPosNoSession" class="lft lbtn" align="center" ><h4 class="lbtnlabel">Back</h4></a>
      </div>
      <div class="ten wide column">
        <button class="rght rbtn" align="center" id="rbtn"><h4 class="rbtnlabel">Charge/No Receipt</h4></button>
      </div>
      <div class="three wide column">
        <a href="<?php echo site_url();?>/CReceipt/viewReceipt" class="rght rbtn" align="center""><h4 class="rbtnlabel">Charge & Print</h4></a>
      </div>
      
      <div class="column"></div>
    </div>
    <div class="row"></div>
    
<script type="text/javascript">
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
            $("#change").css("color","black");
            $('#peso').css("color","black");
          }
        });
  
      var sum = 0;
      $(".subtotal").each(function() {
          var value = $(this).text();
          if(!isNaN(value) && value.length != 0) {
              sum += parseFloat(value);
          }
          $("#due").html(sum); 
      });

       $('#rbtn').on('click',function(){

      var total = $("#due").text();
      var cash = $("#cash").text();
      var change = $("#change").text();
    
      var dataSet =  "total="+total+"&cash="+cash+"&change="+change;

      $.ajax({
        type: "POST",
        url: "<?php echo site_url()?>/CReceipt/addManualOrderToReceipt",
        data: dataSet,
        cache: false,
        success: function(result){
           // alert(result);
           $('body').html(result);
        },
        error: function(jqXHR, errorThrown){
            console.log(errorThrown);
        }

      });

    })

    //   $('#ibtn').on('click', function() {
    //     var eid = $("#eid").val();
    //     var page = "manual";
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


