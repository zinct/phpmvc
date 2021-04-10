<?php 

class About {

	public function index($nama = admin, $pekerjaan = Programmer) 
	{
		echo "Hallo, Nama Saya $nama Dan Pekerjaan Saya Adalah Seorang $pekerjaan. <br>
			  Salam Kenal...";
	}

	public function page() 
	{
		echo "About | Page";
	}

}