<?php 
namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
	protected $table      = 'Login';
	protected $primaryKey = 'id';

	protected $returnType = 'array';
	protected $useSoftDeletes = true;

	protected $allowedFields = [];

	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $session;
	protected $db;

	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->db = \Config\Database::connect('default');
		$this->cadas = \Config\Database::connect('cadas');
	}

	public function log($user, $operation, $pesan){
		$this->db->transBegin();
		$data = array(
			'NipUser' => $user,
			'KdHistory' => $operation,
			'History' => $pesan
		);
		$builder = $this->db->table('historyuser');
		$builder->insert($data);

		if ($this->db->transStatus() === FALSE) {
			$this->db->transRollback();
		} else {
			$this->db->transCommit();
		}
	}

	public function log_cadas($user, $operation, $pesan){
		$this->cadas->transBegin();
		$data = array(
			'NPWP' => $user,
			'KdHistory' => $operation,
			'History' => $pesan
		);
		$builder = $this->cadas->table('historyuser');
		$builder->insert($data);

		if ($this->cadas->transStatus() === FALSE) {
			$this->cadas->transRollback();
		} else {
			$this->cadas->transCommit();
		}
	}    

	public function cek_user(){
    	// $db = \Config\Database::connect();
		$builder = $this->db->table('tbuser');
		$builder->select('IdUser, NipUser, Password');
		$builder->where('NipUser',$_POST['username']);
		$query = $builder->get();
		$hash = $query->getResultArray();
		if (!empty($hash)) {
			if (password_verify($_POST['password'], $hash['0']['Password'])) {
				if (count($hash) === 1) {
					$data = $query->getRow();
					$this->userdata($data->IdUser);
					$this->log($hash[0]['NipUser'],0,"Telah Login Ke Aplikasi Cadas");
					return array('status' => "TRUE");
				} else {
					return array('status' => "FALSE");
				}
			} else {
				$this->log($_POST['username'],0,"Gagal Login ke Aplikasi Cadas 'User dan/atau Password Salah'");
				return array('status' => "FALSE", 'ket' => 'Password');
			}
		} else {
			$this->log($_POST['username'],0,"Gagal Login ke Aplikasi Cadas 'User dan/atau Password Salah'");
			return array('status' => "FALSE", 'Ket' => 'User');
		}
		// return $hash;
	}

	public function userdata($id = null) {
    	// $session = \Config\Services::session();
    	// $db = \Config\Database::connect();
		$builder = $this->db->table('tbuser_detail');
		$builder->where('IdUser',$id);
		$query = $builder->get(1);

		if (count($query->getResultArray()) === 1) {
			$data = $query->getRow();
			$query2 = $this->db->table('tb_petugas_hanggar')->where('IdPegawai', $data->IdPegawai)->get(1);
			$hanggar = $query2->getRow();
			if ($hanggar !== NULL) {
				$IdHanggar = $hanggar->IdHanggar;
			} else {
				$IdHanggar = 0;
			}
			$builder = $this->db->table('tbview_grupakses');
			$builder->select('IdHakAkses');
			$builder->where('IdUser',$id);
			$query = $builder->get();
			$hakAkses = $query->getResultArray();
			for ($i = 0; $i < count($hakAkses); $i++) {
				$dataHakAkses[] = $hakAkses[$i]['IdHakAkses'];
			}
			$datauser = array(
				'tipe' => $_POST['tipe'],
				'IdUser' => $data->IdUser,
				'NipUser' => $data->NipUser,
				'NamaUser' => $data->NmUser,
				'GrupMenu' => $data->GrupMenu,
				'StatusUser' => $data->StatusUser,
				'IdPegawai' => $data->IdPegawai,
				'NamaPegawai' => $data->NamaPegawai,
				'NIPPegawai' => $data->NIPPegawai,
				'Jabatan' => $data->NamaJabatan,
				'Eselon' => $data->Eselon,
				'NamaUnit' => $data->NmUnit,
				'Pangkat' => $data->Pangkat,
				'IdHanggar' => $IdHanggar,
				'hakAkses' => $dataHakAkses,
				'StatusLogin' => TRUE,
			);
			$seksi = $this->db->table('tb_setting_seksi_pkc')->where('idJabatan', $data->JabatanPegawai)->get(1)->getRow();
			if ($seksi !== NULL) {
				$datauser['idSeksiPKC'] = $seksi->idSeksi;
			}

			$this->session->set($datauser);
		}
	}

	public function logout() {
		// $session = \Config\Services::session();
		// $session->remove(array('IdUser' => '', 'StatusLogin' => 0));
		$this->session->destroy();
		// $this->session->stop();
	}

	public function CekUserHakAkses($IdUser = null) {
		$builder = $this->db->table('tbgrupakses');
		$builder->where('IdUser', $IdUser);
		$query = $builder->get();
		if ($query !== FALSE && $builder->countAllResults() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function CekAdminHakAkses($IdUser = null) {
		$builder = $this->db->table('tbgrupakses');
		$builder->where('IdUser',$_SESSION['IdUser']);
		$builder->where('IdHakAkses', 1);
		if ($builder->countAllResults() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function cek_stakeholders(){
		$builder = $this->cadas->table('tb_user');
		// $builder->select('IdUser, NPWP, Password');
		$builder->where('NPWP',$_POST['username']);
		$query = $builder->get();
		$hash = $query->getResultArray();
		if ($builder->where('NPWP',$_POST['username'])->countAllResults() === 1) {
			if (password_verify($_POST['password'], $hash['0']['Password'])) {
				$data = $query->getRow();
				$this->stakeholdersdata($data->NPWP);
				$this->log_cadas($hash[0]['NPWP'],0,"Telah Login Ke Aplikasi Cadas");
				return array('status' => "TRUE");
			} else {
				$this->log_cadas($_POST['username'],0,"Gagal Login ke Aplikasi Cadas 'User dan/atau Password Salah'");
				return array('status' => "FALSE", 'user' => "defined");
			}
		} else {
			return array('status' => "FALSE", 'user' => "undefined");
		}
	}

	public function stakeholdersdata($id){
		$builder = $this->cadas->table('tb_stakeholders_detail');
		$builder->where('NPWP',$id);
		$query = $builder->get(1);

		if (count($query->getResultArray()) === 1) {
			$data = $query->getRow();
			$datauser = array(
				'tipe' => $_POST['tipe'],
				'IdUser' => $data->ID,
				'NPWP' => $data->NPWP,
				'NamaUser' => $data->NAMA_PERUSAHAAN,
				'Fasilitas' => $data->NAMA_FASILITAS,
				'Jenis' => $data->NAMA_JENIS,
				'Profil' => $data->NAMA_PROFIL_RESIKO,
				// 'NamaPegawai' => $data->NamaPegawai,
				// 'NIPPegawai' => $data->NIPPegawai,
				// 'Jabatan' => $data->NamaJabatan,
				// 'Eselon' => $data->Eselon,
				// 'NamaUnit' => $data->NmUnit,
				// 'Pangkat' => $data->Pangkat,
				// 'IdHanggar' => $IdHanggar,
				'StatusLogin' => TRUE,
			);
			$this->session->set($datauser);
		}	
	}

	public function searchAktivasi($npwp){
		$build = $this->cadas->table('tb_aktivasi_user');
		$build->where('NPWP', $npwp);

		return $build->get(1)->getResultArray();
	}

	public function addAktivasiUser(){
		$build = $this->cadas->table('tb_nib');
		$build->where('NPWP',$_POST['npwp']);
		$count = $build->countAllResults();
		
		if ($count > 0) {
			$this->cadas->transBegin();
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUFVXYZ';
			$kodeAktivasi = substr(str_shuffle($permitted_chars), 0, 25);
			$password = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 10]);


			$builder = $this->cadas->table('tb_aktivasi_user');
			$data = array(
				'NPWP' => $_POST['npwp'],
				'NamaPerusahaan' => $_POST['perusahaan'],
				'NamaUser' => $_POST['name'],
				'Username' => $_POST['username'],
				'Email' => $_POST['email'],
				'Password' => $password,
				'KodeAktivasi' => $kodeAktivasi
			);

			$builder->insert($data);
			$idUser = $this->cadas->insertID();
			$data['idUser'] = $idUser;

			if ($this->cadas->transStatus() === FALSE) {
				$this->cadas->transRollback();
				return ['status' => 0];
			} else {
				$this->cadas->transCommit();
				return ['status' => 1,'data'=> $data];
			}
		} else {
			return ['status' => 2];
		}		

		
	}

	public function aktivasi(){
		$this->cadas->transBegin();
		$build = $this->cadas->table('tb_aktivasi_user');
		$build->where('IdAktivasi', $_GET['asdf']);
		$build->where('KodeAktivasi', $_GET['zxcv']);
		$build->where('StatusAktivasi', "N");
		$query = $build->get();
		$dataAktivasi = $query->getRow();

		$builder = $this->cadas->table('tb_user');

		$data = [
			'NPWP' => $dataAktivasi->NPWP,
			'NamaPerusahaan' => $dataAktivasi->NamaPerusahaan,
			'Username' => $dataAktivasi->Username,
			'Password' => $dataAktivasi->Password,
			'NamaUser' => $dataAktivasi->NamaUser,
		];
		$builder->insert($data);

		$updBuild = $this->cadas->table('tb_aktivasi_user');
		$data = [
			'StatusAktivasi' => "Y"
		];
		$updBuild->where('IdAktivasi', $_GET['asdf']);
		$updBuild->update($data);

		if ($this->cadas->transStatus() === FALSE) {
			$this->cadas->transRollback();
			return FALSE;
		} else {
			$this->cadas->transCommit();
			return TRUE;
		}
	}
}