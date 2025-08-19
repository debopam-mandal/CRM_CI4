<?php
namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Services\LeadStageService;

class LeadStageController extends ResourceController
{
    protected $format = 'json';
    protected $leadStageService;

    public function __construct()
    {
        $this->leadStageService = new LeadStageService();
    }

    public function index(): object
    {
        $stages = $this->leadStageService->getAllStages();
        return $this->respond($stages);
    }
}
