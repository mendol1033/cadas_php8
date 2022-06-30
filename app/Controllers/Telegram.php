<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MonitoringModel;
use App\Models\ItInventoryModel;
use App\Models\StakeholdersModel;
use App\Models\TelegramModel;
use CodeIgniter\CLI\CLI;

class Telegram extends Controller
{
	
	public function __construct()
	{
		$this->model = new MonitoringModel();
		$this->it = new ItInventoryModel();
		$this->stake = new StakeholdersModel();
		$this->telegram = new TelegramModel();
	}
	
	public function index()
	{
		
	}
	
	public function getNewMessage(){
		$update_id = $this->telegram->getLastUpdateId();
		if (!is_null($update_id)) {
			$method = 'getUpdates?offset='.((int)$update_id['UPDATE_ID']+1);
		} else {
			$method = 'getUpdates';
		}
		
		$api = 'https://api.telegram.org/';
		$token = 'bot1198393550:AAEK9FGvs80_sn-pgHcZbG4wwfxiOMFPGqA/';
		$methodSend = 'sendMessage';
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api.$token.$method);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_POST, 1);
		// curl_setopt($ch, CURLOPT_POSTFIELDS, ['chat_id' => $chatId, 'text' => $message]);
		
		$result = curl_exec($ch);
		curl_close($ch);
		
		// echo ($result);
		
		$array = (json_decode($result, true));
		if (!empty($array['result'])) {
			foreach ($array['result'] as $key => $value) {
				$statusSimpan = $this->telegram->updateInbox($value);
				$dataDaftar = explode('#', $value['message']['text']);
				if ($statusSimpan == "sukses") {
					if ($dataDaftar[0] == "DAFTAR" && count($dataDaftar) == 8) {
						$searchContact = $this->telegram->getContact($value['message']['from']['id']);
						if (count($searchContact) < 1) {
							echo "Kontak Tidak Ditemukan";
							$statusDaftar = $this->telegram->addContact($value['message'], $dataDaftar);
							if ($statusDaftar === TRUE) {
								$message =  "Nomor Anda Berhasil Didaftarkan Dalam Aplikasi Kami, Terima Kasih Telah Melakukan Pendaftaran";
							}
						} else {
							$message =  "Nomor Anda Sudah Terdaftar Dalam Aplikasi Kami, Terima Kasih Telah Melakukan Pendaftaran";
							
						}
					} else {
						$message =  "Pesan Yang Anda Kirim Tidak Sesuai Dengan Format, Ulangi Proses Pendaftaran Dengan Format Yang Benar";
					}
				} else {
					echo "program error";
				}
				
				$cs = curl_init();
				curl_setopt($cs, CURLOPT_URL, $api.$token.$methodSend);
				curl_setopt($cs, CURLOPT_POST, 1);
				curl_setopt($cs, CURLOPT_POSTFIELDS, ['chat_id' => $value['message']['from']['id'], 'text' => $message]);
				
				$result = curl_exec($cs);
				echo $result;
				echo '<br>';
				echo '<br>';
			}
		} else {
			echo "Tidak Ada Pesan Masuk";
		}
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		print_r($statusSimpan);
	}
	
	public function testCurl(){
		// Script to test if the CURL extension is installed on this server
		
		// Define function to test
		function _is_curl_installed() {
			if  (in_array  ('curl', get_loaded_extensions())) {
				return true;
			}
			else {
				return false;
			}
		}
		
		// Ouput text to user based on test
		if (_is_curl_installed()) {
			echo "cURL is <span style=\"color:blue\">installed</span> on this server";
		} else {
			echo "cURL is NOT <span style=\"color:red\">installed</span> on this server";
		}
	}
}