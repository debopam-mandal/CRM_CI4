<?php
namespace App\Services;

use App\Models\LeadModel;

class DashboardService
{
    protected $leadModel;

    public function __construct()
    {
        $this->leadModel = new LeadModel();
    }

    public function getStats(): array
    {
        return [
            'assigned' => $this->leadModel->where('stage', 'Assigned')->countAllResults(),
            'proposal_sent' => $this->leadModel->where('stage', 'Proposal Sent')->countAllResults(),
            'follow_up' => $this->leadModel->where('stage', 'Follow Up')->countAllResults(),
            'confirmed' => $this->leadModel->where('stage', 'Confirmed')->countAllResults(),
            'invoiced' => $this->leadModel->where('stage', 'Invoiced')->countAllResults(),
            'awaiting_payment' => $this->leadModel->where('stage', 'Awaiting Payment')->countAllResults(),
            'closed_won' => $this->leadModel->where('stage', 'Closed – Won')->countAllResults(),
            'closed_lost' => $this->leadModel->where('stage', 'Closed – Lost')->countAllResults(),
            'new' => $this->leadModel->where('stage', 'New')->countAllResults(),
            'on_hold' => $this->leadModel->where('stage', 'On Hold')->countAllResults(),
        ];
    }
}
