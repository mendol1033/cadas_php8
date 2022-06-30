<?php 
namespace App\Controllers;

use App\Models\NibModel;

class Nib extends BaseController
{

	public function __construct($param = null)
	{
		$this->model = new NibModel();
	}

	public function index()
	{

	}

	public function inputNib(){
		if (!empty($_GET)) {
			if ($_GET['page'] == "main") {
				$this->log(2,'Telah Mengakses Menu Nib > Input Data NIB');
				return view('Nib/InputNib');
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
					'title' => 'Input Data NIB',
					'detail' => 'Form Input Data NIB Perusahaan'
				];
				$info = [
					'main' => 'Cadas',
					'sub' => 'Nib',
					'active' => 'Input Data Nib',
					'date' => $date,
					'subheader' => $subheader
				];

				return json_encode($info);
			}
		}
	}

	public function getKbli(){
		if (!empty($_GET)) {
			$data = $this->model->getKodeKbli($_GET['kode'], array('KODE_KBLI','KATEGORI_KBLI'));
			echo json_encode($data);
		}
	}

	public function addNib(){
		if (!empty($_POST && !empty($_FILES))) {
			$status = $this->model->addNib();
			if ( $status === TRUE) {
				$data = [
					'status' => 'success',
					'pesan' =>"Data NIB telah berhasil ditambahkan"
				];
				$this->log(2,"Berhasil Menambah Data Nib Nomor ".$_POST['noNib']."a/n".$_POST['namaPerusahaan']);
			} elseif ($status === FALSE) {
				$data = [
					'status' => 'failed',
					'pesan' => "Data NIB gagal ditambahkan"
				];
				$this->log(2,"Gagal Menambah Data NIB");
			} else {
				$data = [
					'status' => 'failed',
					'pesan' => "Data NIB gagal ditambahkan, ".$status
				];
				$this->log(2,"Gagal Menambah Data NIB, ".$status);
			}
			echo json_encode($data);
		}
	}

	public function getNpwp(){
		if (!empty($_GET)) {
			$data = $this->model->getNpwp($_GET['nama'], array('NPWP','NAMA_PERUSAHAAN'));
			echo json_encode($data);
		}
	}
}