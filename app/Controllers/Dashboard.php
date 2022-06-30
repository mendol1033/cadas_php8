<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends BaseController
{

	public function __construct()
	{
		
	}

	public function index()
	{
		
	}

	public function DashImpor(){
		if (!empty($_GET)) {
			if ($_GET['page'] == "main") {
				$this->log(2,'Telah Mengakses Menu Dashboard > Dashboard Impor');
				return view('Dashboard/DashImpor');
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
					'icon' => 'fal fa-analyticsPT ',
					'title' => '<b>DASHBOARD PENERIMAAN</b>',
					'detail' => 'IMPOR UNTUK DIPAKAI (BC 2.0)'
				];
				$info = [
					'main' => 'Cadas',
					'sub' => 'Dashboard',
					'active' => 'Impor Untuk Dipakai (BC 2.0)',
					'date' => $date,
					'subheader' => $subheader
				];

				return json_encode($info);
			}
		}
	}

	public function DashTaxbase(){
		if (!empty($_GET)) {
			if ($_GET['page'] == "main") {
				$this->log(2,'Telah Mengakses Menu Dashboard > Dashboard Taxbase');
				return view('Dashboard/DashTaxbase');
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
					'icon' => 'fal fa-analyticsPT ',
					'title' => 'DASHBOARD TAXBASE',
					'detail' => 'IMPOR UNTUK DIPAKAI'
				];
				$info = [
					'main' => 'Cadas',
					'sub' => 'Dashboard',
					'active' => 'Taxbase',
					'date' => $date,
					'subheader' => $subheader
				];

				return json_encode($info);
			}
		}
	}
}