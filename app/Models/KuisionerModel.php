<?php 
namespace App\Models;

use CodeIgniter\Model;

class KuisionerModel extends Model
{
	protected $table      = 'tableName';
	protected $primaryKey = 'id';

	protected $returnType = 'array';
	protected $useSoftDeletes = true;

	protected $allowedFields = [];

	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';

	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = false;


	public function __construct($param = null)
	{
		$this->cadas = \Config\Database::connect('cadas');
		$this->kuisioner = \Config\Database::connect('kuisioner');
	}

	public function getNegara(){
		$builder = $this->cadas->table('referensi_negara');
		$builder->select('KODE_NEGARA, URAIAN_NEGARA');
		$builder->like('URAIAN_NEGARA', $_GET['search']);
		$query = $builder->get();

		return $query->getResultArray();
	}

	public function getRefKantor(){
		$builder = $this->cadas->table('referensi_kantor_pabean');
		$builder->select('URAIAN_KANTOR');
		if ($_GET['search'] != 0) {
			$builder->like('URAIAN_KANTOR', $_GET['search']);
		}
		$query = $builder->get();
		$data = $query->getResultArray();

		foreach ($data as $key => $value) {
			$RefKantor[] = ["id" => $value['URAIAN_KANTOR'], "text" => $value['URAIAN_KANTOR']];
		}

		return ["results" => $RefKantor];
	}

	public function getProvinsi($search) {
		$builder = $this->cadas->table('inf_lokasi');
		$builder->where('lokasi_kabupatenkota', 00);
		$builder->where('lokasi_kecamatan', 00);
		$builder->where('lokasi_kelurahan', 0000);
		$builder->like('lokasi_nama', $search);

		$query = $builder->get();
		return $query->getResultArray();
	}

	public function getKabupaten($provinsi, $search) {
		// $sql = "SELECT lokasi_propinsi FROM inf_lokasi WHERE lokasi_kode=? limit 1";
		// $kodeProv = $this->sikabayan_db->query($sql, $provinsi)->result_array();
		$builder1 = $this->cadas->table('inf_lokasi');
		$builder1->select('lokasi_propinsi');
		$builder1->where('lokasi_kode', $provinsi);
		$query1 = $builder1->get();
		$kodeProv = $query1->getResultArray();

		$builder2 = $this->cadas->table('inf_lokasi');
		$builder2->where('lokasi_propinsi', $kodeProv[0]['lokasi_propinsi']);
		$builder2->where('lokasi_kabupatenkota !=', 00);
		$builder2->where('lokasi_kecamatan', 00);
		$builder2->where('lokasi_kelurahan', 0000);
		$builder2->like('lokasi_nama', $search);

		$query = $builder2->get();
		return $query->getResultArray();
		// return $kodeProv;
	}

	public function getKecamatan($kabupaten, $search) {
		// $sql = "SELECT lokasi_propinsi, lokasi_kabupatenkota FROM inf_lokasi WHERE lokasi_kode=? limit 1";
		// $kodeKab = $this->sikabayan_db->query($sql, $kabupaten)->result_array();
		$builder1 = $this->cadas->table('inf_lokasi');
		$builder1->select('lokasi_propinsi, lokasi_kabupatenkota');
		$builder1->where('lokasi_kode', $kabupaten);
		$query1 = $builder1->get();
		$kodeKab = $query1->getResultArray();

		$builder2 = $this->cadas->table('inf_lokasi');
		$builder2->where('lokasi_propinsi', $kodeKab[0]['lokasi_propinsi']);
		$builder2->where('lokasi_kabupatenkota', $kodeKab[0]['lokasi_kabupatenkota']);
		$builder2->where('lokasi_kecamatan !=', 00);
		$builder2->where('lokasi_kelurahan', 0000);
		$builder2->like('lokasi_nama', $search);

		$query = $builder2->get();
		return $query->getResultArray();
	}

