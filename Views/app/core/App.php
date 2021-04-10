<?php 

class App {

	protected $controller = 'Home';
	protected $method = 'index';
	protected $params = [];

	public function __construct() 
	{
		$url = $this->parseURL();
		
		//Controller
		if (file_exists('../app/controllers/' . $url[0] . '.php')) 
		{
			$this->controller = $url[0];
			unset($url[0]);
		}

		//Require Di Folder controller dengan nama $this->controller Lalu tambah .php
		require_once '../app/controllers/' . $this->controller . '.php';
		//Buat object, new $this->controller
		$this->controller = new $this->controller;

		//Method
		if (isset($url[1])) 
		{
			if (method_exists($this->controller, $url[1])) 
			{
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		//Parameters 
		if (!empty($url)) 
		{
			//$this->params = ['nama'],['pekerjaan'] || smua data pada array
			$this->params = array_values($url);
		}  

		//call_user_func_array berfungsi untuk Menjalankan Controller dan method dan mengirimkan data dari parameters
		call_user_func_array([$this->controller, $this->method], $this->params);

	}

	//Fungsi parsing url
	public function parseURL() 
	{
		if (isset($_GET['url'])) 
		{
			//rtrim Berfungsi untuk menghilangkan slash di akhir
			$url = rtrim($_GET['url'], '/');

			//Berfungsi untuk Mencegah karakter karakter aneh dari url
			$url = filter_var($url, FILTER_SANITIZE_URL);

			//explode berfungsi untuk memecahkan url dengan slash lalu dimasukan ke array
			$url = explode('/', $url);
			return $url;
		}
	}
}