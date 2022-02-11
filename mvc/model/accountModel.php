<?php 
class accountModel extends Database
{
	public function login($username, $password){
		$sql = "SELECT * FROM account WHERE username = '$username' AND password = '$password' LIMIT 1";
		if ($result = mysqli_query($this->con, $sql)){
			return true;
		}
		else{
			return false;
		}
	}

}
?>