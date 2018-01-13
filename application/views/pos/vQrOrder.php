<?php if ($this->session->userdata('userSession') && $this->session->userdata['userSession']['user_type'] != 'SUPERADMIN') { ?>
<!DOCTYPE html>
<html>
<head>
  <title>Dine-POS</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/posAssets.css')?>">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/semantic/dist/semantic.min.css')?>" />
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.min.js')?>"></script>
    <script src='<?php echo base_url("assets/semantic/semantic.min.js")?>'></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/instascan.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.json-2.4.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/moment.min.js')?>"></script>
</head>
<body>
  <div class="ui top attached borderless menu" id="topMenu">
    <h3 class="ui header item " id="topItem">DINE</h3>
    <div class="right menu">
      <h3 class="ui header item " id="rightTopItem"><?php echo $this->session->userdata['userSession']['user_first_name'].' '.$this->session->userdata['userSession']['user_last_name'];?> &nbsp &nbsp | &nbsp &nbsp <span id="date"></span>&nbsp &nbsp | &nbsp &nbsp <span class ="time" ></span>&nbsp &nbsp</h3>
      <div class="hidden item"></div>
      <a class="item" href="<?php echo site_url()?>/CLogin/userLogout?>"><i class="very large white sign out icon"></i></a>
    </div>
  </div>
  <script>

    function updateClock()
    {
      var date = new Date();
      var hours = date.getHours();
      var minutes = date.getMinutes();
      var seconds = date.getSeconds();
      var ampm = hours >= 12 ? 'PM' : 'AM';
      hours = hours % 12;
      hours = hours ? hours : 12; // the hour '0' should be '12'
      minutes = minutes < 10 ? '0'+minutes : minutes;
      seconds = seconds < 10 ? '0'+seconds : seconds;
      var strTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
      $(".time").html(strTime);
    }

    $(document).ready(function()
    {
       setInterval('updateClock()', 1000);
       var date = moment().format("MM/DD/YYYY");
     // var time = moment().format("h:mm A");
     $('#date').append(date);
    });

  </script>

<?php } else if ($this->session->userdata['userSession']['user_type'] == 'SUPERADMIN') {
   redirect('CLogin/viewSuperadminDashboard');
} else {
    redirect('CInitialize');
}
?>
  <div class="ui stackable two column grid">
    <div class="row"></div>
    <div class="row">
      <div class="column">
        <div class="ui stackable grid">
          <div class="row">
            <div class="column"></div>
            <div class="fourteen wide column">
              <div class="ui breadcrumb">
                <a class="section" href="<?php echo site_url()?>/CLogin/viewPos?>">Home</a>
                <i class="right chevron icon divider"></i>
                <div class="active section">QR SCANNER</div>
              </div> 
              <div class="column"></div>
              <div class="mid">
                <img src='<?php echo base_url("assets/images/disable.jpg")?>' class="disabled ui vid image">
              </div>
            </div>
            <div class="column"></div>    
          </div>
        </div>
      </div>
  <div class="column">
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
        <!-- <button class="ibtn" id="ibtn"><i class="huge blue edit icon"></i></button> -->
         <a href="<?php echo site_url()?>/COrderItem/viewEdit/qr/<?php echo $id.'/'.$qr; ?>"><i class="huge blue edit icon"></i></a>
      </div>
    </div>
    <div class="row">
      <div class="column"></div>
      <div class="fourteen wide column">
        <?php if (isset($id)){ ?>
        <input type="hidden" id="eid" value="<?php echo $id; ?>" name='eid'>
        <?php } ?>
        <form>
          <table class="ui single line table" id="myTable">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
            <?php if(isset($order_info)) { ?>
                 <?php foreach ($order_info as $order){ ?>
                <tr id="myTR">
                    <td ><?php echo $order->product_name; ?></td>
                    <td><?php echo $order->product_price; ?></td>
                    <td><?php echo $order->order_item_qty; ?></td>
                    <td class="subtotal"><?php echo $order->order_item_subtotal; ?></td>
                    <input type="hidden" id="prod_id" value="<?php echo $order->product_id ?>">
                </tr>
                <?php } ?>
            <?php } ?>
            </tbody>
          </table>
        </form>
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

  <div class="ui grid ">
    <div class="row"></div>
    <div class="row"></div>
    <div class="row">
      <div class="column"></div>
      <div class="three wide column">
        <a href="<?php echo site_url();?>/CLogin/viewPos" class="ui floated right blue button" align="center" ><h4 class="lbtnlabel">Back</h4></a>
      </div>
      <div class="five wide column"></div>
      <div class="three wide column">
        <button class="ui floated blue button" id="rbtn" align="center"><h4 class="rbtnlabel">Charge/No Receipt</h4></button>
      </div>
      <div class="three wide column">
         <button class="ui floated right blue button" id="print" align="center"><h4 class="rbtnlabel">Charge & Print</h4></button>
      </div>
      
      <div class="column"></div>
    </div>
    <div class="row"></div>

    </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
      function storeTblValues(){

        var tableData = new Array();
        $("#myTable tr").each(function(row,tr){
            tableData[row] = {
              "name" : $(tr).find('td:eq(0)').text()
            , "qty" :$(tr).find('td:eq(2)').text()
            , "subtotal" :$(tr).find('td:eq(3)').text()
            , "prod_id" : $(tr).find('#prod_id').val()
            }
        });

       tableData.shift();
       return tableData;
      }

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

     var sum = 0;
      $(".subtotal").each(function() {
          var value = $(this).text();
          if(!isNaN(value) && value.length != 0) {
              sum += parseFloat(value);
          }
          $("#due").html(sum); 
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
          url: "<?php echo site_url()?>/CReceipt/addQROrderToReceipt",
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

      })

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



