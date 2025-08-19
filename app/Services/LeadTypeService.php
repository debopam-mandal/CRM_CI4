<?php
namespace App\Services;

use App\Models\LeadTypeModel;

class LeadTypeService
{
    protected $leadTypeModel;

    public function __construct()
    {
        $this->leadTypeModel = new LeadTypeModel();
    }

    public function getAllTypes(): array
    {
        return $this->leadTypeModel->findAll();
    }
}
