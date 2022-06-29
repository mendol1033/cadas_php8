<?php 
namespace App\Models;

use CodeIgniter\Model;

class MonitoringModel extends Model
{
	protected $table      = 'MonitoringModel';
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

	public function __construct()
	{
		$this->cadas = \Config\Database::connect('cadas');
		$this->dbtpb = \Config\Database::connect('dbtpb');
		$this->peloro = \Config\Database::connect('peloro');
		$this->monev = \Config\Database::connect('monev');
	}

	// MONEV SUBKON SECTION
	public function addPersetujuan(){
		$tglsrt = substr($_POST['tanggal'], 6)."-".substr($_POST['tanggal'], 3, 2)."-".substr($_POST['tanggal'], 0,2);
		$builder = $this->cadas->table('tb_subkon_persetujuan');
		$builder->where("SUBSTRING_INDEX(NOMOR_SURAT,'/',1)",$_POST['persetujuan']);
		$builder->where("TANGGAL_SURAT",$tglsrt);
		$count = $builder->countAllResults();

		if ($count === 0) {
			$this->cadas->transBegin();

			$data = [
				'NOMOR_SURAT' => $_POST['persetujuan'].'/WBC.09/KPP.MP.07/'.date('Y',strtotime($tglsrt)),
				'TANGGAL_SURAT' => $tglsrt,
				'NPWP' => $_POST['perusahaan'],
				'PENERIMA' => $_POST['penerima'],
				'NPWP_PENERIMA' => $_POST['npwp'],
				'ALAMAT_PENERIMA' => $_POST['alamat'],
				'NOMOR_KONTRAK' => $_POST['noKontrak'],
				'TANGGAL_KONTRAK' => substr($_POST['tanggalKontrak'],6)."-".substr($_POST['tanggalKontrak'], 3, 2)."-".substr($_POST['tanggalKontrak'], 0, 2),
				'PEKERJAAN' => $_POST['pekerjaan'],
				'NILAI_JAMINAN' => $_POST['jaminan'],
				'TANGGAL_JATUH_TEMPO' => substr($_POST['jatuhTempo'],6)."-".substr($_POST['jatuhTempo'], 3, 2)."-".substr($_POST['jatuhTempo'], 0, 2),
				'PETUGAS_REKAM' => $_SESSION['NipUser']

			];

			$builder->insert($data);
			$id = $this->cadas->insertID();

			$sqlBb = $this->cadas->table('tb_subkon_bahan_baku_t');
			$sqlBb->select('URAIAN_BARANG, KODE_BARANG, JUMLAH_SATUAN, SATUAN, KETERANGAN, NO_SERI');
			$dataBb = $sqlBb->get()->getResultArray();
			$bbData = [];

			foreach ($dataBb as $key => $value) {
				$bbData[] = [
					'ID_PERSETUJUAN' => $id,
					'NO_SERI' => $value['NO_SERI'],
					'URAIAN_BARANG' => $value['URAIAN_BARANG'],
					'KODE_BARANG' => $value['KODE_BARANG'],
					'JUMLAH_SATUAN' => $value['JUMLAH_SATUAN'],
					'SATUAN' => $value['SATUAN'],
					'KETERANGAN' => $value['KETERANGAN']
				];
			}

			$sqlBj = $this->cadas->table('tb_subkon_barang_jadi_t');
			$sqlBj->select('URAIAN_BARANG, KODE_BARANG, JUMLAH_SATUAN, SATUAN, KETERANGAN, NO_SERI');
			$dataBj = $sqlBb->get()->getResultArray();
			$bjData = [];

			foreach ($dataBj as $key => $value) {
				$bjData[] = [
					'ID_PERSETUJUAN' => $id,
					'NO_SERI' => $value['NO_SERI'],
					'URAIAN_BARANG' => $value['URAIAN_BARANG'],
					'KODE_BARANG' => $value['KODE_BARANG'],
					'JUMLAH_SATUAN' => $value['JUMLAH_SATUAN'],
					'SATUAN' => $value['SATUAN'],
					'KETERANGAN' => $value['KETERANGAN']
				];
			}

			$sqlBs = $this->cadas->table('tb_subkon_bahan_sisa_t');
			$sqlBs->select('URAIAN_BARANG, KODE_BARANG, JUMLAH_SATUAN, SATUAN, KETERANGAN, NO_SERI');
			$dataBs = $sqlBb->get()->getResultArray();
			$bsData = [];

			foreach ($dataBs as $key => $value) {
				$bsData[] = [
					'ID_PERSETUJUAN' => $id,
					'NO_SERI' => $value['NO_SERI'],
					'URAIAN_BARANG' => $value['URAIAN_BARANG'],
					'KODE_BARANG' => $value['KODE_BARANG'],
					'JUMLAH_SATUAN' => $value['JUMLAH_SATUAN'],
					'SATUAN' => $value['SATUAN'],
					'KETERANGAN' => $value['KETERANGAN']
				];
			}
			$this->cadas->table('tb_subkon_bahan_baku')->insertBatch($bbData);
			$this->cadas->table('tb_subkon_barang_jadi')->insertBatch($bjData);
			$this->cadas->table('tb_subkon_bahan_sisa')->insertBatch($bsData);

			if ($this->cadas->transStatus() === FALSE) {
				$this->cadas->transRollback();
				return FALSE;
			} else {
				$this->cadas->transCommit();
				$deleteBbSql = 'TRUNCATE `cadas_app`.`tb_subkon_bahan_baku_t`';
				$deleteBjSql = 'TRUNCATE `cadas_app`.`tb_subkon_barang_jadi_t`';
				$deleteBsSql = 'TRUNCATE `cadas_app`.`tb_subkon_bahan_sisa_t`';
				$this->cadas->query($deleteBbSql);
				$this->cadas->query($deleteBjSql);
				$this->cadas->query($deleteBsSql);
				return TRUE;
			}
		} else {
			return "Data Surat Persetujuan Sudah Direkam";
		}
	}

