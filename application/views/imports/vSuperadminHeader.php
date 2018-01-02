<?php if ($this->session->userdata('userSession') && $this->session->userdata['userSession']['user_type'] == 'SUPERADMIN') { ?>
 <!DOCTYPE html>
<html>
<head>
    <title>Dine-Admin Module</title>
    <link rel='stylesheet' href='<?php echo base_url("assets/css/superadminAssets.css")?>'>
    <link rel='stylesheet' href='<?php echo base_url("assets/semantic/semantic.min.css")?>'>
    <script src='<?php echo base_url("assets/jquery.min.js")?>'></script>
    <script src='<?php echo base_url("assets/semantic/semantic.min.js")?>'></script>
    <script src='<?php echo base_url("assets/jquery/sha.js")?>'></script>
</head>
<body>

<div class='ui top attached inverted menu'>
    <a class="borderless item toggleMenu">
        <i class="sidebar icon"></i>
    </a>
    <a class='borderless item' href='<?php echo site_url()?>/CUser/viewSuperadminDashboard?>'>DINE</a>
    <div class='right menu'>
        <div class="ui inverted transparent left icon action input borderless item">
            <input type="text" placeholder="Enter keyword..." name="search">
            <i class="search icon"></i>
            <button class='ui blue button'>Search</button>
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
    <div style='background: blue;'>
        <br>
        <img class='ui tiny centered image' src='<?php echo base_url("assets/images/admin.png")?>'>
        <br>
        <p style='background-color: white;'>SUPERADMIN</p>
        <h3 style='color:white;'>Hello, 
            <strong style='font-style: italic;'>
                <?php echo $this->session->userdata['userSession']['user_first_name'];?> 
            </strong>
        </h3>
        <p style='color:white;'>
            ID: <?php echo $this->session->userdata['userSession']['user_id'];?> 
        </p>
        <input hidden='' type='text' name='pass' id='pass' value='<?php echo strtolower($this->session->userdata['userSession']['user_password']);?>'>
    </div> 
    <a class='item' href='<?php echo site_url()?>/CUser/viewSuperadminDashboard?>'>
        <i class='dashboard icon'></i> Dashboard
    </a>
    <a class='item' href='<?php echo site_url()?>/CUser/viewUsersList?>'>
        <i class='users icon'></i> Users
    </a>
  </div>





<!-- CHANGE PASSWORD MODAL -->

<div class="ui mini modal" id="confirmUpdate" aria-hidden="true">
  <div class="header">Update user credentials</div>
  <div class="content">
    <form class="ui form" action="<?php echo site_url();?>/CUser/changePassword" method="POST">
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
    
    <p></p> 
  </div>
  <div class="actions" >
    <div class="ui cancel gray button">Cancel</div>
    <button class="ui approve blue button" type="submit">Update</button>
    </form>
  </div>
</div>



<!-- leave page modal -->
<div class="ui basic modal" id="cancelModal">
  <div class="ui icon header">
    <i class="sign out icon"></i>
    Leave Page
  </div>
  <div class="content">
    <center><p style='font-size: 1.5em;'>Are you sure you want to leave this page? Changes you made may not be saved.</p></center>
  </div>
  <div class="actions">
    <div class="ui gray basic cancel inverted button">
      <i class="remove icon"></i>
      No
    </div>
    <a href="<?php echo site_url()?>/CUser/viewUsersList"><button class="ui basic blue ok inverted button" type="submit">
      <i class="checkmark icon"></i>
      Yes
    </button></a>
  </div>
</div> 




<?php 
} else if ($this->session->userdata['userSession']['user_type'] == 'REGULAR') {
    redirect('CLogin/viewPos');
} else if ($this->session->userdata['userSession']['user_type'] == 'ADMIN') {
    redirect('CLogin/viewAdminDashboard');
} else {
    redirect('CInitialize');
}
?>
