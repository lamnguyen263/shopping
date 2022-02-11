<?php
session_start();

$json = array();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(isset($_POST['product_id']) && !empty(trim($_POST['product_id'])) ){

        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_image = $_POST['product_image'];
        $product_price = $_POST['product_price'];
        $product_quantity = 1;

        $cart_array = array(
            $product_id => array(
                'name' => $product_name,
                'image' => $product_image,
                'price' => $product_price,
                'quantity' => $product_quantity
            )
        );

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

    elseif(isset($_POST['rm_val']) && !empty(trim($_POST['rm_val']))){
        $rm_key = $_POST['rm_val'];    
        unset($_SESSION['shopping_cart'][$rm_key]);

        $json['status'] = 102;
        $json['msg'] = "Đã xóa sản phẩm";
    }

    elseif (isset($_POST['change']) && !empty(trim($_POST['change'])) ) {
        $change_key = $_POST['change'];
        $change_quantity = $_POST['quantity'];
        $_SESSION['shopping_cart'][$change_key]['quantity'] = $change_quantity;
    }

    elseif (isset($_POST['total']) && !empty(trim($_POST['total'])) ) {
        $_SESSION['total'] = $_POST['total'];
    }

    else{
        $json['status'] = 104;
        $json['msg'] = "Giá trị dữ liệu không hợp lệ";

    }

}
else{

    $json['status'] = 105;
    $json['msg'] = "Invalid Request Found";

}


echo json_encode($json);

?>