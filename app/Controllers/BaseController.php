<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Models\MenuModel;
use App\Models\DatatableModel;
class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		$this->session = \Config\Services::session();
		$this->LoginModel = new LoginModel();
		$this->menu = new MenuModel();
		$this->datatable = new DatatableModel();
		$this->base_url = 'http://'.$_SERVER['HTTP_HOST'];
		$this->redirect = "Location: ". $this->base_url ."/";
		$this->data['base_url'] = $this->base_url;
		helper('session');

		if($this->session->get('StatusLogin') == 1){
			if ($_SESSION['tipe'] === "pegawai") {
				if ($this->LoginModel->CekUserHakAkses($this->session->get('IdUser')) !== TRUE){
					header("Location: ".$this->base_url.'/Error/error403');
					exit;
				} else {
					$menu = ['menu'=>$this->menu->getMenu()];
					$this->session->set($menu);
					if ($this->LoginModel->CekAdminHakAkses() === TRUE){
						$data = ['adminMenu'=>$this->menu->getAdminMenu()];
						$this->session->set($data);
					}
					$this->data['DashboardTitle'] = 'TPB';
				}
			} else {
				$menu = ['menu' => $this->menu->getExtMenu()];
				$this->session->set($menu);
				$this->data['DashboardTitle'] = 'Profile Stakeholder';
			}
		} else {
			header($this->redirect."Login");
			exit;
		}
	}

	public function log($Operation, $Pesan){
		$this->LoginModel->log($_SESSION['NipUser'], $Operation, $Pesan);
		// list operation
		// 0 = login
		// 1 = logout
		// 2 = akses
		// 3 = input
		// 4 = edit
		// 5 = delete
	}

}
