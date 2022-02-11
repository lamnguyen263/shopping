<?php 
class SpecificationsModel extends Database
{
	public function getSpecificationsId($id){
		$sql = "SELECT * FROM specifications WHERE product_id = ".$id;
		if ($result = mysqli_query($this->con, $sql)){
			return $result;
		}
		else{
			return "fail query";
		}
	}

	public function insert($productID, $name, $value){
		$sql = "INSERT INTO specifications VALUES ('',$productID,'$name', '$value')";
		if($result = mysqli_query($this->con, $sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public function update($id, $name, $value){
		$sql = "UPDATE specifications SET specifications_name = '".$name."' , specifications_value = '".$value."' WHERE specifications.id = ".$id;
		if($result = mysqli_query($this->con, $sql) ){
			return true;
		}
		else{
			return false;
		}
	}

	public function delete($id){
		$sql = "DELETE FROM specifications WHERE id = $id";
		if($result = mysqli_query($this->con, $sql)){
			return true;
		}
		else{
			return false;
		}
	}

}
?>