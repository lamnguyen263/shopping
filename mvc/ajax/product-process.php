<?php

$json = array();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if( isset($_POST['delete_product']) && !empty(trim($_POST['delete_product'])) ){

        $product_id = $_POST['delete_product'];

        if(isset($_SESSION['shopping_cart']) && !empty($_SESSION['shopping_cart']) ){

            $array_keys = array_keys($_SESSION['shopping_cart']);

            if(!in_array($product_id, $array_keys)){

                $_SESSION["shopping_cart"] = $_SESSION["shopping_cart"] + $cart_array;

                $json['status'] = 100;
                $json['msg'] = "Thêm thành công sản phẩm vào giỏ hàng";

            }
            else{
                //repeat Product
                $json['status'] = 103;
                $json['msg'] = "Sản phẩm đã có trong giỏ hàng";

            }

        }
        else{
            $_SESSION['shopping_cart'] = $cart_array;
            $json['status'] = 100;
            $json['msg'] = "Thêm thành công sản phẩm vào giỏ hàng";

        }
    }

    

}
else{

    $json['status'] = 105;
    $json['msg'] = "Invalid Request Found";

}


echo json_encode($json);

?>