	public function getDetailS(){
		switch ($_GET['barang']) {
			case 'bb':
			$builder = $this->cadas->table('tb_subkon_bahan_baku_t');
			break;
			case 'bs':
			$builder = $this->cadas->table('tb_subkon_bahan_sisa_t');
			break;
			default:
			$builder = $this->cadas->table('tb_subkon_barang_jadi_t');
			break;
		}

		$query = $builder->get();
		$data = $query->getResultArray();

		return $data;
	}

	public function addTransit(){
		switch ($_POST['barang']) {
			case 'bb':
			$builder = $this->cadas->table('tb_subkon_bahan_baku_t');
			$data = [
				'NO_SERI' => $_POST['noSeri'],
				'URAIAN_BARANG' => $_POST['uraianBb'],
				'KODE_BARANG' => $_POST['kodeBb'],
				'JUMLAH_SATUAN' => $_POST['jumlahBb'],
				'SATUAN' => $_POST['satuanBb'],
				'KETERANGAN' => $_POST['ketBb']
			];
			break;
			case 'bj':
			$builder = $this->cadas->table('tb_subkon_barang_jadi_t');
			$data = [
				'NO_SERI' => $_POST['noSeri'],
				'URAIAN_BARANG' => $_POST['uraianBj'],
				'KODE_BARANG' => $_POST['kodeBj'],
				'JUMLAH_SATUAN' => $_POST['jumlahBj'],
				'SATUAN' => $_POST['satuanBj'],
				'KETERANGAN' => $_POST['ketBj']
			];
			break;
			default:
			$builder = $this->cadas->table('tb_subkon_bahan_sisa_t');
			$data = [
				'NO_SERI' => $_POST['noSeri'],
				'URAIAN_BARANG' => $_POST['uraianBs'],
				'KODE_BARANG' => $_POST['kodeBs'],
				'JUMLAH_SATUAN' => $_POST['jumlahBs'],
				'SATUAN' => $_POST['satuanBs'],
				'KETERANGAN' => $_POST['ketBs']
			];
			break;
		}

		$this->cadas->transBegin();

		$builder->insert($data);

		if ($this->cadas->transStatus() === FALSE) {
			$this->cadas->transRollback();
			return FALSE;
		} else {
			$this->cadas->transCommit();
			return TRUE;
		}
	}

	public function getPersetujuan(){
		$builder = $this->cadas->table('tb_subkon_persetujuan');
		$builder->select('NOMOR_SURAT');
		$builder->where('TANGGAL_JATUH_TEMPO >',date('Y-m-d'));

		return $builder->get()->getResultArray();
	}

	public function getSettingNotifikasi(){
		$builder = $this->cadas->table('tb_setting_notifikasi');
		$builder->select('ID_TELEGRAM');

		return $builder->get()->getResultArray();
	}

