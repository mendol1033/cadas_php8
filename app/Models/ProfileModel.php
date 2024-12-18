<?php namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
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

    public function __construct(){
    	$this->db = \Config\Database::connect('cadas');
    }

    public function getValidasi(){
    	$skep = substr($_POST['skep-mask'],4);
    	$builder = $this->db->table('profil_resiko_tpb');
    	$builder->where(['NPWP' => $_POST['npwp'], 'NOMOR_SKEP' => $skep, 'TAHUN' => $_POST['tahun'], 'SEMESTER' => $_POST['semester']]);
    	$dataProfil = $builder->get()->getResultArray();

        if (count($dataProfil) < 1) {
            $builder = $this->db->table('profil_resiko_tpb');
            $builder->select('NOMOR_SKEP, TANGGAL_SKEP');
            $builder->where(['NPWP' => $_POST['npwp'], 'TAHUN' => $_POST['tahun'], 'SEMESTER' => $_POST['semester']]);
            $dataSKEP = $builder->get()->getResultArray();
        }
    	if (count($dataProfil) === 1) {
    		return ['status' => 'success', 'data' => $dataProfil];
    	} else {
            if ($dataSKEP > 0) {
                return ['status' => 'failed', 'data' => $dataSKEP];
            } else {
                return ['status' => 'failed'];
            }
    	}
    }

    public function postDataExim(){
    	$this->db->transBegin();

    	$data = [
    		'NPWP' => $_POST['npwp'],
    		'NAMA_PERUSAHAAN' => $_POST['nama'],
    		'NAMA_EXIM' => $_POST['exim'],
    		'EMAIL_PERUSAHAAN' => $_POST['email'],
    		'NO_HP' => $_POST['hp']
    	];

    	$builder = $this->db->table('data_exim');
    	$builder->insert($data);

    	if ($this->db->transStatus() === FALSE) {
    		$this->db->transRollback();
    		return FALSE;
    	} else {
    		$this->db->transCommit();
    		return TRUE;
    	}
    }
}