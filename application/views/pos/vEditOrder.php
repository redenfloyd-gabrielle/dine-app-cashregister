
<div class="ui two column grid">
  <div class="row"></div>
  <div class="row">
      <div class="column">
      <?php $this->view('pos/vCategory'); ?>
    </div>
  <div class="column">
    <div class="ui unstackable grid">
      <div class="row">
        <div class="column"></div>
        <div class="twelve wide column">
          <h1 class="ui header headerName">
            <i class="circular cart icon"></i>
            <div class="content">
              Orders
              <div class="sub header subHeaderName">Edit Order</div>
            </div>
          </h1>
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
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr id="myTR">
                  <td>Product 1</td>
                  <td>P 70.00</td>
                  <td>5</td>
                  <td>P<span class="subtotal">350.00</span></td>
                  <td><i class="red remove icon"></i></td>
                </tr>
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
          P<span id="due">0</span>.00
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
                echo '<a href="'.site_url().'/COrdered/displayQROrderFromEdit/'.$id.'" class="lft lbtn" align="center" ><h4 class="lbtnlabel">Back</h4></a>';
                }
          ?>
          
        </div>
         <div class="five wide column">
          <a href="<?php echo site_url();?>/CLogin/viewPos" class="rght rbtn" align="center""><h4 class="rbtnlabel">Edit</h4></a>
        </div>
        <div class="column"></div>
      </div>
      <div class="row"></div>
      
  <script type="text/javascript">
    // $(document).ready(function(){
       var due = 0;
       $(".subtotal").each(function() {
        var value = $(this).text();
        if(value.length != 0) {
           due += parseFloat(value);
        }
        $("#due").html(due); 
    });
  // });
  </script>
  </div>
</div>
</div>

