<?php
namespace App\Models;

use CodeIgniter\Model;

class LeadStageModel extends Model
{
    protected $table = 'lead_stages';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];
}
