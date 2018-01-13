
  <div class="ui unstackable grid">
    <div class="row">
      <div class="column"></div>
      <div class="twelve wide column">
        <h1 class="ui header headerName">
          <i class="circular cart icon"></i>
          <div class="content">
            Orders
            <div class="sub header subHeaderName">List of Orders</div>
          </div>
        </h1>
      </div>
      <div class="three wide column">
    <!--   <button class="ibtn" id="ibtn"><i class="huge blue edit icon"></i></button> -->
        <a href="<?php echo site_url()?>/COrderItem/viewEdit/manual/<?php echo $this->session->userdata['receiptSession']['receipt_id'].'/1';?>"><i class="huge blue edit icon"></i></a>
      </div>
    </div>
    <div class="row">
      <div class="column"></div>
      <div class="fourteen wide column">
          <table class="ui single line table itemLabels" id="myTable">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php if(isset($receipt_item)) { ?>
                 <?php foreach ($receipt_item as $item){ ?>
              <tr class="trow" id="trow">
                <td class="name"><?php echo $item->product_name ?></td>
                <td><?php echo $item->product_price ?></td>
                <td ><?php echo $item->receipt_item_quantity?></td>
                <td class="subtotal"><?php echo $item->receipt_item_subtotal?></td>
                <input type="hidden" id="prod_id" value="<?php echo $item->product_id ?>">

              </tr>
              <?php } ?>
               <?php } ?>
            </tbody>
          </table>
           <input type="hidden" value="<?php echo $this->session->userdata['receiptSession']['receipt_id']?>" name="eid" id="eid">
      </div>
    </div>
    <div class="row">
      <div class="four wide right aligned column">
      </div>
      <div class="nine wide column">
        <div class="ui form">
        <div class="field">
          <label for="amount">Cash Amount</label>
          <input type="number" placeholder="Enter Cash Amount" id="amount">
        </div>
      </div>
      </div>
      <div class="column"></div>
    </div>
    
    <div class="row">

      <div class="six wide column"> 
      </div>
      <div class="three wide column">
        <strong class="itemLabels">AMOUNT DUE</strong>
      </div>
      <div class="six wide right aligned column">
        P<span id="due">0</span>.00
      </div>
      <div class="column"></div>
    </div>

    <div class="row">
      <div class="six wide column"></div>
      <div class="three wide column">
        <span class="itemLabels">Cash</span>
      </div>
      <div class="six wide right aligned column">
        P<span id="cash">0.00</span>
      </div>
      <div class="column"></div>
    </div>

    <div class="row">
      <div class="six wide column"></div>
      <div class="three wide column">
        <span class="red itemLabels" >Change</span>
      </div>
      <div class="six wide right aligned column">
        <span id="peso">P</span><span id="change">0.00</span>
      </div>
      <div class="column"></div>
    </div>

  </div>

  <div class="ui grid">
    <div class="row"></div>
    <div class="row"></div>
    <div class="row">
      <div class="column"></div>
      <div class="three wide column">
        <a href="<?php echo site_url();?>/CLogin/viewPos" class="ui right floated blue button" align="center" ><h4 class="lbtnlabel">Back</h4></a>
      </div>
      <div class="five wide column"></div>
      <div class="three wide column">
       <button class="ui floated blue button" id="rbtn" align="center"><h4 class="rbtnlabel">Charge/No Receipt</h4></button>
      </div>
      <div class="three wide column">
         <button class="ui right floated blue button" id="print" align="center"><h4 class="rbtnlabel">Charge & Print</h4></button>
      </div>
      
      <div class="column"></div>
    </div>
    <div class="row"></div>
    
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

       tableData.shift();
       return tableData;
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
            $("#change").css("color","red");
            $('#peso').css("color","red");

           }else if(change == 0 && cash != 0){
            $("#print").removeClass("disabled");
            $("#rbtn").removeClass("disabled");
           }else{
            if(tableData.length != 0){
              $("#change").css("color","black");
              $('#peso').css("color","black");
              $("#print").removeClass("disabled");
              $("#rbtn").removeClass("disabled");
            }

          }
        });
  
     

    //    $('#rbtn').on('click',function(){

    //   var total = $("#due").text();
    //   var cash = $("#cash").text();
    //   var change = $("#change").text();
    
    //   var dataSet =  "total="+total+"&cash="+cash+"&change="+change;

    //   $.ajax({
    //     type: "POST",
    //     url: "<?php //echo site_url()?>/CReceipt/addManualOrderToReceipt",
    //     data: dataSet,
    //     cache: false,
    //     success: function(result){
    //        // alert(result);
    //        $('body').html(result);
    //     },
    //     error: function(jqXHR, errorThrown){
    //         console.log(errorThrown);
    //     }

    //   });

    // })

    
    

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


