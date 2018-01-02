  <div class="pusher">
    <div class='ui basic segment'>
        <h1 class="ui blue dividing header">
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
    <h3 class="ui horizontal header divider">
        Users List
    </h3>
    <div class='ui segment'> 
        <div class='ui stackable padded grid'>
            <div class='row'>
                <a href='<?php echo site_url()?>/CUser/vAddUser?>'><button class='ui circular green icon button' title='Add new user'><i class='plus icon'></i>Add user</button></a> <!-- Add new user -->
            </div> <!-- row -->
            <div class='row'>
                <div class='sixteen wide column'>
                    <?php if (isset($users)) {?>
                        <div class='ui stackable four cards'>
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
                </div> <!-- sixteen wide column -->
            </div> <!-- row -->

            <div class='row'></div> <!-- row -->

            <div class='two column row'>
                <div class='middle aligned column'>
                    Pages 1 out of 1 pages.
                </div>
                <div class='right aligned column'>
                    <div class='ui pagination menu'>
                        <a class='active item'>1</a>
                    </div> <!-- pagination -->
                </div>
            </div> <!-- two column row -->

        </div> <!-- ui grid -->
    </div> <!-- segment -->
  </div> <!-- pusher -->
</div> <!-- bottom attached segment -->


</body>
</html>