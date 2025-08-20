<?php

namespace App\Models;

use MongoDB\Client;
use MongoDB\Collection;
use MongoDB\BSON\ObjectId;

class LeadModel
{
    protected Collection $collection;

    public function __construct()
    {
        // Use .env values if set, otherwise fallback to defaults
        $uri = getenv('mongodb.default.uri') ?: 'mongodb://localhost:27017';
        $dbName = getenv('mongodb.default.db') ?: 'fenco_travels'; // Replace with your DB name
        $client = new Client($uri);
        $db = $client->selectDatabase($dbName);
        $this->collection = $db->selectCollection('leads');
    }

    public function findAll(array $filter = []): array
    {
        return $this->collection->find($filter)->toArray();
    }

    public function find($id): ?array
    {
        try {
            $lead = $this->collection->findOne(['_id' => new ObjectId($id)]);
            return $lead ? (array) $lead : null;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function insert(array $data): string
    {
        $result = $this->collection->insertOne($data);
        return (string) $result->getInsertedId();
    }

    public function update($id, array $data): bool
    {
        $result = $this->collection->updateOne(
            ['_id' => new ObjectId($id)],
            ['$set' => $data]
        );
        return $result->getModifiedCount() > 0;
    }

    public function delete($id): bool
    {
        $result = $this->collection->deleteOne(['_id' => new ObjectId($id)]);
        return $result->getDeletedCount() > 0;
    }
}
