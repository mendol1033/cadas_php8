<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DokumenModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DownloadExcel extends Controller
{

	function __construct($foo = null)
	{
		$this->model = new DokumenModel();
	}

	public function index(){

	}

	public function getJSON(){
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		header("Access-Control-Max-Age: 3600");
		header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
		if (!empty($_GET)) {
			if ($_GET['id'] === "BC051000" && $_GET['password'] === "bccikarang051000") {

				if ($_GET['type'] === "pemasukan") {
					$data = $this->model->getDokPemasukan();

					for ($i=0; $i < count($data[0]); $i++) { 
						$dataJson[$i] = [
							'ID_HEADER' => (int)$data[0][$i]['ID_HEADER'],
							'NOMOR_AJU'=> $data[0][$i]['NOMOR_AJU'],
							'KODE_DOKUMEN' => $data[0][$i]['KODE_DOKUMEN'],
							'TANGGAL_DAFTAR' => $data[0][$i]['TANGGAL_DAFTAR'],
							'NOMOR_DAFTAR' => $data[0][$i]['NOMOR_DAFTAR'],
							'NAMA_PEMASOK' => $data[0][$i]['NAMA_PEMASOK'],
							'NAMA_PENGIRIM' => $data[0][$i]['NAMA_PENGIRIM'],
							'NAMA_PENGUSAHA' => $data[0][$i]['NAMA_PENGUSAHA'],
							'KODE_VALUTA' => $data[0][$i]['KODE_VALUTA'],
							'KODE_BARANG' => $data[0][$i]['KODE_BARANG'],
							'URAIAN_BARANG' => $data[0][$i]['URAIAN_BARANG'],
							'KODE_SATUAN' => $data[0][$i]['KODE_SATUAN'],
							'CIF' => floatval($data[0][$i]['CIF']),
							'CIF_RUPIAH' => floatval($data[0][$i]['CIF_RUPIAH']),
							'HARGA_INVOICE' => floatval($data[0][$i]['HARGA_INVOICE']),
							'HARGA_PENYERAHAN_BRG' => floatval($data[0][$i]['HARGA_PENYERAHAN_BRG']),
							'HARGA_SATUAN' => floatval($data[0][$i]['HARGA_SATUAN']),
							'JUMLAH_SATUAN' => floatval($data[0][$i]['JUMLAH_SATUAN']),
							'HS_CODE' => $data[0][$i]['HS_CODE'],
							'SERI_BARANG' => $data[0][$i]['SERI_BARANG'],
							'ID_PENGUSAHA' => $data[0][$i]['ID_PENGUSAHA'],
							'STATUS' => $data[0][$i]['STATUS'],
							'BEA_MASUK' => floatval($data[0][$i]['BEA_MASUK']),
							'PPN' => floatval($data[0][$i]['PPN']),
							'PPH' => floatval($data[0][$i]['PPH']),
							'PPNBM' => floatval($data[0][$i]['PPNBM'])
						];

						if ($dataJson[$i]['NAMA_PEMASOK'] === null) {
							$dataJson[$i]['NAMA_PEMASOK'] = '-';
						}

						if ($dataJson[$i]['NAMA_PENGIRIM'] === null) {
							$dataJson[$i]['NAMA_PENGIRIM'] = '-';
						}
					}

					for ($a = 0; $a < count($data[1]) ; $a++) {
						$i++;
						$dataJson[$i] = [
							'ID_HEADER' => (int)$data[1][$a]['ID_HEADER'],
							'NOMOR_AJU'=> $data[1][$a]['NOMOR_AJU'],
							'KODE_DOKUMEN' => $data[1][$a]['KODE_DOKUMEN'],
							'TANGGAL_DAFTAR' => $data[1][$a]['TANGGAL_DAFTAR'],
							'NOMOR_DAFTAR' => $data[1][$a]['NOMOR_DAFTAR'],
							'NAMA_PEMASOK' => $data[1][$a]['NAMA_PENERIMA'],
							'NAMA_PENGIRIM' => $data[1][$a]['NAMA_PENGUSAHA'],
							'NAMA_PENGUSAHA' => $data[1][$a]['NAMA_IMPORTIR'],
							'KODE_VALUTA' => $data[1][$a]['KODE_VALUTA'],
							'KODE_BARANG' => $data[1][$a]['KODE_BARANG'],
							'URAIAN_BARANG' => $data[1][$a]['URAIAN_BARANG'],
							'KODE_SATUAN' => $data[1][$a]['KODE_SATUAN'],
							'CIF' => floatval($data[1][$a]['CIF']),
							'CIF_RUPIAH' => floatval($data[1][$a]['CIF_RUPIAH']),
							'HARGA_INVOICE' => floatval($data[1][$a]['HARGA_INVOICE']),
							'HARGA_PENYERAHAN_BRG' => floatval($data[1][$a]['HARGA_PENYERAHAN_BRG']),
							'HARGA_SATUAN' => floatval($data[1][$a]['HARGA_SATUAN']),
							'JUMLAH_SATUAN' => floatval($data[1][$a]['JUMLAH_SATUAN']),
							'HS_CODE' => $data[1][$a]['HS_CODE'],
							'SERI_BARANG' => $data[1][$a]['SERI_BARANG'],
							'ID_PENGUSAHA' => $data[1][$a]['ID_PENGUSAHA'],
							'STATUS' => $data[1][$a]['STATUS'],
							'BEA_MASUK' => floatval($data[1][$a]['BEA_MASUK']),
							'PPN' => floatval($data[1][$a]['PPN']),
							'PPH' => floatval($data[1][$a]['PPH']),
							'PPNBM' => floatval($data[1][$a]['PPNBM'])
						];

						if ($dataJson[$i]['NAMA_PEMASOK'] === null) {
							$dataJson[$i]['NAMA_PEMASOK'] = '-';
						}

						if ($dataJson[$i]['NAMA_PENGIRIM'] === null) {
							$dataJson[$i]['NAMA_PENGIRIM'] = '-';
						}
					}
				} else {
					$data = $this->model->getDokPengeluaran();

					for ($i=0; $i < count($data); $i++) { 
						$dataJson[$i] = [
							'ID_HEADER' => (int)$data[$i]['ID_HEADER'],
							'NOMOR_AJU'=> $data[$i]['NOMOR_AJU'],
							'KODE_DOKUMEN' => $data[$i]['KODE_DOKUMEN'],
							'TANGGAL_DAFTAR' => $data[$i]['TANGGAL_DAFTAR'],
							'NOMOR_DAFTAR' => $data[$i]['NOMOR_DAFTAR'],
							'NAMA_PEMASOK' => $data[$i]['NAMA_PEMASOK'],
							'NAMA_PENGIRIM' => $data[$i]['NAMA_PENGIRIM'],
							'NAMA_PENGUSAHA' => $data[$i]['NAMA_PENGUSAHA'],
							'KODE_VALUTA' => $data[$i]['KODE_VALUTA'],
							'KODE_BARANG' => $data[$i]['KODE_BARANG'],
							'URAIAN_BARANG' => $data[$i]['URAIAN_BARANG'],
							'KODE_SATUAN' => $data[$i]['KODE_SATUAN'],
							'CIF' => floatval($data[$i]['CIF']),
							'CIF_RUPIAH' => floatval($data[$i]['CIF_RUPIAH']),
							'HARGA_INVOICE' => floatval($data[$i]['HARGA_INVOICE']),
							'HARGA_PENYERAHAN_BRG' => floatval($data[$i]['HARGA_PENYERAHAN_BRG']),
							'HARGA_SATUAN' => floatval($data[$i]['HARGA_SATUAN']),
							'JUMLAH_SATUAN' => floatval($data[$i]['JUMLAH_SATUAN']),
							'HS_CODE' => $data[$i]['HS_CODE'],
							'SERI_BARANG' => $data[$i]['SERI_BARANG'],
							'ID_PENGUSAHA' => $data[$i]['ID_PENGUSAHA'],
							'STATUS' => $data[$i]['STATUS'],
							'BEA_MASUK' => floatval($data[$i]['BEA_MASUK']),
							'PPN' => floatval($data[$i]['PPN']),
							'PPH' => floatval($data[$i]['PPH']),
							'PPNBM' => floatval($data[$i]['PPNBM'])
						];

						if ($dataJson[$i]['NAMA_PEMASOK'] === null) {
							$dataJson[$i]['NAMA_PEMASOK'] = '-';
						}

						if ($dataJson[$i]['NAMA_PENGIRIM'] === null) {
							$dataJson[$i]['NAMA_PENGIRIM'] = '-';
						}
					}
				}
				$return = ['data' => $dataJson];
				echo json_encode($return);
			} else {
				print("ACCESS FORBIDDEN");
			}
		} else {
			print("ACCESS FORBIDDEN");
		}
	}


	public function getPemasukan()
	{
		if (!empty($_GET)) {
			if ($_GET['id'] === "BC051000" && $_GET['password'] === "bccikarang051000") {
				$data = $this->model->getDokPemasukan();
				$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/template_gocik_in.xlsx');
				$worksheet = $spreadsheet->getActiveSheet();
				$firstRow = 2;

				for ($i=0; $i < count($data); $i++) { 
					$writeRow = $firstRow+$i;
					$worksheet->setCellValue('A'.$writeRow, $data[$i]['ID_HEADER']);
					$worksheet->setCellValue('B'.$writeRow, $data[$i]['NOMOR_AJU']);
					$worksheet->setCellValue('C'.$writeRow, $data[$i]['KODE_DOKUMEN']);
					$worksheet->setCellValue('D'.$writeRow, $data[$i]['TANGGAL_DAFTAR']);
					$worksheet->setCellValue('E'.$writeRow, $data[$i]['NOMOR_DAFTAR']);
					$worksheet->setCellValue('F'.$writeRow, $data[$i]['NAMA_PEMASOK']);
					$worksheet->setCellValue('G'.$writeRow, $data[$i]['NAMA_PENGIRIM']);
					$worksheet->setCellValue('H'.$writeRow, $data[$i]['NAMA_PENGUSAHA']);
					$worksheet->setCellValue('I'.$writeRow, $data[$i]['KODE_VALUTA']);
					$worksheet->setCellValue('J'.$writeRow, $data[$i]['KODE_BARANG']);
					$worksheet->setCellValue('K'.$writeRow, $data[$i]['URAIAN_BARANG']);
					$worksheet->setCellValue('L'.$writeRow, $data[$i]['KODE_SATUAN']);
					$worksheet->setCellValue('M'.$writeRow, $data[$i]['CIF']);
					$worksheet->setCellValue('N'.$writeRow, $data[$i]['CIF_RUPIAH']);
					$worksheet->setCellValue('O'.$writeRow, $data[$i]['HARGA_INVOICE']);
					$worksheet->setCellValue('P'.$writeRow, $data[$i]['HARGA_PENYERAHAN_BRG']);
					$worksheet->setCellValue('Q'.$writeRow, $data[$i]['HARGA_SATUAN']);
					$worksheet->setCellValue('R'.$writeRow, $data[$i]['JUMLAH_SATUAN']);
					$worksheet->setCellValue('S'.$writeRow, $data[$i]['HS_CODE']);
					$worksheet->setCellValue('T'.$writeRow, $data[$i]['SERI_BARANG']);
					$worksheet->setCellValue('U'.$writeRow, $data[$i]['ID_PENGUSAHA']);
					$worksheet->setCellValue('V'.$writeRow, $data[$i]['STATUS']);
				}

				$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet,'Xlsx');

				$filename = 'Data_Pemasukan_'.$_GET['npwp'].'_'.date('Y').'.xlsx';
				$writer->save('assets/report/'.$filename);

				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename="'.basename('assets/report/'.$filename).'"');
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize('assets/report/'.$filename));
            	flush(); // Flush system output buffer
            	readfile('assets/report/'.$filename);
            } else {
            	print("ACCESS FORBIDDEN");
            }
        } else {
        	print("ACCESS FORBIDDEN");
        }

    }

    public function getPengeluaran()
    {
    	if (!empty($_GET)) {
    		if ($_GET['id'] === "BC051000" && $_GET['password'] === "bccikarang051000") {
    			$data = $this->model->getDokPengeluaran();
    			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('assets/template/template_gocik_out.xlsx');
    			$worksheet = $spreadsheet->getActiveSheet();
    			$firstRow = 2;

    			for ($i=0; $i < count($data); $i++) { 
    				$writeRow = $firstRow+$i;
    				$worksheet->setCellValue('A'.$writeRow, $data[$i]['ID_HEADER']);
    				$worksheet->setCellValue('B'.$writeRow, $data[$i]['NOMOR_AJU']);
    				$worksheet->setCellValue('C'.$writeRow, $data[$i]['KODE_DOKUMEN']);
    				$worksheet->setCellValue('D'.$writeRow, $data[$i]['TANGGAL_DAFTAR']);
    				$worksheet->setCellValue('E'.$writeRow, $data[$i]['NOMOR_DAFTAR']);
    				$worksheet->setCellValue('F'.$writeRow, $data[$i]['NAMA_IMPORTIR']);
    				$worksheet->setCellValue('G'.$writeRow, $data[$i]['NAMA_PENERIMA']);
    				$worksheet->setCellValue('H'.$writeRow, $data[$i]['NAMA_PENGUSAHA']);
    				$worksheet->setCellValue('I'.$writeRow, $data[$i]['KODE_VALUTA']);
    				$worksheet->setCellValue('J'.$writeRow, $data[$i]['KODE_BARANG']);
    				$worksheet->setCellValue('K'.$writeRow, $data[$i]['URAIAN_BARANG']);
    				$worksheet->setCellValue('L'.$writeRow, $data[$i]['KODE_SATUAN']);
    				$worksheet->setCellValue('M'.$writeRow, $data[$i]['CIF']);
    				$worksheet->setCellValue('N'.$writeRow, $data[$i]['CIF_RUPIAH']);
    				$worksheet->setCellValue('O'.$writeRow, $data[$i]['HARGA_INVOICE']);
    				$worksheet->setCellValue('P'.$writeRow, $data[$i]['HARGA_PENYERAHAN_BRG']);
    				$worksheet->setCellValue('Q'.$writeRow, $data[$i]['HARGA_SATUAN']);
    				$worksheet->setCellValue('R'.$writeRow, $data[$i]['JUMLAH_SATUAN']);
    				$worksheet->setCellValue('S'.$writeRow, $data[$i]['HS_CODE']);
    				$worksheet->setCellValue('T'.$writeRow, $data[$i]['SERI_BARANG']);
    				$worksheet->setCellValue('U'.$writeRow, $data[$i]['ID_PENGUSAHA']);
    				$worksheet->setCellValue('V'.$writeRow, $data[$i]['STATUS']);
    			}

    			$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet,'Xlsx');

    			$filename = 'Data_Pengeluaran_'.$_GET['npwp'].'_'.date('Y').'.xlsx';
    			$writer->save('assets/report/'.$filename);

    			header('Content-Description: File Transfer');
    			header('Content-Type: application/octet-stream');
    			header('Content-Disposition: attachment; filename="'.basename('assets/report/'.$filename).'"');
    			header('Expires: 0');
    			header('Cache-Control: must-revalidate');
    			header('Pragma: public');
    			header('Content-Length: ' . filesize('assets/report/'.$filename));
            	flush(); // Flush system output buffer
            	readfile('assets/report/'.$filename);
            } else {
            	print("ACCESS FORBIDDEN");
            }
        } else {
        	print("ACCESS FORBIDDEN");
        }

    }
}