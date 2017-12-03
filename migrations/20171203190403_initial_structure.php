<?php

use Phinx\Migration\AbstractMigration;

class InitialStructure extends AbstractMigration
{
    public function change()
    {
        $tasks = $this->table('targets', ['signed' => false])
            ->addColumn('date', 'date', ['null' => false])
            ->addColumn('type', 'string', ['limit' => 20, 'null' => false])
        ;

        $this->getAdapter()->createTable($tasks);
    }
}
