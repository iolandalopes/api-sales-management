<?php

namespace App\Traits;

use MongoDB\Client;
use MongoDB\Database;

trait MongoRefreshDatabase
{
    protected ?Client $client = null;
    protected ?Database $database = null;

    /**
     * Drop the test mongo database to refresh it to each test.
     */
    private function mongoRefreshDatabase(): void
    {
        $this->getDatabase()
            ->drop();

        $this->getDatabaseLogs()
            ->drop();
    }

    private function getDatabase(): Database
    {
        $this->buildClient();

        $databaseName = config('database.connections.mongodb.database');

        return $this->client->selectDatabase($databaseName);
    }

    private function getDatabaseLogs(): Database
    {
        $this->buildClientLogs();

        $databaseName = config('database.connections.mongodbLog.database');

        return $this->client->selectDatabase($databaseName);
    }

    /**
     * Get MongoDB Client, instantiate if $client is null.
     *
     * @param bool $readOnly
     *
     * @return Client
     */
    private function buildClient(): void
    {
        $this->client = new Client($this->buildUri());
    }

    /**
     * Get MongoDB Logs Client, instantiate if $client is null.
     *
     * @param bool $readOnly
     *
     * @return Client
     */
    private function buildClientLogs(): void
    {
        $this->client = new Client($this->buildUriLogs());
    }

    /**
     * Build Mongo Uri.
     */
    private function buildUri(): string
    {
        return config('database.connections.mongodb.dsn');
    }

    /**
     * Build Mongo Logs Uri.
     */
    private function buildUriLogs(): string
    {
        return config('database.connections.mongodbLog.dsn');
    }
}
