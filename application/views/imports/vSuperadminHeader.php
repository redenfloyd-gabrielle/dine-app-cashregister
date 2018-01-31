<?php if ($this->session->userdata('userSession') && $this->session->userdata['userSession']['user_type'] == 'SUPERADMIN') { ?>
 <!DOCTYPE html>
<html>
<head>
    <title>DINE | Admin Module</title>
    <link rel='stylesheet' href='<?php echo base_url("assets/css/superadminAssets.css")?>'>
    <link rel='stylesheet' href='<?php echo base_url("assets/semantic/semantic.min.css")?>'>
    <script src='<?php echo base_url("assets/jquery/jquery.min.js")?>'></script>
    <script src='<?php echo base_url("assets/semantic/semantic.min.js")?>'></script>
    <script src='<?php echo base_url("assets/jquery/sha.js")?>'></script>
    <script src="<?php echo base_url('assets/jquery/tablesort.js')?>"></script>
    <script src='<?php echo base_url("assets/jquery/sha.js")?>'></script>
    <script src='<?php echo base_url("assets/jquery/datatables.min.js")?>'></script>
    <script src='<?php echo base_url("assets/jquery/dataTables.semanticui.js")?>'></script>
</head>
<body class='pushable'>

<!-- sidebar -->
<div class='ui sidebar vertical inverted menu left labeled icon thin'>
    <div style='background: teal;'>
        <img style='padding-top: 5px; margin-bottom: 5px;' class='ui tiny centered image' src='<?php echo base_url("assets/images/superadmin.png")?>'>
        <p style='background-color: white; margin:0;'>SUPERADMIN</p>
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
    <a class='item' href='<?php echo site_url()?>superadmin/dashboard'>
        <i class='dashboard icon'></i> Dashboard
    </a>
    <a class='item' href='<?php echo site_url()?>superadmin/users'>
        <i class='users icon'></i> Users
    </a>
    <a class="item" href='<?php echo site_url()?>superadmin/products'>
        <i class="food icon"></i> Products
    </a>
</div>
<!-- end of sidebar -->




<!-- top menu -->
<div class='ui fixed inverted menu'>
    <a class=" item toggleMenu">
        <i class="sidebar icon"></i>
    </a> 
    <a class=' item' href='<?php echo site_url()?>superadmin/dashboard'>DINE</a>
    <div class='right menu'>
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
    <form class="ui form updatePassword" action="<?php echo site_url();?>changepassword" method="POST">
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
    
    <p></p> 
  </div>
  <div class="actions" >
    <div class="ui cancel gray button">Cancel</div>
    <button class="ui submit teal button" type="submit">Update</button>
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
    <a href="<?php echo site_url()?>superadmin/users"><button class="ui basic blue ok inverted button" type="submit">
      <i class="checkmark icon"></i>
      Yes
    </button></a>
  </div>
</div> 

<!-- leave page modal -->
<div class="ui basic modal" id="cancelModalHome">
    <i class="close icon"></i>
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
    <a  href='<?php echo site_url()?>superadmin/dashboard'><button class="ui basic blue ok inverted button" type="submit">
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
   
    $('.updatePassword').form({
        on: 'submit',
        inline: true,
        fields: formValidationRules,
        onSuccess : function() 
        {
          //Hides modal on validation success
          // alert("Valid Submission, modal will close.");
          $('.modal').modal('hide');
        }

    });

    $('.userInformation').form({
        on: 'submit',
        inline: true,
        fields:{
            first_name: {
                identifier: 'fname',
                rules:[
                    {
                        type: 'empty',
                        prompt: 'This field must not be empty.'
                    },
                    {
                        type: 'regExp[^[a-zA-Z. -]+$]',
                        prompt: 'First name must only contain letters.'
                    }
                ]
            },
            last_name: {
                identifier: 'lname',
                rules:[
                    {
                        type: 'empty',
                        prompt: 'This field must not be empty.'
                    },
                    {
                        type: 'regExp[^[a-zA-Z. -]+$]',
                        prompt: 'Last name must only contain letters.'
                    }
                ]
            },
            user_position: {
                identifier: 'pos',
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
} else if ($this->session->userdata['userSession']['user_type'] == 'ADMIN') {
    redirect('admin/dashboard');
} else {
    redirect('login');
}
?>
