<?php 
class OrderModel extends Database
{
	public function OrderApproval(){
		$sql = "SELECT * FROM orders WHERE status = 0";
		if ($result = mysqli_query($this->con, $sql)){
			return $result;
		}
		else{
			return "fail query";
		}
	}

	public function OrderApproved(){
		$sql = "SELECT * FROM orders WHERE status != 0";
		if ($result = mysqli_query($this->con, $sql)){
			return $result;
		}
		else{
			return "fail query";
		}
	}

	public function orderInsert($name, $address, $city, $phone, $total){
		$sql = "INSERT INTO orders VALUES ('','".$name."','".$address."','".$city."', '".$phone."', ".$total.", CURRENT_DATE, 0)";
		if(mysqli_query($this->con, $sql)){
			return mysqli_insert_id($this->con);
		}
		else{
			return null;
		}
	}

	public function update($id){
		$sql = "UPDATE orders SET status = 1 WHERE orders.id = $id";
		if($result = mysqli_query($this->con, $sql) ){
			return true;
		}
		else{
			return false;
		}
	}

	public function delete($id){
		$sql = "DELETE FROM orders WHERE orders.id = $id";
		if($result = mysqli_query($this->con, $sql)){
			return true;
		}
		else{
			return false;
		}
	}
}
?>