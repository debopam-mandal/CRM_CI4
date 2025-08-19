<?php
namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Services\LeadService;

class LeadController extends ResourceController
{
    protected $format = 'json';
    protected $leadService;

    public function __construct()
    {
        $this->leadService = new LeadService();
    }

    public function index(): object
    {
        $leads = $this->leadService->getAllLeads();
        return $this->respond($leads);
    }

    public function show($id = null): object
    {
        $lead = $this->leadService->getLead($id);
        if (!$lead) {
            return $this->failNotFound('Lead not found');
        }
        return $this->respond($lead);
    }

    public function create(): object
    {
        $data = $this->request->getJSON(true);
        if ($this->leadService->createLead($data)) {
            return $this->respondCreated($data);
        }
        return $this->failValidationErrors(['error' => 'Failed to create lead']);
    }

    public function update($id = null): object
    {
        $data = $this->request->getJSON(true);
        if ($this->leadService->updateLead($id, $data)) {
            return $this->respond($data);
        }
        return $this->failValidationErrors(['error' => 'Failed to update lead']);
    }

    public function delete($id = null): object
    {
        if ($this->leadService->deleteLead($id)) {
            return $this->respondDeleted(['id' => $id]);
        }
        return $this->failNotFound('Lead not found');
    }

    public function bulkAssign(): object
    {
        $data = $this->request->getJSON(true);
        $result = $this->leadService->bulkAssign($data);
        return $this->respond(['message' => 'Bulk assign not implemented yet', 'result' => $result]);
    }
}
