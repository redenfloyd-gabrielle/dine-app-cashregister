<div class="pusher">
    <div class='ui hidden segment'></div>
    <div class='ui padded segment'>
        <!-- header -->
        <div class='ui basic segment'>
            <h1 class="ui teal dividing header">
                <i class="dashboard icon"></i>
                <div class="content">
                  USERS
                  <div class="sub header">Shows the list of users</div>
                </div>
            </h1> <!-- header -->
            <div class='ui breadcrumb'>
                <a class='section' href='<?php echo site_url()?>/CUser/viewSuperadminDashboard'>HOME</a>
                <i class='right arrow icon divider'></i>
                <div class='active section'>USERS</div>
            </div> <!-- breadcrumb -->
        </div> <!-- segment -->

        <!-- content -->
        <div class='ui segments'>
            <div class='ui basic segment'>
                <h5 class='ui header teal ribbon label'><i class='users icon'></i>
                    Users List
                </h5> 
                <div class='ui stackable padded grid'>
                    <div class='row'>
                        <div class='right aligned column'>
                            <a href='<?php echo site_url()?>/CUser/vAddUser?>'><button class='ui basic green labeled icon button' title='Add new user'><i class='plus icon'></i>Add user</div></a> <!-- Add new user -->
                        </div>
                    </div> <!-- row -->
                    <div class='row'>
                        <div class='sixteen wide column'>
                            <div class='ui centered stackable four cards'>
                                <?php if(isset($users)){?>
                                <?php foreach ($users as $u) {?>
                                    <a class='ui card' href='<?php echo site_url()?>/CUser/viewUserInfo/<?php echo $u->user_id; ?> '>
                                        <div class='image'></div>
                                        <div class='content' id='superadmin-card'>
                                            <div class='header' id='userHeader'>
                                                <?php echo $u->user_first_name; ?>
                                            </div>
                                            <div class='description' id='userDesc'>
                                                <?php echo $u->user_type; ?>
                                            </div> 
                                        </div>
                                    </a>
                                <?php } ?>
                                <?php } ?>
                            </div> <!-- stackable cards -->
                        </div> <!-- sixteen wide column -->
                    </div> <!-- row -->

                </div> <!-- ui grid -->
            </div> <!-- segment -->
        </div> <!-- segments -->
    </div> <!-- segment -->
</div> <!-- pusher -->


</body>
</html>