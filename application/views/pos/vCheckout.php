<div class="ui two column stackable grid">
  <div class="row"></div>
  <div class="row">
    <div class="column">
      <div class="ui unstackable grid">
        <div class="row">
          <div class="column"></div>
          <div class="ten wide column">
            <h1 class="ui header headerName">
              <i class="circular cart icon"></i>
              <div class="content">
                Summary
                <div class="sub header subHeaderName">Order summary</div>
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
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Product 1</td>
                    <td>P 70.00</td>
                    <td>5</td>
                    <td>P 350.00</td>
                  </tr>
                  <tr>
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
    </div>


    <div class="column">
      <div class="ui unstackable grid">

        <div class="row">
          <div class="two wide column"></div>
          <div class="thirteen wide column">
            <h3 class="hbox">
                Cash Payment
            </h3>
          </div>
          <div class="column"></div>
        </div>

        <div class="row">
          <div class="two wide column"></div>
          <div class="six wide column">
            Total Sum
          </div>
          <div class="six wide right aligned column">
            101.19
          </div>
          <div class="column"></div>
        </div>

        <div class="row">
          <div class="two wide column"></div>
          <div class="six wide column">
            Price Rounding
          </div>
          <div class="six wide right aligned column">
            0.01
          </div>
          <div class="column"></div>
        </div>

        <div class="row">
          <div class="column"></div>
          <div class="fourteen wide column">
            <div class="ui right labeled input ilabel">
              <label for="amount" class="ui label">P</label>
              <input type="text" placeholder="Amount" id="amount">
              <div class="ui basic label button">.00</div>
            </div>
          </div>
          <div class="column"></div>
        </div>

        <div class="row">
          <div class="two wide column"></div>
          <div class="six wide column">
            <strong class=" changePrice">CHANGE</strong>
          </div>
          <div class="six wide right aligned column">
            <strong class=" changePrice">P 25.75</strong>
          </div>
          <div class="column"></div>
        </div>


        <div class="row">
          <div class="four wide column"></div>
          <div class="eight wide center aligned middle aligned column">
            <div class="three ui buttons">
              <button class="ui basic blue button">1</button>
              <button class="ui basic blue button">2</button>
              <button class="ui basic blue button">3</button>
            </div>
            <div class="three ui buttons">
              <button class="ui basic blue button">4</button>
              <button class="ui basic blue button">5</button>
              <button class="ui basic blue button">6</button>
            </div>
            <div class="three ui buttons">
              <button class="ui basic blue button">7</button>
              <button class="ui basic blue button">8</button>
              <button class="ui basic blue button">9</button>
            </div>
            <div class="three ui buttons">
              <button class="ui basic blue button">0</button>
              <button class="ui basic blue button">00</button>
              <button class="ui basic blue button">x</button>
            </div>
          </div>
          <div class="four wide column"></div>
        </div>


        <div class="row">
          <div class="two wide column"></div>
          <div class="four wide column">
            <a href="<?php echo site_url()?>/COrdered/viewMDashboard?>"><button class="lbtn">
              <h4 class="lbtnlabel">Back</h4>
            </button></a>
          </div>
          <div class="four wide right aligned column">
            <button class="rbtn"">
              <h4 class="rbtnlabel">Charge & No Receipt</h4>
            </button>
          </div>
          <div class="five wide column">
            <button class="rbtn"">
              <h4 class="rbtnlabel">Charge & Print</h4>
            </button>
          </div>
          <div class="column"></div>
        </div>


      </div>
    </div>
  </div>     
</div>




<!-- 
<div class="ui two column grid">
  <div class="left floated left aligned seven wide column"><br>
    <h1 class="ui header">
      <i class="circular cart icon"></i>
      <div class="content">
        Summary
        <div class="sub header">Order Summary</div>
      </div>
    </h1><br>   
      <h4 class="sub">No. of Items<div class="rf">4</div></h4>
      <h4 class="sub">Subtotal<div class="rf">P1150.00</div></h4>
      <div class="ui divider"></div>
      <h2 class="sub">Total<div class="rf">P1150.00</div></h2>
    </form>
  </div>
  <div class="right floated left aligned seven wide column"><br>
    <h3 class="hbox">
        Cash Payment
    </h3>
    <div class="mid"><br>
      <h4 class="total">Total Sum: P<span class="value">101.19</span></h4>
      <h4>Price Rounding: P<span class="value">0.01</span></h4>
      <h2>P101.20</h2>
      <div class="ui right labeled input ilabel">
        <label for="amount" class="ui label">$</label>
        <input type="text" placeholder="Amount" id="amount">
        <div class="ui basic label">.00</div>
      </div>
      <div class="ui divider divide"></div>
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
          <button class="kbtn"><img src= "<?php //echo base_url('assets/images/backspace.png')?>"></button>
        </div>
      </div>
      <div class="ui divider divide"></div> 
      <div class="ui three column grid cbtn">
        <div class="nine wide column">
          <a href="<?php //echo site_url()?>/COrdered/viewMDashboard?>"><button class="lbtn">
            <h4 class="lbtnlabel">Back</h4>
          </button></a>
        </div>
        <div class="three wide column">
          <button class="rbtn"">
            <h4 class="rbtnlabel">Charge & No Receipt</h4>
          </button>
        </div>
        <div class="three wide column">
          <button class="rbtn"">
            <h4 class="rbtnlabel">Charge & Print</h4>
          </button>
        </div>
      </div>
    </div>
  </div>

</div>

 -->