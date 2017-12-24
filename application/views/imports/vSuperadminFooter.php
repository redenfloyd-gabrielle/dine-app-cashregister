
<script>
$(document).ready(function(){
	$('.ui.dropdown').dropdown();
	$('.ui.sticky').sticky();
	$('#changePass').click(function(){
		$('#confirmUpdate').modal('show');
	})
});
</script> 