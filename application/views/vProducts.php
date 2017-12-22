<div class="ui two column grid">
  <div class="left floated left aligned seven wide column">
   <div class="menubox" ><br>
    <h1 class="huge header">CATEGORY NAME</h1>
    <div class="ui breadcrumb">
      <a class="section">Home</a>
      <i class="right chevron icon divider"></i>
      <div class="active section">Category Name</div>
    </div>
    <div class="ui hidden divider"></div> <br>
    <div class="ui four cards">
      <div class="ui grey card">
        <div class="content">
          <div class="header">Product Name</div>
          <img class="ui image menuimg" src= "<?php echo base_url('assets/images/rice.png')?>">
        </div>
        <div class="extra content">
          <span class="left floated price ">
            P450.00
          </span>
          <button class="right floated cart btn">
              <i class="cart icon"></i>
            Order
          </button>
        </div>
      </div>
      <div class="ui grey card">
        <div class="content">
          <div class="header">Product Name</div>
          <img class="ui image menuimg" src= "<?php echo base_url('assets/images/rice.png')?>">
        </div>
        <div class="extra content">
          <span class="left floated price">
            P450.00
          </span>
          <button class="right floated cart btn">
              <i class="cart icon"></i>
            Order
          </button>
        </div>
      </div>
      <div class="ui grey card">
        <div class="content">
          <div class="header">Product Name</div>
          <img class="ui image menuimg" src= "<?php echo base_url('assets/images/rice.png')?>">
        </div>
        <div class="extra content">
          <span class="left floated price">
            P450.00
          </span>
          <button class="right floated cart btn">
              <i class="cart icon"></i>
            Order
          </button>
        </div>
      </div>
    </div>
  </div>
  <?php $this->view('vOrder'); ?>
</div>
<div class="vdivide"></div>



