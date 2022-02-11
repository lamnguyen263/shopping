<?php 
class brandModel extends Database
{
	public function getBrand(){
		$sql = "SELECT * FROM brand ";
		if ($result = mysqli_query($this->con, $sql)){
			return $result;
		}
		else{
			return "fail query";
		}
	}

	public function insert($name){
		$sql = "INSERT INTO brand VALUES ('','$name')";
		if($result = mysqli_query($this->con, $sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public function update($id, $name){
		$sql = "UPDATE brand SET brand_name = '$name' WHERE brand.id = $id";
		if($result = mysqli_query($this->con, $sql) ){
			return true;
		}
		else{
			return false;
		}
	}

	public function delete($id){
		$sql = "DELETE FROM brand WHERE brand.id = $id";
		if($result = mysqli_query($this->con, $sql)){
			return true;
		}
		else{
			return false;
		}
	}

}
?>