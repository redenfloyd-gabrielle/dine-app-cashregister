
<script>
$(document).ready(function(){
	$('.ui.dropdown').dropdown();
	$('.ui.sticky').sticky();

    // Change Password Modal
	$('#changePass').click(function(){
		$('#confirmUpdate').modal('show');
	})

	$('#getQr').click(function(){
        $('#scanqr').modal('show');
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
}); 

$(document).ready(function(){
	$(document).on('change','#old',function() {
		var temp = $('#pass').val();
		var shaObj = new jsSHA($('#old').val(), 'ASCII');
		var hash = shaObj.getHash('SHA-512','HEX');
		if (hash == temp){
			alert('match');
		} else {
			alert('mismatch');
		}
		//classes sa if
    });

	$(document).on('change','#new',function() {
		//put classes
    });

	$(document).on('keyup','#confirm',function() {
		var newPass = $('#new').val();
		var confirmPass = $('#confirm').val();
		if (confirmPass == newPass){
			alert('match');
		} 
		//classes sa if
    });

}); 
</script> 