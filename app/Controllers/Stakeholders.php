<?php 
namespace App\Controllers;

use App\Models\StakeholdersModel;
use App\Models\AksesModel;
class Stakeholders extends BaseController
{

	public function __construct()
	{
		$this->model = new StakeholdersModel();
		$this->akses = new AksesModel();
	}

	public function index()
	{	
		switch ($_GET['jenisTPB']) {
			case 1:
			$this->data['tableTitle'] = 'Stakeholders Gudang Berikat';
			break;
			case 2:
			$this->data['tableTitle'] = 'Stakeholders Kawasan Berikat';
			break;
			case 3:
			$this->data['tableTitle'] = 'Stakeholders Pusat Logistik Berikat';
			break;
			case 4:
			$this->data['tableTitle'] = 'Stakeholders Tempat Penimbunan Sementara';
			break;
			case 5:
			$this->data['tableTitle'] = 'Stakeholders Pengusaha Kena Cukai';
			break;
			case 6:
			$this->data['tableTitle'] = 'Stakeholders Pameran Berikat';
			break;
			case 7:
			$this->data['tableTitle'] = 'Stakeholders Toko Bebas Bea';
			break;
			case 8:
			$this->data['tableTitle'] = 'Stakeholders Tempat Lelang Berikat';
			break;
			case 9:
			$this->data['tableTitle'] = 'Stakeholders Kawasan Daur Ulang Berikat';
			break;
			default:
			$this->data['tableTitle'] = 'Seluruh Stakeholders';
			break;
		}

		if ($_GET['page'] == "main") {
			$options = array();
			$referensiFasTPB = $this->model->getReferensi("Fasilitas");
			$fasTPB[0] = "--Pilih Jenis Fasilitas TPB";
			foreach ($referensiFasTPB as $key => $value) {
				$fasTPB[$value['IdReferensi']] = $value['NmReferensi']; 
			}

			// $referensiJnsTPB = $this->model->getReferensi("Jenis");
			// foreach ($referensiJnsTPB as $key => $value) {
			// 	$jenisTPB[$value['IdReferensi']] = $value['NmReferensi']; 
			// }

			$referensiProfil = $this->model->getReferensi("ProfilResiko");
			foreach ($referensiProfil as $key => $value) {
				$ProfilResiko[$value['IdReferensi']] = $value['NmReferensi']; 
			}

			$referensiLokasi = $this->model->getReferensi("Lokasi");
			foreach ($referensiLokasi as $key => $value) {
				$Lokasi[$value['IdReferensi']] = $value['NmReferensi']; 
			}

			$options['fasTPB'] = $fasTPB;
			// $options['jenisTPB'] = $jenisTPB;
			$options['ProfilResiko'] = $ProfilResiko;
			$options['Lokasi'] = $Lokasi;
			$this->data['options'] = $options;
			$this->data['jenisTPB'] = $_GET['jenisTPB'];
			$this->log(2,'Telah Mengakses Menu Penindakan dan Penyidikan > Data Seluruh Stakeholders');
			return view('Stakeholders/Index',$this->data);
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
				'icon' => 'fal fa-list',
				'title' => ' Data '.$this->data['tableTitle'],
				'detail' => ''
			];
			$info = [
				'main' => 'Cadas',
				'sub' => 'Stakeholders',
				'active' => $this->data['tableTitle'],
				'date' => $date,
				'subheader' => $subheader
			];

			return json_encode($info);
		}
		
	}

	public function getReferensi(){
		$jenis = $this->model->getReferensiById();
		$referensiJnsTPB = $this->model->getReferensiByNama($jenis['NmReferensi'], "IdReferensi, NmReferensi, DetailReferensi");

		echo json_encode($referensiJnsTPB);
	}

	public function datatableList(){
		//start datatable

		$basisData = 'cadas';
		$tabel = 'tb_stakeholders';
		$order = [null, 'NPWP', 'NAMA_PERUSAHAAN', 'FASILITAS', 'PROFIL_RESIKO', 'STATUS'];
		$search = ['NPWP', 'NAMA_PERUSAHAAN', 'FASILITAS', 'PROFIL_RESIKO', 'STATUS'];
		$sort = ['NAMA_PERUSAHAAN' => 'desc'];
		$filter = [];
		if ($_POST['jenisTPB'] != 0) {
			$filter['list']['FASILITAS'] = $_POST['jenisTPB'];
			$filter['countFilter']['FASILITAS'] = $_POST['jenisTPB'];
			$filter['countAll']['FASILITAS'] = $_POST['jenisTPB'];
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
			$row[] = $ListData->NO_SKEP.' / '.$ListData->TGL_SKEP;
			$row[] = $ListData->ALAMAT_PABRIK;
			$row[] = $STATUS;
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

	// GET DATA SECTION
	public function getNib(){
		if (isset($_GET['nama'])) {
			$data = $this->model->getListNib();
		} else {
			$data = $this->model->getNibById();
		}

		echo json_encode($data);
	}

	public function getStakeholders(){
		if (isset($_GET['nama'])) {
			$data = $this->model->getListStakeholders();

			echo json_encode($data);
		}
	}

	public function getStakeholdersById(){
		if (isset($_GET['ID'])) {
			$data = $this->model->getStakeholdersById();

			echo json_encode($data);
		}
	}

	public function getStakeholdersMonum() {
		$d = $this->model->getStakeholdersById();
		if ((int)$d['LOKASI'] === 1 ) {
			$lokasi = "DI DALAM KAWASAN INDUSTRI";
		} else {
			$lokasi = "DI LUAR KAWASAN INDUSTRI";
		}
		if ($d['STATUS'] === "Y") {
			$status = "AKTIF";
		} else {
			$status = "TIDAK AKTIF";
		}

		$akses = $this->akses->getAksesByStakeholders();

		$data = array();
		$data[] = array('desc' => "NPWP", 'data' => $d['NPWP']);
		$data[] = array('desc' => "Nama Perusahaan", 'data' => $d['NAMA_PERUSAHAAN']);
		// $data[] = array('desc' => "Telepon/Fax", 'data' => $d['TELEPON']."/".$d['fax']);
		$data[] = array('desc' => "Alamat", 'data' => strtoupper($d['ALAMAT_PABRIK']));
		$data[] = array('desc' => "Jenis TPB", 'data' => strtoupper($d['NAMA_FASILITAS']));
		$data[] = array('desc' => "SKEP Izin TPB", 'data' => $d['NO_SKEP']);
		$data[] = array('desc' => "Lokasi TPB", 'data' => $lokasi);
		$data[] = array('desc' => "Status", 'data' => $status);

		$echos = array(
			'umum' => $data,
			'cctv' => $akses['cctv'],
			'it' => $akses['it'],
			'eseal' => $akses['eseal']
		);

		echo json_encode($echos);
	}
	// GET DATA SECTION

	// CRUD SECTION
	public function ajaxAdd(){
		if (!empty($_POST)) {
			$status = $this->model->addStakholders();

			if ($status === 'success') {
				$this->log(3, "Telah Berhasil Menambah Data Stakeholders");
				$pesan = "Data Stakeholders Berhasil Ditambah";
			} else {
				$pesan = "Data Stakeholders Gagal Ditambah";
				$this->log(3, "Telah Gagal Menambah Data Stakeholders");
			}
		}
		echo json_encode(['status' => $status, 'pesan' => $pesan]);
	}

	public function ajaxEdit(){
		if (!empty($_POST)) {
			$status = $this->model->updateStakholders();

			if ($status === 'success') {
				$this->log(4, "Telah Mungubah Data Stakeholders PT. ".$_POST['namaPerusahaan']);
				$pesan = 'Data Stakeholders Telah Diubah';
			} else {
				$this->log(4, "Gagal Mungubah Data Stakeholders PT. ".$_POST['namaPerusahaan']);
				$pesan = 'Data Stakeholders Gagal Diubah';
			}
		}

		echo json_encode(['status' => $status, 'pesan' => $pesan]);
	}
	
	public function getById(){
		if(!empty($_GET)){
			$data = $this->model->getById();

			echo json_encode($data);
		}
	}
	// CRUD SECTION

	public function migrasiCadas(){
		$status = $this->model->migrasiData();

		print_r($status);
	}
}