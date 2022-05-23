<?php 
namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
	protected $table      = 'MenuModel';
	protected $primaryKey = 'id';

	protected $returnType = 'array';
	protected $useSoftDeletes = true;

	protected $allowedFields = [];

	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';

	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = false;

	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->db = \Config\Database::connect();
	}

	public function getMenu(){
		$menu = [];

		$dashboard = [
			'appCode' => 0,
			'appTitle' => 'Dashboard',
			'link' => '#',
			'appIcon' =>'fal fa-tachometer-alt-fast' ,
			'subMenu' => [
				[
					'title' => 'Dashboard Umum',
					'link' => '#',
					'grup' => 0
				]
			]
		];

		$informasi= [
			'appCode' => 2,
			'appTitle' => 'informasi',
			'link' => '#',
			'appIcon' =>'fal fa-tachometer-alt-fast' ,
			'subMenu' => [
				[
					'title' => 'Dashboard Umum',
					'link' => '#',
					'grup' => 0
				]
			]
		];

		$kk = [
			'appCode' => 3,
			'appTitle' => 'Kepala Kantor',
			'link' => '#',
			'appIcon' =>'fal fa-tachometer-alt-fast' ,
			'subMenu' => [
				[
					'title' => 'Dashboard Umum',
					'link' => '#',
					'grup' => 0
				]
			]
		];

		$sbu= [
			'appCode' => 4,
			'appTitle' => 'Sub Bagian Umum',
			'link' => '#',
			'appIcon' =>'fal fa-tachometer-alt-fast' ,
			'subMenu' => [
				[
					'title' => 'Dashboard Umum',
					'link' => '#',
					'grup' => 0
				]
			]
		];

		$p2 = [
			'appCode' => 5,
			'appTitle' => 'Penindakan dan Penyidikan',
			'link' => 'Peloro',
			'appIcon' =>'fal fa-tachometer-alt-fast' ,
			'subMenu' => [
				[
					'title' => 'Monitoring Kegiatan Subkontrak',
					'link' => 'Monitoring/subkon',
					'grup' => 0
				]
			]
		];

		$pkc = [
			'appCode' => 6,
			'appTitle' => 'Pelayanan Kepabeanan dan Cukai',
			'link' => 'Pkc',
			'appIcon' =>'fal fa-tachometer-alt-fast' ,
			'subMenu' => [
				[
					'title' => 'Dashboard Umum',
					'link' => '#',
					'grup' => 0
				]
			]
		];

		$perben = [
			'appCode' => 7,
			'appTitle' => 'Perbendaharaan',
			'link' => '#',
			'appIcon' =>'fal fa-tachometer-alt-fast' ,
			'subMenu' => [
				[
					'title' => 'Dashboard Umum',
					'link' => '#',
					'grup' => 0
				]
			]
		];

		$pli = [
			'appCode' => 8,
			'appTitle' => 'Penyuluhan dan Layanan informasi',
			'link' => '#',
			'appIcon' =>'fal fa-tachometer-alt-fast' ,
			'subMenu' => [
				[
					'title' => 'Dashboard Umum',
					'link' => '#',
					'grup' => 0
				]
			]
		];

		$manifes = [
			'appCode' => 9,
			'appTitle' => 'Manifes',
			'link' => '#',
			'appIcon' =>'fal fa-tachometer-alt-fast' ,
			'subMenu' => [
				[
					'title' => 'Dashboard Umum',
					'link' => '#',
					'grup' => 0
				]
			]
		];

		$ki = [
			'appCode' => 10,
			'appTitle' => 'Kepatuhan Internal',
			'link' => 'ki',
			'appIcon' =>'fal fa-tachometer-alt-fast' ,
			'subMenu' => [
				[
					'title' => 'Dashboard Umum',
					'link' => '#',
					'grup' => 0
				]
			]
		];

		$pdad = [
			'appCode' => 11,
			'appTitle' => 'Pengolahan Data dan Administrasi Dokumen',
			'link' => '#',
			'appIcon' =>'fal fa-tachometer-alt-fast' ,
			'subMenu' => [
				[
					'title' => 'Dashboard Umum',
					'link' => '#',
					'grup' => 0
				]
			]
		];

		$hanggar = [
			'appCode' => 12,
			'appTitle' => 'hanggar',
			'link' => 'hanggar',
			'appIcon' =>'fal fa-tachometer-alt-fast' ,
			'subMenu' => [
				[
					'title' => 'Dashboard Umum',
					'link' => '#',
					'grup' => 0
				]
			]
		];

		$ppbkb = [
			'appCode' => 13,
			'appTitle' => 'DOKUMEN PPB-KB',
			'link' => 'Ppbkb',
			'appIcon' =>'fal fa-file-searh' ,
			'subMenu' => [
				[
					'title' => 'Dashboard Umum',
					'link' => '#',
					'grup' => 0
				]
			]
		];

		$menu[0] = $dashboard;
		$menu[2] = $informasi;
		$menu[3] = $kk;
		$menu[4] = $sbu;
		$menu[5] = $p2;
		$menu[6] = $pkc;
		$menu[7] = $perben;
		$menu[8] = $pli;
		$menu[9] = $manifes;
		$menu[10] = $ki;
		$menu[11] = $pdad;
		$menu[12] = $hanggar;
		// $menu[13] = $ppbkb;

		return $menu;
	}

	public function getAdminMenu(){
		$builder = $this->db->table('tbgrupakses');
		$builder->where('IdUser',$_SESSION['IdUser']);
		$builder->where('IdHakAkses',1);
		if ($builder->countAllResults() === 1) {
			$menu = [];

			$pdad = [
				'appTitle' => 'Updating Database',
				'link' => 'javascript:void(0)',
				'appIcon' => 'fal fa-database',
				'subMenu' => [
					[
						'title' => 'Input Data NIB',
						'link' => 'Nib/inputNib'
					],
					[
						'title' => 'Approval Data NIB',
						'link' => 'Nib/approveNib'
					]
				]
			];

			$p2 = [
				'appTitle' => 'Penindakan dan Penyidikan',
				'link' => 'javascript:void(0)',
				'appIcon' => 'fal fa-user-secret',
				'subMenu' => [
					[
						'title' => 'Upload Data Dokumen',
						'link' => 'Dokumen/uploadDokumen'
					],
					[
						'title' => 'Monitoring Data Terupload',
						'link' => 'Dokumen/monitoringUpload'
					]
				]
			];

			$gocik = [
				'appTitle' => 'Integrasi Gocik',
				'link' => 'javascript:void(0)',
				'appIcon' => 'fal fa-exchange',
				'subMenu' => [
					[
						'title'	=> 'Upload Data IT Inventory',
						'link'	=> 'ItInventory/upload'
					]
				]
			];

			switch ($_SESSION['GrupMenu']) {
				case 11:
					$menu = [$pdad];
					break;
				
				default:
					$menu = [$pdad,$p2, $gocik];
					break;
			}

			return $menu;	
		}
	}

	public function getExtMenu(){
		$menu = [];

		$dashboard = [
			'appCode' => 0,
			'appTitle' => 'Dashboard',
			'link' => '#',
			'appIcon' =>'fal fa-tachometer-alt-fast' ,
			'subMenu' => [
				[
					'title' => 'Dashboard Umum',
					'link' => '#',
					'grup' => 0
				]
			]
		];

		$informasi= [
			'appCode' => 2,
			'appTitle' => 'informasi',
			'link' => '#',
			'appIcon' =>'fal fa-tachometer-alt-fast' ,
			'subMenu' => [
				[
					'title' => 'Dashboard Umum',
					'link' => '#',
					'grup' => 0
				]
			]
		];



		$menu[0] = $dashboard;
		$menu[2] = $informasi;



		return $menu;
	}

}