	public function getKelurahan($kecamatan, $search) {
		// $sql = "SELECT lokasi_propinsi, lokasi_kabupatenkota, lokasi_kecamatan FROM inf_lokasi WHERE lokasi_kode=? limit 1";
		// $kodeKec = $this->sikabayan_db->query($sql, $kecamatan)->result_array();

		$builder1 = $this->cadas->table('inf_lokasi');
		$builder1->select('lokasi_propinsi, lokasi_kabupatenkota, lokasi_kecamatan');
		$builder1->where('lokasi_kode', $kecamatan);
		$query1 = $builder1->get();
		$kodeKec = $query1->getResultArray();

		$builder2 = $this->cadas->table('inf_lokasi');
		$builder2->where('lokasi_propinsi', $kodeKec[0]['lokasi_propinsi']);
		$builder2->where('lokasi_kabupatenkota', $kodeKec[0]['lokasi_kabupatenkota']);
		$builder2->where('lokasi_kecamatan', $kodeKec[0]['lokasi_kecamatan']);
		$builder2->where('lokasi_kelurahan !=', 00);
		$builder2->like('lokasi_nama', $search);

		$query = $builder2->get();
		return $query->getResultArray();
	}

	public function getNamaDaerah($kode){
		$builder = $this->cadas->table('inf_lokasi');
		$builder->select('lokasi_nama');
		$builder->where('lokasi_kode', $kode);

		return $builder->get()->getRowArray();
	}

