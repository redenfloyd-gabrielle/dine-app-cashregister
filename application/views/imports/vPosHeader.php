<?php if ($this->session->userdata('userSession') && $this->session->userdata['userSession']['user_type'] != 'SUPERADMIN') { ?>
<!DOCTYPE html>
<html>
<head>
	<title>DINE | POS</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/posAssets.css')?>">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/semantic/semantic.min.css')?>" />
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.min.js')?>"></script>
    <script src='<?php echo base_url("assets/semantic/semantic.min.js")?>'></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/instascan.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.json-2.4.min.js')?>"></script>
</head>
<body>
<div class="ui large top attached inverted teal menu borderless">
	<a class="item bpmono size18">DINE | POS</a>
	<div class="right menu bpmono size18">
		<div class="item">
			<span style="text-transform: uppercase;"><?php echo $this->session->userdata['userSession']['user_first_name'].' '.$this->session->userdata['userSession']['user_last_name'];?> &nbsp | &nbsp <span id="date"></span> &nbsp | &nbsp <span class ="time"></span>&nbsp &nbsp</span>
		</div>
		<div class="hidden item"></div>
		<?php if($this->session->userdata['userSession']['user_type'] == "ADMIN"){
			echo '<a class="item" href="'.site_url().'/CUser/viewAdminDashboard"><i class="user icon"></i>SWITCH TO ADMIN</a> 
					<div class="hidden item"></div>';
		}?>
		<a class="item" href="<?php echo site_url()?>/CLogin/userLogout?>"><i class="white sign out icon"></i>LOGOUT</a>
	</div>
</div>
<div class="ui grid">	
<script> 
	function updateClock()
    {
        var date = new Date();
        var hours = date.getHours();
	    var minutes = date.getMinutes();
	    var seconds = date.getSeconds();
	    var ampm = hours >= 12 ? 'PM' : 'AM';
	    hours = hours % 12;
	    hours = hours ? hours : 12; // the hour '0' should be '12'
	    minutes = minutes < 10 ? '0'+minutes : minutes;
	    seconds = seconds < 10 ? '0'+seconds : seconds;
	  
        var strTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;

        $(".time").html(strTime);
     }

    $(document).ready(function()
    {
       setInterval('updateClock()', 1000);
       var d = new Date();
	   var month = d.getMonth()+1;
	   var day = d.getDate();
	   var monthNames = ["January", "February", "March", "April", "May", "June",
			  "July", "August", "September", "October", "November", "December"
			];
	   var date = monthNames[month-1]+ ' ' +
	    (day<10 ? '0' : '') + day+','+ d.getFullYear();   
	   $('#date').append(date);
	   $('body').removeClass('dimmable');
    });

</script>

<?php } else if ($this->session->userdata['userSession']['user_type'] == 'SUPERADMIN') {
	 redirect('CLogin/viewSuperadminDashboard');
} else {
    redirect('CInitialize');
}
?>