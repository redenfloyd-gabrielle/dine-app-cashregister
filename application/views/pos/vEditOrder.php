<?php if ($this->session->userdata('userSession') && $this->session->userdata['userSession']['user_type'] != 'SUPERADMIN') { ?>
<!DOCTYPE html>
<html>
<head>
  <title>Dine-POS</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/posAssets.css')?>">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/semantic/dist/semantic.min.css')?>" />
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.min.js')?>"></script>
    <script src='<?php echo base_url("assets/semantic/semantic.min.js")?>'></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/instascan.min.js')?>"></script>
    
</head>
<body>
  <div class="ui top attached borderless menu" id="topMenu">
    <h3 class="ui header item " id="topItem">DINE</h3>
    <div class="right menu">
      <h3 class="ui header item " id="rightTopItem"><?php echo $this->session->userdata['userSession']['user_first_name'].' '.$this->session->userdata['userSession']['user_last_name'];?> &nbsp &nbsp | &nbsp &nbsp <span id="curdate"></span>&nbsp &nbsp | &nbsp &nbsp <span id ="curtime" ></span>&nbsp &nbsp</h3>
      <div class="hidden item"></div>
      <a class="item" href="<?php echo site_url()?>/CLogin/userLogout?>"><i class="very large white sign out icon"></i></a>
    </div>
  </div>

  <script>
    var dt = new Date();
    document.getElementById("curdate").innerHTML = dt.toLocaleDateString();
    document.getElementById("curtime").innerHTML = dt.toLocaleTimeString();
  </script>

<?php } else if ($this->session->userdata['userSession']['user_type'] == 'SUPERADMIN') {
   redirect('CLogin/viewSuperadminDashboard');
} else {
    redirect('CInitialize');
}
?>

<div class="ui two column grid">
  <div class="row"></div>
  <div class="row">
    <div class="column">
      <div class="ui stackable grid">
        <div class="row">
          <div class="column"></div>
          <div class="seven wide column">
            <h1 class="huge header">CATEGORIES</h1>
          </div>
        </div>
      <div class="row">
        <div class="column"></div>
        <div class="fourteen wide column"> 
          <input type="hidden" name="ordered_id" id="ordered_id" value="<?php echo $eid; ?>">
          <div class="ui three cards">
            <div class="ui card">
              <a class="image" href="<?php echo site_url()."/CProduct/viewProductEdit/".$page."/MEALS/".$eid; ?>">
                <img class="ui centered fluid image" src="<?php echo base_url('assets/images/meals.svg')?>">
              </a>
              <div class="content">
                <a class="header" href="<?php echo site_url()."/CProduct/viewProductEdit/".$page."/MEALS/".$eid; ?>">MEALS</a>
                <div class="meta">
                  <a>Category</a>
                </div>
              </div>
            </div>

            <div class="ui card">
              <a class="image" href="<?php echo site_url()."/CProduct/viewProductEdit/".$page."/DRINKS/".$eid; ?>">
                <img class="ui centered fluid image" src="<?php echo base_url('assets/images/drinks.svg')?>">
              </a>
              <div class="content">
                <a class="header" href="<?php echo site_url()."/CProduct/viewProductEdit/".$page."/DRINKS/".$eid; ?>">DRINKS</a>
                <div class="meta">
                  <a>Category</a>
                </div>
              </div>
            </div>

            <div class="ui card">
              <a class="image" href="<?php echo site_url()."/CProduct/viewProductEdit/".$page."/DESSERTS/".$eid; ?>">
                <img class="ui centered fluid image" src="<?php echo base_url('assets/images/desserts.svg')?>">
              </a>
              <div class="content">
                <a class="header" href="<?php echo site_url()."/CProduct/viewProductEdit/".$page."/DESSERTS/".$eid; ?>">DESSERTS</a>
                <div class="meta">
                  <a>Category</a>
                </div>
              </div>
            </div>

            <div class="ui card">
              <a class="image" href="<?php echo site_url()."/CProduct/viewProductEdit/".$page."/EXTRAS/".$eid; ?>">
                <img class="ui centered fluid image" src="<?php echo base_url('assets/images/extras.svg')?>">
              </a>
              <div class="content">
                <a class="header" href="<?php echo site_url()."/CProduct/viewProductEdit/".$page."/EXTRAS/".$eid; ?>">EXTRAS</a>
                <div class="meta">
                  <a>Category</a>
                </div>
              </div>
            </div>
          </div>
        <div class="column"></div>
      </div>
    </div>
  </div>
</div>
  <div class="column" id="vEditOrder">
   <?php $this->view('pos/vEditComponent') ?>
</div>
</body>
</html>
<script>
//  $(document).ready(function(){
   
//     var ordered_id = $('#ordered_id').val();
   
//     var dataSet = "ordered_id="+ordered_id;
//     $.ajax({
//         type: "POST",
//         url: '<?php //echo site_url()?>/COrderItem/displayOrderListFromQR',
//         data: dataSet,
//         cache: false,
//         success: function(result){
//             if(result){
//                $('#vEditOrder').html(result);
//             }else{
//                 alert("Error");
//             }                         
//         },
//         error: function(jqXHR, errorThrown){
//             console.log(errorThrown);
//         }
//     });
// });
    
</script>

