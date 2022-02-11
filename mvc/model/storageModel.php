<?php 
class storageModel extends Database
{
	public function insert_or_update($productID, $inventory){
		$sql = "call update_storage($productID,$inventory)";
		if(mysqli_query($this->con, $sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public function insert($productID, $inventory){
		$sql = "INSERT INTO storage VALUES ('',$productID,$inventory,0)";
		if(mysqli_query($this->con, $sql)){
			return mysqli_insert_id($this->con);
		}
		else{
			return null;
		}
	}

	public function update($productID, $quantity){
		$sql = "UPDATE storage SET sold = sold + $quantity, inventory = inventory - $quantity WHERE product_id = $productID";
		if($result = mysqli_query($this->con, $sql) ){
			return true;
		}
		else{
			return false;
		}
	}

}
?>