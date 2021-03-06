<?php  
class Admin extends Controller
{
	public $aprioriModel;
	public $orderModel;
	public $orderDetailsModel;
	public $productModel;
	public $specificationsModel;
	public $catalogModel;
	public $brandModel;
	public $storageModel;
	public $accountModel;


	public function __construct(){
		$this->aprioriModel = $this->model("AprioriModel");
		$this->orderModel = $this->model("OrderModel");
		$this->orderDetailsModel = $this->model("OrderDetailsModel");
		$this->productModel = $this->model("productModel");
		$this->specificationsModel = $this->model("SpecificationsModel");
		$this->catalogModel = $this->model("catalogModel");
		$this->brandModel = $this->model("brandModel");
		$this->storageModel = $this->model("storageModel");
		$this->accountModel = $this->model("accountModel");
	}

	function Default(){
		if (isset($_SESSION['login']) && (!empty($_SESSION['login']) && $_SESSION['login'] == true) ){
			header('Location: http://localhost:8080/shopping/Admin/ProdcutList');
			exit();
		}
		else{
			$this->view('login');
		}
	}

	function Login(){
		if (isset($_POST['login'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			if($login = $this->accountModel->login($username, $password)){
				$_SESSION['login'] = true;
				header('Location: http://localhost:8080/shopping/Admin/ProdcutList');
				exit;
			}
			else{
				$_SESSION['login'] = false;
				header('Location: http://localhost:8080/shopping/Admin/');
				exit;
			}
		}
	}

	function OrderApporoval(){
		$this->view("admin_master",["page" => "order_approval_process", 
			"order" => $this->orderModel->OrderApproval()]);
	}

	function OrderApproved(){
		$this->view("admin_master",["page" => "order_approved", 
			"order" => $this->orderModel->OrderApproved()]);
	}

	function OrderDetails($id){
		$this->view("admin_master",["page" => "order_details",
			"id" => $id,
			"orderDetails" => $this->orderDetailsModel->showAll($id)]);
	}

	function OrderAccept($id){
		$order_update = $this->orderModel->update($id);
		if ($order_update){
			header('Location: http://localhost:8080/shopping/Admin/OrderApproved');
			exit;
		}
		else{
			echo "Kh??ng ch???p nh???n ???????c ????n h??ng";
		}
	}

	function OrderDeny($id){
		$orderdetails_delete = $this->orderDetailsModel->delete($id);
		if ($orderdetails_delete){
			$order_delete = $this->orderModel->delete($id);
			if ($order_delete){
				header('Location: http://localhost:8080/shopping/Admin/OrderApporoval');
				exit;
			}
			else{
				echo "Kh??ng x??a ???????c ????n h??ng";
			}
		}
		else{
			echo "Kh??ng x??a ???????c chi ti???t ????n h??ng";
		}
	}

	function OrderDetailsApproved($id){
		$this->view("admin_master",["page" => "order_details_approved",
			"id" => $id,
			"orderDetails" => $this->orderDetailsModel->showAll($id)]);
	}

	function ProdcutList(){
		$this->view('admin_master',["page" => "product_list",
			"product" => $this->productModel->getList()]);
	}

	function Apriori(){
		$this->view("admin_master",["page" => "apriori", "apriori" => $this->aprioriModel->showAll()]);
	}

	function AddProduct(){
		if (isset($_POST['add_product'])){
			$name = $_POST['name'];
			$price = $_POST['price'];
			$catalog = $_POST['catalog'];
			$brand = $_POST['brand'];
			$quantity = $_POST['quantity'];
			$image = $_POST['imageUpload'];
			$description = $_POST['description'];

			if (!empty($name) && !empty($price) && !empty($catalog) && !empty($brand) && !empty($quantity) && !empty($image)) {
				$productID = $this->productModel->insert($name,$price,$image,$brand,$catalog,$description);
				if (isset($productID)) {
					$result = $this->storageModel->insert($productID,$quantity);
					if ($result) {
						header('Location: http://localhost:8080/shopping/Admin/AddSpecifications/'.$productID);
						exit;
					}
					else{
						echo "<script>alert('Th??m s??? l?????ng kh??ng th??nh c??ng')</script>";
					}
				}
				else{
					echo "<script>alert('Th??m s???n ph???m kh??ng th??nh c??ng')</script>";
				}
			}
		}

		else {
			$this->view("admin_master",["page" => "add_product", 
				"brand" => $this->brandModel->getBrand(),
				"catalog" => $this->catalogModel->getCatalog() ]);
		}
	}

	function EditProduct($id){
		if (isset($_POST['update_product'])){
			$name = $_POST['name'];
			$price = $_POST['price'];
			$discount = $_POST['discount'];
			$catalog = $_POST['catalog'];
			$brand = $_POST['brand'];
			$image = $_POST['image'];
			$description = $_POST['description'];
			if (!empty($name) && !empty($price) && !empty($catalog) && !empty($brand) && !empty($image)) {
				$this->productModel->update($id,$name,$price,$discount,$image,$brand,$catalog,$description);
				header('Location: http://localhost:8080/shopping/Admin');
				exit;			
			}
		}
		else{
			$this->view("admin_master",["page" => "edit_product",
				"brand" => $this->brandModel->getBrand(),
				"catalog" => $this->catalogModel->getCatalog(),
				"product" => $this->productModel->getProduct($id)]);
		}
		
	}

	function DeletProduct($id){
		$delete_storage = $this->storageModel->delete($id);
		if($delete_storage){
			$delete_product = $this->productModel->delete($id);
			if($delete_product){
				header('Location: http://localhost:8080/shopping/Admin');
				exit;
			}
			else{
				echo "<script>alert('X??a s???n ph???m kh??ng th??nh c??ng')</script>";
			}
		}
		else{
			echo "<script>alert('X??a kho kh??ng th??nh c??ng')</script>";
		}
	}

	function Specifications($id){
		$this->view ("admin_master",["page" => "specifications",
			"id"=> $id,
			"specifications"=>$this->specificationsModel->getSpecificationsId($id)]);
	}

	function AddSpecifications($id){
		if(isset($_POST['add_specifications'])){
			$name = $_POST['name'];
			$value = $_POST['value'];
			if (!empty($name) && !empty($value)) {
				$result = $this->specificationsModel->insert($id,$name,$value);
				if ($result){
					echo "<script>alert('Th??m th??nh c??ng')</script>";
				}
				else{
					echo "<script>alert('Th??m kh??ng th??nh c??ng')</script>";
				}
			}
		}

		$this ->view ("admin_master",["page" => "add_specifications",
			"product" => $this->productModel->getProduct($id)]);
	}

	function EditSpecifications(){
		if(isset($_POST['id']) && !empty($_POST['id']) ){
			$id = $_POST['id'];
			$name = $_POST['name'];
			$value = $_POST['value'];
			if(!empty($id) && !empty($name) && !empty($value)){
				$update_specifications = $this->specificationsModel->update($id, $name, $value);
				if($update_specifications){
					echo "S???a th??ng s??? th??nh c??ng";
				}
				else{
					echo "S???a th??ng s??? kh??ng th??nh c??ng ";
				}
			}
			else{
				echo "Thi???u gi?? tr???";
			}
			
		}
		else{
			echo "L???i h??? th???ng";
		}
	}

	function DeletSpecifications(){
		if(isset($_POST['id']) && !empty($_POST['id']) ){
			$id = $_POST['id'];
			$delete_specifications = $this->specificationsModel->delete($id);
			if($delete_specifications){
				echo "X??a th??ng s??? th??nh c??ng";
			}
			else{
				echo "X??a th??ng s??? kh??ng th??nh c??ng";
			}
		}
		else{
			echo "L???i";
		}
	}

	function Catalog(){
		$this ->view ("admin_master",["page" => "catalog",
			"catalog" => $this->catalogModel->getCatalog()]);
	}

	function AddCatalog(){

		if(isset($_POST['add_catalog']) && !empty($_POST['add_catalog']) ){
			$name = $_POST['catalog_name'];
			$result = $this->catalogModel->insert($name);
			if($result){
				header('Location: http://localhost:8080/shopping/admin/Catalog');
				exit;
			}
			else{
				echo "<script>alert('Th??m kh??ng th??nh c??ng')</script>";
			}
		}
		else{
			$this->view("admin_master",["page" => "add_catalog"]);
		}
	}

	function EditCatalog(){
		if(isset($_POST['id']) && !empty($_POST['id']) ){
			$id = $_POST['id'];
			$name = $_POST['name'];
			if(!empty($id) && !empty($name)){
				$update_catalog = $this->catalogModel->update($id, $name);
				if($update_catalog){
					echo "S???a lo???i s???n ph???m th??nh c??ng";
				}
				else{
					echo "S???a lo???i s???n ph???m kh??ng th??nh c??ng ";
				}
			}
			else{
				echo "Thi???u gi?? tr???";
			}
			
		}
		else{
			echo "L???i h??? th???ng";
		}
	}

	function DeletCatalog(){
		if(isset($_POST['id']) && !empty($_POST['id']) ){
			$id = $_POST['id'];
			$delete_catalog = $this->catalogModel->delete($id);
			if($delete_catalog){
				echo "X??a lo???i s???n ph???m th??nh c??ng";
			}
			else{
				echo "Ph???i x??a nh???ng s???n ph???m thu???c th????ng hi???u n??y";
			}
		}
		else{
			echo "L???i";
		}
	}

	function Brand(){
		$this ->view ("admin_master",["page" => "brand",
			"brand" => $this->brandModel->getBrand()]);
	}

	function AddBrand(){
		if(isset($_POST['add_brand']) && !empty($_POST['add_brand']) ){
			$name = $_POST['brand_name'];
			$result = $this->brandModel->insert($name);
			if($result){
				header('Location: http://localhost:8080/shopping/admin/Brand');
				exit;
			}
			else{
				echo "<script>alert('Th??m kh??ng th??nh c??ng')</script>";
			}
		}
		else{
			$this->view("admin_master",["page" => "add_brand"]);
		}
	}

	function EditBrand(){
		if(isset($_POST['id']) && !empty($_POST['id']) ){
			$id = $_POST['id'];
			$name = $_POST['name'];
			if(!empty($id) && !empty($name)){
				$update_brand = $this->brandModel->update($id, $name);
				if($update_brand){
					echo "S???a th????ng hi???u th??nh c??ng";
				}
				else{
					echo "S???a th????ng hi???u kh??ng th??nh c??ng ";
				}
			}
			else{
				echo "Thi???u gi?? tr???";
			}
			
		}
		else{
			echo "L???i h??? th???ng";
		}
	}

	function DeletBrand(){
		if(isset($_POST['id']) && !empty($_POST['id']) ){
			$id = $_POST['id'];
			$delete_catalog = $this->brandModel->delete($id);
			if($delete_catalog){
				echo "X??a th????ng hi???u th??nh c??ng";
			}
			else{
				echo "Ph???i x??a nh???ng s???n ph???m thu???c th????ng hi???u n??y";
			}
		}
		else{
			echo "L???i";
		}
	}
}
?>