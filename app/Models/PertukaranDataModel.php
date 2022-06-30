<?php namespace App\Models;

use CodeIgniter\Model;

class PertukaranDataModel extends Model
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
    	$this->dbit = \Config\Database::connect('dbit');
    	$this->cadas = \Config\Database::connect('cadas');
    }

    public function validasiUser($username){
    	$builder = $this->cadas->table('tb_user');
    	$builder->where('NPWP',$username);

    	if (count($builder->get()->getResultArray()) === 1) {
    		return TRUE;
    	} else {
    		return FALSE;
    	}
    }

    public function postIt($data,$type){
    	$this->dbit->transStart();

    	if ($type === 1) {
    		$table = 'PEMASUKAN';
    	} else {
    		$table = 'PENGELUARAN';
    	}

    	$query = $this->dbit->table($table)->insertBatch($data);


    	if ($this->dbit->transStatus() === FALSE) {
    		$this->dbit->transRollback();
    		return FALSE;
    	} else {
    		$this->dbit->transCommit();
    		return TRUE;
    	}
    }
}