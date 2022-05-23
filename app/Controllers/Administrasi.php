<?php
namespace App\Controllers;

use App\Models\AdministrasiModel;

class Administrasi extends BaseController
{
	public function __construct()
	{
		$this->model = new AdministrasiModel();
	}

	public function index()
	{
	}

	public function intelijen()
	{
		if (! empty($_GET))
		{
			if ($_GET['page'] === 'main')
			{
				$this->log(2, 'Telah Mengakses Menu Administrasi > Intelijen');
				return view('Administrasi/Intelijen/main', $this->data);
			}
			elseif ($_GET['page'] === 'info')
			{
				$hari      = date('l');
				$tanggal   = date('d');
				$bulan     = date('F');
				$tahun     = date('Y');
				$date      = [
					'hari'    => $hari,
					'tanggal' => $tanggal,
					'bulan'   => $bulan,
					'tahun'   => $tahun,
				];
				$subheader = [
					'icon'   => 'fal fa-edit',
					'title'  => 'Menu Utama Administrasi Intelijen',
					'detail' => '',
				];
				$info      = [
					'main'      => 'Cadas',
					'sub'       => 'Administrasi',
					'active'    => 'Intelijen',
					'date'      => $date,
					'subheader' => $subheader,
				];

				return json_encode($info);
			}
		}
	}

	public function li()
	{
		if (! empty($_GET))
		{
			if ($_GET['page'] === 'main')
			{
				$this->data['tableTitle'] = 'DAFTAR LAPORAN ANALISA';
				$this->log(2, 'Telah Mengakses Menu Administrasi > Laporan Analisa');
				return view('Administrasi/Intelijen/la', $this->data);
			}
			elseif ($_GET['page'] === 'info')
			{
				$hari      = date('l');
				$tanggal   = date('d');
				$bulan     = date('F');
				$tahun     = date('Y');
				$date      = [
					'hari'    => $hari,
					'tanggal' => $tanggal,
					'bulan'   => $bulan,
					'tahun'   => $tahun,
				];
				$subheader = [
					'icon'   => 'fal fa-book-open',
					'title'  => 'LAPORAN ANALISA',
					'detail' => '',
				];
				$info      = [
					'main'      => 'Cadas',
					'sub'       => 'Administrasi',
					'active'    => 'Lembar Informasi',
					'date'      => $date,
					'subheader' => $subheader,
				];

				return json_encode($info);
			}
		}
	}

	public function lppi()
	{
		if (! empty($_GET))
		{
			if ($_GET['page'] === 'main')
			{
				$this->data['tableTitle'] = 'DAFTAR LAPORAN PENGUMPULAN DAN PENILAIAN INFORMASI';
				$this->log(2, 'Telah Mengakses Menu Administrasi > LPPI');
				return view('Administrasi/Intelijen/lppi', $this->data);
			}
			elseif ($_GET['page'] === 'info')
			{
				$hari      = date('l');
				$tanggal   = date('d');
				$bulan     = date('F');
				$tahun     = date('Y');
				$date      = [
					'hari'    => $hari,
					'tanggal' => $tanggal,
					'bulan'   => $bulan,
					'tahun'   => $tahun,
				];
				$subheader = [
					'icon'   => 'fal fa-book-open',
					'title'  => 'LPPI',
					'detail' => '',
				];
				$info      = [
					'main'      => 'Cadas',
					'sub'       => 'Administrasi',
					'active'    => 'LPPI',
					'date'      => $date,
					'subheader' => $subheader,
				];

				return json_encode($info);
			}
		}
	}