	public function getPerhitunganBySuratPersetujuan($surat){
		$persetujuan = $this->cadas->table('tb_subkon_persetujuan');
		$persetujuan->like('NOMOR_SURAT',$surat);
		$dataPersetujuan = $persetujuan->get()->getResultArray();

		$bb = $this->cadas->table('tb_subkon_bahan_baku');
		$bb->where('ID_PERSETUJUAN',$dataPersetujuan[0]['ID_PERSETUJUAN']);
		$dataBb = $bb->get()->getResultArray();

		$bj = $this->cadas->table('tb_subkon_barang_jadi');
		$bj->where('ID_PERSETUJUAN',$dataPersetujuan[0]['ID_PERSETUJUAN']);
		$dataBj = $bj->get()->getResultArray();

		$bs = $this->cadas->table('tb_subkon_bahan_sisa');
		$bs->where('ID_PERSETUJUAN',$dataPersetujuan[0]['ID_PERSETUJUAN']);
		$dataBs = $bs->get()->getResultArray();

		$tpb = $this->dbtpb->table('tpb_dokumen_pelengkap');
		$tpb->select('NOMOR_AJU');
		$tpb->where('NOMOR_DOKUMEN', $dataPersetujuan[0]['NOMOR_SURAT']);
		$countAju = $tpb->countAllResults();

		$tpb = $this->dbtpb->table('tpb_dokumen_pelengkap');
		$tpb->select('NOMOR_AJU');
		$tpb->where('NOMOR_DOKUMEN', $dataPersetujuan[0]['NOMOR_SURAT']);
		$dataAju = $tpb->get()->getResultArray();

		if ($countAju > 0) {
			foreach ($dataAju as $key => $value) {
				$whereAju[] = $value['NOMOR_AJU'];
			}

			$tpbHeader = $this->dbtpb->table('tpb_header');
			$tpbHeader->whereIn('NOMOR_AJU',$whereAju);
			$dataHeader = $tpbHeader->get()->getResultArray();

			$tpbBarang = $this->dbtpb->table('tpb_barang');
			$tpbBarang->select('tpb_header.KODE_DOKUMEN, tpb_barang.HS_CODE, tpb_barang.NAMA_BARANG, tpb_barang.KODE_BARANG, SUM(tpb_barang.JUMLAH_SATUAN) AS JUMLAH_SATUAN, tpb_barang.KODE_SATUAN, SUM(tpb_barang.CIF) AS CIF, SUM(tpb_barang.CIF_RUPIAH) AS CIF_RUPIAH, SUM(tpb_barang.JUMLAH_KEMASAN) AS JUMLAH_KEMASAN, tpb_barang.KODE_KEMASAN');
			$tpbBarang->where('tpb_header.KODE_DOKUMEN', '261');
			$tpbBarang->whereIn('tpb_barang.NOMOR_AJU',$whereAju);
			$tpbBarang->groupBy('tpb_barang.KODE_BARANG');
			$tpbBarang->join('tpb_header','tpb_header.NOMOR_AJU=tpb_barang.NOMOR_AJU');
		// $sqlBarang = $tpbBarang->getCompiledSelect(false);
			$dataBarang261 = $tpbBarang->get()->getResultArray();

			$tpbBarang->resetQuery();
			$tpbBarang->select('tpb_header.KODE_DOKUMEN, tpb_barang.HS_CODE, tpb_barang.NAMA_BARANG, tpb_barang.KODE_BARANG, SUM(tpb_barang.JUMLAH_SATUAN) AS JUMLAH_SATUAN, tpb_barang.KODE_SATUAN, SUM(tpb_barang.CIF) AS CIF, SUM(tpb_barang.CIF_RUPIAH) AS CIF_RUPIAH, SUM(tpb_barang.JUMLAH_KEMASAN) AS JUMLAH_KEMASAN, tpb_barang.KODE_KEMASAN');
			$tpbBarang->where('tpb_header.KODE_DOKUMEN', '262');
			$tpbBarang->whereIn('tpb_barang.NOMOR_AJU',$whereAju);
		// $tpbBarang->select('tpb_header.KODE_DOKUMEN, tpb_barang.*, SUM(tpb_barang.JUMLAH_SATUAN) AS TOTAL_JUMLAH');
			$tpbBarang->groupBy('tpb_barang.KODE_BARANG');
			$tpbBarang->join('tpb_header','tpb_header.NOMOR_AJU=tpb_barang.NOMOR_AJU');	
			$dataBarang262 = $tpbBarang->get()->getResultArray();

			return [
				'persetujuan' => $dataPersetujuan,
				'bahanBaku' => $dataBb,
				'barangJadi' => $dataBj,
				'bahanSisa' => $dataBs,
			// 'nomorAju' => $whereAju,
				'header' => $dataHeader,
				'barang261' => $dataBarang261,
				'barang262' => $dataBarang262,
			// 'sql261' => $sqlBarang
				'status' => 'ditemukan'
			];
		} else {
			return [
				'persetujuan' => $dataPersetujuan,
				'bahanBaku' => $dataBb,
				'barangJadi' => $dataBj,
				'bahanSisa' => $dataBs,
				'status' => 'Data Dokumen Tidak ditemukan'
			];
		}

		// return [$countAju, $dataAju];

	}

