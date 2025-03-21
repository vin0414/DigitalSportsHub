<?php

namespace App\Models;

use CodeIgniter\Model;

class sportsModel extends Model
{
    protected $table            = 'match_stats';
    protected $primaryKey       = 'stats_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['match_id','team1_score','team2_score','set_results'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}