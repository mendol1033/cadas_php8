<?php
namespace App\Controllers;

use App\Models\AtensiModel;

class Atensi extends BaseController
{
	public function __construct()
	{
		$this->model = new AtensiModel();
	}

	public function impor()
	{
		if (! empty($_GET))
		{
			if ($_GET['page'] === 'main')
			{

				$this->data['tableTitle'] = 'Tabel Atensi Impor';
				$this->log(2, 'Telah Mengakses Menu Atensi > Impor');
				return view('Atensi/impor', $this->data);
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
					'title'  => 'Menu Utama Atensi Impor',
					'detail' => '',
				];
				$info      = [
					'main'      => 'Cadas',
					'sub'       => 'Atensi',
					'active'    => 'Impor',
					'date'      => $date,
					'subheader' => $subheader,
				];

				return json_encode($info);
			}
		}
	}

	public function datatableList()
	{
		//start datatable

		$basisData = 'dbpib';
		$tabel     = 'atensi';
		$order     = [
			null,
			'NO_CONTAINER',
			'NAMA_PERUSAHAAN',
		];
		$search    = [
			'NO_CONTAINER',
			'NAMA_PERUSAHAAN',
		];
		$sort      = ['ID' => 'desc'];
		$filter    = [];
		// if ($_POST['FLAG'] !== 0)
		// {
		// 	$filter['list']['FLAG_PROSES']        = $_POST['FLAG'];
		// 	$filter['countFilter']['FLAG_PROSES'] = $_POST['FLAG'];
		// 	$filter['countAll']['FLAG_PROSES']    = $_POST['FLAG'];
		// }

		$list = $this->datatable->GetDataTable($basisData, $tabel, $order, $search, $sort, $filter);
		$data = [];
		$no   = $_POST['start'];

		foreach ($list as $ListData)
		{
			$cdp = $this->model->getDataCdp($ListData->NO_CONTAINER);
			if ($cdp !== NULL) {
				$ceisa = $this->model->getDataCeisa($cdp['NOMOR_BL']);
			} else {
				$ceisa = [
					'NOMOR_PIB' => 'Data Belum Ditemukan',
					'TANGGAL_PIB' => 'Data Belum Ditemukan'
				];
			}

			if ($ceisa === "Data Tidak Ditemukan") {
				$nopen = 'Belum Aju Dokumen';
				$tgl_pib = "-";
			} else {
				$nopen = $ceisa['NOMOR_PIB'];
				$tgl_pib = $ceisa['TANGGAL_PIB'];
			}

			if ($cdp['WAKTU_GATE_OUT'] == '1969-12-31 18:00:00') {
				$waktuGateOut = "-";
			} else {
				$waktuGateOut = $cdp['WAKTU_GATE_OUT'];
			}

			if ($ceisa !== "Data Tidak Ditemukan") {
				$dataStatus = $this->model->getStatusCeisa($ceisa['NOMOR_PIB'], $ceisa['TANGGAL_PIB']);
				$statusCeisa = $dataStatus['URAIAN_PROSES'];
			} else {
				$statusCeisa = 'Data Belum Ditemukan';
			}


			
			
			$no++;
			$row   = [];
			$row[] = $no;
			$row[] = $ListData->NO_CONTAINER;
			$row[] = $ListData->NAMA_PERUSAHAAN;
			$row[] = $cdp['WAKTU_GATE_IN'];
			$row[] = $waktuGateOut;
			$row[] = $nopen;
			$row[] = $tgl_pib;
			$row[] = $statusCeisa;
			$row[] = [
				'id'   	=> $ListData->ID,
				'flag'	=> $ListData->FLAG
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

	public function postAtensi(){

		$status = $this->model->postAtensi();

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
