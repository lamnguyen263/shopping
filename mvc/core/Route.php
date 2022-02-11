<?php 
	class Route
	{
		protected $controller = "Home";
		protected $action = "Default";
		protected $params = [];


		function __construct(){
			$array = $this->UrlProcess();

			// Xử lí controller
			// Nếu có tồn tại tên file trùng tên controller thì thêm file đó vào. Nếu không mặc định là trang chủ
			if(file_exists("./mvc/controller/".$array[0].".php")){
				$this->controller = $array[0];
					unset($array[0]);
			}
			require_once "./mvc/controller/".$this->controller.".php";
			$this->controller = new $this->controller;

			// Xử lí action
			// Nếu tồn tại tên hàm trùng tên action thì gán giá trị action. Nếu không mặc định là hàm default
			if(isset($array[1])){
				if(method_exists($this->controller, $array[1])){
					$this->action = $array[1];
				}
				unset($array[1]);
			}

			// Xử lí params 
			// Gọi lại hàm với tham số được truyền vào
			$this->params = isset($array)?array_values($array):[];
			call_user_func_array([$this->controller, $this->action], $this->params);
		}


		// Xử lí chuỗi url truyền vào lấy ra mảng
		// VD : www.abc.com/xyz/xxx => [0] = xyz, [1] = xxx
		function UrlProcess(){
			if(isset($_GET["url"])){
				//filter xác nhận tính đúng đắn của url
				//explode cắt chuỗi ra mảng theo dấu /
				return explode("/", filter_Var(trim($_GET["url"]), FILTER_SANITIZE_URL));
			}
		}
	}
 ?>