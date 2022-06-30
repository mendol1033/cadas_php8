<?php
namespace App\Models;

use CodeIgniter\Model;

class AdministrasiModel extends Model
{
	protected $table      = 'tableName';
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
		$this->db = \Config\Database::connect('intelijen');
	}

	public function getNomorLi()
	{
		switch ($_GET['type']) {
			case 'LPPI':
				$table  = 'lppi_master';
				$column = 'TANGGAL_LPPI';
			break;

			case 'LKAI':
				$table = 'lembar_kerja_analisis_informasi';
			break;

			default:
				$table = 'nota_hasil_intelijen';
			break;
		}
		$builder = $this->db->table($table);
		$builder->where('YEAR(' . $column . ')', (int)$_GET['tahun']);

		return $builder->countAllResults();
	}

	public function getLPPIById($id)
	{
		$builder = $this->db->table('lppi_master');
		$builder->where('ID_LPPI', $id);
		$query  = $builder->get();
		$master = $query->getRowArray();

		$builder = $this->db->table('lppi_sumber');
		$builder->where('ID_LPPI', $id);
		$query  = $builder->get();
		$sumber = $query->getResultArray();

		$builder = $this->db->table('lppi_info');
		$builder->where('ID_LPPI', $id);
		$query = $builder->get();
		$info  = $query->getResultArray();

		$data = [
			'master' => $master,
			'sumber' => $sumber,
			'info'   => $info,
		];
		return $data;
	}

	public function insertLPPI()
	{
		$this->db->transBegin();
		if ($_POST['postMethod'] === 'add')
		{
			// ADD DATA LPPI
			$data = [
				'NO_LPPI'           => (int)$_POST['NOMOR_LPPI'],
				'NO_LPPI_FULL'      => $_POST['NOMOR_LPPI_MASK'],
				'TANGGAL_LPPI'      => $_POST['TANGGAL_LPPI'],
				'PENERIMA_INFO'     => $_POST['PENERIMA_TTD'],
				'PENILAI_INFO'      => $_POST['PENILAI_TTD'],
				'KESIMPULAN'        => $_POST['KESIMPULAN'],
				'DISPOSISI'         => $_POST['TUJUAN_DISPOSISI'],
				'TANGGAL_DISPOSISI' => $_POST['TANGGAL_DISPOSISI'],
				'TINDAK_LANJUT'     => $_POST['TINDAK_LANJUT'],
				'CATATAN'           => $_POST['CATATAN'],
				'PEJABAT'           => $_POST['PEJABAT_TTD'],
				'PETUGAS_REKAM'     => $_SESSION['NIPPegawai'],
			];

			$builder = $this->db->table('lppi_master');
			$builder->insert($data);

			$idLPPI = $this->db->insertID();

			for ($i = 0; $i < count($_POST['SUMBER_LPPI']); $i++)
			{
				$dataSumber[] = [
					'ID_LPPI'         => $idLPPI,
					'SUMBER'          => $_POST['SUMBER_LPPI'][$i],
					'MEDIA'           => $_POST['MEDIA'][$i],
					'TANGGAL_TERIMA'  => $_POST['TANGGAL_TERIMA'][$i],
					'NO_DOKUMEN'      => $_POST['NO_DOKUMEN'][$i],
					'TANGGAL_DOKUMEN' => $_POST['TANGGAL_DOKUMEN'][$i],
				];
			}

			$builder = $this->db->table('lppi_sumber');
			$builder->insertBatch($dataSumber);

			for ($i = 0; $i < count($_POST['INFO']); $i++)
			{
				$dataInformasi[] = [
					'ID_LPPI'   => $idLPPI,
					'NOMOR'     => $i + 1,
					'INFORMASI' => $_POST['INFO'][$i],
					'SUMBER'    => $_POST['sumber'][$i],
					'VALIDITAS' => $_POST['validitas'][$i],
				];
			}

			$builder = $this->db->table('lppi_info');
			$builder->insertBatch($dataInformasi);

			// ADD DATA LKAI IF ANALISIS == TRUE
			if ($_POST['TINDAK_LANJUT'] === 'Analisis')
			{
				$informasi = '';
				for ($i = 0; $i < count($dataInformasi); $i++)
				{
					$informasi .= $dataInformasi[$i]['INFORMASI'];
					if ($i === (count($dataInformasi) - 1))
					{
						break;
					}
					$informasi .= '<br>';
				}
				$dataLKAI = [
					'ID_LPPI'       => $idLPPI,
					'INFORMASI'     => $informasi,
					'ANALIS'        => $_POST['TUJUAN_DISPOSISI'],
					'PETUGAS_REKAM' => 'system',
				];

				$builder = $this->db->table('lkai_master');
				$builder->insert($dataLKAI);
			}
		}
		else if ($_POST['postMethod'] === 'edit')
		{
			$data = [
				'NO_LPPI'           => $_POST['NOMOR_LPPI'],
				'NO_LPPI_FULL'      => $_POST['NOMOR_LPPI_MASK'],
				'TANGGAL_LPPI'      => $_POST['TANGGAL_LPPI'],
				'PENERIMA_INFO'     => $_POST['PENERIMA_TTD'],
				'PENILAI_INFO'      => $_POST['PENILAI_TTD'],
				'KESIMPULAN'        => $_POST['KESIMPULAN'],
				'DISPOSISI'         => $_POST['TUJUAN_DISPOSISI'],
				'TANGGAL_DISPOSISI' => $_POST['TANGGAL_DISPOSISI'],
				'TINDAK_LANJUT'     => $_POST['TINDAK_LANJUT'],
				'CATATAN'           => $_POST['CATATAN'],
				'PEJABAT'           => $_POST['PEJABAT_TTD'],
				'PETUGAS_UPDATE'    => $_SESSION['NIPPegawai'],
			];

			$builder = $this->db->table('lppi_master');
			$builder->where('ID_LPPI', $_POST['ID_LPPI'])->update($data);

			for ($i = 0; $i < count($_POST['SUMBER_LPPI']); $i++)
			{
				$builder = $this->db->table('lppi_sumber')->where(['ID_LPPI' => $_POST['ID_LPPI'], 'SUMBER' => $_POST['SUMBER_LPPI'][$i]]);
				$query   = $builder->countAllResults();

				$dataSumber = [
					'ID_LPPI'         => $_POST['ID_LPPI'],
					'SUMBER'          => $_POST['SUMBER_LPPI'][$i],
					'MEDIA'           => $_POST['MEDIA'][$i],
					'TANGGAL_TERIMA'  => $_POST['TANGGAL_TERIMA'][$i],
					'NO_DOKUMEN'      => $_POST['NO_DOKUMEN'][$i],
					'TANGGAL_DOKUMEN' => $_POST['TANGGAL_DOKUMEN'][$i],
				];

				if ($query > 0)
				{
					$builder = $this->db->table('lppi_sumber');
					$builder->where(['ID_LPPI' => $_POST['ID_LPPI'], 'SUMBER' => $_POST['SUMBER_LPPI'][$i]])->update($dataSumber);
				}
				else
				{
					$builder = $this->db->table('lppi_sumber');
					$builder->insert($dataSumber);
				}
			}

			$builder = $this->db->table('lppi_info');
			$builder->where('ID_LPPI', $_POST['ID_LPPI'])->delete();

			for ($i = 0; $i < count($_POST['INFO']); $i++)
			{
				$dataInformasi[] = [
					'ID_LPPI'   => $_POST['ID_LPPI'],
					'NOMOR'     => $i + 1,
					'INFORMASI' => $_POST['INFO'][$i],
					'SUMBER'    => $_POST['sumber'][$i],
					'VALIDITAS' => $_POST['validitas'][$i],
				];
			}

			$builder = $this->db->table('lppi_info');
			$builder->insertBatch($dataInformasi);

			if ($_POST['TINDAK_LANJUT'] === 'Analisis')
			{
				$informasi = '';
				for ($i = 0; $i < count($dataInformasi); $i++)
				{
					$informasi .= $dataInformasi[$i]['INFORMASI'];
					if ($i === (count($dataInformasi) - 1))
					{
						break;
					}
					$informasi .= '<br>';
				}
				$dataLKAI = [
					'ID_LPPI'       => $_POST['ID_LPPI'],
					'INFORMASI'     => $informasi,
					'ANALIS'        => $_POST['TUJUAN_DISPOSISI'],
					'PETUGAS_REKAM' => 'system',
				];

				$builder = $this->db->table('lkai_master');
				$builder->where('ID_LPPI', $_POST['ID_LPPI'])->update($dataLKAI);
			}
			else
			{
				$builder = $this->db->table('lkai_master');
				$builder->where('ID_LPPI', $_POST['ID_LPPI']);
				$builder->delete();
			}
		}

		if ($this->db->transStatus() === false)
		{
			$this->db->transRollback();
			return false;
		}
		else
		{
			$this->db->transCommit();
			return true;
		}
	}

	public function hapusDataIntelijen()
	{
		$this->db->transBegin();
		switch ($_POST['TYPE']) {
			case 'LPPI':
				$table = [
					'lppi_master',
					'lppi_sumber',
					'lppi_info',
				];
				break;

			case 'LKAI':
				break;
			default:
				// code...
				break;
		}

		foreach ($table as $key => $value)
		{
			$builder = $this->db->table($value);
			$builder->where('ID_LPPI', $_POST['ID_LPPI'])->delete();
		}

		if ($this->db->transStatus() === false)
		{
			$this->db->transRollback();
			return false;
		}
		else
		{
			$this->db->transCommit();
			return true;
		}
	}

	public function getLKAIById($id)
	{
		$builder = $this->db->table('lkai_master');
		$builder->where('ID_LKAI', $id);
		$query  = $builder->get();
		$master = $query->getRowArray();

		// $builder = $this->db->table('lppi_sumber');
		// $builder->where('ID_LPPI', $_GET['ID']);
		// $query = $builder->get();
		// $sumber = $query->getResultArray();

		// $builder = $this->db->table('lppi_info');
		// $builder->where('ID_LPPI', $_GET['ID']);
		// $query = $builder->get();
		// $info = $query->getResultArray();

		return $master;
	}

	public function getNomorLKAI()
	{
		$builder = $this->db->table('lkai_master');
		$builder->where('NO_LKAI !=', 'NULL');
		$builder->where('YEAR(TANGGAL_LKAI)', (int)$_GET['tahun']);

		return $builder->countAllResults();
	}

	public function insertLKAI()
	{
		$this->db->transBegin();

		$data = [
			'NO_LKAI'           => $_POST['NOMOR_LKAI'],
			'NO_LKAI_FULL'      => $_POST['NOMOR_LKAI_MASK'],
			'TANGGAL_LKAI'      => $_POST['TANGGAL_LKAI'],
			'INFORMASI'         => $_POST['cke_IKHSTISAR'],
			'PROSEDUR_ANALISIS' => $_POST['cke_PROSEDUR'],
			'HASIL_ANALISIS'    => $_POST['cke_HASIL'],
			'KESIMPULAN'        => $_POST['cke_KESIMPULAN'],
			'TINDAK_LANJUT'     => $_POST['TINDAK_LANJUT'],
			'TUJUAN'            => $_POST['TUJUAN'],
			'ANALIS'            => $_POST['ANALIS'],
			'KEPUTUSAN_SATU'    => $_POST['KEPUTUSAN_SATU'],
			'CATATAN_SATU'      => $_POST['CATATAN_SATU'],
			'TERIMA_SATU'       => $_POST['TERIMA_ANAL'],
			'PEJABAT_SATU'      => $_POST['PEJABAT_SATU'],
			'KEPUTUSAN_DUA'     => $_POST['KEPUTUSAN_DUA'],
			'CATATAN_DUA'       => $_POST['CATATAN_DUA'],
			'TERIMA_DUA'        => $_POST['TERIMA_SEKSI'],
			'PEJABAT_DUA'       => $_POST['PEJABAT_DUA'],
			'PETUGAS_UPDATE'    => $_SESSION['NIPPegawai'],
			'FLAG_PROSES'       => 0,
		];

		switch ($_POST['TINDAK_LANJUT']) {
			case 'RL':
				$data['DETAIL_TINDAK_LANJUT'] = $_POST['Rekomendasi'];
				break;

			case 'IL':
				$data['DETAIL_TINDAK_LANJUT'] = $_POST['InformasiLain'];

			default:
				// code...
				break;
		}

		$builder = $this->db->table('lkai_master');
		$builder->where('ID_LKAI', $_POST['ID_LKAI'])->update($data);

		if ($this->db->transStatus() === false)
		{
			$this->db->transRollback();
			return false;
		}
		else
		{
			$this->db->transCommit();
			return true;
		}
	}
}
