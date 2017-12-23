<h1 class="ui header order">
  <i class="circular plus icon"></i>
  <div class="content">
    Order
    <div class="sub header">Make new order</div>
  </div>
</h1>
<div class="row r1">
  <div class="ui two column center aligned grid">
    <div class="column">
      <img src= "<?php echo base_url('assets/images/qrcode.png ')?>" class="option qr">
    </div>
    <div class="column">
      <img src= "<?php echo base_url('assets/images/hand.png ')?>"  class="option manual">
    </div>
  </div>
</div>
<div class="row">
  <div class="ui two column center aligned grid">
    <div class="column">
     <a class="qr" href="<?php echo site_url()?>/COrdered/viewQDashboard?>">QR CODE</a>
    </div>
    <div class="column">
        <a class="manual" href="<?php echo site_url()?>/COrdered/viewMDashboard?>">MANUAL INPUT</a>
    </div>
  </div>
</div>
</body>
</html>