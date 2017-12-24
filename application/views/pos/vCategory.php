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
      <?php if(isset($category)) { ?>
            <?php foreach ($category as $cat){ ?>
        <div class="ui card">
          <a class="image" href="<?php echo site_url();?>/CProduct/viewProduct/<?php echo $cat?>">
            <img class="ui centered fluid image" src="<?php echo base_url('assets/images/breakfast.png ')?>">
          </a>
          <div class="content">
            <a class="header" href="<?php echo site_url();?>/CProduct/viewProduct/<?php echo $cat?>"><?php echo $cat; ?></a>
            <div class="meta">
              <a>Category</a>
            </div>
          </div>
        </div>
         <?php } ?>
      <?php } ?>
      </div>
    </div>
    <div class="column"></div>
  </div>
</div>

