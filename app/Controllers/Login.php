<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\LoginModel;

class Login extends Controller
{
	public function __construct($param = null)
	{
		$this->session = \Config\Services::session();
		$this->LoginModel = new LoginModel();
		$this->base_url = 'http://'.$_SERVER['HTTP_HOST'];
		$this->redirect = "Location: ".$this->base_url."/";
		$this->data['base_url'] = $this->base_url;
	}

	public function index()
	{	
		// $session = \Config\Services::session();
		if (!empty($this->session->get('StatusLogin'))) {
			if ($this->session->get('StatusLogin') == 1) {
				if ($this->session->get('tipe') == "pegawai") {
					header($this->redirect."Main");
					exit;
				} else {
					header($this->redirect."ProfilePage");
					exit;
				}
			}
			else {
				$this->data['title'] = "CADAS WebApp";
				return view('Login.php', $this->data);
			}
		} else {
			$this->data['title'] = "CADAS WebApp";
			return view('Login.php', $this->data);
		}
	}

	public function register(){
		return view("Register", $this->data);
	}

	public function registration(){
		if (!empty($_POST)) {
			$dataAktivasi = $this->LoginModel->searchAktivasi($_POST['npwp']);
			if (count($dataAktivasi) > 0) {
				$mail = "<h2><strong>SELAMAT USER ANDA TELAH DIBUAT</strong></h2>";
				$mail .= "<br>";
				$mail .= "<br>";
				$mail .= "<p>klik link berikut untuk melakukan aktivasi: ";
				$mail .= '<a href="'.$this->base_url."/Login/aktivasi?asdf=".$dataAktivasi[0]['IdAktivasi']."&tyui=".str_shuffle("1234567890abcdefghijklmnopqrstuvwxyz").'&zxcv='.$dataAktivasi[0]['KodeAktivasi'].'">'.$this->base_url."/Login/aktivasi?asdf=".$dataAktivasi[0]['IdAktivasi']."tyui=".str_shuffle("1234567890abcdefghijklmnopqrstuvwxyz").'</a></p>';

				$email = \Config\Services::email();
				$email->setFrom('noreplay.cadas@gmail.com', 'Mail System Cadas');
				$email->setTo($_POST['email']);
				$email->setSubject('Email Aktivasi Aplikasi CADAS');
				$email->setMessage($mail);

				$email->send();
				$this->session->setFlashdata('pesan-regis','Registrasi telah berhasil dilakukan, cek email anda untuk melakukan aktivasi akun');
				$this->session->setFlashdata('status-regis','Selamat!!!');

				header($this->redirect."Login/register");
			} else {
				$data = $this->LoginModel->addAktivasiUser();
				switch ($data['status']) {
					case 1:
					$mail = "<h2><strong>SELAMAT USER ANDA TELAH DIBUAT</strong></h2>";
					$mail .= "<br>";
					$mail .= "<br>";
					$mail .= "<p>klik link berikut untuk melakukan aktivasi: ";
					$mail .= '<a href="'.$this->base_url."/Login/aktivasi?asdf=".$data['data']['idUser']."&tyui=".str_shuffle("1234567890abcdefghijklmnopqrstuvwxyz").'&zxcv='.$data['data']['KodeAktivasi'].'">'.$this->base_url."/Login/aktivasi?asdf=".$data['data']['idUser']."tyui=".str_shuffle("1234567890abcdefghijklmnopqrstuvwxyz").'</a></p>';

					$email = \Config\Services::email();
					$email->setFrom('noreplay.cadas@gmail.com', 'Mail System Cadas');
					$email->setTo($_POST['email']);
					$email->setSubject('Email Aktivasi Aplikasi CADAS');
					$email->setMessage($mail);

					$email->send();
					$this->session->setFlashdata('pesan-regis','Registrasi telah berhasil dilakukan, cek email anda untuk melakukan aktivasi akun');
					$this->session->setFlashdata('status-regis','Selamat!!!');

					header($this->redirect."Login/register");
					exit;
					break;
					case 2:
					$this->session->setFlashdata('status-regis','Mohon Maaf Data Perusahaan Tidak Ditemukan');
					$this->session->setFlashdata('pesan-regis','Harap email data NIB anda ke alamat <a href="#">admincadas@gmail.com</a> dan hubungi Seksi Pengolahan Data dan Administrasi Dokumen. Terima Kasih');
					header($this->redirect."Login/register");
					exit;
					break;

					default:
					header($this->redirect."Login/register");
					exit;
					break;
				}
			}
		}
	}

	public function aktivasi(){
		if (!empty($_GET)) {
			if ($this->LoginModel->aktivasi()) {
				echo '<h2><strong>PROSES AKTIVASI BERHASIL</strong></h2> <br> <a href="'.$this->base_url.'/Login">Kembali ke Halaman Login</a>';
			} else {
				echo '<h2><strong>PROSES AKTIVASI BERHASIL</strong></h2> <br> <a href="'.$this->base_url.'/Login/register">Kembali ke Halaman Registrasi</a>';
			}
		}
	}

	public function login(){
		// $model = new LoginModel();
		if (!empty($_POST)) {
			if ($_POST['tipe'] == "pegawai") {
				$data = $this->LoginModel->cek_user();
				if ( $data['status'] === "TRUE") {
					$url = "Location: ".$this->base_url."/Login";
					header($this->redirect."Login");
					exit;
				// echo json_encode($url);
				} else {
					$this->session->setFlashdata('pesan-login', 'User dan/atau Password Anda Salah');
					$url = "Location: ".$this->base_url."/Login";
					header($this->redirect."Login");
					exit;
				}
			} else {
				$data = $this->LoginModel->cek_stakeholders();
				if ( $data['status'] === "TRUE") {
					header($this->redirect."Login");
					exit;
				} else {
					if ($data['user'] == "undefined") {
						$this->session->setFlashdata('pesan-regis',', Silahkan Melakukan Pendaftaran User Baru Terlebih Dahulu');
						$this->session->setFlashdata('status-regis','Username dan/atau Password Tidak Ditemukan');
						header($this->redirect."Login/register");
						exit;
					} else {
						$this->session->setFlashdata('pesan-login','Username dan/atau Password Tidak Sesuai');
						header($this->redirect."Login");
						exit;
					}
				}
			}
		}
	}

	public function logout(){
		// $model = new LoginModel();
		if ($_SESSION['tipe'] === "pegawai") {
			$this->LoginModel->log($_SESSION['NipUser'],2,"Telah Logout dari Aplikasi CADAS");
		} else {
			$this->LoginModel->log_cadas($_SESSION['NPWP'],2,"Telah Logout dari Aplikasi CADAS");
		}
		$this->LoginModel->logout();
		
		header($this->redirect."Login");
		exit;
			// print_r($url);
	}
}