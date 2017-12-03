<?php

use Phinx\Seed\AbstractSeed;

class SeedTestTargets extends AbstractSeed
{
    public function run()
    {
        $this->table('targets')->insert([
            ['date' => date("Y-m-d"), 'type' => 'exam']
        ])->save();
    }
}