	public function getAksesForCheck($type){
		$builder  = $this->cadas->table('tb_akses_detail');
    	// $builder->whereNotIn('IdPerusahaan', function(){
    	// 	return $this->peloro->table('vw_cek_keaktifan_dt')->select('IdPerusahaan')->where('DATE(WktRekam)',date('Y-m-d'))->where('Type', $this->tipe);
    	// });
		$builder->where('STATUS_STAKEHOLDERS','Y');
		$builder->where('TIPE_AKSES', $type);
    	// $builder->like('ALAMAT_AKSES','%swiapps%');
    	// $builder->Like('NAMA_PERUSAHAAN','%detpak%');
    	// $builder->limit(5);
		$builder->orderBy('ID_STAKEHOLDERS','RANDOM');
		$query = $builder->get();

		return $query->getResultArray();
	}

	public function postRobotCheck($post){
		$this->cadas->transBegin();
		if (!empty($_SESSION['NipUser'])) {
			$NIP_REKAM = $_SESSION['NipUser'];
		} else {
			$NIP_REKAM = 'SYSTEM';
		}
		$data = [
			'TIPE_AKSES' => $post['tipe'],
			'JUMLAH' => $post['jumlah'],
			'AKTIF' => count($post['success']),
			'TIDAK_AKTIF' => count($post['failed']),
			'NIP_REKAM' => $NIP_REKAM,
		];

		$this->cadas->table('tb_cek_akses_master')->insert($data);

		$idMaster = $this->cadas->insertID();
    	// $idMaster = 1;

		for ($i = 0; $i < count($post['success']); $i++) {
			$post['success'][$i]['ID_MASTER'] = $idMaster;
		}

		if (count($post['success']) > 0) {
			$this->cadas->table('tb_cek_akses_detail')->insertBatch($post['success']);
		}

		for ($i = 0; $i < count($post['failed']); $i++) {
			$post['failed'][$i]['ID_MASTER'] = $idMaster;
		}

		if (count($post['failed']) > 0) {
			$this->cadas->table('tb_cek_akses_detail')->insertBatch($post['failed']);
		}

		if ($this->cadas->transStatus() === FALSE) {
			$this->cadas->transRollback();
			return 'failed';
		} else {
			$this->cadas->transCommit();
			return 'success';
		}

    	// return $post;
	}

	public function getHasil(){
		$builder = $this->peloro->table('tb_cek_keaktifan');
		$builder->limit(4);
		$builder->orderBy('id','DESC');

		$query = $builder->get();

		return $query->getResultArray();
	}
    // MONEV SUBKON SECTION

    // MONEV UMUM SECTION
	private function addHistory($action, $detail) {
		$this->monev->transBegin();
		switch ($action) {
			case 'add':
			$data = array(
				'IdUser' => $_SESSION['NipUser'],
				'KdHistory' => 1,
				'DetailHistory' => $detail,
			);
			break;
			case 'update':
			$data = array(
				'IdUser' => $_SESSION['NipUser'],
				'KdHistory' => 2,
				'DetailHistory' => $detail,
			);
			break;
			case 'delete':
			$data = array(
				'IdUser' => $_SESSION['NipUser'],
				'KdHistory' => 3,
				'DetailHistory' => $detail,
			);
			break;

			default:
			$data = array(
				'IdUser' => $_SESSION['NipUser'],
				'KdHistory' => 99,
				'DetailHistory' => $detail,
			);
			break;
		}
		$this->monev->table('monev_history')->insert($data);
		if ($this->monev->transStatus() === FALSE) {
			$this->monev->transRollback();
			return FALSE;
		} else {
			$this->peloro->transCommit();
			return TRUE;
		}
	}

