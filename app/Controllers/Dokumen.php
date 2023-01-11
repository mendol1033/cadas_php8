<?php
namespace App\Controllers;

use App\Models\DokumenModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dokumen extends BaseController
{

	public function __construct()
	{
		$this->model = new DokumenModel();
	}

	public function index()
	{
	}

	public function uploadDokumen()
	{
		if (! empty($_GET))
		{
			if ($_GET['page'] === 'main')
			{
				$this->log(2, 'Telah Mengakses Menu Admin Penindadakn dan Penyidikan > Upload Data Dokumen');
				return view('Dokumen/UploadDokumen');
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
					'title'  => 'Upload Data Dokumen',
					'detail' => 'Form Upload Data Dokumen CEISA TPB',
				];
				$info      = [
					'main'      => 'Cadas',
					'sub'       => 'Dokumen',
					'active'    => 'Upload Data Dokumen',
					'date'      => $date,
					'subheader' => $subheader,
				];

				return json_encode($info);
			}
		}
	}

	public function monitoringUpload()
	{
		if (! empty($_GET))
		{
			if ($_GET['page'] === 'main')
			{
				$this->log(2, 'Telah Mengakses Menu Admin Penindadakn dan Penyidikan > Monitoring Upload Data Dokumen');
				return view('Dokumen/MonitoringUpload');
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
					'title'  => 'Upload Data Dokumen',
					'detail' => 'Monitoring Upload Data Dokumen',
				];
				$info      = [
					'main'      => 'Cadas',
					'sub'       => 'Dokumen',
					'active'    => 'Monitoring Upload Data Dokumen',
					'date'      => $date,
					'subheader' => $subheader,
				];

				return json_encode($info);
			}
		}
	}

	public function uploadData()
	{
		if (! empty($_FILES))
		{
			switch ($_POST['jenisData']) {
				case 'tpb_header':
				$data = $this->uploadTpb('header');
				break;
				case 'tpb_detail':
				$data = $this->uploadTpb('detail');
				break;
				case 'impor_header':
				$data = $this->uploadImpor('header');
				break;
				case 'impor_detail':
				$data = $this->uploadImpor('detail');
				break;
				case 'impor_sptnp':
				$data = $this->uploadImpor('sptnp');
				break;
				case 'impor_fasilitas':
				$data = $this->uploadImpor('fasilitas');
				break;
				case 'impor_dokap':
				$data = $this->uploadImpor('dokap');
				break;
				case 'impor_status':
				$data = $this->uploadImpor('status');
				break;
				case 'cdp_activity':
				$data = $this->uploadImpor('cdp_activity');
				break;
				case 'ekspor_header':
				$data = $this->uploadEkspor('header');
				break;
				case 'ekspor_detail':
				$data = $this->uploadEkspor('detail');
				break;
				default:

				break;
			}

			$pesan = [];

			if ($data['status'] === false)
			{
				$pesan['pesan']  = $data['pesan'];
				$pesan['status'] = 'failed';
				$pesan['data'] = $data['missing'];
			}
			else
			{
				$pesan['pesan']  = $data['pesan'];
				$pesan['status'] = 'success';
				$pesan['data'] = $data['data'];
			}
		}

		echo json_encode($pesan);
	}

	private function convert_text_to_time($value){
		if (is_null($value)) {
			return null;
		} else {
			return strtotime($value);
		}
	}

	public function uploadTpb($type)
	{
		$files        = $this->request->getFiles();
		$arrayOldName = [];
		$arrayData    = [];
		$negara       = $this->model->getRefNegara();
		$komoditi     = $this->model->getRefKomoditi();
		$skema        = $this->model->getRefSkema();
		foreach ($files['dataExcel'] as $key => $file)
		{
			$data    = [];
			$oldName = $file->getName();

			$newName = date('Y-m-d') . '_' . $type . '_' . $oldName;
			$file->move(WRITEPATH . 'uploads', $newName);

			$reader   = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			$encoding = \PhpOffice\PhpSpreadsheet\Reader\Csv::guessEncoding(WRITEPATH . 'uploads/' . $newName);
			$reader->setInputEncoding('UTF-16LE');
			$reader->setDelimiter("\t");
			$reader->setEnclosure('"');
			$reader->setSheetIndex(0);

			$spreadsheet = $reader->load(WRITEPATH . 'uploads/' . $newName);

			$lastRow = $spreadsheet->getActiveSheet()->getHighestRow();

			$dataArray = $spreadsheet->getActiveSheet()->toArray();

			if ($type === 'header')
			{
				for ($i = 1; $i < $lastRow; $i++)
				{	
					$data[] = [
						'ID_HEADER'  => (int)$dataArray[$i][0],
						'KODE_DOKUMEN'  => (int)$dataArray[$i][1],
						'KODE_KANTOR'  => $dataArray[$i][2],
						'KODE_KANTOR_BONGKAR'  => $dataArray[$i][3],
						'KODE_KANTOR_TUJUAN'  => $dataArray[$i][4],
						'KODE_TPB_ASAL'  => (int)$dataArray[$i][5],
						'KODE_TPB_TUJUAN'  => (int)$dataArray[$i][6],
						'KODE_TUJUAN_PEMASUKAN'  => (int)$dataArray[$i][7],
						'KODE_TUJUAN_PENGIRIMAN'  => (int)$dataArray[$i][8],
						'LOKASI_ASAL'  => (int)$dataArray[$i][9],
						'LOKASI_TUJUAN' => (int)$dataArray[$i][10],
						'NOMOR_AJU' => $dataArray[$i][11],
						'NOMOR_DAFTAR' => $dataArray[$i][12],
						'TANGGAL_DAFTAR' => date('Y-m-d', $this->convert_text_to_time($dataArray[$i][13])),
						'ID_HANGGAR' => (int)$dataArray[$i][14],
						'NOMOR_BC11' => $dataArray[$i][15],
						'POS_BC11' => $dataArray[$i][16],
						'TANGGAL_BC11' => date('Y-m-d', $this->convert_text_to_time($dataArray[$i][17])),
						'ID_PENGUSAHA' => $dataArray[$i][18],
						'NAMA_PENGUSAHA' => $dataArray[$i][19],
						'NOMOR_IJIN_TPB' => $dataArray[$i][20],
						'NOMOR_API_PENGUSAHA' => $dataArray[$i][21],
						'ID_PENGIRIM' => $dataArray[$i][22],
						'NAMA_PENGIRIM' => $dataArray[$i][23],
						'ID_PPJK' => $dataArray[$i][24],
						'NAMA_PPJK' => $dataArray[$i][25],
						'ID_PENERIMA' => $dataArray[$i][26],
						'NAMA_PENERIMA' => $dataArray[$i][27],
						'NIPER_PENERIMA' => $dataArray[$i][28],
						'NOMOR_IZIN_TPB_PENERIMA' => $dataArray[$i][29],
						'ID_PEMILIK' => $dataArray[$i][30],
						'NAMA_PEMILIK' => $dataArray[$i][31],
						'ID_IMPORTIR' => $dataArray[$i][32],
						'NAMA_IMPORTIR' => $dataArray[$i][33],
						'NAMA_PEMASOK' => $dataArray[$i][34],
						'KODE_NEGARA_PEMASOK' => $dataArray[$i][35],
						'NAMA_PENGANGKUT' => $dataArray[$i][36],
						'NOMOR_VOY_FLIGHT' => $dataArray[$i][37],
						'KODE_BENDERA' => $dataArray[$i][38],
						'KODE_PEL_MUAT' => $dataArray[$i][39],
						'KODE_PEL_TRANSIT' => $dataArray[$i][40],
						'KODE_PEL_BONGKAR' => $dataArray[$i][41],
						'KODE_TPS' => $dataArray[$i][42],
						'NOMOR_POLISI' => $dataArray[$i][43],
						'JUMLAH_BARANG' => (int)$dataArray[$i][44],
						'JUMLAH_KEMASAN' => (int)$dataArray[$i][45],
						'BRUTO_HEADER' => $this->model->convert_text_to_float($dataArray[$i][46]),
						'NETTO_BARANG' => $this->model->convert_text_to_float($dataArray[$i][47]),
						'KODE_CARA_BAYAR' => $dataArray[$i][48],
						'KODE_JENIS_NILAI' => $dataArray[$i][49],
						'KODE_VALUTA' => $dataArray[$i][50],
						'NDPBM_REF' => $this->model->convert_text_to_float($dataArray[$i][51]),
						'CIF' => $this->model->convert_text_to_float($dataArray[$i][52]),
						'CIF_RUPIAH' => $this->model->convert_text_to_float($dataArray[$i][53]),
						'FOB' => $this->model->convert_text_to_float($dataArray[$i][54]),
						'FREIGHT' => $this->model->convert_text_to_float($dataArray[$i][55]),
						'ASURANSI' => $this->model->convert_text_to_float($dataArray[$i][56]),
						'HARGA_PENYERAHAN_BRG' => $this->model->convert_text_to_float($dataArray[$i][57]),
						'HARGA_PENYERAHAN_HDR' => $this->model->convert_text_to_float($dataArray[$i][58]),
						'TOTAL_NILAI_JAMINAN' => $this->model->convert_text_to_float($dataArray[$i][59]),
						'NILAI_INCOTERM' => $dataArray[$i][60],
						'NILAI_DEVISA_USD' => $this->model->convert_text_to_float($dataArray[$i][61]),
						'NILAI_DEVISA_IDR' => $this->model->convert_text_to_float($dataArray[$i][62]),
						'BM_NILAI_FASILITAS' => $this->model->convert_text_to_float($dataArray[$i][63]),
						'PPN_NILAI_FASILITAS' => $this->model->convert_text_to_float($dataArray[$i][64]),
						'PPH_NILAI_FASILITAS' => $this->model->convert_text_to_float($dataArray[$i][65]),
						'PPNBM_NILAI_FASILITAS' => $this->model->convert_text_to_float($dataArray[$i][66]),
						'BM_NILAI_BAYAR' => $this->model->convert_text_to_float($dataArray[$i][67]),
						'PPN_NILAI_BAYAR' => $this->model->convert_text_to_float($dataArray[$i][68]),
						'PPH_NILAI_BAYAR' => $this->model->convert_text_to_float($dataArray[$i][69]),
						'PPNBM_NILAI_BAYAR' => $this->model->convert_text_to_float($dataArray[$i][70]),
						'KATEGORI_LAYANAN' => (int)$dataArray[$i][71],
						'KODE_JALUR' => $dataArray[$i][72],
						'KODE_PROSES' => $dataArray[$i][73],
						'URAIAN_PROSES' => $dataArray[$i][74],
						'KODE_PROSES_PERBAIKAN' => $dataArray[$i][75],
						'URAIAN_PROSES_PERBAIKAN' => $dataArray[$i][76],
						'PERSENTASE_IMPOR' => $this->model->convert_text_to_float($dataArray[$i][77]),
						'BMKITE_NILAI_FASILITAS' => $this->model->convert_text_to_float($dataArray[$i][78]),
						'BMKITE_NILAI_BAYAR' => $this->model->convert_text_to_float($dataArray[$i][79]),
						'PERIODE'                                            => 'Y' . date('y', $this->convert_text_to_time($dataArray[$i][13])) . 'M' . date('m', $this->convert_text_to_time($dataArray[$i][13])) . 'W' . date('W', $this->convert_text_to_time($dataArray[$i][13])),
						'PERIODE_BULAN'                                      => 'Y' . date('y', $this->convert_text_to_time($dataArray[$i][13])) . 'M' . date('m', $this->convert_text_to_time($dataArray[$i][13])) . '-' . date('F', $this->convert_text_to_time($dataArray[$i][13])),
					];
				}
			}
			else
			{
				for ($i = 1; $i < $lastRow; $i++)
				{
					$data[] = [
						'ID_HEADER'  => (int)$dataArray[$i][0],
						'NOMOR_AJU'  => $dataArray[$i][1],
						'SERI_BARANG'  => (int)$dataArray[$i][2],
						'KODE_FASILITAS'  => $dataArray[$i][3],
						'KODE_NEGARA_ASAL'  => $dataArray[$i][4],
						'HS_CODE'  => $dataArray[$i][5],
						'KODE_BARANG'  => $dataArray[$i][6],
						'URAIAN_BARANG'  => $dataArray[$i][7],
						'MERK'  => $dataArray[$i][8],
						'TIPE'  => $dataArray[$i][9],
						'UKURAN' => $dataArray[$i][10],
						'SPESIFIKASI_LAIN' => $dataArray[$i][11],
						'KODE_KATEGORI_BARANG' => (int)$dataArray[$i][12],
						'KODE_KONDISI_BARANG' => (int)$dataArray[$i][13],
						'KODE_KEMASAN' => $dataArray[$i][14],
						'JUMLAH_KEMASAN' => (int)$dataArray[$i][15],
						'KODE_SATUAN' => $dataArray[$i][16],
						'JUMLAH_SATUAN' => $this->model->convert_text_to_float($dataArray[$i][17]),
						'NETTO_BARANG' => $this->model->convert_text_to_float($dataArray[$i][18]),
						'CIF' => $this->model->convert_text_to_float($dataArray[$i][19]),
						'CIF_RUPIAH' => $this->model->convert_text_to_float($dataArray[$i][20]),
						'FOB' => $this->model->convert_text_to_float($dataArray[$i][21]),
						'FREIGHT' => $this->model->convert_text_to_float($dataArray[$i][22]),
						'ASURANSI' => $this->model->convert_text_to_float($dataArray[$i][23]),
						'HARGA_PENYERAHAN_BRG' => $this->model->convert_text_to_float($dataArray[$i][24]),
						'BM_JENIS_PUNGUTAN' => $dataArray[$i][25],
						'BM_TARIF' => $this->model->convert_text_to_float($dataArray[$i][26]),
						'BM_NILAI_FASILITAS' => $this->model->convert_text_to_float($dataArray[$i][27]),
						'BM_NILAI_BAYAR' => $this->model->convert_text_to_float($dataArray[$i][28]),
						'PPN_JENIS_PUNGUTAN' => $dataArray[$i][29],
						'PPN_TARIF' => $this->model->convert_text_to_float($dataArray[$i][30]),
						'PPN_NILAI_FASILITAS' => $this->model->convert_text_to_float($dataArray[$i][31]),
						'PPN_NILAI_BAYAR' => $this->model->convert_text_to_float($dataArray[$i][32]),
						'PPH_JENIS_PUNGUTAN' => $dataArray[$i][33],
						'PPH_TARIF' => $this->model->convert_text_to_float($dataArray[$i][34]),
						'PPH_NILAI_FASILITAS' => $this->model->convert_text_to_float($dataArray[$i][35]),
						'PPH_NILAI_BAYAR' => $this->model->convert_text_to_float($dataArray[$i][36]),
						'PPNBM_JENIS_PUNGUTAN' => $dataArray[$i][37],
						'PPNBM_TARIF' => $this->model->convert_text_to_float($dataArray[$i][38]),
						'PPNBM_NILAI_FASILITAS' => $this->model->convert_text_to_float($dataArray[$i][39]),
						'PPNBM_NILAI_BAYAR' => $this->model->convert_text_to_float($dataArray[$i][40]),
						'NILAI_DEVISA_USD' => $this->model->convert_text_to_float($dataArray[$i][41]),
						'NILAI_DEVISA_IDR' => $this->model->convert_text_to_float($dataArray[$i][42]),
						'BMKITE_JENIS_PUNGUTAN' => $dataArray[$i][43],
						'BMKITE_TARIF' => $this->model->convert_text_to_float($dataArray[$i][44]),
						'BMKITE_NILAI_FASILITAS' => $this->model->convert_text_to_float($dataArray[$i][45]),
						'BMKITE_NILAI_BAYAR' => $this->model->convert_text_to_float($dataArray[$i][46]),
						'NOMOR_DAFTAR' => $dataArray[$i][47],
						'TANGGAL_DAFTAR' => date('Y-m-d', $this->convert_text_to_time($dataArray[$i][48])),
						'ID_PENGUSAHA' => $dataArray[$i][49],
						'NAMA_PENGUSAHA' => $dataArray[$i][50],
						'ID_PENERIMA' => $dataArray[$i][51],
						'NAMA_PENERIMA' => $dataArray[$i][52],
						'KOMODITI'=> $komoditi[substr($dataArray[$i][5], 0, 8)],
						'PERIODE' => 'Y' . date('y', $this->convert_text_to_time($dataArray[$i][48])) . 'M' . date('m', $this->convert_text_to_time($dataArray[$i][48])) . 'W' . date('W', $this->convert_text_to_time($dataArray[$i][48])),
						'PERIODE_BULAN' => 'Y' . date('y', $this->convert_text_to_time($dataArray[$i][48])) . 'M' . date('m', $this->convert_text_to_time($dataArray[$i][48])) . '-' . date('F', $this->convert_text_to_time($dataArray[$i][48])),
						'ID_IMPORTIR' => $dataArray[$i][53],
						'NAMA_IMPORTIR' => $dataArray[$i][54],
						'KODE_DOKUMEN' => $dataArray[$i][55],
					];
				}
			}

			$arrayData[] = $data;
			unlink(WRITEPATH . 'uploads/' . $newName);
			$arrayOldName[] = $oldName;
		}            
		$status = $this->model->insertTPB($type, $arrayData);
		if ($status === FALSE) {
			$pesan = 'GAGAL';
		} else {
			$pesan = 'SUKSES';
		}
		return [
			'status' => $status,
			'data' => $arrayOldName,
			'pesan' => $pesan
		];
	}

	public function uploadEkspor($type)
	{
		$files        = $this->request->getFiles();
		$arrayOldName = [];
		$arrayData    = [];
		$negara       = $this->model->getRefNegara();
		$komoditi     = $this->model->getRefKomoditi();
		$skema        = $this->model->getRefSkema();
		foreach ($files['dataExcel'] as $key => $file)
		{
			$data    = [];
			$oldName = $file->getName();

			$newName = date('Y-m-d') . '_' . $type . '_' . $oldName;
			$file->move(WRITEPATH . 'uploads', $newName);

			$reader   = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			$encoding = \PhpOffice\PhpSpreadsheet\Reader\Csv::guessEncoding(WRITEPATH . 'uploads/' . $newName);
			$reader->setInputEncoding('UTF-16LE');
			$reader->setDelimiter("\t");
			$reader->setEnclosure('"');
			$reader->setSheetIndex(0);

			$spreadsheet = $reader->load(WRITEPATH . 'uploads/' . $newName);

			$lastRow = $spreadsheet->getActiveSheet()->getHighestRow();

			$dataArray = $spreadsheet->getActiveSheet()->toArray();

			if ($type === 'header')
			{
				for ($i = 1; $i < $lastRow; $i++)
				{
					$data[] = [
						'ID_HEADER'  => (int)$dataArray[$i][0],
						'KODE_DOKUMEN'  => (int)$dataArray[$i][1],
						'KODE_KANTOR'  => $dataArray[$i][2],
						'KODE_KANTOR_BONGKAR'  => $dataArray[$i][3],
						'KODE_KANTOR_TUJUAN'  => $dataArray[$i][4],
						'KODE_TPB_ASAL'  => (int)$dataArray[$i][5],
						'KODE_TPB_TUJUAN'  => (int)$dataArray[$i][6],
						'KODE_TUJUAN_PEMASUKAN'  => (int)$dataArray[$i][7],
						'KODE_TUJUAN_PENGIRIMAN'  => (int)$dataArray[$i][8],
						'LOKASI_ASAL'  => (int)$dataArray[$i][9],
						'LOKASI_TUJUAN' => (int)$dataArray[$i][10],
						'NOMOR_AJU' => $dataArray[$i][11],
						'NOMOR_DAFTAR' => $dataArray[$i][12],
						'TANGGAL_DAFTAR' => date('Y-m-d', strtotime($dataArray[$i][13])),
						'ID_HANGGAR' => (int)$dataArray[$i][14],
						'NOMOR_BC11' => $dataArray[$i][15],
						'POS_BC11' => $dataArray[$i][16],
						'TANGGAL_BC11' => date('Y-m-d', strtotime($dataArray[$i][17])),
						'ID_PENGUSAHA' => $dataArray[$i][18],
						'NAMA_PENGUSAHA' => $dataArray[$i][19],
						'NOMOR_IJIN_TPB' => $dataArray[$i][20],
						'NOMOR_API_PENGUSAHA' => $dataArray[$i][21],
						'ID_PENGIRIM' => $dataArray[$i][22],
						'NAMA_PENGIRIM' => $dataArray[$i][23],
						'ID_PPJK' => $dataArray[$i][24],
						'NAMA_PPJK' => $dataArray[$i][25],
						'ID_PENERIMA' => $dataArray[$i][26],
						'NAMA_PENERIMA' => $dataArray[$i][27],
						'NIPER_PENERIMA' => $dataArray[$i][28],
						'NOMOR_IZIN_TPB_PENERIMA' => $dataArray[$i][29],
						'ID_PEMILIK' => $dataArray[$i][30],
						'NAMA_PEMILIK' => $dataArray[$i][31],
						'ID_IMPORTIR' => $dataArray[$i][32],
						'NAMA_IMPORTIR' => $dataArray[$i][33],
						'NAMA_PEMASOK' => $dataArray[$i][34],
						'KODE_NEGARA_PEMASOK' => $dataArray[$i][35],
						'NAMA_PENGANGKUT' => $dataArray[$i][36],
						'NOMOR_VOY_FLIGHT' => $dataArray[$i][37],
						'KODE_BENDERA' => $dataArray[$i][38],
						'KODE_PEL_MUAT' => $dataArray[$i][39],
						'KODE_PEL_TRANSIT' => $dataArray[$i][40],
						'KODE_PEL_BONGKAR' => $dataArray[$i][41],
						'KODE_TPS' => $dataArray[$i][42],
						'NOMOR_POLISI' => $dataArray[$i][43],
						'JUMLAH_BARANG' => (int)$dataArray[$i][44],
						'JUMLAH_KEMASAN' => (int)$dataArray[$i][45],
						'BRUTO_HEADER' => floatval(str_replace(',', '', $dataArray[$i][46])),
						'NETTO_BARANG' => floatval(str_replace(',', '', $dataArray[$i][47])),
						'KODE_CARA_BAYAR' => $dataArray[$i][48],
						'KODE_JENIS_NILAI' => $dataArray[$i][49],
						'KODE_VALUTA' => $dataArray[$i][50],
						'NDPBM_REF' => floatval(str_replace(',', '', $dataArray[$i][51])),
						'CIF' => floatval(str_replace(',', '', $dataArray[$i][52])),
						'CIF_RUPIAH' => floatval(str_replace(',', '', $dataArray[$i][53])),
						'FOB' => floatval(str_replace(',', '', $dataArray[$i][54])),
						'FREIGHT' => floatval(str_replace(',', '', $dataArray[$i][55])),
						'ASURANSI' => floatval(str_replace(',', '', $dataArray[$i][56])),
						'HARGA_PENYERAHAN_BRG' => floatval(str_replace(',', '', $dataArray[$i][57])),
						'HARGA_PENYERAHAN_HDR' => floatval(str_replace(',', '', $dataArray[$i][58])),
						'TOTAL_NILAI_JAMINAN' => floatval(str_replace(',', '', $dataArray[$i][59])),
						'NILAI_INCOTERM' => $dataArray[$i][60],
						'NILAI_DEVISA_USD' => floatval(str_replace(',', '', $dataArray[$i][61])),
						'NILAI_DEVISA_IDR' => floatval(str_replace(',', '', $dataArray[$i][62])),
						'BM_NILAI_FASILITAS' => floatval(str_replace(',', '', $dataArray[$i][63])),
						'PPN_NILAI_FASILITAS' => floatval(str_replace(',', '', $dataArray[$i][64])),
						'PPH_NILAI_FASILITAS' => floatval(str_replace(',', '', $dataArray[$i][65])),
						'PPNBM_NILAI_FASILITAS' => floatval(str_replace(',', '', $dataArray[$i][66])),
						'BM_NILAI_BAYAR' => floatval(str_replace(',', '', $dataArray[$i][67])),
						'PPN_NILAI_BAYAR' => floatval(str_replace(',', '', $dataArray[$i][68])),
						'PPH_NILAI_BAYAR' => floatval(str_replace(',', '', $dataArray[$i][69])),
						'PPNBM_NILAI_BAYAR' => floatval(str_replace(',', '', $dataArray[$i][70])),
						'KATEGORI_LAYANAN' => (int)$dataArray[$i][71],
						'KODE_JALUR' => $dataArray[$i][72],
						'KODE_PROSES' => $dataArray[$i][73],
						'URAIAN_PROSES' => $dataArray[$i][74],
						'KODE_PROSES_PERBAIKAN' => $dataArray[$i][75],
						'URAIAN_PROSES_PERBAIKAN' => $dataArray[$i][76],
						'PERSENTASE_IMPOR' => floatval(str_replace(',', '', $dataArray[$i][77])),
						'BMKITE_NILAI_FASILITAS' => floatval(str_replace(',', '', $dataArray[$i][78])),
						'BMKITE_NILAI_BAYAR' => floatval(str_replace(',', '', $dataArray[$i][79])),
						'PERIODE'                                            => 'Y' . date('y', strtotime($dataArray[$i][13])) . 'M' . date('m', strtotime($dataArray[$i][13])) . 'W' . date('W', strtotime($dataArray[$i][13])),
						'PERIODE_BULAN'                                      => 'Y' . date('y', strtotime($dataArray[$i][13])) . 'M' . date('m', strtotime($dataArray[$i][13])) . '-' . date('F', strtotime($dataArray[$i][13])),
					];
				}
			}
			else
			{
				for ($i = 1; $i < $lastRow; $i++)
				{
					$data[] = [
						'ID_HEADER'  => (int)$dataArray[$i][0],
						'NOMOR_AJU'  => $dataArray[$i][1],
						'SERI_BARANG'  => (int)$dataArray[$i][2],
						'KODE_FASILITAS'  => $dataArray[$i][3],
						'KODE_NEGARA_ASAL'  => $dataArray[$i][4],
						'HS_CODE'  => $dataArray[$i][5],
						'KODE_BARANG'  => $dataArray[$i][6],
						'URAIAN_BARANG'  => $dataArray[$i][7],
						'MERK'  => $dataArray[$i][8],
						'TIPE'  => $dataArray[$i][9],
						'UKURAN' => $dataArray[$i][10],
						'SPESIFIKASI_LAIN' => $dataArray[$i][11],
						'KODE_KATEGORI_BARANG' => (int)$dataArray[$i][12],
						'KODE_KONDISI_BARANG' => (int)$dataArray[$i][13],
						'KODE_KEMASAN' => $dataArray[$i][14],
						'JUMLAH_KEMASAN' => (int)$dataArray[$i][15],
						'KODE_SATUAN' => $dataArray[$i][16],
						'JUMLAH_SATUAN' => floatval(str_replace(',', '', $dataArray[$i][17])),
						'NETTO_BARANG' => floatval(str_replace(',', '', $dataArray[$i][18])),
						'CIF' => floatval(str_replace(',', '', $dataArray[$i][19])),
						'CIF_RUPIAH' => floatval(str_replace(',', '', $dataArray[$i][20])),
						'FOB' => floatval(str_replace(',', '', $dataArray[$i][21])),
						'FREIGHT' => floatval(str_replace(',', '', $dataArray[$i][22])),
						'ASURANSI' => floatval(str_replace(',', '', $dataArray[$i][23])),
						'HARGA_PENYERAHAN_BRG' => floatval(str_replace(',', '', $dataArray[$i][24])),
						'BM_JENIS_PUNGUTAN' => '-',
						'BM_TARIF' => 0,
						'BM_NILAI_FASILITAS' => 0,
						'BM_NILAI_BAYAR' => 0,
						'PPN_JENIS_PUNGUTAN' => '-',
						'PPN_TARIF' => 0,
						'PPN_NILAI_FASILITAS' => 0,
						'PPN_NILAI_BAYAR' => 0,
						'PPH_JENIS_PUNGUTAN' => '-',
						'PPH_TARIF' =>0,
						'PPH_NILAI_FASILITAS' => 0,
						'PPH_NILAI_BAYAR' => 0,
						'PPNBM_JENIS_PUNGUTAN' => '-',
						'PPNBM_TARIF' => 0,
						'PPNBM_NILAI_FASILITAS' => 0,
						'PPNBM_NILAI_BAYAR' => 0,
						'NILAI_DEVISA_USD' => floatval(str_replace(',', '', $dataArray[$i][25])),
						'NILAI_DEVISA_IDR' => floatval(str_replace(',', '', $dataArray[$i][26])),
						'BMKITE_JENIS_PUNGUTAN' => '-',
						'BMKITE_TARIF' => 0,
						'BMKITE_NILAI_FASILITAS' => 0,
						'BMKITE_NILAI_BAYAR' => 0,
						'NOMOR_DAFTAR' => $dataArray[$i][27],
						'TANGGAL_DAFTAR' => date('Y-m-d', strtotime($dataArray[$i][28])),
						'ID_PENGUSAHA' => $dataArray[$i][29],
						'NAMA_PENGUSAHA' => $dataArray[$i][30],
						'ID_PENERIMA' => $dataArray[$i][31],
						'NAMA_PENERIMA' => $dataArray[$i][32],
						'KOMODITI'=> $komoditi[substr($dataArray[$i][5], 0, 8)],
						'PERIODE' => 'Y' . date('y', strtotime($dataArray[$i][28])) . 'M' . date('m', strtotime($dataArray[$i][28])) . 'W' . date('W', strtotime($dataArray[$i][28])),
						'PERIODE_BULAN' => 'Y' . date('y', strtotime($dataArray[$i][28])) . 'M' . date('m', strtotime($dataArray[$i][28])) . '-' . date('F', strtotime($dataArray[$i][28])),
						'ID_IMPORTIR' => $dataArray[$i][33],
						'NAMA_IMPORTIR' => $dataArray[$i][34],
						'KODE_DOKUMEN' => $dataArray[$i][35],
					];
				}
			}

			$arrayData[] = $data;
			unlink(WRITEPATH . 'uploads/' . $newName);
			$arrayOldName[] = $oldName;
		}            
		$status = $this->model->insertTPB($type, $arrayData);
		if ($status === FALSE) {
			$pesan = 'GAGAL';
		} else {
			$pesan = 'SUKSES';
		}
		return [
			'status' => $status,
			'data' => $arrayOldName,
			'pesan' => $pesan
		];
	}

	public function uploadImpor($type){
		$files        = $this->request->getFiles();
		$arrayOldName = [];
		$arrayData    = [];
		$missingSign  = [];
		$sign         = $this->model->getRefSign();
		$negara       = $this->model->getRefNegara();
		$komoditi     = $this->model->getRefKomoditi();
		$skema        = $this->model->getRefSkema();
		foreach ($files['dataExcel'] as $key => $file){
			$data    = [];
			$oldName = $file->getName();

			$newName = date('Y-m-d') . '_' . $type . '_' . $oldName;
			if (! $file->isValid()){
				throw new \RuntimeException($file->getErrorString() . '(' . $file->getError() . ')');
			}
			$fileType = $file->getClientMimeType();
			$file->move(WRITEPATH . 'uploads/', $newName, true);

			if ($fileType === "text/csv" || $fileType === "application/vnd.ms-excel") {
				$reader   = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
				$encoding = \PhpOffice\PhpSpreadsheet\Reader\Csv::guessEncoding(WRITEPATH . 'uploads/' . $newName);
				$reader->setInputEncoding('UTF-16LE');
				$reader->setDelimiter("\t");
				$reader->setEnclosure('"');
				$reader->setSheetIndex(0);
			} else if ($fileType === "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				// $reader->setReadDataOnly(true);
			} else {
				$status = false;
				$pesan = "Tipe File Tidak Didukung";
			}

			if (isset($reader)) {
				$spreadsheet = $reader->load(WRITEPATH . 'uploads/' . $newName);
				$lastRow = $spreadsheet->getActiveSheet()->getHighestRow();

				$dataArray = $spreadsheet->getActiveSheet()->toArray();
				$pesan = 'test';
				if ($type === 'header'){
					for ($i = 1; $i < $lastRow; $i++){
						if ($dataArray[$i][1] == null) {
							$dataArray[$i][1] = $dataArray[$i-1][1];
						}
						if ($dataArray[$i][17] == null) {
							$dataArray[$i][17] = 0;
						}
						if ($dataArray[$i][18] == null) {
							$dataArray[$i][18] = 0;
						}
						if ($dataArray[$i][35] == null) {
							$dataArray[$i][35] = 0;
						}
						if ($dataArray[$i][36] == null) {
							$dataArray[$i][36] = 0;
						}
						if ($dataArray[$i][37] == null) {
							$dataArray[$i][37] = 0;
						}
						if ($dataArray[$i][38] == null) {
							$dataArray[$i][38] = 0;
						}
						if ($dataArray[$i][39] == null) {
							$dataArray[$i][39] = 0;
						}
						if (array_key_exists($dataArray[$i][4], $sign)){
							$data[$i] = [
								'NO_AJU'          => $dataArray[$i][0],
								'TGL_AJU'         => date('Y-m-d', strtotime($dataArray[$i][1])),
								'NO_PIB'          => $dataArray[$i][2],
								'TGL_PIB'         => date('Y-m-d', strtotime($dataArray[$i][3])),
								'NPWP_IMP'        => $dataArray[$i][4],
								'NM_IMP'          => $dataArray[$i][5],
								'NPWP_PPJK'       => $dataArray[$i][6],
								'NAMA_PPJK'       => $dataArray[$i][7],
								'NAMA_PEMASOK'    => $dataArray[$i][8],
								'NEG_PEMASOK'     => $dataArray[$i][9],
								'NPWP_IND'        => $dataArray[$i][10],
								'NM_IND'          => $dataArray[$i][11],
								'NM_PENGIRIM'     => $dataArray[$i][12],
								'NEG_PENGIRIM'    => $dataArray[$i][13],
								'NO_BC11'         => $dataArray[$i][14],
								'NO_POS_BC11'     => $dataArray[$i][15],
								'NO_SUB_POS_BC11' => $dataArray[$i][16],
								'TGL_BC11'        => date('Y-m-d', strtotime($dataArray[$i][17])),
								'TGL_TIBA'        => date('Y-m-d', strtotime($dataArray[$i][18])),
								'NO_VOY_FLIGHT'   => $dataArray[$i][19],
								'BENDERA_VOY'     => $dataArray[$i][20],
								'PEL_MUAT'        => $dataArray[$i][21],
								'PEL_TRANSIT'     => $dataArray[$i][22],
								'PEL_BONGKAR'     => $dataArray[$i][23],
								'STATUS_IMP'      => $dataArray[$i][24],
								'STATUS_JALUR'    => $dataArray[$i][25],
								'TMP_PENIMBUNAN'  => $dataArray[$i][26],
								'CARA_ANGKUT'     => (int)$dataArray[$i][27],
								'JNS_BAYAR'       => (int)$dataArray[$i][28],
								'JNS_IMP'         => (int)$dataArray[$i][29],
								'JNS_PIB'         => (int)$dataArray[$i][30],
								'KD_VAL'          => $dataArray[$i][31],
								'KET_STATUS_IMP'  => $dataArray[$i][32],
								'NDPBM'           => floatval(str_replace(',', '', $dataArray[$i][33])),
								'JML_CONT'        => (int)$dataArray[$i][34],
								'TEUS'            => floatval(str_replace(',', '', $dataArray[$i][35])),
								'NETTO'           => floatval(str_replace(',', '', $dataArray[$i][54])),
								'FOB'             => floatval(str_replace(',', '', $dataArray[$i][36])),
								'FREIGHT'         => floatval(str_replace(',', '', $dataArray[$i][37])),
								'ASURANSI'        => floatval(str_replace(',', '', $dataArray[$i][38])),
								'CIF'             => floatval(str_replace(',', '', $dataArray[$i][39])),
								'BMBY'            => floatval(str_replace(',', '', $dataArray[$i][51])),
								'BMKITEBY'        => floatval(str_replace(',', '', $dataArray[$i][52])),
								'BMTP'            => floatval(str_replace(',', '', $dataArray[$i][53])),
								'BMAD'			  => floatval(str_replace(',', '', $dataArray[$i][55])),
								'BMBBS'           => floatval(str_replace(',', '', $dataArray[$i][41])),
								'PPNBBS'          => floatval(str_replace(',', '', $dataArray[$i][42])),
								'PPNBY'			  => floatval(str_replace(',', '', $dataArray[$i][43])),
								'PPHBY'           => floatval(str_replace(',', '', $dataArray[$i][44])),
								'PPHBBS'          => floatval(str_replace(',', '', $dataArray[$i][45])),
								'PPNBMBY'         => floatval(str_replace(',', '', $dataArray[$i][46])),
								'PPNBMBBS'        => floatval(str_replace(',', '', $dataArray[$i][47])),
								'TOTAL_BM'		  => floatval(str_replace(',', '', $dataArray[$i][40])),
								'TOTAL_BAYAR' 	  => floatval(str_replace(',', '', $dataArray[$i][51]))+floatval(str_replace(',', '', $dataArray[$i][52]))+floatval(str_replace(',', '', $dataArray[$i][53]))+floatval(str_replace(',', '', $dataArray[$i][43]))+floatval(str_replace(',', '', $dataArray[$i][44]))+floatval(str_replace(',', '', $dataArray[$i][46])),
								'NILAI_PABEAN'	  => floatval(str_replace(',', '', $dataArray[$i][56])),
								'TAXBASE'         => floatval(str_replace(',', '', $dataArray[$i][48])),
								'FL_AUDIT'        => $dataArray[$i][49],
								'URAIAN_AUDIT'    => $dataArray[$i][50],
								'NEG_PEMASOK_2'   => $negara[$dataArray[$i][9]],
								'SIGN'            => $sign[$dataArray[$i][4]]['CP'],
								'RISK'            => $sign[$dataArray[$i][4]]['RISK'],
								'PERIODE'         => 'Y' . date('y', strtotime($dataArray[$i][3])) . 'M' . date('m', strtotime($dataArray[$i][3])) . 'W' . date('W', strtotime($dataArray[$i][3])),
								'PERIODE_BULAN'   => 'Y' . date('y', strtotime($dataArray[$i][3])) . 'M' . date('m', strtotime($dataArray[$i][3])) . '-' . date('F', strtotime($dataArray[$i][3])),
							];

							switch ($dataArray[$i][25]) {
								case 'H':
								$data[$i]['JALUR'] = 'HIJAU';
								break;
								case 'HH':
								$data[$i]['JALUR'] = 'HIJAU';
								break;
								case 'HM':
								$data[$i]['JALUR'] = 'HIJAU';
								break;
								case 'HT':
								$data[$i]['JALUR'] = 'HIJAU';
								break;
								case 'HL':
								$data[$i]['JALUR'] = 'HIJAU';
								break;
								case 'HP':
								$data[$i]['JALUR'] = 'HIJAU';
								break;
								case 'K':
								$data[$i]['JALUR'] = 'KUNING';
								break;
								case 'MK':
								$data[$i]['JALUR'] = 'KUNING';
								break;
								default:
								$data[$i]['JALUR'] = 'MERAH';
								break;
							}
						} else {
							if (!array_key_exists($dataArray[$i][4], $missingSign)) {
								$missingSign[$dataArray[$i][4]] = [
									'NPWP' => $dataArray[$i][4],
									'NamaImportir' => $dataArray[$i][5]
								];
							}
						}
					}
				}
				else if ($type === 'detail'){
					for ($i = 1; $i < $lastRow; $i++){
						$data[] = [
							'NO_AJU'        => $dataArray[$i][0],
							'TGL_AJU'       => date('Y-m-d', strtotime($dataArray[$i][1])),
							'NO_PIB'        => $dataArray[$i][2],
							'TGL_PIB'       => date('Y-m-d', strtotime($dataArray[$i][3])),
							'NPWP_IMP'      => $dataArray[$i][4],
							'NM_IMP'        => $dataArray[$i][5],
							'KD_VAL'        => $dataArray[$i][6],
							'NDPBM'         => floatval(str_replace(',', '', $dataArray[$i][7])),
							'SERI_BRG'      => (int)$dataArray[$i][8],
							'HS_CODE'       => $dataArray[$i][9],
							'KD_SKEP_FAS'   => $dataArray[$i][10],
							'URAIAN_BARANG' => $dataArray[$i][11],
							'MEREK'         => $dataArray[$i][12],
							'TYPE'          => $dataArray[$i][13],
							'JENIS_BKC'     => $dataArray[$i][14],
							'KOMODITI_BKC'  => $dataArray[$i][15],
							'MEREK_BKC'     => $dataArray[$i][16],
							'KD_SAT_HRG'    => $dataArray[$i][17],
							'JML_SAT_HRG'   => floatval(str_replace(',', '', $dataArray[$i][18])),
							'JNS_KMS'       => $dataArray[$i][19],
							'JML_KMS'       => floatval(str_replace(',', '', $dataArray[$i][20])),
							'NETTO'         => floatval(str_replace(',', '', $dataArray[$i][21])),
							'CIF'           => floatval(str_replace(',', '', $dataArray[$i][22])),
							'BMAD'          => floatval(str_replace(',', '', $dataArray[$i][23])),
							'BMBBS'         => floatval(str_replace(',', '', $dataArray[$i][24])),
							'BMBY'          => floatval(str_replace(',', '', $dataArray[$i][25])),
							'BMDP'          => floatval(str_replace(',', '', $dataArray[$i][26])),
							'BMKITEBY'      => floatval(str_replace(',', '', $dataArray[$i][27])),
							'BMTP'          => floatval(str_replace(',', '', $dataArray[$i][28])),
							'PPHBBS'        => floatval(str_replace(',', '', $dataArray[$i][29])),
							'PPHBY'         => floatval(str_replace(',', '', $dataArray[$i][30])),
							'PPHDP'         => floatval(str_replace(',', '', $dataArray[$i][31])),
							'PPHTDP'        => floatval(str_replace(',', '', $dataArray[$i][32])),
							'PPHTG'         => floatval(str_replace(',', '', $dataArray[$i][33])),
							'PPNBY'         => floatval(str_replace(',', '', $dataArray[$i][34])),
							'PPNTDP'        => floatval(str_replace(',', '', $dataArray[$i][35])),
							'PPNTG'         => floatval(str_replace(',', '', $dataArray[$i][36])),
							'PPNBBS'        => floatval(str_replace(',', '', $dataArray[$i][37])),
							'PPNBMBBS'      => floatval(str_replace(',', '', $dataArray[$i][38])),
							'PPNBMBY'       => floatval(str_replace(',', '', $dataArray[$i][39])),
							'PPNBMTG'       => floatval(str_replace(',', '', $dataArray[$i][40])),
							'TRF_BM'        => floatval(str_replace(',', '', $dataArray[$i][41])),
							'TRF_BMAD'      => floatval(str_replace(',', '', $dataArray[$i][42])),
							'TRF_BMKITE'    => floatval(str_replace(',', '', $dataArray[$i][42])),
							'TRF_PPH'       => floatval(str_replace(',', '', $dataArray[$i][42])),
							'TRF_PPN'       => floatval(str_replace(',', '', $dataArray[$i][42])),
							'TRF_PPNBM'     => floatval(str_replace(',', '', $dataArray[$i][42])),
							'KOMODITI'      => $komoditi[$dataArray[$i][9]],
							'SIGN'          => $sign[$dataArray[$i][4]]['CP'],
							'RISK'          => $sign[$dataArray[$i][4]]['RISK'],
							'TAXBASE'       => floatval(str_replace(',', '', $dataArray[$i][7])) * floatval(str_replace(',', '', $dataArray[$i][22])) + floatval(str_replace(',', '', $dataArray[$i][25])),
							'PERIODE'       => 'Y' . date('y', strtotime($dataArray[$i][3])) . 'M' . date('m', strtotime($dataArray[$i][3])) . 'W' . date('W', strtotime($dataArray[$i][3])),
							'PERIODE_BULAN' => 'Y' . date('y', strtotime($dataArray[$i][3])) . 'M' . date('m', strtotime($dataArray[$i][3])) . '-' . date('F', strtotime($dataArray[$i][3])),
						];
					}
				}
				elseif ($type === 'sptnp'){

					$columnName = $dataArray[1];

					foreach ($columnName as $key=>$value) {
						switch ($value) {
							case "BMADBY":
							$BMADBY = $key;
							break;

							case "BMBY":
							$BMBY = $key;
							break;

							case "BMTPBY":
							$BMTPBY = $key;
							break;

							case "BMTPSBY":
							$BMTPSBY = $key;
							break;

							case "BUNGA":
							$BUNGA = $key;
							break;

							case "DENDA":
							$DENDA = $key;
							break;

							case "PPHBY":
							$PPHBY = $key;
							break;
							
							case "PPNBY":
							$PPNBY = $key;
							break;

							case "PPNBMBY":
							$PPNBMBY = $key;
							break;

							case "BMPBY":
							$BMPBY = $key;
							break;	

							default:
								// code...
							break;
						}
					}

					for ($i = 2; $i < $lastRow; $i++){
						if ($dataArray[$i][14] == null) {
							$dataArray[$i][14] = 0;
						}
						if ($dataArray[$i][15] == null) {
							$dataArray[$i][15] = 0;
						}
						if ($dataArray[$i][16] == null) {
							$dataArray[$i][16] = 0;
						}
						if ($dataArray[$i][17] == null) {
							$dataArray[$i][17] = 0;
						}
						if ($dataArray[$i][18] == null) {
							$dataArray[$i][18] = 0;
						}
						if ($dataArray[$i][19] == null) {
							$dataArray[$i][19] = 0;
						}
						if ($dataArray[$i][20] == null) {
							$dataArray[$i][20] = 0;
						}
						if ($dataArray[$i][21] == null) {
							$dataArray[$i][21] = 0;
						}
						if ($dataArray[$i][22] == null) {
							$dataArray[$i][22] = 0;
						}
						$data[] = [
							'TGL_SPTNP'     => date('Y-m-d', strtotime($dataArray[$i][0])),
							'NO_SPTNP'      => $dataArray[$i][1],
							'NO_PIB'        => $dataArray[$i][2],
							'TGL_PIB'       => date('Y-m-d', strtotime($dataArray[$i][3])),
							'NO_AJU'        => $dataArray[$i][4],
							'NPWP'          => $dataArray[$i][5],
							'NAMA_IMPORTIR' => $dataArray[$i][6],
							'SALAH_JENIS'	=> $dataArray[$i][7],
							'SALAH_JUMLAH'	=> $dataArray[$i][8],
							'SALAH_NILAI'	=> $dataArray[$i][9],
							'SALAH_TARIF' 	=> $dataArray[$i][10],
							'TGL_LUNAS'     => date('Y-m-d', strtotime($dataArray[$i][11])),
							'KODE_STATUS'  	=> $dataArray[$i][12],
							'URAIAN_STATUS'	=> $dataArray[$i][13],
							'BMADBY'    	=> floatval(str_replace(',', '', $dataArray[$i][14])),
							'BMBY'  		=> floatval(str_replace(',', '', $dataArray[$i][15])),
							'BMTPBY'		=> floatval(str_replace(',', '', $dataArray[$i][16])),
							'BMTPSBY'		=> floatval(str_replace(',', '', $dataArray[$i][17])),
							'BUNGA'			=> floatval(str_replace(',', '', $dataArray[$i][18])),
							'DENDA'			=> floatval(str_replace(',', '', $dataArray[$i][19])),
							'PPHBY'			=> floatval(str_replace(',', '', $dataArray[$i][20])),
							'PPNBMBY'		=> floatval(str_replace(',', '', $dataArray[$i][21])),
							'PPNBY'			=> floatval(str_replace(',', '', $dataArray[$i][22])),
							'TOTAL_BAYAR'	=> floatval(str_replace(',', '', $dataArray[$i][14])) + floatval(str_replace(',', '', $dataArray[$i][15])) + floatval(str_replace(',', '', $dataArray[$i][16])) + floatval(str_replace(',', '', $dataArray[$i][17])) + floatval(str_replace(',', '', $dataArray[$i][18])) + floatval(str_replace(',', '', $dataArray[$i][19])) + floatval(str_replace(',', '', $dataArray[$i][20])) + floatval(str_replace(',', '', $dataArray[$i][21])) + floatval(str_replace(',', '', $dataArray[$i][22])),
							'PERIODE'       => 'Y' . date('y', strtotime($dataArray[$i][3])) . 'M' . date('m', strtotime($dataArray[$i][3])) . 'W' . date('W', strtotime($dataArray[$i][3])),
							'PERIODE_BULAN' => 'Y' . date('y', strtotime($dataArray[$i][3])) . 'M' . date('m', strtotime($dataArray[$i][3])) . '-' . date('F', strtotime($dataArray[$i][3])),
							'SIGN'          => $sign[$dataArray[$i][5]]['CP'],
							'RISK'			=> $sign[$dataArray[$i][5]]['RISK'],
						];
					}
				}
				elseif ($type === 'dokap') {
					for ($i = 1; $i < $lastRow; $i++){
						if (array_key_exists($dataArray[$i][6], $sign)){
							$data[] = [
								'NOMOR_AJU'        => $dataArray[$i][0],
								'NOMOR_PIB'        => $dataArray[$i][1],
								'TANGGAL_PIB'       => $dataArray[$i][3]."-".$dataArray[$i][4]."-".$dataArray[$i][5],
								'NPWP'			=> $dataArray[$i][6],
								'NAMA_IMPORTIR' => $dataArray[$i][7],
								'KODE_DOK'		=> $dataArray[$i][8],
								'URAIAN_DOK'	=> $dataArray[$i][9],
								'NOMOR_DOK'		=> $dataArray[$i][10],
								'TANGGAL_DOK'	=> $dataArray[$i][12]."-".$dataArray[$i][13]."-".$dataArray[$i][14],
								'SIGN'          => $sign[$dataArray[$i][6]]['CP'],
								'RISK'          => $sign[$dataArray[$i][6]]['RISK'],
								'PERIODE'       => 'Y' . date('y', strtotime($dataArray[$i][2])) . 'M' . date('m', strtotime($dataArray[$i][2])) . 'W' . date('W', strtotime($dataArray[$i][2])),
								'PERIODE_BULAN' => 'Y' . date('y', strtotime($dataArray[$i][2])) . 'M' . date('m', strtotime($dataArray[$i][2])) . '-' . date('F', strtotime($dataArray[$i][2])),
							];
						} else {
							if (!array_key_exists($dataArray[$i][6], $missingSign)) {
								$missingSign[$dataArray[$i][6]] = [
									'NPWP' => $dataArray[$i][6],
									'NamaImportir' => $dataArray[$i][7]
								];
							}
						}
					}
				}
				elseif ($type === 'status') {
					for ($i = 1; $i < $lastRow; $i++){
						if ($dataArray[$i][8] != null) {
							$waktuSelesai = $dataArray[$i][8];
						} else {
							$waktuSelesai = $dataArray[$i][7];
						}
						$data[] = [
							'NO_AJU'        => $dataArray[$i][2],
							'NO_PIB'        => $dataArray[$i][1],
							'TGL_PIB'       => date('Y-m-d',  strtotime($dataArray[$i][0])),
							'KODE_JALUR'	=> $dataArray[$i][3],
							'RULESET'		=> $dataArray[$i][4],
							'KODE_PROSES'	=> $dataArray[$i][5],
							'URAIAN_PROSES'	=> $dataArray[$i][6],
							'WAKTU_MULAI'	=> date('Y-m-d H:i:s', strtotime($dataArray[$i][7])),
							'WAKTU_SELESAI'	=> date('Y-m-d H:i:s', strtotime($waktuSelesai)),
							'NIP_MULAI'		=> $dataArray[$i][9],
							'NIP_SELESAI'	=> $dataArray[$i][10]
						];
					}
				}
				elseif ($type === 'cdp_activity') {
					for ($i = 1; $i < $lastRow; $i++){
						$data[] = [
							'NOMOR_BC11'		=> $dataArray[$i][1],
							'TANGGAL_BC11'		=> $dataArray[$i][2],
							'NOMOR_SP3BE'		=> $dataArray[$i][3],
							'TANGGAL_SP3BE'		=> $dataArray[$i][4],
							'WAKTU_GATE_IN'		=> date('Y-m-d H:i:s', strtotime($dataArray[$i][5])),
							'WAKTU_GATE_OUT'	=> date('Y-m-d H:i:s', strtotime($dataArray[$i][6])),
							'CONSIGNE'			=> $dataArray[$i][7],
							'NOMOR_BL'			=> $dataArray[$i][8],
							'TANGGAL_BL'		=> date('Y-m-d', strtotime($dataArray[$i][9])),
							'NOMOR_CONTAINER'	=> $dataArray[$i][10],
							'UKURAN_CONTAINER'	=> $dataArray[$i][11],
							'TIPE_CONTAINER'	=> $dataArray[$i][12],
							'SHIPPING_LINE'		=> $dataArray[$i][13],
							'TPS_ASAL' 			=> $dataArray[$i][14],
							'JENIS'				=> $dataArray[$i][15],
							'TANGGAL_FILE'		=> $_POST['tanggal'],
						];
					}
				}
				else{
					for ($i = 1; $i < $lastRow; $i++){
						$data[] = [
							strtoupper(str_replace(' ', '_', $dataArray[0][0])) => $dataArray[$i][0],
							strtoupper(str_replace(' ', '_', $dataArray[0][1])) => $dataArray[$i][1],
							strtoupper(str_replace(' ', '_', $dataArray[0][2])) => date('Y-m-d', strtotime($dataArray[$i][2])),
							strtoupper(str_replace(' ', '_', $dataArray[0][3])) => $dataArray[$i][3],
							strtoupper(str_replace(' ', '_', $dataArray[0][4])) => $dataArray[$i][4],
							strtoupper(str_replace(' ', '_', $dataArray[0][5])) => $dataArray[$i][5],
							'PERIODE'       => 'Y' . date('y', strtotime($dataArray[$i][2])) . 'M' . date('m', strtotime($dataArray[$i][2])) . 'W' . date('W', strtotime($dataArray[$i][2])),
							'PERIODE_BULAN' => 'Y' . date('y', strtotime($dataArray[$i][2])) . 'M' . date('m', strtotime($dataArray[$i][2])) . '-' . date('F', strtotime($dataArray[$i][2])),
							'SIGN'          => $sign[$dataArray[$i][3]]['CP'],
							'RISK'			=> $sign[$dataArray[$i][3]]['RISK']
						];
					}
				}

				$arrayData[] = $data;
				
				if (count($missingSign) > 0) {
					$status = false;
				} else {
					$status = $this->model->insertPIB($type, $arrayData);
				}

			}

			unlink(WRITEPATH . 'uploads/' . $newName);
			$arrayOldName[] = $oldName;
		}            

		return [
			'status' => $status,
			'pesan' 	=> $pesan,
			'missing'=> $missingSign,	
			'data' => $fileType
		];
	}

	public function getMonitoringUpload()
	{
		if (! empty($_GET))
		{
			$data = $this->model->monitoringUpload();

			echo json_encode($data);
		}
	}

	// DASHBOARD FUNCTION

	public function DataImportasi()
	{
		$data['importirAktif']      = (int)$this->model->getImportirAktif(date('Y'));
		$data['dokumenBerjalan']    = $this->model->getJumlahDokumen(date('Y'));
		$data['penerimaanBerjalan'] = floatval($this->model->getDataPenerimaan(date('Y')));
		$data['sptnpBerjalan']      = floatval($this->model->getDataSptnp(date('Y')));

		echo json_encode($data);
	}

	public function getPib1(){
		$data['chartPenerimaan']    = $this->model->getTeus(date('Y') - $_GET['tahun']);

		foreach ($data['chartPenerimaan'] as $key => $value)
		{
			$data['chartPenerimaanFix'][$value['TAHUN']][] = floatval($value['TEUS']);
		}

		foreach ($data['chartPenerimaanFix'] as $key => $value)
		{
			$data['chartPenerimaanFixFix'][] = [
				'name' => $key,
				'data' => $value,
			];
		}

		echo json_encode($data);
	}

	public function getPib2(){
		$dataTonase                 = $this->model->getTonase(date('Y') - 2);
		$dataTeus                   = $this->model->getTeus(date('Y') - 2);

		foreach ($dataTonase as $key => $value)
		{
			$key                                               = array_keys($value);
			$dataTonaseTeus[$key[2] . ' ' . $value['TAHUN']][] = floatval($value['TONASE']);
		}

		foreach ($dataTeus as $key => $value)
		{
			$key                                               = array_keys($value);
			$dataTonaseTeus[$key[2] . ' ' . $value['TAHUN']][] = floatval($value['TEUS']);
		}

		foreach ($dataTonaseTeus as $key => $value)
		{
			if (substr($key, 0, 4) === 'TEUS')
			{
				$chartTonaseTeus[] = [
					'type' => 'column',
					'name' => $key,
					'data' => $value,
				];
			}
			else
			{
				$chartTonaseTeus[] = [
					'type' => 'line',
					'name' => $key,
					'data' => $value,
				];
			}
		}

		$data['tonase'] = $chartTonaseTeus;

		echo json_encode($data);
	}

	public function getPib3(){
		$dataTotalTeus              = $this->model->getTotalTeus(date('Y') - 2, (int)date('m') + 1);
		$data['total']              = $this->model->totalBM(date('Y') - 2, (int)date('m') + 1);
		$sebaranY                   = $this->model->sebaranBM(date('Y'), (int)date('m') + 1);
		$sebaranY1                  = $this->model->sebaranBM(date('Y') - 1, (int)date('m') + 1);

		for ($i = 0; $i < count($dataTotalTeus); $i++)
		{
			$data['total'][$i]['TEUS'] = $dataTotalTeus[$i]['TEUS'];
		}

		foreach ($sebaranY as $key => $value)
		{
			$data['sebaranY'][] = [
				'name' => $key,
				'y'    => floatval($value),
			];
		}

		foreach ($sebaranY1 as $key => $value)
		{
			$data['sebaranY1'][] = [
				'name' => $key,
				'y'    => floatval($value),
			];
		}

		echo json_encode($data);
	}

	public function getPib4(){
		$data['totalBMY']           = $this->model->getTotalBM(date('Y'), (int)date('m') + 1);
		$data['totalBMY1']          = $this->model->getTotalBM(date('Y') - 1, (int)date('m') + 1);

		echo json_encode($data);
	}

	public function totalBM()
	{
		if (! empty($_POST))
		{
			$dataImportir = $this->model->getImportir();
			$basisData    = 'dbpib';
			$tabel        = 'tb_total_bm';
			$order        = [
				null,
				null,
				'TOTAL_BM',
			];
			$search       = [
				null,
				null,
				null,
			];
			$sort         = ['TOTAL_BM' => 'desc'];
			$filter       = [];
			if ($_POST['tahun'] !== 0)
			{
				$filter['list']['TAHUN']        = $_POST['tahun'];
				$filter['countFilter']['TAHUN'] = $_POST['tahun'];
				$filter['countAll']['TAHUN']    = $_POST['tahun'];
			}

			$list = $this->datatable->GetDataTable($basisData, $tabel, $order, $search, $sort, $filter);
			$data = [];
			$no   = $_POST['start'];
			foreach ($list as $ListData)
			{
				$no++;
				$row   = [];
				$row[] = $no;
				$row[] = $dataImportir[$ListData->NPWP_IMP];
				$row[] = (int)$ListData->TOTAL_BM;

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
	}

	public function bmKomoditi()
	{
		if (! empty($_POST))
		{
			$data = $this->model->getBmByKomoditi(date('Y'), (int)date('m') + 1);

			echo json_encode($data);
		}
	}

	public function tonaseKomoditi()
	{
		if (! empty($_POST))
		{
			$data = $this->model->getTonaseByKomoditi(date('Y'), (int)date('m') + 1);

			echo json_encode($data);
		}
	}

	public function getSptnp()
	{
		if (! empty($_GET))
		{
			$data['nilai']  = $this->model->getNilaiSptnp(date('Y') - 2);
			$data['jumlah'] = $this->model->getJumlahSptnp(date('Y') - 2);

			echo json_encode($data);
		}
	}

	public function DataTpb()
	{
		$data['importirAktif']      = (int)$this->model->getTpbAktif($_GET['kode'], date('Y'));
		$data['dokumenBerjalan']    = $this->model->getJumlahDokumenTpb($_GET['kode'], date('Y'));
		$data['penerimaanBerjalan'] = floatval($this->model->getDataPenerimaanTpb($_GET['kode'], date('Y')));
		$data['sptnpBerjalan']      = floatval($this->model->getDataSptnpTpb($_GET['kode'], date('Y')));
		$data['chartPenerimaan']    = $this->model->getPenerimaanTPB($_GET['kode'], date('Y') - 2);
		$dataTonase                 = $this->model->getTonaseTPB($_GET['kode'], date('Y') - 2);
		$dataTeus                   = $this->model->getDokumenTPB($_GET['kode'], date('Y') - 2);
		// $dataTotalTeus              = $this->model->getTotalTeusTpb(date('Y') - 2, (int)date('m') + 1);
		$data['total'] = $this->model->getTotalTpb($_GET['kode'], date('Y') - 2, (int)date('m') + 1);
		$sebaranY      = $this->model->sebaranBMTpb($_GET['kode'], date('Y'), (int)date('m') + 1);
		$sebaranY1     = $this->model->sebaranBMTpb($_GET['kode'], date('Y') - 1, (int)date('m') + 1);

		foreach ($data['chartPenerimaan'] as $key => $value)
		{
			$data['chartPenerimaanFix'][$value['TAHUN']][] = floatval($value['BM']);
		}

		foreach ($data['chartPenerimaanFix'] as $key => $value)
		{
			$data['chartPenerimaanFixFix'][] = [
				'name' => $key,
				'data' => $value,
			];
		}

		foreach ($dataTonase as $key => $value)
		{
			$key                                               = array_keys($value);
			$dataTonaseTeus[$key[2] . ' ' . $value['TAHUN']][] = floatval($value['TONASE']);
		}

		foreach ($dataTeus as $key => $value)
		{
			$key                                               = array_keys($value);
			$dataTonaseTeus[$key[2] . ' ' . $value['TAHUN']][] = floatval($value['TEUS']);
		}

		foreach ($dataTonaseTeus as $key => $value)
		{
			if (substr($key, 0, 4) === 'TEUS')
			{
				$chartTonaseTeus[] = [
					'type' => 'column',
					'name' => $key,
					'data' => $value,
				];
			}
			else
			{
				$chartTonaseTeus[] = [
					'type' => 'line',
					'name' => $key,
					'data' => $value,
				];
			}
		}

		foreach ($sebaranY as $key => $value)
		{
			$data['sebaranY'][] = [
				'name' => $key,
				'y'    => floatval($value),
			];
		}

		foreach ($sebaranY1 as $key => $value)
		{
			$data['sebaranY1'][] = [
				'name' => $key,
				'y'    => floatval($value),
			];
		}

		$data['tonase'] = $chartTonaseTeus;

		$data['bmkb20'] = $this->model->getPeringkatBmTpb($_GET['kode'], date('Y')-1, (int)date('m')+1);
		$data['bmkb21'] = $this->model->getPeringkatBmTpb($_GET['kode'], date('Y'), (int)date('m')+1);

		$data['bmKomoditi'] = $this->model->getPeringkatKomoditi($_GET['kode'], date('Y'), (int)date('m')+1, 'SUM(BM_NILAI_BAYAR + BMKITE_NILAI_BAYAR) AS OBJECT');
		$data['tonaseKomoditi'] = $this->model->getPeringkatKomoditi($_GET['kode'], date('Y'), (int)date('m')+1, 'SUM(NETTO_BARANG)/1000 AS OBJECT');

		echo json_encode($data);
	}

	public function UpdateRefImportir(){
		if (!empty($_POST)) {
			$data = [];
			for ($i=0; $i < count($_POST['npwp']); $i++) { 
				$data[] = [
					'NPWP' => $_POST['npwp'][$i],
					'IMPORTIR' => $_POST['namaPerusahaan'][$i],
					'RISK' => $_POST['risk'][$i],
					'CP' => $_POST['sign'][$i]
				];
			}

			$status = $this->model->UpdateRefImportir($data);

			echo json_encode($status);
		}
	}

	// DASHBOARD TAXBASE SECTION

	public function getPerbandingaTeus(){
		$dataTeusIbt = $this->model->getPerbandingaTeus(date('Y')-$_GET['tahun'], 'ibt');
		$dataTeus = $this->model->getPerbandingaTeus(date('Y')-$_GET['tahun'], 'non');

		$label = [];
		$seriesTeus = [];
		$seriesTeusIbt = [];

		foreach ($dataTeus as $key => $value) {
			$label[] = $value['PERIODE'];
			$seriesTeus[] = floatval($value['TEUS']);
		}

		foreach ($dataTeusIbt as $key => $value) {
			$seriesTeusIbt[] = floatval($value['TEUS']);
		}

		$data = ['label' => $label, 'series' => [['name' => 'Non-IBT',  'data' => $seriesTeus],['name' => 'IBT',  'data' => $seriesTeusIbt]]];

		echo json_encode($data);
	}

	public function getRataTaxbaseTeus(){
		$ibt = $this->model->rataTaxbaseTeus(date('Y')-$_GET['tahun'], 'ibt', 'periode');
		$non = $this->model->rataTaxbaseTeus(date('Y')-$_GET['tahun'], 'non', 'periode');
		$bayaribt = $this->model->rataBayarTeus(date('Y')-$_GET['tahun'], 'ibt');
		$bayarnon = $this->model->rataBayarTeus(date('Y')-$_GET['tahun'], 'non');
		$bayarNotulIbt = $this->model->rataBayarTeusNotul(date('Y')-$_GET['tahun'], 'ibt');

		foreach ($non as $key => $value) {
			$label[] = $value['PERIODE'];
			$seriesNon[] = floatval($value['RATA_TAXBASE']);
		}

		foreach ($ibt as $key => $value) {
			$seriesIbt[] = floatval($value['RATA_TAXBASE']);
		}

		foreach ($bayarnon as $key => $value) {
			$seriesBayarNon[] = floatval($value['RATA_BAYAR']);
		}

		foreach ($bayaribt as $key => $value) {
			$seriesBayarIbt[] = floatval($value['RATA_BAYAR']);
		}

		foreach ($bayarNotulIbt as $key => $value) {
			$seriesBayarNotul[] = floatval($value['RATA_BAYAR']);
		}

		$data = ['label' => $label, 'series' => [['name' => 'RATA2 TAXBASE per TEUs Non-IBT',  'data' => $seriesNon],['name' => 'RATA2 TAXBASE per TEUs IBT',  'data' => $seriesIbt], ['name' => 'RATA2 BAYAR per TEUs Non-IBT',  'data' => $seriesBayarNon], ['name' => 'RATA2 BAYAR per TEUs IBT',  'data' => $seriesBayarIbt], ['name' => 'RATA2 BAYAR per TEUs IBT Setelah Notul',  'data' => $seriesBayarNotul]]];

		echo json_encode($data);
	}

	public function getTotalTaxbase(){
		$sum = $this->model->totalTaxbase(date('Y')-$_GET['tahun'], 'all');
		$avg = $this->model->rataTaxbaseTeus(date('Y')-$_GET['tahun'], 'all', 'bulan');
		$avgVal = $this->model->avgValuta(date('Y')-$_GET['tahun']);

		$dataAvg = [];

		foreach ($avg as $key => $value) {
			$dataAvg[$value['TAHUN']][] = floatval($value['RATA_TAXBASE']);
		}

		foreach ($sum as $key => $value) {
			$dataChartSum[] = [
				'name' => $key,
				'data' => $value
			];
		}

		foreach ($dataAvg as $key => $value) {
			$dataChartAvg[] = [
				'name' => $key,
				'data' => $value
			];
		}

		$dataValuta = [];
		foreach ($avgVal as $key => $value) {
			$dataValuta[$value['VALUTA']][$value['TAHUN']] = $value['AVG_OF_NDPBM'];
		}

		$data = ['total' => $dataChartSum, 'avg' => $dataChartAvg, 'val' => $dataValuta];
		echo json_encode($data);
	}

	public function getPerbandingan(){
		$bulan = $this->model->getBulanTerakhir();
		$data = $this->model->getPerbandingan(date('Y') - $_GET['tahun'], (int)$bulan['BULAN']);

		$json = [
			'bulan' => $bulan,
			'data' => $data
		];
		echo json_encode($json);
	}

	public function getChartFta(){
		if (!empty($_GET)) {
			$data = $this->model->getDataPersenFta($_GET['risk'],$_GET['tahun']);

			foreach ($data['data'] as $key => $value) {
				$series[] = [
					'name' => strtoupper($key),
					'data' => $value
				];
			}

			$json = [
				'labels' => $data['periode'],
				'data' => $series,
				'type' => 'column'
			];

			echo json_encode($json);
		}
	}

	public function getPenjaluran(){
		if (!empty($_GET)) {

			$data = $this->model->getDataPenjaluran();

			$json = [
				'data' => [
					'all' => $data['all'],
					'low' => $data['low'],
					'ibt' => $data['ibt']
				],
				'title' => [
					'all' => 'ALL RISK',
					'low' => 'LOW RISK',
					'ibt' => 'VHRI'
				]
			];

			echo json_encode($json);
		}
	}

	// DASHBOARD TAXBASE SECTION
}
