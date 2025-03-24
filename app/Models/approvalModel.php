<?php

namespace App\Models;

use CodeIgniter\Model;

class approvalModel extends Model
{
    protected $table            = 'approvals';
    protected $primaryKey       = 'approval_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['date_received','accountID','event_id','status','date_approved'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}