	public function submitKuisioner($fileData = NULL){
		$this->kuisioner->transStart();

		// INSERT TABLE MASTER
		$dataMaster = [
			'EMAIL_PENGISI' => $_POST['emailKuisioner'],
			'NAMA_LENGKAP_PENGISI' => $_POST['I-namaPPK'],
			'JABATAN_PENGISI' => $_POST['I-jabatanPPK'],
			'HANDPHONE' => $_POST['I-handphone'],
			'EMAIL_PENANGGUNG_JAWAB' => $_POST['I-emailPJ']
		];
		$this->kuisioner->table('master')->insert($dataMaster);

		$ID_MASTER = $this->kuisioner->insertID();
		// $ID_MASTER = 1;

		// INSERT TABLE FASILITAS
		$dataFasilitas = array();
		foreach ($_POST['I-fasilitas'] as $key => $value) {
			$dataFasilitas[] = [
				'ID_MASTER' => $ID_MASTER,
				'FASILITAS' => $value
			];
		}
		$this->kuisioner->table('fasilitas')->insertBatch($dataFasilitas);

		// INSERT TABLE PROFIL PERUSAHAAN
		$dataProfil = [
			'ID_MASTER' => $ID_MASTER,
			'NAMA_PERUSAHAAN' => $_POST['II-namaPerusahaan'],
			'NPWP_PERUSAHAAN' => $_POST['II-npwpPerusahaan'],
			'EMAIL_PERUSAHAAN' => $_POST['II-emailPT'],
			'ALAMAT_PERUSAHAAN' => $_POST['II-alamatPerusahaan'],
			'TAHUN_BERDIRI' => $_POST['II-tahunBerdiri'],
			'IZIN_IUI' => $_POST['II-jenisIndustriIUI'],
			'JENIS_INVESTASI' => $_POST['II-jenisInvestasi'],
			'TAHUN_FASILITAS' => $_POST['II-tahunFasilitas'],
			'TUJUAN_PENJUALAN' => $_POST['II-tujuanPenjualan'],
			'KPPBC_PENGAWASAN' => $_POST['II-kppbcpengawasan'],
			'JENIS_PRODUKSI' => $_POST['II-jenisProduksi'],
			'PROVINSI_PERUSAHAAN' => $_POST['II-provinsi'],
			'KOTA_PERUSAHAAN' => $_POST['II-kota'],
			'KECAMATAN_PERUSAHAAN' => $_POST['II-kecamatan'],
			'KELURAHAN_PERUSAHAAN' => $_POST['II-kelurahan'],
			'NAMA_JALAN_PERUSAHAAN' => $_POST['II-namaJalan'],
			'FLAG_TPB_LAIN' => $_POST['II-kbLain'],
			'PPH_BADAN' => $_POST['VII-pphBadan'],
			'PERIODE_LK' => $_POST['VI-periodeLaporanKeuangan'],
			'LABA' => $_POST['VI-labaSebelumPajak'],
			'PAJAK_DAERAH' => $_POST['IX-pajakDaerah'],
			'BEBAN_GAJI' => $_POST['IX-bebanUpah'],
			'DEPRESIASI' => $_POST['IX-depresiasi'],
			'PAJAK_TIDAK_LANGSUNG' => $_POST['IX-pajakTidakLangsung']
		];

		if ($_POST['VII-pphBadan'] == 0) {
			if ($_POST['VII-alasanPphBadan'] === "Lainnya") {
				$dataProfil['ALASAN_PPH_BADAN'] = $_POST['VII-alasanPphBadan-input'];
			} else {
				$dataProfil['ALASAN_PPH_BADAN'] = $_POST['VII-alasanPphBadan'];
			}
		}

		$this->kuisioner->table('profil_perusahaan')->insert($dataProfil);

		// INSERT TABLE PERUSAHAAN SEKITAR
		$dataTpbSekitar = [];
		if (isset($_POST['II-namaKbLain'])) {
			foreach ($_POST['II-namaKbLain'] as $key => $value) {
				$dataTpbSekitar[] = [
					'ID_MASTER' => $ID_MASTER,
					'NAMA_PERUSAHAAN' => $value
				];
			}

			$this->kuisioner->table('perusahaan_sekitar')->insertBatch($dataTpbSekitar);	
		}

		// INSERT TABLE HASIL PRODUKSI
		$dataHasilProduksi = [
			'ID_MASTER' => $ID_MASTER,
			'PERSENTASE_LOKAL' => $_POST['III-persenBbLokal'],
			'DEVISA_IMPOR' => $_POST['III-devisaImpor'],
			'DEVISA_EKSPOR' => $_POST['III-devisaEkspor'],
			'NILAI_FASILTIAS' => $_POST['III-nilaiFasilitas'],
		];
		$this->kuisioner->table('hasil_produksi')->insert($dataHasilProduksi);

		// INSERT TABLE DETAIL HASIL PRODUKSI
		$buildBarang = $this->kuisioner->table('detail_hasil_produksi');
		$hasilProduksi = [];
		foreach ($_POST['III-hasilProduksi'] as $key=>$value) {
			$hasilProduksi[] = [
				'ID_MASTER' => $ID_MASTER,
				'KODE_BARANG' => 'FG',
				'NAMA_BARANG' => $value
			];
		}
		$buildBarang->insertBatch($hasilProduksi);

		$merkProduksi = [];
		foreach ($_POST['III-merkProduksi'] as $key=>$value) {
			$merkProduksi[] = [
				'ID_MASTER' => $ID_MASTER,
				'KODE_BARANG' => 'MERK',
				'NAMA_BARANG' => $value
			];
		}
		$buildBarang->insertBatch($merkProduksi);

		$bahanImporProduksi = [];
		foreach ($_POST['III-bbImpor'] as $key=>$value) {
			$bahanImporProduksi[] = [
				'ID_MASTER' => $ID_MASTER,
				'KODE_BARANG' => 'BB_I',
				'NAMA_BARANG' => $value
			];
		}
		$buildBarang->insertBatch($bahanImporProduksi);

		$bahanLokalProduksi = [];
		foreach ($_POST['III-bbLokal'] as $key=>$value) {
			$bahanLokalProduksi[] = [
				'ID_MASTER' => $ID_MASTER,
				'KODE_BARANG' => 'BB_L',
				'NAMA_BARANG' => $value
			];
		}
		$buildBarang->insertBatch($bahanLokalProduksi);

		// INSERT TABLE TENAGA KERJA
		$dataTK = [
			'ID_MASTER' => $ID_MASTER,
			'TOTAL_TK' => $_POST['IV-totalTK'],
			'TKA_TERDIDIK_WN' => $_POST['IV-tkaTddkPr'],
			'TKA_TERDIDIK_LK' => $_POST['IV-tkaTddkLk'],
			'TKA_TERLATIH_WN' => $_POST['IV-tkaTlthPr'],
			'TKA_TERLATIH_LK' => $_POST['IV-tkaTlthLk'],
			'TKA_LAIN_WN' => $_POST['IV-tkaLainPr'],
			'TKA_LAIN_LK' => $_POST['IV-tkaLainLk'],
			'TKL_TERDIDIK_WN' => $_POST['IV-tklTddkPr'],
			'TKL_TERDIDIK_LK' => $_POST['IV-tklTddkLk'],
			'TKL_TERLATIH_WN' => $_POST['IV-tklTlthPr'],
			'TKL_TERLATIH_LK' => $_POST['IV-tklTlthLk'],
			'TKL_LAIN_WN' => $_POST['IV-tklLainPr'],
			'TKL_LAIN_LK' => $_POST['IV-tklLainLk'],
		];
		$this->kuisioner->table('tenaga_kerja')->insert($dataTK);

		// INSERT TABLE INVESTASI
		$dataInvestasi = [
			'ID_MASTER' => $ID_MASTER,
			'NILAI_PENAMBAHAN' => $_POST['V-penambahanInvestasi'],
			'TOTAL_INVESTASI' => $_POST['V-totalInvestasi'],
			'BARANG_MODAL_DISEWA' => $_POST['V-mesinSewa']
		];
		// $this->kuisioner->table('investasi')->insert($dataInvestasi);

		// INSERT TABLE DETAIL INVESTASI
		$buildInvest = $this->kuisioner->table('detail_investasi');
		$penambahan = [];
		if (isset($_POST['V-bentukPenamahan'])) {
			foreach ($_POST['V-bentukPenamahan'] as $key=>$value) {
				$penambahan[] = [
					'ID_MASTER' => $ID_MASTER,
					'KODE' => 'TAMBAH',
					'BENTUK' => $value
				];
			}
			$buildInvest->insertBatch($penambahan);	
		}

		$mesinSewa = [];
		if (isset($_POST['V-bentukMesinSewa'])) {
			foreach ($_POST['V-bentukMesinSewa'] as $key=>$value) {
				$mesinSewa[] = [
					'ID_MASTER' => $ID_MASTER,
					'KODE' => 'SEWA',
					'BENTUK' => $value
				];
			}
			$buildInvest->insertBatch($mesinSewa);	
		}

		// INSERT TABLE JARINGAN INDUSTRI
		$jaringanIndustri = [
			'ID_MASTER' => $ID_MASTER,
			'FASILITAS' => $_POST['X-jaringanFasilitas'],
			'NON_FASILITAS' => $_POST['X-jaringanNonFasilitas']
		];
		$this->kuisioner->table('jaringan_industri')->insert($jaringanIndustri);

		$jaringanFasilitas = [];
		if (isset($_POST['X-detailjaringanFasilitas'])) {
			foreach ($_POST['X-detailjaringanFasilitas'] as $key=>$value) {
				$jaringanFasilitas[] = [
					'ID_MASTER' => $ID_MASTER,
					'KODE' => 'F',
					'NAMA_PERUSAHAAN' => $value
				];
			}
			$this->kuisioner->table('detail_jaringan_industri')->insertBatch($jaringanFasilitas);	
		}

		$jaringanNonFasilitas = [];
		if (isset($_POST['X-detailjaringanNonFasilitas'])) {
			foreach ($_POST['X-detailjaringanNonFasilitas'] as $key => $value) {
				$jaringanNonFasilitas[] = [
					'ID_MASTER' => $ID_MASTER,
					'KODE' => 'N',
					'NAMA_PERUSAHAAN' => $value
				];
			}
			$this->kuisioner->table('detail_jaringan_industri')->insertBatch($jaringanNonFasilitas);

		}

		$dataTKJaringan= [];
		$jaringanSeri = json_decode($_POST['X-jaringanSeri'], true);
		$jaringanNama = json_decode($_POST['X-jaringanNama'], true);
		$jaringanNpwp = json_decode($_POST['X-jaringanNpwp'], true);
		$jaringanJumlah = json_decode($_POST['X-jaringanJumlah'], true);
		if (isset($_POST['X-jaringanSeri'])) {
			for ($i = 0; $i < count($jaringanSeri); $i++) {
				$dataTKJaringan[] = array(
					'ID_MASTER' => $ID_MASTER,
					'SERI' => $jaringanSeri[$i],
					'NAMA_PERUSAHAAN' => $jaringanNama[$i],
					'NPWP_NON_FASILITAS' => $jaringanNpwp[$i],
					'TENAGA_KERJA' => $jaringanJumlah[$i]
				);
			}
			$this->kuisioner->table('tk_jaringan_industri')->insertBatch($dataTKJaringan);	
		}

		// INSERT TABLE PELAKU USAHA
		$dataPelakuUsaha = [
			'ID_MASTER' => $ID_MASTER,
			'DAGANG_RT' => $_POST['XI-dagangRumah'],
			'DAGANG_KCL' => $_POST['XI-dagangKecil'],
			'DAGANG_SDG' => $_POST['XI-dagangSedang'],
			'DAGANG_BSR' => $_POST['XI-dagangBesar'],
			'AKOMODASI_RT' => $_POST['XI-akomodasiRumah'],
			'AKOMODASI_KCL' => $_POST['XI-akomodasiKecil'],
			'AKOMODASI_SDG' => $_POST['XI-akomodasiSedang'],
			'AKOMODASI_BSR' => $_POST['XI-akomodasiBesar'],
			'MAKANAN_RT' => $_POST['XI-makananRumah'],
			'MAKANAN_KCL' => $_POST['XI-makananKecil'],
			'MAKANAN_SDG' => $_POST['XI-makananSedang'],
			'MAKANAN_BSR' => $_POST['XI-makananBesar'],
			'TRANSPORT_RT' => $_POST['XI-transportRumah'],
			'TRANSPORT_KCL' => $_POST['XI-transportKecil'],
			'TRANSPORT_SDG' => $_POST['XI-transportSedang'],
			'TRANSPORT_BSR' => $_POST['XI-transportBesar']
		];
		$this->kuisioner->table('pelaku_usaha')->insert($dataPelakuUsaha);

		// INSERT TABLE PERTANYAAN UMUM
		$umum3 = "";
		$umum4 = "";
		$umum7 = "";
		$umum12 = "";
		$umum6Jelas = "";

		for ($i = 0; $i < count($_POST['XII-umum3']); $i++) {
			if ($_POST['XII-umum3'][$i] == "Lainnya") {
				$umum3 .= "Lainnya: ".$_POST['XII-umum3-input'];
			} else {
				$umum3 .= $_POST['XII-umum3'][$i];
			}

			if ($i != (count($_POST['XII-umum3'])-1)) {
				$umum3 .= ", ";
			}
		}

		for ($i = 0; $i < count($_POST['XII-umum4']); $i++) {
			if ($_POST['XII-umum4'][$i] == "Lainnya") {
				$umum4 .= "Lainnya: ".$_POST['XII-umum4-input'];
			} else {
				$umum4 .= $_POST['XII-umum4'][$i];
			}

			if ($i != (count($_POST['XII-umum4'])-1)) {
				$umum4 .= ", ";
			}
		}

		for ($i = 0; $i < count($_POST['XII-umum7']); $i++) {
			if ($_POST['XII-umum7'][$i] == "Lainnya") {
				$umum7 .= "Lainnya: ".$_POST['XII-umum7-input'];
			} else {
				$umum7 .= $_POST['XII-umum7'][$i];
			}

			if ($i != (count($_POST['XII-umum7'])-1)) {
				$umum7 .= ", ";
			}
		}

		for ($i = 0; $i < count($_POST['XII-umum12']); $i++) {
			switch ($_POST['XII-umum12'][$i]) {
				case 0:
					$umum12 .= "Penambahan insentif fiskal berupa : ".$_POST['XII-umum12-1'].", ";
					break;
				case 1:
					$umum12 .= "Kemudahan perizinan berupa : ".$_POST['XII-umum12-2'].", ";
					break;
				case 2:
					$umum12 .= "Pembiayaan".", ";
					break;
				case 3:
					$umum12 .= "Pemasaran di luar negeri".", ";
					break;
				
				default:
					$umum12 .= "Lainnya: ".$_POST['XII-umum12-5'];
					break;
			}
		}

		if ($_POST['XII-umum6-select'] == "Ya") {
			for ($i = 0; $i < count($_POST['XII-umum6']) ; $i++) {
				$umum6Jelas .= $_POST['XII-umum6'][$i];

				if ($_POST['XII-umum6'][$i] == "Lainnya") {
					$umum6Jelas .= ", Lainnya: ".$_POST['XII-umum6-jelas-ya'];
				} else {
					$umum6Jelas .= ", ";
				}
			}	
		} else {
			for ($i = 0; $i < count($_POST['XII-umum6']) ; $i++) {
				$umum6Jelas .= $_POST['XII-umum6'][$i];

				if ($_POST['XII-umum6'][$i] == "Lainnya") {
					$umum6Jelas .= ", Lainnya: ".$_POST['XII-umum6-jelas-tidak'];
				} else {
					$umum6Jelas .= ", ";
				}
			}	
		}

		$dataUmum = [
			'ID_MASTER' => $ID_MASTER,
			'UMUM_1' => $_POST['XII-umum1'],
			'UMUM_1_JELAS' => $_POST['XII-umum1-jelas'],
			'UMUM_2_A' => $_POST['XII-umum2-a'],
			'UMUM_2_B' => $_POST['XII-umum2-b'],
			'UMUM_2_C' => $_POST['XII-umum2-c'],
			'UMUM_3' => $umum3,
			'UMUM_4' => $umum4,
			'UMUM_5_A' => $_POST['XII-umum5'],
			'UMUM_5_B' => $_POST['XII-umum5-jelas'],
			'UMUM_5_C' => $_POST['XII-umum5-kelebihan'],
			'UMUM_6_A' => $_POST['XII-umum6-select'],
			'UMUM_6_B' => $umum6Jelas,
			'UMUM_7' => $umum7,
			'UMUM_9' => $_POST['XII-umum9'],
			'UMUM_10' => $_POST['XII-umum10'],
			'UMUM_11' => $_POST['XII-umum11'],
			'UMUM_12' => $umum12
		];

		if (!empty($_POST['XI-umum8-a'])) {
			$dataUmum['UMUM_8_A'] = $_POST['XII-umum8-a'];
			$dataUmum['UMUM_8_B'] = $_POST['XII-umum8-b'];
			$dataUmum['UMUM_8_C'] = $_POST['XII-umum8-c'];
		}

		$this->kuisioner->table('umum')->insert($dataUmum);

		// INSERT TABLE PERPAJAKAN
		$dataPerpajakan = [
			'ID_MASTER' => $ID_MASTER,
			'PPh21Y1' => $_POST['VIII-pph21Y1'],
			'PPh21Y0' => $_POST['VIII-pph21Y0'],
			'PPh22Y1' => $_POST['VIII-pph22Y1'],
			'PPh22Y0' => $_POST['VIII-pph22Y0'],
			'PPh22Y1_NON_IMPOR' => $_POST['VIII-pph22Y1nonImpor'],
			'PPh22Y0_NON_IMPOR' => $_POST['VIII-pph22Y0nonImpor'],
			'PPh23Y1' => $_POST['VIII-pph23Y1'],
			'PPh23Y0' => $_POST['VIII-pph23Y0'],
			'PPh26Y1' => $_POST['VIII-pph26Y1'],
			'PPh26Y0' => $_POST['VIII-pph26Y0'],
			'PPh42Y1' => $_POST['VIII-pph42Y1'],
			'PPh42Y0' => $_POST['VIII-pph42Y0'],
			'PPN_MASUKAN1' => $_POST['VIII-ppnMasukan1'],
			'PPN_MASUKAN0' => $_POST['VIII-ppnMasukan0'],
			'PPN_KELUARAN1' => $_POST['VIII-ppnKeluaran1'],
			'PPN_KELUARAN0' => $_POST['VIII-ppnKeluaran0'],
			'PPN_SELISIH1' => $_POST['VIII-ppnSelisih1'],
			'PPN_SELISIH0' => $_POST['VIII-ppnSelisih0'],
			'PBB1' => $_POST['VIII-pbb1'],
			'PBB0' => $_POST['VIII-pbb0'],
			
		];

		$this->kuisioner->table('perpajakan')->insert($dataPerpajakan);

		$count = count($fileData);
		if (!is_null($fileData)) {
			for ($i = 0; $i < count($fileData); $i++) {
				$fileData[$i]['ID_MASTER'] = $ID_MASTER;
			}
			$this->kuisioner->table('foto')->insertBatch($fileData);
		}

		if ($this->kuisioner->transStatus() === FALSE) {
			$this->kuisioner->transRollback();
			return "gagal";
		} else {
			$this->kuisioner->transCommit();
			return "sukses";
			// return [$count,$dataMaster, $dataProfil, $dataUmum, $dataTKJaringan, $dataPerpajakan, $fileData];
		}
	}

