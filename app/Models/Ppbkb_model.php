<?php 

namespace App\Models;

use CodeIgniter\Model;

class Ppbkb_model extends Model
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
    	$this->ppbkb = \Config\Database::connect('ppbkb');
    }

    
}