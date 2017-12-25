

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
                        <div class='sub header'>Displays the user's information</div>
                    </div>
                </h1> <!-- header -->
                <div class='ui breadcrumb'>
                    <a class='section' href='<?php echo site_url()?>/CUser/viewUsersList?>'>USERS</a>
                    <i class='right arrow icon divider'></i>
                    <div class='active section'>VIEW USER INFORMATION</div>
                </div> <!-- breadcrumb -->

                <div class='ui hidden divider'></div>
                <?php if (isset($user)) {?>
                    <?php foreach ($user as $u) { ?>
                <a href='<?php echo site_url()?>/CUser/editUserInfo/<?php echo $u->user_id; ?> ''><button class='ui big circular blue icon button' title='Edit user information'><i class='pencil icon'></i></button></a>

                <button class='ui big circular red icon button' title='Delete this user' id='deleteUser' data-id="<?php echo $u->user_id; ?>" ><i class='remove icon'></i></button>

                <div class='ui hidden divider'></div>

                <h3 class='ui horizontal divider header'>
                    <i class='user icon'></i> User Information
                </h3>
               
                    <table class='ui very basic table'>
                        <tbody>
                            <tr> 
                                <td class='background-color: '>NAME</td>
                                <td><?php echo $u->user_first_name.' '.$u->user_mi.'. '.$u->user_last_name; ?></td>
                            </tr>
                            <tr>
                                <td>USER ID</td>
                                <td><?php echo $u->user_id; ?> </td>
                            </tr>
                            <tr>
                                <td>POSITION</td>
                                <td><?php echo $u->user_type; ?> </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php } ?>
                <?php } ?>
            </div> <!-- twelve wide column -->
        </div> <!-- grid -->
    </div> <!-- pusher -->
</div> <!-- segment -->
</div> <!-- grid -->

<div class="ui mini modal" id="confirmDelete">
    
        <div class="header">Delete account</div>
        <div class="content">
            <form action="<?php echo site_url()?>/CUser/deleteUser" method="POST" >
                <input type="hidden" name="user_id" id="user_id">
            <p>Are you sure you want to delete this account?</p>
        </div>
        <div class="actions">
            <div class="ui cancel negative button">Cancel</div>
            <button class="ui approve positive button" type="submit">Yes</div>
            </form>
        </div>
    
</div>

</body>
</html>

<script>
$(document).ready(function(){
    $('#deleteUser').click(function(){
        var id = $(this).data("id");
        $('#user_id').val(id);
        $('#confirmDelete').modal('show');
    });
});
</script>