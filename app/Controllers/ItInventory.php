<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\StakeholdersModel;
use App\Models\ItInventoryModel;
class ItInventory extends BaseController
{	

	public function __construct(){
		$this->model2 	= 	new StakeholdersModel();
		$this->model 	=	new ItInventoryModel();
	}

	public function index()
	{
		
	}

	public function upload(){
		if (! empty($_GET))
		{
			if ($_GET['page'] === 'main')
			{
				$this->log(2, 'Telah Mengakses Menu Admin Penindadakn dan Penyidikan > Upload Data IT Inventory');
				return view('ItInventory/UploadPage');
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
					'title'  => 'Upload Data IT Inventory',
					'detail' => 'Form Upload Data IT Inventory',
				];
				$info      = [
					'main'      => 'Cadas',
					'sub'       => 'Dokumen',
					'active'    => 'Upload Data IT Inventory',
					'date'      => $date,
					'subheader' => $subheader,
				];

				return json_encode($info);
			}
		}
	}

	public function uploadData(){

		if (! empty($_FILES))
		{
			switch ($_POST['jenisData']) {
				case '1':
				$data = $this->uploadInventory(1, 'pemasukan');
				break;
				case '2':
				$data = $this->uploadInventory(2, 'pengeluaran');
				break;
				case '3':
				$data = $this->uploadInventory(3, 'mutasi_bahan_baku');
				break;
				case '4':
				$data = $this->uploadInventory(4, 'mutasi_barang_jadi');
				break;
				case '5':
				$data = $this->uploadInventory(5, 'mutasi_mesin');
				break;
				case '6':
				$data = $this->uploadInventory(6, 'mutasi_scrap');
				break;
				default:
				$data = $this->uploadInventory(7, 'posisi_wip');
				break;
			}

			$pesan = [];

			if ($data[0] === FALSE)
			{
				$pesan['pesan']  = $data[1];
				$pesan['status'] = 'failed';
			}
			else
			{
				$pesan['pesan']  = $data[1];
				$pesan['status'] = 'success';
			}
		}

		echo json_encode($pesan);
	}

	public function uploadInventory($type, $table){
		$files       	= $this->request->getFiles();
		$arrayOldName 	= [];
		$arrayData    	= [];
		$stakholders 	= $this->model2->getStakeholdersById2($_POST['perusahaan']);

		foreach ($files['dataExcel'] as $key => $file)
		{
			$data    = [];
			$oldName = $file->getName();

			$newName = date('Y-m-d H:i:s') . '_' . $type . '_' . $oldName;
			$file->move(WRITEPATH . 'uploads', $newName);

			$reader   = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile(WRITEPATH . 'uploads/' . $newName);

			$spreadsheet = $reader->load(WRITEPATH . 'uploads/' . $newName);

			$lastRow = $spreadsheet->getActiveSheet()->getHighestRow();

			$dataArray = $spreadsheet->getActiveSheet()->toArray();

			if ($type === 1) {
				for ($i=1; $i < $lastRow; $i++) { 
					$data[$i-1]['ID_PERUSAHAAN']	=	$_POST['perusahaan'];
					$data[$i-1]['NPWP']				=	$stakholders['NPWP'];
					if ($dataArray[$i][1] !== null) {
						$data[$i-1]['JENIS_DOK']		=	$dataArray[$i][1];
					} else {
						$data[$i-1]['JENIS_DOK']		=	0;
					}
					if ($dataArray[$i][2] !== null) {
						$data[$i-1]['NOMOR_DOK']		=	$dataArray[$i][2];
					} else {
						$data[$i-1]['NOMOR_DOK']		=	0;
					}
					if ($dataArray[$i][3] !== null) {
						$data[$i-1]['TANGGAL_DOK']		=	date('Y-m-d', strtotime($dataArray[$i][3]));
					} else {
						$data[$i-1]['TANGGAL_DOK']		=	date('Y-m-d', strtotime($dataArray[$i][5]));
					}
					if ($dataArray[$i][4] !== null) {
						$data[$i-1]['NOMOR_BPB']		=	$dataArray[$i][4];
					} else {
						$data[$i-1]['NOMOR_BPB']		=	"-";
					}
					if ($dataArray[$i][5] !== null) {
						$data[$i-1]['TANGGAL_BPB']		=	date('Y-m-d', strtotime($dataArray[$i][5]));
					} else {
						$data[$i-1]['TANGGAL_BPB']		=	"0000-00-00";
					}
					if ($dataArray[$i][6] !== null) {
						$data[$i-1]['PENGIRIM']		=	$dataArray[$i][6];
					} else {
						$data[$i-1]['PENGIRIM']		=	"-";
					}
					if ($dataArray[$i][7] !== null) {
						$data[$i-1]['KODE_BARANG']		=	$dataArray[$i][7];
					} else {
						$data[$i-1]['KODE_BARANG']		=	"-";
					}
					if ($dataArray[$i][8] !== null) {
						$data[$i-1]['NAMA_BARANG']		=	$dataArray[$i][8];
					} else {
						$data[$i-1]['NAMA_BARANG']		=	"-";
					}
					if ($dataArray[$i][10] !== null) {
						$data[$i-1]['JUMLAH']		=	$dataArray[$i][10];
					} else {
						$data[$i-1]['JUMLAH']		=	0;
					}
					if ($dataArray[$i][9] !== null) {
						$data[$i-1]['SATUAN']		=	$dataArray[$i][9];
					} else {
						$data[$i-1]['SATUAN']		=	"-";
					}
					if ($dataArray[$i][12] !== null) {
						$data[$i-1]['NILAI']		=	$dataArray[$i][12];
					} else {
						$data[$i-1]['NILAI']		=	0;
					}
					if ($dataArray[$i][11] !== null) {
						$data[$i-1]['VALUTA']		=	$dataArray[$i][11];
					} else {
						$data[$i-1]['VALUTA']		=	"-";
					}			
				}
			} else if ($type === 2) {
				for ($i=1; $i < $lastRow; $i++) {
					$data[$i-1]['ID_PERUSAHAAN']	=	$_POST['perusahaan'];
					$data[$i-1]['NPWP']				=	$stakholders['NPWP'];
					if ($dataArray[$i][1] !== null) {
						$data[$i-1]['JENIS_DOK']		=	$dataArray[$i][1];
					} else {
						$data[$i-1]['JENIS_DOK']		=	0;
					}
					if ($dataArray[$i][2] !== null) {
						$data[$i-1]['NOMOR_DOK']		=	$dataArray[$i][2];
					} else {
						$data[$i-1]['NOMOR_DOK']		=	0;
					}
					if ($dataArray[$i][3] !== null) {
						$data[$i-1]['TANGGAL_DOK']		=	date('Y-m-d', strtotime($dataArray[$i][3]));
					} else {
						$data[$i-1]['TANGGAL_DOK']		=	date('Y-m-d', strtotime($dataArray[$i][5]));
					}
					if ($dataArray[$i][4] !== null) {
						$data[$i-1]['NOMOR_DO']		=	$dataArray[$i][4];
					} else {
						$data[$i-1]['NOMOR_DO']		=	"-";
					}
					if ($dataArray[$i][5] !== null) {
						$data[$i-1]['TANGGAL_DO']		=	date('Y-m-d', strtotime($dataArray[$i][5]));
					} else {
						$data[$i-1]['TANGGAL_DO']		=	"0000-00-00";
					}
					if ($dataArray[$i][6] !== null) {
						$data[$i-1]['PENERIMA']		=	$dataArray[$i][6];
					} else {
						$data[$i-1]['PENERIMA']		=	"-";
					}
					if ($dataArray[$i][7] !== null) {
						$data[$i-1]['KODE_BARANG']		=	$dataArray[$i][7];
					} else {
						$data[$i-1]['KODE_BARANG']		=	"-";
					}
					if ($dataArray[$i][8] !== null) {
						$data[$i-1]['NAMA_BARANG']		=	$dataArray[$i][8];
					} else {
						$data[$i-1]['NAMA_BARANG']		=	"-";
					}
					if ($dataArray[$i][10] !== null) {
						$data[$i-1]['JUMLAH']		=	$dataArray[$i][10];
					} else {
						$data[$i-1]['JUMLAH']		=	0;
					}
					if ($dataArray[$i][9] !== null) {
						$data[$i-1]['SATUAN']		=	$dataArray[$i][9];
					} else {
						$data[$i-1]['SATUAN']		=	"-";
					}
					if ($dataArray[$i][12] !== null) {
						$data[$i-1]['NILAI']		=	$dataArray[$i][12];
					} else {
						$data[$i-1]['NILAI']		=	0;
					}
					if ($dataArray[$i][11] !== null) {
						$data[$i-1]['VALUTA']		=	$dataArray[$i][11];
					} else {
						$data[$i-1]['VALUTA']		=	"-";
					} 					
				}
			} elseif ($type === 7) {
				for ($i=1; $i < $lastRow; $i++) { 
					$data[$i-1]['ID_PERUSAHAAN']	=	$_POST['perusahaan'];
					$data[$i-1]['NPWP']				=	$stakholders['NPWP'];
					if ($dataArray[$i][1] !== null) {
						$data[$i-1]['PO']		=	$dataArray[$i][1];
					} else {
						$data[$i-1]['PO']		=	"-";
					}
					if ($dataArray[$i][2] !== null) {
						$data[$i-1]['KODE_BARANG']		=	$dataArray[$i][2];
					} else {
						$data[$i-1]['KODE_BARANG']		=	"-";
					}
					if ($dataArray[$i][3] !== null) {
						$data[$i-1]['NAMA_BARANG']		=	$dataArray[$i][3];
					} else {
						$data[$i-1]['NAMA_BARANG']		=	"-";
					}
					if ($dataArray[$i][4] !== null) {
						$data[$i-1]['SATUAN']		=	$dataArray[$i][4];
					} else {
						$data[$i-1]['SATUAN']		=	"-";
					}
					if ($dataArray[$i][5] !== null) {
						$data[$i-1]['JUMLAH']		=	$dataArray[$i][5];
					} else {
						$data[$i-1]['JUMLAH']		=	0;
					}
					if ($dataArray[$i][6] !== null) {
						$data[$i-1]['KETERANGAN']		=	$dataArray[$i][6];
					} else {
						$data[$i-1]['KETERANGAN']		=	"-";
					}					
				}
			} else {
				for ($i=1; $i < $lastRow; $i++) {
					$data[$i-1]['ID_PERUSAHAAN']	=	$_POST['perusahaan'];
					$data[$i-1]['NPWP']				=	$stakholders['NPWP'];
					if ($dataArray[$i][1] !== null) {
						$data[$i-1]['KODE_BARANG']		=	$dataArray[$i][1];
					} else {
						$data[$i-1]['KODE_BARANG']		=	"-";
					}
					if ($dataArray[$i][2] !== null) {
						$data[$i-1]['NAMA_BARANG']		=	$dataArray[$i][2];
					} else {
						$data[$i-1]['NAMA_BARANG']		=	"-";
					}
					if ($dataArray[$i][3] !== null) {
						$data[$i-1]['SATUAN']		=	$dataArray[$i][3];
					} else {
						$data[$i-1]['SATUAN']		=	"-";
					}
					if ($dataArray[$i][4] !== null) {
						$data[$i-1]['VALUTA']		=	$dataArray[$i][4];
					} else {
						$data[$i-1]['VALUTA']		=	"-";
					}
					if ($dataArray[$i][5] !== null) {
						$data[$i-1]['NILAI']		=	$dataArray[$i][5];
					} else {
						$data[$i-1]['NILAI']		=	0;
					}
					if ($dataArray[$i][6] !== null) {
						$data[$i-1]['SALDO_AWAL']		=	$dataArray[$i][6];
					} else {
						$data[$i-1]['SALDO_AWAL']		=	0;
					}
					if ($dataArray[$i][7] !== null) {
						$data[$i-1]['PEMASUKAN']		=	$dataArray[$i][7];
					} else {
						$data[$i-1]['PEMASUKAN']		=	0;
					}
					if ($dataArray[$i][8] !== null) {
						$data[$i-1]['PENGELUARAN']		=	$dataArray[$i][8];
					} else {
						$data[$i-1]['PENGELUARAN']		=	0;
					}
					if ($dataArray[$i][9] !== null) {
						$data[$i-1]['PENYESUAIAN']		=	$dataArray[$i][9];
					} else {
						$data[$i-1]['PENYESUAIAN']		=	0;
					}
					if ($dataArray[$i][10] !== null) {
						$data[$i-1]['SALDO']		=	$dataArray[$i][10];
					} else {
						$data[$i-1]['SALDO']		=	0;
					}
					if ($dataArray[$i][11] !== null) {
						$data[$i-1]['STOCK_OPNAME']		=	$dataArray[$i][11];
					} else {
						$data[$i-1]['STOCK_OPNAME']		=	0;
					}
					if ($dataArray[$i][12] !== null) {
						$data[$i-1]['SELISIH']		=	$dataArray[$i][12];
					} else {
						$data[$i-1]['SELISIH']		=	0;
					}
					if ($dataArray[$i][13] !== null) {
						$data[$i-1]['KETERANGAN']		=	$dataArray[$i][13];
					} else {
						$data[$i-1]['KETERANGAN']		=	"-";
					}						
				}
			}

			unlink(WRITEPATH . 'uploads/' . $newName);
			$arrayOldName[] = $oldName;
		}            

		$status = $this->model->insertIT($table, $data);
		return [
			$status,
			$arrayData,
		];

	}
}