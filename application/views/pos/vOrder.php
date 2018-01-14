
<?php if($page == 'qr'){
  $this->view('imports/vPosHeader');
  echo '
  <div class="row"></div>
  <div class="row">
    <div class="column"></div>
    <div class="six wide column">
      <h1 class="ui grey dividing header">
            <img class="ui big image" src="'.base_url().'/assets/images/qrcode.png">
            <div class="content">
              ORDER
              <div class="sub header">Retrieve order via QR Code</div>
            </div>  
        </h1>
        <a href="'.site_url().'/CLogin/viewPos">
          <h4 style="color: gray;"><i class="left arrow grey icon"></i>BACK TO HOME</h4>
        </a>
        <div class="ui hidden divider"></div>
        <img src="'.base_url().'assets/images/disable.jpg" class="disabled ui vid image">
    </div>
    <div class="two wide column"></div>'; } ?>

    <div class="six wide column">
      <div id="vOrder">
      <div class="ui grid">
        <div class="column"></div>
        <div class="nine wide center aligned middle aligned grey column" style="margin-left: -20px;">
          ORDER LIST
        </div>
        <div class="six wide column">
          <?php if($page == "manual"){
                echo '<a href="'.site_url().'/COrderItem/viewEdit/'.$page.'/'.$id.'/1" ><button class="fluid ui labeled icon button"><i class="pencil icon"></i>EDIT ORDER</button></a>';
          }else{
                echo '<a href="'.site_url().'/COrderItem/viewEdit/'.$page.'/'.$id.'/'.$qr.'" ><button class="fluid ui labeled icon button"><i class="pencil icon"></i>EDIT ORDER</button></a>';
          }
          ?>
        </div>
      </div>

      <table class="ui inverted teal basic table">
        <thead>
          <tr>
            <th class="seven wide">PRODUCT NAME</th>
            <th class="four wide">UNIT PRICE</th>
            <th class="two wide">QUANTITY</th>
            <th class="two wide">TOTAL</th>
          </tr>
        </thead>
      </table>
      <table class="ui very basic compact table" id="myTable">
        <tbody>
          <?php if(isset($order_info)) { ?>
            <?php foreach ($order_info as $item){ ?>
              <tr class="trow" id="trow">
                <td class="seven wide name" ><?php echo $item->product_name ?></td>
                <td class="four wide"><?php echo $item->product_price ?></td>
                <td class="two wide"><?php echo $item->item_quantity?></td>
                <td class="two wide subtotal"><?php echo $item->item_subtotal?></td>
                <input type="hidden" id="prod_id" value="<?php echo $item->product_id ?>">
              </tr>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>
      <input type="hidden" value="<?php echo $id ?>" name="eid" id="eid">
      <div class="ui divider"></div>

      <div class="ui grid">

        <!-- CASH AMOUNT -->
        <div class="eight wide middle aligned  column">
          CASH AMOUNT
        </div>
        <div class="eight wide column">
          <div class="ui form">
            <div class="field disabled" id="cashinput">
              <input type="text" placeholder="Enter Cash Amount" id="amount" value="0">
            </div>
          </div>
        </div>

        <!-- AMOUNT DUE -->
        <div class="eight wide middle aligned  column">
          AMOUNT DUE
        </div>
        <div class="eight wide middle aligned  compact column">
          <strong><p style="font-size: 1.3em;">P<span id="due">0</span>.00</p></strong>
        </div>


        <!-- CASH -->
        <div class="eight wide middle aligned  column">
         CASH
        </div>
        <div class="eight wide middle aligned compact column">
          <p style="font-size: 1.3em;">P<span id="cash">0.00</span></p>
        </div>


        <!-- CHANGE -->
        <div class="eight wide middle aligned column">
          CHANGE
        </div>
        <div class="eight wide middle aligned compact column">
          <strong><span id="peso" style="font-size: 1.3em; font-style: italic;">P</span><span id="change">0.00</span></strong>
        </div>

      </div>
      
    </div>
    <div class="column"></div>
  </div>
  <div class="row"></div>
  <div class="row"></div>
</div> <!-- closing grid -->
<div class="ui borderless bottom fixed menu">
  <div class="right menu">
    <div class="hidden item"></div>
    <a href="<?php echo site_url();?>/CLogin/viewPos" class="item"><div class="ui teal button">BACK</div></a>
    <div class="hidden item"></div>
    <div class="hidden item"></div>
    <a class="item"><button class="ui disabled teal button" id="rbtn">CHARGE/NO RECEIPT</button></a>
    <a class="item"><button class="ui disabled teal button" id="print">CHARGE & PRINT</button></a>
  </div>
</div>
</div> 

</body>
</html>
    
<script type="text/javascript">
   $(document).ready(function(){
    function storeTblValues(){
      var tableData = new Array();
      $("#myTable tr").each(function(row,tr){
          tableData[row] = {
            "name" : $(tr).find('td:eq(0)').text()
          ,  "qty" :$(tr).find('td:eq(2)').text()
          , "subtotal" :$(tr).find('td:eq(3)').text()
          , "prod_id" : $(tr).find('#prod_id').val()
          }
      });

     //tableData.shift();
     return tableData;
    }
     var tableData = storeTblValues();
      if(tableData.length != 0){
         $("#cashinput").removeClass("disabled");
      }else{
         $("#cashinput").addClass("disabled");
      }
      
      var sum = 0;
      $(".subtotal").each(function() {
          var value = $(this).text();
          if(!isNaN(value) && value.length != 0) {
              sum += parseFloat(value);
          }
          $("#due").html(sum); 
      });
      $('#amount').on('keyup', function() {
        var tableData = storeTblValues();
        var amt = $("#amount").val();
        var due = $("#due").text();
        var cash = amt+'.00';
        var change = parseFloat(cash)-parseFloat(due)+'.00';
        $("#cash").html(cash); 
        $("#change").html(change);

        
        if(change < 0){
          $("#print").addClass("disabled");
          $("#rbtn").addClass("disabled");
          $("#change").css("color","red");
          $('#peso').css("color","red");
         }else{
          $("#change").css("color","black");
          $('#peso').css("color","black");
          $("#print").removeClass("disabled");
          $("#rbtn").removeClass("disabled");
         }//else{
        //   if(tableData.length != 0){
        //     $("#change").css("color","black");
        //     $('#peso').css("color","black");
        //     $("#print").removeClass("disabled");
        //     $("#rbtn").removeClass("disabled");
        //   }
        // }
      });

    $('#rbtn').on('click',function(){

      var tableData;
      var total = $("#due").text();
      var cash = $("#cash").text();
      var change = $("#change").text();
      tableData = storeTblValues();

      tableData = $.toJSON(tableData);
      var dataSet =  "pTableData=" + tableData+"&total="+total+"&cash="+cash+"&change="+change;

      $.ajax({
        type: "POST",
        url: "<?php echo site_url()?>/CReceipt/addManualOrderToReceipt",
        data: dataSet,
        cache: false,
        success: function(result){
           // alert(result);
           $('body').html(result);
        },
        error: function(jqXHR, errorThrown){
            console.log(errorThrown);
        }

      });

    });
    $('#print').on('click',function(){

        var tableData;
        var total = $("#due").text();
        var cash = $("#cash").text();
        var change = $("#change").text();
        tableData = storeTblValues();

        tableData = $.toJSON(tableData);
        var data =  "pTableData=" + tableData+"&total="+total+"&cash="+cash+"&change="+change;

        $.ajax({
          type: "POST",
          url: "<?php echo site_url()?>/CReceipt/printReceipt",
          data: data,
          cache: false,
          success: function(result){
             // alert(result);
             $('body').html(result);
             window.print();
             document.location.href = "<?php echo site_url()?>/CLogin/viewPos"; 
          },
          error: function(jqXHR, errorThrown){
              console.log(errorThrown);

          }

        });

      });

   });
</script>


