<?php

namespace Yumerov\Phpstudy;

class Calculator {

    /** @var int $result */
    protected $result = 0;

    /**
     * @param int $initValue
     */
    public function __construct($initValue = 0)
    {
        self::checkArgument($initValue);
        $this->result = $initValue;
    }

    /**
     * @param $addValue
     * @return $this
     */
    public function add($addValue)
    {
        self::checkArgument($addValue);
        $this->result += $addValue;
        return $this;
    }

    /**
     * @param $minusValue
     * @return $this
     */
    public function minus($minusValue)
    {
        self::checkArgument($minusValue);
        $this->add(-$minusValue);
        return $this;
    }

    /**
     * @return int
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param $arg
     * @throws \InvalidArgumentException
     */
    public static function checkArgument($arg)
    {
        if (!is_numeric($arg))
        {
            throw new \InvalidArgumentException('The argument must be numeric');
        }
    }

}