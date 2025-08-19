<?php
namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Services\LeadTypeService;

class LeadTypeController extends ResourceController
{
    protected $format = 'json';
    protected $leadTypeService;

    public function __construct()
    {
        $this->leadTypeService = new LeadTypeService();
    }

    public function index(): object
    {
        $types = $this->leadTypeService->getAllTypes();
        return $this->respond($types);
    }
}
