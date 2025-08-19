<?php
namespace App\Models;

use CodeIgniter\Model;

class LeadTypeModel extends Model
{
    protected $table = 'lead_types';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];
}
