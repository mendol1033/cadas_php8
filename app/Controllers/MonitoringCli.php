<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MonitoringModel;
use App\Models\ItInventoryModel;
use App\Models\StakeholdersModel;
use CodeIgniter\CLI\CLI;

class MonitoringCli extends Controller
{

	public function __construct()
	{
		$this->model = new MonitoringModel();
		$this->it = new ItInventoryModel();
		$this->stake = new StakeholdersModel();
	}

	public function getPerhitungan($persetujuan = 'S-638/WBC.09/KPP.MP.07/2020'){
		$dataPersetujuan = $this->model->getPersetujuan();

		foreach ($dataPersetujuan as $key => $value) {
			$data = $this->model->getPerhitunganBySuratPersetujuan($value['NOMOR_SURAT']);
			$api = 'https://api.telegram.org/';
			$token = 'bot1198393550:AAEK9FGvs80_sn-pgHcZbG4wwfxiOMFPGqA/';
			$method = 'sendMessage';
			// $chatId = '649237652';
			if ($data['status'] === 'ditemukan') {
				// Looping Through Data Persetujuan Bahan Baku
				for ($i = 0; $i < count($data['bahanBaku']); $i++) {
				// Look for data barang persejuan in data barang BC 2.6.1
					$arrayKey = $this->searchArray($data['bahanBaku'][$i]['KODE_BARANG'],$data['barang261'],'KODE_BARANG');
					$arrayKey2[] = $this->searchArray($data['bahanBaku'][$i]['KODE_BARANG'],$data['barang261'],'KODE_BARANG');

					if ($arrayKey2[$i] !== FALSE) {
						$sisa = floatval($data['bahanBaku'][$i]['JUMLAH_SATUAN'])-floatval($data['barang261'][$arrayKey]['JUMLAH_SATUAN']); 
						if ($sisa == 0)  {
							$dataCheckBb[] = ['KODE_BARANG' => $data['bahanBaku'][$i]['KODE_BARANG'], 'KUOTA' => floatval($data['bahanBaku'][$i]['JUMLAH_SATUAN']), 'REALISASI' => floatval($data['barang261'][$arrayKey]['JUMLAH_SATUAN']), 'KETERANGAN' => 'SESUAI'];
						} else {
							$dataCheckBb[] = ['KODE_BARANG' => $data['bahanBaku'][$i]['KODE_BARANG'], 'KUOTA' => floatval($data['bahanBaku'][$i]['JUMLAH_SATUAN']), 'REALISASI' => floatval($data['barang261'][$arrayKey]['JUMLAH_SATUAN']), 'KETERANGAN' => 'SELISIH '.$sisa];
						}
					} else {
						$dataCheckBb[$data['bahanBaku'][$i]['KODE_BARANG']] = 'DATA KODE BARANG TIDAK DITEMUKAN';
					}

				}

				for ($i = 0; $i < count($data['barangJadi']); $i++) {
				// Look for data barang persejuan in data barang BC 2.6.1
					$arrayKey = $this->searchArray($data['barangJadi'][$i]['KODE_BARANG'],$data['barang262'],'KODE_BARANG');
					$arrayKey2[] = $this->searchArray($data['bahanBaku'][$i]['KODE_BARANG'],$data['barang261'],'KODE_BARANG');

					if ($arrayKey2[$i] !== FALSE) {
						$sisa = floatval($data['barangJadi'][$i]['JUMLAH_SATUAN']) - floatval($data['barang262'][$arrayKey]['JUMLAH_SATUAN']); 
						if ($sisa == 0) {
							$dataCheckBj[] = ['KODE_BARANG' => $data['barangJadi'][$i]['KODE_BARANG'], 'KUOTA' => floatval($data['barangJadi'][$i]['JUMLAH_SATUAN']), 'REALISASI' => floatval($data['barang262'][$arrayKey]['JUMLAH_SATUAN']), 'KETERANGAN' => 'SESUAI'];
						} else {
							$dataCheckBj[] = ['KODE_BARANG' => $data['barangJadi'][$i]['KODE_BARANG'], 'KUOTA' => floatval($data['barangJadi'][$i]['JUMLAH_SATUAN']), 'REALISASI' => floatval($data['barang262'][$arrayKey]['JUMLAH_SATUAN']), 'KETERANGAN' => 'SELISIH '.$sisa];
						}	
					} else {
						$dataCheckBj[$data['barangJadi'][$i]['KODE_BARANG']] = 'DATA KODE BARANG TIDAK DITEMUKAN';
					}
				}

				$setingNotifikasi = $this->model->getSettingNotifikasi();

				foreach ($setingNotifikasi as $key => $value) {
					$chatId = $value['ID_TELEGRAM'];
					$message = "REPORT KEGIATAN SUBKONTRAK \n";
					$message .= "NOMOR SURAT: ".$data['persetujuan'][0]['NOMOR_SURAT'];
					$message .= "\nTANGGAL SURAT: ".$data['persetujuan'][0]['TANGGAL_SURAT'];
					$message .= "\nPENERIMA: ".$data['persetujuan'][0]['PENERIMA'];
					$message .= "\nALAMAT: ".$data['persetujuan'][0]['ALAMAT_PENERIMA'];
					$message .= "\nPEKERJAAN: ".$data['persetujuan'][0]['PEKERJAAN'];
					$message .= "\nNILAI JAMINAN: Rp ".number_format($data['persetujuan'][0]['NILAI_JAMINAN'],2,'.',',');
					$message .= "\nJATUH TEMPO: ".$data['persetujuan'][0]['TANGGAL_JATUH_TEMPO'];
					$message .= "\n \nDATA BAHAN BAKU: \n"; 

					for ($i = 0; $i < count($dataCheckBb); $i++) {
						$no = $i+1;
						$message .= $no.". KODE BARANG: ".$dataCheckBb[$i]['KODE_BARANG']."\n";
						$message .= "   KUOTA: ".$dataCheckBb[$i]['KUOTA']."\n";
						$message .= "   REALISASI: ".$dataCheckBb[$i]['REALISASI']."\n";
						$message .= "   KETERANGAN: ".$dataCheckBb[$i]['KETERANGAN']."\n";
					}

					$message .= "\n DATA BARANG JADI: \n";

					for ($i = 0; $i < count($dataCheckBj); $i++) {
						$no = $i+1;
						$message .= $no.". KODE BARANG: ".$dataCheckBj[$i]['KODE_BARANG']."\n";
						$message .= "   KUOTA: ".$dataCheckBj[$i]['KUOTA']."\n";
						$message .= "   REALISASI: ".$dataCheckBj[$i]['REALISASI']."\n";
						$message .= "   KETERANGAN: ".$dataCheckBj[$i]['KETERANGAN']."\n";
					} 

					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $api.$token.$method);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, ['chat_id' => $chatId, 'text' => $message]);

					$result[] = curl_exec($ch);
				}

				
			} else {
				$setingNotifikasi = $this->model->getSettingNotifikasi();

				foreach ($setingNotifikasi as $key => $value) {
					$chatId = $value['ID_TELEGRAM'];
					$message = "REPORT KEGIATAN SUBKONTRAK \n";
					$message .= "NOMOR SURAT: ".$data['persetujuan'][0]['NOMOR_SURAT'];
					$message .= "\nTANGGAL SURAT: ".$data['persetujuan'][0]['TANGGAL_SURAT'];
					$message .= "\nPENERIMA: ".$data['persetujuan'][0]['PENERIMA'];
					$message .= "\nALAMAT: ".$data['persetujuan'][0]['ALAMAT_PENERIMA'];
					$message .= "\nPEKERJAAN: ".$data['persetujuan'][0]['PEKERJAAN'];
					$message .= "\nNILAI JAMINAN: Rp ".number_format($data['persetujuan'][0]['NILAI_JAMINAN'],2,'.',',');
					$message .= "\nJATUH TEMPO: ".$data['persetujuan'][0]['TANGGAL_JATUH_TEMPO'];
					$message .= "\n \nDATA DOKUMEN BC 261 262 TIDAK DITEMUKAN \n";

					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $api.$token.$method);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, ['chat_id' => $chatId, 'text' => $message]);

