<?php 
namespace App\Controllers;

use App\Models\AksesModel;
use App\Models\StakeholdersModel;
use App\Models\KuisionerModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MonitoringPkc extends BaseController{
	
	public function __construct()
	{
		$this->akses = new AksesModel();
		$this->model = new StakeholdersModel();
		$this->kuisioner = new KuisionerModel();
	}
	
	public function index()
	{
		
	}

	public function Umum(){
		if (!empty($_GET)) {
			$this->data['tableTitle'] = 'DATA LAPORAN MONITORING UMUM';
			if ($_GET['page'] == "main") {
				$this->log(2,'Telah Mengakses Menu Pelayanan Kepabeanan dan Cukai > Monitoring Umum');
				return view('Pkc/Monitoring/Umum', $this->data);
			} elseif ($_GET['page'] == "info") {
				$hari = date('l');
				$tanggal = date('d');
				$bulan = date('F');
				$tahun = date('Y');
				$date = [
					'hari' => $hari,
					'tanggal' => $tanggal,
					'bulan' => $bulan,
					'tahun' => $tahun
				];
				$subheader = [
					'icon' => 'fal fa-edit',
					'title' => 'Monitoring Umum',
					'detail' => 'Laporan Monitoring Umum'
				];
				$info = [
					'main' => 'Cadas',
					'sub' => 'Pelayanan Kepabeanan dan Cukai',
					'active' => 'Laporan Monitoring Umum',
					'date' => $date,
					'subheader' => $subheader
				];
				
				return json_encode($info);
			}
		}
	}
	
	public function kuisionerDE(){
		if (!empty($_GET)) {
			$this->data['akses'] = 'DATA AKSES CCTV';
			$this->data['tableTitle'] = 'DATA KUISIONER DAMPAK EKONOMI';
			$this->data['tipeAkses'] = 1;
			if ($_GET['page'] == "main") {
				// $this->log(2,'Telah Mengakses Menu Admin Penindadakn dan Penyidikan > Upload Data Dokumen');
				return view('Pkc/Monitoring/DampakEkonomi', $this->data);
			} elseif ($_GET['page'] == "info") {
				$hari = date('l');
				$tanggal = date('d');
				$bulan = date('F');
				$tahun = date('Y');
				$date = [
					'hari' => $hari,
					'tanggal' => $tanggal,
					'bulan' => $bulan,
					'tahun' => $tahun
				];
				$subheader = [
					'icon' => 'fal fa-edit',
					'title' => 'Kuisioner',
					'detail' => 'Dampak Ekonomi'
				];
				$info = [
					'main' => 'Cadas',
					'sub' => 'Kuisioner',
					'active' => 'Dampak Ekonomi',
					'date' => $date,
					'subheader' => $subheader
				];
				
				return json_encode($info);
			}
		}
	}
	
	public function datatableList(){
		//start datatable
		
		$basisData = 'kuisioner';
		$tabel = 'master_detail';
		$order = ['ID', 'NPWP_PERUSAHAAN', 'NAMA_PERUSAHAAN', 'NAMA_LENGKAP_PENGISI', 'JABATAN_PENGISI', 'STATUS'];
		$search = ['NPWP', 'NAMA_PERUSAHAAN', 'STATUS'];
		$sort = ['ID' => 'asc'];
		$filter = [];
		
		$list = $this->datatable->GetDataTable($basisData, $tabel, $order, $search, $sort, $filter);
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $ListData) {
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $ListData->NPWP_PERUSAHAAN;
			$row[] = strtoupper($ListData->NAMA_PERUSAHAAN);
			$row[] = $ListData->TANGGAL_REKAM;
			$row[] = $ListData->NAMA_LENGKAP_PENGISI;
			$row[] = $ListData->JABATAN_PENGISI;
			$row[] = $ListData->ID;
			
			$data[] = $row;
		}
		
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->datatable->count_all($filter),
			"recordsFiltered" => $this->datatable->count_filtered($filter),
			"data" => $data,
		);
		
		echo json_encode($output);
	}
	
	public function viewKuisioner(){
		if (!empty($_GET)) {
			$data = $this->kuisioner->getKuisionerData($_GET['ID']);
			
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/Kuisioner_DE.xlsx');
			$worksheet = $spreadsheet->getActiveSheet();
			// SEND DATA TO EXCEL
			$worksheet->setCellValue('F1', 'KPPBC TMP Cikarang');
			$worksheet->setCellValue('F2', $data['master']['NAMA_LENGKAP_PENGISI']);
			$worksheet->setCellValue('F3', $data['master']['JABATAN_PENGISI']);
			$worksheet->setCellValue('F4', $data['master']['HANDPHONE']);
			$worksheet->setCellValue('F5', $data['master']['EMAIL_PENGISI']);
			$worksheet->setCellValue('F6', $data['profil']['NAMA_PERUSAHAAN']);
			$worksheet->setCellValueExplicit('F7',$data['profil']['NPWP_PERUSAHAAN'],\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
			$worksheet->setCellValue('F8', $data['profil']['EMAIL_PERUSAHAAN']);
			$worksheet->setCellValue('F9', $data['profil']['ALAMAT_PERUSAHAAN']);
			$worksheet->setCellValue('F10', $data['profil']['TAHUN_BERDIRI']);
			$fasilitasExcel = "";
			if (count($data['fasilitas']) > 0) {
				$i = 0;
				do {
					if ($i > 0) {
						$fasilitasExcel .= ", ";
					}
					$fasilitasExcel .= $data['fasilitas'][$i]['FASILITAS'];
					$i++;
				} while ($i < count($data['fasilitas']));
				$worksheet->setCellValue('F11', $fasilitasExcel);
			}
			$worksheet->setCellValue('F12', $data['profil']['TAHUN_FASILITAS']);
			$worksheet->setCellValue('F13', $data['profil']['IZIN_IUI']);
			$worksheet->setCellValue('F14', $data['profil']['JENIS_INVESTASI']);
			$worksheet->setCellValue('F15', $data['profil']['TUJUAN_PENJUALAN']);
			$worksheet->setCellValue('F17', $data['profil']['JENIS_PRODUKSI']);
			$worksheet->setCellValue('F18', $data['profil']['JENIS_INVESTASI']);
			$worksheet->setCellValue('F23', $data['profil']['FLAG_TPB_LAIN']);
			$sekitar = "";
			if (count($data['perusahaan_sekitar']) > 0) {
				$i = 0;
				do {
					if ($i > 0) {
						$sekitar .= ", ";
					}
					$sekitar .= $data['perusahaan_sekitar'][$i]['NAMA_PERUSAHAAN'];
					$i++;
				} while ($i < count($data['perusahaan_sekitar']));
				$worksheet->setCellValue('F24', $sekitar);
			}
			
			$barang_jadi = "";
			if (count($data['barang_jadi']) > 0) {
				$i = 0;
				do {
					if ($i > 0) {
						$barang_jadi .= ", ";
					}
					$barang_jadi .= $data['barang_jadi'][$i]['NAMA_BARANG'];
					$i++;
				} while ($i < count($data['barang_jadi']));
				$worksheet->setCellValue('F25', $barang_jadi);
			}
			
			$barang_merk = "";
			if (count($data['barang_merk']) > 0) {
				$i = 0;
				do {
					if ($i > 0) {
						$barang_merk .= ", ";
					}
					$barang_merk .= $data['barang_merk'][$i]['NAMA_BARANG'];
					$i++;
				} while ($i < count($data['barang_merk']));
				$worksheet->setCellValue('F26', $barang_merk);
			}
			
			$barang_baku_impor = "";
			if (count($data['barang_baku_impor']) > 0) {
				$i = 0;
				do {
					if ($i > 0) {
						$barang_baku_impor .= ", ";
					}
					$barang_baku_impor .= $data['barang_baku_impor'][$i]['NAMA_BARANG'];
					$i++;
				} while ($i < count($data['barang_baku_impor']));
				$worksheet->setCellValue('F27', $barang_baku_impor);
			}
			
			$barang_baku_lokal = "";
			if (count($data['barang_baku_lokal']) > 0) {
				$i = 0;
				do {
					if ($i > 0) {
						$barang_baku_lokal .= ", ";
					}
					$barang_baku_lokal .= $data['barang_baku_lokal'][$i]['NAMA_BARANG'];
					$i++;
				} while ($i < count($data['barang_baku_lokal']));
				$worksheet->setCellValue('F28', $barang_baku_lokal);
			}
			
			$worksheet->setCellValue('F29', (floatval($data['hasil_produksi']['PERSENTASE_LOKAL'])*100)."%");
			$worksheet->setCellValue('F30', floatval($data['hasil_produksi']['DEVISA_IMPOR']));
			$worksheet->setCellValue('F31', floatval($data['hasil_produksi']['DEVISA_EKSPOR']));
			$worksheet->setCellValue('F32', floatval($data['hasil_produksi']['NILAI_FASILTIAS']));
			$worksheet->setCellValue('F33', $data['tenaga_kerja']['TOTAL_TK']);
			$worksheet->setCellValue('F34', (int)$data['tenaga_kerja']['TKA_TERDIDIK_WN']+(int)$data['tenaga_kerja']['TKA_TERDIDIK_LK']+(int)$data['tenaga_kerja']['TKA_TERLATIH_WN']+(int)$data['tenaga_kerja']['TKA_TERLATIH_LK']+(int)$data['tenaga_kerja']['TKA_LAIN_WN']+(int)$data['tenaga_kerja']['TKA_LAIN_LK']);
			$worksheet->setCellValue('F35', (int)$data['tenaga_kerja']['TKA_TERDIDIK_WN']);
			$worksheet->setCellValue('F36', (int)$data['tenaga_kerja']['TKA_TERDIDIK_LK']);
			$worksheet->setCellValue('F37', (int)$data['tenaga_kerja']['TKA_TERLATIH_WN']);
			$worksheet->setCellValue('F38', (int)$data['tenaga_kerja']['TKA_TERLATIH_LK']);
			$worksheet->setCellValue('F39', (int)$data['tenaga_kerja']['TKA_LAIN_WN']);
			$worksheet->setCellValue('F40', (int)$data['tenaga_kerja']['TKA_LAIN_LK']);
			$worksheet->setCellValue('F41', (int)$data['tenaga_kerja']['TKL_TERDIDIK_WN']+(int)$data['tenaga_kerja']['TKL_TERDIDIK_LK']+(int)$data['tenaga_kerja']['TKL_TERLATIH_WN']+(int)$data['tenaga_kerja']['TKL_TERLATIH_LK']+(int)$data['tenaga_kerja']['TKL_LAIN_WN']+(int)$data['tenaga_kerja']['TKL_LAIN_LK']);
			$worksheet->setCellValue('F42', (int)$data['tenaga_kerja']['TKL_TERDIDIK_WN']);
			$worksheet->setCellValue('F43', (int)$data['tenaga_kerja']['TKL_TERDIDIK_LK']);
			$worksheet->setCellValue('F44', (int)$data['tenaga_kerja']['TKL_TERLATIH_WN']);
			$worksheet->setCellValue('F45', (int)$data['tenaga_kerja']['TKL_TERLATIH_LK']);
			$worksheet->setCellValue('F46', (int)$data['tenaga_kerja']['TKL_LAIN_WN']);
			$worksheet->setCellValue('F47', (int)$data['tenaga_kerja']['TKL_LAIN_LK']);
			$worksheet->setCellValue('F48', floatval($data['investasi']['TOTAL_INVESTASI']));
			$worksheet->setCellValue('F49', floatval($data['investasi']['NILAI_PENAMBAHAN']));
			$tambah_modal = "";
			if (count($data['investasi_tambah']) > 0) {
				$i = 0;
				do {
					if ($i > 0) {
						$tambah_modal .= ", ";
					}
					$tambah_modal .= $data['investasi_tambah'][$i]['BENTUK'];
					$i++;
				} while ($i < count($data['investasi_tambah']));
				$worksheet->setCellValue('F50', $tambah_modal);
			}
			
			$worksheet->setCellValue('F51', floatval($data['profil']['PPH_BADAN']));
			
			$sewa_modal = "";
			if (count($data['investasi_sewa']) > 0) {
				$i = 0;
				do {
					if ($i > 0) {
						$sewa_modal .= ", ";
					}
					$sewa_modal .= $data['investasi_sewa'][$i]['BENTUK'];
					$i++;
				} while ($i < count($data['investasi_sewa']));
				$worksheet->setCellValue('F52', $sewa_modal);
			}
			
			if ((int)$data['profil']['LABA'] > 0) {
				$worksheet->setCellValue('F53', floatval($data['profil']['LABA']));
			} else {
				$worksheet->setCellValue('F54', floatval($data['profil']['LABA']));
			}
			
			$worksheet->setCellValue('F55', floatval($data['profil']['LABA']));
			$worksheet->setCellValue('F62', floatval($data['profil']['PAJAK_DAERAH']));
			$worksheet->setCellValue('F63', floatval($data['profil']['BEBAN_GAJI']));
			$worksheet->setCellValue('F64', floatval($data['profil']['DEPRESIASI']));
			$worksheet->setCellValue('F65', floatval($data['profil']['PAJAK_TIDAK_LANGSUNG']));
			$worksheet->setCellValue('F66', (int)$data['jaringan_industri']['FASILITAS']);
			
			$nama_fasilitas = "";
			if (count($data['jaringan_fasilitas']) > 0) {
				$i = 0;
				do {
					if ($i > 0) {
						$nama_fasilitas .= ", ";
					}
					$nama_fasilitas .= $data['jaringan_fasilitas'][$i]['NAMA_PERUSAHAAN'];
					$i++;
				} while ($i < count($data['jaringan_fasilitas']));
				$worksheet->setCellValue('F67', $nama_fasilitas);
			}
			
			$nama_non_fasilitas = "";
			if (count($data['jaringan_non_fasilitas']) > 0) {
				$i = 0;
				do {
					if ($i > 0) {
						$nama_non_fasilitas .= ", ";
					}
					$nama_non_fasilitas .= $data['jaringan_non_fasilitas'][$i]['NAMA_PERUSAHAAN'];
					$i++;
				} while ($i < count($data['jaringan_non_fasilitas']));
				$worksheet->setCellValue('F68', $nama_non_fasilitas);
			}
			
			$jaringan_tenaga_kerja = 0;
			if (count($data['jaringan_tenaga_kerja']) > 0) {
				$i = 0;
				do {
					$jaringan_tenaga_kerja += (int)$data['jaringan_tenaga_kerja'][$i]['TENAGA_KERJA'];
					$i++;
				} while ($i < count($data['jaringan_tenaga_kerja']));
				$worksheet->setCellValue('F69', $jaringan_tenaga_kerja);
			}
			
			$worksheet->setCellValue('F68', (int)$data['jaringan_industri']['NON_FASILITAS']);
			$worksheet->setCellValue('F71', (int)$data['pelaku_usaha']['DAGANG_RT']);
			$worksheet->setCellValue('F72', (int)$data['pelaku_usaha']['DAGANG_KCL']);
			$worksheet->setCellValue('F73', (int)$data['pelaku_usaha']['DAGANG_SDG']);
			$worksheet->setCellValue('F74', (int)$data['pelaku_usaha']['DAGANG_BSR']);
			$worksheet->setCellValue('F75', (int)$data['pelaku_usaha']['AKOMODASI_RT']);
			$worksheet->setCellValue('F76', (int)$data['pelaku_usaha']['AKOMODASI_KCL']);
			$worksheet->setCellValue('F77', (int)$data['pelaku_usaha']['AKOMODASI_SDG']);
			$worksheet->setCellValue('F78', (int)$data['pelaku_usaha']['AKOMODASI_BSR']);
			$worksheet->setCellValue('F79', (int)$data['pelaku_usaha']['MAKANAN_RT']);
			$worksheet->setCellValue('F80', (int)$data['pelaku_usaha']['MAKANAN_KCL']);
			$worksheet->setCellValue('F81', (int)$data['pelaku_usaha']['MAKANAN_SDG']);
			$worksheet->setCellValue('F82', (int)$data['pelaku_usaha']['MAKANAN_BSR']);
			$worksheet->setCellValue('F83', (int)$data['pelaku_usaha']['TRANSPORT_RT']);
			$worksheet->setCellValue('F84', (int)$data['pelaku_usaha']['TRANSPORT_KCL']);
			$worksheet->setCellValue('F85', (int)$data['pelaku_usaha']['TRANSPORT_SDG']);
			$worksheet->setCellValue('F86', (int)$data['pelaku_usaha']['TRANSPORT_BSR']);
			switch ($data['umum']['UMUM_1']) {
				case "Sangat Setuju":
					$worksheet->setCellValue('F87', $data['umum']['UMUM_1']);
				break;
				case "Setuju":
					$worksheet->setCellValue('F88', $data['umum']['UMUM_1']);
				break;
				case "Netral":
					$worksheet->setCellValue('F89', $data['umum']['UMUM_1']);
				break;
				case "Tidak Setuju":
					$worksheet->setCellValue('F90', $data['umum']['UMUM_1']);
				break;
				default:
				$worksheet->setCellValue('F91', $data['umum']['UMUM_1']);
			break;
		}
		$worksheet->setCellValue('F92', $data['umum']['UMUM_1_JELAS']);
		$worksheet->setCellValue('F93', floatval($data['umum']['UMUM_2_A']));
		$worksheet->setCellValue('F94', floatval($data['umum']['UMUM_2_B']));
		$worksheet->setCellValue('F95', (floatval($data['umum']['UMUM_2_C'])*100)."%");
		$worksheet->setCellValue('F96', $data['umum']['UMUM_3']);
		$worksheet->setCellValue('F97', $data['umum']['UMUM_4']);
		$worksheet->setCellValue('F98', $data['umum']['UMUM_5_A']);
		$worksheet->setCellValue('F99', $data['umum']['UMUM_5_B']);
		$worksheet->setCellValue('G99', $data['umum']['UMUM_5_C']);
		$worksheet->setCellValue('F100', $data['umum']['UMUM_6_A']);
		$worksheet->setCellValue('F101', $data['umum']['UMUM_6_B']);
		$worksheet->setCellValue('F102', $data['umum']['UMUM_7']);
		$worksheet->setCellValue('F103', (floatval($data['umum']['UMUM_8_A'])*100)."%");
		$worksheet->setCellValue('F104', (floatval($data['umum']['UMUM_8_B'])*100)."%");
		$worksheet->setCellValue('F105', $data['umum']['UMUM_8_C']);
		$worksheet->setCellValue('F106', $data['umum']['UMUM_9']);
		$worksheet->setCellValue('F107', $data['umum']['UMUM_10']);
		$worksheet->setCellValue('F108', $data['umum']['UMUM_11']);
		
		
		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet,'Xls');
		
		$filename = 'Kuisioner_DE_'.$data['profil']['NAMA_PERUSAHAAN'].'_'.date('Y').'.xls';
		
		$writer->save('assets/kuisioner/dampak ekonomi/'.$filename);
		
		echo json_encode('assets/kuisioner/dampak ekonomi/'.$filename);
	}
}

