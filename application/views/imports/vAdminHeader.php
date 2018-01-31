<?php if ($this->session->userdata('userSession') && $this->session->userdata['userSession']['user_type'] == 'ADMIN') { ?>
<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DINE | Admin Module</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel='stylesheet' href='<?php echo base_url("assets/css/adminAssets.css")?>'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/posAssets.css')?>">
    <link rel='stylesheet' href='<?php echo base_url("assets/semantic/semantic.min.css")?>'>
    <script src='<?php echo base_url("assets/jquery/jquery.min.js")?>'></script>
    <script src='<?php echo base_url("assets/semantic/semantic.min.js")?>'></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/tablesort.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/instascan.min.js')?>"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src='<?php echo base_url("assets/jquery/sha.js")?>'></script>
    <script src='<?php echo base_url("assets/jquery/datatables.min.js")?>'></script>
    <script src='<?php echo base_url("assets/jquery/dataTables.semanticui.js")?>'></script>

    <link rel='stylesheet' href='<?php echo base_url("assets/css/jquery.dataTables.min.css")?>'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/buttons.semanticui.min.css')?>">
    <script src='<?php echo base_url("assets/jquery/dataTables.buttons.min.js")?>'></script>
    <script src='<?php echo base_url("assets/jquery/jszip.min.js")?>'></script>
    <script src='<?php echo base_url("assets/jquery/pdfmake.min.js")?>'></script>
    <script src='<?php echo base_url("assets/jquery/vfs_fonts.js")?>'></script>
    <script src='<?php echo base_url("assets/jquery/buttons.html5.min.js")?>'></script>
    <script src='<?php echo base_url("assets/jquery/buttons.semanticui.min.js")?>'></script>
    <script src='<?php echo base_url("assets/jquery/buttons.print.min.js")?>'></script>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.semanticui.min.css"> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.semanticui.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script> -->
</head>
<body class="pushable" >  

<!-- sidebar -->
<div class='ui sidebar vertical inverted menu left labeled icon thin'>
    <div style='background: #A5673F;'>
        <img style='padding-top: 5px; margin-bottom: 5px;' class='ui tiny centered image' src='<?php echo base_url("assets/images/admin.png")?>'>
        <p style='background-color: white; margin:0;'>ADMIN</p>
        <span style='color:white; font-size: 1em'>Hello, 
            <strong style='font-style: italic;'>
                <?php echo $this->session->userdata['userSession']['user_first_name'];?> 
            </strong>
        </span><br> 
        <span style='color:white; text-transform: uppercase;'>
            <?php echo $this->session->userdata['userSession']['user_position'];?> 
        </span><br>
        <span style='color:white;'>
            ID: <?php echo $this->session->userdata['userSession']['user_id'];?> 
        </span>
        <input hidden='' type='text' name='pass' id='pass' value='<?php echo strtolower($this->session->userdata['userSession']['user_password']);?>'>
    </div> 
    <a class='item' href='<?php echo site_url()?>admin/dashboard'>
        <i class='dashboard icon'></i> Dashboard
    </a>
    <a class='item' href='<?php echo site_url()?>admin/categories'>
        <i class='food icon'></i> Products
    </a>
    <a class='item' href='<?php echo site_url()?>admin/orders'>
        <i class='shop icon'></i> Orders
    </a>
    <a class='item' href='<?php echo site_url()?>admin/reports'>
        <i class='bar chart icon'></i> Reports
    </a>
</div>
<!-- end of sidebar -->

<!-- top menu -->
<div class='ui fixed inverted menu'>
    <a class="borderless item toggleMenu">
        <i class="sidebar icon"></i>
    </a>

    <a class='borderless item' href='<?php echo site_url()?>admin/dashboard'>DINE</a>

    <div class='right menu'>
        <a class="item" href="<?php echo site_url()?>cashregister"><i class="calculator icon"></i>SWITCH TO CASHREGISTER</a> 
        <div class='ui simple dropdown item' tabindex='0'>
        <i class='user icon'></i>PROFILE
        <i class='dropdown icon' tabindex='0'>
            <div class='menu' tabindex='-1'></div>
        </i>
        <div class='menu' tabindex='-1'>
            <a class='item' id='changePass'><i class='lock icon'></i>CHANGE PASSWORD</a>
            <a class='item' href='<?php echo site_url()?>signout' ><i class='power icon'></i>LOGOUT</a>
        </div>
    </div>
    </div>
</div>
<!-- end of top menu -->


    

    
    

    




<!-- CHANGE PASSWORD MODAL -->

<div class="ui mini modal" id="confirmUpdate" aria-hidden="true">
  <div class="header">Update user credentials</div>
  <div class="content">
    <form class="ui form updatePassForm" action="<?php echo site_url();?>changepassword" method="POST">

        <div class="required field">
            <label>Old Password</label>
            <input type="password" name="old" id="old" placeholder="Enter old password">
            <input hidden='' type='password' name='pass' id='oldpass' value='<?php echo strtolower($this->session->userdata['changePassword']['user_password']);?>'>
        </div>
        <div class="required field">
            <label>New Password</label>
            <input type="password" name="new" id="new" placeholder="Enter new password">
        </div>
        <div class="required field">
            <label>Confirm New Password</label>
            <input type="password" name="confirm" id="confirm" placeholder="Confirm new password">
        </div>
        <!-- <div class="ui error message"></div> -->
  </div>
  <div class="actions" >
    <div class="ui cancel button gray">Cancel</div>
    <button class="ui submit ok brown button" type="submit">Update</button>
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
    <a href="<?php echo site_url()?>admin/categories"><button class="ui basic brown ok inverted button" type="submit">
      <i class="checkmark icon"></i>
      Yes
    </button></a>
  </div>
</div>

<!-- leave page modal -->
<div class="ui basic modal" id="cancelModalHome">
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
    <a href='<?php echo site_url()?>admin/dashboard'><button class="ui basic brown ok inverted button" type="submit">
      <i class="checkmark icon"></i>
      Yes
    </button></a>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){

    $('.ui.modal').modal({
            onApprove : function() {
              //Submits the semantic ui form
              //And pass the handling responsibilities to the form handlers,
              // e.g. on form validation success
              $('.ui.form').submit();
              //Return false as to not close modal dialog
              return false;
            }
        });

    var formValidationRules =
    {   //fields: { 
            old_password: {
                identifier: 'old',
                rules:[
                    {
                        type: 'empty',
                        prompt: 'This field must not be empty.'
                    },
                    {
                        type: 'match[oldpass]',
                        prompt: 'Password does not match with old password.' 
                    }
                ]
            },
            new_password: {
                identifier: 'new',
                rules:[
                    {
                        type: 'empty',
                        prompt: 'This field must not be empty.'
                    },
                    {
                        type: 'different[oldpass]',
                        prompt: 'New password must be different from old password.'
                    }
                ]
            },
            confirm_password: {
                identifier: 'confirm',
                rules:[
                    {
                        type: 'empty',
                        prompt: 'This field must not be empty.'
                    },
                    {
                        type: 'match[new]',
                        prompt: 'Password does not match with new password.'
                    }
                ]
            }
        // }
    }
   
    $('.updatePassForm').form({
        on: 'submit',
        inline: true,
        fields: formValidationRules,
        onSuccess : function() 
        {
          //Hides modal on validation success
          $('.modal').modal('hide');
          // $('#valid').modal('show');
        }
    });


    $('.productInformation').form({
        on: 'submit',
        inline: true,
        fields:{
            name: {
                identifier: 'name',
                rules:[
                    {
                        type: 'empty',
                        prompt: 'This field must not be empty.'
                    },
                    {
                        type: 'regExp[^[a-zA-Z. -]+$]',
                        prompt: 'Product name must only contain letters.'
                    }
                ]
            },
            description: {
                identifier: 'description',
                rules:[
                    {
                        type: 'empty',
                        prompt: 'This field must not be empty.'
                    }
                ]
            },
            price: {
                identifier: 'price',
                rules:[
                    {
                        type: 'empty',
                        prompt: 'This field must not be empty.'
                    },
                    {
                        type: 'number',
                        prompt: 'This field must only contain numbers.'
                    }
                ]
            },
            category: {
                identifier: 'category',
                rules:[
                    {
                        type: 'empty',
                        prompt: 'This field must not be empty.'
                    }
                ]
            }
        }
    });


});
    
</script>


<?php 
} else if ($this->session->userdata['userSession']['user_type'] == 'REGULAR') {
    redirect('cashregister');
} else if ($this->session->userdata['userSession']['user_type'] == 'SUPERADMIN') {
    redirect('superadmin/dashboard');
} else {
    redirect('login');
}
?>
