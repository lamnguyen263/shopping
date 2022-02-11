<?php  
	class Controller
	{
		function model($model)
		{
			require_once "./mvc/model/".$model.".php";
			return new $model;
		}

		function view($view, $data = [])
		{
			require_once "./mvc/view/".$view.".php";
		}
	}
?>