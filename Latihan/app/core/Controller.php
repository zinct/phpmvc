<?php 

class Controller {

	public function view($view, $data = []) 
	{
		//../app/views/home/index.php
		require_once '../app/views/' . $view . '.php';
	}

}