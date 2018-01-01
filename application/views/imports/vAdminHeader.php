<?php if ($this->session->userdata('userSession') && $this->session->userdata['userSession']['user_type'] == 'ADMIN') { ?>
<!DOCTYPE html>
<html> 
<head>
    <title>Dine-Admin Module</title>
    <link rel='stylesheet' href='<?php echo base_url("assets/css/adminAssets.css")?>'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/posAssets.css')?>">
    <link rel='stylesheet' href='<?php echo base_url("assets/semantic/semantic.min.css")?>'>
    <script src='<?php echo base_url("assets/jquery.min.js")?>'></script>
    <script src='<?php echo base_url("assets/semantic/semantic.min.js")?>'></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/tablesort.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/instascan.min.js')?>"></script>
    <script src='<?php echo base_url("assets/jquery/sha.js")?>'></script>
</head>
<body> 
 

<div class='ui top attached inverted menu'>
    <a class="borderless item toggleMenu">
        <i class="sidebar icon"></i>
    </a>
    <a class='borderless item' href='<?php echo site_url()?>/CUser/viewAdminDashboard?>'>DINE</a>
    <div class='right menu'>
        <div class="ui inverted transparent left icon action input borderless item">
            <input type="text" placeholder="Enter keyword..." name="search">
            <i class="search icon"></i>
            <button class='ui brown button'>Search</button>
        </div>
        <div class='ui simple dropdown item' tabindex='0'>
        <i class='user icon'></i>Profile
        <i class='dropdown icon' tabindex='0'>
            <div class='menu' tabindex='-1'></div>
        </i>
        <div class='menu' tabindex='-1'>
            <a class='item' id='changePass'><i class='lock icon'></i>Change Password</a>
            <a class='item' href='<?php echo site_url()?>/CLogin/userLogout?>' ><i class='power icon'></i>Logout</a>
        </div>
    </div>
    </div>
</div>

<div class="ui bottom attached segment pushable">
  <div class="ui inverted labeled icon left inline vertical thin sidebar menu">
    <div style='background: brown;'>
        <br>
        <img class='ui tiny centered image' src='<?php echo base_url("assets/images/admin.png")?>'>
        <br>
        <p style='background-color: white;'>ADMIN</p>
        <h3 style='color:white;'>Hello, 
            <strong style='font-style: italic;'>
                <?php echo $this->session->userdata['userSession']['user_first_name'];?> 
            </strong>
        </h3>
        <p style='color:white;'>
            ID: <?php echo $this->session->userdata['userSession']['user_id'];?> 
        </p>
    </div> 
    <a class='item' href='<?php echo site_url()?>/CUser/viewAdminDashboard'>
        <i class='dashboard icon'></i> Dashboard
    </a>
    <a class='item' href='<?php echo site_url()?>/CProduct/viewCategoryList'>
        <i class='food icon'></i> Products
    </a>
    <a class='item' href='<?php echo site_url()?>/COrdered/viewOrderList?>'>
        <i class='shop icon'></i> Orders
    </a>
    <a class='item' href='<?php echo site_url()?>/CUser/viewReports?>'>
        <i class='bar chart icon'></i> Reports
    </a>
    <a class='item' href=''>
        <i class='calculator icon'></i> POS
    </a>
  </div>





<!-- CHANGE PASSWORD MODAL -->

<div class="ui mini modal" id="confirmUpdate" aria-hidden="true">
  <div class="header">Update user credentials</div>
  <div class="content">
    <form class="ui form updatePassForm" action="<?php echo site_url();?>/CUser/changePassword" method="POST">
        <div class="required field">
            <label>Old Password</label>
            <input type="password" name="old" id="old" required placeholder="Enter old password">
        </div>
        <div class="required field">
            <label>New Password</label>
            <input type="password" name="new" id="new" required placeholder="Enter new password">
        </div>
        <div class="required field">
            <label>Confirm New Password</label>
            <input type="password" name="confirm" id="confirm" required placeholder="Confirm new password">
        </div>
        <div class="ui error message"></div>

  </div>
  <div class="actions" >
    <div class="ui cancel gray button">Cancel</div>
    <button class="ui submit brown button" type="submit">Update</button>
    </form>
  </div>
</div>



<?php 
} else if ($this->session->userdata['userSession']['user_type'] == 'REGULAR') {
    redirect('CLogin/viewPos');
} else if ($this->session->userdata['userSession']['user_type'] == 'SUPERADMIN') {
    redirect('CLogin/viewSuperadminDashboard');
} else {
    redirect('CInitialize');
}
?>
