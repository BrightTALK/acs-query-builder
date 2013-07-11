<?php

namespace BrightTALK\lib\ACSQueryBuilder\Expression;

use BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionInterface;

class Comparison implements ExpressionInterface
{
    const EQ  = ':';

    /**
     * @var mixed
     */
    protected $leftPart;

    /**
     * @var string
     */
    protected $operator;

    /**
     * @var mixed
     */
    protected $rightPart;

    /**
     * Creates a comparison expression with the given arguments.
     *
     * @param mixed     $leftPart
     * @param string    $operator
     * @param mixed     $rightPart
     */
    public function __construct($leftPart, $operator, $rightPart)
    {
        $this->leftPart  = $leftPart;
        $this->operator  = $operator;
        $this->rightPart = $rightPart;
    }

    /**
     * @return mixed
     */
    public function getLeftPart()
    {
        return $this->leftPart;
    }

    /**
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @return mixed
     */
    public function getRightPart()
    {
        return $this->rightPart;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->leftPart . $this->operator . $this->rightPart;
    }
}