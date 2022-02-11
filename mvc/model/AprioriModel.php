<?php 
class AprioriModel extends Database
{
	public function showAll(){
		$sql = "SELECT * FROM apriori ORDER BY product_A";
		if ($result = mysqli_query($this->con, $sql)){
			return $result;
		}
		else{
			return "fail query";
		}
	}

}
?>