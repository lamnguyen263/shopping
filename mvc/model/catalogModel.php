<?php 
class catalogModel extends Database
{
	public function getCatalog(){
		$sql = "SELECT * FROM catalog ";
		if ($result = mysqli_query($this->con, $sql)){
			return $result;
		}
		else{
			return "fail query";
		}
	}

	public function insert($name){
		$sql = "INSERT INTO catalog VALUES ('','$name')";
		if($result = mysqli_query($this->con, $sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public function update($id, $name){
		$sql = "UPDATE catalog SET catalog_name = '$name' WHERE catalog.id = $id";
		if($result = mysqli_query($this->con, $sql) ){
			return true;
		}
		else{
			return false;
		}
	}

	public function delete($id){
		$sql = "DELETE FROM catalog WHERE catalog.id = $id";
		if($result = mysqli_query($this->con, $sql)){
			return true;
		}
		else{
			return false;
		}
	}

}
?>