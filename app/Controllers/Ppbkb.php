<?php 
namespace App\Controllers;

Use \App\Models\Ppbkb_model;
Use \App\Models\PegawaiModel;

class Ppbkb extends BaseController
{

	public function __construct()
	{
		$this->model = new Ppbkb_model();
		$this->pegawai = new PegawaiModel();
	}

	public function index()
	{
		$this->data['menu'] = $this->getMenu();
		$this->data['title'] = "CADAS WebApp";
		$this->data['initialView'] = view('Ppbkb/Dashboard');
		return view("Ppbkb/Index",$this->data);
	}

	public function getMenu(){
		$menu = [];

		$dashboard = [
			'appCode' => 13,
			'aksesCode' => [1,3,5,6,11,12],
			'appTitle' => 'Dashboard',
			'link' => 'Ppbkb/Dashboard',
			'appIcon' =>'fal fa-tachometer-alt-fast'
		];

		$browse = [
			'appCode' => 13,
			'aksesCode' => [1,3,5,6,11,12],
			'appTitle' => 'Browse Dokumen',
			'link' => 'Ppbkb/Browse',
			'appIcon' =>'fal fa-file-search' 	
		];

		$gate = [
			'appCode' => 13,
			'aksesCode' => [12],
			'appTitle' => 'Gate',
			'link' => '#',
			'appIcon' =>'fal fa-file-search',
			'subMenu' => [
				[
					'aksesCode' => 12,
					'title' =>'Stuffing',
					'link' => 'Ppbkb/stuffing',
				],
				[
					'aksesCode' => 12,
					'title' =>'Gate Out',
					'link' => 'Ppbkb/gate_out',
				],
				[
					'aksesCode' => 12,
					'title' =>'Gate In',
					'link' => 'Ppbkb/gate_in',
				],
				[
					'aksesCode' => 12,
					'title' =>'Pembongkaran',
					'link' => 'Ppbkb/bongkar',
				]
			]
		];

		$laporan = [
			'appCode' => 13,
			'aksesCode' => [1,3,5,6,11,12],
			'appTitle' => 'Laporan',
			'link' => '#',
			'appIcon' =>'fal fa-file-chart-line'
		];

		$settingHakAksesUser = [
			'appCode' => 13,
			'aksesCode' => 1,
			'appTitle' => 'Administrator',
			'link' => '#',
			'appIcon' =>'fal fa-user-secret',
			'subMenu' => [
				[
					'aksesCode' => 1,
					'title' =>'Create User TPB',
					'link' => 'Ppbkb/createUser',
				],
				[
					'aksesCode' => 1,
					'title' =>'Tambah Gudang Tidak Dalam Satu Hamparan',
					'link' => 'Ppbkb/addGudang',
				],
			]
		];

		$menu = [$dashboard, $browse, $gate, $laporan];
		$adminMenu = [$settingHakAksesUser];

		return ['menu'=>$menu, 'admin' => $adminMenu];
	}

	public function Browse(){
		if (!empty($_GET)) {
			if ($_GET['page'] == "main") {
				$this->data['tableTitle'] = 'BROWSE DOKUMEN PPB-KB';
				$this->data['hanggar'] = $this->pegawai->getListHanggar();
				$this->log(2,'Telah Mengakses Aplikasi PPB-KB > Menu Browse Dokumen');
				return view('Ppbkb/Browse', $this->data);
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
					'icon' => "",
					'title' => '  ',
					'detail' => ''
				];

				$info = [
					'main' => 'Cadas',
					'sub' => 'PPB-KB',
					'active' => 'Browse Dokumen',
					'date' => $date,
					'subheader' => $subheader
				];

				return json_encode($info);
			}
		}
	}
}