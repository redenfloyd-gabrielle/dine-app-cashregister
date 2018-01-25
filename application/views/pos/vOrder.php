<?php
if($edit == 'yes' && $page =='qr'){
  echo '<head>
  <title>DINE | POS</title>
  <link rel="stylesheet" type="text/css" href="'.base_url().'assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="'.base_url().'assets/css/posAssets.css">
    <link type="text/css" rel="stylesheet" href="'.base_url().'assets/semantic/semantic.min.css"/>
    <script type="text/javascript" src="'.base_url().'assets/jquery/jquery.min.js"></script>
    <script src="'.base_url().'assets/semantic/semantic.min.js"></script>
    <script type="text/javascript" src="'.base_url().'assets/jquery/instascan.min.js"></script>
    <script type="text/javascript" src="'.base_url().'assets/jquery/jquery.json-2.4.min.js"></script>
</head>';
}?>

<?php if($page == 'qr'){
echo '
<div class="ui large top attached inverted teal menu borderless">
  <a class="item bpmono size18" href="'.site_url().'/CLogin/viewPos">DINE | POS</a>
  <div class="right menu bpmono size18">
    <div class="item">
      <span style="text-transform: uppercase;">'.$this->session->userdata["userSession"]["user_first_name"].' '.$this->session->userdata["userSession"]["user_last_name"].' &nbsp | &nbsp <span id="date"></span> &nbsp | &nbsp <span class ="time"></span>&nbsp &nbsp</span>
    </div>
    <div class="hidden item"></div>';
    if($this->session->userdata['userSession']['user_type'] == "ADMIN"){
      echo'
      <a class="item" href="'.site_url().'/CUser/viewAdminDashboard"><i class="user icon"></i>SWITCH TO ADMIN</a> 
          <div class="hidden item"></div>';
    }
    echo'
    <a class="item" href="'.site_url().'/CLogin/userLogout?>"><i class="white sign out icon"></i>LOGOUT</a>
  </div>
</div>
<div class="ui grid"> 
<script> 
  function updateClock()
    {
        var date = new Date();
        var hours = date.getHours();
      var minutes = date.getMinutes();
      var seconds = date.getSeconds();
      var ampm = hours >= 12 ? "PM" : "AM";
      hours = hours % 12;
      hours = hours ? hours : 12; // the hour "0" should be "12"
      minutes = minutes < 10 ?"0"+minutes : minutes;
      seconds = seconds < 10 ? "0"+seconds : seconds;
    
        var strTime = hours + ":" + minutes + ":" + seconds + " " + ampm;

        $(".time").html(strTime);
     }

    $(document).ready(function()
    {
      setInterval("updateClock()", 1000);
      var d = new Date();
      var month = d.getMonth()+1;
      var day = d.getDate();
      var monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
      ];
     var date = monthNames[month-1]+ " " +
      (day<10 ? "0" : "") + day+","+ d.getFullYear();   
     $("#date").append(date);
    });
</script> 
 <div class="row"></div>
  <div class="row">
    <div class="column"></div>
    <div class="seven wide column">
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
    <div class="column"></div>'; } ?>

    <div class="six wide column">
      <div id="vOrder">
      <div class="ui grid">
         <div class="hidden item"></div> <div class="hidden item"></div>
         <div class="sixteen wide left aligned middle aligned column">
          <h1 class="ui grey dividing header">
            <i class="unordered list icon"></i>
            <div class="content">
              ORDER LIST
              <div class="sub header">List of order</div>
            </div>  
          </h1>

        </div>
        <div class="ten wide column"></div>
        <div class="six wide right aligned column ">
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
              <input type="number" placeholder="Enter Cash Amount" id="amount" value="0" id="cashbox">
            </div>
          </div>
          <div id="error">
            <div class="ui negative message">
              <i class="close icon"></i>
              <div class="header">
                Invalid amount
              </div>
              <p>Please add amount to proceed
            </p></div>
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
          <strong><span id="peso" style="font-size: 1.3em;">P</span><span id="change">0.00</span></strong>
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
    <a href="<?php echo site_url();?>/CLogin/viewPos" class="item"><div class="ui teal button">BACK</div></a>
    <div class="hidden item"></div><div class="hidden item"></div><div class="hidden item"></div>
    <a class="item"><button class="ui teal button" id="rbtn">CHECKOUT</button></a>
    <a class="item"><button class="ui teal button" id="print">CHECKOUT w/RECEIPT</button></a>
    <div class="hidden item"></div>
    <div class="hidden item"></div>
  </div>
</div>
</div> 
<input type="hidden" name="page" id="page" value="<?php echo $page; ?>">
</body>
</html>
    
<script type="text/javascript">
  $(document).ready(function(){
    $('#cashbox').on('focus', 'input[type=number]', function (e) {
      $(this).on('mousewheel.disableScroll', function (e) {
      e.preventDefault()
      });
    })
    $('#cashbox').on('blur', 'input[type=number]', function (e) {
     $(this).off('mousewheel.disableScroll')
    })

    var cash = $("#cash").text();
    if(cash == 0){
     $('#error').hide();
    }

    $(".close.icon").click(function(){
      $('#error').hide();
    });

    $(':input[type=number]').on('mousewheel',function(e){
      $(this).blur();
    });
      
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
        //var tableData = storeTblValues();
        var amt = $("#amount").val();
        var due = $("#due").text();
        var cash = amt+'.00';
        var change = parseFloat(cash)-parseFloat(due)+'.00';
        $("#cash").html(cash); 
        $("#change").html(change);

        
        if(change < 0){
          $("#change").css("color","red");
          $('#peso').css("color","red");
         }else{
          $("#change").css("color","black");
          $('#peso').css("color","black");
          $('#error').hide();
         
         }
      });

    $('#rbtn').on('click',function(){

      var tableData;
      var total = $("#due").text();
      var cash = $("#cash").text();
      var change = $("#change").text();
      var page = $('#page').val();
      var eid = $('#eid').val();
      tableData = storeTblValues();

      tableData = $.toJSON(tableData);
      var dataSet =  "pTableData=" + tableData+"&total="+total+"&cash="+cash+"&change="+change+"&page="+page+"&eid="+eid;
      if(cash != 0){
        $.ajax({
          type: "POST",
          url: "<?php echo site_url()?>/CReceipt/addOrderToReceipt",
          data: dataSet,
          cache: false,
          success: function(result){
             $('body').html(result);
              window.print();
              document.location.href = "<?php echo site_url()?>/CLogin/viewPos"; 
          },
          error: function(jqXHR, errorThrown){
              console.log(errorThrown);
          }

        });
      }else{
        $('#error').show();        
      }

    });
    $('#print').on('click',function(){

        var tableData;
        var eid = $('#eid').val();
        var total = $("#due").text();
        var cash = $("#cash").text();
        var change = $("#change").text();
        var page = $('#page').val();
        tableData = storeTblValues();

        tableData = $.toJSON(tableData);
        var data =  "pTableData=" + tableData+"&total="+total+"&cash="+cash+"&change="+change+"&page="+page+"&eid="+eid;
        if(cash != 0 && change >=0){
           $.ajax({
            type: "POST",
            url: "<?php echo site_url()?>/CReceipt/printReceipt",
            data: data,
            cache: false,
            success: function(result){
              var data = result.split('|');
              $('body').html(data[0]);
              window.print();
              $('body').html(data[1]);
              window.print();
              document.location.href = "<?php echo site_url()?>/CLogin/viewPos"; 
            },
            error: function(jqXHR, errorThrown){
              console.log(errorThrown);
            }
          });

        }else{
          $('#error').show();        
        }
      });

   });
</script>


