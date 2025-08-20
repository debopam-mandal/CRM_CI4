<?php

namespace App\Models;

use MongoDB\Client;
use MongoDB\Collection;

class CRMSettingsModel
{
    protected Collection $collection;

    public function __construct()
    {
        $uri = getenv('mongodb.default.uri') ?: 'mongodb://localhost:27017';
        $dbName = getenv('mongodb.default.db') ?: 'fenco_travels';
        $client = new Client($uri);
        $db = $client->selectDatabase($dbName);
        $this->collection = $db->selectCollection('crm_settings');
    }

    public function getSettings(): array
    {
        $settings = $this->collection->findOne([]);
        return $settings ? (array) $settings : [];
    }

    public function updateSettings(array $data): array
    {
        $this->collection->updateOne([], ['$set' => $data], ['upsert' => true]);
        return ['message' => 'Settings updated'];
    }
}