<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
	<link rel='stylesheet' href='<?php echo base_url("assets/semantic/semantic.min.css")?>'>
</head>
<body>
<div class="ui grid">
	<div></div>
	<div class="row" id="errMsg">
		<div class="five wide column"></div>
		<div class="six wide left aligned middle aligned column">
			<h1 class="ui left aligned inverted header">
	            <i class="remove user icon"></i>
	            <div class="content">
	              <span class="errContent">Access Denied</span>
	              <div class="sub header errSubContent">Access to the requested page has been denied.</div>
	            </div>
	        </h1> <!-- header -->
			<a href="<?php echo site_url()?>/CInitialize"><button class="ui large inverted icon button" style="background: #450000;"><i class="left arrow icon"></i>&nbspBACK</button></a>
		</div>
		<div class="five wide column"></div>
	</div>
</div>
</body>
</html>