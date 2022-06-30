<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PertukaranDataModel;
use App\Models\ItInventoryModel;
use App\Models\StakeholdersModel;

class Api extends Controller
{

	public function __construct(){
		$this->model 	= new PertukaranDataModel();
		$this->model2	= new ItInventoryModel();
		$this->model3	= new StakeholdersModel();
	}

	public function index()
	{
		
	}

	public function PertukaranData(){
		if (!empty($_POST) && !empty($_FILES)) {
			if ($this->model->validasiUser($_POST['username']) === TRUE) {
				$files        = $this->request->getFiles();
				foreach ($files as $key => $file) {
					$data    = [];
					$oldName = $file->getName();

					$newName = date('Y-m-d') . '_' . $oldName;
					$file->move(WRITEPATH . 'uploads', $newName);

					$reader   = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

					$spreadsheet = $reader->load(WRITEPATH . 'uploads/' . $newName);

					$dataArray = $spreadsheet->getActiveSheet()->toArray();

					$postData = [];
					for ($i = 1; $i < count($dataArray); $i++) {
						$postData[] = [
							'ID_HEADER' => $dataArray[$i][0],
							'NO_AJU' => $dataArray[$i][1],
							'JENIS_DOKUMEN' => $dataArray[$i][2],
							'D_DOKUMEN' => $dataArray[$i][3],
							'NO_DOKUMEN' => $dataArray[$i][4],
							'NAMA_PEMASOK' => $dataArray[$i][5],
							'NAMA_PENGIRIM' => $dataArray[$i][6],
							'NAMA_PENGUSAHA' => $dataArray[$i][7],
							'MATA_UANG' => $dataArray[$i][8],
							'KODE_BARANG' => $dataArray[$i][9],
							'DESKRIPSI' => $dataArray[$i][10],
							'KODE_SATUAN' => $dataArray[$i][11],
							'CIF' => floatval($dataArray[$i][12]),
							'CIF_RUPIAH' => floatval($dataArray[$i][13]),
							'HARGA_INVOICE' => floatval($dataArray[$i][14]),
							'HARGA_PENYERAHAN' => floatval($dataArray[$i][15]),
							'HARGA_SATUAN' => floatval($dataArray[$i][16]),
							'QTY' => floatval($dataArray[$i][17]),
							'POS_TARIF' => $dataArray[$i][18],
							'SERI_BARANG' => $dataArray[$i][19],
							'ID_PERUSAHAAN' => $dataArray[$i][20],
							'NPWP9' => substr($dataArray[$i][20], 0, 9)
						];
					}

					$status = $this->model->postIt($postData,$_POST['type']);

					if ($status === TRUE) {
						echo 'Proses Upload Data Berhasil';
					} else {
						echo ' Proses Upload Data Gagal';
					}
				}	
			} else {
				echo '<USER TIDAK TERDAFTAR HARAP HUBUNGI ADMIN BC CIKARANG';
			}
		} else {
			if (empty($_POST)) {
				$data['data'][] = 'POST DATA TIDAK ADA';
			}
			if (empty($_FILES)) {
				$data['data'][] = 'POST FILE TIDAK ADA';
			}

			return view('Api/PertukaranData',$data);
		}
	}

	public function getReferensiPerusahaan(){
		$referensi 	= $this->model2->getReferensiPerusahaan();
		$perusahaan = $this->model3->getListStakeholders();

		foreach ($perusahaan as $key => $value) {
			$reference[$value['ID']] = $value['NAMA_PERUSAHAAN'];
		}

		foreach ($referensi as $key => $value) {
			$data[] = [
				'ID_PERUSAHAAN' => $value['ID_PERUSAHAAN'],
				'NAMA_PERUSAHAAN' => $reference[$value['ID_PERUSAHAAN']]
			];
		}

		echo json_encode($data);
	}

	public function getITInventoryJSON($type, $ID_PERUSAHAAN){
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		header("Access-Control-Max-Age: 3600");
		header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
		if (!empty($_GET)) {
			if ($_GET['user'] === "BC051000" && $_GET['password'] === "bccikarang051000") {

				switch ($type) {
					case '1':
						$table = 'pemasukan';
						break;
					case '2':
						$table = 'pengeluaran';
						break;
					case '3':
						$table = 'mutasi_bahan_baku';
						break;
					case '4':
						$table = 'mutasi_barang_jadi';
						break;
					case '5':
						$table = 'mutasi_mesin';
						break;
					case '6':
						$table = 'mutasi_scrap';
						break;
					case '7':
						$table = 'posisi_wip';
						break;
					
					default:
						// code...
						break;
				}

				if ($type) {
					$data = $this->model2->getDataApi($table, $ID_PERUSAHAAN);
				} else {
					$data = 'TIDAK ADA DATA YANG DITAMPILKAN';
				}

				$dataJson = ['list' => $data];
				echo json_encode(['response' => $dataJson]);
			} else {
				print("ACCESS FORBIDDEN");
			}
		} else {
			print("ACCESS FORBIDDEN");
		}
	}

	public function testApi(){
		if (!empty($_GET)) {
			if ($_GET['user'] === 'beacukai' && $_GET['password'] === 'beacukai2021') {
				echo json_encode($_GET);
			} else {
				return 'Access Forbidden';
			}
		} else{
			return 'Access Forbidden';
		}
	}
}