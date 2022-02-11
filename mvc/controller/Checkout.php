<?php 
class Checkout extends Controller
{
	public $orderModel;
	public $orderDetailsModel;
	public $storageModel;


	public function __construct(){
		$this->orderModel = $this->model("OrderModel");
		$this->orderDetailsModel = $this->model("OrderDetailsModel");
		$this->storageModel = $this->model("storageModel");
	}

	function Default(){
		$this->view("checkout");
	}

	function Sold(){

		if (isset($_POST['checkout'])) {
			$name = $_POST['name'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$phone = $_POST['phone'];
			$total = $_SESSION['total'];
			if (isset($_SESSION['shopping_cart']) && !empty($_SESSION['shopping_cart']) ) {
				if(!empty($name) && !empty($address) && !empty($city) && !empty($phone) ){
					$orderID = $this->orderModel->orderInsert($name, $address, $city, $phone, $total);
				}

				if (!empty($orderID)){
					foreach ($_SESSION['shopping_cart'] as $key => $value) {
						echo $this->storageModel->update($key,$value['quantity']);
						echo $this->orderDetailsModel->insert($orderID,$key,$value['quantity']);
					}
					unset($_SESSION['shopping_cart']);
					$_SESSION['messenge'] = 'Cám ơn bạn đã mua hàng. Chúng tôi sẽ gọi điện sớm nhất có thể để xác nhận đơn hàng. Xin chờ điện thoại';
					header('Location: http://localhost:8080/shopping');
					exit;
				}
			}
			
			else {
				header('Location: http://localhost:8080/shopping/Cart');
				exit;
			}
		}
	}

}
?>