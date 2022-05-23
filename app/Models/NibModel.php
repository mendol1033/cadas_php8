<?php 
namespace App\Models;

use CodeIgniter\Model;

class NibModel extends Model
{
	protected $table      = 'NibModel';
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

	public function __construct($param = null)
	{
		$this->cadas = \Config\Database::connect('cadas');
	}

	public function getKodeKbli($search, $column){
		$builder = $this->cadas->table('ref_kbli');
		$builder->select($column);
		$builder->like('KATEGORI_KBLI', $search);
		$builder->orLike('KODE_KBLI', $search);
		$query = $builder->get();
		return $query->getResultArray();
	}

	public function getNpwp($search, $column){
		$builder = $this->cadas->table('tb_nib');
		$builder->select($column);
		$builder->like('NAMA_PERUSAHAAN', $search);
		$query = $builder->get();
		return $query->getResultArray();
	}

	public function addNib(){
		$builder = $this->cadas->table('tb_nib');
		$builder->where('NOMOR_NIB',$_POST['noNib']);
		$count = $builder->countAllResults();

		if ($count === 0) {
			$this->cadas->transBegin();
			$data = [
				'NOMOR_NIB' => $_POST['noNib'],
				'TANGGAL_NIB' => substr($_POST['tanggal'],6)."-".substr($_POST['tanggal'], 3, 2)."-".substr($_POST['tanggal'], 0, 2),
				'NAMA_PERUSAHAAN' => $_POST['namaPerusahaan'],
				'ALAMAT_PERUSAHAAN' => $_POST['alamat'],
				'NPWP' => $_POST['npwp'],
				'TELEPON' => $_POST['telepon'],
				'FAX' => $_POST['fax'],
				'EMAIL' => $_POST['email'],
				'JENIS_API' => $_POST['api'],
				'STATUS_PENANAMAN_MODAL' => $_POST['modal'],
				'PETUGAS_REKAM' => $_SESSION['NipUser'],
			];

			if (isset($_POST['kbm'])) {
				$data['FLAG_KBM'] = 'Y'; 
			}
			$builder->insert($data);

			$idKbli = $this->cadas->insertID();

			$builder2 = $this->cadas->table('tb_nib_kbli');

			$dataKbli= [];

			foreach ($_POST['kbli'] as $key=>$value) {
				$dataKbli[] = [
					'ID_NIB' => $idKbli,
					'KODE_KBLI' => $value
				];
			}

			$builder2->insertBatch($dataKbli);

			if ($this->cadas->transStatus() === FALSE) {
				$this->cadas->transRollback();
				return FALSE;
			} else {
				$this->cadas->transCommit();
				return TRUE;
			}
		} else {
			return "Data Nib Sudah Ada";
		}

		

	}
}