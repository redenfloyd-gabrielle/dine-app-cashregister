<?php if ($this->session->userdata('userSession') == FALSE) { ?>
<!DOCTYPE html>
<html>
<head>
    <title>DINE | LOGIN</title>
    <link rel='stylesheet' href='<?php echo base_url("assets/css/loginAssets.css")?>'>
    <link rel='stylesheet' href='<?php echo base_url("assets/semantic/semantic.min.css")?>'>
    <script src='<?php echo base_url("assets/jquery/jquery.min.js")?>'></script>
     <script src='<?php echo base_url("assets/semantic/semantic.min.js")?>'></script>
</head>
<body>

<div class='page-bg'></div>
<div class='ui middle aligned center aligned stackable relaxed grid'>
    <div class='eight wide column'>
        <img class='ui fluid medium center aligned middle aligned image' src='<?php echo base_url("assets/images/logo.png")?>'>
    </div>
    <div class='column'></div>
    <div class='eight wide column'>

        <form class='ui tiny form' method='POST' action='<?php echo site_url()?>signin'>
            <div class='ui basic secondary segment'>
                <h3 class='ui middle aligned header'>
                    <div class='content'>
                        Welcome!
                    </div> 
                </h3>
                <?php 
                    if($this->session->flashdata('response')){
                ?>
                <div class="ui negative message">
                    <i class="close icon"></i>
                    <div class="header">
                        <?php 
                            if($this->session->flashdata('response')){
                                echo $this->session->flashdata('response');
                            }
                        ?>
                    </div>
                    <p> <?php 
                        if($this->session->flashdata('error')){
                          echo $this->session->flashdata('error');
                        }
                      ?>    
                    </p>
                </div>
                <?php  } ?>
                <?php 
                    if($this->session->flashdata('msg')){
                ?>
                <div class="ui positive message">
                    <i class="close icon"></i>
                    <div class="header">
                        <?php 
                            if($this->session->flashdata('msg')){
                                echo $this->session->flashdata('msg');
                            }
                        ?>
                    </div>
                    <p> <?php 
                        if($this->session->flashdata('msg2')){
                          echo $this->session->flashdata('msg2');
                        }
                      ?>    
                    </p>
                </div>
                <?php  } ?>
                <div class='required field'>
                    <div class='ui left icon input'>
                        <i class='user icon'></i>
                        <input type='number' name='user_id' placeholder='ID Number' id='userID'>
                    </div>
                </div>
                <div class='required field'>
                    <div class='ui left icon input'>
                        <i class='lock icon'></i>
                        <input type='password' name='password' placeholder='Password' id='password'>
                    </div>
                </div>
                <input type='submit' class='ui fluid teal medium submit button sbutton' value='LOGIN'>
                <div class='ui error message'></div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
    $('.message .close').on('click', function() {
        $(this).closest('.message').transition('fade');
    });
});
</script>

<?php 
} elseif ($this->session->userdata['userSession']['user_type'] == 'ADMIN') {
    redirect('admin/dashboard');
} else if ($this->session->userdata['userSession']['user_type'] == 'REGULAR') {
    redirect('cashregister');
} else if ($this->session->userdata['userSession']['user_type'] == 'SUPERADMIN') {
    redirect('admin/dashboard');
} else {
    redirect('login');
}
?>