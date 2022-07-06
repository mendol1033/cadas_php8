<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\KuisionerModel;

class Kuisioner extends Controller
{

	public function __construct($param = null)
	{
		$this->session = \Config\Services::session();
		$this->kuisioner = new KuisionerModel();
		$this->base_url = 'http://'.$_SERVER['HTTP_HOST'];
		$this->redirect = "Location: ".$this->base_url."/";
		$this->data['base_url'] = $this->base_url;
	}

	public function index()
	{	
		$this->data['title'] = 'Kuisioner KPPBC TMP Cikarang';
		return view('Kuisioner.php', $this->data);
	}

	public function dampakEkonomi(){
		if (!empty($_GET)) {
			if ($_GET['page'] == "main") {
				// $this->log(2,'Telah Mengakses Menu Admin Penindadakn dan Penyidikan > Upload Data Dokumen');
				return view('Kuisioner/DampakEkonomi');
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
					'title' => 'Kuisioner',
					'detail' => 'Dampak Ekonomi'
				];
				$info = [
					'main' => 'Cadas',
					'sub' => 'Kuisioner',
					'active' => 'Dampak Ekonomi',
					'date' => $date,
					'subheader' => $subheader
				];

				return json_encode($info);
			}
		}
	}

	public function lapkeu(){
		if (!empty($_GET)) {
			if ($_GET['page'] == "main") {
				// $this->log(2,'Telah Mengakses Menu Admin Penindadakn dan Penyidikan > Upload Data Dokumen');
				return view('Kuisioner/lapkeu');
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
					'title' => 'Kuisioner',
					'detail' => 'Laporan Keuangan/Tahunan Perusahaan'
				];
				$info = [
					'main' => 'Cadas',
					'sub' => 'Kuisioner',
					'active' => 'Laporan Keuangan/Tahunan Perusahaan',
					'date' => $date,
					'subheader' => $subheader
				];

				return json_encode($info);
			}
		}
	}

	public function suksesPage(){
		if (!empty($_GET)) {
			if ($_GET['page'] == "main") {
				// $this->log(2,'Telah Mengakses Menu Admin Penindadakn dan Penyidikan > Upload Data Dokumen');
				return view('Kuisioner/SuksesPage');
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
					'title' => 'Kuisioner',
					'detail' => 'Dampak Ekonomi'
				];
				$info = [
					'main' => 'Cadas',
					'sub' => 'Kuisioner',
					'active' => 'Dampak Ekonomi',
					'date' => $date,
					'subheader' => $subheader
				];

				return json_encode($info);
			}
		}
	}

	public function submitKuisioner(){
		if (!empty($_POST)) {
			// $uploadPath = ROOTPATH."public/assets/uploads/image";
			// $link = 'assets/uploads/image/';
			// foreach ($_FILES as $key => $value) {
			// 	$name = basename($value['name']);
			// 	$fileData = [];
			// 	if (move_uploaded_file($value['tmp_name'], $uploadPath."/".date('Y-m-d')."_".$name)) {
			// 		$fileData[] = [
			// 			'ID_MASTER' => $ID_MASTER,
			// 			'NAMA_FOTO' => $name,
			// 			'PATH_FOTO' => $uploadPath."/".$name,
			// 			'LINK_FOTO' => $link.$name
			// 		];
			// 	} else {
			// 		$statusUpload = "Kuisioner Gagal Disubmit, Error Upload File";

			// 		echo json_encode(['status' => 'Gagal', 'pesan' => $statusUpload]);
			// 		exit;
			// 	}

			// 	$status = $this->kuisioner->submitKuisioner($fileData);
			// 	exit;
			// }

			// if ($status == "sukses") {
			// 	$pesan = "Kuisioner Berhasil Di Submit, Data Sudah Kami Terima";
			// } else {
			// 	$pesan = "Kuisioner Gagal Di Submit, Harap Hubungi Administrator";
			// }

			// echo json_encode(['status' => $status, 'pesan' => $pesan]);

			echo json_encode([$_POST, $_FILES]);
		}
	}

	public function getOption(){
		if (!empty($_GET)) {
			$data = array(
				'data' => array(),
				'post' => $_GET['search']
			);

			echo json_encode($data);	
		}
	}

	public function getOptionNegara(){
		if (!empty($_GET)) {
			$data =$this->kuisioner->getNegara();

			echo json_encode($data);	
		}
	}

	public function getRefKantor() {
		$data = $this->kuisioner->getRefKantor();

		echo json_encode($data);
	}

	public function getProvinsi() {
		$data = $this->kuisioner->getProvinsi($_GET['nama']);

		echo json_encode($data);
	}

	public function getKabupaten() {
		if (!empty($_GET['provinsi'])) {
			$data = $this->kuisioner->getKabupaten($_GET['provinsi'], $_GET['nama']);
		} else {
			$data = "Pilih Provinsi Terlebih Dahulu";
		}
		echo json_encode($data);
	}

	public function getKecamatan() {
		if (!empty($_GET['kabupaten'])) {
			$data = $this->kuisioner->getKecamatan($_GET['kabupaten'], $_GET['nama']);
		} else {
			$data = "Pilih Kota/Kabupaten Terlebih Dahulu";
		}
		echo json_encode($data);
	}

	public function getKelurahan() {
		if (!empty($_GET['kecamatan'])) {
			$data = $this->kuisioner->getKelurahan($_GET['kecamatan'], $_GET['nama']);
		} else {
			$data = "Pilih Kecamatan Terlebih Dahulu";
		}
		echo json_encode($data);
	}

	// LAPKEU SECTION
	public function getFormLapkeu(){
		if ($_GET['data'] === "Stakeholders") {
			$data = $this->kuisioner->getLapkeuField();
			echo json_encode($data);
		} else {
			
		}
	}

	public function addLapkeu(){
		if (!empty($_POST)) {
			$status = $this->kuisioner->addLapkeu();
			if ($status === "success") {
				// $this->log(3, 'Berhasil Merubah Data Akses '.$akses);
				$pesan = 'Data Laporan Keuangan Berhasil Direkam';
			} else {
				// $this->log(3, 'Gagal Menambah Data Akses '.$akses);
				$pesan = 'Data Laporan Keuangan Gagal Direkam';
			}

			echo json_encode(['status' => $status, 'pesan' => $pesan]);
		}
	}
}