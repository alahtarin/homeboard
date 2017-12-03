<?php

namespace App\DomainModel\Repository;

use Doctrine\DBAL\Connection;

abstract class AbstractRepository implements RepositoryInterface
{
    /**
     * @var Connection
     */
    protected $connection;

    public function setConnection($connection)
    {
        $this->connection = $connection;

        return $this;
    }
}
