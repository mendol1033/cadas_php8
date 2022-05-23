<?php 
namespace App\Controllers;

use App\Models\AksesModel;
use App\Models\StakeholdersModel;

class Akses extends BaseController
{

	public function __construct()
	{
		$this->akses = new AksesModel();
		$this->model = new StakeholdersModel();
	}

	public function index()
	{	
		switch ($_GET['akses']) {
			case '1':
			$this->data['akses'] = 'DATA AKSES CCTV';
			$this->data['tableTitle'] = 'DATA AKSES CCTV';
			$this->data['tipeAkses'] = 1;
			break;
			case '2':
			$this->data['akses'] = 'DATA AKSES IT INVENTORY';
			$this->data['tableTitle'] = 'DATA AKSES IT INVENTORY';
			$this->data['tipeAkses'] = 2;
			break;
			case '3':
			$this->data['akses'] = 'DATA AKSES E-SEAL';
			$this->data['tableTitle'] = 'DATA AKSES E-SEAL';
			$this->data['tipeAkses'] = 3;
			break;
			default:
			$this->data['akses'] = 'INPUT DATA AKSES';
			break;
		}

		switch ($_GET['akses']) {
			case '0':
			$view = 'Akses/Index';
			$icon = 'fal fa-edit';
			break;
			default:
			$view = 'Akses/Akses';
			$icon = 'fal fa-list';
			break;
		}

		if ($_GET['page'] == "main") {
			$options = array();
			$referensiFasTPB = $this->model->getReferensi("Fasilitas");
			$fasTPB[0] = "--Pilih Jenis Fasilitas TPB--";
			foreach ($referensiFasTPB as $key => $value) {
				$fasTPB[$value['IdReferensi']] = $value['NmReferensi']; 
			}
			$options['fasTPB'] = $fasTPB;
			$this->data['akses'] = $_GET['akses'];
			$this->data['options'] = $options;
			$this->log(2,'Telah Mengakses Menu Penindakan dan Penyidikan > Menu Akses '.$this->data['akses']);
			return view($view,$this->data);
		} else {
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
				'icon' => $icon,
				'title' => '  '.$this->data['akses'],
				'detail' => ''
			];
			$info = [
				'main' => 'Cadas',
				'sub' => 'Akses',
				'active' => $this->data['akses'],
				'date' => $date,
				'subheader' => $subheader
			];

			return json_encode($info);

		}
	}

	public function getReferensi(){
		if (isset($_GET['column']) && isset($_GET['jenis'])) {
			$data = $this->akses->getReferensi($_GET['column'], $_GET['jenis']);
			if (count($data) > 0) {
				echo json_encode(['data' => $data]);
			} else {
				echo json_encode(['data' => null, 'post' => $_GET['search'], 'get' => $_GET]);
			}
		} else {
			$data = $this->akses->getReferensi($_GET['column'], $_GET['jenis']);
		}
	}

	public function getAksesById(){
		$data = $this->akses->getAksesById();

		echo json_encode($data);
	}

	public function datatableList(){
		//start datatable

		$basisData = 'cadas';
		$tabel = 'tb_akses_detail';
		$order = [null, 'NPWP', 'NAMA_PERUSAHAAN', null, 'STATUS'];
		$search = ['NPWP', 'NAMA_PERUSAHAAN', 'STATUS'];
		$sort = ['NAMA_PERUSAHAAN' => 'asc'];
		$filter = [];
		if ($_POST['tipeAkses'] != 0) {
			$filter['list']['TIPE_AKSES'] = $_POST['tipeAkses'];
			$filter['countFilter']['TIPE_AKSES'] = $_POST['tipeAkses'];
			$filter['countAll']['TIPE_AKSES'] = $_POST['tipeAkses'];
		}

		$list = $this->datatable->GetDataTable($basisData, $tabel, $order, $search, $sort, $filter);
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $ListData) {

			if ($ListData->STATUS == "Y") {
				$STATUS = "AKTIF";
			} else {
				$STATUS = "TIDAK AKTIF";
			}

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $ListData->NPWP;
			$row[] = strtoupper($ListData->NAMA_PERUSAHAAN);
			$row[] = $ListData->PETUNJUK_AKSES;
			$row[] = $STATUS;
			$row[] = $ListData->ID_AKSES;

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

	public function ajaxAdd(){
		if (!empty($_POST)) {

			$status = $this->akses->addDataAkses();

			if ($status === 'success') {
				$this->log(3, 'Berhasil Menambah Data Akses CCTV, IT Inventory, dan/atau E-Seal');
				$pesan = 'Data Akses CCTV, IT Inventory, dan/atau E-Seal Berhasil Direkam';
			} else {
				$this->log(3, 'Gagal Menambah Data Akses CCTV, IT Inventory, dan/atau E-Seal');
				$pesan = 'Data Akses CCTV, IT Inventory, dan/atau E-Seal Berhasil Direkam';
			}

			echo json_encode(['status' => $status, 'pesan' => $pesan]);
		} else{
			echo json_encode('NO POST');
		}
	}

	public function UpdateAkses(){
		if (!empty($_POST)) {
			$status = $this->akses->updateDataAkses();

			switch ($_POST['tipe']) {
				case 1:
				$akses = 'CCTV';
				break;

				case 2:
				$akses = 'IT Inventory';
				break;
				
				default:
				$akses = 'E-Seal';
				break;
			}

			if ($status === 'success') {
				$this->log(3, 'Berhasil Merubah Data Akses '.$akses);
				$pesan = 'Data Akses '.$akses.' Berhasil Dirubah';
			} else {
				$this->log(3, 'Gagal Menambah Data Akses '.$akses);
				$pesan = 'Data Akses '.$akses.' Berhasil Dirubah';
			}

			echo json_encode(['status' => $status, 'pesan' => $pesan]);
		}

		// echo json_encode($_POST);
	}
}