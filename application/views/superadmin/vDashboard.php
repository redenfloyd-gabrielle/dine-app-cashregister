<div class="pusher">
    <div class='ui hidden divider'></div>
    <div class='ui padded segment'>
        <!-- header -->
        <div class='ui basic segment'>
            <h1 class="ui teal dividing header">
                <i class="dashboard icon"></i>
                <div class="content">
                  DASHBOARD
                  <div class="sub header">Shows the dashboard</div>
                </div>
            </h1> <!-- header -->
            <div class='ui breadcrumb'>
                <a class='section' href='<?php echo site_url()?>/CUser/viewSuperadminDashboard'>HOME</a>
                <i class='right arrow icon divider'></i>
                <div class='active section'>DASHBOARD</div>
            </div> <!-- breadcrumb -->
        </div> <!-- segment -->
        <!-- end of header -->
        <!-- content -->
        <div class='ui segment'> 
            <div class='ui stackable padded grid'>
                <div class='row'>
                    <div class='two wide column'></div>
                    <div class='sixteen wide tablet sixteen wide mobile four wide computer column'>
                        <div class='ui left aligned segment'>
                            <div class='ui two column grid'>
                                <div class='center aligned middle aligned column'>
                                    <div class='ui grey statistic'>
                                        <div class='value'> 
                                            <?php 
                                                if (isset($users)) {
                                                    foreach ($users as $u) {}
                                                        echo $u->users;
                                                } else {
                                                    echo "0";
                                                }
                                            ?>     
                                        </div>
                                        <div class='label'>Users</div>
                                    </div>
                                </div> 
                                <div class='right aligned middle aligned column'>
                                    <i class='teal huge users icon'></i>
                                </div>
                            </div>
                        </div>
                    </div> <!-- column -->
                    <div class='sixteen wide tablet sixteen wide mobile four wide computer column'>
                        <div class='ui left aligned segment'>
                            <div class='ui two column grid'>
                                <div class='center aligned middle aligned column'>
                                    <div class='ui grey statistic'>
                                        <div class='value'> 
                                            <?php 
                                                if (isset($active)) {
                                                    foreach ($active as $a) {}
                                                        echo $a->active;
                                                } else {
                                                    echo "0";
                                                }
                                            ?>    
                                        </div>
                                        <div class='label'>ACTIVE USERS</div>
                                    </div>
                                </div> 
                                <div class='right aligned middle aligned column'>
                                    <i class='huge green user icon'></i>
                                </div>
                            </div>
                        </div>
                    </div> <!-- column -->
                    <div class='sixteen wide tablet sixteen wide mobile four wide computer column'>
                        <div class='ui left aligned segment'>
                            <div class='ui two column grid'>
                                <div class='center aligned middle aligned column'>
                                    <div class='ui grey statistic'>
                                        <div class='value'> 
                                            <?php 
                                                if (isset($inactive)) {
                                                    foreach ($inactive as $i) {}
                                                        echo $i->inactive;
                                                } else {
                                                    echo "0";
                                                }
                                            ?>  
                                        </div>
                                        <div class='label'>INACTIVE USERS</div>
                                    </div>
                                </div> 
                                <div class='right aligned middle aligned column'>
                                    <i class='huge red user icon'></i>
                                </div>
                            </div>
                        </div>
                    </div> <!-- column -->
                    <div class='two wide column'></div>
                </div> <!-- row -->
            </div> <!-- ui grid -->
        </div> <!-- segment -->
    </div> <!-- segment -->
</div> <!-- pusher -->


</body>
</html>