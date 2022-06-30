<?php 
namespace App\Controllers;

use App\Models\KontrakKinerjaModel;

class Ki extends BaseController
{
	public function __construct()
	{
		$this->model = new KontrakKinerjaModel();
	}
	
	// PAGE FUNCTION
	
	public function index()
	{
		$this->data['title'] = "SiFilwa";
		return view("Ki/Index",$this->data);
	}
	
	public function KontrakKinerja(){
		if (!empty($_GET)) {
			if ($_GET['page'] == "main") {
				$this->log(2,'Telah Mengakses Menu Kepatuhan Internal > Kontrak Kinerja');
				return view('Ki/KontrakKinerja', $this->data);
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
				$info = [
					'main' => 'SiFilwa',
					'sub' => 'Kineja',
					'active' => 'Kontrak Kineja',
					'date' => $date,
				];
				
				return json_encode($info);
			}
		}
	}
	
	public function IkuBaru(){
		if (!empty($_GET)) {
			if ($_GET['page'] == "main") {
				$this->log(2,'Telah Mengakses Menu Admin Kepatuhan Internal > Input Iku Baru');
				return view('Ki/IkuBaru', $this->data);
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
				$info = [
					'main' => 'SiFilwa',
					'sub' => 'Kineja',
					'active' => 'Kontrak Kineja',
					'date' => $date,
				];
				
				return json_encode($info);
			}
		}
	}
	
	// LOAD FORM SECTION
	
	public function NewKontrak(){
		return view('Ki/FormKontrak', $this->data);
	}
	
	public function DetailKontrak(){
		return view('Ki/DetailKontrak', $this->data);
	}
	
	public function BuatIku(){
		return view('Ki/BuatIku', $this->data);
	}
	
	// SELECT FUNCTION
	
	public function getAllKontrak(){
		$data = $this->model->getAllKontrak();
		
		echo json_encode($data);
	}
	
	public function getKontrak(){
		if (!empty($_GET)) {
			$data = $this->model->getKontrak();
			
			echo json_encode($data);
		}
	}
	
	public function KontrakDetail(){
		if (!empty($_GET)) {
			$masterKontrak = $this->model->getKontrak();
			$dataIku = $this->model->getIku();
			
			switch ($masterKontrak['JENIS_KONTRAK']) {
				case "1":
					$masterKontrak['JENIS_SKP'] = 'KK Non Peta';
				break;
				case "2":
					$masterKontrak['JENIS_SKP'] = 'KK Peta';
				break;
				case "3":
					$masterKontrak['JENIS_SKP'] = 'SKP Tanpa KK';
				break;
				default:
				$masterKontrak['JENIS_SKP'] = 'Tugas Belajar';
			break;
		}
		
		switch ($masterKontrak['TIPE_KONTRAK']) {
			case "1":
				$masterKontrak['DETAIL_TIPE_KONTRAK'] = 'Pejabat Eselon I, II, III Pemilik Peta dan Fungsional Tertentu/Nonstruktural Setara Eselon II';
			break;
			case "2":
				$masterKontrak['DETAIL_TIPE_KONTRAK'] = 'Pejabat Eselon III Bukan Pemilik Peta, Nonstruktural Setara Eselon III';
			break;
			case "3":
				$masterKontrak['DETAIL_TIPE_KONTRAK'] = 'Pejabat Fungsional Tertentu Setara Eselon III';
			break;
			case "4":
				$masterKontrak['DETAIL_TIPE_KONTRAK'] = 'Pejabat Eselon IV/Nonstruktural Setara Eselon IV (1 Level di bawah PS)';
			break;
			case "5":
				$masterKontrak['DETAIL_TIPE_KONTRAK'] = 'Pejabat Fungsional Tertentu Setara Eselon IV';
			break;
			case "6":
				$masterKontrak['DETAIL_TIPE_KONTRAK'] = 'Pejabat Eselon IV/Nonstruktural Setara Eselon IV (2 Level di bawah PS)';	
			break;
			case "7":
				$masterKontrak['DETAIL_TIPE_KONTRAK'] = 'Pejabat Fungsional Tertentu Nonmanajerial';
			break;
			case "8":
				$masterKontrak['DETAIL_TIPE_KONTRAK'] = 'Fungsional Tertentu Setara Fungsional Umum / Pelaksana (Manajerial)';
			break;
			
			default:
			$masterKontrak['DETAIL_TIPE_KONTRAK'] = 'Pejabat Eselon V dan Fungsional Umum / Pelaksana';
		break;
	}
	
	echo json_encode([$masterKontrak, $dataIku]);
}
}

// CRUD FUNCTION

public function addKontrak(){
	if (!empty($_POST)) {
		
		$data = $this->model->addKontrak();
		$this->log(3,'Telah Membuat Kontrak Kinerja Baru');
		echo json_encode($data);
	}
}

public function editKontrak(){
	if (!empty($_GET)) {
		
	}
}

public function deleteKontrak(){
	if (!empty($_POST)) {
		$data = $this->model->deleteKontrak();
		if ( $data['status'] === 1) {
			$pesan = [1,'Kontrak Kinerja Berhasil Dihapus'];
			$this->log(5,'Telah Menghapus Kontrak Kinerja ID '.$data['kontrak']['ID_KONTRAK_KINERJA'].' Nomor '.$data['kontrak']['NOMOR_KONTRAK']);
		} else {
			$pesan = [2,'Kontrak Kinerja Gagal Dihapus'];
			$this->log(5,'Gagal Menghapus Kontrak Kinerja ID '.$data['kontrak']['ID_KONTRAK_KINERJA'].' Nomor '.$data['kontrak']['NOMOR_KONTRAK']);
		}
	}
	
	echo json_encode($pesan);
}

public function AddIku(){
	if (!empty($_POST['ID_IKU'])) {
		$pesan = 'Berhasil Update Data IKU';
	} else {
		$pesan = 'Berhasil Tambah Data IKU';
	}
	
	echo json_encode($pesan);
}
}