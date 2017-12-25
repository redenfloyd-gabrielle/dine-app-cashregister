<?php if ($this->session->userdata('userSession') && $this->session->userdata['userSession']['user_type'] != 'SUPERADMIN') { ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dine-POS</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style1.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/posAssets.css')?>">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/semantic/dist/semantic.min.css')?>" />
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.min.js')?>"></script>
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
						<video id="qrcam" class="vid" ></video> 
						<h2 class="scannerlabel">Scan Here</h2>
						<!-- <form method="POST" action="<?php echo site_url()?>/COrdered/displayOrder?>" -->
							<input type="hidden" id = "qrcode" name="qrcode">
						<!-- </form> -->
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
                <div class="seven wide column">
                    <h1 class="ui header headerName">
                    <i class="circular cart icon"></i>
                    <div class="content">
                        Orders
                        <div class="sub header subHeaderName">List of Orders</div>
                    </div>
                    </h1>
                </div>
                <div class="seven wide center aligned middle aligned column">
                    <a href="<?php echo site_url()?>/COrderItem/viewEditOrder?>"><i class="brown huge edit icon"></i></a>
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
                    <a href="<?php echo site_url();?>/CReceiptItem/viewCheckout" class="rght lbtn" style="margin-right: 50px;"><h4 class="lbtnlabel">Checkout</h4></a>
                    <a href="<?php echo site_url();?>/CProduct/viewMDashboard" class="rght lbtn" align="center" ><h4 class="lbtnlabel">Back</h4></a>
                    <div class="column"></div>
                </div>
                <div class="row"></div>
            </div>
        </div>
	</div>
</div>
<!-- <div class="vdivide"></div> -->
</body>
</html>
<script type="text/javascript">

	var qr = new Instascan.Scanner({
		video: document.getElementById("qrcam")
	});
	
	document.getElementById("trybtn").addEventListener("click", tryFunc);

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

</script>	