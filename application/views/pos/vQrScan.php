<?php if ($this->session->userdata('userSession') && $this->session->userdata['userSession']['user_type'] != 'SUPERADMIN') { ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dine-POS</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/posAssets.css')?>">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/semantic/dist/semantic.min.css')?>" />
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.min.js')?>"></script>
    <script src='<?php echo base_url("assets/semantic/semantic.min.js")?>'></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/instascan.min.js')?>"></script>
</head>
<body>
	<div class="ui top attached borderless menu" id="topMenu">
		<h3 class="ui header item " id="topItem">DINE</h3>
		<div class="right menu">
			<h3 class="ui header item " id="rightTopItem"><?php echo $this->session->userdata['userSession']['user_first_name'].' '.$this->session->userdata['userSession']['user_last_name'];?> &nbsp &nbsp | &nbsp &nbsp <span id="curdate"></span>&nbsp &nbsp | &nbsp &nbsp <span id ="curtime" ></span>&nbsp &nbsp</h3>
			<div class="hidden item"></div>
			<a class="item" href="<?php echo site_url()?>/CLogin/userLogout?>"><i class="very large white sign out icon"></i></a>
		</div>
	</div>

	<script>
		var dt = new Date();
		document.getElementById("curdate").innerHTML = dt.toLocaleDateString();
		document.getElementById("curtime").innerHTML = dt.toLocaleTimeString();
	</script>

<?php } else if ($this->session->userdata['userSession']['user_type'] == 'SUPERADMIN') {
	 redirect('CLogin/viewSuperadminDashboard');
} else {
    redirect('CInitialize');
}
?>

<div class="ui stackable two column grid">
	<div class="row"></div>
	<div class="row">
		<div class="column">
			<div class="ui stackable grid">
				<div class="row">
					<div class="column"></div>
					<div class="fourteen wide center aligned middle aligned column">
						<video id="qrscan" class="vid" ></video> 
						<h2 class="scannerlabel">Scan Here</h2>
						<button class="ui brown big icon button" id="trybtn"><i class="refresh icon"></i>Try Again</button>	
					</div>
					<div class="column"></div>		
				</div>
			</div>
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
            <?php if(isset($order_info)) { ?>
                 <?php foreach ($order_info as $order){ ?>
                <tr id="myTR">
                    <td><?php echo $order->product_name; ?></td>
                    <td><?php echo $order->product_price; ?></td>
                    <td><?php echo $order->order_item_qty; ?></td>
                    <td><?php echo $order->order_item_subtotal; ?></td>
                </tr>
                <?php } ?>
            <?php } ?>
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
        P<span id="due"><?php echo $total ?></span>
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
        <a href="<?php echo site_url();?>/CLogin/viewPos" class="rght rbtn" align="center" ><h4 class="rbtnlabel">Charge/No Receipt</h4></a>
      </div>
      <div class="three wide column">
        <a href="<?php echo site_url();?>/CReceipt/viewReceipt" class="rght rbtn" align="center" "><h4 class="rbtnlabel">Charge & Print</h4></a>
      </div>
      
      <div class="column"></div>
    </div>
    <div class="row"></div>
</div>
</body>
</html>
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
	document.getElementById("trybtn").addEventListener("click", tryFunc);
        var qr = new Instascan.Scanner({
            video: document.getElementById("qrscan")
        });
		function tryFunc() {
			qr.addListener('scan',function(data){
                var dataSet = "qr="+data;
                $.ajax({
                    type: "POST",
                    url: '<?php echo site_url()?>/COrdered/displayOrder',
                    data: dataSet,
                    cache: false,
                    success: function(result){
                        if(result){
                            $('body').html(result);
                         }else{
                            alert("Error");
                         }                 
                    },
                    error: function(jqXHR, errorThrown){
                        console.log(errorThrown);
                    }
                });
                
            });
            Instascan.Camera.getCameras().then(function(cams){
                qr.start(cams[0]);
            }).catch(function(err){
                console.log(err);
            });
	    }
      $(document).ready(function(){
        $("#close").on('click',function(){
              $("#cashinput").modal('hide');
          });
          
          $("#cashmodal").on('click',function(){
              $("#cashinput").modal('show');
          });

//           $("#cash").keyup(function(){
//     $("#cashfield").css("background-color", "pink");
// });
        });
</script>



