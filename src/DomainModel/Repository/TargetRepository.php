<?php

namespace App\DomainModel\Repository;

use App\DomainModel\Entity\Target;
use Doctrine\Common\Collections\ArrayCollection;

class TargetRepository extends AbstractRepository
{
    /**
     * @return ArrayCollection|Target[]
     */
    public function findForToday(): ArrayCollection
    {
        $query = <<<SQL
SELECT * FROM targets
WHERE date = CURDATE()
SQL;

        $statement = $this->connection->executeQuery($query);

        $collection = new ArrayCollection();
        while ($row = $statement->fetch()) {
            $collection->set($row['id'], $this->mapRowToEntity($row));
        }

        return $collection;
    }

    public function save(Target $target)
    {
        $query = <<<SQL
INSERT INTO targets (date, type)
VALUES (:date, :type);
SQL;

        $this->connection->executeQuery($query, [
            'date' => $target->getDate()->format('Y-m-d'),
            'type' => $target->getType(),
        ]);

        $target->setId($this->connection->lastInsertId());
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
