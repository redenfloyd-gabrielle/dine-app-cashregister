<div class="ui stackable grid">
	<div class="row">
		<div class="column"></div>
		<div class="fourteen wide center aligned middle aligned column">
			<video id="qrcam" class="vid" ></video> 
			<h2 class="scannerlabel">Scan Here</h2>
			<div class="ui input"> 
				<input type="text" disabled="" id = "qrcode">
			</div> 
			<script type="text/javascript">
				var qr = new Instascan.Scanner({
					video: document.getElementById("qrcam")
				});
				qr.addListener('scan',function(data){
					// console.log(data);
					document.getElementById("qrcode").value = data;
				});
				Instascan.Camera.getCameras().then(function(cams){
					qr.start(cams[0]);
				}).catch(function(err){
					console.log(err);
				});

			</script>

			<button class="ui brown big icon button"><i class="refresh icon"></i>Try Again</button>
			
		</div>
		<div class="column"></div>		
	</div>
</div>