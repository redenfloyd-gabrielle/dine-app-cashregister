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
                    <div class='row'>
                        <div class='right aligned column'>
                            <a href='<?php echo site_url()?>/CUser/vAddUser'><button class='ui basic green labeled icon button addBut' data-tooltip='Add new user'><i class='plus icon'></i>Add user</div></a> <!-- Add new user -->
                        </div>
                    </div> <!-- row -->
                    <?php if (isset($users)) { ?>
                    <div class='row'>
                        <table class='ui sortable stackable celled table' id="user">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Account Type</th> 
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <div class='row'></div> <!-- row -->

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
<form class='ui form' method='POST' action='<?php echo site_url()?>/CUser/deleteUser'>
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


<div class="ui basic modal" id="confirmReset">
  <div class="ui icon header">
    <i class="refresh lock icon"></i>
    Remove User
  </div>
  <div class="content">
<form class='ui form' method='POST' action='<?php echo site_url()?>/CUser/resetPassword'>
    <center><p style='font-size: 1.5em;'>Are you sure you want to reset the password of this user?</p></center>
    <input type="hidden" name='ruser_id' id="ruser_id" value="">
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

<div class="ui basic modal" id="activateUser">
  <div class="ui icon header">
    <i class="add user icon"></i>
    Activate User
  </div>
  <div class="content">
<form class='ui form' method='POST' action='<?php echo site_url()?>/CUser/activateUser'>
    <center><p style='font-size: 1.5em;'>Are you sure you want to activate this user?</p></center>
    <input type="hidden" name='auser_id' id="auser_id" value="">
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
    $(document).on('click','.deleteUser',function() {
        var id = $(this).data("id");
        $('#user_id').val(id);
        $('#confirmDelete').modal('show');
    });

    $(document).on('click','.resetPassword',function() {
        var id = $(this).data("id");
        $('#ruser_id').val(id);
        $('#confirmReset').modal('show');
    });

    $(document).on('click','.activateUser',function() {
        var id = $(this).data("id");
        $('#auser_id').val(id);
        $('#activateUser').modal('show');
    });
});


$(document).ready(function() {
   
    $('#user').DataTable({
        "ajax" : {
            url: "<?php echo site_url();?>/CUser/getUsers",
            type : 'GET',
        },
    });
} );
</script>