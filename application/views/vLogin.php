<!DOCTYPE html>
<html>
<head>
  <title>POS</title>
  <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/semantic/dist/semantic.min.css')?>" />
</head>
<body>
  <div class="login">
    <div class="ui middle aligned center aligned grid">
      <div class="column col">
        <div class="row">
          <img src= "<?php echo base_url('assets/images/logo.png')?>" class="smlogo">
          <span class="pos">POS</span>
        </div>   
        <form class="ui small form" method="POST" action="<?php echo site_url()?>/CLogin/login?>">
          <div class="ui segment loginbox">
            <div class="required field">
              <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="number" name="userID" id = "user" placeholder="Username" required="" >
              </div>
            </div>
            <div class="required field">
              <div class="ui left icon input">
                <i class="lock icon"></i>
                <input type="password" name="password" id = "pass" placeholder="Password" required="">
              </div>
            </div>
            <input type="submit" class="ui fluid large blue submit button" name="login" value="Login">
              <!-- Login -->
            <!-- </button> -->
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>