<?php 
namespace App\Models;

use CodeIgniter\Model;

class StakeholdersModel extends Model
{
    protected $table      = 'StakholdersModel';
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
        $this->db = \Config\Database::connect();
        $this->peloro = \Config\Database::connect('peloro');
    }

    public function getReferensi($kode) {
        $builder = $this->cadas->table("tb_referensi");
        $builder->where("KdReferensi", $kode);
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getReferensiById(){
        $builder = $this->cadas->table("tb_referensi");
        $builder->where('IdReferensi', $_GET['search']);
        $query = $builder->get();

        return $query->getRowArray();
    }
    
    public function getById(){
        $builder = $this->cadas->table('tb_stakeholders');
        $builder->where("ID", $_GET['ID']);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function getReferensiByNama($nama, $select){
        $builder = $this->cadas->table("tb_referensi");
        $builder->select($select);
        $builder->where('KdReferensi', $nama);
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function GetJenisTPB() {
        $query = 'SELECT id_tpb as id, nama_tpb as jenis, nama_detail as nama FROM tb_jenis_tpb';
        $JenisTPB = $this->cadas->query($query);

        return $JenisTPB->getResultArray();
    }

    public function GetListHanggar() {
        $query = 'SELECT id as id, grupHanggar as nama FROM tbhanggar';
        $hanggar = $this->db->query($query);
        return $hanggar->getResultArray();
    }

    public function getListNib(){
        $builder = $this->cadas->table('tb_nib_master');
        if (isset($_GET['select'])) {
            $builder->select($_GET['select']);   
        }
        $builder->like('NAMA_PERSEROAN', $_GET['nama']);

        return $builder->get()->getResultArray();
    }

    public function getNibById(){
        $builder = $this->cadas->table('tb_nib_master');
        $builder->where('ID_NIB', $_GET['ID_NIB']);

        return $builder->get()->getResultArray();
    }

    public function getListStakeholders(){
        $builder = $this->cadas->table('tb_stakeholders_detail');
        $builder->select('ID_CADAS AS ID, NAMA_PERUSAHAAN, NAMA_FASILITAS, NO_SKEP');
        $builder->where('STATUS','Y');
        $builder->where('STATUS_DB_P2','Y');
        $builder->where('STATUS_CADAS','Y');
        if (!empty($_GET['nama'])) {
            $builder->like('NAMA_PERUSAHAAN', $_GET['nama']);
        }

        return $builder->get()->getResultArray();
    }

    public function getStakeholdersById(){
        $builder = $this->cadas->table('tb_stakeholders_detail');
        $builder->where('ID_CADAS', $_GET['ID']);

        return $builder->get()->getRowArray();
    }

    public function getStakeholdersById2($id){
        $builder = $this->cadas->table('tb_stakeholders_detail');
        $builder->where('ID_CADAS', $id);

        return $builder->get()->getRowArray();
    }

    public function addStakholders(){
        $this->cadas->transBegin();

        $data = [
            'ID_NIB' => $_POST['idNib'],
            'NPWP' => $_POST['npwp'],
            'NAMA_PERUSAHAAN' => $_POST['namaPerusahaan'],
            'FASILITAS' => $_POST['fasilitas'],
            'JENIS' => $_POST['jns-tpb'],
            'ALAMAT_KANTOR' => $_POST['alamat'],
            'ALAMAT_PABRIK' => $_POST['alamat-pabrik'],
            'PROFIL_RESIKO' => $_POST['profil'],
            'NO_SKEP' => $_POST['skep'],
            'TGL_SKEP' => $_POST['tanggal'],
            'KATEGORI_USAHA' => $_POST['usaha'],
            'NAMA_PENANGGUNG_JAWAB' => $_POST['penanggung-jawab'],
            'WN_PENANGGUNG_JAWAB' => $_POST['warga-negara'],
            'LUAS' => $_POST['luas'],
            'STATUS' => $_POST['status'],
            'LOKASI' => $_POST['lokasi'],
            'LONGITUDE' => $_POST['longitude'],
            'LATITUDE' => $_POST['latitude'],
            'PTGS_REKAM' => $_SESSION['NipUser']
        ];

        $builder = $this->cadas->table('tb_stakeholders');
        $builder->insert($data);

        if ($this->cadas->transStatus() === FALSE) {
            $this->cadas->transRollback();
            return 'failed';
        } else {
            $this->cadas->transCommit();
            return 'success';
        }
    }

    public function updateStakholders(){
        $this->cadas->transBegin();

        $data = [
            'ID_NIB' => $_POST['idNib'],
            'NPWP' => $_POST['npwp'],
            'NAMA_PERUSAHAAN' => $_POST['namaPerusahaan'],
            'FASILITAS' => $_POST['fasilitas'],
            'JENIS' => $_POST['jns-tpb'],
            'ALAMAT_KANTOR' => $_POST['alamat'],
            'ALAMAT_PABRIK' => $_POST['alamat-pabrik'],
            'PROFIL_RESIKO' => $_POST['profil'],
            'NO_SKEP' => $_POST['skep'],
            'TGL_SKEP' => $_POST['tanggal'],
            'KATEGORI_USAHA' => $_POST['usaha'],
            'NAMA_PENANGGUNG_JAWAB' => $_POST['penanggung-jawab'],
            'WN_PENANGGUNG_JAWAB' => $_POST['warga-negara'],
            'LUAS' => $_POST['luas'],
            'STATUS' => $_POST['status'],
            'LOKASI' => $_POST['lokasi'],
            'LONGITUDE' => $_POST['longitude'],
            'LATITUDE' => $_POST['latitude'],
            'PTGS_UPDATE' => $_SESSION['NipUser']
        ];

        $builder = $this->cadas->table('tb_stakeholders');
        $builder->where('ID', $_POST['ID']);
        $builder->update($data);

        if ($this->cadas->transStatus() === FALSE) {
            $this->cadas->transRollback();
            return 'failed';
        } else {
            $this->cadas->transCommit();
            return 'success';
        }
    }

    public function migrasiData(){
        $builder = $this->cadas->table('vw_migrasi');
        $builder->orderBy('NAMA_PERSEROAN','ASC');
        $query = $builder->get()->getResultArray();

        $result = [];

        foreach ($query as $key => $value) {
            if (!empty($value['ID_NIB'])) {
                $result[] = [
                    'ID_NIB' => $value['ID_NIB'],
                    'NPWP' => $value['NPWP_PERSEROAN'],
                    'NAMA_PERUSAHAAN' => $value['NAMA_PERSEROAN'],
                    'FASILITAS' => $value['Fasilitas'],
                    'JENIS' => $value['Jenis'],
                    'ALAMAT_KANTOR' => $value['ALAMAT_PERSEROAN'],
                    'ALAMAT_PABRIK' => $value['ALAMAT_PERSEROAN'],
                    'PROFIL_RESIKO' => $value['ProfilResiko'],
                    'NO_SKEP' => $value['NoSkepAkhir'],
                    'TGL_SKEP' => $value['TglSkepAkhir'],
                    'KATEGORI_USAHA' => $value['KategoriUsaha'],
                    'NAMA_PENANGGUNG_JAWAB' => $value['NamaPenanggungJawab'],
                    'WN_PENANGGUNG_JAWAB' => $value['WNPenanggungJawab'],
                    'LUAS' => $value['Luas'],
                    'STATUS' => $value['Status'],
                    'LOKASI' => $value['Lokasi'],
                    'LONGITUDE' => $value['longitude'],
                    'LATITUDE' => $value['latitude'],
                    'PTGS_REKAM' => '199203162014111002',
                    'ID_PERUSAHAAN' => $value['IdPerusahaan']
                ];
            } else {
                $result[] = [
                    'ID_NIB' => 'NULL',
                    'NPWP' => $value['NPWP'],
                    'NAMA_PERUSAHAAN' => $value['NmPerusahaan'],
                    'FASILITAS' => $value['Fasilitas'],
                    'JENIS' => $value['Jenis'],
                    'ALAMAT_KANTOR' => $value['AlamatPabrik'],
                    'ALAMAT_PABRIK' => $value['AlamatPabrik'],
                    'PROFIL_RESIKO' => $value['ProfilResiko'],
                    'NO_SKEP' => $value['NoSkepAkhir'],
                    'TGL_SKEP' => $value['TglSkepAkhir'],
                    'KATEGORI_USAHA' => $value['KategoriUsaha'],
                    'NAMA_PENANGGUNG_JAWAB' => $value['NamaPenanggungJawab'],
                    'WN_PENANGGUNG_JAWAB' => $value['WNPenanggungJawab'],
                    'LUAS' => $value['Luas'],
                    'STATUS' => $value['Status'],
                    'LOKASI' => $value['Lokasi'],
                    'LONGITUDE' => $value['longitude'],
                    'LATITUDE' => $value['latitude'],
                    'PTGS_REKAM' => '199203162014111002',
                    'ID_PERUSAHAAN' => $value['IdPerusahaan']
                ];
            }
            
        }

        $this->cadas->transBegin();

        $transfer = $this->cadas->table('tb_stakeholders');

        $transfer->insertBatch($result);

        if ($this->cadas->transStatus() === FALSE) {
            $this->cadas->transRollback();
            return FALSE;
        } else {
            $this->cadas->transCommit();
            return TRUE;
        }
    }

    public function migrasiAkses(){
        $builder = $this->cadas->table('tb_stakeholders');
        $builder->orderBy('ID','RANDOM');
        // $builder->limit(5);
        $query = $builder->get()->getResultArray();

        foreach ($query as $key => $value) {
            $cctv = $this->peloro->table('tb_cctv');
            $it = $this->peloro->table('tb_it');
            $seal = $this->peloro->table('tb_eseal');

            $cctv->where('IdPerusahaan', $value['ID_PERUSAHAAN']);
            $dataCctv = $cctv->get()->getRowArray();

            $it->where('IdPerusahaan', $value['ID_PERUSAHAAN']);
            $dataIt = $it->get()->getRowArray();

            $seal->where('IdPerusahaan', $value['ID_PERUSAHAAN']);
            $dataSeal = $seal->get()->getRowArray();

            $data = [$value, $dataCctv, $dataIt, $dataSeal];
            for ($i = 1; $i < count($data); $i++) {
                if (!empty($data[$i])) {
                    switch ($i) {
                        case 1:
                        $insert[] = [
                            'ID_STAKEHOLDERS' => $value['ID'],
                            'TIPE_AKSES' => $i,
                            'JENIS_AKSES' => 'NULL',
                            'APLIKASI_AKSES' => 'NULL',
                            'NAMA_APLIKASI' => 'NULL',
                            'ALAMAT_AKSES' => $data[$i]['IpAddress'],
                            'USERNAME' => $data[$i]['Username'],
                            'PASSWORD' => $data[$i]['Password'],
                            'JENIS_CCTV' => $data[$i]['CctvType'],
                            'STATUS' => $data[$i]['Status'],
                            'PETUNJUK_AKSES' => 'NULL',
                            'KETERANGAN' => $data[$i]['Keterangan'],
                            'PTGS_REKAM' => '199203162014111002',
                        ];
                        break;

                        case 2:
                        $insert[] = [
                            'ID_STAKEHOLDERS' => $value['ID'],
                            'TIPE_AKSES' => $i,
                            'JENIS_AKSES' => 'NULL',
                            'APLIKASI_AKSES' => 'NULL',
                            'NAMA_APLIKASI' => 'NULL',
                            'ALAMAT_AKSES' => $data[$i]['IpAddress'],
                            'USERNAME' => $data[$i]['Username'],
                            'PASSWORD' => $data[$i]['Password'],
                            'PROVIDER_IT_INVENTORY' => 'NULL',
                            'STATUS' => $data[$i]['Status'],
                            'PETUNJUK_AKSES' => 'NULL',
                            'KETERANGAN' => $data[$i]['Keterangan'],
                            'PTGS_REKAM' => '199203162014111002',
                        ];
                        break;
                        
                        default:
                        $insert[] = [
                            'ID_STAKEHOLDERS' => $value['ID'],
                            'TIPE_AKSES' => $i,
                            'JENIS_AKSES' => 'NULL',
                            'APLIKASI_AKSES' => 'NULL',
                            'NAMA_APLIKASI' => 'NULL',
                            'ALAMAT_AKSES' => $data[$i]['IpAddress'],
                            'USERNAME' => $data[$i]['Username'],
                            'PASSWORD' => $data[$i]['Password'],
                            'PROVIDER_E_SEAL' => 'NULL',
                            'STATUS' => $data[$i]['Status'],
                            'PETUNJUK_AKSES' => 'NULL',
                            'KETERANGAN' => $data[$i]['Keterangan'],
                            'PTGS_REKAM' => '199203162014111002',
                        ];
                        break;
                    }
                }
            }
        }

        $this->cadas->transBegin();

        $builder = $this->cadas->table('tb_akses');
        foreach ($insert as $value) {
            $builder->insert($value);
        }
        

        if ($this->cadas->transStatus() === FALSE) {
            $this->cadas->transRollback();
            return FAlSE;
        } else {
            $this->cadas->transCommit();
            return TRUE;
        }
    }
}