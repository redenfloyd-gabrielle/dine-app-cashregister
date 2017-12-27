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
        <div class="ui three cards">
       <!--  <?php if(isset($category) && isset($image)) { ?>
              <?php foreach ($category as $cat){ ?>
               
          <div class="ui card">
            <a class="image" href="<?php echo site_url();?>/CProduct/viewProduct/<?php echo $cat?>">
              <img class="ui centered fluid image" src="<?php echo base_url('assets/images/rice.png')?>">
            </a>
            <div class="content">
              <a class="header" href="<?php echo site_url();?>/CProduct/viewProduct/<?php echo $cat?>"><?php echo $cat; ?></a>
              <div class="meta">
                <a>Category</a>
              </div>
            </div>
          </div>
          <?php } ?>
          <?php } ?> -->

          <div class="ui card">
            <a class="image" href="<?php echo site_url();?>/CProduct/viewProduct/MEALS">
              <img class="ui centered fluid image" src="<?php echo base_url('assets/images/meals.jpg')?>">
            </a>
            <div class="content">
              <a class="header" href="<?php echo site_url();?>/CProduct/viewProduct/MEALS">MEALS</a>
              <div class="meta">
                <a>Category</a>
              </div>
            </div>
          </div>


          <div class="ui card">
            <a class="image" href="<?php echo site_url();?>/CProduct/viewProduct/DRINKS">
              <img class="ui centered fluid image" src="<?php echo base_url('assets/images/beverage.jpg')?>">
            </a>
            <div class="content">
              <a class="header" href="<?php echo site_url();?>/CProduct/viewProduct/DRINKS">DRINKS</a>
              <div class="meta">
                <a>Category</a>
              </div>
            </div>
          </div>

          <div class="ui card">
            <a class="image" href="<?php echo site_url();?>/CProduct/viewProduct/DESSERTS">
              <img class="ui centered fluid image" src="<?php echo base_url('assets/images/dessert.jpg')?>">
            </a>
            <div class="content">
              <a class="header" href="<?php echo site_url();?>/CProduct/viewProduct/DESSERTS">DESSERTS</a>
              <div class="meta">
                <a>Category</a>
              </div>
            </div>
          </div>

          <div class="ui card">
            <a class="image" href="<?php echo site_url();?>/CProduct/viewProduct/EXTRAS">
              <img class="ui centered fluid image" src="<?php echo base_url('assets/images/soup.jpg')?>">
            </a>
            <div class="content">
              <a class="header" href="<?php echo site_url();?>/CProduct/viewProduct/EXTRAS">EXTRAS</a>
              <div class="meta">
                <a>Category</a>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="column"></div>
    </div>
  </div>
</div>

