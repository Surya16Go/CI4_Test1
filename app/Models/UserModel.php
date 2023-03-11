<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function __construct() {
        parent::__construct();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }

    public function showUser() {
        $query = $this->builder('user')->select(['id','username','email','gender','status','project'])->get();
        return $query->getResult();
    }

    public function searchUser($id) {
        $query = $this->builder('user')->select(['id','username','email','gender','status','project'])->where(['id'=> $id])->get();
        return $query->getRow();
    }

    public function addUser($data) {
        $this->builder('user')->insert($data);
        return $this->db->insertID();
    }

    public function editUser($id, $data) {
        $this->builder('user')->where(['id'=>$id])->update($data);
        if ($this->db->transStatus() === FALSE)
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

    public function deleteUser($id) {
        $query = $this->builder->delete(array('id'=>$id));
        return $query->getResult();
    }
}
