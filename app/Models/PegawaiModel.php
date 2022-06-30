<?php
namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
	protected $table      = 'tableName';
	protected $primaryKey = 'id';

	protected $returnType     = 'array';
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
		$this->db    = \Config\Database::connect();
		$this->cadas = \Config\Database::connect('cadas');
	}

	public function getById()
	{
		$builder = $this->db->table('tbpegawai_detail');
		$builder->where('IdPegawai', $_GET['ID']);

		return $builder->get()->getRowArray();
	}

	public function getListPegawai()
	{
		$builder = $this->db->table('tb_non_user');
		$builder->select($_GET['search']);
		$builder->like('NamaPegawai', $_GET['nip']);

		return $builder->get()->getResultArray();
	}

	public function getAllPegawaiNip()
	{
		$builder = $this->db->table('tbpegawai_detail');
		$builder->select('NIPPegawai, NamaPegawai');
		$query = $builder->get()->getResultArray();

		foreach ($query as $key => $value)
		{
			$data[$value['NIPPegawai']] = $value['NamaPegawai'];
		}

		return $query;
	}

	public function getByNip()
	{
		$builder = $this->db->table('tbpegawai_detail');
		$builder->where('NIPPegawai', $_GET['NIP']);

		return $builder->get()->getRowArray();
	}

	public function getUserById()
	{
		$builder = $this->db->table('tbuser_detail');
		$builder->where('IdUser', $_GET['ID']);

		return $builder->get()->getRowArray();
	}

	public function getListPangkat(){
		$builder = $this->db->table('tbpangkat');
		$data = $builder->get()->getResultArray();
		$pangkat = [];
		foreach ($data as $key => $value) {
			$pangkat[] = ["id" => $value['KdPangkat'], "text" => $value['Pangkat']." - ".$value['Gol']];
		}

		return ["results" => $pangkat];

	}

	public function getListEselon(){
		$builder = $this->db->table('tbeselon');
		$data = $builder->get()->getResultArray();
		$pangkat = [];
		foreach ($data as $key => $value) {
			$pangkat[] = ["id" => $value['IdEselon'], "text" => $value['NmEselon']];
		}

		return ["results" => $pangkat];

	}

	public function getListSeksi(){
		$builder = $this->db->table('tbseksi');
		$data = $builder->get()->getResultArray();
		$pangkat = [];
		foreach ($data as $key => $value) {
			$pangkat[] = ["id" => $value['IdSeksi'], "text" => $value['NmUnit']];
		}

		return ["results" => $pangkat];

	}

	public function getListJabatan(){
		$builder = $this->db->table('tbjabatan');
		$data = $builder->get()->getResultArray();
		$pangkat = [];
		foreach ($data as $key => $value) {
			$pangkat[] = ["id" => $value['IdJabatan'], "text" => $value['NamaJabatan']];
		}

		return ["results" => $pangkat];

	}

	public function getListHakAkses()
	{
		$builder = $this->db->table('grupmenu');
		$builder->select('IdGrupMenu AS ID, GrupMenu');

		return $builder->get()->getResultArray();
	}

	public function getListHanggar()
	{
		$builder = $this->db->table('tbhanggar');
		$builder->select('id, grupHanggar');

		return $builder->get()->getResultArray();
	}

	public function getPegawaiByName($search, $column)
	{
		$builder = $this->db->table('tbpegawai_detail');
		$builder->select($column);
		$builder->like('NamaPegawai', $search);
		$builder->orLike('NIPPegawai', $search);
		$query = $builder->get();

		return $query->getResultArray();
	}

	public function AddUser()
	{
		$this->db->transBegin();
		$pengacak = ['cost' => 9];
		$data     = [
			'NipUser'   => $_POST['NIP'],
			'NmUser'    => $_POST['Uname'],
			'Password'  => password_hash($_POST['Pswd'], PASSWORD_BCRYPT, $pengacak),
			'GrupMenu'  => $_POST['GrupMenu'],
			'PtgsRekam' => $_SESSION['NipUser'],
			'Status'    => $_POST['Status'],
		];

		$this->db->table('tbuser')->insert($data);

		if ($this->db->transStatus() === false)
		{
			$this->db->transRollback();
			return 'failed';
		}
		else
		{
			$this->db->transCommit();
			return 'success';
		}
	}

	public function UpdateUser()
	{
		$this->db->transBegin();

		$pengacak = ['cost' => 9];
		$data     = [
			'NmUser'    => $_POST['Uname'],
			'Password'  => password_hash($_POST['Pswd'], PASSWORD_BCRYPT, $pengacak),
			'PtgsRekam' => $_SESSION['IdUser'],
			'Status  '  => $_POST['Status'],
		];

		$this->db->table('tbuser')->where('IdUser', $_POST['IdUser'])->update($data);

		if ($this->db->transStatus() === false)
		{
			$this->db->transRollback();
			return 'failed';
		}
		else
		{
			$this->db->transCommit();
			return 'success';
		}
	}

	public function AddPegawai()
	{
		$this->db->transBegin();
		$data = [
			'NIPPegawai'     => $_POST['NIP'],
			'NamaPegawai'    => $_POST['Nama'],
			'GolPegawai'     => $_POST['Gol'],
			'SeksiPegawai'   => $_POST['Seksi'],
			'Eselon'         => $_POST['Eselon'],
			'JabatanPegawai' => $_POST['Jabatan'],
			'Status'         => $_POST['Status'],
			'PtgsRekam'      => $_SESSION['NipUser'],
		];

		$this->db->table('tbpegawai')->insert($data);

		if ($this->db->transStatus() === false)
		{
			$this->db->transRollback();
			return 'failed';
		}
		else
		{
			$this->db->transCommit();
			return 'success';
		}
	}

	public function UpdatePegawai()
	{
		$this->db->transBegin();
		$data = [
			'NIPPegawai'     => $_POST['NIP'],
			'NamaPegawai'    => $_POST['Nama'],
			'GolPegawai'     => $_POST['Gol'],
			'SeksiPegawai'   => $_POST['Seksi'],
			'Eselon'         => $_POST['Eselon'],
			'JabatanPegawai' => $_POST['Jabatan'],
			'Status'         => $_POST['Status'],
			'PtgsRekam'      => $_SESSION['NipUser'],
		];

		$this->db->table('tbpegawai')->where('IdPegawai', $_POST['IdPegawai'])->update($data);

		if ($this->db->transStatus() === false)
		{
			$this->db->transRollback();
			return 'failed';
		}
		else
		{
			$this->db->transCommit();
			return 'success';
		}
	}

	public function AddHakAkses()
	{
		$this->db->transBegin();
		$data = [
			'IdUser'     => $_POST['IdUser'],
			'IdHakAkses' => $_POST['HakAkses'],
			'PtgsRekam'  => $_SESSION['NipUser'],
		];

		$this->db->table('tbgrupakses')->insert($data);

		if ($this->db->transStatus() === false)
		{
			$this->db->transRollback();
			return 'failed';
		}
		else
		{
			$this->db->transCommit();
			return 'success';
		}
	}

	public function HapusHakAkses()
	{
		$this->db->transBegin();

		$this->db->table('tbgrupakses')->where('Id', $_POST['ID'])->delete();

		if ($this->db->transStatus() === false)
		{
			$this->db->transRollback();
			return 'failed';
		}
		else
		{
			$this->db->transCommit();
			return 'success';
		}
	}

	// MANAJEMEN HANGGAR SECTION
	public function getHanggar()
	{
		$builder = $this->db->table('tbhanggar_detail');
		$builder->where('id', $_GET['id']);
		$query = $builder->get()->getRowArray();

		return $query;
	}

	public function getTPBv1($search, $column)
	{
		$builder = $this->cadas->table('tpbdetail');
		$builder->select($column);
		$builder->where('status', 'Y');
		// $this->sikabayan->where_not_in("id_perusahaan", $notIn);
		$builder->like('nama_perusahaan', $search);
		$query = $builder->get()->getResultArray();

		return $query;
	}

	public function getTpbById()
	{
		$builder = $this->cadas->table('tpbdetail');
		$builder->where('id_perusahaan', $_GET['id']);
		$query = $builder->get()->getResultArray();

		return $query;
	}

	public function cabutAllPetugas()
	{
		$this->db->transBegin();

		$builder = $this->db->table('tb_petugas_hanggar')->where('Id >', 0);
		$builder->delete();

		if ($this->db->transStatus() === false)
		{
			$this->db->transRollback();
			return false;
		}
		else
		{
			$this->db->transCommit();
			return true;
		}
	}

	public function post_hanggar()
	{
		$this->db->transBegin();

		$data = [
			'idSeksiPKC'    => $_POST['seksi'],
			'grupHanggar'   => $_POST['groupHanggar'],
			'lokasiHanggar' => $_POST['lokasiHanggar'],
			'ptgsRkm'       => $_SESSION['NipUser'],
		];

		$this->db->table('tbhanggar')->insert($data);

		if ($this->db->transStatus() === false)
		{
			$this->db->transRollback();
			return false;
		}
		else
		{
			$this->db->transCommit();
			return true;
		}
	}

	public function update_hanggar()
	{
		$this->db->transBegin();

		$data = [
			'idSeksiPKC'    => $_POST['seksi'],
			'grupHanggar'   => $_POST['groupHanggar'],
			'lokasiHanggar' => $_POST['lokasiHanggar'],
			'ptgsUpdate'    => $_SESSION['NipUser'],
		];

		$builder = $this->db->table('tbhanggar');
		$builder->where('id', $_POST['idHanggar']);
		$builder->update($data);
		if ($this->db->transStatus() === false)
		{
			$this->db->transRollback();
			return false;
		}
		else
		{
			$this->db->transCommit();
			return true;
		}
	}

	public function delete_hanggar()
	{
		$this->db->transBegin();

		$builder = $this->db->table('tbhanggar');
		$builder->where('id', $_POST['id']);
		$builder->delete();

		if ($this->db->transStatus() === false)
		{
			$this->db->transRollback();
			return false;
		}
		else
		{
			$this->db->transCommit();
			return true;
		}
	}

	public function addPetugas()
	{
		switch ($_POST['type']) {
			case 'hanggar':
				$tb        = 'tb_petugas_hanggar';
				$find      = 'IdPegawai';
				$findValue = $_POST['idPegawai'];
				$db        = 'db';
			break;

			default:
				$tb        = 'tb_hanggar_tpb';
				$find      = 'idPerusahaan';
				$findValue = $_POST['idPerusahaan'];
				$db        = 'sikabayan';
			break;
		}
		$builder = $this->db->table($tb);
		$builder->where($find, $findValue);
		$query = $builder->countAllResults();

		if ($query === 0)
		{
			$this->$db->transBegin();

			switch ($_POST['type']) {
				case 'hanggar':
					$data = [
						'IdHanggar' => $_POST['idHanggar'],
						'IdPegawai' => $_POST['idPegawai'],
						'PtgsRkm'   => $_SESSION['NipUser'],
					];
				break;

				default:
					$data = [
						'idHanggar'    => $_POST['idHanggar'],
						'idPerusahaan' => $_POST['idPerusahaan'],
						'ptgsRekam'    => $_SESSION['NipUser'],
					];
				break;
			}

			$this->$db->table($tb)->insert($data);

			if ($this->$db->transStatus() === false)
			{
				$this->$db->transRollback();
				return false;
			}
			else
			{
				$this->$db->transCommit();
				return true;
			}
		}
		else
		{
			if ($tb === 'tb_petugas_hanggar')
			{
				$this->$db->transBegin();
				$data = [
					'IdHanggar' => $_POST['idHanggar'],
					'IdPegawai' => $_POST['idPegawai'],
					'PtgsRkm'   => $_SESSION['NipUser'],
				];
				$this->$db->table($tb)->insert($data);

				if ($this->$db->transStatus() === false)
				{
					$this->$db->transRollback();
					return false;
				}
				else
				{
					$this->$db->transCommit();
					return true;
				}
			}
			else
			{
				return false;
			}
		}
	}

	public function cabutPetugas()
	{
		switch ($_GET['type']) {
			case 'hanggar':
				$tb        = 'tb_petugas_hanggar';
				$find      = 'Id';
				$findValue = $_GET['id'];
				$db        = 'db';
			break;

			default:
				$tb        = 'tb_hanggar_tpb';
				$find      = 'Id';
				$findValue = $_GET['id'];
				$db        = 'cadas';
			break;
		}
		$builder = $this->$db->table($tb);
		$builder->where($find, $findValue);
		$query = $builder->countAllResults();

		if ($query !== 0)
		{
			$this->$db->transBegin();

			$builder = $this->$db->table($tb);
			$builder->where('Id', $_GET['id']);
			$builder->delete();

			if ($this->$db->transStatus() === false)
			{
				$this->$db->transRollback();
				return false;
			}
			else
			{
				$this->$db->transCommit();
				return true;
			}
		}
		else
		{
			return false;
		}
	}
	// MANAJEMEN HANGGAR SECTION
}
