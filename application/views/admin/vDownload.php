    <?php

    $output= '';

    $output .='
        <table class = "table" bordered="1">
            <tr>
                <td><b>Product Name</b></td>
                <td><b>Product Quantity</b></td>    
                <td><b>Product Total</b></td>
            </tr>
        
    ';
    foreach($data as $row){
        $output .='
            <tr>
                <td>'.$row->product_name.'</td>
                <td>'.$row->quantity.'</td>
                <td>'.$row->subtotal.'</td>
            </tr>
        ';
    }
    $output .='</table>';

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="download.xls"');
    echo $output;
    ?>