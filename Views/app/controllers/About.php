<?php 

class About extends Controller {

	public function index($nama = 'indra', $umur = '16') 
	{
		$data['judul'] = 'About';
		$data['nama'] = $nama;
		$data['umur'] = $umur;

		$this->view('templates/header', $data);
		$this->view('about/index', $data);
		$this->view('templates/footer');	
	}

	public function page() 
	{
		$data['judul'] = 'About';
		
		$this->view('templates/header', $data);
		$this->view('about/page');
		$this->view('templates/footer');
	}

}