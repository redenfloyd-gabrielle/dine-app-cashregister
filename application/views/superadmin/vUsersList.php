<div class="pusher">
    <div class='ui hidden divider'></div>
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
                    <?php if (isset($users)) { ?>
                    <div class='two column row'>
                        <div class='column'>
                            <label>
                                Show 
                                <select class='ui compact dropdown'>
                                    <option value='10'>10</option>
                                    <option value='20'>20</option>
                                    <option value='30'>30</option>
                                </select>
                                entries
                            </label>
                        </div>
                        <div class='right aligned column'>
                            <a href='<?php echo site_url()?>/CUser/vAddUser?>'><button class='ui basic green labeled icon button' title='Add new user'><i class='plus icon'></i>Add user</div></a> <!-- Add new user -->
                        </div>
                    </div>
                    <div class='row'>
                        <table class='ui sortable stackable celled table'>
                            <thead>
                                <tr>
                                    <th class='sortable sorted ascending'>User ID</th>
                                    <th class='sortable'>Name</th>
                                    <th class='sortable'>Position</th>
                                    <th class='sortable'>Account Type</th>
                                    <th class='sortable'>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $u) {?>
                                <tr class='item'>
                                    <td><?php echo $u->user_id; ?></td>
                                    <td><?php echo $u->user_first_name.' '.$u->user_mi.'. '.$u->user_last_name; ?></td>
                                    <td><?php echo $u->user_position; ?></td>
                                    <td><?php echo $u->user_type; ?></td>
                                    <td><?php echo $u->user_status?></td>
                                    <td>
                                        <a class="ui inverted blue icon button" href='<?php echo site_url()?>/CUser/editUserInfo/<?php echo $u->user_id; ?> ''>
                                            <i class="pencil icon"></i> Edit
                                        </a>
                                        <a class="ui inverted orange icon button">
                                            <i class="refresh icon"></i> Reset password
                                        </a>
                                        <a class="ui inverted red icon button deleteUser" data-id="<?php echo $u->user_id; ?>">
                                            <i class="trash icon"></i> Remove
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class='row'></div> <!-- row -->


                    <!-- pagination -->
                    <div class='two column row'>
                        <div class='middle aligned column'>
                            Showing 1 to 5 of 5 entries.
                        </div>
                        <div class='right aligned column'>
                            <div class='ui pagination menu'>
                                <a class='previous item'>Previous</a>
                                <a class='active item'>1</a>
                                <a class='next item' >Next</a>
                            </div> <!-- pagination -->
                        </div>
                    </div> <!-- two column row -->


                    <!-- end of pagination -->

                    <?php }else{
                        echo "<div class='row'></div>
                              <p style='font-size: 1.2em;'><i class='warning circle icon'></i>There are no registered users. <i class='frown icon'></i></p>
                              <div class='row'></div>
                            ";
                    }?>

                </div> <!-- ui grid -->
            </div> <!-- segment -->
        </div> <!-- segments -->
    </div> <!-- segment -->
</div> <!-- pusher -->

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
    $('.deleteUser').click(function(){
        var id = $(this).data("id");
        $('#user_id').val(id);
        $('#confirmDelete').modal('show');
    });
});
</script>