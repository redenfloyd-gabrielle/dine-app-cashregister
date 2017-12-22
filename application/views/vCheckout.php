<div class="ui two column grid">
  <div class="left floated left aligned seven wide column"><br>
    <h1 class="ui header">
      <i class="circular cart icon"></i>
      <div class="content">
        Summary
        <div class="sub header">Order Summary</div>
      </div>
    </h1><br>
    <div class="ui center aligned grid">
  
  <form>
    <div class="ordertbl">
      <table class="ui single line table ">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Unit Price</th>
              <th>Quantity</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Product 1</td>
              <td>P450.00</td>
              <td>1</td>
              <td>P450</td>
            </tr>
            <tr>
              <td>Product 2</td>
              <td>P300.00</td>
              <td>2</td>
              <td>P600.00</td>
            </tr>
            <tr>
              <td>Product 3</td>
              <td>P100.00</td>
              <td>1</td>
              <td>P100.00</td>
            </tr>
          </tbody>
        </table>
    </div>   
    <h4 class="sub">No. of Items<div class="rf">4</div></h4>
    <h4 class="sub">Subtotal<div class="rf">P1150.00</div></h4>
    <div class="ui divider"></div>
    <h2 class="sub">Total<div class="rf">P1150.00</div></h2>
  </form>
</div>
</div>
  <div class="vdivide"></div>
    <div class="right floated left aligned seven wide column"><br>
      <h3 class="hbox">
          Cash Payment
      </h3>
      <div class="mid"><br>
        <h4 class="total">Total Sum: P<span class="value">101.19</span></h4>
        <h4>Price Rounding: P<span class="value">0.01</span></h4>
        <h2>P101.20</h2>
        <!-- <div class="ui right labeled input">
          <label for="amount" class="ui label">P</label>
          <input type="text" placeholder="Enter Amount" id="amount">
          <button class="ui basic label">.00</button>
        </div> -->
        <div class="ui right labeled input">
          <label for="amount" class="ui label">$</label>
          <input type="text" placeholder="Amount" id="amount">
          <div class="ui clickable basic label">.00</div>
        </div>
        <div class=" divider"></div>
        <h4 class="change">Change:  P23.80</h4>
        <div class="keypad">
            <div class="row ">
                <button class="kbtn">1</button>
                <button class="kbtn">2</button>
                <button class="kbtn">3</button>
              </div>
              <div class="row">
                <button class="kbtn">4</button>
                <button class="kbtn">5</button>
                <button class="kbtn">6</button>
              </div>
              <div class="row">
                <button class="kbtn">7</button>
                <button class="kbtn">8</button>
                <button class="kbtn">9</button>
              </div>
              <div class="row">
                <button class="kbtn" >0</button>
                <button class="kbtn" >00</button>
                <button class="kbtn"><img src= "<?php echo base_url('assets/images/backspace.png')?>"></button>
              </div>
        </div>
        <div class="ui divider"></div> 
      </div>
      <div class="ui three column grid cbtn">
        <div class="nine wide column">
          <button class="bbtn" (click)="btnBack()">
            <h4><i class="angle left double icon"></i>Back</h4>
          </button>
        </div>
        <div class="three wide column">
          <button class="sbtn" (click)="cBtn()">
            <h4>Charge & No Receipt</h4>
          </button>
        </div>
        <div class="three wide column">
          <a class="btn" align="center" >Charge & Print</a>
        </div>
      </div>
    </div>
  </div>
</div>

