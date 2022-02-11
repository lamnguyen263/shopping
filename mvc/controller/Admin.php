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
			echo "Không chấp nhận được đơn hàng";
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
				echo "Không xóa được đơn hàng";
			}
		}
		else{
			echo "Không xóa được chi tiết đơn hàng";
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
						echo "<script>alert('Thêm số lượng không thành công')</script>";
					}
				}
				else{
					echo "<script>alert('Thêm sản phẩm không thành công')</script>";
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
				echo "<script>alert('Xóa sản phẩm không thành công')</script>";
			}
		}
		else{
			echo "<script>alert('Xóa kho không thành công')</script>";
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
					echo "<script>alert('Thêm thành công')</script>";
				}
				else{
					echo "<script>alert('Thêm không thành công')</script>";
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
					echo "Sửa thông số thành công";
				}
				else{
					echo "Sửa thông số không thành công ";
				}
			}
			else{
				echo "Thiếu giá trị";
			}
			
		}
		else{
			echo "Lỗi hệ thống";
		}
	}

	function DeletSpecifications(){
		if(isset($_POST['id']) && !empty($_POST['id']) ){
			$id = $_POST['id'];
			$delete_specifications = $this->specificationsModel->delete($id);
			if($delete_specifications){
				echo "Xóa thông số thành công";
			}
			else{
				echo "Xóa thông số không thành công";
			}
		}
		else{
			echo "Lỗi";
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
				echo "<script>alert('Thêm không thành công')</script>";
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
					echo "Sửa loại sản phẩm thành công";
				}
				else{
					echo "Sửa loại sản phẩm không thành công ";
				}
			}
			else{
				echo "Thiếu giá trị";
			}
			
		}
		else{
			echo "Lỗi hệ thống";
		}
	}

	function DeletCatalog(){
		if(isset($_POST['id']) && !empty($_POST['id']) ){
			$id = $_POST['id'];
			$delete_catalog = $this->catalogModel->delete($id);
			if($delete_catalog){
				echo "Xóa loại sản phẩm thành công";
			}
			else{
				echo "Phải xóa những sản phẩm thuộc thương hiệu này";
			}
		}
		else{
			echo "Lỗi";
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
				echo "<script>alert('Thêm không thành công')</script>";
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
					echo "Sửa thương hiệu thành công";
				}
				else{
					echo "Sửa thương hiệu không thành công ";
				}
			}
			else{
				echo "Thiếu giá trị";
			}
			
		}
		else{
			echo "Lỗi hệ thống";
		}
	}

	function DeletBrand(){
		if(isset($_POST['id']) && !empty($_POST['id']) ){
			$id = $_POST['id'];
			$delete_catalog = $this->brandModel->delete($id);
			if($delete_catalog){
				echo "Xóa thương hiệu thành công";
			}
			else{
				echo "Phải xóa những sản phẩm thuộc thương hiệu này";
			}
		}
		else{
			echo "Lỗi";
		}
	}
}
?>