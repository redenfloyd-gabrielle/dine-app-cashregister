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
		
		<!-- $this->view('pos/vOrder'); -->
	

	</div>
</div>
<!-- <div class="vdivide"></div> -->
</body>
</html>
<script type="text/javascript">

	var qr = new Instascan.Scanner({
		video: document.getElementById("qrcam")
	});
	qr.addListener('scan',function(data){
		console.log(data);
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
	document.getElementById("trybtn").addEventListener("click", tryFunc);

		function tryFunc() {
			Instascan.Camera.getCameras().then(function(cams){
			qr.start(cams[0]);
			}).catch(function(err){
				console.log(err);
			});
	    }

</script>	