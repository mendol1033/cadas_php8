<?php 
namespace App\Controllers;

use App\Models\ProfilModel;

class Profil extends BaseController
{

	public function __construct()
	{
		$this->param = new ProfilModel();
	}

	public function index()
	{
		
	}

	public function input(){
		if (!empty($_GET)) {
			if ($_GET['page'] == "main") {
				$this->log(2,'Telah Mengakses Menu Database Profil TPB > Input Data Profil');
				return view('Profil/input', $this->data);
			} elseif ($_GET['page'] == "info") {
				$hari = date('l');
				$tanggal = date('d');
				$bulan = date('F');
				$tahun = date('Y');
				$date = [
					'hari' => $hari,
					'tanggal' => $tanggal,
					'bulan' => $bulan,
					'tahun' => $tahun
				];
				$subheader = [
					'icon' => 'fal fa-edit',
					'title' => 'Form Rekam Awal Data Profil TPB',
					'detail' => ''
				];
				$info = [
					'main' => 'Cadas',
					'sub' => 'Database Profil TPB',
					'active' => 'Input Data Profil',
					'date' => $date,
					'subheader' => $subheader
				];
				
				return json_encode($info);
			}
		}
	}
}