<?php

namespace App\Models;

use MongoDB\Client;
use MongoDB\Collection;
use MongoDB\BSON\ObjectId;

class AuthModel
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

    public function updatePassword($id, string $password): bool
    {
        $result = $this->collection->updateOne(
            ['_id' => new ObjectId($id)],
            ['$set' => ['password' => $password]]
        );
        return $result->getModifiedCount() > 0;
    }
}