                <div class='column'></div>
                <div class='eleven wide column'>
                    <h1 class='ui header'>
                        <div class='content'>
                            ORDERS 
                            <div class='sub header'>Shows the list of orders</div>
                        </div>
                    </h1> <!-- header -->

                    <div class='ui breadcrumb'></div> <!-- breadcrumb -->
                    <a id='getQr'><button class='ui basic big circular button' title='Scan QR Code'><i class='qrcode icon' ></i>Scan QR</button></a>

                    <table class='ui very basic table'>
                        <thead>
                            <tr>
                                <th>Reference Number</th>
                                <th>Total</th>
                                <th>Order Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>  
                                <td>00001</td>
                                <td>300.00</td>
                                <td>01/05/18</td>
                                <td>
                                    <a href='<?php echo site_url()?>/COrderItem/viewOrderInfo?>'>
                                        <div class="ui blue horizontal label">View Order</div>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table> 
                    <div class='ui hidden divider'></div>
                    <div class='ui grid'>
                        <div class='row'></div>
                        <div class='middle aligned eight wide column'>
                            <p>Page 1 out of 1 pages.</p>
                        </div>
                        <div class='right aligned eight wide column'>
                            <div class='ui pagination menu'>
                                <a class='active item'>1</a>
                                <a class='item'>2</a>
                                <a class='item'>3</a>
                            </div> <!-- pagination -->
                        </div>
                    </div>

                </div> <!-- twelve wide column -->
            </div> <!-- grid -->
        </div> <!-- thirteen wide column -->
        <div class='column'></div>
    </div> <!-- row-->
</div> <!-- grid -->

<div class="ui small modal" id="scanqr">
  <div class="header">Scan QR Code</div>
  <div class="content">
    <video id="qrscan" class="vid" ></video> 
    <button class="ui brown big icon button" id="trybtn"><i class="refresh icon"></i>Try Again</button> 
  </div>
  <div class="actions"> 
    <div class="ui cancel negative button">Cancel</div>
    <a href='<?php echo site_url()?>/COrderItem/viewOrderInfo?>'><div class="ui approve positive button">Retrieve</div></a>
  </div>
</div>


</body>
</html>
