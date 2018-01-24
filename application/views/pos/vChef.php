
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
<div class="receiptbox" id="receiptbox">
   <br>
   <p class="receipthead" align="center"><strong>Mameng's Seafoods and </strong></p>
   <p class="receipthead" align="center"><strong>BBQ Hauz</strong></p>
   <p class="receiptcontent" align="center">Barangay 24 Imadejas</p>
   <p class="receiptcontent" align="center">along J.C. Aquino Ave. Butuan City</p>
   <p class="receiptcontent" align="center">(085)-300-3307</p>
   <h2 class="receipttype"><strong>KITCHEN'S COPY</strong></h2>
   <div class="receiptdivide"> </div>
   <span class="lft msg" style="font-size: 14px;">
      Date : <strong style="font-size: 14px;"><?php echo $date ?></strong> 
   </span>
   <span class="rght msg" style="font-size: 14px;">
      Time : <strong style="font-size: 14px;"> <?php echo $time ?></strong>
   </span><br>
   <div class="receiptdivide"> </div>
   <table class="receipttbl">
     <tr>
       <th class="rqty" align="left">Qty</th>
       <th class="lft rqty">Item</th>
     </tr>
     <?php if( isset($receipt_item)){ ?>
      <?php foreach ($receipt_item as $item) { ?>
     <tr class="trline">
       <td class="lft rqty"><?php echo $item->qty; ?></td>
       <td class="rqty"><?php echo $item->name; ?></td>
     </tr>
      <?php } ?>
    <?php } ?>
   </table>
  <div class="receiptdivide"> </div>
  <br><br>
  <div class="tagline">Serving safe food </div>
  <div class="tagline">is not an option <div>
  <div class="tagline">it’s an obligation.</div>
  <br>
</div>
<h3>`</h3>
</body>
</html>




 
  
  
  


