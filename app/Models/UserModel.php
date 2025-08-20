<?php
<?php

namespace App\Models;

use MongoDB\Client;
use MongoDB\Collection;
use MongoDB\BSON\ObjectId;

class UserModel
{
    protected Collection $collection;

    public function __construct()
    {
        $uri = getenv('mongodb.default.uri') ?: 'mongodb://localhost:27017';
        $dbName = getenv('mongodb.default.db') ?: 'fenco_travels';
        $client = new Client($uri);
        $db = $client->selectDatabase($dbName);
        $this->collection = $db->selectCollection('users');
    }

    public function findAll(array $filter = []): array
    {
        return $this->collection->find($filter)->toArray();
    }

    public function find($id): ?array
    {
        try {
            $user = $this->collection->findOne(['_id' => new ObjectId($id)]);
            return $user ? (array) $user : null;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function findByEmail(string $email): ?array
    {
        $user = $this->collection->findOne(['email' => $email]);
        return $user ? (array) $user : null;
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