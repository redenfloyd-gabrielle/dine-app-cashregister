<?php if ($this->session->userdata('userSession') && $this->session->userdata['userSession']['user_type'] != 'SUPERADMIN') { ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dine-POS</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/posAssets.css')?>">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/semantic/dist/semantic.min.css')?>" />
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.min.js')?>"></script>
    <script src='<?php echo base_url("assets/semantic/semantic.min.js")?>'></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/instascan.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.json-2.4.min.js')?>"></script>
     <script type="text/javascript" src="<?php echo base_url('assets/jquery/moment.min.js')?>"></script>

    
    
</head>
<body>
	<div class="ui top attached borderless menu" id="topMenu">
		<h3 class="ui header item " id="topItem">DINE</h3>
		<div class="right menu">
			<h3 class="ui header item " id="rightTopItem"><?php echo $this->session->userdata['userSession']['user_first_name'].' '.$this->session->userdata['userSession']['user_last_name'];?> &nbsp &nbsp | &nbsp &nbsp <span id="date"></span>&nbsp &nbsp | &nbsp &nbsp <span class ="time" ></span>&nbsp &nbsp</h3>
			<div class="hidden item"></div>
			<a class="item" href="<?php echo site_url()?>/CLogin/userLogout?>"><i class="very large white sign out icon"></i></a>
		</div>
	</div>

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
	       var date = moment().format("MM/DD/YYYY");
		   // var time = moment().format("h:mm A");
		   $('#date').append(date);
	    });

	</script>

<?php } else if ($this->session->userdata['userSession']['user_type'] == 'SUPERADMIN') {
	 redirect('CLogin/viewSuperadminDashboard');
} else {
    redirect('CInitialize');
}
?>