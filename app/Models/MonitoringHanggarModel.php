<?php namespace App\Models;

use CodeIgniter\Model;

class MonitoringHanggarModel extends Model
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

    public function __construct($foo = null)
    {
        $this->cadas = \Config\Database::connect('cadas');
        $this->dbtpb = \Config\Database::connect('dbtpb');
        $this->peloro = \Config\Database::connect('peloro');
        $this->monev = \Config\Database::connect('monev');
    }

    public function getTPB($search, $column) {
        $builder = $this->cadas->table('tpbdetail')->select($column)->like('nama_perusahaan', $search);
        if ($_SESSION['IdHanggar'] !== 0) {
            $builder->where('IdHanggar', $_SESSION['IdHanggar']);
        }
        $builder->where('status', "Y");
        $query = $builder->get();

        return $query->getResultArray();
    }
}