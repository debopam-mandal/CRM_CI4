<?php
namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Services\CRMSettingsService;

class CRMSettingsController extends ResourceController
{
    protected $format = 'json';
    protected $crmSettingsService;

    public function __construct()
    {
        $this->crmSettingsService = new CRMSettingsService();
    }

    public function index(): object
    {
        $settings = $this->crmSettingsService->getSettings();
        return $this->respond($settings);
    }

    public function update($id = null)
    {
        $data = $this->request->getJSON(true);
        $result = $this->crmSettingsService->updateSettings($data);
        return $this->respond($result);
    }
}
