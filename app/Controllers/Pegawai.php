<?php
namespace App\Controllers;

use \App\Models\PegawaiModel;

class Pegawai extends BaseController
{

	public function __construct()
	{
		$this->model = new PegawaiModel();
	}
	// VIEW SECTION
	public function index()
	{
		if (! empty($_GET))
		{
			if ($_GET['page'] === 'main')
			{
				$this->data['tableTitle'] = 'Tabel Data Pegawai';
				$this->log(2, 'Telah Mengakses Menu Admin > Manajemen Pegawai');
				return view('Admin/Pegawai', $this->data);
			}
			elseif ($_GET['page'] === 'info')
			{
				$hari    = date('l');
				$tanggal = date('d');
				$bulan   = date('F');
				$tahun   = date('Y');
				$date    = [
					'hari'    => $hari,
					'tanggal' => $tanggal,
					'bulan'   => $bulan,
					'tahun'   => $tahun,
				];
				$info    = [
					'main'   => 'AppMenu',
					'sub'    => 'Admin',
					'active' => 'Manajemen Pegawai',
					'date'   => $date,
				];

				return json_encode($info);
			}
		}
	}

	public function user()
	{
		if (! empty($_GET))
		{
			if ($_GET['page'] === 'main')
			{
				$this->data['tableTitle'] = 'Tabel Data User';
				$this->data['hakAkses']   = $this->model->getListHakAkses();
				$this->log(2, 'Telah Mengakses Menu Admin > Manajemen User');
				return view('Admin/User', $this->data);
			}
			elseif ($_GET['page'] === 'info')
			{
				$hari    = date('l');
				$tanggal = date('d');
				$bulan   = date('F');
				$tahun   = date('Y');
				$date    = [
					'hari'    => $hari,
					'tanggal' => $tanggal,
					'bulan'   => $bulan,
					'tahun'   => $tahun,
				];
				$info    = [
					'main'   => 'AppMenu',
					'sub'    => 'Admin',
					'active' => 'Manajemen User',
					'date'   => $date,
				];

				return json_encode($info);
			}
		}
	}

	public function manajemenHanggar()
	{
		if (! empty($_GET))
		{
			if ($_GET['page'] === 'main')
			{
				$this->data['tableTitle'] = 'Tabel Data Hanggar';
				$this->data['hakAkses']   = $this->model->getListHakAkses();
				$this->log(2, 'Telah Mengakses Menu Admin > Manajemen Hanggar');
				return view('Admin/Hanggar', $this->data);
			}
			elseif ($_GET['page'] === 'info')
			{
				$hari    = date('l');
				$tanggal = date('d');
				$bulan   = date('F');
				$tahun   = date('Y');
				$date    = [
					'hari'    => $hari,
					'tanggal' => $tanggal,
					'bulan'   => $bulan,
					'tahun'   => $tahun,
				];
				$info    = [
					'main'   => 'AppMenu',
					'sub'    => 'Admin',
					'active' => 'Manajemen Hanggar',
					'date'   => $date,
				];

				return json_encode($info);
			}
		}
	}

	// VIEW SECTION

	// SELECT SECTION
	public function getPegawaiById()
	{
		$data = $this->model->getById();
		echo json_encode($data);
	}

	public function getList()
	{
		$data = $this->model->getListPegawai();

		echo json_encode($data);
	}

	public function getListPangkat(){
		$data = $this->model->getListPangkat();

		echo json_encode($data);
	}

	public function getListEselon(){
		$data = $this->model->getListEselon();

		echo json_encode($data);
	}

	public function getListSeksi(){
		$data = $this->model->getListSeksi();

		echo json_encode($data);
	}

	public function getListJabatan(){
		$data = $this->model->getListJabatan();

		echo json_encode($data);
	}

	public function getAllPegawaiNip()
	{
		$data = $this->model->getAllPegawaiNip();

		echo json_encode($data);
	}

	public function getByNip()
	{
		$data = $this->model->getByNip();

		echo json_encode($data);
	}

