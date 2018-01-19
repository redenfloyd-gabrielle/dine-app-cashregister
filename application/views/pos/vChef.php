
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/posAssets.css')?>">
  <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/semantic/dist/semantic.min.css')?>" />
  <script src="main.js"></script>
</head>
<body>
<div class="new-page">
   <table class="receipttbl">
     <tr>
       <th class="lft ltext receiptcontent">Qty</th>
       <th class="ltext receiptcontent">Item</th>
     </tr>
     <?php if( isset($receipt_item)){ ?>
      <?php foreach ($receipt_item as $item) { ?>
     <tr class="trline">
       <td class="lft receiptcontent"><?php echo $item->qty; ?></td>
       <td class="receiptcontent"><?php echo $item->name; ?></td>
     </tr>
      <?php } ?>
    <?php } ?>
     
   </table>
</div>
   
</body>
</html>




 
  
  
  


