<!DOCTYPE html>
<html> 
<head>
    <title>Dine-Admin Module</title>
    <link rel='stylesheet' href='<?php echo base_url("assets/css/adminAssets.css")?>'>
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
            <a class='item' id='changePass'><i class='lock icon'></i>Change Password</a>
            <a href='' class='item'><i class='sign out icon'></i>Logout</a>
        </div>
    </div>
</div>


<div class="ui mini modal" id="confirmUpdate">
  <div class="header">Update user credentials</div>
  <div class="content">
    <form class="ui form">
        <div class="required field">
            <label>Old Password</label>
            <input type="password" name="" placeholder="Enter old password">
        </div>
        <div class="required field">
            <label>New Password</label>
            <input type="password" name="" placeholder="Enter new password">
        </div>
        <div class="required field">
            <label>Confirm New Password</label>
            <input type="password" name="" placeholder="Confirm new password">
        </div>
    </form>
    <p></p>
  </div>
  <div class="actions">
    <div class="ui cancel negative button">Cancel</div>
    <a><div class="ui approve positive button">Update</div></a>
  </div>
</div>