	public function getUserById()
	{
		$data = $this->model->getUserById();

		echo json_encode($data);
	}

	public function getPegawaiByName()
	{
		$data = $this->model->getPegawaiByName($_GET['name'], ['NIPPegawai', 'NamaPegawai']);
		echo json_encode($data);
	}

	public function getByName()
	{
		$data = $this->model->getPegawaiByName($_GET['nama'], ['IdPegawai', 'NamaPegawai']);

		echo json_encode($data);
	}
	// SELECT SECTION

	// DATATABLE SECTION
	public function datatableList()
	{
		//start datatable

		$basisData = 'default';
		$tabel     = 'tbpegawai_detail';
		$order     = [
			null,
			'NIPPegawai',
			'NamaPegawai',
			'GolPegawai',
			'JabatanPegawai',
			'Seksi',
			'Status',
		];
		$search    = [
			'NIPPegawai',
			'NamaPegawai',
			'NamaJabatan',
		];
		$sort      = ['JabatanPegawai' => 'asc'];
		$filter    = [];
		$filter['list']['Status'] = $_POST['Status'];
		$filter['countFilter']['Status'] = $_POST['Status'];
		$filter['countAll']['Status'] = $_POST['Status'];

		$list = $this->datatable->GetDataTable($basisData, $tabel, $order, $search, $sort, $filter);
		$data = [];
		$no   = $_POST['start'];

		foreach ($list as $ListData)
		{
			if ($ListData->Status === 'Y')
			{
				$STATUS = 'AKTIF';
			}
			else
			{
				$STATUS = 'TIDAK AKTIF';
			}

			$no++;
			$row   = [];
			$row[] = $no;
			$row[] = $ListData->NIPPegawai;
			$row[] = strtoupper($ListData->NamaPegawai);
			$row[] = $ListData->Pangkat;
			$row[] = $ListData->NamaJabatan;
			$row[] = $ListData->NmUnit;
			$row[] = $STATUS;
			$row[] = $ListData->IdPegawai;

			$data[] = $row;
		}

		$output = [
			'draw'            => $_POST['draw'],
			'recordsTotal'    => $this->datatable->count_all($filter),
			'recordsFiltered' => $this->datatable->count_filtered($filter),
			'data'            => $data,
		];

		echo json_encode($output);
	}

	public function datatableListUser()
	{
		//start datatable

		$basisData = 'default';
		$tabel     = 'tbuser_detail';
		$order     = [
			null,
			'NIPPegawai',
			'NamaPegawai',
			'GolPegawai',
			'JabatanPegawai',
			'SeksiPegawai',
			'StatusUser',
		];
		$search    = [
			'NIPPegawai',
			'NamaPegawai',
			'NamaJabatan',
		];
		$sort      = ['JabatanPegawai' => 'asc'];
		$filter    = [];
		$filter['list']['StatusUser'] = $_POST['Status'];
		$filter['countFilter']['StatusUser'] = $_POST['Status'];
		$filter['countAll']['StatusUser'] = $_POST['Status'];
		// if ($_POST['tipeAkses'] != 0) {
		// 	$filter['list']['TIPE_AKSES'] = $_POST['tipeAkses'];
		// 	$filter['countFilter']['TIPE_AKSES'] = $_POST['tipeAkses'];
		// 	$filter['countAll']['TIPE_AKSES'] = $_POST['tipeAkses'];
		// }

		$list = $this->datatable->GetDataTable($basisData, $tabel, $order, $search, $sort, $filter);
		$data = [];
		$no   = $_POST['start'];

		foreach ($list as $ListData)
		{
			if ($ListData->StatusUser === 'Y')
			{
				$STATUS = 'AKTIF';
			}
			else
			{
				$STATUS = 'TIDAK AKTIF';
			}

			$no++;
			$row   = [];
			$row[] = $no;
			$row[] = $ListData->NIPPegawai;
			$row[] = strtoupper($ListData->NamaPegawai);
			$row[] = $ListData->Pangkat;
			$row[] = $ListData->NamaJabatan;
			$row[] = $ListData->NmUnit;
			$row[] = $STATUS;
			$row[] = $ListData->IdUser;

			$data[] = $row;
		}

		$output = [
			'draw'            => $_POST['draw'],
			'recordsTotal'    => $this->datatable->count_all($filter),
			'recordsFiltered' => $this->datatable->count_filtered($filter),
			'data'            => $data,
		];

		echo json_encode($output);
	}

