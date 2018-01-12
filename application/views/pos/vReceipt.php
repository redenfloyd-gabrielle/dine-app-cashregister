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
   <p class="mid receipthead"><strong>Mameng's Seafoods and BBQ Hauz</strong></p>
   <p class="mid receiptcontent">Barangay 24 Imadejas</p>
   <p class="mid receiptcontent">along J.C. Aquino Ave. Butuan City</p>
   <p class="mid receiptcontent">(085)-300-3307</p><br>
   <div class="receiptdivide"> </div>
   <span class="lft info">
      Cashier : <strong><?php echo $cashier ?></strong> 
   </span>
   <span class="rght info">
      Order No. : <strong><?php echo $order_id ?></strong>
   </span><br>
   <span class="lft info">
      Date : <strong><?php echo $date ?></strong> 
   </span>
   <span class="rght info">
      Time : <strong> <?php echo $time ?></strong>
   </span><br>
   <div class="receiptdivide"> </div>
   <table class="receipttbl">
     <tr>
       <th class="lft ltext receiptcontent">Qty</th>
       <th class="ltext receiptcontent">Item</th>
       <th class="rght ltext receiptcontent">Amount</th>
     </tr>
     <?php if( isset($receipt_item)){ ?>
      <?php foreach ($receipt_item as $item) { ?>
     <tr>
       <td class="lft receiptcontent"><?php echo $item->qty; ?></td>
       <td class="receiptcontent"><?php echo $item->name; ?></td>
       <td class="rght receiptcontent">P<?php echo $item->subtotal; ?>.00</td>
     </tr>
      <?php } ?>
    <?php } ?>
     
   </table>
   <div class="receiptdivide"> </div>
  <span class="lft receiptamt">Amount Due</span>
  <span class="rght receiptamt">P<?php echo $due ?>.00</span>
  <span class="lft receipttbl receiptcontent">Cash
    <span class="rght ">P<?php echo $cash ?></span>
  </span>
  <span class="lft receipttbl receiptcontent">Change
    <span class="rght ">P<?php echo $change ?></span>
  </span><br><br><br><br>
  <div class="receiptdivide"> </div>
  <div class="mid receiptamt">THANK YOU!</div>
  <div class="mid receiptamt">PLEASE COME AGAIN</div>
  
</body>
</html>
 
  
  
  


