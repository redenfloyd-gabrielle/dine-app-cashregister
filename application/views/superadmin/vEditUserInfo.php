                <div class='column'></div>
                <div class='eleven wide column'>
                    <h1 class='ui header'>
                        <div class='content'>
                            USERS
                            <div class='sub header'>Edit the user's information</div>
                        </div>
                    </h1> <!-- header -->

                    <div class='ui breadcrumb'>
                        <a class='section' href='<?php echo site_url()?>/CUser/viewUsersList?>'>USERS</a>
                        <i class='right arrow icon divider'></i>
                        <div class='active section'>EDIT INFORMATION</div>
                    </div> <!-- breadcrumb -->

                    <div class='ui hidden divider'></div>
                    <div class='ui hidden divider'></div>
                    <div class='ui hidden divider'></div>
                    <?php if (isset($user)) {?>
                        <?php foreach ($user as $u) { ?>

                    <div class='content'>
                        <form class='ui form' method="POST" action="<?php echo site_url()?>/CUser/updateUser/<?php echo $u->user_id; ?> ">
                            <h3 class='ui horizontal divider header'>
                                <i class='address card outline icon'></i> User Personal Information
                            </h3>

                            
                            <div class='ui hidden divider'></div>

                             <div class='nine wide required field'><label>FIRST NAME</label><input type='text' placeholder='Enter first name' name="fname" value="<?php echo $u->user_first_name;?>"></div>

                            <div class='nine wide  required field'><label>MIDDLE NAME</label><input type='text' placeholder='Enter middle name' name="mname" value="<?php echo $u->user_mi;?>"></div>

                            <div class='nine wide  required field'><label>LAST NAME</label><input type='text' placeholder='Enter last name' name="lname" value="<?php echo $u->user_last_name;?>"></div>

                            <h3 class='ui horizontal divider header'><i class='user icon'></i>User Account Information</h3>

                            <div class='ui hidden divider'></div>

                            <label>POSITION</label><br>
                            <select class="ui dropdown">
                              <option value="">Choose category</option>
                              <option value="1">Superadmin</option>
                              <option value="2">Admin</option>
                              <option value="3">Employee</option>
                            </select> <!-- position dropdown -->

                            <div class='ui hidden divider'></div>
                            <div class='ui hidden divider'></div>

                            <a href="<?php echo site_url()?>/CUser/viewUsersList?>"><div class='ui submit negative button'>Cancel</div></a>

                            <button class='ui submit positive button' type="submit">Edit</button>

                            <div class='ui hidden divider'></div>
                                <?php } ?>
                            <?php } ?>
                        </form> <!-- form -->
                    </div> <!-- content -->
                </div> <!-- twelve wide column -->
            </div> <!-- grid -->
        </div> <!-- thirteen wide column -->
        <div class='column'></div>
    </div> <!-- row-->
</div> <!-- grid -->


</body>
</html>
