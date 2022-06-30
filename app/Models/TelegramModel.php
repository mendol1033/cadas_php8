<?php 
namespace App\Models;

use CodeIgniter\Model;

class TelegramModel extends Model
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
        $this->telegram = \Config\Database::connect('telegram');
    }
    
    public function getLastUpdateId(){
        $builder = $this->telegram->table('inbox');
        $builder->select('UPDATE_ID');
        $builder->orderBy('ID','DESC');
        $builder->limit(1);
        $query = $builder->get();
        return $query->getRowArray();
    }
    
    public function getContact($TELEGRAM_ID){
        $builder = $this->telegram->table('contact');
        $builder->where('TELEGRAM_ID', $TELEGRAM_ID);
        $query = $builder->get()->getResultArray();
        
        return $query;
    }
    
    public function addContact($MESSAGE, $DATA_DAFTAR){
        $this->telegram->transStart();
        $data = [
            'CONTACT_TYPE' => $DATA_DAFTAR[1],
            'TELEGRAM_ID' => $MESSAGE['from']['id'],
            'NAMA_TELEGRAM' => $MESSAGE['from']['first_name']." ".$MESSAGE['from']['last_name'],
            'USERNAME_TELEGRAM' => $MESSAGE['from']['username'],
            'NAMA_CONTACT' => $DATA_DAFTAR[5],
            'HANDPHONE' => $DATA_DAFTAR[6],
            'EMAIL' => $DATA_DAFTAR[7],
            'TANGGAL_TERIMA' => $MESSAGE['date']
        ];

        $this->telegram->table('contact')->insert($data);
        if ($this->telegram->transStatus()) {
            $this->telegram->transCommit();
            return TRUE;
        } else {
            $this->telegram->transRollback();
            return FALSE;
        }
    }
    
    public function updateInbox($message){
        $this->telegram->transStart();
        
        $data = [
            'UPDATE_ID' => $message['update_id'],
            'MESSAGE_ID' => $message['message']['message_id'],
            'FROM_ID' => $message['message']['from']['id'],
            'TEXT' => $message['message']['text'],
            'DATE' => $message['message']['date']
        ];
        
        $this->telegram->table('inbox')->insert($data);
        if ($this->telegram->transStatus()) {
            $this->telegram->transCommit();
            return "sukses";
        } else {
            $this->telegram->transRollback();
            return "gagal";
        }
    }
}