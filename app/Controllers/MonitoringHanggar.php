<?php 
namespace App\Controllers;

use App\Models\AksesModel;
use App\Models\StakeholdersModel;
use App\Models\MonitoringHanggarModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MonitoringHanggar extends BaseController{
	
	public function __construct()
	{
		$this->akses = new AksesModel();
		$this->model = new StakeholdersModel();
		$this->monev = new MonitoringHanggarModel();
		helper('url');
	}
	
	public function index()
	{
		
	}

	public function Umum(){
		if (!empty($_GET)) {
			$this->data['tableTitle'] = 'DATA LAPORAN MONITORING UMUM';
			if ($_GET['page'] == "main") {
				if ($_SESSION['IdHanggar'] != 0 || $_SESSION['IdHanggar'] != NULL) {
					$this->data['type'] = "hanggar";
				} else {
					$this->data['type'] = "seksi";
				}
				$this->log(2,'Telah Mengakses Menu Monitoring Hanggar > Monitoring Umum');
				if ($_SESSION['GrupMenu'] == 1 || $_SESSION['GrupMenu'] == 6 || $_SESSION['GrupMenu'] == 12) {
					return view('Hanggar/Monitoring/Umum', $this->data);
				} else {
					return view('errors/html/error_403');
				}
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
					'title' => 'Monitoring Umum',
					'detail' => 'Laporan Monitoring Umum'
				];
				$info = [
					'main' => 'Cadas',
					'sub' => 'Pelayanan Kepabeanan dan Cukai',
					'active' => 'Laporan Monitoring Umum',
					'date' => $date,
					'subheader' => $subheader
				];
				
				return json_encode($info);
			}
		}
	}

	public function Arsip(){
		if (!empty($_GET)) {
			$this->data['tableTitle'] = 'DATA LAPORAN MONITORING UMUM';
			if ($_GET['page'] == "main") {
				$this->log(2,'Telah Mengakses Menu Monitoring Hanggar > Arsip Laporan');
				return view('Hanggar/Monitoring/Arsip', $this->data);
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
					'title' => 'Monitoring Umum',
					'detail' => 'Laporan Monitoring Umum'
				];
				$info = [
					'main' => 'Cadas',
					'sub' => 'Pelayanan Kepabeanan dan Cukai',
					'active' => 'Laporan Monitoring Umum',
					'date' => $date,
					'subheader' => $subheader
				];
				
				return json_encode($info);
			}
		}
	}
	
	// DataTable Section
	public function datatableList(){
		//start datatable
		
		$basisData = 'kuisioner';
		$tabel = 'master_detail';
		$order = ['ID', 'NPWP_PERUSAHAAN', 'NAMA_PERUSAHAAN', 'NAMA_LENGKAP_PENGISI', 'JABATAN_PENGISI', 'STATUS'];
		$search = ['NPWP', 'NAMA_PERUSAHAAN', 'STATUS'];
		$sort = ['ID' => 'asc'];
		$filter = [];
		
		$list = $this->datatable->GetDataTable($basisData, $tabel, $order, $search, $sort, $filter);
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $ListData) {
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $ListData->NPWP_PERUSAHAAN;
			$row[] = strtoupper($ListData->NAMA_PERUSAHAAN);
			$row[] = $ListData->TANGGAL_REKAM;
			$row[] = $ListData->NAMA_LENGKAP_PENGISI;
			$row[] = $ListData->JABATAN_PENGISI;
			$row[] = $ListData->ID;
			
			$data[] = $row;
		}
		
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->datatable->count_all($filter),
			"recordsFiltered" => $this->datatable->count_filtered($filter),
			"data" => $data,
		);
		
		echo json_encode($output);
	}

	public function datatableList_Monum(){
		//start datatable
		
		$basisData = 'monev';
		$tabel = 'monev_hanggar_detail';
		$order = ['id', 'NPWP', 'nama_perusahaan', 'alamat', 'tanggalLaporan', 'status', NULL];
		$search = ['NPWP', 'nama_perusahaan', 'status'];
		$sort = ['id' => 'asc'];
		$filter = [];

		if ($_SESSION['GrupMenu'] == 1 || $_SESSION['GrupMenu'] == 6) {
			if (array_search(1,$_SESSION['hakAkses']) != FALSE) {
				$filter = [];
			} else {
				
			}
		} else {
			$filter['list']['IdHanggar'] = $_SESSION['IdHanggar'];
			$filter['countFilter']['IdHanggar'] = $_SESSION['IdHanggar'];
			$filter['countAll']['IdHanggar'] = $_SESSION['IdHanggar'];
		}

		switch ($_POST['type']) {
			case 'main':
				$filter['list']['flag'] = 0;
				$filter['countFilter']['flag'] = 0;
				$filter['countAll']['flag'] = 0;
				break;
			case 'seksi' || 'arsip':
				$filter['list']['flag'] = 1;
				$filter['countFilter']['flag'] = 1;
				$filter['countAll']['flag'] = 1;
			default:
				// code...
				break;
		}
		
		$list = $this->datatable->GetDataTable($basisData, $tabel, $order, $search, $sort, $filter);
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $ListData) {
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $ListData->NPWP;
			$row[] = strtoupper($ListData->nama_perusahaan);
			$row[] = $ListData->alamat;
			$row[] = $ListData->tanggalLaporan;
			$row[] = $ListData->status;
			$row[] = $ListData->id;
			
			$data[] = $row;
		}
		
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->datatable->count_all($filter),
			"recordsFiltered" => $this->datatable->count_filtered($filter),
			"data" => $data,
		);
		
		echo json_encode($output);
	}

	// DataTable Section


	// GET DATA SECTION
	public function getPerusahaan() {
		$column = array('id_perusahaan', 'nama_perusahaan', 'nama_tpb', 'ijin_kelola_tpb');
		$data = $this->monev->getTPB($_GET['nama'], $column);

		echo json_encode($data);
	}
	// GET DATA SECTION
}