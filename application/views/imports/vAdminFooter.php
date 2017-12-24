
<script>
$(document).ready(function(){
	$('.ui.dropdown').dropdown();
	$('.ui.sticky').sticky();

    // Change Password Modal
	$('#changePass').click(function(){
		$('#confirmUpdate').modal('show');
	})
}); 
</script> 