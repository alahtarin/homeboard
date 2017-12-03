<?php

namespace App\DomainModel\Repository;

use App\DomainModel\Entity\Target;
use Doctrine\Common\Collections\ArrayCollection;
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

    /**
     * @return ArrayCollection|Target[]
     */
    public function findForToday(): ArrayCollection
    {
        $query = $this->connection->prepare('SELECT * FROM targets');
        $query->execute();

        $collection = new ArrayCollection();
        while ($row = $query->fetch()) {
            $collection->set($row['id'], $this->mapRowToEntity($row));
        }

        return $collection;
    }

    private function mapRowToEntity(array $row)
    {
        return (new Target())
            ->setId($row['id'])
            ->setDate(new \DateTime($row['date']))
            ->setType($row['type'])
        ;
    }
}
