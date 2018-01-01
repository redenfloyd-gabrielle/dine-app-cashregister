
<script>
$(document).ready(function(){
	$('.ui.dropdown').dropdown();
	$('.ui.sticky').sticky();
	$('#changePass').click(function(){
		$('#confirmUpdate').modal('show');
	})
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