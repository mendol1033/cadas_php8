<?php 
namespace App\Controllers;

class Index extends BaseController
{
	public function index()
	{	
		$this->data['title'] = "Aplikasi Mandiri KPPBC TMP Cikarang";
		return view("AppMenu",$this->data);
	}
	
}