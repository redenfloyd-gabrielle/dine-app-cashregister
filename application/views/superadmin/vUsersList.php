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
                    <div class='ui grid'>
                        <div class='row'></div>
                        <div class='middle aligned eight wide column'>
                            <p>Page 1 out of 1 pages.</p>
                        </div>
                        <div class='right aligned eight wide column'>
                            <div class='ui pagination menu'>
                                <a class='active item'>1</a>
                                <a class='item'>2</a>
                                <a class='item'>3</a>
                            </div> <!-- pagination -->
                        </div>
                    </div>
                </div> <!-- twelve wide column -->
            </div> <!-- grid -->
        </div> <!-- thirteen wide column -->
        <div class='column'></div>

    </div> <!-- row-->
</div> <!-- grid -->


</body>
</html>
