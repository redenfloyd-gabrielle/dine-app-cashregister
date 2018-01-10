<div class="ui stackable two column grid">
	<div class="row"></div>
	<div class="row">
		<div class="column">
			<div class="ui stackable grid">
				<div class="row">
					<div class="column"></div>
					 
					<div class="fourteen wide column">
					<div class="ui breadcrumb">
						<a class="section" href="<?php echo site_url()?>/CLogin/viewPos?>">Home</a>
						<i class="right chevron icon divider"></i>
						<div class="active section">QR SCANNER</div>
					</div> 
					<div class="mid">
						<video id="qrcam" class="vid" ></video> 
						<h2 class="scannerlabel">Scan Here</h2>
					<input type="hidden" name="qr" id="qr" value="<?php echo $qr ?>">
						<button class="ui brown big icon button" id="trybtn"><i class="refresh icon"></i>Try Again</button>
					</div>
					</div>
					<div class="column"></div>		
				</div>
			</div>
		</div>
		<!--  <div id="vOrder" class="column"> -->
	    </div>
	</div>
</div>
</body>
</html>
<script type="text/javascript"> 
	var qr = new Instascan.Scanner({
		video: $('#qrcam')[0]
	});
	qr.addListener('scan',function(data){
		console.log(data);

		if(data != null){
			dataSet = "qr="+data;
		}else{
			var qr = $('#qr').val().trim();
			dataSet = "qr="+qr;
		}
		$.ajax({
			type: "POST",
			url: '<?php echo site_url()?>/COrdered/displayOrderFromQR',
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
				console.log(dataSet);
			}
		});
	});
	Instascan.Camera.getCameras().then(function(cams){
		qr.start(cams[0]);
	}).catch(function(err){
		console.log(err);
	});

</script>	