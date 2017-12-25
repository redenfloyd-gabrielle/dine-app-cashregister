
<!-- please include vAdminFooter para muload ang dropdown -->
 
<div class='ui visible left vertical inverted sidebar labeled icon menu'>
    <div class='borderless item'>
        <strong>DINE</strong> 
    </div>
    <a class='item' href='<?php echo site_url()?>/CUser/viewSuperadminDashboard?>'>
        <i class='dashboard icon'></i> Dashboard
    </a>
    <a class='active item' href='<?php echo site_url()?>/CUser/viewUsersList?>'>
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
                            <div class='description'>
                               <?php echo $this->session->userdata['userSession']['user_type']; ?>
                            </div>
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
                <div class='column'></div>
                <div class='eleven wide column'>
                    <h1 class='ui header'>
                    <div class='content'>
                        USERS
                        <div class='sub header'>Shows the list of the registered users</div>
                    </div>
                </h1> <!-- header -->
                <div class='ui breadcrumb'></div> <!-- breadcrumb -->
                
                <div class='ui hidden divider'></div>

                <a href='<?php echo site_url()?>/CUser/vAddUser?>'><button class='ui big circular green icon button' title='Add new user'><i class='plus icon'></i></button></a>

                <div class='ui hidden divider'></div>
                <?php if (isset($users)) {?>
                    <div class='ui stackable three cards'>
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
                    </div> <!-- stackable cards -->
                <?php } ?>                
                <div class='ui hidden divider'></div>

                <div class='center aligned middle aligned row'>
                    <div class='ui pagination menu'>
                        <a class='active item'>1</a>
                        <a class='item'>2</a>
                        <a class='item'>3</a>
                    </div> <!-- pagination -->
                </div> <!-- row -->


                </div> <!-- twelve wide column -->
            </div> <!-- grid -->
        </div> <!-- thirteen wide column -->
        <div class='column'></div>
    </div> <!-- row-->
</div> <!-- grid -->


</body>
</html>
