<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\CLI\CLI;

class Tools extends Controller
{
	public function cekSubkon($data = null){
			// get all dokumen persetujuan yang belum jatuh tempo
			$data = $this->model->getPersetujuan();

			// foreach ($data as $key => $value) {
			// 	$this->getPerhitungan($value['NOMOR_SURAT']);
			// }

			return $data;
	}
}