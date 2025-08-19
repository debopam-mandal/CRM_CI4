<?php
namespace App\Models;

use CodeIgniter\Model;

class LeadModel extends Model
{
    protected $table = 'leads';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'contact', 'stage', 'type', 'assigned_to', 'status', 'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;
}
