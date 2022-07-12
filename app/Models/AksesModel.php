<?php 
namespace App\Models;

use CodeIgniter\Model;

class AksesModel extends Model
{
	protected $table      = 'tableName';
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
		$this->cadas = \Config\Database::connect('cadas');
	}

	public function getAksesById(){
		$builder = $this->cadas->table('tb_akses_detail');
		$builder->where('ID_AKSES',$_GET['ID']);

		return $builder->get()->getRowArray();
	}

	public function getAksesByStakeholders(){
		$akses = $this->cadas->table('tb_akses_detail')->where('ID_CADAS', $_GET['ID'])->orderBy('TIPE_AKSES', 'ASC')->get()->getResultArray();

		for ($i=0; $i < count($akses); $i++) { 
			switch ($akses[$i]['TIPE_AKSES']) {
				case '1':
					$data['cctv'] = $akses[$i];
					break;
				case '2':
					$data['it'] = $akses[$i];
					break;
				default:
					$data['eseal'] = $akses[$i];
					break;
			}
		}

		if (count($data) < 3) {
			if (!array_key_exists('eseal', $data)) {
				$data['eseal'] = NULL;
			}
			if (!array_key_exists('it', $data)) {
				$data['it'] = NULL;
			}
			if (!array_key_exists('cctv', $data)) {
				$data['cctv'] = NULL;
			}
		}

		return $data;
	}

	public function addDataAkses(){
		$this->cadas->transBegin();

		$dataCctv = [
			'ID_STAKEHOLDERS' => $_POST['ID_STAKEHOLDERS'],
			'TIPE_AKSES' => $_POST['cctv'],
			'JENIS_AKSES' => $_POST['cctvJenis'],
			'APLIKASI_AKSES' => $_POST['cctvAplikasi'],
			'NAMA_APLIKASI' => $_POST['cctvNamaAplikasi'],
			'PROTOCOL' => $_POST['cctvProtocol'],
			'ALAMAT_AKSES' => $_POST['cctvAkses'],
			'USERNAME' => $_POST['cctvUsername'],
			'PASSWORD' => $_POST['cctvPassword'],
			'JENIS_CCTV' => $_POST['cctvJenisCctv'],
			'STATUS' => $_POST['cctvStatus'],
			'PETUNJUK_AKSES' => $_POST['cctvPetunjuk'],
			'KETERANGAN' => $_POST['cctvket'],
			'PTGS_REKAM' => $_SESSION['NipUser'],
		];

		$dataIt = [
			'ID_STAKEHOLDERS' => $_POST['ID_STAKEHOLDERS'],
			'TIPE_AKSES' => $_POST['it'],
			'JENIS_AKSES' => $_POST['itJenis'],
			'APLIKASI_AKSES' => $_POST['itAplikasi'],
			'NAMA_APLIKASI' => $_POST['itNamaAplikasi'],
			'PROTOCOL' => $_POST['itProtocol'],
			'ALAMAT_AKSES' => $_POST['itAkses'],
			'USERNAME' => $_POST['itUsername'],
			'PASSWORD' => $_POST['itPassword'],
			'PROVIDER_IT_INVENTORY' => $_POST['itProvider'],
			'STATUS' => $_POST['itStatus'],
			'PETUNJUK_AKSES' => $_POST['itPetunjuk'],
			'KETERANGAN' => $_POST['itket'],
			'PTGS_REKAM' => $_SESSION['NipUser'],
		];

		$dataSeal = [
			'ID_STAKEHOLDERS' => $_POST['ID_STAKEHOLDERS'],
			'TIPE_AKSES' => $_POST['seal'],
			'JENIS_AKSES' => $_POST['sealJenis'],
			'APLIKASI_AKSES' => $_POST['sealAplikasi'],
			'NAMA_APLIKASI' => $_POST['sealNamaAplikasi'],
			'PROTOCOL' => $_POST['sealProtocol'],
			'ALAMAT_AKSES' => $_POST['sealAkses'],
			'USERNAME' => $_POST['sealUsername'],
			'PASSWORD' => $_POST['sealPassword'],
			'PROVIDER_E_SEAL' => $_POST['sealProvider'],
			'STATUS' => $_POST['sealStatus'],
			'PETUNJUK_AKSES' => $_POST['sealPetunjuk'],
			'KETERANGAN' => $_POST['sealket'],
			'PTGS_REKAM' => $_SESSION['NipUser'],
		];

		$builder = $this->cadas->table('tb_akses');
		$builder->insert($dataCctv);
		$builder->insert($dataIt);

		if ($_POST['jenisFasilitas'] == "Pusat Logistik Berikat") {
			$builder->insert($dataSeal);
		}

		if ($this->cadas->transStatus() === FALSE) {
			$this->cadas->transRollback();
			return 'failed';
		} else {
			$this->cadas->transCommit();
			return 'success';
		}
	}

	public function updateDataAkses(){
		$this->cadas->transBegin();

		$data = [
			'TIPE_AKSES' => $_POST['tipe'],
			'JENIS_AKSES' => $_POST['Jenis'],
			// 'ID_STAKEHOLDERS' => $_POST['nama'],
			'NAMA_APLIKASI' => $_POST['NamaAplikasi'],
			'PROTOCOL' => $_POST['Protocol'],
			'ALAMAT_AKSES' => $_POST['Akses'],
			'APLIKASI_AKSES' => $_POST['Aplikasi'],
			'USERNAME' => $_POST['Username'],
			'PASSWORD' => $_POST['Password'],
			'STATUS' => $_POST['Status'],
			'PETUNJUK_AKSES' => $_POST['Petunjuk'],
			'KETERANGAN' => $_POST['ket'],
			'PTGS_REKAM' => $_SESSION['NipUser'],
		];

		if (isset($_POST['JenisCctv'])) {
			$data['JENIS_CCTV'] = $_POST['JenisCctv'];
		}

		if (isset($_POST['itProvider'])) {
			$data['PROVIDER_IT_INVENTORY'] = $_POST['itProvider'];
		}

		if (isset($_POST['sealProvider'])) {
			$data['PROVIDER_E_SEAL'] = $_POST['sealProvider'];
		}

		$builder = $this->cadas->table('tb_akses');
		$builder->where('ID_AKSES', $_POST['ID_AKSES']);
		$builder->update($data);

		if ($this->cadas->transStatus() === FALSE) {
			$this->cadas->transRollback();
			return 'failed';
		} else {
			$this->cadas->transCommit();
			return 'success';
		}
	}

	public function getReferensi($column, $jenis){
		$builder = $this->cadas->table('tb_akses');
		$builder->select("NAMA_APLIKASI");
		$builder->where("TIPE_AKSES", $jenis);
		$builder->where("NAMA_APLIKASI !=", "NULL");
		if (!empty($_GET['search'])) {
			$builder->like($_GET['column'],$_GET['search']);	
		}
		$builder->distinct();
		$query = $builder->get();
		return $query->getResultArray();	
	}
}