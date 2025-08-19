<?php
namespace App\Controllers\Webservices;

use CodeIgniter\RESTful\ResourceController;
use App\Services\DashboardService;

class DashboardController extends ResourceController
{
    protected $format = 'json';
    protected $dashboardService;

    public function __construct()
    {
        $this->dashboardService = new DashboardService();
    }

    public function index(): object
    {
        $stats = $this->dashboardService->getStats();
        return $this->respond($stats);
    }
}
