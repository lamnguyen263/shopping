<?php 
class OrderDetailsModel extends Database
{
	public function showAll($id){
		$sql = "SELECT product.name, product.price, order_details.quantity FROM order_details LEFT JOIN product ON product.id = order_details.product_id WHERE order_details.order_id = ".$id;
		if ($result = mysqli_query($this->con, $sql)){
			return $result;
		}
		else{
			return "fail query";
		}
	}

	public function insert($orderID, $productID, $quantity){
		$sql = "INSERT INTO order_details VALUES ('',".$orderID.",".$productID.",".$quantity.")";
		echo $sql;
		mysqli_query($this->con, $sql);
	}

	public function delete($id){
		$sql = "DELETE FROM order_details WHERE order_details.order_id = $id";
		if($result = mysqli_query($this->con, $sql)){
			return true;
		}
		else{
			return false;
		}
	}


}
?>