	public function getMonumById(){
		$data1 = $this->monev->table('monev_moncer_detail')->where('id', $_GET['id'])->get()->getRowArray();
		$data2 = $this->monev->table('monev_moncer_isi')->where('idLaporan', $_GET['id'])->get()->getResultArray();
		$data3 = $this->monev->table('logbook_cctv')->where('ID_MONEV', $_GET['id'])->get()->getRowArray();
		$data4 = $this->monev->table('logbook_it')->where('ID_MONEV', $_GET['id'])->get()->getRowArray();
		$data5 = $this->monev->table('logbook_ceisa')->where('ID_MONEV', $_GET['id'])->get()->getRowArray();
		$data6 = $this->monev->table('logbook_eseal')->where('ID_MONEV', $_GET['id'])->get()->getRowArray();
		$data7 = $this->monev->table('logbook_penimbunan')->where('ID_MONEV', $_GET['id'])->get()->getRowArray();
		$data8 = $this->monev->table('logbook_pemasukan')->where('ID_MONEV', $_GET['id'])->get()->getRowArray();

		$data = array(
			"laporan" => $data1,
			"isi" => $data2,
			"cctv"=> $data3,
			"it"=> $data4,
			"ceisa"=> $data5,
			"seal"=> $data6,
			"penimbunan"=> $data7,
			"pemasukan"=> $data8
		);

		return $data;
	}