	public function datatableListHakAkses($IdUser = 0)
	{
		//start datatable

		$basisData = 'default';
		$tabel     = 'tbview_grupakses';
		$order     = [
			null,
			'GrupMenu',
		];
		$search    = ['GrupMenu'];
		$sort      = ['Id' => 'asc'];
		$filter    = [];
		if (isset($IdUser))
		{
			$filter['list']['IdUser']        = $IdUser;
			$filter['countFilter']['IdUser'] = $IdUser;
			$filter['countAll']['IdUser']    = $IdUser;
		}

		$list = $this->datatable->GetDataTable($basisData, $tabel, $order, $search, $sort, $filter);
		$data = [];
		$no   = $_POST['start'];

		foreach ($list as $ListData)
		{
			$no++;
			$row   = [];
			$row[] = $no;
			$row[] = $ListData->GrupMenu;
			$row[] = $ListData->Id;

			$data[] = $row;
		}

		$output = [
			'draw'            => $_POST['draw'],
			'recordsTotal'    => $this->datatable->count_all($filter),
			'recordsFiltered' => $this->datatable->count_filtered($filter),
			'data'            => $data,
		];

		echo json_encode($output);
	}

	public function datatableListHanggar()
	{
		//start datatable

		$basisData = 'default';
		$tabel     = 'tbhanggar_detail';
		$order     = [
			null,
			'id',
			'grupHanggar',
			'nama_perusahaan',
		];
		$search    = [
			'grupHanggar',
			'nama_perusahaan',
		];
		$sort      = [
			'idSeksiPKC' => 'asc',
			'id'         => 'asc',
		];
		$filter    = [];
		// if (isset($IdUser)) {
		// 	$filter['list']['IdUser'] = $IdUser;
		// 	$filter['countFilter']['IdUser'] = $IdUser;
		// 	$filter['countAll']['IdUser'] = $IdUser;
		// }

		$list = $this->datatable->GetDataTable($basisData, $tabel, $order, $search, $sort, $filter);
		$data = [];
		$no   = $_POST['start'];

		foreach ($list as $ListData)
		{
			$no++;
			$row   = [];
			$row[] = $no;
			$row[] = $ListData->namaJabatan;
			$row[] = $ListData->grupHanggar;
			$row[] = strtoupper($ListData->nama_perusahaan);
			$row[] = $ListData->jumlahPetugas;
			$row[] = $ListData->jumlahTPB;
			$row[] = $ListData->id;

			$data[] = $row;
		}

		$output = [
			'draw'            => $_POST['draw'],
			'recordsTotal'    => $this->datatable->count_all($filter),
			'recordsFiltered' => $this->datatable->count_filtered($filter),
			'data'            => $data,
		];

		echo json_encode($output);
	}

	public function datatableListHanggarPetugas($id = null)
	{
		//start datatable

		$basisData = 'default';
		$tabel     = 'tb_petugas_hanggar_detail';
		$order     = [
			null,
			'Id',
			'NamaPegawai',
			'Pangkat',
			'NamaJabatan',
		];
		$search    = ['NamaPegawai'];
		$sort      = ['Id' => 'asc'];
		$filter    = [];
		if ($id !== null)
		{
			$filter['list']['IdHanggar']        = $id;
			$filter['countFilter']['IdHanggar'] = $id;
			$filter['countAll']['IdHanggar']    = $id;
		}

		$list = $this->datatable->GetDataTable($basisData, $tabel, $order, $search, $sort, $filter);
		$data = [];
		$no   = $_POST['start'];

		foreach ($list as $ListData)
		{
			$no++;
			$row   = [];
			$row[] = $no;
			$row[] = $ListData->NamaPegawai;
			$row[] = $ListData->Pangkat;
			$row[] = $ListData->NamaJabatan;
			$row[] = $ListData->Id;

			$data[] = $row;
		}

		$output = [
			'draw'            => $_POST['draw'],
			'recordsTotal'    => $this->datatable->count_all($filter),
			'recordsFiltered' => $this->datatable->count_filtered($filter),
			'data'            => $data,
		];

		echo json_encode($output);
	}

