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
 
<div class='ui sticky fixed inverted menu'>
    <div class='ui right floated simple dropdown item' tabindex='0'>
        <i class='user icon'></i>Profile
        <i class='dropdown icon' tabindex='0'>
      <div class='menu' tabindex='-1'></div>
    </i>
        <div class='menu' tabindex='-1'>
            <a id='changePass' class='item' data-target="#confirmUpdate"><i class='lock icon'></i>Change Password</a>
            <a href='<?php echo site_url()?>/CLogin/userLogout?>' class='item'><i class='sign out icon'></i>Logout</a>
        </div>
    </div>
</div>

<div class='ui visible left vertical inverted sidebar labeled icon menu'>
    <div class='borderless item'>
        <strong>DINE</strong> 
    </div>
    <a class='item' href='<?php echo site_url()?>/CUser/viewSuperadminDashboard?>'>
        <i class='dashboard icon'></i> Dashboard
    </a>
    <a class='item' href='<?php echo site_url()?>/CUser/viewUsersList?>'>
        <i class='users icon'></i> Users
    </a>
</div> <!-- sidebar menu -->
 

<div class='ui grid'>
    <div class='row'></div>
    <div class='row'></div>
    <div class='row'>
        <div class='two wide column'></div>
        <div class='thirteen wide column'>
            <div class='ui stackable grid'>
                <div class='four wide column'>
                    <div class='ui card'>
                        <div class='content'>
                            <div class='header'><?php echo $this->session->userdata['userSession']['user_first_name'].' '.$this->session->userdata['userSession']['user_mi'].'. '.$this->session->userdata['userSession']['user_last_name'];?></div>
                        </div>
                        <div class='extra content' id='userContent' style='background-color:burlywood;'>
                            <strong><i class='user icon'></i>SUPERADMIN</strong>
                        </div>
                    </div> <!-- user info card -->

                    <div class='ui category search'>
                        <div class='ui fluid icon input'>
                            <input class='prompt' type='text' placeholder='Search . . .'>
                            <i class='search icon'></i>
                        </div>
                        <div class='results'></div>
                    </div> <!-- search -->
                </div> <!-- four wide column -->






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
    <div class="ui cancel negative button">Cancel</div>
    <button class="ui approve positive button" type="submit">Update</button>
    </form>
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