					$result[] = curl_exec($ch); 
				}
			}
		}
		// return $result;
	}

	private function searchArray($n,$h,$field){
		foreach ($h as $key => $value) {
			if ($value[$field] == $n) {
				return $key;
			}
		}

		return FALSE;
	}

	public function cekSubkon($data = null){
			// get all dokumen persetujuan yang belum jatuh tempo

			// foreach ($data as $key => $value) {
			// 	$this->getPerhitungan($value['NOMOR_SURAT']);
			// }

		return $data;
	}

	public function MonitoringCctv(){
		$this->MonitoringAkses(1);
	}

	public function MonitoringIt(){
		$this->MonitoringAkses(2);
	}

	public function MonitoringEseal(){
		$this->MonitoringAkses(3);
	}

	public function MonitoringAkses($akses){
		$data = $this->model->getAksesForCheck($akses);
		$hasil['tipe'] = $akses;
		$hasil['jumlah'] = count($data);
		$hasil['success'] = [];
		$hasil['failed'] = [];

		foreach ($data as $key => $value) {
			if ($value['PROTOCOL'] != NULL) {
				$url = $value['PROTOCOL'].$value['ALAMAT_AKSES'];
			} else {
				$url = 'http://'.$value['ALAMAT_AKSES'];
			}
			// $url = $value['IpAddress'];
			$headers = [
				'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
				'Accept-Encoding: gzip, deflate, br',
				'Accept-Language: en-US,en;q=0.9',
				'Cache-Control: max-age=0',
				'Connection: keep-alive',
				'Upgrade-Insecure-Requests: 1',
			];

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_TIMEOUT, 90);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_VERBOSE, true);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 90);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
			curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36 Edg/81.0.416.58');
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			
			$datach = curl_exec($ch);
			$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			// $httpcode[] = curl_getinfo($ch, CURLINFO_HEADER_OUT);
			curl_close($ch);
			if ($httpcode >= 200 && $httpcode < 300) {
				// $ret_val = 0;
				// $hasil['Ip'] = $url;
				$hasil['success'][] = [
					'ID_STAKEHOLDERS' 	=> $value['ID_STAKEHOLDERS'],
					'ID_AKSES' 			=> $value['ID_AKSES'],
					'ALAMAT_CHECK' 		=> $url,
					'HASIL'				=> 'Y',
					// 'data_curl' 		=> $datach,
					'HTTP_CODE' 			=> $httpcode
				];
			} else {
				// $ip = preg_split("/[ :| \/]/", $url);
				// exec('ping ' . $ip[0], $output, $ret_val);
				// $hasil['Ip'] = $ip[0];
				$hasil['failed'][] = [
					'ID_STAKEHOLDERS' 	=> $value['ID_STAKEHOLDERS'],
					'ID_AKSES' 			=> $value['ID_AKSES'],
					'ALAMAT_CHECK' 		=> $url,
					'HASIL'				=> 'N',
					// 'data_curl' 		=> $datach,
					'HTTP_CODE' 			=> $httpcode
				];
			}

			// print_r([$value,$datach,$httpcode,$url]);
		}
		$status = $this->model->postRobotCheck($hasil);

		// print_r($hasil);
	}

	public function viewHasil(){
		$data = $this->model->getHasil();

		print_r(base64_decode($data[3]['data_curl'], false));
	}

	// public function migrasiCadas(){
	// 	$status = $this->stake->migrasiData();

	// 	print_r($status);
	// }

	// public function migrasiAkses(){
	// 	$status = $this->stake->migrasiAkses();

	// 	print_r($status);
	// }

	private function callAPI($method, $url, $data){
		$curl = curl_init();
		switch ($method){
			case "POST":
			curl_setopt($curl, CURLOPT_POST, 1);
			if ($data)
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			break;
			case "PUT":
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
			if ($data)
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
			break;
			default:
			if ($data)
				$url = sprintf("%s?%s", $url, http_build_query($data));
		}
   // OPTIONS:
		curl_setopt($curl, CURLOPT_URL, $url);
		// curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		// 	'Content-Type: application/json',
		// ));
		curl_setopt($curl, CURLOPT_VERBOSE, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		// curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   // EXECUTE:
		$result = curl_exec($curl);
		if(!$result){die("Connection Failure");}
		curl_close($curl);
		if ($result === FALSE) {
			echo 'FALSE RESULT';
		} else {
			return $result;
		}
		
	}

	public function testPertukaranData(){
		$get_data = $this->callAPI('GET', 'http://cadas.id/DownloadExcel/getJSON?id=BC051000&password=bccikarang051000&type=pemasukan&dari=2021-02-01&sampai=2021-02-04&npwp=010695054052000', false);
		$response = json_decode($get_data, true);

		print_r($response);

		// $status = $this->model->uploadApi($response['response']['list']);

		// print_r($status);
	}
}