	public function datatableListHanggarPerusahaan($id = null)
	{
		//start datatable

		$basisData = 'default';
		$tabel     = 'tb_hanggar_tpb';
		$order     = [
			null,
			'Id',
			'nama_perusahaan',
			'alamat',
			'nama_tpb',
		];
		$search    = ['nama_perusahaan'];
		$sort      = ['Id' => 'asc'];
		$filter    = [];
		if ($id !== null)
		{
			$filter['list']['IdHanggar']        = $id;
			$filter['countFilter']['IdHanggar'] = $id;
			$filter['countAll']['IdHanggar']    = $id;
		}

		$list = $this->datatable->GetDataTable($basisData, $tabel, $order, $search, $sort, $filter);
		$data = [];
		$no   = $_POST['start'];

		foreach ($list as $ListData)
		{
			$no++;
			$row   = [];
			$row[] = $no;
			$row[] = strtoupper($ListData->nama_perusahaan);
			$row[] = $ListData->alamat;
			$row[] = $ListData->nama_tpb;
			$row[] = $ListData->Id;

			$data[] = $row;
		}

		$output = [
			'draw'            => $_POST['draw'],
			'recordsTotal'    => $this->datatable->count_all($filter),
			'recordsFiltered' => $this->datatable->count_filtered($filter),
			'data'            => $data,
		];

		echo json_encode($output);
	}

	// DATATABLE SECTION

	// CRUD SECTION
	public function AddUser()
	{
		if (! empty($_POST))
		{
			$status = $this->model->AddUser();

			if ($status === 'success')
			{
				$pesan = 'User Berhasil Dibuat';
			}
			else
			{
				$pesan = 'User Gagal Dibuat';
			}
			echo json_encode(['status' => $status, 'pesan' => $pesan]);
		}
	}

	public function UpdateUser()
	{
		if (! empty($_POST))
		{
			$status = $this->model->UpdateUser();

			if ($status === 'success')
			{
				$pesan = 'User Berhasil Dirubah';
			}
			else
			{
				$pesan = 'User Gagal Dirubah';
			}
			echo json_encode(['status' => $status, 'pesan' => $pesan]);
		}
	}

	public function AddPegawai()
	{
		if (! empty($_POST))
		{
			$status = $this->model->AddPegawai();

			if ($status === 'success')
			{
				$pesan = 'Data Pegawai Berhasil Ditambah';
			}
			else
			{
				$pesan = 'Data Pegawai Gagal Ditambah';
			}
			echo json_encode(['status' => $status, 'pesan' => $pesan]);
		}
	}

	public function UpdatePegawai()
	{
		if (! empty($_POST))
		{
			$status = $this->model->UpdatePegawai();

			if ($status === 'success')
			{
				$pesan = 'Data Pegawai Berhasil Dirubah';
			}
			else
			{
				$pesan = 'Data Pegawai Gagal Dirubah';
			}
			echo json_encode(['status' => $status, 'pesan' => $pesan]);
		}
	}

	public function AddHakAkses()
	{
		if (! empty($_POST))
		{
			$status = $this->model->AddHakAkses();

			if ($status === 'success')
			{
				$pesan = 'Hak Akses Aplikasi Berhasil Ditambah';
			}
			else
			{
				$pesan = 'Hak Akses Aplikasi Gagal Ditambah';
			}
			echo json_encode(['status' => $status, 'pesan' => $pesan]);
		}
	}

