<?php namespace App\Models;

use CodeIgniter\Model;

class AtensiModel extends Model{

	public function __construct(){
		$this->cadas = \Config\Database::connect('cadas');
		$this->dbpib = \Config\Database::connect('dbpib');
	}

	public function postAtensi(){
		$this->dbpib->transStart();

		$data = [
			'NPWP' => $_POST['npwp'],
			'NAMA_PERUSAHAAN'=> $_POST['namaPerusahaan'],
			'NO_CONTAINER' => $_POST['container'],
			'TANGGAL_ATENSI' => $_POST['tanggal']
		];

		$this->dbpib->table('ATENSI')->insert($data);

		if ($this->dbpib->transStatus() === FALSE) {
			$this->dbpib->transRollback();
			return FALSE;
		} else {
			$this->dbpib->transCommit();
			return TRUE;
		}
	}

	public function getDataCdp($container){
		$query = $this->dbpib->table('CDP_ACTIVITY');
		$query->where('NOMOR_CONTAINER', $container);
		$data = $query->get()->getResultArray();

		if (count($data) > 1) {
			$result = $data[count($data)-1];
		} elseif (count($data) == 0){
			$result = NULL;
		} else {
			$result = $data[0];
		}

		return $result;
	}

	public function getDataCeisa($bl){
		$query = $this->dbpib->table('PIB_DOKAP');
		// $query->where('KODE_DOK', '704');
		// $query->orWhere('KODE_DOK', '705');
		$query->where('NOMOR_DOK', $bl);

		$data = $query->get()->getResultArray();
		if (count($data) > 0 ) {
			return $data[0];
		} else {
			return "Data Tidak Ditemukan";
		}

		
	}

	public function getStatusCeisa($nopen, $tgl){
		$query = $this->dbpib->table('PIB_STATUS');;
		$query->where('NO_PIB', $nopen);
		$query->where('TGL_PIB', $tgl);
		$query->orderBy('WAKTU_MULAI', 'ASC');

		$data = $query->get()->getResultArray();

		return $data[count($data)-1];
	}

}