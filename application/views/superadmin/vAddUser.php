<div class="pusher">
    <div class='ui hidden divider'></div>
    <div class='ui padded segment'>
        <!-- header -->
        <div class='ui basic segment'>
            <h1 class="ui teal dividing header">
                <i class="dashboard icon"></i>
                <div class="content">
                  USERS
                  <div class="sub header">Add a new user</div>
                </div>
            </h1> <!-- header -->
            <div class='ui breadcrumb'>
                <a class='section' href='<?php echo site_url()?>/CUser/viewSuperadminDashboard'>HOME</a>
                <i class='right arrow icon divider'></i>
                <a class='section' id='confirmCancelBR'>USERS</a>
                <i class='right arrow icon divider'></i>
                <div class='active section'>ADD USER</div> 
            </div> <!-- breadcrumb -->
        </div> <!-- segment -->

        <!-- content -->
        <div class='ui segments'>
            <div class='ui basic segment'>
                <h5 class='ui header teal ribbon label'><i class='info icon'></i>
                    User Information
                </h5> 
                <div class='ui stackable padded grid'>
                    <div class='row'>  
                        <div class='eight wide column'>
                            <form class='ui form' method="POST" action="<?php echo site_url()?>/CUser/addUser">
                            <h3 class='ui horizontal divider header'>
                                <i class='address card outline icon'></i> User Personal Information
                            </h3>

                            <div class='required field'><label>FIRST NAME</label><input type='text' placeholder='Enter first name' name="fname"></div>

                            <div class='field'><label>MIDDLE NAME</label><input type='text' placeholder='Enter middle name' name="mname"></div>

                            <div class='required field'><label>LAST NAME</label><input type='text' placeholder='Enter last name' name="lname"></div>
                        </div>
                        <div class='eight wide column'>
                            <h3 class='ui horizontal divider header'><i class='user icon'></i>User Account Information</h3>

                            <label>POSITION</label><br>
                            <input type="hidden" name="position" id="position" value="">
                            <select class="ui dropdown" name="pos" id="pos">
                              <option value="">Choose position</option>
                              <option value="Manager">Manager</option>
                              <option value="Supervisor">Supervisor</option>
                              <option value="Cashier">Cashier</option>
                              <option value="Owner">Owner</option>
                            </select> <!-- position dropdown -->
                        </div>
                    </div> <!-- row -->
                    <div class='row'>
                            <a id='confirmCancel'><div class='ui submit gray button'>Cancel</div></a>
                            <button class='ui submit teal button' type='submit'>Add</button>
                        </form> <!-- form -->
                    </div>

                    <div class='row'></div> <!-- row -->

                </div> <!-- ui grid -->
            </div> <!-- segment -->
        </div> <!-- segments -->
    </div> <!-- segment -->
</div> <!-- pusher -->


</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('change','#pos',function() {
            $('#position').val($('#pos').val());
        });
    });
</script>       