	public function addMonum(){
		$this->monev->transBegin();
		$data = array(
			"idPerusahaan" => $_POST['idPerusahaan'],
			"tanggalLaporan" => $_POST['tanggal'],
			"kesimpulan" => $_POST['kesimpulan'],
			"NipRekam" => $_SESSION['NipUser'],
		);

		$this->monev->table('monev_moncer')->insert($data);
		$insert_id = $this->monev->insertId();

		$isi = $_POST;
		unset($isi['idPerusahaan']);
		unset($isi['alamat']);
		unset($isi['tanggal']);
		unset($isi['kesimpulan']);
		unset($isi['linkCctv']);
		unset($isi['linkIt']);
		unset($isi['linkEseal']);

		$isiLaporan = array();
		for ($i = 1; $i < (count($isi['laporan'])+1); $i++) {
			$isiLaporan[] = array(
				'idLaporan' => $insert_id,
				'item' => $i,
				'keterangan' => $isi['laporan'][$i-1],
			);
		}

		$this->monev->table('monev_moncer_isi')->insertBatch($isiLaporan);

		foreach ($isiLaporan as $key => $value) {
			switch ($value['item']) {
				case 1:
				$logbook = array(
					'ID_MONEV' => $insert_id,
					'ID_PERUSAHAAN' => $_POST['idPerusahaan'],
					'URAIAN' => $value['keterangan'],
					'PETUGAS_REKAM' => $_SESSION['NipUser'],
					'STATUS' => $_POST['cctv']['Status'],
					'REKAMAN'  => $_POST['cctv']['Rekaman'],
					'KUALITAS'  => $_POST['cctv']['Kualitas'],
					'LOKASI'  => $_POST['cctv']['Lokasi'],
					'PENEMPATAN'  => $_POST['cctv']['Penempatan']
				);
				$this->monev->table('logbook_cctv')->insert($logbook);
				break;
				case 2:
				$logbook = array(
					'ID_MONEV' => $insert_id,
					'ID_PERUSAHAAN' => $_POST['idPerusahaan'],
					'URAIAN' => $value['keterangan'],
					'PETUGAS_REKAM' => $_SESSION['NipUser'],
					'STATUS' => $_POST['it']['Status'],
					'SUBSISTEM' => $_POST['it']['subSistem'],
					'DATA' => $_POST['it']['Data'],
					'LAPORAN' => $_POST['it']['Laporan'],
					'RIWAYAT' => $_POST['it']['Riwayat'],
					'TRACEABILITY' => $_POST['it']['Traceability'],
					'ACCESS' => $_POST['it']['Access'],
					'KEWENANGAN' => $_POST['it']['Kewenangan'],
					'KETERKAITAN' => $_POST['it']['Keterkaitan']
				);
				$this->monev->table('logbook_it')->insert($logbook);
				break;
				case 3:
				$logbook = array(
					'ID_MONEV' => $insert_id,
					'ID_PERUSAHAAN' => $_POST['idPerusahaan'],
					'URAIAN' => $value['keterangan'],
					'PETUGAS_REKAM' => $_SESSION['NipUser'],
					'RIWAYAT' => $_POST['ceisa']['Status']
				);
				$this->monev->table('logbook_ceisa')->insert($logbook);
				break;
				case 4:
				$logbook = array(
					'ID_MONEV' => $insert_id,
					'ID_PERUSAHAAN' => $_POST['idPerusahaan'],
					'URAIAN' => $value['keterangan'],
					'PETUGAS_REKAM' => $_SESSION['NipUser'],
					'STATUS' => $_POST['seal']['Status'],
					'RIWAYAT' => $_POST['seal']['Riwayat'],
					'NOTIFIKASI' => $_POST['seal']['Notifikasi']
				);
				$this->monev->table('logbook_eseal')->insert($logbook);
				break;
				case 5:
					$logbook = array(
						'ID_MONEV' => $insert_id,
						'ID_PERUSAHAAN' => $_POST['idPerusahaan'],
						'URAIAN' => $value['keterangan'],
						'PETUGAS_REKAM' => $_SESSION['NipUser'],
						'RIWAYAT' => $_POST['penimbunan']['Status'],
					);
					$this->monev->table('logbook_penimbunan')->insert($logbook);
					break;
				case 6:
					$logbook = array(
						'ID_MONEV' => $insert_id,
						'ID_PERUSAHAAN' => $_POST['idPerusahaan'],
						'URAIAN' => $value['keterangan'],
						'PETUGAS_REKAM' => $_SESSION['NipUser'],
						'RIWAYAT' => $_POST['pemasukan']['Status'],
					);
					$this->monev->table('logbook_pemasukan')->insert($logbook);
					break;
				default:

				break;
			}
		}

		if ($this->monev->transStatus() === FALSE) {
			$this->monev->transRollback();
			return FALSE;
		} else {
			$this->monev->transCommit();
			if ($this->addHistory('add', "Menambahkan data laporan Monev Monitoring Room") === TRUE) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}

	public function updateMonum(){
		$this->monev->transBegin();
		$data = array(
			"idPerusahaan" => $_POST['idPerusahaan'],
			"tanggalLaporan" => $_POST['tanggal'],
			"kesimpulan" => $_POST['kesimpulan'],
			"NipUpdate" => $_SESSION['NipUser'],
		);

		$this->monev->table('monev_moncer')->where('id', $_POST['id'])->update($data);
		$isi = $_POST;
		unset($isi['id']);
		unset($isi['idPerusahaan']);
		unset($isi['alamat']);
		unset($isi['tanggal']);
		unset($isi['kesimpulan']);
		unset($isi['linkCctv']);
		unset($isi['linkIt']);
		unset($isi['linkEseal']);
		$dataIsi = $this->monev->table('monev_moncer_isi')->where('idLaporan', $_POST['id'])->get()->getResultArray();
		$dataLaporan = [];
		for ($i = 0; $i < count($isi['laporan']); $i++) {
			$isiLaporan = [
				'idLaporan' => $_POST['id'],
				'item' => $i + 1,
				'keterangan' => $isi['laporan'][$i],
			];
			$dataLaporan[] = $isiLaporan;
			$this->monev->table('monev_moncer_isi')->where('id', $dataIsi[$i]['id'])->update($isiLaporan);
		}

		$idMonev = $_POST['id'];
		foreach ($dataLaporan as $key => $value) {
			switch ($value['item']) {
				case 1:
				$logbook = array(
					'ID_PERUSAHAAN' => $_POST['idPerusahaan'],
					'URAIAN' => $value['keterangan'],
					'PETUGAS_REKAM' => $_SESSION['NipUser'],
					'STATUS' => $_POST['cctv']['Status'],
					'REKAMAN'  => $_POST['cctv']['Rekaman'],
					'KUALITAS'  => $_POST['cctv']['Kualitas'],
					'LOKASI'  => $_POST['cctv']['Lokasi'],
					'PENEMPATAN'  => $_POST['cctv']['Penempatan']
				);
				$this->monev->table('logbook_cctv')->where('ID_MONEV',$idMonev)->update($logbook);
				break;
				case 2:
				$logbook = array(
					'ID_PERUSAHAAN' => $_POST['idPerusahaan'],
					'URAIAN' => $value['keterangan'],
					'PETUGAS_REKAM' => $_SESSION['NipUser'],
					'STATUS' => $_POST['it']['Status'],
					'SUBSISTEM' => $_POST['it']['subSistem'],
					'DATA' => $_POST['it']['Data'],
					'LAPORAN' => $_POST['it']['Laporan'],
					'RIWAYAT' => $_POST['it']['Riwayat'],
					'TRACEABILITY' => $_POST['it']['Traceability'],
					'ACCESS' => $_POST['it']['Access'],
					'KEWENANGAN' => $_POST['it']['Kewenangan'],
					'KETERKAITAN' => $_POST['it']['Keterkaitan']
				);
				$this->monev->table('logbook_it')->where('ID_MONEV',$idMonev)->update($logbook);
				break;
				case 3:
				$logbook = array(
					'ID_MONEV' => $idMonev,
					'ID_PERUSAHAAN' => $_POST['idPerusahaan'],
					'URAIAN' => $value['keterangan'],
					'PETUGAS_REKAM' => $_SESSION['NipUser'],
					'RIWAYAT' => $_POST['ceisa']['Status']
				);
				$this->monev->table('logbook_ceisa')->where('ID_MONEV',$idMonev)->update($logbook);
				break;
				case 4:
				$logbook = array(
					'ID_MONEV' => $idMonev,
					'ID_PERUSAHAAN' => $_POST['idPerusahaan'],
					'URAIAN' => $value['keterangan'],
					'PETUGAS_REKAM' => $_SESSION['NipUser'],
					'STATUS' => $_POST['seal']['Status'],
					'RIWAYAT' => $_POST['seal']['Riwayat'],
					'NOTIFIKASI' => $_POST['seal']['Notifikasi']
				);
				$this->monev->table('logbook_eseal')->where('ID_MONEV',$idMonev)->update($logbook);
				break;
				case 5:
				$logbook = array(
					'ID_MONEV' => $idMonev,
					'ID_PERUSAHAAN' => $_POST['idPerusahaan'],
					'URAIAN' => $value['keterangan'],
					'PETUGAS_REKAM' => $_SESSION['NipUser'],
					'RIWAYAT' => $_POST['penimbunan']['Status'],
				);
				$this->monev->table('logbook_penimbunan')->where('ID_MONEV',$idMonev)->update($logbook);
				break;
				case 6:
				$logbook = array(
					'ID_MONEV' => $idMonev,
					'ID_PERUSAHAAN' => $_POST['idPerusahaan'],
					'URAIAN' => $value['keterangan'],
					'PETUGAS_REKAM' => $_SESSION['NipUser'],
					'RIWAYAT' => $_POST['pemasukan']['Status'],
				);
				$this->monev->table('logbook_pemasukan')->where('ID_MONEV',$idMonev)->update($logbook);
				break;
				default:

				break;
			}
		}

		if ($this->monev->transStatus() === FALSE) {
			$this->monev->transRollback();
			return FALSE;
		} else {
			$this->monev->transCommit();
			if ($this->addHistory('update', "Merubah data laporan Monev Monitoring Room") === TRUE) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}

	public function deleteMonum() {
		$this->monev->transBegin();
		$this->monev->table('monev_moncer')->where('id', $_GET['ID'])->delete();

		$this->monev->table('monev_moncer_isi')->where('idLaporan', $_GET['ID'])->delete();

		if ($this->monev->transStatus() === FALSE) {
			$this->monev->transRollback();
			return FALSE;
		} else {
			$this->monev->transCommit();
			return TRUE;
		}
	}

	public function validateMonum(){
		$this->monev->transBegin();

		$data = [
			'flag' => $_POST['Flag']
		];

		$this->monev->table('monev_moncer')->where('id', $_POST['ID'])->update($data);

		if ($this->monev->transStatus() === FALSE) {
			$this->monev->transRollback();
			return FALSE;
		} else {
			$this->monev->transCommit();
			return TRUE;
		}
	}

    // MONEV UMUM SECTION

	public function uploadApi($data){
		$this->peloro->transBegin();

		$this->peloro->table('testapi')->insertBatch($data);

		if ($this->peloro->transStatus() === FALSE) {
			$this->peloro->transRollback();

			return 'FALSE';
		} else {
			$this->peloro->transCommit();
			
			return 'TRUE';
		}
	}
}