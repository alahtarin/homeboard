<?php

namespace App\DomainModel\Entity;

class Target
{
    const TYPE_GYM = 'gym';
    const TYPE_WARM_UP = 'warm_up';
    const TYPE_EXAM = 'exam';

    const TYPES = [
        self::TYPE_WARM_UP,
        self::TYPE_GYM,
        self::TYPE_EXAM,
    ];

    const NAMES = [
        self::TYPE_WARM_UP => 'Warm-up',
        self::TYPE_GYM => 'Gym',
        self::TYPE_EXAM => 'Exam',
    ];

    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $type;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
