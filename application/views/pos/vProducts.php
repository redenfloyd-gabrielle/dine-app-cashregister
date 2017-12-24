<div class="ui two column grid">
  <div class="row"></div>
  <div class="row">
    <div class="column">
      <div class="ui stackable grid">
        <div class="row">
          <div class="column"></div>
          <div class="seven wide column">
            <h1 class="huge header">CATEGORY NAME</h1>
          </div>
        </div>
        <div class="row">
          <div class="column"></div>
          <div class="fourteen wide column"> 
            <div class="ui breadcrumb">
              <a class="section" href="<?php echo site_url()?>/COrdered/viewMDashboard?>">Home</a>
              <i class="right chevron icon divider"></i>
              <div class="active section">Category Name</div>
            </div>  
            <div class="ui three cards">
            <?php if(isset($products)) { ?>
              <?php foreach ($products as $prod){ ?>
              <div class="ui grey card">
                <img class="ui centered fluid image" src= "<?php echo base_url('assets/images/rice.png')?>">
                <div class="content">
                  <div class="header"><?php echo $prod->product_name; ?></div>
                </div>
                <div class="extra content">
                  <span class="left floated price ">
                  <?php echo $prod->product_price; ?>
                  </span>
                  <button class="right floated cart pbtn">
                      <i class="cart icon"></i>
                    Order
                  </button>
                </div>
              </div>
              <?php } ?>
            <?php } ?>
            

              
              
            </div>
          </div>
          <div class="column"></div>
        </div>
      </div>
    </div>
    <div class="column">
      <?php $this->view('pos/vOrder'); ?>
    </div>
  </div>
</div>
<!-- <div class="vdivide"></div> -->
</body>
</html>