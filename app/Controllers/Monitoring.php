<?php
namespace App\Controllers;

use App\Models\MonitoringModel;
use App\Models\DatatableModel;
use CodeIgniter\CLI\CLI;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;
use Soundasleep\Html2text\Html2text;

class Monitoring extends BaseController
{

	public function __construct($param = null)
	{
		$this->model     = new MonitoringModel();
		$this->datatable = new DatatableModel();
	}

	public function index()
	{
	}
	// Landing Page Menu
	public function umum()
	{
		if (! empty($_GET))
		{
			if ($_GET['page'] === 'main')
			{
				$this->data['tableTitle'] = 'Monitoring Umum Pengawasan';
				$this->log(2, 'Telah Mengakses Menu Penindakan dan Penyidikan > Monitoring Umum Pengawasan');
				return view('Monitoring/umum/pengawasan/index', $this->data);
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
					'title'  => 'Monitoring Umum Pengawasan',
					'detail' => 'Modul Monitoring Umum Pengawasan',
				];
				$info      = [
					'main'      => 'Cadas',
					'sub'       => 'Monitoring',
					'active'    => 'Monev Umum Pengawasan',
					'date'      => $date,
					'subheader' => $subheader,
				];

				return json_encode($info);
			}
		}
	}
	public function subkon()
	{
		if (! empty($_GET))
		{
			if ($_GET['page'] === 'main')
			{
				$this->data['tableTitle'] = 'Persetujuan Subkontrak';
				$this->log(2, 'Telah Mengakses Menu Penindakan dan Penyidikan > Monitoring Kegiatan Subkontrak');
				return view('Monitoring/subkon', $this->data);
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
					'title'  => 'Monitoring Kegiatan Subkontrak',
					'detail' => 'Modul Monitoring Kegiatan Subkontrak TLDDP',
				];
				$info      = [
					'main'      => 'Cadas',
					'sub'       => 'Monitoring',
					'active'    => 'Subkontrak',
					'date'      => $date,
					'subheader' => $subheader,
				];

				return json_encode($info);
			}
		}
	}

	public function akses()
	{
		if (! empty($_GET))
		{
			if ($_GET['page'] === 'main')
			{
				$this->data['tableTitle'] = 'Hasil Monitoring Akses';
				$this->log(2, 'Telah Mengakses Menu Monitoring > Monitoring Akses CCTV IT Inventory dan E-Seal');
				return view('Monitoring/Akses', $this->data);
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
					'title'  => 'Monitoring Akses CCTV, IT Inventory dan E-Seal',
					'detail' => 'Tabel Hasil Monitoring Akses CCTV, IT Inventory, dan E-Seal',
				];
				$info      = [
					'main'      => 'Cadas',
					'sub'       => 'Monitoring',
					'active'    => 'Akses',
					'date'      => $date,
					'subheader' => $subheader,
				];

				return json_encode($info);
			}
		}
	}

	// CRUD FUNCTION
	// MONEV UMUM

	public function ajax_edit_monum()
	{
		if (! empty($_GET))
		{
			$data = $this->model->getMonumById();
		}

		echo json_encode($data);
	}

	public function ajax_add_monum()
	{
		if(!empty($_POST)){
			$status = $this->model->addMonum();
			if ($status === TRUE) {
				$status = 'success';
				$pesan = "Data Laporan Monev Umum Monitoring Room Berhasil Direkam";
			} else {
				$status = 'failed';
				$pesan = "Data Laporan Monev Umum Monitoring Room Gagal Direkam";
			}
		}

		echo json_encode(['pesan'=>$pesan, 'status' => $status]);

		// echo json_encode($_POST);
	}

	public function ajax_update_monum()
	{
		if (! empty($_POST))
		{
			$status = $this->model->updateMonum();
			if ($status === true)
			{
				$status = 'success';
				$pesan  = 'Data Laporan Monev Umum Monitoring Room Berhasil Di Update';
			}
			else
			{
				$status = 'failed';
				$pesan  = 'Data Laporan Monev Umum Monitoring Room Gagal Di Update';
			}
		}

		echo json_encode(['pesan' => $pesan, 'status' => $status]);
	}

	public function ajax_delete_monum()
	{
		if (! empty($_GET))
		{
			$status = $this->model->deleteMonum();
			if ($status === true)
			{
				$pesan = 'Data berhasil dihapus';
			}
			else
			{
				$pesan = 'Data gagal dihapus';
			}

			echo json_encode($pesan);
		}
	}

	public function ajax_validate_monum()
	{
		if (! empty($_POST))
		{
			$data = $this->model->validateMonum();
			if ($data === true)
			{
				$pesan = [1];
			}
			else
			{
				$pesan = [2];
			}

			echo json_encode($pesan);
		}
	}

	// MONEV SUBKON
	public function addSubkon()
	{
		if (! empty($_POST))
		{
			if ($this->model->addPersetujuan() === true)
			{
				$pesan = 'Data Surat Persetujuan Subkontrak Berhasil Direkam';
				$this->log(3, 'Telah Merekam Data Surat Persetujuan Subkontrak');
			}
			elseif ($this->model->addPersetujuan() === true)
			{
				$pesan = 'Data Surat Persetujuan Subkontrak Gagal Direkam';
				$this->log(3, 'Gagal Merekam Data Surat Persetujuan Subkontrak');
			}
			else
			{
				$pesan = $this->model->addPersetujuan();
				$this->log(3, 'Gagal Merekam Data Surat Persetujuan Subkontrak, Data Ganda');
			}

			echo json_encode($pesan);
		}
	}

	public function addDetail()
	{
		if (! empty($_POST))
		{
			$this->model->addTransit();

			echo json_encode(['status' => true]);
		}
	}

	public function getDetailS()
	{
		if (! empty($_GET))
		{
			$data = $this->model->getDetailS();

			echo json_encode(['data' => $data]);
		}
	}

	// DATATABLE
	public function datatableList()
	{
		//start datatable
		$basisData = 'cadas';
		$tabel     = 'tb_subkon_persetujuan';
		$order     = [
			null,
			'NOMOR_SURAT',
			'TANGGAL_SURAT',
			'NPWP',
			'PENERIMA',
			'NPWP_PENERIMA',
		];
		$search    = [
			'NPWP',
			'NOMOR_SURAT',
			'TANGGAL_SURAT',
			'PENERIMA',
			'NPWP_PENERIMA',
		];
		$sort      = ['ID_PERSETUJUAN' => 'desc'];
		$filter    = [];

		$list = $this->datatable->GetDataTable($basisData, $tabel, $order, $search, $sort, $filter);
		$data = [];
		$no   = $_POST['start'];

		foreach ($list as $ListData)
		{
			$no++;
			$row   = [];
			$row[] = $no;
			$row[] = $ListData->NPWP;
			$row[] = strtoupper($ListData->NOMOR_SURAT);
			$row[] = $ListData->TANGGAL_SURAT;
			$row[] = $ListData->NPWP_PENERIMA;
			$row[] = $ListData->PENERIMA;
			$row[] = $ListData->ID_PERSETUJUAN;

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

	public function datatableListMonumPengawasan()
	{
		//start datatable
		$basisData = 'monev';
		$tabel     = 'monev_moncer_detail';
		$order     = [
			null,
			'NPWP',
			'nama_perusahaan',
			null,
			'tanggalLaporan',
			'tanggalLaporan',
		];
		$search    = [
			'NPWP',
			'nama_perusahaan',
			'tanggalLaporan',
		];
		$sort      = ['tanggalLaporan' => 'desc'];
		$filter    = [];

		$list = $this->datatable->GetDataTable($basisData, $tabel, $order, $search, $sort, $filter);
		$data = [];
		$no   = $_POST['start'];

		foreach ($list as $ListData)
		{
			$no++;
			$row   = [];
			$row[] = $no;
			$row[] = $ListData->NPWP;
			$row[] = strtoupper($ListData->nama_perusahaan) . '<br>' . $ListData->nama_tpb . '<br>' . $ListData->ijin_kelola_tpb;
			$row[] = $ListData->alamat;
			$row[] = date('F', strtotime($ListData->tanggalLaporan)) . ' - ' . date('Y', strtotime($ListData->tanggalLaporan));
			$row[] = $ListData->tanggalLaporan;
			$row[] = [
				'id'   => $ListData->id,
				'flag' => $ListData->flag,
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

	// ADVANCE FUNCTION
	public function getPerhitungan($persetujuan = 'S-638/WBC.09/KPP.MP.07/2020')
	{
		$data   = $this->model->getPerhitunganBySuratPersetujuan();
		$api    = 'https://api.telegram.org/';
		$token  = 'bot1198393550:AAEK9FGvs80_sn-pgHcZbG4wwfxiOMFPGqA/';
		$method = 'sendMessage';
		$chatId = '649237652';
		if ($data['status'] === 'ditemukan')
		{
				// Looping Through Data Persetujuan Bahan Baku
			for ($i = 0; $i < count($data['bahanBaku']); $i++)
			{
				// Look for data barang persejuan in data barang BC 2.6.1
				$arrayKey    = $this->searchArray($data['bahanBaku'][$i]['KODE_BARANG'], $data['barang261'], 'KODE_BARANG');
				$arrayKey2[] = $this->searchArray($data['bahanBaku'][$i]['KODE_BARANG'], $data['barang261'], 'KODE_BARANG');

				if ($arrayKey2[$i] !== false)
				{
					$sisa = floatval($data['bahanBaku'][$i]['JUMLAH_SATUAN']) - floatval($data['barang261'][$arrayKey]['JUMLAH_SATUAN']);
					if ($sisa === 0)
					{
						$dataCheckBb[] = [
							'KODE_BARANG' => $data['bahanBaku'][$i]['KODE_BARANG'],
							'KUOTA'       => floatval($data['bahanBaku'][$i]['JUMLAH_SATUAN']),
							'REALISASI'   => floatval($data['barang261'][$arrayKey]['JUMLAH_SATUAN']),
							'KETERANGAN'  => 'SESUAI',
						];
					}
					else
					{
						$dataCheckBb[] = [
							'KODE_BARANG' => $data['bahanBaku'][$i]['KODE_BARANG'],
							'KUOTA'       => floatval($data['bahanBaku'][$i]['JUMLAH_SATUAN']),
							'REALISASI'   => floatval($data['barang261'][$arrayKey]['JUMLAH_SATUAN']),
							'KETERANGAN'  => 'SELISIH ' . $sisa,
						];
					}
				}
				else
				{
					$dataCheckBb[$data['bahanBaku'][$i]['KODE_BARANG']] = 'DATA KODE BARANG TIDAK DITEMUKAN';
				}
			}

			for ($i = 0; $i < count($data['barangJadi']); $i++)
			{
				// Look for data barang persejuan in data barang BC 2.6.1
				$arrayKey    = $this->searchArray($data['barangJadi'][$i]['KODE_BARANG'], $data['barang262'], 'KODE_BARANG');
				$arrayKey2[] = $this->searchArray($data['bahanBaku'][$i]['KODE_BARANG'], $data['barang261'], 'KODE_BARANG');

				if ($arrayKey2[$i] !== false)
				{
					$sisa = floatval($data['barangJadi'][$i]['JUMLAH_SATUAN']) - floatval($data['barang262'][$arrayKey]['JUMLAH_SATUAN']);
					if ($sisa === 0)
					{
						$dataCheckBj[] = [
							'KODE_BARANG' => $data['barangJadi'][$i]['KODE_BARANG'],
							'KUOTA'       => floatval($data['barangJadi'][$i]['JUMLAH_SATUAN']),
							'REALISASI'   => floatval($data['barang262'][$arrayKey]['JUMLAH_SATUAN']),
							'KETERANGAN'  => 'SESUAI',
						];
					}
					else
					{
						$dataCheckBj[] = [
							'KODE_BARANG' => $data['barangJadi'][$i]['KODE_BARANG'],
							'KUOTA'       => floatval($data['barangJadi'][$i]['JUMLAH_SATUAN']),
							'REALISASI'   => floatval($data['barang262'][$arrayKey]['JUMLAH_SATUAN']),
							'KETERANGAN'  => 'SELISIH ' . $sisa,
						];
					}
				}
				else
				{
					$dataCheckBj[$data['barangJadi'][$i]['KODE_BARANG']] = 'DATA KODE BARANG TIDAK DITEMUKAN';
				}
			}

			$message  = "REPORT KEGIATAN SUBKONTRAK \n";
			$message .= 'NOMOR SURAT: ' . $data['persetujuan'][0]['NOMOR_SURAT'];
			$message .= "\nTANGGAL SURAT: " . $data['persetujuan'][0]['TANGGAL_SURAT'];
			$message .= "\nPENERIMA: " . $data['persetujuan'][0]['PENERIMA'];
			$message .= "\nALAMAT: " . $data['persetujuan'][0]['ALAMAT_PENERIMA'];
			$message .= "\nPEKERJAAN: " . $data['persetujuan'][0]['PEKERJAAN'];
			$message .= "\nNILAI JAMINAN: Rp " . number_format($data['persetujuan'][0]['NILAI_JAMINAN'], 2, '.', ',');
			$message .= "\nJATUH TEMPO: " . $data['persetujuan'][0]['TANGGAL_JATUH_TEMPO'];
			$message .= "\n \nDATA BAHAN BAKU: \n";

			for ($i = 0; $i < count($dataCheckBb); $i++)
			{
				$no       = $i + 1;
				$message .= $no . '. KODE BARANG: ' . $dataCheckBb[$i]['KODE_BARANG'] . "\n";
				$message .= '   KUOTA: ' . $dataCheckBb[$i]['KUOTA'] . "\n";
				$message .= '   REALISASI: ' . $dataCheckBb[$i]['REALISASI'] . "\n";
				$message .= '   KETERANGAN: ' . $dataCheckBb[$i]['KETERANGAN'] . "\n";
			}

			$message .= "\n DATA BARANG JADI: \n";

			for ($i = 0; $i < count($dataCheckBj); $i++)
			{
				$no       = $i + 1;
				$message .= $no . '. KODE BARANG: ' . $dataCheckBj[$i]['KODE_BARANG'] . "\n";
				$message .= '   KUOTA: ' . $dataCheckBj[$i]['KUOTA'] . "\n";
				$message .= '   REALISASI: ' . $dataCheckBj[$i]['REALISASI'] . "\n";
				$message .= '   KETERANGAN: ' . $dataCheckBj[$i]['KETERANGAN'] . "\n";
			}

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $api . $token . $method);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, ['chat_id' => $chatId, 'text' => $message]);

			$result = curl_exec($ch);
		}
		else
		{
			$message  = "REPORT KEGIATAN SUBKONTRAK \n";
			$message .= 'NOMOR SURAT: ' . $data['persetujuan'][0]['NOMOR_SURAT'];
			$message .= "\nTANGGAL SURAT: " . $data['persetujuan'][0]['TANGGAL_SURAT'];
			$message .= "\nPENERIMA: " . $data['persetujuan'][0]['PENERIMA'];
			$message .= "\nALAMAT: " . $data['persetujuan'][0]['ALAMAT_PENERIMA'];
			$message .= "\nPEKERJAAN: " . $data['persetujuan'][0]['PEKERJAAN'];
			$message .= "\nNILAI JAMINAN: Rp " . number_format($data['persetujuan'][0]['NILAI_JAMINAN'], 2, '.', ',');
			$message .= "\nJATUH TEMPO: " . $data['persetujuan'][0]['TANGGAL_JATUH_TEMPO'];
			$message .= "\n \nDATA DOKUMEN BC 261 262 TIDAK DITEMUKAN \n";

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $api . $token . $method);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, ['chat_id' => $chatId, 'text' => $message]);

			$result = curl_exec($ch);
		}

		return $result;
	}

	private function searchArray($n, $h, $field)
	{
		foreach ($h as $key => $value)
		{
			if ($value[$field] === $n)
			{
				return $key;
			}
		}

		return false;
	}

	public function getUpdateTelegram($offset = 0)
	{
		$api    = 'https://api.telegram.org/';
		$token  = 'bot1198393550:AAEK9FGvs80_sn-pgHcZbG4wwfxiOMFPGqA/';
		$method = 'getUpdates?offset=' . $offset;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api . $token . $method);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_POST, 1);
		// curl_setopt($ch, CURLOPT_POSTFIELDS, ['chat_id' => $chatId, 'text' => $message]);

		$result = curl_exec($ch);
		curl_close($ch);

		$array = (json_decode($result, true));

		foreach ($array['result'] as $key => $value)
		{
			print_r($value['message']['text']);
			echo '<br>';
		};
	}

	public function getasdf()
	{
		$data = $this->model->getPerhitunganBySuratPersetujuan();

		echo json_encode($data);
	}

	public function ajax_print_monum()
	{
		$data     = $this->model->getMonumById();
		$template = WRITEPATH . 'report/monev/template/template_monev_umum_moncer.docx';
		$dirDocx  = $dirPdf = 'assets/report/monev/';
		$thick    = mb_convert_encoding('&#x2714;', 'UTF-8', 'HTML-ENTITIES');
		// $fileDir = 'C:\xampp\htdocs\DashboardTPB\assets\upload\monev\report_docx\\';

		$headerLaporan = $data['laporan'];
		$isiLaporan    = $data['isi'];

		try
		{
			// \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
			$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template);
			$templateProcessor->setValue('nama_perusahaan', $headerLaporan['nama_perusahaan']);
			$templateProcessor->setValue('alamat', $headerLaporan['alamat']);
			$templateProcessor->setValue('tanggal', date('d-m-Y', strtotime($headerLaporan['tanggalLaporan'])));
			$templateProcessor->setValue('kesimpulan', $headerLaporan['kesimpulan']);
			$templateProcessor->setValue('nama', $headerLaporan['NamaPegawai']);

			for ($i = 0; $i < count($isiLaporan); $i++)
			{
				$templateProcessor->setValue('ket' . $isiLaporan[$i]['item'], $isiLaporan[$i]['keterangan']);
			}

			$fileName = 'Laporan_Moncer_' . $headerLaporan['idPerusahaan'] . '_' . date('d-m-Y', strtotime($headerLaporan['tanggalLaporan']));

			$report = WRITEPATH . 'report/monev/' . $fileName . '.docx';

			$templateProcessor->saveAs($report);

			shell_exec('libreoffice --headless --convert-to pdf:writer_pdf_Export --outdir /var/www/cadas.com/public/assets/report/monev /var/www/cadas.com/writable/report/monev/' . $fileName . '.docx');

			$pdfFile = $dirPdf . $fileName . '.pdf';

			unlink(WRITEPATH . 'report/monev/' . $fileName . '.docx');
		}
		catch (\BadMethodCallException $e)
		{
			$error = $e->getMessage();
		} finally {
			if (isset($error))
			{
				echo json_encode(['error', $error]);
			}
			else
			{
				echo json_encode(['success', $pdfFile, $fileName]);
			}
		}
	}

	public function ajax_delete_pdf_monum()
	{
		if (! empty($_POST))
		{
			if (unlink('/var/www/cadas.comcd /public/' . $_POST['fileName']))
			{
				echo json_encode('file berhasil dihapus');
			}
			else
			{
				echo json_encode('file gagal dihapus');
			}
		}
	}
}
