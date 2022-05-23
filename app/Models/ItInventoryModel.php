<?php 
namespace App\Models;

use CodeIgniter\Model;

class ItInventoryModel extends Model
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

    public function __construct()
    {
    	$this->peloro  =   \Config\Database::connect('peloro');
        $this->it      =   \Config\Database::connect('dbit');
    }

    public function getItForCheck(){
    	$builder  = $this->peloro->table('tb_it_detail');
    	$builder->whereNotIn('IdPerusahaan', function(){
    		return $this->peloro->table('vw_cek_keaktifan_dt')->select('IdPerusahaan')->where('DATE(WktRekam)',date('Y-m-d'));
    	});
    	// $builder->like('IpAddress','%detc%');
        $builder->where('Status','Y');
    	// $builder->limit(50);
        $builder->orderBy('IdPerusahaan','RANDOM');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function insertIT($table, $data){
        $this->it->transStart();

        $arrayChunk = array_chunk($data,300);

        foreach ($arrayChunk as $key => $value) {
            $this->it->table($table)->insertBatch($value);
        }

        if ($this->it->transStatus() === FALSE) {
            $this->it->transRollback();
            return FALSE;
        } else {
            $this->it->transCommit();
            return TRUE;
        }
    }

    public function getDataApi($table, $ID_PERUSAHAAN){
        $builder = $this->it->table($table);
        switch ($table) {
            case 'pemasukan':
            $builder->select('ID AS no, JENIS_DOK as jenisdok, NOMOR_DOK as nomordok, TANGGAL_DOK AS tgldok, NOMOR_BPB AS nobuktipenerimaan, TANGGAL_BPB AS tglbuktipenerimaan, PENGIRIM AS pengirimpemasok, KODE_BARANG AS kodebarang, NAMA_BARANG AS namabarang, SATUAN AS satuan, JUMLAH AS jml, VALUTA AS matauang, NILAI AS nilaibarang');
            break;
            case 'pengeluaran':
            $builder->select('ID AS no, JENIS_DOK as jenisdok, NOMOR_DOK as nomordok, TANGGAL_DOK AS tgldok, NOMOR_DO AS nobuktipenerimaan, TANGGAL_DO AS tglbuktipenerimaan, PENERIMA AS pembelipenerima, KODE_BARANG AS kodebarang, NAMA_BARANG AS namabarang, SATUAN AS satuan, JUMLAH AS jml, VALUTA AS matauang, NILAI AS nilaibarang');
            break;
            case 'posisi_wip':
            $builder->select('ID AS no, PO AS nomorpo, KODE_BARANG AS kodebarang, NAMA_BARANG AS namabarang, SATUAN AS satuan, JUMLAH AS jml');
            break;
            case 'mutasi_bahan_baku':
            $builder->select('ID AS no, KODE_BARANG AS kodebarang, NAMA_BARANG AS namabarang, SATUAN AS satuan, VALUTA AS jenis_valuta, NILAI AS nilaibarang, SALDO_AWAL AS saldoawal, PEMASUKAN AS pemasukan, PENGELUARAN AS pengeluaran, PENYESUAIAN AS penyesuaian, SALDO AS saldoakhir, STOCK_OPNAME AS stockopname, SELISIH AS selisih, KETERANGAN AS keterangan');
            break;
            case 'mutasi_mesin':
            $builder->select('ID AS no, KODE_BARANG AS kodebarang, NAMA_BARANG AS namabarang, SATUAN AS satuan, VALUTA AS jenis_valuta, NILAI AS nilaibarang, SALDO_AWAL AS saldoawal, PEMASUKAN AS pemasukan, PENGELUARAN AS pengeluaran, PENYESUAIAN AS penyesuaian, SALDO AS saldoakhir, STOCK_OPNAME AS stockopname, SELISIH AS selisih, KETERANGAN AS keterangan');
            break;
            default:
            $builder->select('ID AS no, KODE_BARANG AS kodebarang, NAMA_BARANG AS namabarang, SATUAN AS satuan, SALDO_AWAL AS saldoawal, PEMASUKAN AS pemasukan, PENGELUARAN AS pengeluaran, PENYESUAIAN AS penyesuaian, SALDO AS saldoakhir, STOCK_OPNAME AS stockopname, SELISIH AS selisih, KETERANGAN AS keterangan');
            break;
        }
        $builder->where('ID_PERUSAHAAN', $ID_PERUSAHAAN);
        if ($table === 'pemasukan' || $table === 'pengeluaran') {
            $builder->where('TANGGAL_DOK >=', $_GET['dari']);
            $builder->where('TANGGAL_DOK <=', $_GET['sampai']);
        }

        $data = $builder->get()->getResultArray();

        switch ($table) {
            case 'pemasukan':
            foreach ($data as $key => $value) {
                $dataJson[] = [
                    'no' => $value['no'],
                    'jenisdok' => $value['jenisdok'],
                    'nomordok' => $value['nomordok'],
                    'tgldok' => $value['tgldok'],
                    'nobuktipenerimaan' => $value['nobuktipenerimaan'],
                    'tglbuktipenerimaan' => $value['tglbuktipenerimaan'],
                    'pengirimpemasok' => $value['pengirimpemasok'],
                    'kodebarang' => $value['kodebarang'],
                    'namabarang' => $value['namabarang'],
                    'satuan' => $value['satuan'],
                    'jml' => floatval($value['jml']),
                    'matauang' => $value['matauang'],
                    'nilaibarang' => floatval($value['nilaibarang'])
                ]; 
            }
            break;
            case 'pengeluaran':
            foreach ($data as $key => $value) {
                $dataJson[] = [
                    'no' => $value['no'],
                    'jenisdok' => $value['jenisdok'],
                    'nomordok' => $value['nomordok'],
                    'tgldok' => $value['tgldok'],
                    'nobuktipenerimaan' => $value['nobuktipenerimaan'],
                    'tglbuktipenerimaan' => $value['tglbuktipenerimaan'],
                    'pengirimpemasok' => $value['pembelipenerima'],
                    'kodebarang' => $value['kodebarang'],
                    'namabarang' => $value['namabarang'],
                    'satuan' => $value['satuan'],
                    'jml' => floatval($value['jml']),
                    'matauang' => $value['matauang'],
                    'nilaibarang' => floatval($value['nilaibarang'])
                ]; 
            }
            break;
            case 'posisi_wip':
            foreach ($data as $key => $value) {
                $dataJson[] = [
                    'no' => $value['no'],
                    'nomorpo' => $value['nomorpo'],
                    'kodebarang' => $value['kodebarang'],
                    'namabarang' => $value['namabarang'],
                    'satuan' => $value['satuan'],
                    'jml' => floatval($value['jml'])
                ];
            }
            break;
            case 'mutasi_bahan_baku':
            foreach ($data as $key => $value) {
                $dataJson[] = [
                    'no' => $value['no'],
                    'kodebarang' => $value['kodebarang'],
                    'namabarang' => $value['namabarang'],
                    'satuan' => $value['satuan'],
                    'jenis_valuta' => $value['jenis_valuta'],
                    'nilaibarang' => floatval($value['nilaibarang']),
                    'saldoawal' => floatval($value['saldoawal']),
                    'pemasukan' => floatval($value['pemasukan']),
                    'pengeluaran' => floatval($value['pengeluaran']),
                    'penyesuaian' => floatval($value['penyesuaian']),
                    'saldoakhir' => floatval($value['saldoakhir']),
                    'stockopname' => floatval($value['stockopname']),
                    'selisih' => floatval($value['selisih']),
                    'keterangan' => $value['keterangan']
                ];
            }
            break;
            case 'mutasi_mesin':
            foreach ($data as $key => $value) {
                $dataJson[] = [
                    'no' => $value['no'],
                    'kodebarang' => $value['kodebarang'],
                    'namabarang' => $value['namabarang'],
                    'satuan' => $value['satuan'],
                    'jenis_valuta' => $value['jenis_valuta'],
                    'nilaibarang' => floatval($value['nilaibarang']),
                    'saldoawal' => floatval($value['saldoawal']),
                    'pemasukan' => floatval($value['pemasukan']),
                    'pengeluaran' => floatval($value['pengeluaran']),
                    'penyesuaian' => floatval($value['penyesuaian']),
                    'saldoakhir' => floatval($value['saldoakhir']),
                    'stockopname' => floatval($value['stockopname']),
                    'selisih' => floatval($value['selisih']),
                    'keterangan' => $value['keterangan']
                ];
            }
            break;
            default:
            foreach ($data as $key => $value) {
                $dataJson[] = [
                    'no' => $value['no'],
                    'kodebarang' => $value['kodebarang'],
                    'namabarang' => $value['namabarang'],
                    'satuan' => $value['satuan'],
                    'saldoawal' => floatval($value['saldoawal']),
                    'pemasukan' => floatval($value['pemasukan']),
                    'pengeluaran' => floatval($value['pengeluaran']),
                    'penyesuaian' => floatval($value['penyesuaian']),
                    'saldoakhir' => floatval($value['saldoakhir']),
                    'stockopname' => floatval($value['stockopname']),
                    'selisih' => floatval($value['selisih']),
                    'keterangan' => $value['keterangan']
                ];
            }
            break;
        }

        return $dataJson; 
    }

    public function getReferensiPerusahaan(){
        $builder = $this->it->table('pemasukan')->select('ID_PERUSAHAAN')->distinct();

        $data = $builder->get()->getResultArray();

        return $data;
    }
}