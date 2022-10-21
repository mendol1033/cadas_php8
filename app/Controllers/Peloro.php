<?php
namespace App\Controllers;

class Peloro extends BaseController
{
	public function index()
	{
		$this->data['menu']  = $this->getMenu();
		$this->data['title'] = 'CADAS WebApp';
		return view('Peloro/Index', $this->data);
	}

	public function getMenu()
	{
		$menu = [];

		$dashboard = [
			'appCode'  => 0,
			'appTitle' => 'Dashboard',
			'link'     => '#',
			'appIcon'  => 'fal fa-tachometer-alt-fast',
			'subMenu'  => [
				[
					'title' => 'Dashboard Penerimaan',
					'link'  => 'dashboard/DashImpor',
				],
				[
					'title' => 'Dashboard Taxbase',
					'link'  => 'dashboard/DashTaxbase',
				],
			],
		];

		$stakholders = [
			'appCode'  => 1,
			'appTitle' => 'Data Stakeholders',
			'link'     => '#',
			'appIcon'  => 'fal fa-city',
			'subMenu'  => [
				[
					'title' => 'Semua Perusahaan',
					'link'  => 'Stakeholders?jenisTPB=0',
				],
				[
					'title' => 'Gudang Berikat',
					'link'  => 'Stakeholders?jenisTPB=2',
				],
				[
					'title' => 'Kawasan Berikat',
					'link'  => 'Stakeholders?jenisTPB=1',
				],
				[
					'title' => 'Pusat Logistik Berikat',
					'link'  => 'Stakeholders?jenisTPB=10',
				],
				[
					'title' => 'Tempat Penimbunan Sementara',
					'link'  => 'Stakeholders?jenisTPB=15',
				],
				[
					'title' => 'Pengusaha Barang Kena Cukai',
					'link'  => 'Stakeholders?jenisTPB=16',
				],
				[
					'title' => 'Pameran Berikat',
					'link'  => 'Stakeholders?jenisTPB=17',
				],
				[
					'title' => 'Toko Bebas Bea',
					'link'  => 'Stakeholders?jenisTPB=18',
				],
				[
					'title' => 'Tempat Lelang Berikat',
					'link'  => 'Stakeholders?jenisTPB=19',
				],
				[
					'title' => 'Kawasan Daur Ulang Berikat',
					'link'  => 'Stakeholders?jenisTPB=20',
				],
			],
		];

		$monitoring = [
			'appCode'  => 2,
			'appTitle' => 'Monitoring',
			'link'     => '#',
			'appIcon'  => 'fal fa-file-search',
			'subMenu'  => [
				[
					'title' => 'Monitoring Umum TPB',
					'link'  => 'Monitoring/umum',
					'grup'  => 0,
				],
				[
					'title' => 'Monitoring Kegiatan Subkontrak',
					'link'  => 'Monitoring/subkon',
					'grup'  => 0,
				],
				[
					'title' => 'Monitoring Akses CCTV/IT/E-Seal',
					'link'  => 'Monitoring/akses',
					'grup'  => 0,
				],
				[
					'title' => 'Logbook Monitoring',
					'link'  => 'Monitoring/logbook',
					'grup'  => 0,
				],
			],
		];

		$akses = [
			'appCode'  => 3,
			'appTitle' => 'Database Akses',
			'link'     => '#',
			'appIcon'  => 'fal fa-server',
			'subMenu'  => [
				[
					'title' => 'Input Data Akses',
					'link'  => 'Akses/Index?akses=0',
				],
				[
					'title' => 'CCTV',
					'link'  => 'Akses/Index?akses=1',
				],
				[
					'title' => 'IT Inventory',
					'link'  => 'Akses/Index?akses=2',
				],
				[
					'title' => 'E-SEAL',
					'link'  => 'Akses/Index?akses=3',
				],
			],
		];

		$profil = [
			'appCode'  => 4,
			'appTitle' => 'Database Profil TPB',
			'link'     => '#',
			'appIcon'  => 'fal fa-server',
			'subMenu'  => [
				[
					'title' => 'Input Data Profil',
					'link'  => 'profil/input',
				],
			],
		];

		$administrasi = [
			'appCode'  => 5,
			'appTitle' => 'Administrasi',
			'link'     => '#',
			'appIcon'  => 'fal fa-file-check',
			'subMenu'  => [
				[
					'title' => 'Intelijen',
					'link'  => 'administrasi/intelijen',
				],
			],
		];

		$atensi = [
			'appCode'  => 6,
			'appTitle' => 'Atensi',
			'link'     => '#',
			'appIcon'  => 'fal fa-file-check',
			'subMenu'  => [
				[
					'title' => 'Impor',
					'link'  => 'atensi/impor',
				],
				[
					'title' => 'Fasilitas',
					'link'  => 'atensi/fasilitas',
				],
			],
		];

		$menu = [
			$dashboard,
			$stakholders,
			$monitoring,
			$akses,
			$profil,
			$administrasi,
			$atensi
		];

		return $menu;
	}
}
