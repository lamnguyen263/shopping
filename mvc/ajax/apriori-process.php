<?php
require_once "database.php";

$json = array();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if ($result = $mysqli->query("select name from product", MYSQLI_USE_RESULT)) {
        while ($i = $result->fetch_row()) {
            $item[] = $i[0];
        }
        $result->close();
    }

    if ($result = $mysqli->query("select group_concat(product.name separator ',')
        from order_details left join product 
        on (order_details.product_id = product.id)
        group by order_details.order_id", MYSQLI_USE_RESULT)) {

        while ($b = $result->fetch_row()) {
            $belian[] = $b[0];
        }

        $result->close();
    }

    $item1 = count($item) - 1;
    $item2 = count($item);

    foreach ($item as $value) {
        $total_per_item[$value] = 0;
        foreach($belian as $item_belian) {            
            if(strpos($item_belian, $value) !== false) {
                $total_per_item[$value]++;
            }
        }
    }

    for($i = 0; $i < $item1; $i++) {
        for($j = $i+1; $j < $item2; $j++) {
            $item_pair = $item[$i].'|'.$item[$j]; 
            $item_array[$item_pair] = 0;
            foreach($belian as $item_belian) {
                if((strpos($item_belian, $item[$i]) !== false) && (strpos($item_belian, $item[$j]) !== false)) {
                    $item_array[$item_pair]++;
                }
            }
        }
    }

    foreach ($item_array as $ia_key => $ia_value) {
        $theitems = explode('|',$ia_key);
        for($x = 0; $x < count($theitems); $x++) {
            $item_name = $theitems[$x];
            $item_total = $total_per_item[$item_name];
            if ($item_total > 0) {
                $in_float = round($ia_value / $item_total,2);
                $alt_item = $theitems[ ($x + 1) % count($theitems)];
                if($in_float > 0){
                    $mysqli->query("call update_apriori('".$item_name."','".$alt_item."',".$in_float.")");
                }  
            }
        }
    }

    $json['status'] = 100;
    $json['msg'] = "Update success";
}

else{

    $json['status'] = 105;
    $json['msg'] = "Invalid Request Found";

}


echo json_encode($json);

?>