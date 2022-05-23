<?php 
namespace App\Models;

use CodeIgniter\Model;

class KontrakKinerjaModel extends Model
{
	protected $table      = 'KontrakKinerjaModel';
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
		$this->sifilwa = \Config\Database::connect('sifilwa');
	}

	// SELECT FUNCTION

	public function getAllKontrak(){
		$builder = $this->sifilwa->table('tb_kontrak_kinerja');

		return $builder->get()->getResultArray();
	}

	public function getKontrak(){
		$builder = $this->sifilwa->table('tb_kontrak_kinerja');
		$builder->where('ID_KONTRAK_KINERJA', $_GET['ID_KONTRAK_KINERJA']);

		return $builder->get()->getRowArray();
	}
	// CRUD FUNCTION

	public function addKontrak(){
		$this->sifilwa->transBegin();

		$data = [
			'NOMOR_KONTRAK' => $_POST['nomor_kontrak'],
			'JENIS_KONTRAK' => $_POST['jenis_kontrak'],
			'TIPE_KONTRAK' => $_POST['tipe_kontrak'],
			'TANGGAL_MULAI' => $_POST['tanggal_mulai'],
			'TANGGAL_SELESAI' => $_POST['tanggal_selesai'],
			'TAHUN' => $_POST['tahun']			
		];

		$builder = $this->sifilwa->table('tb_kontrak_kinerja');
		$builder->insert($data);

		if ($this->sifilwa->transStatus() === FALSE) {
			$this->sifilwa->transRollback();

			return FALSE;
		} else {
			$this->sifilwa->transCommit();
			return TRUE;
		}
	}

	public function editKontrak(){

	}

	public function deleteKontrak(){
		$this->sifilwa->transBegin();
		$builder = $this->sifilwa->table('tb_kontrak_kinerja');
		$builder->where('ID_KONTRAK_KINERJA', $_POST['ID_KONTRAK_KINERJA']);
		$data = $builder->get()->getRowArray();

		$builder->where('ID_KONTRAK_KINERJA',$_POST['ID_KONTRAK_KINERJA']);
		$builder->delete();
		if ($this->sifilwa->transStatus() === FALSE ){
			$this->sifilwa->transRollback();
			return ['status' => 1, 'kontrak' => $data];
		} else {
			$this->sifilwa->transCommit();
			return ['status' => 2, 'kontrak' => $data];
		}
	}
}