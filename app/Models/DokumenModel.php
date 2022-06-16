<?php
namespace App\Models;

use CodeIgniter\Model;

class DokumenModel extends Model
{
	protected $table      = 'DokumenModel';
	protected $primaryKey = 'id';

	protected $returnType     = 'array';
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
		$this->tpbdb = \Config\Database::connect('dbtpb');
		$this->dbtpb = \Config\Database::connect('dbtpb2');
		$this->dbpib = \Config\Database::connect('dbpib');
		$this->cadas = \Config\Database::connect('cadas');
	}

	public function addDokumen($data)
	{
		$this->tpbdb->transBegin();

		if (array_key_exists('header', $data))
		{
			$this->tpbdb->table('tpb_header')->insertBatch($data['header']);
		}

		if (array_key_exists('barang', $data))
		{
			$this->tpbdb->table('tpb_barang')->insertBatch($data['barang']);
		}

		if (array_key_exists('barangTarif', $data))
		{
			$this->tpbdb->table('tpb_barang_tarif')->insertBatch($data['barangTarif']);
		}

		if (array_key_exists('dokumenPelengkap', $data))
		{
			$this->tpbdb->table('tpb_dokumen_pelengkap')->insertBatch($data['dokumenPelengkap']);
		}

		if (array_key_exists('pungutanDokumen', $data))
		{
			$this->tpbdb->table('tpb_pungutan_dokumen')->insertBatch($data['pungutanDokumen']);
		}

		if (array_key_exists('bahanBaku', $data))
		{
			$this->tpbdb->table('tpb_bahan_baku')->insertBatch($data['bahanBaku']);
		}

		if (array_key_exists('kemasan', $data))
		{
			$this->tpbdb->table('tpb_kemasan')->insertBatch($data['kemasan']);
		}

		if (array_key_exists('kontainer', $data))
		{
			$this->tpbdb->table('tpb_kontainer')->insertBatch($data['kontainer']);
		}

		if ($this->tpbdb->transStatus() === false)
		{
			$this->tpbdb->transRollback();
			return false;
		}
		else
		{
			$this->tpbdb->transCommit();
			return true;
		}
	}

	public function insertTPB($type, $datas)
	{
		$this->dbtpb->save_queries = false;
		$this->dbtpb->transBegin();

		foreach ($datas as $keyD => $data)
		{
			$arrayChunk = array_chunk($data, 300);

			foreach ($arrayChunk as $key => $value)
			{
				if ($type === 'header')
				{
					$this->dbtpb->table('TPB_HEADER')->insertBatch($value);
				}
				else
				{
					$this->dbtpb->table('TPB_DETAIL')->insertBatch($value);
				}
			}
		}

		if ($this->dbtpb->transStatus() === false)
		{
			$this->dbtpb->transRollback();
			return false;
		}
		else
		{
			$this->dbtpb->transCommit();
			return true;
		}
	}

	public function insertPIB($type, $datas)
	{
		$this->dbpib->save_queries = false;
		$this->dbpib->transBegin();

		foreach ($datas as $keyD => $data)
		{
			$arrayChunk = array_chunk($data, 300);

			foreach ($arrayChunk as $key => $value)
			{
				if ($type === 'header')
				{
					$this->dbpib->table('PIB_HEADER')->insertBatch($value);
				}
				else if ($type === 'detail')
				{
					$this->dbpib->table('PIB_DETAIL')->insertBatch($value);
				}
				elseif ($type === 'sptnp')
				{
					$this->dbpib->table('PIB_SPTNP')->insertBatch($value);
				}
				else
				{
					$this->dbpib->table('PIB_FAS')->insertBatch($value);
				}
			}
		}

		if ($this->dbpib->transStatus() === false)
		{
			$this->dbpib->transRollback();
			return false;
		}
		else
		{
			$this->dbpib->transCommit();
			return true;
		}
	}

	public function monitoringUpload()
	{
		$sql  = 'SELECT * FROM DATA_HEADER';
		$sqld = 'SELECT * FROM DATA_DETAIL';

		$data = [
			'HEADER' => $this->dbtpb->query($sql)->getResultArray(),
			'DETAIL' => $this->dbtpb->query($sqld)->getResultArray(),
		];

		return $data;
	}

	public function getDokPemasukan()
	{
		$builder = $this->dbtpb->table('TABLE_GOCIK_IN');
		$builder->where('TANGGAL_DAFTAR>=', $_GET['dari']);
		$builder->where('TANGGAL_DAFTAR<=', $_GET['sampai']);
		if (! empty($_GET['npwp']))
		{
			$builder->where('ID_PENGUSAHA', $_GET['npwp']);
		}
		$data = $builder->get()->getResultArray();

		$builder = $this->dbtpb->table('TABLE_GOCIK_OUT');
		$builder->where('TANGGAL_DAFTAR>=', $_GET['dari']);
		$builder->where('TANGGAL_DAFTAR<=', $_GET['sampai']);
		if (!empty($_GET['npwp']))
		{
			$builder->where('ID_PENERIMA', $_GET['npwp']);
		}
		$data27 = $builder->get()->getResultArray();

		return [$data, $data27];
	}

	public function getDokPengeluaran()
	{
		$builder = $this->dbtpb->table('TABLE_GOCIK_OUT');
		$builder->where('TANGGAL_DAFTAR>=', $_GET['dari']);
		$builder->where('TANGGAL_DAFTAR<=', $_GET['sampai']);
		if (! empty($_GET['npwp']))
		{
			$builder->where('ID_PENGUSAHA', $_GET['npwp']);
		}
		$data = $builder->get()->getResultArray();

		return $data;
	}

	// DASHBOARD DATA

	public function getImportirAktif($tahun)
	{
		$builder = $this->dbpib->table('PIB_HEADER');
		$builder->select('COUNT(DISTINCT(NPWP_IMP)) AS IMPORTIR');
		$builder->where('YEAR(TGL_PIB) = ', $tahun);
		if ($_GET['risk'] === 'ibt') {
			$builder->where('LEFT(RISK,1) <>', "L");
		}

		$data = $builder->get()->getRowArray();

		return $data['IMPORTIR'];
	}

	public function getJumlahDokumen($tahun)
	{
		$builder = $this->dbpib->table('PIB_DETAIL');
		$builder->select('COUNT(DISTINCT(NO_AJU)) AS JUMLAH_PIB , MAX(TGL_PIB) AS PIB_AKHIR');
		$builder->where('YEAR(TGL_PIB)', $tahun);
		if ($_GET['risk'] === 'ibt') {
			$builder->where('LEFT(RISK,1) <>', "L");
		}

		$data = $builder->get()->getRowArray();

		return [
			(int)$data['JUMLAH_PIB'],
			$data['PIB_AKHIR'],
		];
	}

	public function getDataPenerimaan($tahun)
	{
		$builder = $this->dbpib->table('PIB_DETAIL');
		$builder->select('SUM(BMBY) AS PENERIMAAN');
		$builder->where('YEAR(TGL_PIB)', $tahun);
		if ($_GET['risk'] === 'ibt') {
			$builder->where('LEFT(RISK,1) <>', "L");
		}

		$data = $builder->get()->getRowArray();

		return $data['PENERIMAAN'];
	}

	public function getDataSptnp($tahun)
	{
		$builder = $this->dbpib->table('PIB_SPTNP');
		$builder->select('SUM(PIB_SPTNP.TOTAL_BAYAR) AS PENERIMAAN');
		$builder->join('PIB_HEADER', 'PIB_SPTNP.NO_AJU = PIB_HEADER.NO_AJU');
		$builder->where('KODE_STATUS <>', '8');
		$builder->where('TGL_LUNAS <>', null);
		$builder->where('YEAR(TGL_SPTNP)', $tahun);
		if ($_GET['risk'] === 'ibt') {

			$builder->where('LEFT(PIB_SPTNP.RISK,1) <>', "L");
		}

		$data = $builder->get()->getRowArray();

		return $data['PENERIMAAN'];
	}

	public function getChartPenerimaan($tahun)
	{
		$builder = $this->dbpib->table('PIB_DETAIL')->select('YEAR(TGL_PIB) AS TAHUN, MONTH(TGL_PIB) AS BULAN, SUM(BMBY) AS TOTAL_BM');
		$builder->where('YEAR(TGL_PIB) >', $tahun);
		if ($_GET['risk'] === 'ibt') {
			$builder->where('LEFT(PIB_DETAIL.RISK,1) <>', "L");
		}
		$builder->groupBy(['YEAR(TGL_PIB)', 'MONTH(TGL_PIB)']);
		$builder->orderBy('YEAR(TGL_PIB) ASC, MONTH(TGL_PIB) ASC');

		$data = $builder->get()->getResultArray();

		return $data;
	}

	public function getTonase($tahun)
	{
		$builder = $this->dbpib->table('PIB_DETAIL')->select('YEAR(TGL_PIB) AS TAHUN, MONTH(TGL_PIB) AS BULAN, SUM(NETTO)/1000 AS TONASE');
		$builder->where('YEAR(TGL_PIB) >', $tahun);
		$builder->groupBy(['YEAR(TGL_PIB)', 'MONTH(TGL_PIB)']);
		$builder->orderBy('YEAR(TGL_PIB) ASC, MONTH(TGL_PIB) ASC');

		$data = $builder->get()->getResultArray();

		return $data;
	}

	public function getTeus($tahun)
	{
		$builder = $this->dbpib->table('PIB_HEADER')->select('YEAR(TGL_PIB) AS TAHUN, MONTH(TGL_PIB) AS BULAN, SUM(TEUS) AS TEUS');
		$builder->where('YEAR(TGL_PIB) >', $tahun);
		$builder->groupBy(['YEAR(TGL_PIB)', 'MONTH(TGL_PIB)']);
		$builder->orderBy('YEAR(TGL_PIB) ASC, MONTH(TGL_PIB) ASC');
		if ($_GET['risk'] === 'ibt') {
			$builder->where('LEFT(PIB_HEADER.RISK,1) <>', "L");
		}

		$data = $builder->get()->getResultArray();

		return $data;
	}

	public function getPerbandingaTeus($tahun, $risk){
		$builder = $this->dbpib->table('PIB_HEADER')->select('PERIODE_BULAN AS PERIODE ,SUM(TEUS) AS TEUS');
		$builder->where('YEAR(TGL_PIB) >', $tahun);
		
		if ($risk === 'ibt') {
			$builder->where('LEFT(PIB_HEADER.RISK,1) <>', "L");
		} else {
			$builder->where('LEFT(PIB_HEADER.RISK,1)', "L");
		}

		$builder->groupBy('PERIODE_BULAN');
		$builder->orderBy('PERIODE_BULAN');
		$data = $builder->get()->getResultArray();

		return $data;
	}

	public function totalBM($tahun, $bulan)
	{
		$builder = $this->dbpib->table('PIB_DETAIL')->select('YEAR(TGL_PIB) AS TAHUN, SUM(BMBY+BMKITEBY+BMAD+BMTP) AS TOTAL_BM, ROUND(SUM(NETTO)/1000,2) AS TONASE');
		$builder->where('YEAR(TGL_PIB) >', $tahun);
		$builder->where('MONTH(TGL_PIB) <', $bulan);
		$builder->groupBy(['YEAR(TGL_PIB)']);
		$builder->orderBy('YEAR(TGL_PIB) ASC');

		$data = $builder->get()->getResultArray();

		return $data;
	}

	public function getTotalTeus($tahun, $bulan)
	{
		$builder = $this->dbpib->table('PIB_HEADER')->select('YEAR(TGL_PIB) AS TAHUN, SUM(TEUS) AS TEUS');
		$builder->where('YEAR(TGL_PIB) >', $tahun);
		$builder->where('MONTH(TGL_PIB) <', $bulan);
		$builder->groupBy(['YEAR(TGL_PIB)']);
		$builder->orderBy('YEAR(TGL_PIB) ASC');

		$data = $builder->get()->getResultArray();

		return $data;
	}

	public function totalTaxbase($tahun, $risk){
		$builder = $this->dbpib->table('PIB_HEADER');
		$builder->select('YEAR(TGL_PIB) AS TAHUN, MONTH(TGL_PIB) AS BULAN, SUM(TAXBASE) AS TOTAL_TAXBASE');
		$builder->where('YEAR(TGL_PIB) >', $tahun);
		
		if ($risk === 'ibt') {
			$builder->where('LEFT(PIB_HEADER.RISK,1) <>', "L");
		}

		$builder->groupBy('YEAR(TGL_PIB), MONTH(TGL_PIB)');
		$builder->orderBy('YEAR(TGL_PIB), MONTH(TGL_PIB)');

		$data = $builder->get()->getResultArray();
		$ret = [];
		foreach ($data as $key => $value) {
			$ret[$value['TAHUN']][] = floatval($value['TOTAL_TAXBASE']);
		}

		return $ret;
	}

	public function rataTaxbaseTeus($tahun, $risk, $agg){
		$builder = $this->dbpib->table('PIB_HEADER');
		if ($agg === 'periode') {
			$builder->select('PERIODE_BULAN AS PERIODE,AVG(TAXBASE/TEUS) AS RATA_TAXBASE');
		} else {
			$builder->select('YEAR(TGL_PIB) AS TAHUN, MONTH(TGL_PIB) AS BULAN,,AVG(TAXBASE/TEUS) AS RATA_TAXBASE');
		}
		$builder->where('YEAR(TGL_PIB) >', $tahun);
		
		if ($risk === 'ibt') {
			$builder->where('LEFT(PIB_HEADER.RISK,1) <>', "L");
		}

		if ($agg === 'periode') {
			$builder->groupBy('PERIODE_BULAN');
			$builder->orderBy('PERIODE_BULAN');
		} else {
			$builder->groupBy('YEAR(TGL_PIB), MONTH(TGL_PIB)');
			$builder->orderBy('YEAR(TGL_PIB), MONTH(TGL_PIB)');
		}

		$data = $builder->get()->getResultArray();

		return $data;
	}

	public function avgValuta($tahun, $kodeVal = NULL){
		$builder = $this->dbpib->table('PIB_HEADER');
		$builder->select('YEAR(TGL_PIB) AS TAHUN, KD_VAL AS VALUTA, AVG(NDPBM) AS AVG_OF_NDPBM');
		$builder->where('YEAR(TGL_PIB) >', $tahun);
		$builder->groupBy('YEAR(TGL_PIB), KD_VAL');
		$builder->orderBy('YEAR(TGL_PIB)', 'asc');

		$data = $builder->get()->getResultArray();

		return $data;
	}

	public function getBulanTerakhir(){
		$builder = $this->dbpib->table('PIB_HEADER');
		$builder->select('YEAR(TGL_PIB) AS TAHUN');
		$builder->groupBy('YEAR(TGL_PIB)');
		$builder->orderBy('YEAR(TGL_PIB)','desc');
		$builder->limit(1);

		$tahun = $builder->get()->getRowArray();

		$builder = $this->dbpib->table('PIB_HEADER');
		$builder->select('MONTH(TGL_PIB) AS BULAN, MONTHNAME(TGL_PIB) AS NAMA_BULAN');
		$builder->where('YEAR(TGL_PIB)',(int)$tahun['TAHUN']);
		$builder->groupBy('MONTH(TGL_PIB), MONTHNAME(TGL_PIB)');
		$builder->orderBy('MONTH(TGL_PIB)', 'desc');
		$builder->limit(1);

		$data = $builder->get()->getRowArray();

		return $data;
	}

	public function rataBayarTeus($tahun, $risk){
		$builder = $this->dbpib->table('PIB_HEADER');
		$builder->select('PERIODE_BULAN AS PERIODE,AVG((BMBY+PPHBY+PPNBY+PPNBMBY)/TEUS) AS RATA_BAYAR');
		$builder->where('YEAR(TGL_PIB) >', $tahun);
		
		if ($risk === 'ibt') {
			$builder->where('LEFT(PIB_HEADER.RISK,1) <>', "L");
		} else {
			$builder->where('LEFT(PIB_HEADER.RISK,1)', "L");
		}

		$builder->groupBy('PERIODE_BULAN');
		$builder->orderBy('PERIODE_BULAN');

		$data = $builder->get()->getResultArray();

		return $data;
	}

	public function rataBayarTeusNotul($tahun, $risk){
		$builder = $this->dbpib->table('PIB_HEADER');
		$builder->select('PIB_HEADER.PERIODE_BULAN AS PERIODE,AVG((PIB_HEADER.BMBY+PIB_HEADER.PPHBY+PIB_HEADER.PPNBY+PIB_HEADER.PPNBMBY+IFNULL(PIB_SPTNP.TOTAL_BAYAR,0))/TEUS) AS RATA_BAYAR');
		$builder->where('YEAR(PIB_HEADER.TGL_PIB) >', $tahun);
		$builder->join('PIB_SPTNP', 'PIB_HEADER.NO_AJU = PIB_SPTNP.NO_AJU','left');
		
		if ($risk === 'ibt') {
			$builder->where('LEFT(PIB_HEADER.RISK,1) <>', "L");
		} else {
			$builder->where('LEFT(PIB_HEADER.RISK,1)', "L");
		}

		$builder->groupBy('PIB_HEADER.PERIODE_BULAN');
		$builder->orderBy('PIB_HEADER.PERIODE_BULAN');

		$data = $builder->get()->getResultArray();

		return $data;
	}

	public function getPerbandingan($tahun, $bulan){
		$builder = $this->dbpib->table('PIB_HEADER');
		$builder->select('YEAR(TGL_PIB) AS TAHUN, SUM(TEUS) AS TEUS');
		$builder->where('YEAR(TGL_PIB) > ', $tahun);
		$builder->where('MONTH(TGL_PIB) <= ', $bulan);
		$builder->groupBy('YEAR(TGL_PIB)');
		$teus = $builder->get()->getResultArray();

		$jsonTeus = [];

		foreach ($teus as $key => $value) {
			$jsonTeus[$value['TAHUN']] = floatval($value['TEUS']);
		}

		$jsonTeus['PERSENTASE'] = round($jsonTeus[date('Y')]/$jsonTeus[date('Y')-1]-1,4)*100;

		$builder = $this->dbpib->table('PIB_HEADER');
		$builder->select('YEAR(TGL_PIB) AS TAHUN, SUM(BMBY) AS TEUS');
		$builder->where('YEAR(TGL_PIB) > ', $tahun);
		$builder->where('MONTH(TGL_PIB) <= ', $bulan);
		$builder->groupBy('YEAR(TGL_PIB)');
		$bm = $builder->get()->getResultArray();

		$jsonBm = [];

		foreach ($bm as $key => $value) {
			$jsonBm[$value['TAHUN']] = floatval($value['TEUS']);
		}

		$jsonBm['PERSENTASE'] = round($jsonBm[date('Y')]/$jsonBm[date('Y')-1]-1,4)*100;

		$builder = $this->dbpib->table('PIB_HEADER');
		$builder->select('YEAR(TGL_PIB) AS TAHUN, SUM(TAXBASE) AS TEUS');
		$builder->where('YEAR(TGL_PIB) > ', $tahun);
		$builder->where('MONTH(TGL_PIB) <= ', $bulan);
		$builder->groupBy('YEAR(TGL_PIB)');
		$taxbase = $builder->get()->getResultArray();

		$jsonTaxbase = [];

		foreach ($taxbase as $key => $value) {
			$jsonTaxbase[$value['TAHUN']] = floatval($value['TEUS']);
		}

		$jsonTaxbase['PERSENTASE'] = round($jsonTaxbase[date('Y')]/$jsonTaxbase[date('Y')-1]-1,4)*100;

		$builder = $this->dbpib->table('PIB_HEADER');
		$builder->select('YEAR(TGL_PIB) AS TAHUN, AVG(TAXBASE) AS TEUS');
		$builder->where('YEAR(TGL_PIB) > ', $tahun);
		$builder->where('MONTH(TGL_PIB) <= ', $bulan);
		$builder->groupBy('YEAR(TGL_PIB)');
		$avgTaxbase = $builder->get()->getResultArray();

		$jsonAvgTaxbase = [];

		foreach ($avgTaxbase as $key => $value) {
			$jsonAvgTaxbase[$value['TAHUN']] = floatval($value['TEUS']);
		}

		$jsonAvgTaxbase['PERSENTASE'] = round($jsonAvgTaxbase[date('Y')]/$jsonAvgTaxbase[date('Y')-1]-1,4)*100;

		$builder = $this->dbpib->table('PIB_DETAIL');
		$builder->select('YEAR(TGL_PIB) AS TAHUN, AVG(TRF_BM) AS TEUS');
		$builder->where('YEAR(TGL_PIB) > ', $tahun);
		$builder->where('MONTH(TGL_PIB) <= ', $bulan);
		$builder->groupBy('YEAR(TGL_PIB)');
		$avgTarif = $builder->get()->getResultArray();

		$jsonAvgTarif = [];

		foreach ($avgTarif as $key => $value) {
			$jsonAvgTarif[$value['TAHUN']] = floatval($value['TEUS']);
		}

		$jsonAvgTarif['PERSENTASE'] = round($jsonAvgTarif[date('Y')]/$jsonAvgTarif[date('Y')-1]-1,4)*100;

		$builder = $this->dbpib->table('PIB_FAS');
		$builder->select('YEAR(TGL_PIB) AS TAHUN, COUNT(DISTINCT(NO_AJU)) AS TOTAL_FTA');
		$builder->whereIn('KD_SKEP_FAS',['06','54','55','56','57','58','59','60','61','65']);
		$builder->where('YEAR(TGL_PIB) > ', $tahun);
		$builder->where('MONTH(TGL_PIB) <= ', $bulan);
		$builder->groupBy('YEAR(TGL_PIB)');
		$fta = $builder->get()->getResultArray();

		$totalFTA = [];

		foreach ($fta as $key => $value) {
			$totalFTA[$value['TAHUN']] = floatval($value['TOTAL_FTA']);
		}


		$builder = $this->dbpib->table('PIB_DETAIL');
		$builder->select('YEAR(TGL_PIB) AS TAHUN, COUNT(DISTINCT(NO_AJU)) AS TOTAL_FTA');
		$builder->where('YEAR(TGL_PIB) > ', $tahun);
		$builder->where('MONTH(TGL_PIB) <= ', $bulan);
		$builder->groupBy('YEAR(TGL_PIB)');
		$dok = $builder->get()->getResultArray();

		$totalDok = [];

		foreach ($dok as $key => $value) {
			$totalDok[$value['TAHUN']] = floatval($value['TOTAL_FTA']);
		}

		$persenFta = [];

		$persenFta[date('Y')] = round((int)$totalFTA[date('Y')]/(int)$totalDok[date('Y')],4)*100;
		$persenFta[date('Y')-1] = round((int)$totalFTA[date('Y')-1]/(int)$totalDok[date('Y')-1],4)*100;

		$persenFta['PERSENTASE'] = round($persenFta[date('Y')]/$persenFta[date('Y')-1]-1,4)*100;

		return ['teus' => $jsonTeus, 'bm' => $jsonBm, 'taxbase' => $jsonTaxbase, 'avgTaxbase' => $jsonAvgTaxbase, 'avgTarif'=> $jsonAvgTarif, 'fta' => $persenFta];
	}

	public function getDataPersenFta($risk, $tahun){
		$builder = $this->dbpib->table('PIB_FAS');
		$builder->select('PERIODE_BULAN AS PERIODE, COUNT(DISTINCT(NO_PIB)) AS TOTAL_FTA');
		$builder->whereIn('KD_SKEP_FAS',['06','54','55','56','57','58','59','60','61','65']);
		if ($tahun > 0) {
			$builder->where('YEAR(TGL_PIB) > ', date('Y')-$tahun);
		}
		if ($risk === 'ibt') {
			$builder->where('LEFT(PIB_FAS.RISK,1) <>', 'L');
		}
		$builder->groupBy('PERIODE_BULAN');
		$builder->orderBy('PERIODE_BULAN');
		$data = $builder->get()->getResultArray();

		$fta= [];
		foreach ($data as $key => $value) {
			$fta[$value['PERIODE']] = $value['TOTAL_FTA'];
		}

		$builder = $this->dbpib->table('PIB_HEADER');
		$builder->select('PERIODE_BULAN AS PERIODE, COUNT(DISTINCT(NO_PIB)) AS TOTAL_DOK');
		if ($tahun > 0) {
			$builder->where('YEAR(TGL_PIB) > ', date('Y')-$tahun);
		}
		if ($risk === 'ibt') {
			$builder->where('LEFT(PIB_HEADER.RISK,1) <>', 'L');
		}
		$builder->groupBy('PERIODE_BULAN');
		$builder->orderBy('PERIODE_BULAN');
		$data = $builder->get()->getResultArray();

		$dok = [];
		$periode = [];
		foreach ($data as $key => $value) {
			$dok[$value['PERIODE']] = $value['TOTAL_DOK'];
			$periode[] = $value['PERIODE'];
		}

		$persenFta = [];
		foreach ($periode as $key => $value) {
			$x = round((int)$fta[$value]/(int)$dok[$value],4)*100;
			$y = round($x,2);
			$z = 100-$y;
			$persenFta['fta'][] = $y;
			$persenFta['non_fta'][]	 = round($z,2);
		}

		$ret = ['periode' => $periode, 'data' => $persenFta];

		return $ret;
	}

	public function getDataPenjaluran(){
		$builder = $this->dbpib->table('PIB_HEADER');
		$builder->select('STATUS_JALUR, COUNT(NO_PIB) AS JMLH_DOK');
		$builder->where('YEAR(TGL_PIB)', date('Y'));
		$builder->groupBy('STATUS_JALUR');

		$all = $builder->get()->getResultArray();

		$allJalur = [
			0 => ['name' => 'H', 'y' => 0, 'colorIndex' => '#1eb510'],
			1 => ['name' => 'K', 'y' => 0, 'colorIndex' => '#e3eb42'],
			2 => ['name' => 'M', 'y' => 0, 'colorIndex' => '#eb4242']
		];

		foreach ($all as $key => $value) {
			switch ($value['STATUS_JALUR']) {
				case 'HH':
				$allJalur[0]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'HL':
				$allJalur[0]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'HM':
				$allJalur[0]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'H':
				$allJalur[0]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'HP':
				$allJalur[0]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'HT':
				$allJalur[0]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'K':
				$allJalur[1]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'MK':
				$allJalur[1]['y'] += (int)$value['JMLH_DOK'];
				break;				
				default:
				$allJalur[2]['y'] += (int)$value['JMLH_DOK'];
				break;
			}
		}

		$builder = $this->dbpib->table('PIB_HEADER');
		$builder->select('STATUS_JALUR, COUNT(NO_PIB) AS JMLH_DOK');
		$builder->where('YEAR(TGL_PIB)', date('Y'));
		$builder->where('LEFT(RISK,1)', 'L');
		$builder->groupBy('STATUS_JALUR');

		$low = $builder->get()->getResultArray();

		$lowJalur = [
			0 => ['name' => 'H', 'y' => 0, 'colorIndex' => '#1eb510'],
			1 => ['name' => 'K', 'y' => 0, 'colorIndex' => '#e3eb42'],
			2 => ['name' => 'M', 'y' => 0, 'colorIndex' => '#eb4242']
		];

		foreach ($low as $key => $value) {
			switch ($value['STATUS_JALUR']) {
				case 'HH':
				$lowJalur[0]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'HL':
				$lowJalur[0]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'HM':
				$lowJalur[0]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'H':
				$lowJalur[0]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'HP':
				$lowJalur[0]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'HT':
				$lowJalur[0]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'K':
				$lowJalur[1]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'MK':
				$lowJalur[1]['y'] += (int)$value['JMLH_DOK'];
				break;				
				default:
				$lowJalur[2]['y'] += (int)$value['JMLH_DOK'];
				break;
			}
		}

		$builder = $this->dbpib->table('PIB_HEADER');
		$builder->select('STATUS_JALUR, COUNT(NO_PIB) AS JMLH_DOK');
		$builder->where('YEAR(TGL_PIB)', date('Y'));
		$builder->where('LEFT(RISK,1) <>', 'L');
		$builder->groupBy('STATUS_JALUR');

		$ibt = $builder->get()->getResultArray();

		$ibtJalur = [
			0 => ['name' => 'H', 'y' => 0, 'colorIndex' => '#1eb510'],
			1 => ['name' => 'K', 'y' => 0, 'colorIndex' => '#e3eb42'],
			2 => ['name' => 'M', 'y' => 0, 'colorIndex' => '#eb4242']
		];

		foreach ($low as $key => $value) {
			switch ($value['STATUS_JALUR']) {
				case 'HH':
				$ibtJalur[0]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'HL':
				$ibtJalur[0]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'HM':
				$ibtJalur[0]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'H':
				$ibtJalur[0]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'HP':
				$ibtJalur[0]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'HT':
				$ibtJalur[0]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'K':
				$ibtJalur[1]['y'] += (int)$value['JMLH_DOK'];
				break;
				case 'MK':
				$ibtJalur[1]['y'] += (int)$value['JMLH_DOK'];
				break;				
				default:
				$ibtJalur[2]['y'] += (int)$value['JMLH_DOK'];
				break;
			}
		}

		$data = ['all' => $allJalur, 'low' => $lowJalur, 'ibt' => $ibtJalur];

		return $data;
	}

	public function sebaranBM($tahun, $bulan)
	{
		$builder = $this->dbpib->table('PIB_DETAIL')->select('SUM(BMBY) AS BM_BAYAR, SUM(BMAD) AS BMAD, SUM(BMKITEBY) AS BM_KITE_BAYAR, SUM(BMTP) AS BMTP');
		$builder->where('YEAR(TGL_PIB) =', $tahun);
		$builder->where('MONTH(TGL_PIB) <', $bulan);

		$data = $builder->get()->getRowArray();

		return $data;
	}

	public function getTotalBM($tahun, $bulan)
	{
		$builder = $this->dbpib->table('PIB_DETAIL')->select('NPWP_IMP, SUM(BMAD+BMBY+BMKITEBY+BMTP) AS TOTAL_BM');
		$builder->where('YEAR(TGL_PIB) =', $tahun);
		$builder->where('MONTH(TGL_PIB) <', $bulan);
		$builder->groupBy('NPWP_IMP');
		$builder->orderBy('TOTAL_BM', 'DESC');
		$builder->limit(30);

		$data = $builder->get()->getResultArray();

		$data2  = $this->getImportir();
		$dataBM = [];
		$no     = 0;

		for ($i = 0; $i < count($data); $i++)
		{
			$no++;
			$row   = [];
			$row[] = $no;
			$row[] = $data2[$data[$i]['NPWP_IMP']];
			$row[] = floatval($data[$i]['TOTAL_BM']);

			$dataBM[] = $row;
		}

		return $dataBM;
	}

	public function getNilaiSptnp($tahun)
	{
		$builder = $this->dbpib->table('PIB_SPTNP')->select('YEAR(TGL_SPTNP) AS TAHUN, MONTH(TGL_SPTNP) AS BULAN, SUM(TOTAL_BAYAR) AS TOTAL_SPTNP');
		$builder->where('YEAR(TGL_SPTNP) >', $tahun);
		$builder->where('KODE_STATUS <>', '8');
		$builder->where('TGL_LUNAS <>', null);
		$builder->groupBy(['YEAR(TGL_SPTNP)', 'MONTH(TGL_SPTNP)']);
		$builder->orderBy('YEAR(TGL_SPTNP) ASC, MONTH(TGL_SPTNP) ASC');

		$query = $builder->get()->getResultArray();

		$transit = [];
		$data    = [];

		foreach ($query as $key => $value)
		{
			$transit[$value['TAHUN']][] = floatval($value['TOTAL_SPTNP']);
		}

		foreach ($transit as $key => $value)
		{
			$data[] = [
				'name' => $key,
				'data' => $value,
			];
		}

		return $data;
	}

	public function getJumlahSptnp($tahun)
	{
		$builder = $this->dbpib->table('PIB_SPTNP')->select('YEAR(TGL_SPTNP) AS TAHUN, MONTH(TGL_SPTNP) AS BULAN, COUNT(DISTINCT(NO_SPTNP)) AS JUMLAH_SPTNP');
		$builder->where('YEAR(TGL_SPTNP) >', $tahun);
		$builder->where('KODE_STATUS <>', '8');
		$builder->where('TGL_LUNAS <>', null);
		$builder->groupBy(['YEAR(TGL_SPTNP)', 'MONTH(TGL_SPTNP)']);
		$builder->orderBy('YEAR(TGL_SPTNP) ASC, MONTH(TGL_SPTNP) ASC');

		$query = $builder->get()->getResultArray();

		$transit = [];
		$data    = [];

		foreach ($query as $key => $value)
		{
			$transit[$value['TAHUN']][] = (int)$value['JUMLAH_SPTNP'];
		}

		foreach ($transit as $key => $value)
		{
			$data[] = [
				'type' => 'line',
				'name' => $key,
				'data' => $value,
			];
		}

		return $data;
	}

	public function getBmByKomoditi($tahun, $bulan)
	{
		$builder = $this->dbpib->table('PIB_DETAIL')->select('KOMODITI, SUM(BMAD+BMBY+BMKITEBY+BMTP) AS TOTAL_BM');
		$builder->where('YEAR(TGL_PIB) =', $tahun);
		$builder->where('MONTH(TGL_PIB) <', $bulan);
		$builder->groupBy('KOMODITI');
		$builder->orderBy('TOTAL_BM', 'DESC');
		$builder->limit(30);

		$data = $builder->get()->getResultArray();

		$builder2 = $this->dbpib->table('PIB_DETAIL')->select('KOMODITI, SUM(BMAD+BMBY+BMKITEBY+BMTP) AS TOTAL_BM');
		$builder2->where('YEAR(TGL_PIB) =', $tahun - 1);
		$builder2->where('MONTH(TGL_PIB) <', $bulan);
		$builder2->groupBy('KOMODITI');
		$builder2->orderBy('TOTAL_BM', 'DESC');
		$builder->limit(30);

		$data2 = $builder2->get()->getResultArray();

		$bmLastYear = [];
		foreach ($data2 as $key => $value)
		{
			$bmLastYear[$value['KOMODITI']] = $value['TOTAL_BM'];
		}

		$dataBM = [];
		$no     = 0;

		for ($i = 0; $i < count($data); $i++)
		{
			$komoditi2 = 0;
			if (array_key_exists($data[$i]['KOMODITI'], $bmLastYear))
			{
				if (floatval($bmLastYear[$data[$i]['KOMODITI']]) === 0)
				{
					$komoditi2 += 1;
				}
				else
				{
					$komoditi2 += floatval($bmLastYear[$data[$i]['KOMODITI']]);
				}
			}
			else
			{
				$komoditi2 += 1;
			}
			$no++;
			$row   = [];
			$row[] = $no;
			$row[] = $data[$i]['KOMODITI'];
			$row[] = $komoditi2;
			$row[] = floatval($data[$i]['TOTAL_BM']);
			$row[] = ((floatval($data[$i]['TOTAL_BM']) / $komoditi2) - 1);

			$dataBM[] = $row;
		}

		return $dataBM;
	}

	public function getTonaseByKomoditi($tahun, $bulan)
	{
		$builder = $this->dbpib->table('PIB_DETAIL')->select('KOMODITI, SUM(NETTO)/1000 AS TOTAL_BM');
		$builder->where('YEAR(TGL_PIB) =', $tahun);
		$builder->where('MONTH(TGL_PIB) <', $bulan);
		$builder->groupBy('KOMODITI');
		$builder->orderBy('TOTAL_BM', 'DESC');
		$builder->limit(30);

		$data = $builder->get()->getResultArray();

		$builder2 = $this->dbpib->table('PIB_DETAIL')->select('KOMODITI, SUM(NETTO)/1000 AS TOTAL_BM');
		$builder2->where('YEAR(TGL_PIB) =', $tahun - 1);
		$builder2->where('MONTH(TGL_PIB) <', $bulan);
		$builder2->groupBy('KOMODITI');
		$builder2->orderBy('TOTAL_BM', 'DESC');
		$builder->limit(30);

		$data2 = $builder2->get()->getResultArray();

		$bmLastYear = [];
		foreach ($data2 as $key => $value)
		{
			$bmLastYear[$value['KOMODITI']] = $value['TOTAL_BM'];
		}

		$dataBM = [];
		$no     = 0;

		for ($i = 0; $i < count($data); $i++)
		{
			$komoditi2 = 0;
			if (array_key_exists($data[$i]['KOMODITI'], $bmLastYear))
			{
				if (floatval($bmLastYear[$data[$i]['KOMODITI']]) === 0)
				{
					$komoditi2 += 1;
				}
				else
				{
					$komoditi2 += floatval($bmLastYear[$data[$i]['KOMODITI']]);
				}
			}
			else
			{
				$komoditi2 += 1;
			}
			$no++;
			$row   = [];
			$row[] = $no;
			$row[] = $data[$i]['KOMODITI'];
			$row[] = $komoditi2;
			$row[] = floatval($data[$i]['TOTAL_BM']);
			$row[] = ((floatval($data[$i]['TOTAL_BM']) / $komoditi2) - 1);

			$dataBM[] = $row;
		}

		return $dataBM;
	}

	public function getImportir()
	{
		$builder = $this->dbpib->table('REF_IMPORTIR')->select('NPWP, IMPORTIR');

		$query = $builder->get()->getResultArray();

		$data = [];

		foreach ($query as $key => $value)
		{
			$data[$value['NPWP']] = $value['IMPORTIR'];
		}

		return $data;
	}

	public function getRefSign()
	{
		$builder = $this->dbpib->table('REF_IMPORTIR')->select('NPWP, CP, RISK');

		$query = $builder->get()->getResultArray();
		$data  = [];
		foreach ($query as $key => $value)
		{
			$data[$value['NPWP']]['RISK'] = $value['RISK'];
			$data[$value['NPWP']]['CP'] = $value['CP'];
		}

		return $data;
	}

	public function getRefKomoditi()
	{
		$builder = $this->dbpib->table('REF_KOMODITI')->select('HS_CODE, KOMODITI');

		$query = $builder->get()->getResultArray();
		$data  = [];

		foreach ($query as $key => $value)
		{
			$data[$value['HS_CODE']] = $value['KOMODITI'];
		}

		return $data;
	}

	public function getRefNegara()
	{
		$builder = $this->dbpib->table('REF_NEGARA')->select('KODE_NEGARA, URAIAN_NEGARA');

		$query = $builder->get()->getResultArray();
		$data  = [];

		foreach ($query as $key => $value)
		{
			$data[$value['KODE_NEGARA']] = $value['KODE_NEGARA'] . ' - ' . $value['URAIAN_NEGARA'];
		}

		return $data;
	}

	public function getRefSkema()
	{
		$builder = $this->dbpib->table('REF_SKEMA')->select('KODE, SKEMA');

		$query = $builder->get()->getResultArray();
		$data  = [];

		foreach ($query as $key => $value)
		{
			$data[$value['KODE']] = $value['SKEMA'];
		}

		return $data;
	}

	public function UpdateRefImportir($data){
		$this->dbpib->transBegin();

		$this->dbpib->table('REF_IMPORTIR')->insertBatch($data);

		if ($this->dbpib->transStatus() === FALSE) {
			$this->dbpib->transRollback();

			return 'failed';
		} else {
			$this->dbpib->transCommit();

			return 'success';
		}
	}

	// TPB SECTION

	public function getTpbAktif($kodeDok, $tahun)
	{
		$builder = $this->dbtpb->table('TPB_HEADER')->select('COUNT(DISTINCT(ID_PENGUSAHA)) AS JUMLAH_TPB');
		$builder->where('KODE_DOKUMEN', $kodeDok);
		$builder->where('YEAR(TANGGAL_DAFTAR)', $tahun);

		$query = $builder->get()->getRowArray();

		return $query['JUMLAH_TPB'];
	}

	public function getJumlahDokumenTpb($kodeDok, $tahun)
	{
		$builder = $this->dbtpb->table('TPB_DETAIL')->select('COUNT(DISTINCT(NOMOR_AJU)) AS JUMLAH_DOKUMEN, MAX(TANGGAL_DAFTAR) AS LAST_DOK');
		$builder->where('KODE_DOKUMEN', $kodeDok);
		$builder->where('YEAR(TANGGAL_DAFTAR)', $tahun);

		$query = $builder->get()->getRowArray();

		return $query;
	}

	public function getDataPenerimaanTpb($kodeDok, $tahun)
	{
		$builder = $this->dbtpb->table('TPB_DETAIL')->select('SUM(BM_NILAI_BAYAR + BMKITE_NILAI_BAYAR) AS PENERIMAAN');
		$builder->where('KODE_DOKUMEN', $kodeDok);
		$builder->where('YEAR(TANGGAL_DAFTAR)', $tahun);

		$query = $builder->get()->getRowArray();

		return $query['PENERIMAAN'];
	}

	public function getDataSptnpTpb($kode, $tahun)
	{
		return 'TPBA';
	}

	public function getPenerimaanTPB($kodeDok, $tahun)
	{
		$builder = $this->dbtpb->table('TPB_DETAIL')->select('YEAR(TANGGAL_DAFTAR) AS TAHUN, MONTH(TANGGAL_DAFTAR) AS BULAN, SUM(BM_NILAI_BAYAR+BMKITE_NILAI_BAYAR) AS BM');
		$builder->where('YEAR(TANGGAL_DAFTAR) >', $tahun);
		$builder->where('KODE_DOKUMEN', $kodeDok);
		$builder->groupBy('YEAR(TANGGAL_DAFTAR), MONTH(TANGGAL_DAFTAR)');
		$builder->orderBy('YEAR(TANGGAL_DAFTAR), MONTH(TANGGAL_DAFTAR)');

		$query = $builder->get()->getResultArray();

		return $query;
	}

	public function getTonaseTpb($kodeDok, $tahun)
	{
		$builder = $this->dbtpb->table('TPB_DETAIL')->select('YEAR(TANGGAL_DAFTAR) AS TAHUN, MONTH(TANGGAL_DAFTAR) AS BULAN, SUM(NETTO_BARANG/1000) AS TONASE');
		$builder->where('YEAR(TANGGAL_DAFTAR) >', $tahun);
		$builder->where('KODE_DOKUMEN', $kodeDok);
		$builder->groupBy('YEAR(TANGGAL_DAFTAR), MONTH(TANGGAL_DAFTAR)');
		$builder->orderBy('YEAR(TANGGAL_DAFTAR), MONTH(TANGGAL_DAFTAR)');

		$query = $builder->get()->getResultArray();

		return $query;
	}

	public function getDokumenTpb($kodeDok, $tahun)
	{
		$builder = $this->dbtpb->table('TPB_DETAIL')->select('YEAR(TANGGAL_DAFTAR) AS TAHUN, MONTH(TANGGAL_DAFTAR) AS BULAN, COUNT(DISTINCT(NOMOR_AJU)) AS TEUS');
		$builder->where('YEAR(TANGGAL_DAFTAR) >', $tahun);
		$builder->where('KODE_DOKUMEN', $kodeDok);
		$builder->groupBy('YEAR(TANGGAL_DAFTAR), MONTH(TANGGAL_DAFTAR)');
		$builder->orderBy('YEAR(TANGGAL_DAFTAR), MONTH(TANGGAL_DAFTAR)');

		$query = $builder->get()->getResultArray();

		return $query;
	}

	public function getTotalTpb($kodeDok, $tahun, $bulan)
	{
		$builder = $this->dbtpb->table('TPB_DETAIL')->select('YEAR(TANGGAL_DAFTAR) AS TAHUN, SUM(BM_NILAI_BAYAR+BMKITE_NILAI_BAYAR) AS BM, COUNT(DISTINCT(NOMOR_AJU)) AS DOKUMEN, SUM(NETTO_BARANG/1000) AS TONASE');
		$builder->where('YEAR(TANGGAL_DAFTAR) >', $tahun);
		$builder->where('KODE_DOKUMEN', $kodeDok);
		$builder->where('MONTH(TANGGAL_DAFTAR) <', $bulan);
		$builder->groupBy('YEAR(TANGGAL_DAFTAR)');
		$builder->orderBy('YEAR(TANGGAL_DAFTAR)');

		$query = $builder->get()->getResultArray();

		return $query;
	}

	public function sebaranBMTpb($kodeDok, $tahun, $bulan)
	{
		$builder = $this->dbtpb->table('TPB_HEADER')->select('SUM(BM_NILAI_BAYAR) AS BM_BAYAR, SUM(BMKITE_NILAI_BAYAR) AS BM_KITE_BAYAR');
		$builder->where('YEAR(TANGGAL_DAFTAR)', $tahun);
		$builder->where('KODE_DOKUMEN', $kodeDok);
		$builder->where('MONTH(TANGGAL_DAFTAR) <', $bulan);

		$query = $builder->get()->getRowArray();

		return $query;
	}

	public function getPeringkatBmTpb($kodeDok, $tahun, $bulan){
		$tpb = $this->getUserTpb($kodeDok);
		$builder = $this->dbtpb->table('TPB_DETAIL')->select('ID_PENGUSAHA, SUM(BM_NILAI_BAYAR+BMKITE_NILAI_BAYAR) AS BM_BAYAR');
		$builder->where('YEAR(TANGGAL_DAFTAR)', $tahun);
		$builder->where('KODE_DOKUMEN', $kodeDok);
		$builder->where('MONTH(TANGGAL_DAFTAR) <', $bulan);
		$builder->groupBy('ID_PENGUSAHA');
		$builder->orderBy('BM_BAYAR', 'DESC');
		$builder->limit(10);

		$query = $builder->get()->getResultArray();

		foreach ($query as $key => $value) {
			$data[] = [
				'NAMA_PENGUSAHA' => $tpb[$value['ID_PENGUSAHA']],
				'BM' => $value['BM_BAYAR']
			];
		}

		return $data;
	}

	public function getPeringkatKomoditi($kodeDok, $tahun, $bulan, $object){
		$builder = $this->dbtpb->table('TPB_DETAIL')->select('KOMODITI, '.$object);
		$builder->where('KODE_DOKUMEN', $kodeDok);
		$builder->where('YEAR(TANGGAL_DAFTAR)', $tahun);
		$builder->where('MONTH(TANGGAL_DAFTAR) <', $bulan);
		$builder->groupBy('KOMODITI');
		$builder->orderBy('OBJECT', 'DESC');
		$builder->limit(10);

		$query1 = $builder->get()->getResultArray();

		$builder = $this->dbtpb->table('TPB_DETAIL')->select('KOMODITI, '.$object);
		$builder->where('KODE_DOKUMEN', $kodeDok);
		$builder->where('YEAR(TANGGAL_DAFTAR)', $tahun-1);
		$builder->where('MONTH(TANGGAL_DAFTAR) <', $bulan);
		$builder->groupBy('KOMODITI');
		$builder->orderBy('OBJECT', 'DESC');
		$builder->limit(10);

		$query2 = $builder->get()->getResultArray();

		$bm2 = [];

		foreach ($query2 as $key => $value) {
			$bm2[$value['KOMODITI']] = $value['OBJECT'];
		}

		$dataBM = [];
		$no     = 0;

		for ($i = 0; $i < count($query1); $i++)
		{
			$komoditi2 = 0;
			if (array_key_exists($query1[$i]['KOMODITI'], $bm2))
			{
				if (floatval($bm2[$query1[$i]['KOMODITI']]) === 0)
				{
					$komoditi2 += 1;
				}
				else
				{
					$komoditi2 += floatval($bm2[$query1[$i]['KOMODITI']]);
				}
			}
			else
			{
				$komoditi2 += 1;
			}
			$no++;
			$row   = [];
			$row[] = $no;
			$row[] = $query1[$i]['KOMODITI'];
			$row[] = $komoditi2;
			$row[] = floatval($query1[$i]['OBJECT']);
			$row[] = ((floatval($query1[$i]['OBJECT']) / $komoditi2) - 1);

			$dataBM[] = $row;
		}

		return $dataBM;
	}

	public function getDokumenTpbById(){
		$builder = $this->cadas->table('referensi_kantor_pabean');
		$kodeKantor = $builder->get()->getResultArray();
		$kode = [];

		foreach ($kodeKantor as $key => $value) {
			$kode[$value['KODE_KANTOR']] = $value['KODE_KANTOR'] . " - " . $value['URAIAN_KANTOR'];
		}

		$builder = $this->cadas->table('referensi_negara');
		$dataNegara = $builder->get()->getResultArray();
		$kodeNegara = [];

		foreach ($dataNegara as $key => $value) {
			$kodeNegara[$value['KODE_NEGARA']] = $value['KODE_NEGARA'] ." - ". $value['URAIAN_NEGARA'];
		}

		$builder = $this->dbtpb->table('TPB_HEADER');
		$builder->where('ID_HEADER', $_GET['id']);
		$header = $builder->get()->getRowArray();

		$builder = $this->dbtpb->table('TPB_DETAIL');
		$builder->where('ID_HEADER', $_GET['id']);
		$detail = $builder->get()->getResultArray();

		$header['NAMA_KANTOR'] = $kode[$header['KODE_KANTOR']];
		if ($header['KODE_KANTOR_BONGKAR'] !== null) {
			$header['NAMA_KANTOR_BONGKAR'] = $kode[$header['KODE_KANTOR_BONGKAR']];
		} else {
			$header['NAMA_KANTOR_BONGKAR'] = "-";
		}
		if ($header['KODE_KANTOR_TUJUAN'] !== null ) {
			$header['NAMA_KANTOR_TUJUAN'] = $kode[$header['KODE_KANTOR_TUJUAN']];
		} else {
			$header['NAMA_KANTOR_TUJUAN'] = "-";
		}

		if ($header['KODE_NEGARA_PEMASOK'] !== null) {
			$header['NEGARA_PEMASOK'] = $kodeNegara[$header['KODE_NEGARA_PEMASOK']];
		}
		
		return ['header' => $header, 'detail' => $detail];
	}

	public function getUserTpb($kode){
		$builder = $this->dbtpb->table('TPB_HEADER')->select('DISTINCT(ID_PENGUSAHA), NAMA_PENGUSAHA');
		$builder->where('KODE_DOKUMEN', $kode);

		$query = $builder->get()->getResultArray();

		foreach ($query as $key => $value) {
			$data[$value['ID_PENGUSAHA']] = $value['NAMA_PENGUSAHA'];
		}

		return $data;
	}
}