	public function getAllMasterID(){
		$builder = $this->kuisioner->table('master');
		$builder->select('ID');
		$data = $builder->get()->getResultArray();

		$ID_MASTER_ARRAY = [];
		foreach ($data as $key => $value) {
			$ID_MASTER_ARRAY[] = $value['ID'];
		}
		return $ID_MASTER_ARRAY;
	}

	public function getKuisionerData($ID){
		$result = [];
		$builder = $this->kuisioner;

		$result['master'] = $builder->table('master')->where('ID', $ID)->get()->getRowArray();
		$result['profil'] = $builder->table('profil_perusahaan')->where('ID_MASTER', $ID)->get()->getRowArray();
		$result['hasil_produksi'] = $builder->table('hasil_produksi')->where('ID_MASTER',$ID)->get()->getRowArray();
		$result['barang_baku_impor'] = $builder->table('detail_hasil_produksi')->where('ID_MASTER', $ID)->where('KODE_BARANG', 'BB_I')->get()->getResultArray();
		$result['barang_baku_lokal'] = $builder->table('detail_hasil_produksi')->where('ID_MASTER', $ID)->where('KODE_BARANG', 'BB_L')->get()->getResultArray();
		$result['barang_jadi'] = $builder->table('detail_hasil_produksi')->where('ID_MASTER', $ID)->where('KODE_BARANG', 'FG')->get()->getResultArray();
		$result['barang_merk'] = $builder->table('detail_hasil_produksi')->where('ID_MASTER', $ID)->where('KODE_BARANG', 'MERK')->get()->getResultArray();
		$result['investasi_tambah'] = $builder->table('detail_investasi')->where('ID_MASTER',$ID)->where('KODE','TAMBAH')->get()->getResultArray();
		$result['investasi_sewa'] = $builder->table('detail_investasi')->where('ID_MASTER',$ID)->where('KODE','SEWA')->get()->getResultArray();
		$result['jaringan_fasilitas'] = $builder->table('detail_jaringan_industri')->where('ID_MASTER', $ID)->where('KODE','F')->get()->getResultArray();
		$result['jaringan_non_fasilitas'] = $builder->table('detail_jaringan_industri')->where('ID_MASTER', $ID)->where('KODE','N')->get()->getResultArray();
		$result['fasilitas'] = $builder->table('fasilitas')->where('ID_MASTER', $ID)->get()->getResultArray();
		$result['foto'] = $builder->table('foto')->where('ID_MASTER', $ID)->get()->getResultArray();
		$result['investasi'] = $builder->table('investasi')->where('ID_MASTER', $ID)->get()->getRowArray();
		$result['jaringan_industri'] = $builder->table('jaringan_industri')->where('ID_MASTER', $ID)->get()->getRowArray();
		$result['pelaku_usaha'] = $builder->table('pelaku_usaha')->where('ID_MASTER', $ID)->get()->getRowArray();
		$result['perusahaan_sekitar'] = $builder->table('perusahaan_sekitar')->where('ID_MASTER', $ID)->get()->getResultArray();
		$result['tenaga_kerja'] = $builder->table('tenaga_kerja')->where('ID_MASTER', $ID)->get()->getRowArray();
		$result['jaringan_tenaga_kerja'] = $builder->table('tk_jaringan_industri')->where('ID_MASTER', $ID)->get()->getResultArray();
		$result['umum'] = $builder->table('umum')->where('ID_MASTER', $ID)->get()->getRowArray();

		return $result;
	}

