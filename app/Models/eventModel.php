<?php

namespace App\Models;

use CodeIgniter\Model;

class eventModel extends Model
{
    protected $table            = 'events';
    protected $primaryKey       = 'event_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['accountID','event_title','event_description','event_type',
                                    'start_date','end_date','status','registration','date'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}