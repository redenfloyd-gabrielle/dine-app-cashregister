  <div class="row"></div>
  <div class="row"></div>
  <div class="row">
    <div class="two wide column"></div>
    <div class="twelve wide column">
      <h1 class="ui grey dividing header">
        <i class="shopping basket icon"></i>
        <div class="content">
          ORDER
          <div class="sub header">Create new order</div>
        </div>
      </h1>
      <div class="ui hidden divider"></div>
      <div class="ui info visible floating message msg">
        <ul class="list">
          <li>To retrieve order from guest device, choose <strong>SCAN QR CODE</strong></li>
          <li>To manually input order, choose <strong>INPUT ORDER</strong></li>
        </ul>
      </div>
    </div>
    <div class="two wide column"></div>
  </div>
  <div class="row"></div>
  <div class="two column row">
    <div class="center aligned middle aligned column">
      <a href="<?php echo site_url()?>cashregister/qrcode"><img class="ui centered small image" src="<?php echo base_url('assets/images/qrcode.png')?>">
       <h2 class="ui header itemLabels">SCAN QR CODE</h2>
      </a>
    </div>
    <div class="center aligned middle aligned column">
      <a href="<?php echo site_url()?>cashregister/manual"><img class="ui centered small image" src="<?php echo base_url('assets/images/hand.png')?>">
        <h2 class="ui header itemLabels">INPUT ORDER</h2>
      </a>
    </div>
  </div>
</div> <!-- closing grid -->

</body>
</html>