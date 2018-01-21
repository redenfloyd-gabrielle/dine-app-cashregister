	<div class="row"></div>
	<div class="row">
		<div class="column"></div>
		<div class="seven wide column">
			<h1 class="ui grey dividing header">
		        <img class="ui big image" src="<?php echo base_url("assets/images/qrcode.png")?>">
		        <div class="content">
		          ORDER
		          <div class="sub header">Retrieve order via QR Code</div>
		        </div>  
		    </h1>

		    <a href="<?php echo site_url()?>/CLogin/viewPos?>">
		    	<h4 style="color: gray;"><i class="left arrow grey icon"></i>BACK TO HOME</h4>
		    </a>

		    <div class="ui hidden divider"></div>
            
		    <div class="ui info visible message msg">
				<p>To retrieve guest order, place QR Code from mobile in front of the camera (web-cam).</p>
			</div>
			<div class="ui warning visible message msg">
				<p>If the scanner does not appear, or if the scanner failed to retrieve the order, enter the <strong>Reference Number</strong> below.</p>
			</div>

		    <center>
		    	<video id="qrcam" class="ui fluid item vid"></video> 
		    	<div class="ui hidden divider"></div>
				<div class="ui form">
				    <div class="inline field">
				        <label for="ref">Reference No.</label>
				        <div class="ui action input">
							<input type="number" placeholder="Enter Reference Number" id="ref" name="ref">
							<button class="ui button" id="ok">Submit</button>
				        </div>
				    </div>
				</div>
		    </center>
		
		</div>
		<div class="column"></div>
	</div>
	<div class="row"></div>
	<div class="row"></div>
</div> <!-- closing grid -->

<!-- INVALID QR MODAL -->
<div class="ui tiny basic modal" id="invalid">
  <div class="ui icon tiny header">
    <i class="red warning sign icon">  QR Code Failed</i>
  </div>
  <div class="content">
   <p align="center" id="error" class="size16">Please try again. Make sure you are <span class="size16" id="scantext">scanning</span> a valid code.  </p>
  </div>
  <div class="actions">
    <div class="ui green ok inverted button">
      <i class="checkmark icon"></i>
      Okay
    </div>
  </div>
</div>
<!-- SUCCESSFULLY SCANNED MODAL -->
<div class="ui tiny basic modal" id="successfull">
  <div class="ui icon tiny header">
    <i class="green checkmark icon">&nbsp Successfully scanned</i>
  </div>
  <div class="content">
   <p align="center" class="size16">QR code successfully scanned.  See order lists. </p>
  </div>
  <div class="actions">
    <div class="ui green ok inverted button" id="confirm">
      <i class="checkmark icon"></i>
      Okay
    </div>
  </div>
</div>

</body>
</html>


<script type="text/javascript"> 
	var qr = new Instascan.Scanner({
		video: $('#qrcam')[0]
	});
	Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          qr.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
	
	qr.addListener('scan',function(data){
		dataSet = "qr="+data;
		$.ajax({
			type: "POST",
			url: '<?php echo site_url()?>/COrdered/displayOrderFromQR',
			data: dataSet,
			cache: false,
			success: function(result){
				if(result){
					var data = result.split('*');
					if(data[0] == 'pending'){
						$('#successfull').modal('show');
					 	$('#confirm').on('click',function(){
					 		$('body').html(data[1]);
					 	});
						qr.stop($('#qrcam')[0]);
					}else{
						var msg = '';
						if(data[0] == 'expired'){
							msg = 'QR Code has expired.  Please try again. ';
						}else{
							msg = 'QR Code has already been scanned.  Please try again. ';
						}
						$('#error').html(msg);
						$('#invalid').modal('show');
					}
				}else{
					$('#invalid')
					  .modal('show');
				}     
			},
			error: function(jqXHR, errorThrown){
				console.log(errorThrown);
			}
		});
	});

	$('#ok').on('click', function() {
	  var qr = $("#ref").val();
	  dataSet = "qr="+qr;
	  $.ajax({
		type: "POST",
		url: '<?php echo site_url()?>/COrdered/displayOrderFromQR',
		data: dataSet,
		cache: false,
		success: function(result){
			if(result){
				var data = result.split('*');
				if(data[0] == 'pending'){
					$('#successfull').modal('show');
				 	$('#confirm').on('click',function(){
				 		$('body').html(data[1]);
				 	});
					qr.stop($('#qrcam')[0]);
				}else{
					var msg = '';
					if(data[0] == 'expired'){
						msg = 'QR Code has expired.  Please try again. ';
					}else{
						msg = 'QR Code has already been scanned.  Please try again. ';
					}
					$('#error').html(msg);
					$('#invalid').modal('show');
				}
			}else{
				var msg = 'inputting';
				$('#scantext').html(msg);
				$('#invalid')
				  .modal('show');
			}     
		},
		error: function(jqXHR, errorThrown){
			console.log(errorThrown);
			console.log(dataSet);
		}
	  });
         
   
});
</script>	