<?php  
class Product extends Controller
{
	public $productModel;

	public function __construct(){
		$this->productModel = $this->model("ProductModel");
	}


	function Default(){
		$this->view("product",["laptop" => $this->productModel->listLaptop(),
								"smartphone" => $this->productModel->listMobile(),
								"gear" => $this->productModel->listGear()]);
	}


	function Laptop(){
		$this->view("laptop",["laptop" => $this->productModel->listLaptop()]);
	}

	function SmartPhone(){
		$this->view("smartphone",["smartphone" => $this->productModel->listMobile()]);
	}

	function Gear(){
		$this->view("gear",["gear" => $this->productModel->listGear()]);
	}

	function Search(){
		if(isset($_POST['search-btn'])){
			$keyword = $_POST['search-text'];
			$this->view("product",["laptop" => $this->productModel->searchProduct($keyword)]);
		}
		else{
			$this->Default();
		}
	}

	function Detail($id){
		$this->view("chitiet",["product" => $this->productModel->getProduct($id),
								"specifications" => $this->productModel->getProductInfo($id),
								"apriori" => $this->productModel->getProductApriori($id),
								"recommend" => $this->productModel->getProductCatalog($id)
							]);
	}
}
?>