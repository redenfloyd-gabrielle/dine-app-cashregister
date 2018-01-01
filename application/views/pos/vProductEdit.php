<div class="ui two column grid">
 <div class="row"></div>
  <div class="row">
    <div class="column">
      <div class="ui stackable grid">
        <div class="row">
          <div class="column"></div>
          <div class="seven wide column">
            <h1 class="huge header"><?php echo $prod_cat?></h1>
          </div>
        </div>
        <div class="row">
          <div class="column"></div>
          <div class="fourteen wide column"> 
            <div class="ui breadcrumb">
             
                <a class="section" href="<?php echo site_url().'/COrderItem/viewEdit/'.$page.'/'.$eid; ?>">Home</a>
        
              <i class="right chevron icon divider"></i>
              <div class="active section">Category Name</div>
            </div>  
            <input type="hidden" name="ordered_id" id="ordered_id" value="<?php echo $eid; ?>">
            
            <div class="ui three cards">
            <?php if(isset($products)) { ?>
              <?php foreach ($products as $prod){ ?>
              
              <div class="ui grey card">
                <form method="POST" action="<?php echo site_url().'/COrderItem/addOrderItem/'.$page.'/'.$prod->product_id.'/'.$eid;?>">
                  <div class="ui grey card">
                <img class="ui centered fluid image" src= "<?php echo base_url($prod->product_image)?>">
                <div class="content">
                  <div class="header"><?php echo $prod->product_name; ?></div>
                </div>
                <div class="extra content">
                  <span class="left floated price">
                  P<span id="price"><?php echo $prod->product_price; ?>.00</span>
                  </span>
                  <button class="right floated cart pbtn" id="pbtn" type="submit">
                    
                   <!--  <input type="hidden" value="<?php echo $prod->product_id ?> " id="pid" name="pid" class="pid"> -->
                      <i class="cart icon"></i>
                    Order

                  </button>
                 
                </div>
              </div>
              </form>
              </div>
              <?php } ?>
            <?php }else{  echo "<i class='circle warning icon error'></i><span> No items to display.</span>" ;}?> 
            </div>
          </div>
          <div class="column"></div>
        </div>
      </div>
    </div>
    <div id="vEditOrder" class="column">
      <?php $this->view('pos/vEditComponent'); ?>
    </div>
  </div>
</div>
<!-- <div class="vdivide"></div> -->
</body>
</html>
<script>
$(document).ready(function(){
   
    // var ordered_id = $('#ordered_id').val();
   
    // var dataSet = "ordered_id="+ordered_id;
    // $.ajax({
    //     type: "POST",
    //     url: '<?php //echo site_url()?>/COrderItem/viewEdit',
    //     data: dataSet,
    //     cache: false,
    //     success: function(result){
    //         if(result){
    //            $('#vEditOrder').html(result);
    //         }else{
    //             alert("Error");
    //         }                         
    //     },
    //     error: function(jqXHR, errorThrown){
    //         console.log(errorThrown);
    //     }
     });

  // $('.pbtn').on('click', function() {
  //   var pid = $(this).find(".pid").val();
  //   var oid = $("#ordered_id").val();
  //   var dataSet = "pid="+pid+"&oid="+oid;

  //   $.ajax({
  //     type: "POST",
  //     url: '<?php //echo site_url()?>/COrderItem/addRowItem',
  //     data: dataSet,
  //     cache: false,
  //     success: function(result){
  //         var trHTML = '';
  //         var value =result.split('|');
  //         if(value[0] != pid){
  //        trHTML += 
  //           '<tr><td>' + value[0] + 
  //           '</td><td>' +  value[1] + 
  //           '</td><td class="qty"><input type="number" name="qty" value="' +  value[2] + 
  //           '"><i class="mini add circle icon ibtn"><span class="sign">+</span></i><i class="mini minus circle icon ibtn"><span class="sign">-</span></i></td></td><td>P<span class="subtotal" id="subtotal"></span>' +  value[3]+ 
  //           '</td><td><i class="red remove icon"></i></td></tr>';     
  //           $('#mytable').append(trHTML);  
  //         }else{
  //            trHTML += 
  //           '<tr><td>' + value[1] + 
  //           '</td><td>' +  value[2] + 
  //           '</td><td class="qty"><input type="number" name="qty" value="' +  value[3] + 
  //           '"><i class="mini add circle icon ibtn"><span class="sign">+</span></i><i class="mini minus circle icon ibtn"><span class="sign">-</span></i></td></td><td>P<span class="subtotal" id="subtotal"></span>' +  value[4]+ 
  //           '</td><td><i class="red remove icon"></i></td></tr>';     
  //           $(this).closest("tr").find('#myTR').html(trHTML);  
  //         }           
  //          console.log(result);
  //     },
  //     error: function(jqXHR, errorThrown){
  //         console.log(errorThrown);

  //     }
  // });
//});


//});

// function addRow()
// {
  

//     $('#myTR').append('<tr><td><?php //echo $prod->product_name ?></td> <td>xxx</td><td>peee</td><td>P<span class="subtotal">yyyy</span></td>eee<td><i class="red remove icon"></i></td> <input type="hidden" id="order_item" name ="order_item" value="0"></tr');
   
// }



 

</script>