public function getRekapitulasi(){
	$dataID = $this->kuisioner->getAllMasterID();
	$firstRow = 7;
	
	$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/Format Rekapitulasi.xlsx');
	$worksheet = $spreadsheet->getActiveSheet();
	
	
	for ($ai=0; $ai < count($dataID); $ai++) { 
		$writeRow = $firstRow+$ai;
		$data = $this->kuisioner->getKuisionerData($dataID[$ai]);
		$worksheet->setCellValue('A'.$writeRow, $ai+1);
		$worksheet->setCellValue('B'.$writeRow, "KPPBC TMP CIKARANG");
		$worksheet->setCellValue('C'.$writeRow, $data['master']['NAMA_LENGKAP_PENGISI']);
		$worksheet->setCellValue('D'.$writeRow, $data['master']['JABATAN_PENGISI']);
		$worksheet->setCellValue('E'.$writeRow, $data['master']['HANDPHONE']);
		$worksheet->setCellValue('F'.$writeRow, $data['master']['EMAIL_PENGISI']);
		$worksheet->setCellValue('G'.$writeRow, $data['profil']['NAMA_PERUSAHAAN']);
		$worksheet->setCellValueExplicit('H'.$writeRow,$data['profil']['NPWP_PERUSAHAAN'],\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
		$worksheet->setCellValue('I'.$writeRow, $data['profil']['EMAIL_PERUSAHAAN']);
		$worksheet->setCellValue('J'.$writeRow, $data['profil']['ALAMAT_PERUSAHAAN']);
		$worksheet->setCellValue('K'.$writeRow, $data['profil']['TAHUN_BERDIRI']);
		$fasilitasExcel = "";
		if (count($data['fasilitas']) > 0) {
			$i = 0;
			do {
				if ($i > 0) {
					$fasilitasExcel .= ", ";
				}
				$fasilitasExcel .= $data['fasilitas'][$i]['FASILITAS'];
				$i++;
			} while ($i < count($data['fasilitas']));
			$worksheet->setCellValue('L'.$writeRow, $fasilitasExcel);
		}
		$worksheet->setCellValue('M'.$writeRow, $data['profil']['TAHUN_FASILITAS']);
		$worksheet->setCellValue('N'.$writeRow, $data['profil']['IZIN_IUI']);
		$worksheet->setCellValue('O'.$writeRow, $data['profil']['JENIS_INVESTASI']);
		$worksheet->setCellValue('P'.$writeRow, $data['profil']['TUJUAN_PENJUALAN']);
		$worksheet->setCellValue('Q'.$writeRow, $data['profil']['JENIS_PRODUKSI']);
		$worksheet->setCellValue('R'.$writeRow, $data['profil']['JENIS_INVESTASI']);
		// GET NAMA DAERAH
		$provinsi = $this->kuisioner->getNamaDaerah($data['profil']['PROVINSI_PERUSAHAAN']);
		$kota = $this->kuisioner->getNamaDaerah($data['profil']['KOTA_PERUSAHAAN']);
		$kec = $this->kuisioner->getNamaDaerah($data['profil']['KECAMATAN_PERUSAHAAN']);
		$kelurahan = $this->kuisioner->getNamaDaerah($data['profil']['KELURAHAN_PERUSAHAAN']);

		$worksheet->setCellValue('S'.$writeRow, $provinsi['lokasi_nama']);
		$worksheet->setCellValue('T'.$writeRow, $kota['lokasi_nama']);
		$worksheet->setCellValueExplicit('U'.$writeRow, $kec['lokasi_nama'],\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
		$worksheet->setCellValue('V'.$writeRow, $kelurahan['lokasi_nama']);
		$worksheet->setCellValue('W'.$writeRow, $data['profil']['NAMA_JALAN_PERUSAHAAN']);
		$worksheet->setCellValue('X'.$writeRow, $data['profil']['FLAG_TPB_LAIN']);
		$sekitar = "";
		if (count($data['perusahaan_sekitar']) > 0) {
			$i = 0;
			do {
				if ($i > 0) {
					$sekitar .= ", ";
				}
				$sekitar .= $data['perusahaan_sekitar'][$i]['NAMA_PERUSAHAAN'];
				$i++;
			} while ($i < count($data['perusahaan_sekitar']));
			$worksheet->setCellValue('Y'.$writeRow, $sekitar);
		}
		
		$barang_jadi = "";
		if (count($data['barang_jadi']) > 0) {
			$i = 0;
			do {
				if ($i > 0) {
					$barang_jadi .= ", ";
				}
				$barang_jadi .= $data['barang_jadi'][$i]['NAMA_BARANG'];
				$i++;
			} while ($i < count($data['barang_jadi']));
			$worksheet->setCellValue('Z'.$writeRow, $barang_jadi);
		}
		
		$barang_merk = "";
		if (count($data['barang_merk']) > 0) {
			$i = 0;
			do {
				if ($i > 0) {
					$barang_merk .= ", ";
				}
				$barang_merk .= $data['barang_merk'][$i]['NAMA_BARANG'];
				$i++;
			} while ($i < count($data['barang_merk']));
			$worksheet->setCellValue('AA'.$writeRow, $barang_merk);
		}
		
		$barang_baku_impor = "";
		if (count($data['barang_baku_impor']) > 0) {
			$i = 0;
			do {
				if ($i > 0) {
					$barang_baku_impor .= ", ";
				}
				$barang_baku_impor .= $data['barang_baku_impor'][$i]['NAMA_BARANG'];
				$i++;
			} while ($i < count($data['barang_baku_impor']));
			$worksheet->setCellValue('AB'.$writeRow, $barang_baku_impor);
		}
		
		$barang_baku_lokal = "";
		if (count($data['barang_baku_lokal']) > 0) {
			$i = 0;
			do {
				if ($i > 0) {
					$barang_baku_lokal .= ", ";
				}
				$barang_baku_lokal .= $data['barang_baku_lokal'][$i]['NAMA_BARANG'];
				$i++;
			} while ($i < count($data['barang_baku_lokal']));
			$worksheet->setCellValue('AC'.$writeRow, $barang_baku_lokal);
		}
		
		$worksheet->setCellValue('AD'.$writeRow, (floatval($data['hasil_produksi']['PERSENTASE_LOKAL'])*100)."%");
		$worksheet->setCellValue('AE'.$writeRow, floatval($data['hasil_produksi']['DEVISA_IMPOR']));
		$worksheet->setCellValue('AF'.$writeRow, floatval($data['hasil_produksi']['DEVISA_EKSPOR']));
		$worksheet->setCellValue('AG'.$writeRow, floatval($data['hasil_produksi']['NILAI_FASILTIAS']));
		$worksheet->setCellValue('AH'.$writeRow, $data['tenaga_kerja']['TOTAL_TK']);
		$worksheet->setCellValue('AI'.$writeRow, (int)$data['tenaga_kerja']['TKA_TERDIDIK_WN']+(int)$data['tenaga_kerja']['TKA_TERDIDIK_LK']+(int)$data['tenaga_kerja']['TKA_TERLATIH_WN']+(int)$data['tenaga_kerja']['TKA_TERLATIH_LK']+(int)$data['tenaga_kerja']['TKA_LAIN_WN']+(int)$data['tenaga_kerja']['TKA_LAIN_LK']);
		$worksheet->setCellValue('AJ'.$writeRow, (int)$data['tenaga_kerja']['TKA_TERDIDIK_WN']);
		$worksheet->setCellValue('AK'.$writeRow, (int)$data['tenaga_kerja']['TKA_TERDIDIK_LK']);
		$worksheet->setCellValue('AL'.$writeRow, (int)$data['tenaga_kerja']['TKA_TERLATIH_WN']);
		$worksheet->setCellValue('AM'.$writeRow, (int)$data['tenaga_kerja']['TKA_TERLATIH_LK']);
		$worksheet->setCellValue('AN'.$writeRow, (int)$data['tenaga_kerja']['TKA_LAIN_WN']);
		$worksheet->setCellValue('AO'.$writeRow, (int)$data['tenaga_kerja']['TKA_LAIN_LK']);
		$worksheet->setCellValue('AP'.$writeRow, (int)$data['tenaga_kerja']['TKL_TERDIDIK_WN']+(int)$data['tenaga_kerja']['TKL_TERDIDIK_LK']+(int)$data['tenaga_kerja']['TKL_TERLATIH_WN']+(int)$data['tenaga_kerja']['TKL_TERLATIH_LK']+(int)$data['tenaga_kerja']['TKL_LAIN_WN']+(int)$data['tenaga_kerja']['TKL_LAIN_LK']);
		$worksheet->setCellValue('AQ'.$writeRow, (int)$data['tenaga_kerja']['TKL_TERDIDIK_WN']);
		$worksheet->setCellValue('AR'.$writeRow, (int)$data['tenaga_kerja']['TKL_TERDIDIK_LK']);
		$worksheet->setCellValue('AS'.$writeRow, (int)$data['tenaga_kerja']['TKL_TERLATIH_WN']);
		$worksheet->setCellValue('AT'.$writeRow, (int)$data['tenaga_kerja']['TKL_TERLATIH_LK']);
		$worksheet->setCellValue('AU'.$writeRow, (int)$data['tenaga_kerja']['TKL_LAIN_WN']);
		$worksheet->setCellValue('AV'.$writeRow, (int)$data['tenaga_kerja']['TKL_LAIN_LK']);
		$worksheet->setCellValue('AW'.$writeRow, floatval($data['investasi']['TOTAL_INVESTASI']));
		$worksheet->setCellValue('AX'.$writeRow, floatval($data['investasi']['NILAI_PENAMBAHAN']));
		$tambah_modal = "";
		if (count($data['investasi_tambah']) > 0) {
			$i = 0;
			do {
				if ($i > 0) {
					$tambah_modal .= ", ";
				}
				$tambah_modal .= $data['investasi_tambah'][$i]['BENTUK'];
				$i++;
			} while ($i < count($data['investasi_tambah']));
			$worksheet->setCellValue('AY'.$writeRow, $tambah_modal);
		}
		
		$worksheet->setCellValue('AZ'.$writeRow, $data['investasi']['BARANG_MODAL_DISEWA']);
		$sewa_modal = "";
		if (count($data['investasi_sewa']) > 0) {
			$i = 0;
			do {
				if ($i > 0) {
					$sewa_modal .= ", ";
				}
				$sewa_modal .= $data['investasi_sewa'][$i]['BENTUK'];
				$i++;
			} while ($i < count($data['investasi_sewa']));
			$worksheet->setCellValue('BA'.$writeRow, $sewa_modal);
		}
		
		if ((int)$data['profil']['LABA'] > 0) {
			$worksheet->setCellValue('BB'.$writeRow, floatval($data['profil']['LABA']));
		} else {
			$worksheet->setCellValue('BC'.$writeRow, floatval($data['profil']['LABA']));
		}
		
		$worksheet->setCellValue('BD'.$writeRow, floatval($data['profil']['PPH_BADAN']));
		$worksheet->setCellValue('BK'.$writeRow, floatval($data['profil']['PAJAK_DAERAH']));
		$worksheet->setCellValue('BL'.$writeRow, floatval($data['profil']['BEBAN_GAJI']));
		$worksheet->setCellValue('BM'.$writeRow, floatval($data['profil']['DEPRESIASI']));
		$worksheet->setCellValue('BN'.$writeRow, floatval($data['profil']['PAJAK_TIDAK_LANGSUNG']));
		$worksheet->setCellValue('BO'.$writeRow, (int)$data['jaringan_industri']['FASILITAS']);
		
		$nama_fasilitas = "";
		if (count($data['jaringan_fasilitas']) > 0) {
			$i = 0;
			do {
				if ($i > 0) {
					$nama_fasilitas .= ", ";
				}
				$nama_fasilitas .= $data['jaringan_fasilitas'][$i]['NAMA_PERUSAHAAN'];
				$i++;
			} while ($i < count($data['jaringan_fasilitas']));
			$worksheet->setCellValue('BP'.$writeRow, $nama_fasilitas);
		}
		$worksheet->setCellValue('BQ'.$writeRow, (int)$data['jaringan_industri']['NON_FASILITAS']);
		$nama_non_fasilitas = "";
		if (count($data['jaringan_non_fasilitas']) > 0) {
			$i = 0;
			do {
				if ($i > 0) {
					$nama_non_fasilitas .= ", ";
				}
				$nama_non_fasilitas .= $data['jaringan_non_fasilitas'][$i]['NAMA_PERUSAHAAN'];
				$i++;
			} while ($i < count($data['jaringan_non_fasilitas']));
			$worksheet->setCellValue('BR'.$writeRow, $nama_non_fasilitas);
		}
		
		$jaringan_tenaga_kerja = 0;
		if (count($data['jaringan_tenaga_kerja']) > 0) {
			$i = 0;
			do {
				$jaringan_tenaga_kerja += (int)$data['jaringan_tenaga_kerja'][$i]['TENAGA_KERJA'];
				$i++;
			} while ($i < count($data['jaringan_tenaga_kerja']));
			$worksheet->setCellValue('BS'.$writeRow, $jaringan_tenaga_kerja);
		}

		$worksheet->setCellValue('BT'.$writeRow, (int)$data['pelaku_usaha']['DAGANG_RT']);
		$worksheet->setCellValue('BU'.$writeRow, (int)$data['pelaku_usaha']['DAGANG_KCL']);
		$worksheet->setCellValue('BV'.$writeRow, (int)$data['pelaku_usaha']['DAGANG_SDG']);
		$worksheet->setCellValue('BW'.$writeRow, (int)$data['pelaku_usaha']['DAGANG_BSR']);
		$worksheet->setCellValue('BX'.$writeRow, (int)$data['pelaku_usaha']['AKOMODASI_RT']);
		$worksheet->setCellValue('BY'.$writeRow, (int)$data['pelaku_usaha']['AKOMODASI_KCL']);
		$worksheet->setCellValue('BZ'.$writeRow, (int)$data['pelaku_usaha']['AKOMODASI_SDG']);
		$worksheet->setCellValue('CA'.$writeRow, (int)$data['pelaku_usaha']['AKOMODASI_BSR']);
		$worksheet->setCellValue('CB'.$writeRow, (int)$data['pelaku_usaha']['MAKANAN_RT']);
		$worksheet->setCellValue('CC'.$writeRow, (int)$data['pelaku_usaha']['MAKANAN_KCL']);
		$worksheet->setCellValue('CD'.$writeRow, (int)$data['pelaku_usaha']['MAKANAN_SDG']);
		$worksheet->setCellValue('CE'.$writeRow, (int)$data['pelaku_usaha']['MAKANAN_BSR']);
		$worksheet->setCellValue('CF'.$writeRow, (int)$data['pelaku_usaha']['TRANSPORT_RT']);
		$worksheet->setCellValue('CG'.$writeRow, (int)$data['pelaku_usaha']['TRANSPORT_KCL']);
		$worksheet->setCellValue('CH'.$writeRow, (int)$data['pelaku_usaha']['TRANSPORT_SDG']);
		$worksheet->setCellValue('CI'.$writeRow, (int)$data['pelaku_usaha']['TRANSPORT_BSR']);
		switch ($data['umum']['UMUM_1']) {
			case "Sangat Setuju":
				$worksheet->setCellValue('CJ'.$writeRow, $data['umum']['UMUM_1']);
			break;
			case "Setuju":
				$worksheet->setCellValue('CK'.$writeRow, $data['umum']['UMUM_1']);
			break;
			case "Netral":
				$worksheet->setCellValue('CL'.$writeRow, $data['umum']['UMUM_1']);
			break;
			case "Tidak Setuju":
				$worksheet->setCellValue('CM'.$writeRow, $data['umum']['UMUM_1']);
			break;
			default:
			$worksheet->setCellValue('CN'.$writeRow, $data['umum']['UMUM_1']);
		break;
	}
	$worksheet->setCellValue('CO'.$writeRow, $data['umum']['UMUM_1_JELAS']);
	$worksheet->setCellValue('CP'.$writeRow, floatval($data['umum']['UMUM_2_A']));
	$worksheet->setCellValue('CQ'.$writeRow, floatval($data['umum']['UMUM_2_B']));
	$worksheet->setCellValue('CR'.$writeRow, (floatval($data['umum']['UMUM_2_C'])*100)."%");
	$worksheet->setCellValue('CS'.$writeRow, $data['umum']['UMUM_3']);
	$worksheet->setCellValue('CT'.$writeRow, $data['umum']['UMUM_4']);
	$worksheet->setCellValue('CU'.$writeRow, $data['umum']['UMUM_5_A']);
	$worksheet->setCellValue('CV'.$writeRow, $data['umum']['UMUM_5_B']);
	$worksheet->setCellValue('CV'.($writeRow+1), $data['umum']['UMUM_5_C']);
	$worksheet->setCellValue('CW'.$writeRow, $data['umum']['UMUM_6_A']);
	$worksheet->setCellValue('CX'.$writeRow, $data['umum']['UMUM_6_B']);
	$worksheet->setCellValue('CY'.$writeRow, $data['umum']['UMUM_7']);
	$worksheet->setCellValue('CZ'.$writeRow, (floatval($data['umum']['UMUM_8_A'])*100)."%");
	$worksheet->setCellValue('DA'.$writeRow, (floatval($data['umum']['UMUM_8_B'])*100)."%");
	$worksheet->setCellValue('DB'.$writeRow, $data['umum']['UMUM_8_C']);
	$worksheet->setCellValue('DC'.$writeRow, $data['umum']['UMUM_9']);
	$worksheet->setCellValue('DD'.$writeRow, $data['umum']['UMUM_10']);
	$worksheet->setCellValue('DE'.$writeRow, $data['umum']['UMUM_11']);
	$firstRow += 1;
}

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet,'Xlsx');

$filename = 'Rekapitulasi_'.date('Y').'.xlsx';

$writer->save('assets/kuisioner/dampak ekonomi/'.$filename);

echo json_encode('assets/kuisioner/dampak ekonomi/'.$filename);

// echo json_encode($data);
}
}