	public function HapusHakAkses()
	{
		if (! empty($_POST))
		{
			$status = $this->model->HapusHakAkses();

			if ($status === 'success')
			{
				$pesan = 'Hak Akses Aplikasi Berhasil Dicabut';
			}
			else
			{
				$pesan = 'Hak Akses Aplikasi Gagal Dicabut';
			}
			echo json_encode(['status' => $status, 'pesan' => $pesan]);
		}
	}

	// MANAJEMEN HANGGAR SECTION
	public function getPetugasHanggar()
	{
		$hanggar = $this->model->getHanggar();

		echo json_encode($hanggar);
	}

	public function ajax_edit_hanggar()
	{
		$data = $this->model->getHanggar();

		echo json_encode($data);
	}

	public function getPerusahaan()
	{
		$search = $_GET['nama'];
		$column = [
			'id_perusahaan',
			'nama_perusahaan',
			'nama_tpb',
			'ijin_kelola_tpb',
		];
		$data   = $this->model->getTPBv1($search, $column);

		echo json_encode($data);
	}

	public function getTPBbyID()
	{
		$data = $this->model->getTpbById();

		echo json_encode($data[0]);
	}

	public function resetHanggar()
	{
		if ($_GET['type'] === 'admin')
		{
			$status = $this->model->cabutAllPetugas();

			if ($status === true)
			{
				$pesan = 'Seluruh Petugas Hanggar Berhasil Dicabut';
			}
			else
			{
				$pesan = 'Gagal mencabut petugas hanggar';
			}
		}

		echo json_encode($pesan);
	}

	public function ajax_add_hanggar()
	{
		if (! empty($_POST))
		{
			$status = $this->model->post_hanggar();
			if ($status === true)
			{
				$pesan = 'Data Hanggar berhasil disimpan';
			}
			else
			{
				$pesan = 'Data Hanggar gagal disimpan';
			}
		}
		else
		{
			$pesan = 'Tidak ada data yang di simpan';
		}

		echo json_encode($pesan);
	}

	public function ajax_update_hanggar()
	{
		if (! empty($_POST))
		{
			$status = $this->model->update_hanggar();
			if ($status === true)
			{
				$pesan = 'Data Hanggar berhasil disimpan';
			}
			else
			{
				$pesan = 'Data Hanggar gagal disimpan';
			}
		}
		else
		{
			$pesan = 'Tidak ada data yang di simpan';
		}

		echo json_encode($pesan);
	}

	public function ajax_delete_hanggar()
	{
		if (! empty($_POST))
		{
			$status = $this->model->delete_hanggar();

			if ($status === true)
			{
				$data['pesan'] = 'Data Hanggar berhasil Dihapus';
			}
			else
			{
				$data['pesan'] = 'Data Hanggar Gagal Dihapus';
			}
		}

		echo json_encode($data);
	}

	public function ajax_tambah_petugas()
	{
		if (! empty($_POST))
		{
			$status = $this->model->addPetugas();
			if ($status === true)
			{
				$pesan = 'Petugas Hanggar Berhasil Ditambah';
			}
			else
			{
				$pesan = 'Petugas Hanggar Gagal Ditambah';
			}
		}
		else
		{
			$pesan = 'Tidak ada data yang di input';
		}

		echo json_encode($pesan);
	}

	public function ajax_cabut_petugas()
	{
		if (! empty($_GET))
		{
			$status = $this->model->cabutPetugas();
			if ($status === true)
			{
				$pesan = 'Petugas Hanggar Berhasil Dicabut';
			}
			else
			{
				$pesan = 'Petugas Hanggar Gagal Dicabut';
			}
		}
		else
		{
			$pesan = 'Tidak ada data yang di input';
		}

		echo json_encode($pesan);
	}
	// MANAJEMEN HANGGAR SECTION
	// CRUD SECTION
}
