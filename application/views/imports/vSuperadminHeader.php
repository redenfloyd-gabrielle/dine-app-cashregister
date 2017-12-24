<?php if ($this->session->userdata('userSession') && $this->session->userdata['userSession']->user_type == 'SUPERADMIN') { ?>
 <!DOCTYPE html>
<html>
<head>
    <title>Dine-Admin Module</title>
    <link rel='stylesheet' href='<?php echo base_url("assets/css/superadminAssets.css")?>'>
    <link rel='stylesheet' href='<?php echo base_url("assets/semantic/semantic.min.css")?>'>
    <script src='<?php echo base_url("assets/jquery.min.js")?>'></script>
    <script src='<?php echo base_url("assets/semantic/semantic.min.js")?>'></script>
</head>
<body>
 
<div class='ui sticky fixed inverted menu'>
    <div class='ui right floated simple dropdown item' tabindex='0'>
        <i class='user icon'></i>Profile
        <i class='dropdown icon' tabindex='0'>
      <div class='menu' tabindex='-1'></div>
    </i>
        <div class='menu' tabindex='-1'>
            <a href='' class='item'><i class='settings icon'></i>Settings</a>
            <a href='<?php echo site_url()?>/CLogin/userLogout' class='item'><i class='sign out icon'></i>Logout</a>
        </div>
    </div>
</div>
<?php } else if ($this->session->userdata['userSession']->user_type == 'REGULAR') {
    redirect('CLogin/viewPos');
} else if ($this->session->userdata['userSession']->user_type == 'ADMIN') {
    redirect('CLogin/viewAdminDashboard');
} else {
    redirect('CInitialize');
}
?>