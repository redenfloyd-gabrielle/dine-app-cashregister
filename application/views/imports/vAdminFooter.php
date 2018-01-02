
<script>
$(document).ready(function(){
	$('.ui.dropdown').dropdown();

    $('.ui.sticky').sticky();

    // Change Password Modal
	$('#changePass').click(function(){
		$('#confirmUpdate').modal('show');
	});

    $('#confirmCancel').click(function(){
        $('#cancelModal').modal('show');
    });

    $('#confirmCancelBR').click(function(){
        $('#cancelModal').modal('show');
    });

    $('.ui.modal').modal('setting', 'closable', false);

    $('table').tablesort();
 
    $('.ui.sidebar').sidebar({ context: $('.bottom.segment')})
                    .sidebar('attach events', '.toggleMenu')
    ;

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

$(document).ready(function(){
	$(document).on('change','#image',function(e) {
        var fileName = e.target.files[0].name;
        $('#pic').val(fileName);
    });


});
</script> 