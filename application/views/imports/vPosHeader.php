<?php if ($this->session->userdata('userSession') && $this->session->userdata['userSession']['user_type'] != 'SUPERADMIN') { ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dine-POS</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style1.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/posAssets.css')?>">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/semantic/dist/semantic.min.css')?>" />
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/instascan.min.js')?>"></script>
</head>
<body>
	<div class="ui top attached borderless menu" id="topMenu">
		<h3 class="ui header item " id="topItem">DINE</h3>
		<div class="right menu">
			<h3 class="ui header item " id="rightTopItem">EMPLOYEE 1 &nbsp &nbsp | &nbsp &nbsp NOV 18 &nbsp &nbsp | &nbsp &nbsp 10:45 AM &nbsp &nbsp</h3>
			<div class="hidden item"></div>
			<a class="item" href="<?php echo site_url()?>/CLogin/userLogout?>"><i class="very large white sign out icon"></i></a>
		</div>
	</div>

<?php } else if ($this->session->userdata['userSession']['user_type'] == 'SUPERADMIN') {
	 redirect('CLogin/viewSuperadminDashboard');
} else {
    redirect('CInitialize');
}
?>