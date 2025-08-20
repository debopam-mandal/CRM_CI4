<?php
namespace App\Services;

use App\Models\CRMSettingsModel;

class CRMSettingsService
{
    protected $crmSettingsModel;

    public function __construct()
    {
        $this->crmSettingsModel = new CRMSettingsModel();
    }

    public function getSettings(): array
    {
        return $this->crmSettingsModel->getSettings();
    }

    public function updateSettings(array $data): array
    {
        return $this->crmSettingsModel->updateSettings($data);
    }
}