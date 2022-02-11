<?php  
class Home extends Controller
{
	public $productModel;

	public function __construct(){
		$this->productModel = $this->model("ProductModel");
	}

	function Default(){
		$this->view("home",["gear" => $this->productModel->listGear(),
							"laptop" => $this->productModel->homeLaptop(),
							"smartphone" => $this->productModel->homeSmartphone()]);
	}
}
?>