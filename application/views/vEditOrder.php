
<div class="ui two column grid">
  <?php $this->view('vCategory'); ?>
  <div class="right floated left aligned seven wide column"><br>
    <h1 class="ui header">
      <i class="circular cart icon"></i>
      <div class="content">
        Edit Order
        <div class="sub header">List of Orders</div>
      </div>
    </h1><br>
    <form>
      <div class="ordertbl">
        <table class="ui single line table ">
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
              <tr>
                <td>Product 1</td>
                <td>P450.00</td>
                <td>1</td>
                <td>P450</td>
                <td><i class="red remove icon"></i></td>
              </tr>
              <tr>
                <td>Product 2</td>
                <td>P300.00</td>
                <td>2</td>
                <td>P600.00</td>
                <td><i class="red remove icon"></i></td>
              </tr>
              <tr>
                <td>Product 3</td>
                <td>P100.00</td>
                <td>1</td>
                <td>P100.00</td>
                <td><i class="red remove icon"></i></td>
              </tr>
            </tbody>
          </table>
      </div>   
      <h4 class="sub">No. of Items<div class="rf">4</div></h4>
      <h4 class="sub">Subtotal<div class="rf">P1150.00</div></h4>
      
      <div class="ui divider"></div>
      <h2 class="sub">Total<div class="rf">P1150.00</div></h2>
      <a href="<?php echo site_url();?>/COrdered/viewMDashboard?>" class="rbtn" align="center"><h4 class="lbtnlabel">Edit</h4></a>
      <div class="lft">
         <a href="<?php echo site_url();?>/COrdered/viewMDashboard?>" class="rght lbtn" align="center" ><h4 class="lbtnlabel">Back</h4></a>
      </div> 
    </form>
  </div>
</div>
<div class="vdivide"></div
</body>
</html>