<?php 
namespace App\Models;

use CodeIgniter\Model;

class DatatableModel extends Model
{
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

	protected $connection;

	var $table;
	var $column_order;
	var $column_search;
	var $order;
	var $filter;

	private function GetListData() {
		$this->builder = $this->connection->table($this->table);

		$i = 0;

		foreach ($this->column_search as $item) //loop column
		{
			if ($_POST['search']['value']) //if dataTable send POST for search
			{

				if ($i === 0) //first loop
				{
					$this->builder->groupStart(); //open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->builder->like($item, $_POST['search']['value']);
				} else {
					$this->builder->orLike($item, $_POST['search']['value']);
				}
				if (count($this->column_search) - 1 == $i) //last loop
				{
					$this->builder->groupEnd();
				}
				//close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) //ordering
		{
			$this->builder->orderBy($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->builder->orderBy(key($order), $order[key($order)]);
		}

	}

	public function GetDataTable($basisData, $tabel, $order, $search, $sort,  $filter) {
		$this->connection 		= \Config\Database::connect($basisData);
		$this->table 			= $tabel;
		$this->column_order 	= $order;
		$this->column_search 	= $search;
		$this->order 			= $sort;
		$this->filter 			= $filter;
		
		$this->GetListData();

		if ($_POST['length'] != -1) {
			$this->builder->limit($_POST['length'], $_POST['start']);
		}

		if (isset($filter['list'])) {
			foreach ($filter['list'] as $key => $value) {
				$this->builder->where($key, $value);
			}
		}

		$query = $this->builder->get();
		return $query->getResult();
	}

	public function count_filtered($filter) {
		$this->GetListData();

		if (isset($filter['countFilter'])) {
			foreach ($filter['countFilter'] as $key => $value) {
				$this->builder->where($key, $value);
			}
		}

		return $this->builder->countAllResults();
	}

	public function count_all($filter) {
		$builder= $this->connection->table($this->table);

		if (isset($filter['countAll'])) {
			foreach ($filter['countAll'] as $key => $value) {
				$this->builder->where($key, $value);
			}
		}

		return $builder->countAll();
	}
}