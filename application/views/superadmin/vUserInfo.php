<div class="pusher">
    <div class='ui hidden divider'></div>
    <div class='ui padded segment'>
        <!-- header -->
        <div class='ui basic segment'>
            <h1 class="ui teal dividing header">
                <i class="dashboard icon"></i>
                <div class="content">
                  USERS
                  <div class="sub header">Shows the information of the user</div>
                </div>
            </h1> <!-- header -->
            <div class='ui breadcrumb'>
                <a class='section' href='<?php echo site_url()?>/CUser/viewSuperadminDashboard'>HOME</a>
                <i class='right arrow icon divider'></i>
                <a class='section' href='<?php echo site_url()?>/CUser/viewUsersList'>USERS</a>
                <i class='right arrow icon divider'></i>
                <div class='active section'>USER INFORMATION</div>
            </div> <!-- breadcrumb -->
        </div> <!-- segment -->
        <!-- content -->
        <div class='ui segments'>
            <div class='ui basic segment'>
                <h5 class='ui header teal ribbon label'><i class='info icon'></i>
                    User Information
                </h5> 
                <div class='ui stackable padded grid'>
                    <?php if (isset($user)) {?>
                    <?php foreach ($user as $u) { ?>
                    <div class='two column row'>
                        <div class='column'></div>
                        <div class='right aligned column'>
                            <a href='<?php echo site_url()?>/CUser/editUserInfo/<?php echo $u->user_id; ?> ''><div class='ui basic labeled blue icon button' title='Edit user information'><i class='pencil icon'></i>Edit info</div></a>

                            <button class='ui basic labeled red icon button' title='Remove user' id='deleteUser' data-id="<?php echo $u->user_id; ?>" ><i class='remove icon'></i>Remove user</button>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='sixteen wide column'>
                            <table class='ui large very basic table'>
                                <tbody>
                                    <tr> 
                                        <td>NAME</td>
                                        <td><?php echo $u->user_first_name.' '.$u->user_mi.'. '.$u->user_last_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td>USER ID</td>
                                        <td><?php echo $u->user_id; ?> </td>
                                    </tr>
                                    <tr>
                                        <td>POSITION</td>
                                        <td><?php echo $u->user_position; ?> </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php } ?>
                        <?php } ?>
                        </div> <!-- sixteen wide column -->
                    </div> <!-- row -->

                </div> <!-- ui grid -->
            </div> <!-- segment -->
        </div> <!-- segments -->
    </div> <!-- segment -->
</div> <!-- bottom attached segment -->




<div class="ui basic modal" id="confirmDelete">
  <div class="ui icon header">
    <i class="remove user icon"></i>
    Remove User
  </div>
  <div class="content">
<form class='ui form' method='POST' action='<?php echo site_url()?>/CUser/deleteUser?>'>
    <center><p style='font-size: 1.5em;'>Are you sure you want to remove this user?</p></center>
    <input type="hidden" name='user_id' id="user_id" value="">
  </div>
  <div class="actions">
    <div class="ui gray basic cancel inverted button">
      <i class="remove icon"></i>
      No
    </div>
    <button class="ui teal basic submit inverted button" type="submit">
      <i class="checkmark icon"></i>
      Yes
    </button>
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