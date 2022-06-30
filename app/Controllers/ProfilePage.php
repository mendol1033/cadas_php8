<?php 
namespace App\Controllers;

class ProfilePage extends BaseController 
{
	public function index()
	{	
		$this->data['menu'] = $this->getMenu();
		$this->data['title'] = "Aplikasi Mandiri KPPBC TMP Cikarang";
		return view("Stakeholders/IndexPage",$this->data);
	}

	public function getMenu(){
		$menu = [];

		$dashboard = [
			'appCode' => 0,
			'appTitle' => 'Profile',
			'link' => 'ProfilePage/Main',
			'appIcon' =>'fal fa-file-user' ,
		];

		$form = [
			'appCode' => 0,
			'appTitle' => 'Form Laporan',
			'link' => '#',
			'appIcon' =>'fal fa-file-alt' ,
			'subMenu' => [
				[
					'title' => 'Laporan Dampak Ekonomi',
					'link' => 'Kuisioner/dampakEkonomi',
				],
				[
					'title' => 'Laporan Keuangan Perusahaan',
					'link' => 'Kuisioner/lapkeu',
				]
			]
		];


		$menu = [$dashboard, $form];

		return $menu;
	}

	public function Main(){
		if (!empty($_GET)) {
			if ($_GET['page'] == "main") {
				// $this->log(2,'Telah Mengakses Menu Database Profil TPB > Input Data Profil');
				return view('Stakeholders/Profile', $this->data);
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
					'icon' => 'fal fa-file-user',
					'title' => 'Profil Tempat Penimbunan Berikat',
					'detail' => ''
				];
				$info = [
					'main' => 'Cadas',
					'sub' => 'Stakeholders',
					'active' => 'Profil TPB',
					'date' => $date,
					'subheader' => $subheader
				];
				
				return json_encode($info);
			}
		}
	}
	
}