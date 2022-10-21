<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProfileModel;

class Profile extends Controller
{
	public function __construct(){
		$this->data = [];
		$this->model = new ProfileModel();
	}

	public function index()
	{	
		$this->data['title'] = 'PENGUMUMAN PROFIL RISIKO';
		return view('Profile/Pengumuman', $this->data);
			
	}

	public function Post(){
		if (!empty($_POST)) {
			$validasi = $this->model->getValidasi();
			$data['status'] = $validasi['status'];

			if ($validasi['status'] === 'success') {
				$data['data'] = $validasi['data'][0];
				$this->model->postDataExim();
			} else {
				if (!empty($validasi['data'])) {
					$data['status'] = 'SKEP';
					$data['data'] = $validasi['data'];
				} else {
					$data['data'] = 'Data NPWP dan SKEP IZIN TPB yang Anda masukkan salah';
				}
			}

			echo json_encode($data);
		}
	}
}