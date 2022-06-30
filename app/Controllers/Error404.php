<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Error404 extends Controller
{
	public function index()
	{
		if (!empty($_GET)) {
			if ($_GET['page'] == "main") {
				return view('Error404');
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