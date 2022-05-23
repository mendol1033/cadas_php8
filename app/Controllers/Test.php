<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Models\NibModel;
use App\Models\MonitoringModel;

class Test extends Controller
{
	public function __construct($param = null)
	{
		$this->model = new LoginModel();
        $this->nib = new NibModel();
        $this->monitoring = new MonitoringModel();
	}

    public function index()
    {
        $data = $this->nib->addNib();

        print_r($data);  
    }

    public function viewHasil(){
        $data = $this->monitoring->getHasil();

        return (base64_decode($data[0]['data_curl']));
    }

    public function view(){
        return view('phpinfo');
    }
}