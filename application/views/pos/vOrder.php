<div class="column">
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
        <a href="<?php echo site_url()?>/COrderItem/viewEditOrder?>"><i class="huge edit icon"></i></a>
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
              <tr id="myTR">
                <td>Product 1</td>
                <td>P 70.00</td>
                <td>5</td>
                <td>P 350.00</td>
              </tr>
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
        P<span id="due">200.00</span>
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
        P<span id="change">0.00</span>
      </div>
      <div class="column"></div>
    </div>

  </div>

  <div class="ui grid orderOptions">
    <div class="row"></div>

    <div class="row orderOptions">
      <div class="three wide column">
        <a href="<?php echo site_url();?>/CLogin/viewPos" class="lft lbtn" align="center" ><h4 class="lbtnlabel">Back</h4></a>
      </div>
      <div class="ten wide column">
        <a href="<?php echo site_url();?>/CLogin/viewPos" class="rght rbtn" align="center""><h4 class="rbtnlabel">Charge/No Receipt</h4></a>
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
    });
});
</script>
</div>

