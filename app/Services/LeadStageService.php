<?php
namespace App\Services;

use App\Models\LeadStageModel;

class LeadStageService
{
    protected $leadStageModel;

    public function __construct()
    {
        $this->leadStageModel = new LeadStageModel();
    }

    public function getAllStages(): array
    {
        return $this->leadStageModel->findAll();
    }
}
