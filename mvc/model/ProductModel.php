<?php 
class ProductModel extends Database
{

	public function getList(){
		$sql = "SELECT product.*, catalog.catalog_name as catalog, brand.brand_name as brand, storage.inventory as inventory, storage.sold as sold  From product INNER JOIN catalog on product.id_catalog = catalog.id INNER JOIN brand on product.id_brand = brand.id LEFT JOIN storage on product.id = storage.product_id";
		if(mysqli_query($this->con, $sql)){
			return mysqli_query($this->con, $sql);
		}
		else {
			return "fail query";
		}
	}

	public function listLaptop(){
		$sql = "SELECT product.* From product inner join catalog on product.id_catalog = catalog.id Where catalog.catalog_name = 'Laptop' Order by create_timestamp DESC";
		if(mysqli_query($this->con, $sql)){
			return mysqli_query($this->con, $sql);
		}
		else {
			return "fail query";
		}
	}

	public function listMobile(){
		$sql = "SELECT product.* From product inner join catalog on product.id_catalog = catalog.id Where catalog.catalog_name = 'SmartPhone' Order by create_timestamp DESC";
		if(mysqli_query($this->con, $sql)){
			return mysqli_query($this->con, $sql);
		}
		else {
			return "fail query";
		}
	}

	public function listGear(){
		$sql = "SELECT product.* From product inner join catalog on product.id_catalog = catalog.id Where catalog.catalog_name = 'Gear' Order by create_timestamp DESC";
		if(mysqli_query($this->con, $sql)){
			return mysqli_query($this->con, $sql);
		}
		else {
			return "fail query";
		}
	}

	public function searchProduct($search){
		$sql = "SELECT product.* FROM product INNER JOIN catalog ON product.id_catalog = catalog.id INNER JOIN brand ON product.id_brand = brand.id WHERE CONCAT(product.name, catalog.catalog_name, brand.brand_name) LIKE '%$search%'";
		if(mysqli_query($this->con, $sql)){
			return mysqli_query($this->con, $sql);
		}
		else {
			return "fail query";
		}
	}

	public function getProduct($id){
		$sql = "SELECT * From product Where product.id =".$id;
		$result = mysqli_query($this->con, $sql);
		$array = array();
		if ($result){
			while ($row = mysqli_fetch_assoc($result)) {
				$array[] = $row;
			}
		}
		return $array;
	}

	public function getProductInfo($id){
		$sql = "SELECT * From specifications Where product_id =".$id;
		$result = mysqli_query($this->con, $sql);
		$array = array();
		if ($result){
			while ($row = mysqli_fetch_assoc($result)) {
				$array[] = $row;
			}
		}
		return $array;
	}

	public function getProductApriori($id){
		$sql = "SELECT product.* FROM product RIGHT JOIN apriori ON product.name = apriori.product_B WHERE apriori.product_A = (SELECT name FROM product WHERE id = ".$id.") AND apriori.confidence > 0 ORDER BY apriori.confidence DESC LIMIT 4";
		if(mysqli_query($this->con, $sql)){
			return mysqli_query($this->con, $sql);
		}
		else {
			return "fail query";
		}
	}

	public function getProductCatalog($id){
		$sql = "SELECT * FROM product WHERE id_catalog = (SELECT id_catalog FROM product WHERE id = ".$id.") AND name != (SELECT name FROM product WHERE id = ".$id.")";
		if(mysqli_query($this->con, $sql)){
			return mysqli_query($this->con, $sql);
		}
		else {
			return false;
		}
	}

	public function homeLaptop(){
		$sql = "SELECT * FROM product WHERE id_catalog = 1 Order BY create_timestamp DESC LIMIT 10";
		if(mysqli_query($this->con, $sql)){
			return mysqli_query($this->con, $sql);
		}
		else {
			return "fail query";
		}
	}

	public function homeSmartphone(){
		$sql = "SELECT * FROM product WHERE id_catalog = 2 Order BY create_timestamp DESC LIMIT 10";
		if(mysqli_query($this->con, $sql)){
			return mysqli_query($this->con, $sql);
		}
		else {
			return "fail query";
		}
	}

	public function insert($name, $price, $image, $brand, $catalog, $description){
		$sql = "INSERT INTO product VALUES ('','$name',$price,0,'$image','$description',$catalog,$brand,CURRENT_TIMESTAMP,null)";
		if(mysqli_query($this->con, $sql)){
			return mysqli_insert_id($this->con);
		}
	}

	public function update($id,$name, $price,$discount, $image, $brand, $catalog, $description){
		$sql = "UPDATE product SET name = '$name' , price = $price, discount = $discount, image = '$image', description = '$description', id_catalog = $catalog, id_brand = $brand, update_timestamp = CURRENT_TIMESTAMP WHERE id = $id";
		if($result = mysqli_query($this->con, $sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public function delete($id){
		$sql = "DELETE FROM product WHERE id = $id";
		if(mysqli_query($this->con, $sql)){
			return true;
		}
		else{
			return false;
		}
	}

}
?>