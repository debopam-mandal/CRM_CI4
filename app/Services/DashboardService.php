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
            'assigned'         => count($this->leadModel->findAll(['stage' => 'Assigned'])),
            'proposal_sent'    => count($this->leadModel->findAll(['stage' => 'Proposal Sent'])),
            'follow_up'        => count($this->leadModel->findAll(['stage' => 'Follow Up'])),
            'confirmed'        => count($this->leadModel->findAll(['stage' => 'Confirmed'])),
            'invoiced'         => count($this->leadModel->findAll(['stage' => 'Invoiced'])),
            'awaiting_payment' => count($this->leadModel->findAll(['stage' => 'Awaiting Payment'])),
            'closed_won'       => count($this->leadModel->findAll(['stage' => 'Closed – Won'])),
            'closed_lost'      => count($this->leadModel->findAll(['stage' => 'Closed – Lost'])),
            'new'              => count($this->leadModel->findAll(['stage' => 'New'])),
            'on_hold'          => count($this->leadModel->findAll(['stage' => 'On Hold'])),
        ];
    }
}