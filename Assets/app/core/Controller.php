<?php 

class Controller {
	
	public function view($namaView, $data = []) 
	{
		require_once '../app/views/'. $namaView . '.php';
	}

}