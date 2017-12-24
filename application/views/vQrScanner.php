<div class="left floated left aligned seven wide column"><br>
  <div class="ui middle aligned center aligned grid">
	<video id="qrcam" class="vid"></video> 
	<h2 class="scannerlabel">Scan Here</h2>
	
  </div>
  <input type="text" id = "qrcode">

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

</div>