	public function datatableListLI()
	{
		//start datatable

		$basisData = 'intelijen';
		$tabel     = 'lppi_master';
		$order     = [
			null,
			'NOMOR_LPPI',
			'TANGGAL_LPPI',
			'TINDAK_LANJUT',
			'DISPOSISI',
			'FLAG_PROSES',
		];
		$search    = [
			'NOMOR_LPPI',
			'TANGGAL_LPPI',
			'TINDAK_LANJUT',
			'DISPOSISI',
			'FLAG_PROSES',
		];
		$sort      = ['ID_LPPI' => 'desc'];
		$filter    = [];
		if ($_POST['FLAG'] !== 0)
		{
			$filter['list']['FLAG_PROSES']        = $_POST['FLAG'];
			$filter['countFilter']['FLAG_PROSES'] = $_POST['FLAG'];
			$filter['countAll']['FLAG_PROSES']    = $_POST['FLAG'];
		}

		$list = $this->datatable->GetDataTable($basisData, $tabel, $order, $search, $sort, $filter);
		$data = [];
		$no   = $_POST['start'];

		foreach ($list as $ListData)
		{
			$no++;
			$row   = [];
			$row[] = $no;
			$row[] = $ListData->NO_LPPI_FULL;
			$row[] = $ListData->TANGGAL_LPPI;
			$row[] = $ListData->TINDAK_LANJUT;
			$row[] = $ListData->DISPOSISI;
			$row[] = $ListData->FLAG_PROSES;
			$row[] = [
				'id'   => $ListData->ID_LPPI,
				'flag' => $ListData->FLAG_PROSES,
			];

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

	public function datatableListLKAI()
	{
		//start datatable

		$basisData = 'intelijen';
		$tabel     = 'lkai_master';
		$order     = [
			null,
			'NOMOR_LKAI',
			'TANGGAL_LKAI',
			'TINDAK_LANJUT',
			'DISPOSISI',
			'FLAG_PROSES',
		];
		$search    = [
			'NOMOR_LKAI',
			'TANGGAL_LKAI',
			'TINDAK_LANJUT',
			'DISPOSISI',
			'FLAG_PROSES',
		];
		$sort      = ['ID_LKAI' => 'desc'];
		$filter    = [];
		if ($_POST['FLAG'] !== 0)
		{
			$filter['list']['FLAG_PROSES']        = $_POST['FLAG'];
			$filter['countFilter']['FLAG_PROSES'] = $_POST['FLAG'];
			$filter['countAll']['FLAG_PROSES']    = $_POST['FLAG'];
		}

		$list = $this->datatable->GetDataTable($basisData, $tabel, $order, $search, $sort, $filter);
		$data = [];
		$no   = $_POST['start'];

		foreach ($list as $ListData)
		{
			$no++;
			$row   = [];
			$row[] = $no;
			$row[] = $ListData->NO_LKAI_FULL;
			$row[] = $ListData->TANGGAL_LKAI;
			$row[] = $ListData->TINDAK_LANJUT;
			$row[] = $ListData->ANALIS;
			$row[] = $ListData->FLAG_PROSES;
			$row[] = [
				'id'   => $ListData->ID_LKAI,
				'flag' => $ListData->FLAG_PROSES,
			];

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

	public function lkai()
	{
		if (! empty($_GET))
		{
			if ($_GET['page'] === 'main')
			{
				$this->data['tableTitle'] = 'DAFTAR LEMBAR KERJA ANALISA INTELIJEN';
				$this->log(2, 'Telah Mengakses Menu Administrasi > LKAI');
				return view('Administrasi/Intelijen/lkai', $this->data);
			}
			elseif ($_GET['page'] === 'info')
			{
				$hari      = date('l');
				$tanggal   = date('d');
				$bulan     = date('F');
				$tahun     = date('Y');
				$date      = [
					'hari'    => $hari,
					'tanggal' => $tanggal,
					'bulan'   => $bulan,
					'tahun'   => $tahun,
				];
				$subheader = [
					'icon'   => 'fal fa-book-open',
					'title'  => 'LKAI',
					'detail' => '',
				];
				$info      = [
					'main'      => 'Cadas',
					'sub'       => 'Administrasi',
					'active'    => 'LKAI',
					'date'      => $date,
					'subheader' => $subheader,
				];

				return json_encode($info);
			}
		}
	}

	public function lmi()
	{
		if (! empty($_GET))
		{
			if ($_GET['page'] === 'main')
			{
				$this->log(2, 'Telah Mengakses Menu Administrasi > Lembar Monitoring Informasi');
				return view('Administrasi/Intelijen/lmi', $this->data);
			}
			elseif ($_GET['page'] === 'info')
			{
				$hari      = date('l');
				$tanggal   = date('d');
				$bulan     = date('F');
				$tahun     = date('Y');
				$date      = [
					'hari'    => $hari,
					'tanggal' => $tanggal,
					'bulan'   => $bulan,
					'tahun'   => $tahun,
				];
				$subheader = [
					'icon'   => 'fal fa-book-open',
					'title'  => 'Lembar Monitoring Informasi',
					'detail' => '',
				];
				$info      = [
					'main'      => 'Cadas',
					'sub'       => 'Administrasi',
					'active'    => 'Lembar Monitoring Informasi',
					'date'      => $date,
					'subheader' => $subheader,
				];

				return json_encode($info);
			}
		}
	}

	public function getNomorLPPI()
	{
		$data = $this->model->getNomorLi();

		echo json_encode(['no' => (int)$data + 1]);
	}

	public function getNomorLKAI()
	{
		$data = $this->model->getNomorLKAI();

		echo json_encode(['no' => (int)$data + 1]);
	}

	public function getLPPIById()
	{
		if (! empty($_GET))
		{
			$data = $this->model->getLPPIById($_GET['ID']);

			echo json_encode($data);
		}
	}

	public function getLKAIById()
	{
		if (! empty($_GET))
		{
			$data['lkai'] = $this->model->getLKAIById($_GET['ID']);
			if ($data['lkai']['ID_LPPI'] !== null)
			{
				$data['lppi'] = $this->model->getLPPIById($data['lkai']['ID_LPPI']);
			}

			echo json_encode($data);
		}
	}

	public function postDataIntelijen()
	{
		switch ($_POST['FORM']) {
			case 'formLPPI':
				$status = $this->model->insertLPPI();
			break;

			case 'formLKAI':
				$status = $this->model->insertLKAI();
			break;

			default:
				$status = $this->model->insertNHI();
			break;
		}
		if ($status = true)
		{
			echo json_encode(['status' => 'success']);
		}
		else
		{
			echo json_encode(['status' => 'failed']);
		}
	}

	public function hapusDataIntelijen()
	{
		$status = $this->model->hapusDataIntelijen();

		if ($status = true)
		{
			echo json_encode(['status' => 'success']);
		}
		else
		{
			echo json_encode(['status' => 'failed']);
		}
	}
}
