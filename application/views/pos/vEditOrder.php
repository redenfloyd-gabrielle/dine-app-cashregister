
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
          <div class="seven wide column">
            <h1 class="ui header headerName">
              <i class="circular pencil icon"></i>
              <div class="content">
                Edit Order
                <div class="sub header subHeaderName">List of Orders</div>
              </div>
            </h1>
          </div>
        </div>
        <div class="row">
          <div class="column"></div>
          <div class="fourteen wide column">
            <form>
              <table class="ui single line table">
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
                    <td>P 70.00</td>
                    <td>5</td>
                    <td>P 350.00</td>
                    <td><i class="big red remove icon"></i></td>
                  </tr>
                  <tr>
                    <td>Product 1</td>
                    <td>P 70.00</td>
                    <td>5</td>
                    <td>P 350.00</td>
                    <td><i class="big red remove icon"></i></td>
                  </tr>
                </tbody>
              </table>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="column"></div>
          <div class="seven wide column ">
              <span class="noOfItems">No. of Items</span>
          </div>
          <div class="two wide column"></div>
          <div class="five wide right aligned column">
            <strong class="noOfItems">2</strong>
          </div>
        </div>
        <div class="row">
          <div class="column"></div>
          <div class="seven wide column ">
              <span class="noOfItems">Subtotal</span>
          </div>
          <div class="two wide column"></div>
          <div class="five wide right aligned column">
            <strong class="noOfItems">P 700.00</strong>
          </div>
        </div>
        <div class="ui divider"></div>
        <div class="row">
          <div class="column"></div>
          <div class="seven wide column ">
              <span class="noOfItems">Total</span>
          </div>
          <div class="two wide column"></div>
          <div class="five wide right aligned column">
            <strong class="noOfItems">P 700.00</strong>
          </div>
        </div>
      </div>

      <div class="ui grid orderOptions">
        <div class="row"></div>
        <div class="row orderOptions">
            <a href="<?php echo site_url();?>/COrdered/viewMDashboard?>" class="rbtn" align="center"><h4 class="lbtnlabel">Edit</h4></a>

            <a href="<?php echo site_url();?>/COrdered/viewMDashboard?>" class="rght lbtn" align="center" ><h4 class="lbtnlabel">Back</h4></a>

            <div class="column"></div>
        </div>
        <div class="row"></div>
      </div>




    </div>
  </div>
  