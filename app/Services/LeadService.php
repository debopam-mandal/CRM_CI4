<?php
namespace App\Services;

use App\Models\LeadModel;

class LeadService
{
    protected $leadModel;

    public function __construct()
    {
        $this->leadModel = new LeadModel();
    }

    public function getAllLeads(): array
    {
        return $this->leadModel->findAll();
    }

    public function getLead($id): ?array
    {
        return $this->leadModel->find($id);
    }

    public function createLead(array $data): bool
    {
        return (bool) $this->leadModel->insert($data);
    }

    public function updateLead($id, array $data): bool
    {
        return (bool) $this->leadModel->update($id, $data);
    }

    public function deleteLead($id): bool
    {
        return (bool) $this->leadModel->delete($id);
    }

    public function bulkAssign(array $data): bool
    {
        // Implement bulk assign logic here
        return false;
    }
}
