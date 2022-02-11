<?php  
class Cart extends Controller
{
	function Default(){
		if(isset($_POST['buy-btn'])){
			$id = $_POST['product-id'];
			$this->view("cart",['id'=>$id]);
		}
		else{
			$this->view("cart",['id'=>'fail']);
		}
	}
}
?>