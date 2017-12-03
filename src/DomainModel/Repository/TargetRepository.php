<?php

namespace App\DomainModel\Repository;

use Doctrine\DBAL\Connection;

class TargetRepository
{
    /**
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }
}