	// LAPKEU SECTION
	public function getLapkeuField(){
		$builder = $this->kuisioner->table('lk_referensi');
		$aktiva = $builder->select('ID, KODE, URAIAN')->where('TIPE', "AKTIVA")->get()->getResultArray();

		$passiva = $builder->select('ID, KODE, URAIAN')->where('TIPE', "PASSIVA")->get()->getResultArray();

		$laba = $builder->select('ID, KODE, URAIAN')->where('TIPE', "LABA")->get()->getResultArray();

		$rugi = $builder->select('ID, KODE, URAIAN')->where('TIPE', "RUGI")->get()->getResultArray();

		return ['aktiva' => $aktiva, 'passiva' => $passiva, 'laba' => $laba, 'rugi' => $rugi];
	}

	public function addLapkeu(){
		$this->kuisioner->transBegin();

		$dataHeader = [
			'TAHUN' => $_POST['TAHUN'],
			'NPWP'=> $_POST['NPWP'],
			'NAMA_WP' => $_POST['NAMA_WP'],
			'FASILITAS' => $_POST['FASILITAS'],
			'PENGURUS' => $_POST['JENIS_PENGURUS'],
			'NAMA_PENGURUS' => $_POST['PENGURUS'],
			'TEMPAT_TTD' => $_POST['TEMPAT'],
			'TANGGAL_SPT' => date("Y-m-d", strtotime($_POST['TANGGAL']))

		];

		$this->kuisioner->table('lk_header')->insert($dataHeader);

		$idHeader = $this->kuisioner->insertID();

		$lapkeuField = $this->getLapkeuField();

		$dataIsi = [];

		foreach ($lapkeuField['aktiva'] as $key => $value) {
			$dataIsi[] = [
				"ID_HEADER" => $idHeader,
				"KODE" => $value['KODE'],
				"ISI" => floatval($_POST[$value['KODE']])
			];
		}

		foreach ($lapkeuField['passiva'] as $key => $value) {
			$dataIsi[] = [
				"ID_HEADER" => $idHeader,
				"KODE" => $value['KODE'],
				"ISI" => floatval($_POST[$value['KODE']])
			];
		}

		if ($_POST['FASILITAS'] === "KB") {
			foreach ($lapkeuField['laba'] as $key => $value) {
				$dataIsi[] = [
					"ID_HEADER" => $idHeader,
					"KODE" => $value['KODE'],
					"ISI" => floatval($_POST[$value['KODE']])
				];
			}
		} else {
			foreach ($lapkeuField['rugi'] as $key => $value) {
				$dataIsi[] = [
					"ID_HEADER" => $idHeader,
					"KODE" => $value['KODE'],
					"ISI" => floatval($_POST[$value['KODE']])
				];
			}
		}

		$this->kuisioner->table('lk_isi')->insertBatch($dataIsi);

		$dataHubungan= [];

		for ($i=0; $i < count($_POST['PIHAK']) ; $i++) { 
			$dataHubungan[] = [
				'ID_HEADER' => $idHeader,
				'PIHAK' => $_POST['PIHAK'][$i],
				'JENIS_TRANSAKSI' => $_POST['TRANSAKSI'][$i],
				'NILAI' => floatval($_POST['NILAI_TRANSAKSI'][$i])
			];
		}

		$this->kuisioner->table('lk_hubungan')->insertBatch($dataHubungan);

		if ($this->kuisioner->transStatus() === FALSE) {
			$this->kuisioner->transRollback();

			return 'failed';
		} else {
			$this->kuisioner->transCommit();

			return 'success';
		}
	}
}