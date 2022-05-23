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
class DasarController extends Controller
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
		$this->redirect = "Location: ". base_url(). "/";
		helper('session');
		$this->data[] = null;

		// if($this->session->get('StatusLogin') == 1){
		// 	if ($this->LoginModel->CekUserHakAkses($this->session->get('IdUser')) !== TRUE){
		// 		header("Location: ".base_url().'/Error/error403');
		// 		exit;
		// 	} else {
		// 		// $menu = $this->menu->Menu($this->session->userdata('GrupMenu'));
		// 		// $this->data['menu'] = $menu['mainMenu'];
		// 		// if ($this->login->CekAdminHakAkses($this->session->userdata('IdUser')) === TRUE){
		// 		// 	$this->data['adminMenu'] = $menu['adminMenu'];
		// 		// }
		// 		$this->data['DashboardTitle'] = 'TPB';
		// 	}
		// } else {
		// 	header($this->redirect."Login");
		// 	exit;
		// }
	}

	public function log($Operation, $Pesan){
		$this->LoginModel->log(session('NipUser'), $Operation, $Pesan);
	}

}
